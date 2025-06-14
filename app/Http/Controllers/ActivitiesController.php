<?php

namespace App\Http\Controllers;

use App\Models\WIP;
use App\Models\Item;
use App\Models\Unit;
use App\Models\NoKatalog;
use App\Models\Salesman;
use App\Models\User;
use App\Models\Order;
use App\Models\WPLink;
use GuzzleHttp\Client;
use App\Models\ItemAdd;
use App\Models\Machine;
use App\Models\TaxType;
use App\Models\Customer;
use App\Models\Kblicode;
use App\Models\Material;
use App\Models\Overhead;
use App\Models\UsedTime;
use App\Models\OrderUnit;
use App\Models\Quotation;
use App\Models\Department;
use App\Models\processing;
use App\Models\PendingTime;
use App\Models\SalesOrder;
use App\Models\ProductType;
use App\Models\QuotationAdd;
use App\Models\sub_contract;
use Illuminate\Http\Request;
use App\Models\processingadd;
use App\Models\SalesOrderAdd;
use App\Models\Standart_part;
use App\Models\StandartpartAPI;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class ActivitiesController extends Controller
{
    public function activities()
    {
        return view('activities.activities');
    }


    //activities - quotation
    public function quotationindex(Request $request)
{
    // Get the quotation_no filter from the request
    $filterQuotationNo = $request->input('quotation_no');

    // Start the query for the main quotations table
    $quotation = DB::table('quotation');

    // Apply filter if quotation_no is present
    if ($filterQuotationNo) {
        $quotation->where('quotation_no', 'like', '%' . $filterQuotationNo . '%');
    }

    // Add orderBy to sort data by date in descending order
    $quotation = $quotation->orderBy('created_at', 'desc')->get();

    // Join quotations with quotationadd and sort by date in descending order
    $quotationJoin = DB::table('quotation')
        ->join('quotationadd', 'quotation.quotation_no', '=', 'quotationadd.quotation_no')
        ->select('quotation.*', 'quotationadd.*')
        ->orderBy('quotation.created_at', 'desc') // Order by date in descending order
        ->get();

    // Return the view with the filtered and sorted data
    return view('activities.quotation', compact('quotation', 'quotationJoin', 'filterQuotationNo'));
}
    public function viewquotation($quotation_no)
    {
        $quotationJoin = DB::table('quotation')
            ->join('quotationadd', 'quotation.quotation_no', '=', 'quotationadd.quotation_no')
            ->select('quotation.*', 'quotationadd.*')
            ->where('quotationadd.quotation_no', $quotation_no)
            ->get();
        return view('activities.viewquotation', compact('quotationJoin'));
    }
    public function createquotation()
    {
        $customers = Customer::get();
        $tax_type = TaxType::get();
        $unit = Unit::get();
	$salesmen = Salesman::get();
        $no_katalog = NoKatalog::get();
        $user = User::get();

        // Get the last created quotation
        $lastQuotation = Quotation::latest('created_at')->first();

        // Set the year (24 represents the year 2024)
        $year = now()->format('y'); // This will return '24' for 2024

        // Extract the order number and increment it
        if ($lastQuotation) {
            $lastOrderNumber = (int) substr($lastQuotation->quotation_no, -4); // Get last 4 digits
            $newOrderNumber = $lastOrderNumber + 1;
        } else {
            $newOrderNumber = 1; // Start from 0001 if no quotation exists
        }

        // Format the new quotation number (e.g., Q-240001)
        $newQuotationNo = 'Q' . $year .'-'. str_pad($newOrderNumber, 4, '0', STR_PAD_LEFT);

        return view('activities.createquotation', compact('user','salesmen', 'unit', 'tax_type', 'customers', 'no_katalog', 'newQuotationNo'));
    }
    public function storequotation(Request $request)
    {
        if ($request->has('addcompany')) {
            // Jika checkbox dipilih, tambahkan data ke tabel pelanggan
            Customer::create([
                'company' => $request->input('company_name'),
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'shipment' => $request->input('shipping_address'),
                'npwp' => $request->input('npwp'),
                'phone' => $request->input('phone'),
                'fax' => $request->input('fax'),
                'tax_address' => $request->input('tax_address'),
                'email' => $request->input('email'),
                // Tambahkan kolom lain sesuai kebutuhan
            ]);
        }
        $request->validate([
            'quotation_no'      => 'required|unique:quotation,quotation_no',
            'company_name'      => 'required',
            'name'              => 'required',
            'date'              => 'required|date',
            'address'           => 'required',
            'npwp'              => 'nullable',
            'phone'             => 'required',
            'fax'               => 'required',
            'tax_address'       => 'required',
            'confirmation'      => 'required',
            'type'              => 'required',
            'description'       => 'required',
            'sample'            => 'required',
            'ass_type'          => 'required',
            'qc_statement'      => 'required',
            'packing_type'      => 'required',
            'top'               => 'required',
            'ptp'               => 'required',
            'dod'               => 'required',
            'shipping_address'  => 'required',
            'file'              => 'nullable',
            'valid'             => 'required|date',
            'mdp'               => 'required',
            'salesman'          => 'required',
            'subtotal'          => 'required',
            'discount'          => 'required',
            'tax'               => 'required',
            'freight'           => 'required',
            'total_amount'      => 'required',
        ]);
        // dd(request()->all());
        DB::beginTransaction();
        try {
            $quotation = new Quotation;
            $quotation->quotation_no      = $request->quotation_no;
            $quotation->company_name      = $request->company_name;
            $quotation->name              = $request->name;
            $quotation->date              = $request->date;
            $quotation->address           = $request->address;
            $quotation->npwp              = $request->npwp;
            $quotation->phone             = $request->phone;
            $quotation->fax               = $request->fax;
            $quotation->tax_address       = $request->tax_address;
            $quotation->email             = $request->email;
            $quotation->confirmation      = $request->confirmation;
            $quotation->type              = $request->type;
            $quotation->description       = $request->description;
            $quotation->sample            = $request->sample;
            $quotation->ass_type          = $request->ass_type;
            $quotation->qc_statement      = $request->qc_statement;
            $quotation->packing_type      = $request->packing_type;
            $quotation->top               = $request->top;
            $quotation->net_days          = $request->net_days;
            $quotation->ptp               = $request->ptp;
            $quotation->dod               = $request->dod;
            $quotation->shipping_address  = $request->shipping_address;
            $quotation->valid             = $request->valid;
            $quotation->mdp               = $request->mdp;
            $quotation->salesman          = $request->salesman;
            $quotation->discount_percent  = $request->discount_percent;
            $quotation->tax_type          = $request->tax_type;

            $inputsubtotal = $request->input('subtotal');
            $subtotal = str_replace(['Rp', '.', ','], '', $inputsubtotal);
            $quotation->subtotal          = $subtotal;

            $inputdiscount = $request->input('discount');
            $discount = str_replace(['Rp', '.', ','], '', $inputdiscount);
            $quotation->discount          = $discount;

            $inputtax = $request->input('tax');
            $tax = str_replace(['Rp', '.', ','], '', $inputtax);
            $quotation->tax               = $tax;

            $inputfreight = $request->input('freight');
            $freight = str_replace(['Rp', '.', ','], '', $inputfreight);
            $quotation->freight           = $freight;

            $inputTotalAmount = $request->input('total_amount');
            $totalAmount = str_replace(['Rp', '.', ','], '', $inputTotalAmount);
            $quotation->total_amount = $totalAmount; // Menggunakan variabel $totalAmount yang telah dibersihkan

            if ($request->hasFile('file')) {
                $file = $request->file('file'); // Ubah dari 'image_path' menjadi 'file'
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/lte/dist/qo', $fileName); // Simpan gambar ke direktori yang sesuai
                $quotation->file = $fileName;
            }
            $quotation->save();

            foreach ($request->item as $key => $items) {
                $quotationAdd['item']           = $items;
                $quotationAdd['quotation_no']   = $quotation->quotation_no;
                $quotationAdd['disc']           = $request->disc[$key];
                $quotationAdd['item_desc']      = $request->item_desc[$key];
                $quotationAdd['qty']            = $request->qty[$key];

                // Menghilangkan karakter 'Rp', ',', dan '.'
                $inputUnitPrice = str_replace(['Rp', ',', '.'], '', $request->input('unit_price')[$key]);
                $quotationAdd['unit_price'] = $inputUnitPrice;

                $quotationAdd['unit']           = $request->unit[$key];

                // Menghilangkan karakter 'Rp', ',', dan '.'
                $inputAmount = str_replace(['Rp', ',', '.'], '', $request->input('amount')[$key]);
                $quotationAdd['amount'] = $inputAmount;

		$quotationAdd['deskripsi'] = $request->deskripsi[$key];

                $quotationAdd['deskripsi'] = $request->deskripsi[$key];

                QuotationAdd::create($quotationAdd);
            }


            DB::commit();

            return redirect()->route('activities.quotation')->with('success', 'The Quotation has been successfully addedd.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('activities.createquotation')->with('error', 'Failed addedd quotation, Try again.');
        }
    }
    public function editquotation($quotation_no)
    {
        $customers = Customer::get();
        $tax_type = TaxType::get();
        $unit = Unit::get();
	$salesmen = Salesman::get();
        $no_katalog = NoKatalog::get();
        $user = User::get();
        $quotation     = DB::table('quotation')->where('quotation_no', $quotation_no)->first();
        $quotationJoin = DB::table('quotation')
            ->join('quotationadd', 'quotation.quotation_no', '=', 'quotationadd.quotation_no')
            ->select('quotation.*', 'quotationadd.*')
            ->where('quotationadd.quotation_no', $quotation_no)
            ->get();

        return view('activities.editquotation', compact('quotation', 'quotationJoin', 'user', 'unit', 'tax_type', 'customers', 'no_katalog','salesmen'));
    }
    public function deletequotationadd(Request $request)
    {
        DB::beginTransaction();
        try {
            $productId = $request->id;
            $totalProducts = QuotationAdd::count();

            if ($totalProducts > 1) {
                QuotationAdd::destroy($productId);

                DB::commit();
                return redirect()->back()->with('success', 'The product has been successfully deleted.');
            } else {
                DB::rollback();
                return redirect()->back()->with('error', 'Cannot delete products if only one remains.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occurred while deleting the product.');
        }
    }
    public function updatequotation(Request $request)
    {
        DB::beginTransaction();
        // Customer::where('company', $request->input('company_name'))
        //     ->update([
        //         'name' => $request->input('name'),
        //         'address' => $request->input('address'),
        //         'shipment' => $request->input('shipping_address'),
        //         'npwp' => $request->input('npwp'),
        //         'phone' => $request->input('phone'),
        //         'fax' => $request->input('fax'),
        //         'tax_address' => $request->input('tax_address'),
        //         'email' => $request->input('email'),
        //         // Tambahkan kolom lain sesuai kebutuhan
        //     ]);

        try {
            $update = [
                'quotation_no'      => $request->quotation_no,
                'company_name'      => $request->company_name,
                'name'              => $request->name,
                'date'              => $request->date,
                'address'           => $request->address,
                'npwp'              => $request->npwp,
                'phone'             => $request->phone,
                'fax'               => $request->fax,
                'tax_address'       => $request->tax_address,
                'email'             => $request->email,
                'confirmation'      => $request->confirmation,
                'type'              => $request->type,
                'description'       => $request->description,
                'sample'            => $request->sample,
                'ass_type'          => $request->ass_type,
                'qc_statement'      => $request->qc_statement,
                'packing_type'      => $request->packing_type,
                'top'               => $request->top,
                'net_days'          => $request->net_days,
                'ptp'               => $request->ptp,
                'dod'               => $request->dod,
                'shipping_address'  => $request->shipping_address,
                'valid'             => $request->valid,
                'mdp'               => $request->mdp,
                'salesman'          => $request->salesman,
                'discount_percent'  => $request->discount_percent,
                'tax_type'          => $request->tax_type,
                'subtotal'          => str_replace(['Rp', '.', ','], '', $request->subtotal),
                'discount'          => str_replace(['Rp', '.', ','], '', $request->discount),
                'tax'               => str_replace(['Rp', '.', ','], '', $request->tax),
                'freight'           => str_replace(['Rp', '.', ','], '', $request->freight),
                'total_amount'      => str_replace(['Rp', '.', ','], '', $request->total_amount),
            ];
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/lte/dist/qo', $fileName);

                $update['file'] = $fileName;
            }

            Quotation::where('quotation_no', $request->quotation_no)->update($update);

            // Hapus semua item yang terkait dengan quotation_no
            QuotationAdd::where('quotation_no', $request->quotation_no)->delete();

            // Tambahkan item baru
            foreach ($request->item as $key => $item) {
                $quotationAdd = [
                    'quotation_no' => $request->quotation_no,
                    'item'         => $item,
                    'item_desc'    => $request->item_desc[$key],
                    //'disc'         => $request->disc[$key],
                    'qty'          => $request->qty[$key],
                    'unit_price'   => str_replace(['Rp', ',', '.'], '', $request->unit_price[$key]),
                    'unit'         => $request->unit[$key],
                    'disc'         => str_replace(['Rp', ',', '.'], '', $request->disc[$key]),
                    'amount'       => str_replace(['Rp', ',', '.'], '', $request->amount[$key]),

                ];

                QuotationAdd::create($quotationAdd);
            }

            DB::commit();

            return redirect()->route('activities.quotation')->with('success', 'Quotation updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to update quotation. Please try again.');
        }
    }
    public function destroyquotation($id)
    {
        DB::beginTransaction();

        try {
            $quotation = Quotation::find($id);
            $quotation->quotationadd()->delete();
            $quotation->delete();

            DB::commit();

            return redirect()->route('activities.quotation')->with('success', 'The quotation has been successfully deleted.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('activities.quotation')->with('error', 'Failed to delete quotation. Please try again.');
        }
    }


    public function salesorder(Request $request)
    {
        // Get the search input from the request (if any)
        $search = $request->input('so_number');

        // If a search input exists, filter the salesorder by so_number
        $salesorder = DB::table('salesorder')
            ->when($search, function ($query, $search) {
                return $query->where('so_number', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $salesorderJoin = DB::table('salesorder')
            ->join('soadd', 'salesorder.so_number', '=', 'soadd.so_number')
            ->select('salesorder.*', 'soadd.*')
            ->orderBy('salesorder.created_at', 'desc')
            ->get();

        return view('activities.salesorder', compact('salesorder', 'salesorderJoin', 'search'));
    }

    public function viewsalesorder($so_number)
    {
        $salesorderJoin = DB::table('salesorder')
            ->join('soadd', 'salesorder.so_number', '=', 'soadd.so_number')
            ->select('salesorder.*', 'soadd.*')
            ->where('soadd.so_number', $so_number)
            ->get();
        return view('activities.viewsalesorder', compact('salesorderJoin'));
    }
    public function createso()
    {
        $kbli = Kblicode::get();
        $unit = Unit::get();
	$salesmen = Salesman::get();
        $no_katalog = NoKatalog::get();
        $tax_type = TaxType::get();
        $user = User::get();
        $producttype = ProductType::get();
        $order_unit = OrderUnit::get();
        $quotation  = Quotation::get();

        return view('activities.createso', compact('producttype', 'order_unit', 'user', 'tax_type', 'unit', 'kbli', 'quotation', 'no_katalog','salesmen'));
    }
    public function getQuotationData($quotation_no)
    {
        $quotation = DB::table('quotation')->where('quotation_no', $quotation_no)->first();

        $quotationJoin = DB::table('quotation')
            ->join('quotationadd', 'quotation.quotation_no', '=', 'quotationadd.quotation_no')
            ->select('quotation.*', 'quotationadd.*')
            ->where('quotationadd.quotation_no', $quotation_no)
            ->get();

        $result = compact('quotation', 'quotationJoin');

        return response()->json($result);
    }
    public function storeso(Request $request)
    {
        // Begin logging the input data for debugging
        Log::info('Store SO request data: ', $request->all());

        // Validate the input
        $validator = Validator::make($request->all(), [
            'so_number'         => 'required|unique:salesorder,so_number',
            'quotation_no'      => ['required_if:so_internal,false'], // Quotation No is only required if 'so_internal' is false (checkbox not checked)
            'po_number'         => 'required',
            'company_name'      => 'required',
            'name'              => 'required',
            'address'           => 'required',
            'phone'             => 'required',
            'order_unit'        => 'required',
            'sow_no'            => 'required',
            'tax_address'       => 'required',
            'npwp'              => 'nullable',
            'fax'               => 'required',
            'confirmation'      => 'required',
            'type'              => 'required',
            'sample'            => 'required',
            'ass_type'          => 'required',
            'qc_statement'      => 'required',
            'packing_type'      => 'required',
            'ptp'               => 'required',
            'dod'               => 'required|date',
            'shipping_address'  => 'required',
            'date'              => 'required|date',
            'top'               => 'required',
            'net_days'          => 'required',
            'fob'               => 'required',
            'ship_date'         => 'required|date',
            'salesman'          => 'required',
            'dp'                => 'required',
            'dp_percent'        => 'required',
            'file'              => 'nullable',
            'subtotal'          => 'required',
            'discount'          => 'required',
            'tax'               => 'required',
            'freight'           => 'required',
            'total_amount'      => 'required',
            'discount_percent'  => 'required',
            'tax_type'          => 'required',
            'description'       => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            Log::warning('Validation failed: ', $validator->errors()->toArray());

            // Pass validation errors to session as JSON
            return redirect()->route('activities.createso')
                ->withErrors($validator)
                ->withInput()
                ->with('validationErrors', json_encode($validator->messages()->toArray()))
                ->with('error', 'Validation failed. Please check the input fields.');
        }

        DB::beginTransaction();
        try {
            // Create the Sales Order
            $salesorder = new SalesOrder;
            $salesorder->so_number         = $request->so_number;
            $salesorder->quotation_no      = $request->input('quotation_no', null); // If no quotation_no, set to null
            $salesorder->company_name      = $request->company_name;
            $salesorder->name              = $request->name;
            $salesorder->address           = $request->address;
            $salesorder->phone             = $request->phone;
            $salesorder->order_unit        = $request->order_unit;
            $salesorder->sow_no            = $request->sow_no;
            $salesorder->tax_address       = $request->tax_address;
            $salesorder->email             = $request->email;
            $salesorder->npwp              = $request->npwp;
            $salesorder->fax               = $request->fax;
            $salesorder->confirmation      = $request->confirmation;
            $salesorder->type              = $request->type;
            $salesorder->sample            = $request->sample;
            $salesorder->ass_type          = $request->ass_type;
            $salesorder->qc_statement      = $request->qc_statement;
            $salesorder->packing_type      = $request->packing_type;
            $salesorder->ptp               = $request->ptp;
            $salesorder->dod               = $request->dod;
            $salesorder->shipping_address  = $request->shipping_address;
            $salesorder->date              = $request->date;
            $salesorder->top               = $request->top;
            $salesorder->net_days          = $request->net_days;
            $salesorder->fob               = $request->fob;
            $salesorder->ship_date         = $request->ship_date;
            $salesorder->po_number         = $request->po_number;
            $salesorder->salesman          = $request->salesman;
            $salesorder->dp                = $request->dp;
            $salesorder->dp_percent        = $request->dp_percent;

            // Handle the money inputs
            $subtotal = trim(str_replace(['Rp', '.', ','], '', $request->input('subtotal')));
            $salesorder->subtotal = $subtotal;

            $discount = trim(str_replace(['Rp', '.', ','], '', $request->input('discount')));
            $salesorder->discount = $discount;

            $tax = trim(str_replace(['Rp', '.', ','], '', $request->input('tax')));
            $salesorder->tax = $tax;

            $freight = trim(str_replace(['Rp', '.', ','], '', $request->input('freight')));
            $salesorder->freight = $freight;

            $totalAmount = trim(preg_replace('/[^\d]/', '', $request->input('total_amount')));
            $salesorder->total_amount = $totalAmount;
            $salesorder->discount_percent  = $request->discount_percent;
            $salesorder->tax_type          = $request->tax_type;
            $salesorder->description       = $request->description;

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/lte/dist/so', $fileName);
                $salesorder->file = $fileName;
            }

            $salesorder->save();

            // Log successful creation of the Sales Order
            Log::info('Sales Order created successfully: ', ['so_number' => $salesorder->so_number]);

            // Save the additional items in SalesOrderAdd and create orders for each item
            foreach ($request->item as $key => $items) {
                // Prepare SalesOrderAdd data
                $soAdd = [
                    'item'         => $items,
                    'so_number'    => $salesorder->so_number,
                    'item_desc'    => $request->item_desc[$key],
                    'qty'          => $request->qty[$key],
                    'unit'         => $request->unit[$key],
                    'unit_price'   => str_replace(['Rp', ',', '.'], '', $request->input('unit_price')[$key]),
                    'disc'         => $request->disc[$key],
                    'amount'       => (int) preg_replace('/[^\d]/', '', $request->input('amount')[$key]),
                    'product_type' => $request->product_type[$key],
                    'order_no'     => $request->order_no[$key],
                    'spec'         => $request->spec[$key],
                    'kbli'         => $request->kbli[$key],
                ];

                // Create the SalesOrderAdd record
                SalesOrderAdd::create($soAdd);

                // Prepare Order data for each item (this needs to be done in the same loop, but separately for each item)
                $orderData = [
                    'order_number'     => $request->order_no[$key], // Unique identifier
                    'so_number'        => $salesorder->so_number,
                    'quotation_number' => $salesorder->quotation_no,
                    'kbli_code'        => $request->kbli[$key],
                    'order_date'       => $salesorder->date,
                    'product_type'     => $request->product_type[$key],
                    'po_number'        => $salesorder->po_number,
                    'sale_price'       => preg_replace('/[^\d]/', '', $request->input('amount')[$key]), // Use 'amount' as the sale price
                    'information'      => $salesorder->description,
                    'order_status'     => 'Queue',
                    'customer'         => $salesorder->name,
                    'product'          => $request->item_desc[$key],
                    'qty'              => $request->qty[$key],
                    'dod'              => $salesorder->dod,
                    'dod_forecast'     => $salesorder->dod,
                    'sample'           => $salesorder->sample,
                    'dod_adj'          => $salesorder->dod
                ];

                // Use updateOrCreate for Order model to ensure that each order is unique by 'order_number'
                Order::updateOrCreate(
                    ['order_number' => $request->order_no[$key]], // Match on unique order number
                    $orderData // Data to insert or update
                );
            }

            DB::commit();

            return redirect()->route('activities.salesorder')->with('success', 'Sales Order added successfully');
        } catch (\Exception $e) {
            DB::rollback();

            // Log the error with detailed input data for debugging
            Log::error('Failed to create Sales Order: ' . $e->getMessage(), [
                'input_data' => $request->all()
            ]);

            return redirect()->route('activities.createso')->with('error', 'Failed to add Sales Order. Please try again! (check product section)')->withInput();
        }
    }


    public function editsalesorder($so_number)
    {
        try {
            Log::info('Entered editsalesorder method', ['so_number' => $so_number]);

            $kbli = Kblicode::get();
            Log::info('Fetched Kblicode');

            $unit = Unit::get();
            Log::info('Fetched Unit');

            $no_katalog = NoKatalog::get();
            Log::info('Fetched NoKatalog');

	    $salesmen = Salesman::get();
       	    Log::info('Fetched Salesmen');

            $tax_type = TaxType::get();
            Log::info('Fetched TaxType');

            $user = User::get();
            Log::info('Fetched User');

            $producttype = ProductType::get();
            Log::info('Fetched ProductType');

            $order_unit = OrderUnit::get();
            Log::info('Fetched OrderUnit');

            $quotation = Quotation::get();
            Log::info('Fetched Quotation');

            $salesorder = DB::table('salesorder')->where('so_number', $so_number)->first();
            Log::info('Fetched SalesOrder', ['salesorder' => $salesorder]);

            $salesorderJoin = DB::table('salesorder')
                ->join('soadd', 'salesorder.so_number', '=', 'soadd.so_number')
                ->select('salesorder.*', 'soadd.*')
                ->where('soadd.so_number', $so_number)
                ->get();
            Log::info('Fetched SalesOrderJoin', ['salesorderJoin' => $salesorderJoin]);

            return view('activities.editsalesorder', compact('producttype', 'order_unit', 'user','salesmen', 'tax_type', 'unit', 'kbli', 'quotation', 'salesorder', 'salesorderJoin', 'no_katalog'));
        } catch (\Exception $e) {
            Log::error('Error in editsalesorder method', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('An error occurred while processing the sales order.');
        }
    }
    public function deletesoadd(Request $request)
    {
        DB::beginTransaction();
        try {
            $productId = $request->id;
            $totalProducts = SalesOrderAdd::count();

            if ($totalProducts > 1) {
                SalesOrderAdd::destroy($productId);

                DB::commit();
                return redirect()->back()->with('success', 'The product has been successfully deleted.');
            } else {
                DB::rollback();
                return redirect()->back()->with('error', 'Cannot delete products if only one remains.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occurred while deleting the product.');
        }
    }
    public function updatesalesorder(Request $request)
    {
        DB::beginTransaction();

        try {
            $update = [
                'so_number'         => $request->so_number,
                'quotation_no'      => $request->quotation_no,
                'po_number'         => $request->po_number,
                'company_name'      => $request->company_name,
                'name'              => $request->name,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'order_unit'        => $request->order_unit,
                'sow_no'            => $request->sow_no,
                'tax_address'       => $request->tax_address,
                'email'             => $request->email,
                'npwp'              => $request->npwp,
                'fax'               => $request->fax,
                'confirmation'      => $request->confirmation,
                'type'              => $request->type,
                'sample'            => $request->sample,
                'ass_type'          => $request->ass_type,
                'qc_statement'      => $request->qc_statement,
                'packing_type'      => $request->packing_type,
                'ptp'               => $request->ptp,
                'dod'               => $request->dod,
                'shipping_address'  => $request->shipping_address,
                'date'              => $request->date,
                'top'               => $request->top,
                'net_days'          => $request->net_days,
                'fob'               => $request->fob,
                'ship_date'         => $request->ship_date,
                'salesman'          => $request->salesman,
                'dp'          => str_replace(['Rp', '.', ','], '', $request->dp),
                'dp_percent'        => $request->dp_percent,
                'subtotal'          => str_replace(['Rp', '.', ','], '', $request->subtotal),
                'discount'          => str_replace(['Rp', '.', ','], '', $request->discount),
                'tax'               => str_replace(['Rp', '.', ','], '', $request->tax),
                'freight'           => str_replace(['Rp', '.', ','], '', $request->freight),
                'total_amount'      => str_replace(['Rp', '.', ','], '', $request->total_amount),
                'discount_percent'  => $request->discount_percent,
                'tax_type'          => $request->tax_type,
                'description'       => $request->description,
            ];
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/lte/dist/so', $fileName);

                $update['file'] = $fileName;
            }

            SalesOrder::where('so_number', $request->so_number)->update($update);

            // Hapus semua item yang terkait dengan so_number
            SalesOrderAdd::where('so_number', $request->so_number)->delete();

            // Tambahkan item baru
            foreach ($request->item as $key => $item) {
                $salesorderAdd = [
                    'item'         => $item,
                    'so_number'    => $request->so_number,
                    'item_desc'    => $request->item_desc[$key],
                    'qty'          => $request->qty[$key],
                    'unit'         => $request->unit[$key],
                    'unit_price'   => str_replace(['Rp', ',', '.'], '', $request->unit_price[$key]),
                    'disc'         => str_replace(['Rp', ',', '.'], '', $request->disc[$key]),
                    'amount'       => str_replace(['Rp', ',', '.'], '', $request->amount[$key]),
                    'product_type' => $request->product_type[$key],
                    'order_no'     => $request->order_no[$key],
                    'spec'         => $request->spec[$key],
                    'kbli'         => $request->kbli[$key],
                ];

                SalesOrderAdd::create($salesorderAdd);
            }

            DB::commit();

            return redirect()->route('activities.salesorder')->with('success', 'Sales Order Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to update salesorder. Please try again.');
        }
    }
    public function destroyso($id)
    {
        DB::beginTransaction();

        try {
            $salesorder = SalesOrder::find($id);
            $salesorder->soadd()->delete();
            $salesorder->delete();
            DB::commit();
            return redirect()->route('activities.salesorder')->with('success', 'Sales Order Berhasil Dihapus.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('activities.salesorder')->with('error', 'Gagal menghapus Sales Order. Silakan coba lagi.');
        }
    }

    //order controller
    public function order(Request $request)
{
    $query = Order::notFinished()->notQCPass()->notDelivered();

    // Filter by order_number if provided
    if ($request->has('order_number')) {
        $order_number = $request->input('order_number');
        $query->where('order_number', 'LIKE', '%' . $order_number . '%');
    }
    
    // Filter by date range if both start_date and end_date are provided
    if ($request->has('start_date') && $request->has('end_date')) {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // Add one day to end_date to include all records from that day
        $end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));
        
        $query->whereBetween('created_at', [$start_date, $end_date_adjusted]);
    }
    // If only start_date is provided
    elseif ($request->has('start_date')) {
        $start_date = $request->input('start_date');
        $query->whereDate('created_at', '>=', $start_date);
    }
    // If only end_date is provided
    elseif ($request->has('end_date')) {
        $end_date = $request->input('end_date');
        $end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));
        $query->whereDate('created_at', '<', $end_date_adjusted);
    }

    $order = $query->orderBy('created_at', 'desc')->get();
    return view('activities.order', compact('order'));
}

public function viewOrder($order_number)
{
    // Get the specific order based on the order_number
    $order = Order::notFinished()->where('order_number', $order_number)->first();

    // Pass the order object to the view
    return view('activities.vieworder', compact('order'));
}

    public function createorder()
    {
        $soadd = SalesOrderAdd::get();
        $so = SalesOrder::get();
        $kbli_code = Kblicode::get();
        $so_number = SalesOrder::get();
        $customers = Customer::get();
        $quotation_no = Quotation::get();
        $producttype = ProductType::get();
        return view('activities.createorder', compact('soadd', 'so', 'kbli_code', 'quotation_no', 'producttype', 'so_number', 'customers'));
    }
    public function storeorder(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'order_number'      => 'required|unique:order,order_number',
                'so_number'         => 'required',
                'quotation_number'  => 'required',
                'kbli_code'         => 'required',
                'order_date'        => 'required',
                'product_type'      => 'required',
                'po_number'         => 'required',
                'sale_price'        => 'required',
                'customer'          => 'required',
                'product'           => 'required',
                'qty'               => 'required',
                'dod'               => 'required',
            ],
        );

        if ($validator->fails()) {
            return redirect()->route('activities.createorder')->withErrors($validator)->withInput();
        }

        $order['order_number'] = $request->order_number;
        $order['so_number'] = $request->so_number;
        $order['quotation_number'] = $request->quotation_number;
        $order['kbli_code'] = $request->kbli_code;
        $order['reff_number'] = $request->reff_number;
        $order['order_date'] = $request->order_date;
        $order['product_type'] = $request->product_type;
        $order['po_number'] = $request->po_number;
        $order['sale_price'] = $request->sale_price;
        $order['production_cost'] = $request->production_cost;
        $order['information'] = $request->information;
        $order['information2'] = $request->information2;
        $order['information3'] = $request->information3;
        $order['order_status'] = 'Queue';
        $order['customer'] = $request->customer;
        $order['product'] = $request->product;
        $order['qty'] = $request->qty;
        $order['dod'] = $request->dod;
        $order['dod_forecast'] = $request->dod_forecast;
        $order['sample'] = $request->sample;
        $order['material'] = $request->material;
        $order['catalog_number'] = $request->catalog_number;
        $order['material_cost'] = $request->material_cost;
        $order['dod_adj'] = $request->dod_adj;

        Order::create($order);

        return redirect()->route('activities.order')->with('success', 'Order added successfully');
    }
    public function editorder(Request $request, $id)
    {
        $soadd = SalesOrderAdd::get();
        $so = SalesOrder::get();
        $kbli_code = Kblicode::get();
        $so_number = SalesOrder::get();
        $customers = Customer::get();
        $quotation_no = Quotation::get();
        $producttype = ProductType::get();

        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('activities.order')->with('error', 'Order not Found');
        }
        return view('activities.editorder', compact(
            'order',
            'soadd',
            'so',
            'kbli_code',
            'so_number',
            'customers',
            'quotation_no',
            'producttype',
        ));
    }
    public function updateorder(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'order_number'      => 'required',
                'so_number'         => 'required',
                'quotation_number'  => 'required',
                'kbli_code'         => 'required',
                'reff_number'       => 'required',
                'order_date'        => 'required',
                'product_type'      => 'required', // Perbaikan nama field
                'po_number'         => 'required',
                'sale_price'        => 'required',
                'production_cost'   => 'required',
                'information'       => 'nullable',
                'information2'       => 'nullable',
                'information3'       => 'nullable',
                'order_status'      => 'required',
                'customer'          => 'required',
                'product'           => 'required',
                'qty'               => 'required',
                'dod'               => 'required',
                'dod_forecast'      => 'required',
                'sample'            => 'required',
                'material'          => 'required',
                'catalog_number'    => 'required',
                'material_cost'     => 'required',
                'dod_adj'           => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('activities.editorder', ['id' => $id])->withErrors($validator)->withInput();
        }

        $order = [
            'order_number'      => $request->order_number,
            'so_number'         => $request->so_number,
            'quotation_number'  => $request->quotation_number,
            'kbli_code'         => $request->kbli_code,
            'reff_number'       => $request->reff_number,
            'order_date'        => $request->order_date,
            'product_type'      => $request->product_type, // Perbaikan nama field
            'po_number'         => $request->po_number,
            'sale_price'        => $request->sale_price,
            'production_cost'   => $request->production_cost,
            'information'       => $request->information,
            'information2'      => $request->information2,
            'information3'      => $request->information3,
            'order_status'      => $request->order_status,
            'customer'          => $request->customer,
            'product'           => $request->product,
            'qty'               => $request->qty,
            'dod'               => $request->dod,
            'dod_forecast'      => $request->dod_forecast,
            'sample'            => $request->sample,
            'material'          => $request->material,
            'catalog_number'    => $request->catalog_number,
            'material_cost'     => $request->material_cost,
            'dod_adj'           => $request->dod_adj,
        ];

        Order::whereId($id)->update($order);
        return redirect()->route('activities.order')->with('success', 'Order Updated');
    }
    public function deleteorder(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('activities.order')->with('error', 'Order not found!');
        }

        $order->delete();

        return redirect()->route('activities.order')->with('success', 'Order data successfully deleted');
    }




    //activities - customer
    public function customer(Request $request)
{
    // Get the customer number filter from the request
    $customer_no = $request->input('customer_no');

    // Check if there is a filter input
    if ($customer_no) {
        // Apply the filter to get only customers that match the input customer number
        $customer = Customer::where('customer_no', 'like', '%' . $customer_no . '%')->get();
    } else {
        // If no filter is provided, return all customers
        $customer = Customer::get();
    }

    return view('activities.customer', compact('customer', 'customer_no'));
}
    public function createcustomer()
{
    $nextCustomerNo = $this->generateCustomerNumber();
    return view('activities.createcustomer', compact('nextCustomerNo'));
}
    public function storecustomer(Request $request)
{
    $validator = Validator::make(
        $request->all(),
        [
            'company' => 'required|unique:customer,company',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'tax_address' => 'required',
            'shipment' => 'required',
            'customer_no' => 'nullable',
            'province' => 'nullable',
            'zipcode' => 'nullable',
            'country' => 'nullable',
            'cp' => 'nullable',
            'webpage' => 'nullable',
        ],
        [
            'company.unique' => 'Company name has already been taken.',
        ]
    );

    if ($validator->fails()) {
        return redirect()->route('activities.createcustomer')->withErrors($validator)->withInput();
    }

    // Generate customer number if not provided
    $customer_no = $request->customer_no;
    if (empty($customer_no)) {
        $customer_no = $this->generateCustomerNumber();
    }

    $customer = [
        'customer_no' => $customer_no,
        'company' => $request->company,
        'name' => $request->name,
        'address' => $request->address,
        'city' => $request->city,
        'phone' => $request->phone,
        'fax' => $request->fax,
        'email' => $request->email,
        'npwp' => $request->npwp,
        'tax_address' => $request->tax_address,
        'shipment' => $request->shipment,
        'province' => $request->province,
        'zipcode' => $request->zipcode,
        'country' => $request->country,
        'cp' => $request->cp,
        'webpage' => $request->webpage,
    ];

    Customer::create($customer);

    return redirect()->route('activities.customer')->with('success', 'Customer Added');
}

/**
 * Generate the next sequential customer number
 *
 * @return string
 */
private function generateCustomerNumber()
{
    // Find the last customer number
    $lastCustomer = Customer::orderBy('id', 'desc')->first();

    if ($lastCustomer && $lastCustomer->customer_no) {
        // Extract the numeric part and increment
        $lastNumber = intval(substr($lastCustomer->customer_no, -4));
        $newNumber = $lastNumber + 1;
    } else {
        // Start from 1 if no previous customers
        $newNumber = 1;
    }

    // Format as 4-digit zero-padded number
    return sprintf('%04d', $newNumber);
}

    public function editcustomer(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('activities.customer')->with('error', 'Customer not found!');
        }

        return view('activities.editcustomer', compact('customer'));
    }
    public function updatecustomer(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'company'       => 'required',
                'name'          => 'required',
                'address'       => 'required',
                'city'          => 'required',
                'phone'         => 'required',
                'tax_address'   => 'required',
                'shipment'      => 'required',
                'customer_no'      => 'nullable',
                'province'      => 'nullable',
                'zipcode'      => 'nullable',
                'country'      => 'nullable',
                'cp'      => 'nullable',
                'webpage'      => 'nullable',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('activities.editcustomer')->withErrors($validator)->withInput();
        }

        $customer['company'] = $request->company;
        $customer['name'] = $request->name;
        $customer['address'] = $request->address;
        $customer['city'] = $request->city;
        $customer['phone'] = $request->phone;
        $customer['fax'] = $request->fax;
        $customer['email'] = $request->email;
        $customer['npwp'] = $request->npwp;
        $customer['tax_address'] = $request->tax_address;
        $customer['shipment'] = $request->shipment;
        $customer['customer_no'] = $request->customer_no;
        $customer['province'] = $request->province;
        $customer['zipcode'] = $request->zipcode;
        $customer['country'] = $request->country;
        $customer['cp'] = $request->cp;
        $customer['webpage'] = $request->webpage;

        Customer::whereId($id)->update($customer);

        return redirect()->route('activities.customer')->with('success', 'Customer Updated');
    }

    public function deletecustomer(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('activities.customer')->with('error', 'Customer not found!');
        }

        $customer->delete();

        return redirect()->route('activities.customer')->with('success', 'Customer data successfully deleted');
    }


    // public function item()
    // {
    //     $order = Order::get();
    //     return view('activities.item', compact('order'));
    // }

public function item(Request $request)
    {
        // Get the order number filter from the request
        $filterOrderNumber = $request->input('order_number');
    
        // Get all order numbers from the Order model where order_status is not 'Finished'
        $orderNumbers = Order::where('order_status', '!=', 'Finished')
            ->notQCPass()
            ->notDelivered()
            ->pluck('order_number') // Extract only the order_number values
            ->toArray(); // Convert collection to array
    
        // Filter items based on the filter order number, if provided, and order by date descending
        $itemQuery = DB::table('item')
            ->whereIn('order_number', $orderNumbers)
            ->orderBy('created_at', 'desc'); // Order by date in descending order
    
        if ($filterOrderNumber) {
            // If a filter is applied, use the filter value
            $itemQuery->where('order_number', $filterOrderNumber);
        }
    
        // Get the filtered items
        $item = $itemQuery->get();
    
        // Filter joined items based on the filter order number, if provided, and order by date descending
        $itemJoinQuery = DB::table('item')
            ->join('itemadd', 'item.order_number', '=', 'itemadd.order_number')
            ->whereIn('item.order_number', $orderNumbers)
            ->orderBy('item.created_at', 'desc'); // Order by date in descending order
    
        if ($filterOrderNumber) {
            $itemJoinQuery->where('item.order_number', $filterOrderNumber);
        }
    
        // Get the filtered joined items
        $itemJoin = $itemJoinQuery->get();
    
        return view('activities.item', compact('item', 'itemJoin', 'filterOrderNumber'));
    }


    public function viewitem($order_number)
    {
        $item = DB::table('item')->get();
        $itemJoin = DB::table('item')
            ->join('itemadd', 'item.order_number', '=', 'itemadd.order_number')
            ->select('item.*', 'itemadd.*')
            ->where('itemadd.order_number', $order_number)
            ->get();
        return view('activities.viewitem', compact('item', 'itemJoin'));
    }
    public function createitem()
    {
        $material   = Material::get();
        $kode_log = StandartpartAPI::whereIn('kd_akun', ['131110', '131120', '131130'])
            ->select('kode_log') // Select only the 'kode_log' field
            ->distinct()         // Ensure distinct 'kode_log' values
            ->get();
        $standardParts = StandartpartAPI::whereIn('kd_akun', ['131110', '131120', '131130'])->get();
        $order = Order::where('order_status', '!=', 'Finished')->get();
        return view('activities.createitem', compact('material', 'order', 'standardParts', 'kode_log'));
    }
    public function storeitem(Request $request)
    {
        $request->validate([
            'order_number'  => 'required',
            'so_number'     => 'required',
            'product'       => 'required',
            'company_name'  => 'required',
            'dod'           => 'required',
        ]);

        DB::beginTransaction();
        try {
            Log::info('Starting to save item');
            $item = new Item;
            $item->order_number = $request->order_number;
            $item->so_number = $request->so_number;
            $item->product = $request->product;
            $item->company_name = $request->company_name;
            $item->dod = $request->dod;
            $item->save();

            Log::info('Item saved successfully', ['item' => $item]);

            foreach ($request->item as $key => $items) {
                // Logging to check the existence of array elements
                Log::info('Processing item index', ['key' => $key]);
                Log::info('Request data', [
                    'dod_item' => $request->dod_item,
                    'id_item' => $request->id_item,
                    'no_item' => $request->no_item,
                    'material' => $request->material,
                    'weight' => $request->weight,
                    'length' => $request->length,
                    'width' => $request->width,
                    'thickness' => $request->thickness,
                    'ass_drawing' => $request->ass_drawing,
                    'drawing_no' => $request->drawing_no,
                    'nos' => $request->nos,
                    'nob' => $request->nob,
                    'issued_item' => $request->issued_item,
                    'material_cost' => $request->material_cost,
                ]);

                if (
                    !isset($request->dod_item[$key]) || !isset($request->id_item[$key]) || !isset($request->no_item[$key]) ||
                    !isset($request->material[$key]) || !isset($request->weight[$key]) || !isset($request->length[$key]) ||
                    !isset($request->width[$key]) || !isset($request->thickness[$key]) || !isset($request->ass_drawing[$key]) ||
                    !isset($request->drawing_no[$key]) || !isset($request->nos[$key]) || !isset($request->nob[$key]) ||
                    !isset($request->issued_item[$key])
                ) {
                    throw new \Exception("Missing array index for key $key");
                }

                if (!isset($request->material_cost[$key])) {
                    Log::error('Material cost is missing for key', ['key' => $key]);
                    throw new \Exception("Material cost is missing for key $key");
                }

                $itemAdd = [
                    'item'        => $items,
                    'dod_item'    => $request->dod_item[$key],
                    'id_item'     => $request->id_item[$key],
                    'no_item'     => $request->no_item[$key],
                    'order_number' => $item->order_number,
                    'material'    => $request->material[$key],
                    'weight'      => $request->weight[$key],
                    'length'      => $request->length[$key],
                    'width'       => $request->width[$key],
                    'thickness'   => $request->thickness[$key],
                    'ass_drawing' => $request->ass_drawing[$key],
                    'drawing_no'  => $request->drawing_no[$key],
                    'nos'         => $request->nos[$key],
                    'nob'         => $request->nob[$key],
                    'issued_item' => $request->issued_item[$key],
                    'material_cost' => $request->material_cost[$key],
		    'status' => 'Queue',
                ];

                Log::info('Saving item addition', ['itemAdd' => $itemAdd]);
                ItemAdd::create($itemAdd);
            }

            DB::commit();
            Log::info('Transaction committed successfully');
            return redirect()->route('activities.item')->with('success', 'Item Data Saved Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to save item', ['exception' => $e]);
            return redirect()->route('activities.createitem')->with('error', 'Failed to Save Item');
        }
    }


    public function editItem($orderNumber)
    {
        // Mengambil data material seperti sebelumnya
        $material = Material::get();
    
        // Mengambil kode log berdasarkan akun tertentu
        $kode_log = StandartpartAPI::whereIn('kd_akun', ['131110', '131120', '131130'])
            ->select('kode_log') // Select only the 'kode_log' field
            ->distinct()         // Ensure distinct 'kode_log' values
            ->get();
    
        // Mengambil data standar parts
        $standardParts = StandartpartAPI::whereIn('kd_akun', ['131110', '131120', '131130'])->get();
    
        // Mengambil data order yang belum selesai
        $order = Order::where('order_status', '!=', 'Finished')->get();
    
        // Mengambil data item utama berdasarkan order number
        $item = ItemAdd::where('order_number', $orderNumber)->firstOrFail();
    
        // Mengambil detail item terkait dengan order number
        $itemDetails = ItemAdd::where('order_number', $orderNumber)->get(); // Pastikan model ItemDetail sesuai dengan struktur database Anda
    
        return view('activities.edititem', compact('material', 'order', 'standardParts', 'kode_log', 'item', 'itemDetails' ,'orderNumber'));
    }


    public function updateitem(Request $request)
    {
        // Validate the request
        $request->validate([
            'order_number' => 'required|string',
            'id_item'      => 'required|array',
            'no_item'      => 'required|array',
            'item'         => 'required|array',
        ]);
    
        DB::beginTransaction();
        try {
            // Log the request data and order number
            Log::info('Starting updateitem process', ['request' => $request->all(), 'order_number' => $request->order_number]);
    
            // Retrieve existing item additions for the given order_number
            $existingItems = ItemAdd::where('order_number', $request->order_number)->get()->keyBy('id_item');
            Log::info('Existing items retrieved from the database', ['existingItems' => $existingItems]);
    
            // Iterate through the submitted items
            foreach ($request->id_item as $key => $idItem) {
                if ($existingItems->has($idItem)) {
                    // Update existing item
                    $itemAdd = $existingItems->get($idItem);
                    $itemAdd->update([
                        'item'         => $request->item[$key],
                        'dod_item'     => $request->dod_item[$key] ?? null,
                        'no_item'      => $request->no_item[$key] ?? null,
                        'material'     => $request->material[$key] ?? null,
                        'weight'       => $request->weight[$key] ?? null,
                        'length'       => $request->length[$key] ?? null,
                        'width'        => $request->width[$key] ?? null,
                        'thickness'    => $request->thickness[$key] ?? null,
                        'ass_drawing'  => $request->ass_drawing[$key] ?? null,
                        'drawing_no'   => $request->drawing_no[$key] ?? null,
                        'nos'          => $request->nos[$key] ?? null,
                        'nob'          => $request->nob[$key] ?? null,
                        'issued_item'  => $request->issued_item[$key] ?? null,
                        'material_cost'  => $request->material_cost[$key] ?? null,
                    ]);
                    Log::info('Updated item', ['id_item' => $idItem, 'updatedData' => $request->all()]);
                } else {
                    // Create new item
                    ItemAdd::create([
                        'item'         => $request->item[$key],
                        'dod_item'     => $request->dod_item[$key] ?? null,
                        'id_item'      => $idItem,
                        'no_item'      => $request->no_item[$key] ?? null,
                        'order_number' => $request->order_number,
                        'material'     => $request->material[$key] ?? null,
                        'weight'       => $request->weight[$key] ?? null,
                        'length'       => $request->length[$key] ?? null,
                        'width'        => $request->width[$key] ?? null,
                        'thickness'    => $request->thickness[$key] ?? null,
                        'ass_drawing'  => $request->ass_drawing[$key] ?? null,
                        'drawing_no'   => $request->drawing_no[$key] ?? null,
                        'nos'          => $request->nos[$key] ?? null,
                        'nob'          => $request->nob[$key] ?? null,
                        'issued_item'  => $request->issued_item[$key] ?? null,
                        'material_cost'  => $request->material_cost[$key] ?? null,
                    ]);
                    Log::info('Created new item', ['id_item' => $idItem, 'createdData' => $request->all()]);
                }
            }
    
            // Handle deletions
            $submittedIds = collect($request->id_item)->filter()->toArray();
            $itemsToDelete = $existingItems->keys()->diff($submittedIds);
            Log::info('Items to be deleted', ['ids' => $itemsToDelete]);
            ItemAdd::whereIn('id_item', $itemsToDelete)->delete();
    
            DB::commit();
            Log::info('Successfully updated items', ['order_number' => $request->order_number]);
            return redirect()->route('activities.item')->with('success', 'Item Successfully Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating items', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Failed to Update Item. Please check logs for details.');
        }
    }
public function deleteitemadd(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = $request->id;
            $total = ItemAdd::count();
            if ($id > 1) {
                ItemAdd::destroy($id);
                DB::commit();
                return redirect()->back()->with('success', 'Items Successfully Delete');
            } else {
                DB::rollBack();
                return redirect()->back()->with('error', 'Failed, Cannot Delete Only 1 Item');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to Delete');
        }
    }
    public function destroyitem($id)
    {
        DB::beginTransaction();
        try {
            $item = Item::find($id);
            $item->itemadd()->delete();
            $item->delete();
            DB::commit();
            return redirect()->route('activities.item')->with('success', 'Item Delete Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('activities.item')->with('error', 'Failed to Delete Item');
        }
    }
    public function getOrderData(Request $request)
    {
        $orderNumber = $request->query('order_number');
        $order = Order::where('order_number', $orderNumber)->first();
        $items = Item::where('order_number', $orderNumber)->get(['no_item']); // Adjust according to your schema

        if ($order) {
            return response()->json([
                'so_number' => $order->so_number,
                'product' => $order->product,
                'customer' => $order->customer,
                'dod' => $order->dod,
                'items' => $items
            ]);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }
    public function getItemData(Request $request)
    {
        $noItem = $request->query('no_item');
        $item = ItemAdd::where('no_item', $noItem)->first();

        if ($item) {
            return response()->json([
                'drawing_no' => $item->drawing_no,
                'nob' => $item->nob,
                'dod_item' => $item->dod_item,
                'nos' => $item->nos,
                'item' => $item->item,
                'material' => $item->material,
                'weight' => $item->weight,
                'issued_item' => $item->issued_item,
            ]);
        } else {
            return response()->json(['error' => 'Item not found'], 404);
        }
    }


    public function processing(Request $request)
    {
        // Get all order numbers from the Order model where order_status is not 'Finished'
        $orderNumbers = Order::where('order_status', '!=', 'Finished')
                    ->notQCPass()
                    ->notDelivered()
                    ->pluck('order_number') // Extract only the order_number values
                    ->toArray(); // Ensure it is a flat array    // Check if the request has an order_number filter
        $query = ProcessingAdd::whereIn('order_number', $orderNumbers);

        if ($request->has('order_number') && !empty($request->order_number)) {
            $query->where('order_number', $request->order_number);
        }

        // Get the filtered results
        $processing = $query->orderBy('created_at', 'desc')->get();

        // Return the view with filtered data and the current filter
        return view('activities.processing', compact('processing'))->with('order_number', $request->order_number);
    }

    public function showprocessing($orderNumber)
    {
        $processing = ProcessingAdd::where('order_number', $orderNumber)->get();
        $machines = Machine::all(); // Get all machines
    
        return view('activities.viewprocessing', compact('processing', 'machines', 'orderNumber'));
    }

    public function bulkupdateprocessing(Request $request)
    {
        try {
            // Retrieve the order number from the request
            $orderNumber = $request->input('order_number');
    
            // Validate that the order number exists
            if (!$orderNumber) {
                return response()->json(['success' => false, 'message' => 'Order number is required.']);
            }
    
            // Separate new rows (new_*) from existing rows
            $newRows = [];
            $existingRows = [];
    
            foreach ($request->all() as $key => $data) {
                if (is_array($data)) {
                    foreach ($data as $id => $value) {
                        if (str_starts_with($id, 'new_')) {
                            $newRows[$id] = $data; // Collect new rows
                        } else {
                            $existingRows[$id] = $data; // Collect existing rows
                        }
                    }
                }
            }
    
            // Handle new rows
            foreach ($newRows as $id => $data) {
                $barcodeId = $this->generateBarcodeId($orderNumber, $id);
                $processingId = uniqid('proc_'); // Generate a unique processing ID
    
                // Save the new row to the database
                ProcessingAdd::create([
                    'nop' => $request->input("nop.$id"),
                    'item_number' => $request->input("item_number.$id"),
                    'machine' => $request->input("machine.$id"),
                    'operation' => $request->input("operation.$id"),
                    'estimated_time' => $request->input("estimated_time.$id"),
                    'mach_cost' => $request->input("mach_cost.$id"),
                    'date_wanted' => $request->input("date_wanted.$id"),
                    'barcode_id' => $barcodeId, // Add generated barcode_id
                    'order_number' => $orderNumber, // Add order_number
                    'processing_id' => $processingId, // Add generated processing_id
                ]);
            }
    
            // Handle existing rows
            foreach ($existingRows as $id => $data) {
                // Check if the record exists
                $processingRecord = ProcessingAdd::find($id);
                if (!$processingRecord) {
                    \Log::warning("Record with ID $id not found for update.");
                    continue; // Skip this iteration if the record doesn't exist
                }
    
                // Update the existing row
                $updateData = [
                    'nop' => $request->input("nop.$id"),
                    'item_number' => $request->input("item_number.$id"),
                    'machine' => $request->input("machine.$id"),
                    'operation' => $request->input("operation.$id"),
                    'estimated_time' => $request->input("estimated_time.$id"),
                    'mach_cost' => $request->input("mach_cost.$id"),
                    'date_wanted' => $request->input("date_wanted.$id"),
                ];
    
                // Ensure processing_id is set for existing rows
                if (!$processingRecord->processing_id) {
                    $updateData['processing_id'] = uniqid('proc_');
                }
    
                ProcessingAdd::where('id', $id)->update($updateData);
            }
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function bulkdeleteprocessing(Request $request)
    {
        try {
            $deleteIds = $request->input('delete_ids');
    
            if (empty($deleteIds)) {
                return response()->json(['success' => false, 'message' => 'No rows selected for deletion.']);
            }
    
            // Filter out new rows (new_*) since they don't exist in the database
            $existingIds = array_filter($deleteIds, function ($id) {
                return !str_starts_with($id, 'new_');
            });
    
            // Delete the rows that exist in the database
            if (!empty($existingIds)) {
                ProcessingAdd::whereIn('id', $existingIds)->delete();
            }
    
            return response()->json(['success' => true, 'message' => 'Selected rows deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    

    
    
    
    


    public function createprocessing()
    {
	$orders = Order::notQCPass()
                ->notDelivered()
                ->get();

        $material   = Material::get();
        $machine    = Machine::get();
        $items    = ItemAdd::get();

        return view('activities.createprocessing', compact('orders', 'material', 'machine', 'items'));
    }

    public function getMachineCost($machineName)
    {
        $machine = Machine::where('machine_name', $machineName)->first();
        if ($machine) {
            $cost = $machine->mach_cost_per_hour;
            Log::debug('Machine cost for ' . $machineName . ': ' . $cost);
            return response()->json(['cost' => $cost]);
        }
        Log::debug('Machine not found for ' . $machineName);
        return response()->json(['cost' => 0]);
    }

    public function getMachineOperation($machineName)
    {
        $machine = Machine::where('machine_name', $machineName)->first();
        if ($machine) {
            $pro = $machine->process;
            Log::debug('Machine Operation for ' . $machineName . ': ' . $pro);
            return response()->json(['pro' => $pro]);
        }
        Log::debug('Machine not found for ' . $machineName);
        return response()->json(['pro' => 'operation not found']);
    }

    public function getItemsByOrderNumber($orderNumber)
    {
        $items = ItemAdd::where('order_number', $orderNumber)->get();
        return response()->json($items);
    }

   public function getMachineDetails(Request $request)
    {
        $machineName = $request->input('machine_name');
        $machine = Machine::where('machine_name', $machineName)->first();

        if ($machine) {
            return response()->json([
                'process' => $machine->process,
                'mach_cost_per_hour' => $machine->mach_cost_per_hour,
                'labor_cost' => $machine->labor_cost,
            ]);
        } else {
            return response()->json(['error' => 'Machine not found'], 404);
        }
    }

    public function storeprocessing(Request $request)
    {
        Log::info('StoreProcess method called', ['request' => $request->all()]);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'order_number' => 'required',
            'no_item' => 'required',
            'nop.*' => 'required|integer|min:1',
            'machine_name.*' => 'required|string|max:255',
            'operation.*' => 'required|string|max:255',
            'est_time.*' => 'required|numeric|min:0',
            'dod.*' => 'required|date',
            'machine_cost.*' => 'required|numeric|min:0',
            'labor_cost.*' => 'required|numeric|min:0',
            'total.*' => 'required|numeric|min:0',
        ]);

        Log::info('Validation rules applied');

        // Check if validation fails
        if ($validator->fails()) {
            Log::warning('Validation failed', ['errors' => $validator->errors()]);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Log::info('Validation passed');

        // Ensure all arrays have the same length
        $arrays = [
            'nop' => $request->nop,
            'machine_name' => $request->machine_name,
            'operation' => $request->operation,
            'est_time' => $request->est_time,
            'dod' => $request->dod,
            'machine_cost' => $request->machine_cost,
            'labor_cost' => $request->labor_cost,
            'total' => $request->total
        ];

        $arrayLengths = array_map('count', $arrays);
        if (count(array_unique($arrayLengths)) > 1) {
            Log::error('Array lengths do not match', ['arrayLengths' => $arrayLengths]);
            return redirect()->back()->withErrors('Array lengths do not match. Please ensure all input fields are correctly filled out.')->withInput();
        }

        // Iterate over each set of item details and create process entries
        foreach ($request->nop as $index => $nop) {
            Log::info('Processing item', [
                'index' => $index,
                'order_number' => $request->order_number,
                'item_number' => $request->no_item,
                'nop' => $nop,
                'machine' => $request->machine_name[$index],
                'operation' => $request->operation[$index],
                'estimated_time' => $request->est_time[$index],
                'date_wanted' => $request->dod[$index],
                'mach_cost' => $request->machine_cost[$index],
                'labor_cost' => $request->labor_cost[$index],
                'total' => $request->total[$index],
            ]);

            $processing_id = uniqid();
            $barcode_id = $this->generateBarcodeId($request->order_number, $index);

            ProcessingAdd::create([
                'processing_id' => $processing_id,
                'order_number' => $request->order_number,
                'item_number' => $request->no_item,
                'nop' => $nop,
                'machine' => $request->machine_name[$index],
                'operation' => $request->operation[$index],
                'estimated_time' => $request->est_time[$index],
                'date_wanted' => $request->dod[$index],
                'mach_cost' => $request->machine_cost[$index],
                'labor_cost' => $request->labor_cost[$index],
                'total' => $request->total[$index],
                'barcode_id' => $barcode_id
            ]);

            Log::info('Processing item saved', ['index' => $index, 'barcode_id' => $barcode_id]);
        }

        // Redirect with success message
        Log::info('All items processed successfully');
        return redirect()->route('activities.processing')->with('success', 'Process(es) added successfully.');
    }

    /**
     * Generate a structured barcode ID.
     *
     * @param string $orderNumber
     * @param int $index
     * @return string
     */
    private function generateBarcodeId($orderNumber, $index)
    {
        $date = date('Ymd');
        $uniqueId = strtoupper(uniqid());
        return "{$orderNumber}-{$date}-{$index}-{$uniqueId}";
    }


    public function editprocessing($id)
    {
        $processing = ProcessingAdd::find($id);
        if (!$processing) {
            return redirect()->route('activities.processing')->with('error', 'Processing entry not found.');
        }

        $order = Order::where('order_status', '!=', 'Finished')->get();
        $material = Material::get();
        $machine = Machine::get();
        $items = ItemAdd::get();
        $item = ItemAdd::get();

        return view('activities.editprocessing', compact('processing', 'order', 'material', 'machine', 'items', 'item'));
    }
    public function updateprocessing(Request $request, $id)
    {
        Log::info('UpdateProcess method called', ['request' => $request->all()]);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'order_number' => 'required',
            'no_item' => 'required',
            'nop' => 'required|integer|min:1',
            'machine_name' => 'required|string|max:255',
            'operation' => 'required|string|max:255',
            'est_time' => 'required|numeric|min:0',
            'dod' => 'required|date',
            'machine_cost' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the processing entry
        $processing = ProcessingAdd::find($id);
        if (!$processing) {
            return redirect()->route('activities.processing')->with('error', 'Processing entry not found.');
        }

        // Update the processing entry
        $processing->update([
            'order_number' => $request->order_number,
            'item_number' => $request->no_item,
            'nop' => $request->nop,
            'machine' => $request->machine_name,
            'operation' => $request->operation,
            'estimated_time' => $request->est_time,
            'date_wanted' => $request->dod,
            'mach_cost' => $request->machine_cost,
            'total' => $request->total,
        ]);

        // Redirect with success message
        return redirect()->route('activities.processing')->with('success', 'Processing entry updated successfully.');
    }
    public function deleteprocessing($id)
    {
        // Find the processing entry by its ID
        $processing = ProcessingAdd::find($id);

        // Check if the entry exists
        if (!$processing) {
            return redirect()->route('activities.processing')->with('error', 'Processing entry not found.');
        }

        // Delete the entry
        $processing->delete();

        // Redirect with success message
        return redirect()->route('activities.processing')->with('success', 'Processing entry deleted successfully.');
    }

    public function getItemAddByOrderNo(Request $request)
    {
        $orderNumber = $request->input('order_number');
        $itemAddData = ItemAdd::where('order_no', $orderNumber)->get();

        return response()->json($itemAddData);
    }



    // activities - standartpart
    public function standartpartindex(Request $request)
{
    // Get the filter value from the request
    $filterOrderNumber = $request->input('order_number');

    // Get all order numbers from the Order model where order_status is not 'Finished'
    $orderNumbers = Order::notQCPass()
        ->notDelivered()
        ->pluck('order_number');

    // Initialize empty collections to return when no data is found
    $standartpart = collect();
    $standartpartJoin = collect();
    $noDataFound = true;

    // Check if order_number is provided and exists in the available orderNumbers
    if ($filterOrderNumber) {
        // If the filtered order_number does not exist in the available list, return empty results
        if (!$orderNumbers->contains($filterOrderNumber)) {
            return view('activities.standartpart', compact('standartpart', 'standartpartJoin', 'noDataFound'));
        }

        // Filter the queries by the specific order_number and order by id descending
        $standartpartQuery = DB::table('standart_part')
            ->where('order_number', $filterOrderNumber)
            ->orderBy('id', 'desc');

        $standartpartJoinQuery = DB::table('standart_part')
            ->join('standart_partadd', 'standart_part.order_number', '=', 'standart_partadd.order_number')
            ->where('standart_part.order_number', $filterOrderNumber)
            ->orderBy('standart_part.id', 'desc');
    } else {
        // If no filter is applied, query all relevant records and order by id descending
        $standartpartQuery = DB::table('standart_part')
            ->whereIn('order_number', $orderNumbers)
            ->orderBy('id', 'desc');

        $standartpartJoinQuery = DB::table('standart_part')
            ->join('standart_partadd', 'standart_part.order_number', '=', 'standart_partadd.order_number')
            ->whereIn('standart_part.order_number', $orderNumbers)
            ->orderBy('standart_part.id', 'desc');
    }

    // Fetch the filtered data
    $standartpart = $standartpartQuery->get();
    $standartpartJoin = $standartpartJoinQuery
        ->select('standart_part.*', 'standart_partadd.*')
        ->get();

    // Check if both tables have no data
    $noDataFound = $standartpart->isEmpty() && $standartpartJoin->isEmpty();

    // Return the view with the filtered data or empty result if no matching order_number
    return view('activities.standartpart', compact('standartpart', 'standartpartJoin', 'noDataFound'));
}

    public function viewstandartpart($order_number)
    {
        $quotationJoin = DB::table('standart_part')
            ->join('standart_partadd', 'standart_part.order_number', '=', 'standart_partadd.order_number')
            ->select('standart_part.*', 'standart_partadd.*')
            ->where('standart_partadd.order_number', $order_number)
            ->get();
        return view('activities.viewstandartpart', compact('standartpartJoin'));
    }

    public function getPartDetails($no_barcode)
    {
        $part = StandartpartAPI::where('no_barcode', $no_barcode)->first();
        return response()->json($part);
    }

    public function createstandartpart()
    {
        $orders = Order::where('order_status', '!=', 'Finished')
               ->notQCPass()
               ->notDelivered()
               ->get();

        $items = ItemAdd::get();
        $standardParts = StandartpartAPI::whereIn('kd_akun', [
            '131210', '131220', '131240', '135110', '135120', '135220',
            '136100', '136200', '136310', '136320', '136400',
            '514110', '514210', '523422', '524120', '524220'
        ])->get();
        return view('activities.createstandartpart', compact('standardParts', 'orders', 'items'));
    }

    public function storestandartpart(Request $request)
{
    // Log the initial request data
    Log::info('StoreStandartPart method called', ['request' => $request->all()]);

    // Validation rules
    $validator = Validator::make($request->all(), [
        'order_number' => 'required',
        'no_item' => 'required',
        'date.*' => 'required|date',
        'part_name.*' => 'required|string|max:255',
        'qty.*' => 'required|integer|min:1',
        'unit.*' => 'required|string|max:255',
        'price_unit.*' => 'required|numeric|min:0',
        'total_price.*' => 'required|numeric|min:0',
        'info.*' => 'nullable|string|max:255',
        'item.*' => 'nullable|string|max:255',
    ]);

    if ($validator->fails()) {
        Log::error('Validation failed', ['errors' => $validator->errors()->all()]);
        return redirect()->back()->withErrors($validator)->withInput();
    }

    Log::info('Validation passed');

    $lowStockItems = []; // Store items with insufficient stock

    foreach ($request->date as $index => $date) {
        // Get the available stock for the item
        $item = Standart_part::where('item_no', $request->no_item)->first();
        $availableStock = $item ? $item->qty : 0;
        $requestedQty = $request->qty[$index];

        // Check if requested qty exceeds available stock
        if ($requestedQty > $availableStock) {
            $lowStockItems[] = $request->part_name[$index]; // Collect part names with low stock
        }

        try {
            Standart_part::create([
                'order_number' => $request->order_number,
                'item_no' => $request->no_item,
                'item_name' => $request->item[$index] ?? null,
                'date' => $date,
                'part_name' => $request->part_name[$index],
                'qty' => $requestedQty,
                'unit' => $request->unit[$index],
                'price' => $request->price_unit[$index],
                'total' => $request->total_price[$index],
                'info' => $request->info[$index] ?? null,
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating standart_part entry', [
                'exception' => $e->getMessage(),
                'data' => [
                    'order_number' => $request->order_number,
                    'item_no' => $request->no_item,
                    'item_name' => $request->item[$index] ?? null,
                    'date' => $date,
                    'part_name' => $request->part_name[$index],
                    'qty' => $requestedQty,
                    'unit' => $request->unit[$index],
                    'price' => $request->price_unit[$index],
                    'total' => $request->total_price[$index],
                    'info' => $request->info[$index] ?? null,
                ]
            ]);
            return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again.');
        }
    }

    Log::info('All standart_part entries added successfully');

    // Prepare notification message
    $message = 'Standart Part(s) added successfully.';
    if (!empty($lowStockItems)) {
        $message .= ' However, stock is low for: ' . implode(', ', $lowStockItems);
    }

    return redirect()->route('activities.standartpart')->with('success', $message);
}


    public function editstandartpart($orderNumber)
    {
        $standartpart = Standart_part::where('order_number', $orderNumber)->get();
        if (!$standartpart) {
            return redirect()->route('activities.standartpart')->with('error', 'Standard part not found.');
        }

        return view('activities.editstandartpart', compact('standartpart', 'orderNumber'));
    }

    public function updateAllStandartPart(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'order_number' => 'required|string',
            'item_no' => 'array',
            'item_no.*' => 'required|string',
            'item_name' => 'array',
            'item_name.*' => 'required|string',
            'id' => 'array',
            'id.*' => 'required|exists:material,id',
            'part_name' => 'array',
            'part_name.*' => 'nullable|string',
            'qty' => 'array',
            'qty.*' => 'required|numeric',
            'price' => 'array',
            'price.*' => 'required|numeric',
            'total' => 'array',
            'total.*' => 'required|numeric',
            'date' => 'array',
            'date.*' => 'required|date',
        ]);
    
        // Loop through each of the records to update
        foreach ($validated['id'] as $id) {
            // Find the material record by id
            $material = Standart_part::find($id);
    
            if ($material) {
                // Update the material record with the new data
                $material->part_name = $validated['part_name'][$id] ?? $material->part_name;
                $material->qty = $validated['qty'][$id];
                $material->price = $validated['price'][$id];
                $material->total = $validated['total'][$id];
                $material->date = $validated['date'][$id];
                $material->save();
            }
        }
        session()->flash('success', 'SP updated successfully!');

    
        // Return a success message
        return redirect()->route('activities.standartpart');
    }

    public function updatestandartpart(Request $request, $id)
    {
        Log::info('UpdateStandartPart method called', ['request' => $request->all()]);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'order_number' => 'required',
            'no_item' => 'required',
            'date' => 'required|date',
            'part_name' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'unit' => 'required|string|max:255',
            'price_unit' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'info' => 'nullable|string|max:255',
            'item' => 'nullable|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the standard part entry
        $standartpart = DB::table('standart_part')->where('id', $id)->first();
        if (!$standartpart) {
            return redirect()->route('activities.standartpart')->with('error', 'Standard part not found.');
        }

        // Update the standard part entry
        DB::table('standart_part')->where('id', $id)->update([
            'order_number' => $request->order_number,
            'item_no' => $request->no_item,
            'item_name' => $request->item,
            'date' => $request->date,
            'part_name' => $request->part_name,
            'qty' => $request->qty,
            'unit' => $request->unit,
            'price' => $request->price_unit,
            'total' => $request->total_price,
            'info' => $request->info ?? null,
        ]);

        // Redirect with success message
        return redirect()->route('activities.standartpart')->with('success', 'Standard part updated successfully.');
    }

    public function deletestandartpart($id)
    {
        $standartpart = DB::table('standart_part')->where('id', $id)->first();
        if (!$standartpart) {
            return redirect()->route('activities.standartpart')->with('error', 'Standard part not found.');
        }

        // Delete the standard part entry
        DB::table('standart_part')->where('id', $id)->delete();

        // Redirect with success message
        return redirect()->route('activities.standartpart')->with('success', 'Standard part deleted successfully.');
    }


    //SubCont. Controller
    public function sub_contract(Request $request)
    {
        // Get the order_number from the request if present
        $order_number = $request->input('order_number');

        // Query the sub_contract model
            $query = \App\Models\sub_contract::whereHas('order', function ($q) {
        $q->notQCPass()->notDelivered();
    });

        // Apply filter if order_number is provided
        if ($order_number) {
            $query->where('order_number', 'like', '%' . $order_number . '%');
        }

        // Fetch the filtered or full data
        $data = $query->orderBy('id', 'desc')->get();

        // Return the view with the data and the filter value
        return view('activities.subcontract', compact('data', 'order_number'));
    }

    public function createsub_contract()
    {
        $orders = Order::notQCPass()
                ->notDelivered()
                ->get();

        $items = ItemAdd::get();
        return view('activities.createsub_contract', compact('orders', 'items'));
    }

    public function storesub_contract(Request $request)
    {
        Log::info('StoreSubcontract method called', ['request' => $request->all()]);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'order_number' => 'required',
            'no_item' => 'required',
            'dod.*' => 'required|date',
            'vendor.*' => 'required|string|max:255',
            'description.*' => 'required|string|max:255',
            'qty.*' => 'required|integer|min:1',
            'unit.*' => 'required|string|max:255',
            'price_unit.*' => 'required|numeric|min:0',
            'total_price.*' => 'required|numeric|min:0',
            'info.*' => 'nullable|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Iterate over each set of item details and create sub_contract entries
        foreach ($request->dod as $index => $dod) {
            sub_contract::create([
                'order_number' => $request->order_number,
                'item_no' => $request->no_item,
                'dod' => $dod,
                'vendor' => $request->vendor[$index],
                'description' => $request->description[$index],
                'qty' => $request->qty[$index],
                'unit' => $request->unit[$index],
                'price_unit' => $request->price_unit[$index],
                'total_price' => $request->total_price[$index],
                'info' => $request->info[$index] ?? null,
            ]);
        }

        // Redirect with success message
        return redirect()->route('activities.subcontract')->with('success', 'Sub Contract(s) added successfully.');
    }

    public function editsub_contract($id)
    {
        $sub_contract = sub_contract::find($id);
        if (!$sub_contract) {
            return redirect()->route('activities.subcontract')->with('error', 'Sub-contract not found.');
        }

        $orders = Order::get();
        $items = ItemAdd::get();

        return view('activities.editsub_contract', compact('sub_contract', 'orders', 'items'));
    }

    public function updatesub_contract(Request $request, $id)
    {
        Log::info('UpdateSubcontract method called', ['request' => $request->all()]);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'order_number' => 'required',
            'no_item' => 'required',
            'dod' => 'required|date',
            'vendor.*' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'unit' => 'required|string|max:255',
            'price_unit' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'info' => 'nullable|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the sub-contract entry
        $sub_contract = sub_contract::find($id);
        if (!$sub_contract) {
            return redirect()->route('activities.subcontract')->with('error', 'Sub-contract not found.');
        }

        // Update the sub-contract entry
        $sub_contract->update([
            'order_number' => $request->order_number,
            'item_no' => $request->no_item,
            'dod' => $request->dod,
            'vendor' => $request->vendor,
            'description' => $request->description,
            'qty' => $request->qty,
            'unit' => $request->unit,
            'price_unit' => $request->price_unit,
            'total_price' => $request->total_price,
            'info' => $request->info ?? null,
        ]);

        // Redirect with success message
        return redirect()->route('activities.subcontract')->with('success', 'Sub-contract updated successfully.');
    }

    public function deletesub_contract($id)
    {
        $sub_contract = sub_contract::find($id);
        if (!$sub_contract) {
            return redirect()->route('activities.subcontract')->with('error', 'Sub-contract not found.');
        }

        // Delete the sub-contract entry
        $sub_contract->delete();

        // Redirect with success message
        return redirect()->route('activities.subcontract')->with('success', 'Sub-contract deleted successfully.');
    }



public function overhead_manufacture(Request $request)
{
    // Get the order number from the request
    $filterOrderNumber = $request->input('order_number');

    // Create a query for the Overhead model
    $query = \App\Models\Overhead::query();

    // Apply filters for notQCPass and notDelivered
    $query = $query->whereHas('order', function ($q) {
        $q->notQCPass()->notDelivered();
    });

    // If an order number is provided, filter based on the order_number
    if ($filterOrderNumber) {
        $query->where('order_number', $filterOrderNumber);
    }

    // Fetch the filtered or unfiltered results
    $data = $query->orderBy('id', 'desc')->get();

    // Return the view with the filtered data and the filter value
    return view('activities.overheadmanufacture', compact('data', 'filterOrderNumber'));
}

    public function createoverhead_manufacture()
    {
        $orders = Order::notQCPass()
                ->notDelivered()
                ->get();

        return view('activities.createoverhead_manufacture', compact('orders'));
    }

    public function storeoverhead_manufacture(Request $request)
    {
        Log::info('StoreOverheadManufacture method called', ['request' => $request->all()]);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'tanggal.*' => 'required|date',
            'so_no.*' => 'required|string|max:255',
            'order_number' => 'required|string|max:255',
            'ref.*' => 'required|string|max:255',
            'description.*' => 'required|string|max:255',
            'jumlah.*' => 'required|integer|min:1',
            'keterangan.*' => 'required|string|max:255',
            'info.*' => 'nullable|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Iterate over each set of item details and create overhead entries
        foreach ($request->tanggal as $index => $tanggal) {
            overhead::create([
                'tanggal' => $tanggal,
                'so_no' => $request->so_no[$index],
                'order_number' => $request->order_number,
                'ref' => $request->ref[$index],
                'description' => $request->description[$index],
                'jumlah' => $request->jumlah[$index],
                'keterangan' => $request->keterangan[$index],
                'info' => $request->info[$index] ?? null,
            ]);
        }

        // Redirect with success message
        return redirect()->route('activities.overhead_manufacture')->with('success', 'Overhead Manufacture(s) added successfully.');
    }

    public function editoverhead_manufacture($orderNumber)
    {

        $overhead = overhead::where('order_number', $orderNumber)->get();
        if (!$overhead) {
            return redirect()->route('activities.overhead_manufacture')->with('error', 'Overhead manufacture record not found.');
        }

        $order = Order::where('order_status', '!=', 'Finished')->get();
        return view('activities.editoverhead_manufacture', compact('overhead', 'order','orderNumber'));
    }

    public function updateoverhead_manufacture(Request $request, $id)
    {
        Log::info('UpdateOverheadManufacture method called', ['request' => $request->all()]);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'so_no' => 'required|string|max:255',
            'order_number' => 'required|string|max:255',
            'ref' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
            'info' => 'nullable|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the overhead manufacture entry
        $overhead = overhead::find($id);
        if (!$overhead) {
            return redirect()->route('activities.overhead_manufacture')->with('error', 'Overhead manufacture record not found.');
        }

        // Update the overhead manufacture entry
        $overhead->update([
            'tanggal' => $request->tanggal,
            'so_no' => $request->so_no,
            'order_number' => $request->order_number,
            'ref' => $request->ref,
            'description' => $request->description,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'info' => $request->info ?? null,
        ]);

        // Redirect with success message
        return redirect()->route('activities.overhead_manufacture')->with('success', 'Overhead manufacture record updated successfully.');
    }

    public function deleteoverhead_manufacture($id)
    {
        $overhead = overhead::find($id);
        if (!$overhead) {
            return redirect()->route('activities.overhead_manufacture')->with('error', 'Overhead manufacture record not found.');
        }

        // Delete the overhead manufacture entry
        $overhead->delete();

        // Redirect with success message
        return redirect()->route('activities.overhead_manufacture')->with('success', 'Overhead manufacture record deleted successfully.');
    }

    public function updateAllOverheadManufacture(Request $request)
{
    \Log::info('Request data received:', $request->all());

    try {
        $validated = $request->validate([
            'order_number' => 'required|string',
            'tanggal' => 'required|array',
            'tanggal.*' => 'required|date',
            'description' => 'required|array',
            'description.*' => 'required|string',
            'ref' => 'required|array',
            'ref.*' => 'required|string',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|numeric',
            'keterangan' => 'required|array',
            'keterangan.*' => 'nullable|string',
            'info' => 'required|array',
            'info.*' => 'nullable|string',
        ]);

        DB::beginTransaction();

        $updatedCount = 0;
        $errors = [];

        foreach ($validated['tanggal'] as $id => $tanggal) {
            $overhead = Overhead::findOrFail($id);
            
            try {
                $updated = $overhead->update([
                    'tanggal' => $tanggal,
                    'description' => $validated['description'][$id],
                    'ref' => $validated['ref'][$id],
                    'jumlah' => $validated['jumlah'][$id],
                    'keterangan' => $validated['keterangan'][$id] ?? null,
                    'info' => $validated['info'][$id] ?? null
                ]);

                if ($updated) {
                    $updatedCount++;
                } else {
                    $errors[] = "Failed to update record ID: {$id}";
                }

                \Log::info("Updated overhead record {$id}", [
                    'success' => $updated,
                    'data' => $overhead->toArray()
                ]);

            } catch (\Exception $e) {
                $errors[] = "Error updating record ID {$id}: " . $e->getMessage();
                \Log::error("Error updating overhead record {$id}: " . $e->getMessage());
            }
        }

        if (!empty($errors)) {
            DB::rollBack();
            return response()->json([
                'message' => 'Some records failed to update',
                'errors' => $errors
            ], 422);
        }

        DB::commit();
        return response()->json([
            'message' => "{$updatedCount} overhead records updated successfully.",
            'updated_count' => $updatedCount
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        DB::rollBack();
        \Log::error('Validation failed:', $e->errors());
        return response()->json(['errors' => $e->errors()], 422);
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error updating overhead records:', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'An error occurred while updating records: ' . $e->getMessage()], 500);
    }
}


    //Material Controller
    public function material(Request $request)
    {
        $query = Material::query();

        // Check if 'order_number' is provided in the request and apply the filter
        if ($request->has('order_number') && $request->order_number !== null) {
            $query->where('order_number', 'LIKE', '%' . $request->order_number . '%');
        }

        $material = $query->orderBy('id', 'desc')->get();

        return view('activities.material', compact('material'));
    }


    public function creatematerial()
    {
        $orders = Order::where('order_status', '!=', 'Finished')
               ->notQCPass()
               ->notDelivered()
               ->get();

        $items = ItemAdd::get();
        $standardParts = StandartpartAPI::whereIn('kd_akun', [
            '131110', '131120', '131130', '515100'
        ])->get();
        return view('activities.creatematerial', compact('orders','items','standardParts'));
    }

    public function storeMaterial(Request $request)
    {
        // Log the initial request data
        Log::info('StoreMaterial method called', ['request' => $request->all()]);

        // Validation rules
        $validator = Validator::make($request->all(), [
            'order_number' => 'required',
            'no_item' => 'required',
            'date.*' => 'required|date',
            'part_name.*' => 'required|string|max:255',
            'qty.*' => 'required|integer|min:1',
            'unit.*' => 'required|string|max:255',
            'price_unit.*' => 'required|numeric|min:0',
            'total_price.*' => 'required|numeric|min:0',
            'info.*' => 'nullable|string|max:255',
            'item.*' => 'nullable|string|max:255',
        ]);

        // Log validation result
        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()->all()]);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Log successful validation
        Log::info('Validation passed');

        // Iterate over each set of item details and create standart_part entries
        foreach ($request->date as $index => $date) {
            // Log each iteration
            Log::info('Creating material entry', [
                'order_number' => $request->order_number,
                'item_no' => $request->no_item,
                'item_name' => $request->item[$index] ?? null,
                'date' => $date,
                'part_name' => $request->part_name[$index],
                'qty' => $request->qty[$index],
                'unit' => $request->unit[$index],
                'price' => $request->price_unit[$index],
                'total' => $request->total_price[$index],
                'info' => $request->info[$index] ?? null,
            ]);

            try {
                Material::create([
                    'order_number' => $request->order_number,
                    'item_no' => $request->no_item,
                    'item_name' => $request->item[$index] ?? null,
                    'date' => $date,
                    'part_name' => $request->part_name[$index],
                    'qty' => $request->qty[$index],
                    'unit' => $request->unit[$index],
                    'price' => $request->price_unit[$index],
                    'total' => $request->total_price[$index],
                    'info' => $request->info[$index] ?? null,
                ]);
            } catch (\Exception $e) {
                // Log any exceptions that occur during the creation of entries
                Log::error('Error creating material entry', [
                    'exception' => $e->getMessage(),
                    'data' => [
                        'order_number' => $request->order_number,
                        'item_no' => $request->no_item,
                        'item_name' => $request->item[$index] ?? null,
                        'date' => $date,
                        'part_name' => $request->part_name[$index],
                        'qty' => $request->qty[$index],
                        'unit' => $request->unit[$index],
                        'price' => $request->price_unit[$index],
                        'total' => $request->total_price[$index],
                        'info' => $request->info[$index] ?? null,
                    ]
                ]);
                return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again.');
            }
        }

        // Log successful insertion of all entries
        Log::info('All material entries added successfully');

        // Redirect with success message
        return redirect()->route('activities.material')->with('success', 'material added successfully.');
    }


    public function editMaterial($orderNumber)
    {
        $material = Material::where('order_number', $orderNumber)->get();
        return view('activities.editmaterial', compact('material', 'orderNumber'));
    }

    
    public function updateAllMaterial(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'order_number' => 'required|string',
            'item_no' => 'array',
            'item_no.*' => 'required|string',
            'item_name' => 'array',
            'item_name.*' => 'required|string',
            'id' => 'array',
            'id.*' => 'required|exists:material,id',
            'part_name' => 'array',
            'part_name.*' => 'nullable|string',
            'qty' => 'array',
            'qty.*' => 'required|numeric',
            'price' => 'array',
            'price.*' => 'required|numeric',
            'total' => 'array',
            'total.*' => 'required|numeric',
            'date' => 'array',
            'date.*' => 'required|date',
        ]);
    
        // Loop through each of the records to update
        foreach ($validated['id'] as $id) {
            // Find the material record by id
            $material = Material::find($id);
    
            if ($material) {
                // Update the material record with the new data
                $material->part_name = $validated['part_name'][$id] ?? $material->part_name;
                $material->qty = $validated['qty'][$id];
                $material->price = $validated['price'][$id];
                $material->total = $validated['total'][$id];
                $material->date = $validated['date'][$id];
                $material->save();
            }
        }
        session()->flash('success', 'Material updated successfully!');

    
        // Return a success message
        return redirect()->route('activities.material');
    }
    
    

    public function updateMaterial(Request $request, $id)
    {
        $request->validate([
            'id_material' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'length' => 'required|numeric|min:0',
            'width' => 'required|numeric|min:0',
            'thickness' => 'required|numeric|min:0',
        ]);

        $material = Material::findOrFail($id);
        $material->id_material = $request->id_material;
        $material->material = $request->material;
        $material->length = $request->length;
        $material->width = $request->width;
        $material->thickness = $request->thickness;
        $material->save();

        return redirect()->route('activities.material')->with('success', 'Material updated successfully!');
    }

    public function deleteMaterial($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('activities.material')->with('success', 'Material deleted successfully!');
    }

    public function labor_cost()
    {
        return view('activities.laborcost');
    }
    public function depreciation_cost()
    {
        return view('activities.depreciationcost');
    }

    public function used_time(Request $request)
    {
        // Log the incoming request parameters
        Log::info('used_time request received', [
            'order_number' => $request->order_number,
            'item_number' => $request->item_number,
        ]);

        // Store the selected filter values in the session
        if ($request->has('order_number')) {
            session(['order_number' => $request->order_number]);
        }
        if ($request->has('item_number')) {
            session(['item_number' => $request->item_number]);
        }

        // Retrieve filter values from the session if they exist
        $orderNumber = session('order_number');
        $itemNumber = session('item_number');

        // Log session values
        Log::info('Session values', [
            'order_number' => $orderNumber,
            'item_number' => $itemNumber,
        ]);

        // Get orders with order_status not 'Finished'
        // $orders = Order::where('order_status', '!=', 'Finished')->get();
        $orders = Order::where('order_status', '!=', 'Finished')
               ->notQCPass()
               ->notDelivered()
               ->get();
        $orderNumbers = $orders->pluck('order_number');

        // Log orders retrieved
        Log::info('Orders retrieved', $orders->toArray());

        // Get items based on filtered orders
        $items = ItemAdd::whereIn('order_number', $orderNumbers)->get();

        // Log items retrieved
        Log::info('Items retrieved', $items->toArray());

        // Start the query for ProcessingAdd with session-based filters
        $query = ProcessingAdd::whereIn('order_number', $orderNumbers);

        // Apply filters if they are set in session
        if ($orderNumber) {
            $query->where('order_number', $orderNumber);
        }
        if ($itemNumber) {
            $query->where('item_number', $itemNumber);
        }

        // Get filtered used time data
        $usedtime = $query->get();

        // Log used time data retrieved
        foreach ($usedtime as $data) {
            Log::info('Data retrieved from usedtime query', [
                'order_number' => $data->order_number,
                'item_number' => $data->item_number,
                'barcode_id' => $data->barcode_id,
            ]);
        }

        // Get authenticated user
        $user = auth()->user();

        // Return the view with data
        return view('activities.used_time', compact('usedtime', 'orders', 'items', 'user'));
    }

    public function editusedtime($id)
{
    try {
        // Find the used time record
        $usedtime = ProcessingAdd::findOrFail($id);
        
        // Get all orders for dropdown (if needed)
        $orders = Order::where('order_status', '!=', 'Finished')
                     ->notQCPass()
                     ->notDelivered()
                     ->get();
        
        // Get items for the selected order
        $items = ItemAdd::where('order_number', $usedtime->order_number)->get();
        
        // Get authenticated user
        $user = auth()->user();
        
        Log::info('Edit used time record', [
            'id' => $id,
            'order_number' => $usedtime->order_number,
            'item_number' => $usedtime->item_number,
        ]);
        
        return view('activities.edit_used_time', compact('usedtime', 'orders', 'items', 'user'));
        
    } catch (\Exception $e) {
        Log::error('Error loading edit used time form', [
            'id' => $id,
            'error' => $e->getMessage()
        ]);
        
        return redirect()->route('activities.used_time')
                        ->with('error', 'Unable to load the record for editing.');
    }
}

/**
 * Update the specified used time record in storage.
 */
public function updateusedtime(Request $request, $id)
{
    try {
        // Validate the request
        $validatedData = $request->validate([
            'order_number' => 'required|string|max:255',
            'item_number' => 'required|string|max:255',
            'machine' => 'required|string|max:255',
            'operation' => 'required|string|max:255',
            'estimated_time' => 'required|numeric|min:0',
            'date_wanted' => 'required|date',
            'user_name' => 'required|string|max:255',
            'pending_at' => 'nullable|date',
            'started_at' => 'nullable|date',
            'finished_at' => 'nullable|date',
            'status' => 'required|in:pending,queue,in_progress,finished',
            'duration' => 'nullable|integer|min:0',
        ]);
        
        // Find the record
        $usedtime = ProcessingAdd::findOrFail($id);
        
        // Calculate duration if start and finish times are provided
        if ($request->started_at && $request->finished_at) {
            $startTime = \Carbon\Carbon::parse($request->started_at);
            $finishTime = \Carbon\Carbon::parse($request->finished_at);
            $validatedData['duration'] = $finishTime->diffInSeconds($startTime);
        }
        
        // Update the record
        $usedtime->update($validatedData);
        
        Log::info('Used time record updated', [
            'id' => $id,
            'order_number' => $validatedData['order_number'],
            'item_number' => $validatedData['item_number'],
            'updated_by' => auth()->user()->name,
        ]);
        
        return redirect()->route('activities.used_time')
                        ->with('success', 'Used time record updated successfully.');
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::warning('Validation failed for used time update', [
            'id' => $id,
            'errors' => $e->errors()
        ]);
        
        return redirect()->back()
                        ->withErrors($e->errors())
                        ->withInput();
                        
    } catch (\Exception $e) {
        Log::error('Error updating used time record', [
            'id' => $id,
            'error' => $e->getMessage()
        ]);
        
        return redirect()->back()
                        ->with('error', 'Unable to update the record. Please try again.')
                        ->withInput();
    }
}


    public function clearFilters()
    {
        session()->forget(['order_number', 'item_number']);
        return redirect()->route('activities.used_time');
    }



    public function updateStatus(Request $request, $id)
    {
        Log::info('updateStatus called with parameters', ['id' => $id, 'request_data' => $request->all()]);
    
        // Retrieve ProcessingAdd by $id
        $processingAdd = ProcessingAdd::find($id);
        if (!$processingAdd) {
            Log::error('ProcessingAdd not found.', ['processing_add_id' => $id]);
            return redirect()->route('activities.used_time')->withErrors(['error' => 'ProcessingAdd not found.']);
        }
    
        $order_number = $processingAdd->order_number;
        $user = auth()->user();
    
        // Update ProcessingAdd status based on requested action
        switch ($request->action) {
            case 'start':
                // If coming from pending, record the previous pending session first
                if ($processingAdd->started_at && $processingAdd->pending_at) {
                    // Convert string dates to Carbon instances if they aren't already
                    $startedAt = $processingAdd->started_at instanceof Carbon 
                        ? $processingAdd->started_at 
                        : Carbon::parse($processingAdd->started_at);
                        
                    $pendingAt = $processingAdd->pending_at instanceof Carbon 
                        ? $processingAdd->pending_at 
                        : Carbon::parse($processingAdd->pending_at);
                    
                    PendingTime::create([
                        'processing_add_id' => $processingAdd->id,
                        'started_at' => $processingAdd->started_at,
                        'pending_at' => $processingAdd->pending_at,
                        'duration_seconds' => $pendingAt->diffInSeconds($startedAt),
                        'user_name' => $processingAdd->user_name
                    ]);
                }
                
                $processingAdd->status = 'started';
                $processingAdd->started_at = now();
                break;
                
            case 'pending':
                $processingAdd->status = 'pending';
                $processingAdd->pending_at = now();
                
                // Calculate and add to the cumulative duration
                if ($processingAdd->started_at) {
                    $processingAdd->duration += now()->diffInSeconds($processingAdd->started_at);
                }
                break;
                
            case 'finish':
                $processingAdd->status = 'finished';
                $processingAdd->finished_at = now();
                
                // If coming from started status, add the final duration
                if ($processingAdd->started_at) {
                    $processingAdd->duration += now()->diffInSeconds($processingAdd->started_at);
                }
                break;
                
            default:
                Log::error('Invalid action provided.', ['action' => $request->action]);
                return redirect()->route('activities.used_time')->withErrors(['error' => 'Invalid action.']);
        }
    
        $processingAdd->user_name = $user->name;
        $processingAdd->save();
    
        Log::info('ProcessingAdd status updated.', [
            'processing_add_id' => $processingAdd->id,
            'status' => $processingAdd->status,
            'duration' => $processingAdd->duration,
        ]);
    
        // Find the related ItemAdd and update its status
        $itemAdd = ItemAdd::where('order_number', $order_number)
                  ->whereHas('processingAdds', function ($query) use ($id) {
                      $query->where('id', $id);
                  })->first();
    
        if ($itemAdd) {
            $itemAdd->updateItemStatus();
            Log::info('Item status updated.', ['item_id' => $itemAdd->id]);
    
            // Trigger the order status update
            $order = $itemAdd->order;
            if ($order) {
                $order->updateOrderStatus();
                Log::info('Order status updated.', ['order_id' => $order->id]);
            }
        } else {
            Log::error('Associated ItemAdd not found.', ['processing_add_id' => $id]);
            return redirect()->route('activities.used_time')->withErrors(['error' => 'Associated ItemAdd not found.']);
        }
    
        return redirect()->route('activities.used_time');
    }

    public function getCustomerData($companyName)
    {
        // Implement your logic to fetch customer data based on company name
        // Adjust this method as per your application's requirements
        return response()->json(['data' => 'Customer data for ' . $companyName]);
    }

    public function printused_time()
    {
        $usedTimes = UsedTime::with('processing')->get();

        // Implement your logic to print or export the used time data
        // For demonstration, we'll just return the view
        return view('activities.used_time.print', compact('usedTimes'));
    }
    public function used_time_barcode()
    {
        return view('activities.usedtimebarcode');
    }

    public function createused_time_barcode()
    {
        $order = Order::get();
        $itemadd = ItemAdd::get();
        return view('activities.createused_time_barcode', compact('order', 'itemadd'));
    }
    public function order_approval_log()
    {
        return view('activities.orderapproval_log');
    }
    public function order_approval_ppic()
    {
        return view('activities.orderapproval_ppic');
    }

    public function update_approval_ppic()
    {
        return view('activities.orderapproval_ppic');
    }

    //Close order Controller
    public function CloseOrder(Request $request)
    {
        $query = Order::QCPass(); // Get the base query for unfinished orders

        if ($request->has('order_number')) {
            $order_number = $request->input('order_number');
            // Apply filter by order_number
            $query->where('order_number', 'LIKE', '%' . $order_number . '%');
        }

        $order = $query->orderBy('id', 'desc')->get(); // Fetch the filtered results
        return view('activities.closeorder', compact('order'));
    }

    public function updateStatusClosed(Request $request, $id)
    {
        Log::info('Received request to update order status', [
            'order_id' => $id,
            'request_data' => $request->all(),
        ]);
    
        try {
            $request->validate([
                'order_status' => 'required|in:pending,started,finished',
            ]);
            Log::info('Validation passed', ['order_id' => $id]);
        } catch (\Exception $e) {
            Log::error('Validation failed', [
                'order_id' => $id,
                'error_message' => $e->getMessage()
            ]);
            return response()->json(['success' => false, 'message' => 'Validation failed.'], 400);
        }
    
        try {
            $order = Order::findOrFail($id);
            $newStatus = $request->input('order_status');
            $order->order_status = $newStatus;
            $order->save();
    
            Log::info('Order status updated', [
                'order_id' => $order->id,
                'new_status' => $newStatus,
            ]);
    
            if ($newStatus !== 'finished') {
                processingadd::where('order_number', $order->order_number)
                    ->update(['status' => 'Queue']);
    
                ItemAdd::where('order_number', $order->order_number)
                    ->update(['status' => 'Queue']);
            }
    
            return response()->json(['success' => true, 'message' => 'Order status updated successfully.'], 200);
        } catch (\Exception $e) {
            Log::error('Error updating order status', [
                'order_id' => $id,
                'error_message' => $e->getMessage(),
            ]);
            return response()->json(['success' => false, 'message' => 'Failed to update order status.'], 500);
        }
    }


    public function calculation()
    {
        $orders = Order::pluck('order_number', 'id');
        return view('activities.calculation', compact('orders'));
    }

    private function convertDurationToHours($duration)
    {
        if (is_int($duration)) {
            // Convert seconds to hours
            return $duration / 3600;
        } elseif (is_string($duration) && strpos($duration, ':') !== false) {
            $timeParts = explode(':', $duration);
            if (count($timeParts) !== 3) {
                Log::error('Invalid duration format.', ['duration' => $duration]);
                return 0; // Or handle the error appropriately
            }
            list($hours, $minutes, $seconds) = $timeParts;
            return $hours + ($minutes / 60) + ($seconds / 3600);
        } else {
            Log::error('Invalid duration format. done', ['duration' => $duration]);
            return 0;
        }
    }


    public function calculate(Request $request)
    {
        Log::info('Calculate method called.');

        // Validate the incoming request
        $validatedData = $request->validate([
            'order_id' => 'required|exists:order,id', // Correct table name
        ]);

        Log::info('Request validated.', ['order_id' => $validatedData['order_id']]);

        // Fetch the order with related data
        $order = $this->fetchOrder($validatedData['order_id']);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Calculate costs for the current order
        $costs = $this->calculateCosts($order);
        if (!$costs) {
            return response()->json(['error' => 'Error calculating costs'], 500);
        }

        // Calculate financial metrics based on costs
        $financialMetrics = $this->calculateFinancialMetrics($costs['totalSales'], $costs['totalCosts']);

        // Store WIP data for the current order
        $this->storeWIPData($order, $costs, $financialMetrics);

        // **New Addition:** Store WIP data for all orders
        $this->storeWIPDataForAllOrders();

        // Retrieve the order_number from the Order model
        $orderNumber = $order->order_number; // Ensure 'order_number' is the correct column name

        Log::info('Order number retrieved.', ['order_number' => $orderNumber]);

        // Format the response data for current order
        $responseData = $this->formatResponseData($costs, $order);

        // Filter processing data by order_number
        $processings = ProcessingAdd::where('order_number', $orderNumber)
            ->with(['itemAdd', 'WPLink'])
            ->get(['item_number', 'machine', 'mach_cost', 'labor_cost', 'duration', 'finished_at', 'status']);
        if ($processings->isEmpty()) {
            Log::info('No processing data found for the given order_number.', ['order_number' => $orderNumber]);
        } else {
            Log::info('Processing data fetched.', ['order_number' => $orderNumber, 'processings' => $processings]);

            // Calculate mach_cost_real and labor_cost_real for each processing item
            foreach ($processings as $processing) {
                try {
                    $durationInHours = $this->convertDurationToHours($processing->duration);
                    $processing->mach_cost_real = $durationInHours * $processing->mach_cost;
                    $processing->labor_cost_real = $durationInHours * $processing->labor_cost;

                    Log::info('Real cost calculated for processing.', [
                        'item_number' => $processing->item_number,
                        'mach_cost_real' => $processing->mach_cost_real,
                        'labor_cost_real' => $processing->labor_cost_real
                    ]);
                } catch (\Exception $e) {
                    Log::warning('Duration conversion failed.', ['duration' => $processing->duration, 'error' => $e->getMessage()]);
                    $processing->mach_cost_real = 0;
                    $processing->labor_cost_real = 0;
                }
            }
        }
        $responseData['processingData'] = $processings;

        $material = WPLink::where('order_number', $orderNumber)->get();
        if ($material->isEmpty()) {
            Log::info('No material data found for the given order_number.', ['order_number' => $orderNumber]);
        } else {
            Log::info('Material data fetched.', ['order_number' => $orderNumber, 'materials' => $material]);
        }

        $responseData['material'] = $material;

        $subcon = sub_contract::where('order_number', $orderNumber)->get();
        if ($material->isEmpty()) {
            Log::info('No SubContract data found for the given order_number.', ['order_number' => $orderNumber]);
        } else {
            Log::info('SubContract data fetched.', ['order_number' => $orderNumber, 'subcons' => $subcon]);
        }

        $responseData['subcon'] = $subcon;


        Log::info('Response data prepared.', ['responseData' => $responseData]);

        return response()->json($responseData, 200); // Ensure status code 200 for success
    }


    // Fetch order with related data
    private function fetchOrder($orderId)
    {
        try {
            return Order::with(['items.processings', 'processings', 'subContracts', 'salesOrder', 'standartParts', 'overheads'])
                ->findOrFail($orderId);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Order fetch failed.', ['order_id' => $orderId, 'error' => $e->getMessage()]);
            return null;
        }
    }

    private function fetchWPLinkCosts($orderNumber, $jenis)
    {
        try {
            Log::info('Fetching WPLink costs.', ['order_number' => $orderNumber, 'jenis' => $jenis]);

            $total = WPLink::where('order_number', $orderNumber)
                ->where('jenis', $jenis)
                ->sum('total');

            Log::info('WPLink costs fetched.', ['order_number' => $orderNumber, 'jenis' => $jenis, 'harga' => $total]);

            return $total;
        } catch (\Exception $e) {
            Log::error('WPLink fetch failed.', ['order_number' => $orderNumber, 'jenis' => $jenis, 'error' => $e->getMessage()]);
            return 0;
        }
    }

    // Calculate costs
    private function calculateCosts($order)
    {
        try {
            $totalSales = $order->sale_price ?? 0;
            Log::info('Total sales calculated.', ['total_sales' => $totalSales]);

            $totalMaterialCost = $this->fetchWPLinkCosts($order->order_number, 'materials');
            $totalStandardPartCost = $this->fetchWPLinkCosts($order->order_number, 'parts');
            $machineCostResult = $this->calculateProcessingCosts($order->processings, 'mach_cost');
            $laborCostResult = $this->calculateProcessingCosts($order->processings, 'labor_cost');
            $totalMachineCost = $machineCostResult['totalCost'];
            $totalLaborCost = $laborCostResult['totalCost'];
            $totalSubContractCost = $order->subContracts->sum('total_price');
            $totalOverheadCost = $order->overheads->sum('jumlah');

            Log::info('Costs calculated.', [
                'total_material_cost' => $totalMaterialCost,
                'total_machine_cost' => $totalMachineCost,
                'total_labor_cost' => $totalLaborCost,
                'total_sub_contract_cost' => $totalSubContractCost,
                'total_standard_part_cost' => $totalStandardPartCost,
                'total_overhead_cost' => $totalOverheadCost,
            ]);

            // Calculate machine and labor costs by items
            $itemizedCosts = $this->calculateCostsByItems($order);

            return [
                'totalSales' => $totalSales,
                'totalMaterialCost' => $totalMaterialCost,
                'totalMachineCost' => $totalMachineCost,
                'totalLaborCost' => $totalLaborCost,
                'totalSubContractCost' => $totalSubContractCost,
                'totalStandardPartCost' => $totalStandardPartCost,
                'totalOverheadCost' => $totalOverheadCost,
                'totalCosts' => $totalMaterialCost + $totalMachineCost + $totalLaborCost + $totalSubContractCost + $totalStandardPartCost + $totalOverheadCost,
                'itemizedCosts' => $itemizedCosts,
                'machineProcessingDetails' => $machineCostResult['details'],
                'laborProcessingDetails' => $laborCostResult['details']
            ];
        } catch (\Exception $e) {
            Log::error('Error calculating costs.', ['error' => $e->getMessage()]);
            return null;
        }
    }


    private function calculateProcessingCosts($processings, $costType)
    {
        $totalCost = 0;
        $processingDetails = [];

        foreach ($processings as $processing) {
            // Log the processing instance to inspect its data
            Log::info('Processing instance:', ['processing' => $processing]);

            $durationInHours = $this->convertDurationToHours($processing->duration);
            $costPerHour = $processing->$costType;
            $cost = $costPerHour * $durationInHours;
            $estimatedCost = $processing->estimated_time * $processing->mach_cost;

            // Log each calculation step
            Log::info('Calculated values:', [
                'durationInHours' => $durationInHours,
                'costPerHour' => $costPerHour,
                'cost' => $cost,
                'estimatedCost' => $estimatedCost
            ]);

            $totalCost += $cost;

            $processingDetails[] = [
                'processing_id' => $processing->id,
                'machine_name' => $processing->machine,
                'estimated_time' => $processing->estimated_time,
                'labor_cost' => $processing->labor_cost,
                'estimated_cost' => $estimatedCost,
                'duration_hours' => $durationInHours,
                'cost_per_hour' => $costPerHour,
                'cost' => $cost
            ];
        }

        return [
            'totalCost' => $totalCost,
            'details' => $processingDetails
        ];
    }


    // Calculate machine and labor costs by items
    private function calculateCostsByItems($order)
    {
        $machineCostsByItems = [];
        $laborCostsByItems = [];

        foreach ($order->items as $item) {
            // Ensure 'processings' relationship is loaded for each item
            $item->processings->sum(function ($processing) use ($item) {
                $cost = $processing->mach_cost * $this->convertDurationToHours($processing->duration);
                Log::info('Machine cost by item calculated.', ['item_id' => $item->id, 'processing_id' => $processing->id, 'machine_cost' => $cost]);
                return $cost;
            });

            $item->processings->sum(function ($processing) use ($item) {
                $cost = $processing->labor_cost * $this->convertDurationToHours($processing->duration);
                Log::info('Labor cost by item calculated.', ['item_id' => $item->id, 'processing_id' => $processing->id, 'labor_cost' => $cost]);
                return $cost;
            });
        }

        return [
            'machineCostsByItems' => $machineCostsByItems,
            'laborCostsByItems' => $laborCostsByItems
        ];
    }

    // Calculate financial metrics
    private function calculateFinancialMetrics($totalSales, $totalCosts)
    {

        $totalSales = (float)$totalSales; // Cast to float
        $totalCosts = (float)$totalCosts; // Cast to float

        $COGS = $totalCosts;
        $GPM = $totalSales - $COGS;
        $OHorg = $totalSales * 0.1;
        $NOI = $GPM - $OHorg;
        $BNP = $totalSales * 0.02;
        $LSP = $NOI - $BNP;

        return compact('COGS', 'GPM', 'OHorg', 'NOI', 'BNP', 'LSP');
    }

    private function storeWIPData($order, $costs, $financialMetrics)
    {
        try {
            $wipData = [
                'order_id' => $order->id,
                'order_number' => $order->order_number,
                'total_sales' => $costs['totalSales'],
                'total_material_cost' => $costs['totalMaterialCost'],
                'total_labor_cost' => $costs['totalLaborCost'],
                'total_machine_cost' => $costs['totalMachineCost'],
                'total_standard_part_cost' => $costs['totalStandardPartCost'],
                'total_sub_contract_cost' => $costs['totalSubContractCost'],
                'total_overhead_cost' => $costs['totalOverheadCost'],
                'cogs' => $financialMetrics['COGS'],
                'gpm' => $financialMetrics['GPM'],
                'oh_org' => $financialMetrics['OHorg'],
                'noi' => $financialMetrics['NOI'],
                'bnp' => $financialMetrics['BNP'],
                'lsp' => $financialMetrics['LSP'],
                'wip_date' => now() // Add current date
            ];

            // Check if there's already a WIP record for the same order with today's date
            $existingWIP = WIP::where('order_id', $order->id)
                ->whereDate('wip_date', now()->toDateString()) // Check today's date
                ->first();

            if ($existingWIP) {
                // Update the existing WIP record for today
                $existingWIP->update($wipData);
                Log::info('WIP data updated for order.', $wipData);
            } else {
                // Create a new WIP record for today
                WIP::create($wipData);
                Log::info('New WIP data created for order.', $wipData);
            }
            Log::info('WIP data stored/updated successfully.', $wipData);
        } catch (\Exception $e) {
            Log::error('Error storing/updating WIP data.', ['error' => $e->getMessage()]);
            throw $e; // Re-throw exception for higher-level handling if necessary
        }
    }


    public function storeWIPDataForAllOrders()
{
    try {
        // Fetch all orders that need to be updated. You can apply filters if needed.
        $orders = Order::with(['items.processings', 'processings', 'subContracts', 'salesOrder', 'standartParts', 'overheads'])->get();

        foreach ($orders as $order) {
            // Skip orders that do not have an order_status of 'Delivered' or 'Finished'
            if (!in_array($order->order_status, ['Delivered', 'Finished'])) {
                Log::info('Order skipped due to status not being Delivered or Finished.', ['order_id' => $order->id, 'order_status' => $order->order_status]);
                continue; // Move to the next order
            }

            // Calculate costs for each order
            $costs = $this->calculateCosts($order);
            if (!$costs) {
                Log::error('Error calculating costs for order.', ['order_id' => $order->id]);
                continue; // Skip to the next order if cost calculation fails
            }

            // Calculate financial metrics
            $financialMetrics = $this->calculateFinancialMetrics($costs['totalSales'], $costs['totalCosts']);

            // Prepare WIP data for each order
            $wipData = [
                'order_id' => $order->id,
                'order_number' => $order->order_number,
                'total_sales' => $costs['totalSales'],
                'total_material_cost' => $costs['totalMaterialCost'],
                'total_labor_cost' => $costs['totalLaborCost'],
                'total_machine_cost' => $costs['totalMachineCost'],
                'total_standard_part_cost' => $costs['totalStandardPartCost'],
                'total_sub_contract_cost' => $costs['totalSubContractCost'],
                'total_overhead_cost' => $costs['totalOverheadCost'],
                'cogs' => $financialMetrics['COGS'],
                'gpm' => $financialMetrics['GPM'],
                'oh_org' => $financialMetrics['OHorg'],
                'noi' => $financialMetrics['NOI'],
                'bnp' => $financialMetrics['BNP'],
                'lsp' => $financialMetrics['LSP'],
                'wip_date' => now() // Set current date
            ];

            // Check if there's already a WIP record for the same order with today's date
            $existingWIP = WIP::where('order_id', $order->id)
                ->whereDate('wip_date', now()->toDateString()) // Check today's date
                ->first();

            if ($existingWIP) {
                // Update the existing WIP record for today
                $existingWIP->update($wipData);
                Log::info('WIP data updated for order.', $wipData);
            } else {
                // Create a new WIP record for today
                WIP::create($wipData);
                Log::info('New WIP data created for order.', $wipData);
            }
        }
    } catch (\Exception $e) {
        Log::error('Error storing/updating WIP data for all orders.', ['error' => $e->getMessage()]);
        throw $e; // Re-throw exception for higher-level handling if necessary
    }
}



    // Format response data
    private function formatResponseData($costs, $order)
    {
        $processings = Processing::all(); // Example: Retrieve all processing records
        $costType = 'mach_cost'; // Example: Define the cost type

        $costData = $this->calculateProcessingCosts($processings, $costType);
        try {
            $overheadsData = $order->overheads->map(function ($overhead) {
                return $overhead->only(['description', 'keterangan', 'jumlah']);
            });
            Log::info('Overhead data fetched.', ['overheads' => $overheadsData]);
        } catch (\Exception $e) {
            Log::error('Error fetching overhead data.', ['error' => $e->getMessage()]);
            throw $e; // Re-throw exception for higher-level handling if necessary
        }

        return [
            'totalSales' => $this->formatNumber($costs['totalSales']),
            'totalMaterialCost' => $this->formatNumber($costs['totalMaterialCost']),
            'totalMachineCost' => $this->formatNumber($costs['totalMachineCost']),
            'totalLaborCost' => $this->formatNumber($costs['totalLaborCost']),
            'totalStandardPartCost' => $this->formatNumber($costs['totalStandardPartCost']),
            'totalSubContractCost' => $this->formatNumber($costs['totalSubContractCost']),
            'totalOverheadCost' => $this->formatNumber($costs['totalOverheadCost']),
            'overheads' => $overheadsData,
            'processingdata' => $costData,
            'machineCostsByItems' => array_map(function ($itemCost) {
                return [
                    'item_id' => $itemCost['item_id'],
                    'item_name' => $itemCost['item_name'],
                    'machine_cost' => $this->formatNumber($itemCost['machine_cost'])
                ];
            }, $costs['itemizedCosts']['machineCostsByItems']),
            'laborCostsByItems' => array_map(function ($itemCost) {
                return [
                    'item_id' => $itemCost['item_id'],
                    'item_name' => $itemCost['item_name'],
                    'labor_cost' => $this->formatNumber($itemCost['labor_cost'])
                ];
            }, $costs['itemizedCosts']['laborCostsByItems']),
            'machineProcessingDetails' => $costs['machineProcessingDetails'],
            'laborProcessingDetails' => $costs['laborProcessingDetails']
        ];
    }

    private function formatNumber($number)
    {
        return number_format((float)$number, 0);
    }

    public function calculateAllOrders(Request $request)
    {
        try {
            $this->storeWIPDataForAllOrders();

            return response()->json(['success' => 'WIP data updated for all orders'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update WIP data for all orders'], 500);
        }
    }

    public function storecalculate(Request $request)
    {
        $orderId = $request->order_id;

        // Assuming you have a method to get the calculation data for the order
        $calculationData = $this->getCalculationData($orderId);

        // Store or update the calculation data in the WIP model
        $wip = WIP::updateOrCreate(
            ['order_id' => $orderId],
            [
                'total_sales' => $calculationData['totalSales'],
                'total_material_cost' => $calculationData['totalMaterialCost'],
                'total_labor_cost' => $calculationData['totalLaborCost'],
                'total_machine_cost' => $calculationData['totalMachineCost'],
                'total_standard_part_cost' => $calculationData['totalStandardPartCost'],
                'total_sub_contract_cost' => $calculationData['totalSubContractCost'],
                'total_overhead_cost' => $calculationData['totalOverheadCost'],
                'cogs' => $calculationData['COGS'],
                'gpm' => $calculationData['GPM'],
                'oh_org' => $calculationData['OHorg'],
                'noi' => $calculationData['NOI'],
                'bnp' => $calculationData['BNP'],
                'lsp' => $calculationData['LSP']
            ]
        );

        return response()->json($calculationData);
    }

    public function delivery_orders_wh()
    {
        return view('activities.deliveryorderstowh');
    }

    public function qc(Request $request)
    {
        $query = Order::Finished(); // Get the base query for unfinished orders
        if ($request->has('order_number')) {
            $order_number = $request->input('order_number');
            // Apply filter by order_number
            $query->where('order_number', 'LIKE', '%' . $order_number . '%');
        }
        $order = $query->orderBy('id', 'desc')->get(); // Fetch the filtered results
        return view('activities.qc', compact('order'));
    }

    public function updateQCStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $status = $request->input('status');
    $qcDescription = $request->input('qc_description');

    if ($status === 'approved') {
        $order->order_status = 'QC Pass';
        $order->produksi_status = 'Disetujui';
        $order->qc_description = $qcDescription;
    } elseif ($status === 'pending') {
        $order->order_status = 'Pending';
        $order->qc_description = $qcDescription;
    }

    $order->save();

    if ($status !== 'approved') {
        // Update ProcessingAdd status based on matching order_number
        ProcessingAdd::where('order_number', $order->order_number)
            ->update(['status' => 'Queue']);

        // Update ItemAdd status based on matching order_number
        ItemAdd::where('order_number', $order->order_number)
            ->update(['status' => 'Queue']);
    }

    return response()->json([
        'success' => true,
        'message' => $status === 'approved' ? 'Order approved successfully.' : 'Order rejected successfully.',
    ]);
}
    public function maintenance_standart()
    {
        return view('activities.maintenancestandart');
    }
    public function copyOrder()
    {
	$orders = Order::whereIn('order_status', ['Finished', 'Delivered', 'QC Pass'])->get();
	$targetorders = Order::whereIn('order_status', ['Queue', 'Pending', 'Started'])->get();
        return view('activities.copy_order', compact('targetorders', 'orders'));
    }

public function storeCopiedOrder(Request $request)
{
    Log::info('storeCopiedOrder called');

    try {
        // Log incoming request data
        Log::info('Incoming Request Data', $request->all());

        // Validate the request data
        Log::info('Step 1: Validating request');
        $validatedData = $request->validate([
            'selected_order_id' => 'required|exists:order,id',
            'target_order_number' => 'required|exists:order,order_number',
        ]);
        Log::info('Step 2: Validation successful', $validatedData);

        // Fetch the selected order
        Log::info('Step 3: Fetching selected order');
        $selectedOrder = Order::find($validatedData['selected_order_id']);
        if (!$selectedOrder) {
            Log::error('Selected order not found', ['order_id' => $validatedData['selected_order_id']]);
            return redirect()->route('activities.order')->with('error', 'Selected order not found.');
        }
        Log::info('Selected order retrieved', ['selectedOrder' => $selectedOrder]);

        // Fetch the target order
        Log::info('Step 4: Fetching target order');
        $targetOrder = Order::where('order_number', $validatedData['target_order_number'])->first();
        if (!$targetOrder) {
            Log::error('Target order not found', ['order_number' => $validatedData['target_order_number']]);
            return redirect()->route('activities.order')->with('error', 'Target order not found.');
        }
        Log::info('Target order retrieved', ['targetOrder' => $targetOrder]);

        // Copy related items
        Log::info('Step 5: Copying related items');
        $items = Item::where('order_number', $selectedOrder->order_number)->get();
        foreach ($items as $item) {
            $newItem = $item->replicate();
	    Log::info('Original company_name', ['company_name' => $item->company_name]);
	    $newItem->company_name = $targetOrder->customer;
	    Log::info('Updated company_name', ['company_name' => $newItem->company_name]);
	    $newItem->so_number = $targetOrder->so_number;
            $newItem->order_number = $targetOrder->order_number;
            $newItem->save();

            Log::info('Item replicated', ['item' => $item, 'newItem' => $newItem]);

            // Copy associated item additions
            $itemAdds = ItemAdd::where('order_number', $item->order_number)->get();
            foreach ($itemAdds as $itemAdd) {
                $newItemAdd = $itemAdd->replicate();
                $newItemAdd->order_number = $newItem->order_number;
                $newItemAdd->status = 'Queue';
                $newItemAdd->issued_item = now()->toDateString(); // Set issued_item ke tanggal hari ini
                $newItemAdd->save();

                Log::info('ItemAdd replicated', ['itemAdd' => $itemAdd, 'newItemAdd' => $newItemAdd]);
            }
        }

        // Copy related processes and adjust their attributes
        Log::info('Step 4: Copying related processing additions');
        $processes = ProcessingAdd::where('order_number', $selectedOrder->order_number)->get();
        foreach ($processes as $process) {
            $newProcess = $process->replicate();

            // Set the attributes for the new process
            $newProcess->order_number = $targetOrder->order_number;
            $newProcess->status = 'Queue';
            $newProcess->mach_cost = 0;
            $newProcess->labor_cost = 0;
            $newProcess->duration = 0;
            $newProcess->started_at = null;
            $newProcess->pending_at = null;
            $newProcess->finished_at = null;
            $newProcess->date_wanted = null;

            // Generate a unique barcode_id
            $date = now()->format('Ymd'); // Current date in YYYYMMDD format
            $uniqueString = uniqid(); // Unique string
            $newProcess->barcode_id = $targetOrder->order_number . '-' . $date . '-' . $uniqueString;

            // Save the new process
            $newProcess->save();

            Log::info('ProcessingAdd replicated with adjusted values', ['newProcess' => $newProcess]);
        }
        // Redirect back with a success message
        Log::info('Order copying completed successfully');
        return redirect()->route('activities.order')->with('success', 'Items and processes successfully copied to the target order.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Validation failed', ['errors' => $e->errors()]);
        return redirect()->route('activities.order')->withErrors($e->errors());
    } catch (\Exception $e) {
        Log::error('Error in storeCopiedOrder', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
        return redirect()->route('activities.order')->with('error', 'Failed to copy items and processes. Please check logs.');
    }
}

    public function data_maintenance()
    {
        return view('activities.datamaintenance');
    }
    public function update_group_unit()
    {
        return view('activities.updategroupunit');
    }
    public function updateStatusOrder(Request $request)
    {
        Log::info('Received request to update order status', [
            'id' => $request->id,
            'type' => $request->type,
            'value' => $request->value,
            'description' => $request->description
        ]);

        try {
            // Validate the request
            Log::info('Starting validation');
            $request->validate([
                'id' => 'required|exists:order,id',
                'type' => 'required|string|in:produksi,marketing,surat_jalan',
                'value' => 'required|string', // Adjusting validation to expect a string
                'description' => 'nullable|string|max:255',
            ]);
            Log::info('Validation passed');

            // Find the order
            $order = Order::find($request->id);
            if (!$order) {
                Log::warning('Order not found', ['id' => $request->id]);
                return response()->json(['success' => false, 'message' => 'Order not found']);
            }

            Log::info('Order found', [
                'order_id' => $order->id,
                'current_status' => [
                    'produksi_status' => $order->produksi_status,
                    'marketing_status' => $order->marketing_status,
                    'surat_jalan_status' => $order->surat_jalan_status,
                ]
            ]);

            // Update the specific status based on the type
            switch ($request->type) {
                case 'produksi':
                    $order->produksi_status = $request->value;
                    $order->produksi_description = $request->description;
                    Log::info('Produksi status updated', [
                        'produksi_status' => $request->value,
                        'produksi_description' => $request->description,
                    ]);
                    break;

                case 'marketing':
                    $order->marketing_status = $request->value;
                    $order->marketing_description = $request->description;
                    Log::info('Marketing status updated', [
                        'marketing_status' => $request->value,
                        'marketing_description' => $request->description,
                    ]);
                    break;

                case 'surat_jalan':
                    $order->surat_jalan_status = $request->value;
                    $order->surat_jalan_description = $request->description;
                    Log::info('Surat Jalan status updated', [
                        'surat_jalan_status' => $request->value,
                        'surat_jalan_description' => $request->description,
                    ]);
                    break;
            }

            // Check if all statuses are "Disetujui"
            if (
                $order->produksi_status === 'Disetujui' &&
                $order->marketing_status === 'Disetujui' &&
                $order->surat_jalan_status === 'Disetujui'
            ) {
                $order->order_status = 'Delivered';
                Log::info('Order status set to Delivered', ['order_id' => $order->id]);
            }

            // Save the order and log the result
            if ($order->save()) {
                Log::info('Order status updated successfully', ['order_id' => $order->id]);
                return response()->json(['success' => true, 'message' => 'Status updated successfully']);
            } else {
                Log::error('Failed to update order status', ['order_id' => $order->id]);
                return response()->json(['success' => false, 'message' => 'Failed to update status']);
            }
        } catch (\Exception $e) {
            Log::error('Exception occurred while updating order status', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);
            return response()->json(['success' => false, 'message' => 'An error occurred']);
        }
    }


    public function delivery_process(Request $request)
    {
        $query = Order::QCPass(); // Get the base query for unfinished orders

        if ($request->has('order_number')) {
            $order_number = $request->input('order_number');
            // Apply filter by order_number
            $query->where('order_number', 'LIKE', '%' . $order_number . '%');
        }

        $order = $query->orderBy('id', 'desc')->get(); // Fetch the filtered results
        return view('activities.deliveryprocess', compact('order'));
    }

    public function real_hpp()
    {
        return view('activities.realhpp');
    }
    public function finish_order()
    {
        return view('activities.finishorder');
    }
}
