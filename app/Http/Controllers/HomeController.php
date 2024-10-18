<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Production_Sheet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('index', compact('user'));
    }

    public function dashboard()
    {
        $orders = Order::selectRaw('DATE(order_date) as date, COUNT(*) as count')
                        ->where('order_date', '>=', Carbon::now()->subDays(30))
                        ->groupBy('date')
                        ->orderBy('date', 'asc')
                        ->get();

        $labels = $orders->pluck('date')->map(function($date) {
            return Carbon::parse($date)->format('Y-m-d');
        });
        $data = $orders->pluck('count');

            // Fetch the order statuses and their counts
        $orderStatuses = Order::select('order_status', Order::raw('count(*) as total'))
        ->whereIn('order_status', ['Queue', 'Started', 'Pending', 'Finished', 'Delivered']) // ensure only the 5 statuses
        ->groupBy('order_status')
        ->get();

        // Prepare the labels and data
        $statusLabels = $orderStatuses->pluck('order_status');
        $statusData = $orderStatuses->pluck('total');

        // Set the custom color mappings for each status
        $colorMap = [
        'Queue' => [
        'backgroundColor' => 'rgba(157, 157, 157, 0.2)',
        'borderColor' => 'rgba(157, 157, 157, 0.8)',
        ],
        'Started' => [
        'backgroundColor' => 'rgba(11, 205, 0, 0.2)',
        'borderColor' => 'rgba(11, 205, 0, 0.8)',
        ],
        'Pending' => [
        'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
        'borderColor' => 'rgba(255, 206, 86, 1)',
        ],
        'Finished' => [
        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
        'borderColor' => 'rgba(54, 162, 235, 1)',
        ],
        'Delivered' => [
        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
        'borderColor' => 'rgba(255, 99, 132, 1)',
        ],
        ];

        // Extract background colors and border colors from the map based on the statuses
        $backgroundColors = $statusLabels->map(fn($status) => $colorMap[$status]['backgroundColor']);
        $borderColors = $statusLabels->map(fn($status) => $colorMap[$status]['borderColor']);

        $wfCount = 0;
        $mdcCount = 0;
        $allOrders = Order::all();

        foreach ($allOrders as $order) {
            if (strpos($order->order_number, 'W') !== false) {
                $wfCount++;
            } elseif (strpos($order->order_number, 'M') !== false) {
                $mdcCount++;
            }
        }

        return view('dashboard', compact('labels', 'data', 'statusLabels', 'statusData', 'wfCount', 'mdcCount','backgroundColors','borderColors'));
    }

    public function file()
    {
        $user = User::get();
        return view('file.file', compact('user'));
    }

    public function report()
    {
        return view('report.report');
    }

    public function user(Request $request)
    {
        $users = User::query();

        if ($request->has('search_user')) {
            $search = $request->input('search_user');
            $users->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('username', 'LIKE', "%$search%")
                    ->orWhere('role', 'LIKE', "%$search%");
            });
        }

        $user = $users->get();
        return view('file.user', compact('user', 'request'));
    }

    public function productionsheet(Request $request)
    {
        $productionsheet = Production_Sheet::query();

        if ($request->has('search_user')) {
            $search = $request->input('search_user');
            $productionsheet->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('username', 'LIKE', "%$search%")
                    ->orWhere('role', 'LIKE', "%$search%");
            });
        }

        $ps = $productionsheet->get();
        return view('setup.print_productionsheet', compact('productionsheet', 'request'));
    }

    public function createuser()
    {
        return view('file.createuser');
    }

    public function storeuser(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required',
                'unit' => 'required',
                'password' => 'required',
                'role' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('user.create')->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->unit = $request->input('unit');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('user')->with('success', 'User Berhasil ditambahkan');
    }

    public function edituser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user')->with('error', 'User not found');
        }

        return view('file.edituser', compact('user'));
    }

    public function active()
    {
        $users = User::all();
        return view('file.active', compact('users'));
    }

    public function changepw()
    {
        return view('file.changepw');
    }

    public function updatepw(Request $request)
    {
        $request->validate([
            'password_lama' => 'required|max:12',
            'password_baru' => 'required|max:12',
            'password_konfirm' => 'required|same:password_baru',
        ]);

        $current_user = auth()->user();

        if ($current_user instanceof \App\Models\User) {
            if (Hash::check($request->password_lama, $current_user->password)) {
                $validator = Validator::make(
                    $request->all(),
                    [
                        'password_baru' => 'required|max:12',
                        'password_konfirm' => 'required|same:password_baru',
                    ]
                );

                if ($validator->fails()) {
                    return redirect()->route('user.changepw')->withErrors($validator)->withInput();
                }

                $current_user->password = Hash::make($request->password_baru);
                $current_user->save();

                return redirect()->route('user.changepw')->with('success', 'Password berhasil diubah');
            } else {
                return redirect()->route('user.changepw')->with('error', 'Password lama tidak sesuai');
            }
        } else {
            return redirect()->route('user.changepw')->with('error', 'User tidak valid');
        }
    }

    public function updateuser(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'username' => 'required|unique:users,username,' . $id,
                'email' => 'required|email',
                'unit' => 'required',
                'password' => 'nullable',
                'role' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('user.edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user')->with('error', 'User not found');
        }

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->unit = $request->input('unit');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->role = $request->input('role');
        $user->save();
        return redirect()->route('user')->with('success', 'Data User berhasil diperbarui');
    }

    public function deleteuser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user')->with('error', 'User not found');
        }

        $user->delete();
        return redirect()->route('user')->with('success', 'Data Berhasil dihapus');
    }

    public function dashboardindex()
    {
        $orders = Order::selectRaw('DATE(order_date) as date, COUNT(*) as count')
                        ->where('order_date', '>=', Carbon::now()->subDays(30))
                        ->groupBy('date')
                        ->orderBy('date', 'asc')
                        ->get();

        $labels = $orders->pluck('date')->map(function($date) {
            return Carbon::parse($date)->format('Y-m-d');
        });
        $data = $orders->pluck('count');

        return view('chart', compact('labels', 'data'));
    }
}
