<?php

namespace App\Http\Controllers;

use App\Models\Production_Sheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $user  = User::get();

        return view('index', compact('user'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function file()
    {
        $user=User::get();
        return view('file.file',compact('user'));
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
                'name'      => 'required',
                'username'  => 'required|unique:users',
                'email'     => 'required',
                'unit'      => 'required',
                'password'  => 'required',
                'role'      => 'required',
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

        return redirect()->route('user')->with('success', 'User Berhasil ditambahkan');;
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
        // Mengambil semua data pengguna menggunakan Eloquent ORM
        $users = User::all();

        // Mengirim data pengguna ke tampilan 'user'
        return view('file.active', compact('users'));
    }

    public function changepw()
    {
        return view('file.changepw');
    }

    public function updatepw(Request $request)
    {
        $request->validate([
            'password_lama'    => 'required|max:12',
            'password_baru'    => 'required|max:12',
            'password_konfirm' => 'required|same:password_baru',
        ]);

        $current_user = auth()->user();

        if ($current_user instanceof \App\Models\User) { // Periksa apakah $current_user adalah instance dari model User
            if (Hash::check($request->password_lama, $current_user->password)) {
                $validator = Validator::make(
                    $request->all(),
                    [
                        'password_baru'    => 'required|max:12',
                        'password_konfirm' => 'required|same:password_baru',
                    ]
                );

                if ($validator->fails()) {
                    return redirect()->route('user.changepw')->withErrors($validator)->withInput();
                }

                $current_user->password = Hash::make($request->password_baru);
                $current_user->save(); // Menyimpan perubahan password

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
                'name'      => 'required',
                'username'  => 'required|unique:users,username,' . $id,
                'email'     => 'required|email',
                'unit'      => 'required',
                'password'  => 'nullable',
                'role'      => 'required',
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

        return redirect()->route('user')->with('success','Data Berhasil dihapus');
    }
}
