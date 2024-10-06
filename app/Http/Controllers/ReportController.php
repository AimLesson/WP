<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\ItemAdd;
use Illuminate\Http\Request;
use App\Models\ProcessingAdd;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function report()
    {
        return view('report.report');
    }
    public function order()
    {
        return view('report.order');
    }
    public function controlsheet(Request $request)
    {
        // Fetch all orders with status not 'finished'
        $orders = Order::where('order_status', '!=', 'finished')->get();

        // Get the order_number from the request
        $orderNumber = $request->input('order_number');

        // Fetch the selected order details
        $order = Order::where('order_number', $orderNumber)->first();

        // Fetch the items with the specified order_number and their related processing steps
        $items = ItemAdd::with('processingAdds')
            ->where('order_number', $orderNumber)
            ->get();

        return view('report.controlsheet', compact('items', 'orderNumber', 'orders', 'order'));
    }


    public function getItemsByOrder($orderNumber)
    {
        $items = ItemAdd::where('order_number', $orderNumber)->get();
        return response()->json($items);
    }

    public function productionsheet(Request $request)
    {
        // Log the incoming request parameters
        Log::info('used_time request received', [
            'order_number' => $request->order_number,
            'item_number' => $request->item_number,
        ]);

        // Get the order_number from the request
        $orderNumber = $request->input('order_number');

        // Fetch the order details
        $order = Order::where('order_number', $orderNumber)->first();

        // Get orders with order_status not 'Finished'
        $orders = Order::where('order_status', '!=', 'Finished')->get();
        Log::info('Orders retrieved', ['orders' => json_encode($orders)]);

        $orderNumbers = $orders->pluck('order_number');
        Log::info('Order numbers', ['orderNumbers' => $orderNumbers->toArray()]);

        // Get items where order_number is in the filtered orders
        $items = ItemAdd::whereIn('order_number', $orderNumbers)->get();
        Log::info('Items retrieved', ['items' => json_encode($items)]);

        // Start the query for ProcessingAdd
        $query = ProcessingAdd::whereIn('order_number', $orderNumbers);

        // Filter by order_number if provided
        if ($request->filled('order_number')) {
            $query->where('order_number', $request->order_number);
            Log::info('Filtering by order number', ['order_number' => $request->order_number]);
        }

        // Filter by item_number if provided
        if ($request->filled('item_number')) {
            $query->where('item_number', $request->item_number);
            Log::info('Filtering by item number', ['item_number' => $request->item_number]);
        } else {
            Log::info('No item number provided for filtering');
        }

        // Get the filtered used time data
        $usedtime = $query->get();
        Log::info('Used time data retrieved', ['usedtime' => json_encode($usedtime)]);

        return view('report.productionsheet', compact('usedtime', 'orders', 'items', 'orderNumber', 'order'));
    }
    public function inspectionsheet()
    {
        return view('report.inspectionsheet');
    }
    public function materialsheet()
    {
        return view('report.materialsheet');
    }
    public function standartpartsheet()
    {
        return view('report.standartpartsheet');
    }
    public function subcont()
    {
        return view('report.subcont');
    }
    public function overheadmanufacture()
    {
        return view('report.overheadmanufacture');
    }
    public function monitoranalisaorder()
    {
        return view('report.monitoranalisaorder');
    }
    public function statistic()
    {
        return view('report.statistic');
    }
    public function reportordergraph()
    {
        $orders = Order::selectRaw('DATE(order_date) as date, COUNT(*) as count')
            ->where('order_date', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $labels = $orders->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        });
        $data = $orders->pluck('count');

        $orderStatuses = Order::select('order_status', Order::raw('count(*) as total'))
            ->groupBy('order_status')
            ->get();

        $statusLabels = $orderStatuses->pluck('order_status');
        $statusData = $orderStatuses->pluck('total');
        return view('report.reportordergraph', compact('labels', 'data', 'statusLabels', 'statusData'));
    }
    public function capacity()
    {
        return view('report.capacity');
    }
    public function wip()
    {
        return view('report.wip');
    }
    public function wip_process(Request $request)
    {
        // Fetch start and end dates from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query to fetch WIP data where the associated order status is not "Finished" or "Delivered"
        $orders = \App\Models\WIP::whereHas('order', function ($query) {
            $query->notfinished();
            $query->notdelivered();
        });

        // If the user provided a start and end date, filter the query by that date range
        if ($startDate && $endDate) {
            $orders = $orders->whereBetween('wip_date', [$startDate, $endDate]);
        }

        // Get the results of the query
        $orders = $orders->get();

        // Pass the data to the view
        return view('report.wip_process', compact('orders'));
    }

    public function wip_material()
    {
        return view('report.wip_material');
    }
    public function outstanding()
    {
        return view('report.outstanding');
    }
    public function finishgood(Request $request)
    {
        // Fetch start and end dates from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query to fetch WIP data where the associated order status is not "Finished" or "Delivered"
        $orders = \App\Models\WIP::whereHas('order', function ($query) {
            $query->Finished();
        });

        // If the user provided a start and end date, filter the query by that date range
        if ($startDate && $endDate) {
            $orders = $orders->whereBetween('wip_date', [$startDate, $endDate]);
        }

        // Get the results of the query
        $orders = $orders->get();

        // Pass the data to the view
        return view('report.finishgood', compact('orders'));
    }
    public function delivered(Request $request)
    {
        // Fetch start and end dates from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query to fetch WIP data where the associated order status is not "Finished" or "Delivered"
        $orders = \App\Models\WIP::whereHas('order', function ($query) {
            $query->Delivered();
        });

        // If the user provided a start and end date, filter the query by that date range
        if ($startDate && $endDate) {
            $orders = $orders->whereBetween('wip_date', [$startDate, $endDate]);
        }

        // Get the results of the query
        $orders = $orders->get();

        // Pass the data to the view
        return view('report.delivered', compact('orders'));
    }
    public function hpp()
    {
        return view('report.hpp');
    }
    public function hppmdc()
    {
        return view('report.hppmdc');
    }
    public function hppwf()
    {
        return view('report.hppwf');
    }
    public function perhitunganwip()
    {
        return view('report.perhitunganwip');
    }
    public function salesorder()
    {
        return view('report.salesorder');
    }
}
