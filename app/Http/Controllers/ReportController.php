<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\ItemAdd;
use App\Models\WIP;
use Illuminate\Http\Request;
use App\Models\processingadd;
use App\Models\Inspection_sheet;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function report()
    {
        return view('report.report');
    }

    public function order(Request $request)
{
    $order_number = $request->input('order_number');

        // Query the sub_contract model
        $query = \App\Models\Order::query();

        // Apply filter if order_number is provided
        if ($order_number) {
            $query->where('order_number', 'like', '%' . $order_number . '%');
        }

        // Fetch the filtered or full data
        $data = $query->get();

        // Return the view with the data and the filter value
        return view('report.order', compact('data', 'order_number'));
}

public function viewOrder($order_number)
{
    // Get the specific order based on the order_number
    $order = Order::where('order_number', $order_number)->first();

    // Pass the order object to the view
    return view('report.vieworder', compact('order'));
}

public function controlsheet(Request $request)
{
    // Fetch all orders except those with 'finished' status
    $orders = Order::all();

    // Get the order_number from the request
    $orderNumber = $request->input('order_number');

    // Fetch the selected order details
    $order = Order::where('order_number', $orderNumber)->first();

    // Fetch the items with the specified order_number and their related processing steps
    $items = ItemAdd::with(['processingAdds' => function ($query) use ($orderNumber) {
            $query->where('order_number', $orderNumber);
        }])
        ->where('order_number', $orderNumber)
        ->get();

    // Validate duplicates
    $duplicateProcesses = $items->flatMap->processingAdds->duplicates('id');
    if ($duplicateProcesses->isNotEmpty()) {
        return redirect()->back()->withErrors([
            'duplicates' => 'Duplicate processing steps found for this order.',
        ]);
    }

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
    Log::info('Used_time request received', [
        'order_number' => $request->order_number,
        'item_number' => $request->item_number,
    ]);

    // Fetch the order details
    $order = null;
    if ($request->filled('order_number')) {
        $order = Order::where('order_number', $request->order_number)->first();
    }

    // Get orders with order_status not 'Finished'
    $orders = Order::where('order_status', '!=', 'Finished')->get();
    Log::info('Orders retrieved', ['orders' => json_encode($orders)]);

    $orderNumbers = $orders->pluck('order_number');
    Log::info('Order numbers', ['orderNumbers' => $orderNumbers->toArray()]);

    // Filter items by selected order_number, if provided
    $items = [];
    if ($request->filled('order_number')) {
        $items = ItemAdd::where('order_number', $request->order_number)->get();
        Log::info('Items filtered by order number', ['items' => json_encode($items)]);
    } else {
        $items = ItemAdd::whereIn('order_number', $orderNumbers)->get();
        Log::info('All items retrieved', ['items' => json_encode($items)]);
    }

    // Query ProcessingAdd based on filters
    $query = ProcessingAdd::whereIn('order_number', $orderNumbers);

    if ($request->filled('order_number')) {
        $query->where('order_number', $request->order_number);
        Log::info('Filtering by order number', ['order_number' => $request->order_number]);
    }

    if ($request->filled('item_number')) {
        $query->where('item_number', $request->item_number);
        Log::info('Filtering by item number', ['item_number' => $request->item_number]);
    } else {
        Log::info('No item number provided for filtering');
    }

    // Get the filtered used time data
    $usedtime = $query->get();
    Log::info('Used time data retrieved', ['usedtime' => json_encode($usedtime)]);

    // Get the selected item data explicitly for printing
    $item = null;
    if ($request->filled('item_number')) {
        $item = ItemAdd::where('no_item', $request->item_number)
            ->where('order_number', $request->order_number)
            ->first();
            
        // Get the newprocessing data for this item
        $newprocessingData = \App\Models\newprocessing::where('item_number', $request->item_number)
            ->where('order_number', $request->order_number)
            ->get();
    } else {
        $newprocessingData = collect();
    }
    

    return view('report.productionsheet', [
        'usedtime' => $usedtime,
        'orders' => $orders,
        'items' => $items,
        'orderNumber' => $request->order_number,
        'itemNumber' => $request->item_number,
        'order' => $order,
        'item' => $item,
        'processingData' => $usedtime,
        'newprocessingData' => $newprocessingData 
    ]);
}
    public function inspectionsheet()
    {
        return view('report.inspectionsheet');
    }
    public function viewinspectionsheet($item_no)
    {
        // Get the specific order based on the order_number
        $inspectionSheet = Inspection_sheet::where('item_no', $item_no)->first();

    // Pass the order object to the view
    return view('report.viewinspectionsheet', compact('inspectionSheet'));
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
    public function monitoranalisaorder(Request $request)
    {
        // Fetch filters from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Fetch WIP data with associated orders and filters
        $wipData = WIP::with(['order' => function ($query) {
                $query->with(['items', 'processings', 'subContracts', 'salesOrder', 'standartParts', 'overheads']);
            }])
            ->whereHas('order', function ($query) use ($startDate, $endDate) {
                // Apply filters based on dod
                if ($startDate) {
                    $query->whereDate('dod', '>=', $startDate);
                }
                if ($endDate) {
                    $query->whereDate('dod', '<=', $endDate);
                }
            })
            ->get();

        // Return the view with WIP data and filter values
        return view('report.monitoranalisaorder', compact('wipData', 'startDate', 'endDate'));
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
        $orderType = $request->input('order_type'); // New order type filter

        // Log the filter inputs
        Log::info('WIP Process Report Filter Inputs', [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'order_type' => $orderType
        ]);

        // Base query to fetch WIP data where the associated order status is not "Finished" or "Delivered"
        $baseQuery = \App\Models\WIP::whereHas('order', function ($query) {
            $query->notfinished();
            $query->notdelivered();
        });

        // Count the total number of rows before applying any filter
        $totalRows = $baseQuery->count();

        // Log the total rows
        Log::info('Total Rows without filter', ['total_rows' => $totalRows]);

        // Clone the base query to apply filters
        $orders = clone $baseQuery;

        // Filter by date range
        if ($startDate && $endDate) {
            $orders = $orders->whereBetween('wip_date', [$startDate, $endDate]);

            // Log the detailed information about the date range used
            Log::info('Date Range Filter Applied', [
                'start_date' => $startDate,
                'end_date' => $endDate,
                'query' => "Filtering records between $startDate and $endDate"
            ]);
        } else {
            // Log when the date range is not applied
            Log::info('No Date Range Filter Applied');
        }

        // Filter by order type (WF or MDC) based on the order_number format
        if ($orderType == 'WF') {
            $orders = $orders->whereHas('order', function ($query) {
                $query->where('order_number', 'like', '%-W%');
            });
            Log::info('WF Order Type Filter Applied');
        } elseif ($orderType == 'MDC') {
            $orders = $orders->whereHas('order', function ($query) {
                $query->where('order_number', 'like', '%-M%');
            });
            Log::info('MDC Order Type Filter Applied');
        }

        // Get the results of the query
        $orders = $orders->get();

        // Log the number of results retrieved
        Log::info('WIP Process Query Results', [
            'total_orders' => $orders->count()
        ]);

        // Calculate the sums for the total columns
        $totalMaterialCost = $orders->sum('total_material_cost');
        $totalLaborCost = $orders->sum('total_labor_cost');
        $totalMachineCost = $orders->sum('total_machine_cost');
        $totalStandardPartCost = $orders->sum('total_standard_part_cost');
        $totalSubContractCost = $orders->sum('total_sub_contract_cost');
        $totalOverheadCost = $orders->sum('total_overhead_cost');
        $totalWIP = $orders->sum('cogs');
        $totalSales = $orders->sum('total_sales');

        // Log the totals calculated
        Log::info('WIP Process Totals', [
            'total_material_cost' => $totalMaterialCost,
            'total_labor_cost' => $totalLaborCost,
            'total_machine_cost' => $totalMachineCost,
            'total_standard_part_cost' => $totalStandardPartCost,
            'total_sub_contract_cost' => $totalSubContractCost,
            'total_overhead_cost' => $totalOverheadCost,
            'total_wip' => $totalWIP,
            'total_sales' => $totalSales,
        ]);

        // Pass the data, the sums, and the total row count to the view
        return view('report.wip_process', compact(
            'orders',
            'totalMaterialCost',
            'totalLaborCost',
            'totalMachineCost',
            'totalStandardPartCost',
            'totalSubContractCost',
            'totalOverheadCost',
            'totalWIP',
            'totalSales',
            'totalRows' // Pass the unfiltered total row count
        ));
    }
    public function wip_material()
    {
        return view('report.wip_material');
    }
    public function outstanding(Request $request)
{
    $query = Order::notFinished()->notQCPass()->notDelivered()->with('wip'); // Eager load WIP relationship

    if ($request->has('order_number')) {
        $order_number = $request->input('order_number');
        $query->where('order_number', 'LIKE', '%' . $order_number . '%');
    }

    $order = $query->get(); // Fetch the filtered results

    return view('report.outstanding', compact('order')); // Pass data to the view
}
        public function finishgood(Request $request)
    {
        // Fetch start and end dates from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $orderType = $request->input('order_type'); // New order type filter

        // Log the filter inputs
        Log::info('Finish Good Report Filter Inputs', [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'order_type' => $orderType
        ]);

        // Query to fetch WIP data where the associated order status is not "Finished" or "Delivered"
        $orders = \App\Models\WIP::whereHas('order', function ($query) {
            $query->finished();
        });

        // Filter by date range
        if ($startDate && $endDate) {
            $orders = $orders->whereBetween('wip_date', [$startDate, $endDate]);
            Log::info('Date Range Filter Applied', [
                'start_date' => $startDate,
                'end_date' => $endDate,
                'query' => "Filtering records between $startDate and $endDate"
            ]);
        } else {
            Log::info('No Date Range Filter Applied');
        }

        // Filter by order type (WF or MDC)
        if ($orderType == 'WF') {
            $orders = $orders->whereHas('order', function ($query) {
                $query->where('order_number', 'like', '%-W%');
            });
            Log::info('WF Order Type Filter Applied');
        } elseif ($orderType == 'MDC') {
            $orders = $orders->whereHas('order', function ($query) {
                $query->where('order_number', 'like', '%-M%');
            });
            Log::info('MDC Order Type Filter Applied');
        }

$orders = \App\Models\WIP::select('w_i_p_s.*')
    ->join(
        DB::raw('(SELECT order_number, MAX(wip_date) as latest_date FROM w_i_p_s GROUP BY order_number) as latest_wips'),
        function ($join) {
            $join->on('w_i_p_s.order_number', '=', 'latest_wips.order_number')
                 ->on('w_i_p_s.wip_date', '=', 'latest_wips.latest_date');
        }
    )
    ->whereHas('order', function ($query) {
        $query->QCPass();
    })
    ->get();

        Log::info('Finish Good Query Results', [
            'total_orders' => $orders->count()
        ]);

        // Calculate the sums for the total columns
        $totalMaterialCost = $orders->sum('total_material_cost');
        $totalLaborCost = $orders->sum('total_labor_cost');
        $totalMachineCost = $orders->sum('total_machine_cost');
        $totalStandardPartCost = $orders->sum('total_standard_part_cost');
        $totalSubContractCost = $orders->sum('total_sub_contract_cost');
        $totalOverheadCost = $orders->sum('total_overhead_cost');
        $totalWIP = $orders->sum('cogs');
        $totalSales = $orders->sum('total_sales');

        // Log the totals calculated
        Log::info('Finish Good Totals', [
            'total_material_cost' => $totalMaterialCost,
            'total_labor_cost' => $totalLaborCost,
            'total_machine_cost' => $totalMachineCost,
            'total_standard_part_cost' => $totalStandardPartCost,
            'total_sub_contract_cost' => $totalSubContractCost,
            'total_overhead_cost' => $totalOverheadCost,
            'total_wip' => $totalWIP,
            'total_sales' => $totalSales,
        ]);

        // Pass the data and the sums to the view
        return view('report.finishgood', compact(
            'orders',
            'totalMaterialCost',
            'totalLaborCost',
            'totalMachineCost',
            'totalStandardPartCost',
            'totalSubContractCost',
            'totalOverheadCost',
            'totalWIP',
            'totalSales'
        ));
    }
    public function delivered(Request $request)
    {
        // Fetch start and end dates from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $orderType = $request->input('order_type'); // New order type filter

        // Query to fetch WIP data where the associated order status is "Delivered"
        $orders = \App\Models\WIP::select('w_i_p_s.*', 'order.dod') // Include 'dod' from 'orders' table
            ->join(
                DB::raw('(SELECT order_number, MAX(wip_date) as latest_date FROM w_i_p_s GROUP BY order_number) as latest_wips'),
                function ($join) {
                    $join->on('w_i_p_s.order_number', '=', 'latest_wips.order_number')
                         ->on('w_i_p_s.wip_date', '=', 'latest_wips.latest_date');
                }
            )
            ->join('order', 'w_i_p_s.order_number', '=', 'order.order_number') // Join with 'orders' table
            ->whereHas('order', function ($query) {
                $query->delivered();
            });

        // Filter by delivery date range (dod) instead of wip_date
        if ($startDate && $endDate) {
            $orders = $orders->whereBetween('order.dod', [$startDate, $endDate]); // Changed from wip_date to dod
        }

        // Filter by order type (WF or MDC) based on the order_number format
        if ($orderType == 'WF') {
            $orders = $orders->whereHas('order', function ($query) {
                $query->where('order_number', 'like', '%-W%');
            });
        } elseif ($orderType == 'MDC') {
            $orders = $orders->whereHas('order', function ($query) {
                $query->where('order_number', 'like', '%-M%');
            });
        }

        $orders = $orders->get();

        // Calculate the sums for the total columns
        $totalMaterialCost = $orders->sum('total_material_cost');
        $totalLaborCost = $orders->sum('total_labor_cost');
        $totalMachineCost = $orders->sum('total_machine_cost');
        $totalStandardPartCost = $orders->sum('total_standard_part_cost');
        $totalSubContractCost = $orders->sum('total_sub_contract_cost');
        $totalOverheadCost = $orders->sum('total_overhead_cost');
        $totalWIP = $orders->sum('cogs');
        $totalSales = $orders->sum('total_sales');

        // Pass the data and the sums to the view
        return view('report.delivered', compact(
            'orders',
            'totalMaterialCost',
            'totalLaborCost',
            'totalMachineCost',
            'totalStandardPartCost',
            'totalSubContractCost',
            'totalOverheadCost',
            'totalWIP',
            'totalSales'
        ));
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
