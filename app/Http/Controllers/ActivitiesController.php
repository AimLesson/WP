<?php

namespace App\Http\Controllers;

use App\Models\WIP;
use App\Models\Item;
use App\Models\Unit;
use App\Models\NoKatalog;
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
use App\Models\overhead;
use App\Models\UsedTime;
use App\Models\OrderUnit;
use App\Models\Quotation;
use App\Models\Department;
use App\Models\processing;
use App\Models\SalesOrder;
use App\Models\ProductType;
use App\Models\QuotationAdd;
use App\Models\sub_contract;
use Illuminate\Http\Request;
use App\Models\ProcessingAdd;
use App\Models\SalesOrderAdd;
use App\Models\standart_part;
use App\Models\StandartpartAPI;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{
    public function activities()
    {
        return view('activities.activities');
    }


    //activities - quotation
    public function quotationindex()
    {
        $quotation     = DB::table('quotation')->get();
        $quotationJoin = DB::table('quotation')
            ->join('quotationadd', 'quotation.quotation_no', '=', 'quotationadd.quotation_no')
            ->select('quotation.*', 'quotationadd.*')
            ->get();

        return view('activities.quotation', compact('quotation', 'quotationJoin'));
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
        $no_katalog = NoKatalog::get();
        $user = User::get();
        return view('activities.createquotation', compact('user', 'unit', 'tax_type', 'customers', 'no_katalog'));
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
        $no_katalog = NoKatalog::get();
        $user = User::get();
        $quotation     = DB::table('quotation')->where('quotation_no', $quotation_no)->first();
        $quotationJoin = DB::table('quotation')
            ->join('quotationadd', 'quotation.quotation_no', '=', 'quotationadd.quotation_no')
            ->select('quotation.*', 'quotationadd.*')
            ->where('quotationadd.quotation_no', $quotation_no)
            ->get();

        return view('activities.editquotation', compact('quotation', 'quotationJoin', 'user', 'unit', 'tax_type', 'customers', 'no_katalog'));
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


    //activities - sales order
    public function salesorder()
    {
        $salesorder     = DB::table('salesorder')->get();
        $salesorderJoin = DB::table('salesorder')
            ->join('soadd', 'salesorder.so_number', '=', 'soadd.so_number')
            ->select('salesorder.*', 'soadd.*')
            ->get();

        return view('activities.salesorder', compact('salesorder', 'salesorderJoin'));
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
        $no_katalog = NoKatalog::get();
        $tax_type = TaxType::get();
        $user = User::get();
        $producttype = ProductType::get();
        $order_unit = OrderUnit::get();
        $quotation  = Quotation::get();

        return view('activities.createso', compact('producttype', 'order_unit', 'user', 'tax_type', 'unit', 'kbli', 'quotation', 'no_katalog'));
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
        $request->validate([
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
            $subtotal = str_replace(['Rp', '.', ','], '', $request->input('subtotal'));
            $salesorder->subtotal = $subtotal;

            $discount = str_replace(['Rp', '.', ','], '', $request->input('discount'));
            $salesorder->discount = $discount;

            $tax = str_replace(['Rp', '.', ','], '', $request->input('tax'));
            $salesorder->tax = $tax;

            $freight = str_replace(['Rp', '.', ','], '', $request->input('freight'));
            $salesorder->freight = $freight;

            $totalAmount = str_replace(['Rp', '.', ','], '', $request->input('total_amount'));
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

            // Save the additional items in SalesOrderAdd
            foreach ($request->item as $key => $items) {
                $soAdd['item'] = $items;
                $soAdd['so_number'] = $salesorder->so_number;
                $soAdd['item_desc'] = $request->item_desc[$key];
                $soAdd['qty'] = $request->qty[$key];
                $soAdd['unit'] = $request->unit[$key];
                $soAdd['unit_price'] = str_replace(['Rp', ',', '.'], '', $request->input('unit_price')[$key]);
                $soAdd['disc'] = $request->disc[$key];
                $soAdd['amount'] = str_replace(['Rp', ',', '.'], '', $request->input('amount')[$key]);
                $soAdd['product_type'] = $request->product_type[$key];
                $soAdd['order_no'] = $request->order_no[$key];
                $soAdd['spec'] = $request->spec[$key];
                $soAdd['kbli'] = $request->kbli[$key];

                SalesOrderAdd::create($soAdd);
            }

            DB::commit();

            return redirect()->route('activities.salesorder')->with('success', 'Sales Order added successfully');
        } catch (\Exception $e) {
            DB::rollback();

            // Log the error with detailed input data for debugging
            Log::error('Failed to create Sales Order: ' . $e->getMessage(), [
                'input_data' => $request->all()
            ]);

            return redirect()->route('activities.createso')->with('error', 'Failed to add Sales Order. Please try again!');
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

            return view('activities.editsalesorder', compact('producttype', 'order_unit', 'user', 'tax_type', 'unit', 'kbli', 'quotation', 'salesorder', 'salesorderJoin', 'no_katalog'));
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
    public function order()
    {
        $order = Order::notFinished()->get();
        return view('activities.order', compact('order'));
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
    public function customer()
    {
        $customer = customer::get();

        return view('activities.customer', compact('customer'));
    }
    public function createcustomer()
    {
        return view('activities.createcustomer');
    }
    public function storecustomer(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'company'       => 'required|unique:customer,company',
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

            ],
            [
                'company.unique' => 'Company name has already been taken.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('activities.createcustomer')->withErrors($validator)->withInput();
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


        Customer::create($customer);

        return redirect()->route('activities.customer')->with('success', 'Customer Added');
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

    public function item()
    {
        // Get all order numbers from the Order model where order_status is not 'Finished'
        $orderNumbers = Order::where('order_status', '!=', 'Finished')->pluck('order_number');

        // Filter items based on the order numbers
        $item = DB::table('item')
            ->whereIn('order_number', $orderNumbers)
            ->get();

        // Filter joined items based on the order numbers
        $itemJoin = DB::table('item')
            ->join('itemadd', 'item.order_number', '=', 'itemadd.order_number')
            ->whereIn('item.order_number', $orderNumbers)
            ->select('item.*', 'itemadd.*')
            ->get();

        return view('activities.item', compact('item', 'itemJoin'));
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
        $standardParts = StandartpartAPI::whereIn('kd_akun', ['131110', '131120', '131130'])->get();
        $order = Order::where('order_status', '!=', 'Finished')->get();
        return view('activities.createitem', compact('material', 'order', 'standardParts'));
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


    public function edititem($order_number)
    {
        $order = Order::where('order_status', '!=', 'Finished')->get();
        $material = Material::get();
        $item       = DB::table('item')->where('order_number', $order_number)->first();
        $itemJoin   = DB::table('item')
            ->join('itemadd', 'item.order_number', '=', 'itemadd.order_number')
            ->select('item.*', 'itemadd.*')
            ->where('itemadd.order_number', $order_number)
            ->get();
        return view('activities.edititem', compact('order', 'material', 'item', 'itemJoin'));
    }
    public function updateitem(Request $request)
    {
        DB::beginTransaction();
        try {
            // dd($request->all());
            $update = [
                'order_number'  =>  $request->order_number,
                'so_number'     =>  $request->so_number,
                'product'       =>  $request->product,
                'company_name'  =>  $request->company_name,
                'dod'           =>  $request->dod,
            ];
            Item::where('order_number', $request->order_number)->update($update);
            ItemAdd::where('order_number', $request->order_number)->delete();

            foreach ($request->item as $key => $item) {
                $itemAdd = [
                    'item'        => $item,
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
                ];
                ItemAdd::create($itemAdd);
            }
            DB::commit();
            return redirect()->route('activities.item')->with('success', 'Item Successfully Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed Updated Item');
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


    public function processing()
    {
        // Get all order numbers from the Order model where order_status is not 'Finished'
        $orderNumbers = Order::where('order_status', '!=', 'Finished')->pluck('order_number');

        // Filter processings based on the order numbers
        $processing = ProcessingAdd::whereIn('order_number', $orderNumbers)->get();

        return view('activities.processing', compact('processing'));
    }


    public function createprocessing()
    {
        $orders = Order::where('order_status', '!=', 'Finished')->get();
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
    public function standartpartindex()
    {
        // Get all order numbers from the Order model where order_status is not 'Finished'
        $orderNumbers = Order::where('order_status', '!=', 'Finished')->pluck('order_number');

        // Filter standart_part based on the order numbers
        $standartpart = DB::table('standart_part')
            ->whereIn('order_number', $orderNumbers)
            ->get();

        // Filter joined standart_part and standart_partadd based on the order numbers
        $standartpartJoin = DB::table('standart_part')
            ->join('standart_partadd', 'standart_part.order_number', '=', 'standart_partadd.order_number')
            ->whereIn('standart_part.order_number', $orderNumbers)
            ->select('standart_part.*', 'standart_partadd.*')
            ->get();

        return view('activities.standartpart', compact('standartpart', 'standartpartJoin'));
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
        $orders = Order::where('order_status', '!=', 'Finished')->get();
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
            Log::info('Creating standart_part entry', [
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
                standart_part::create([
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
                Log::error('Error creating standart_part entry', [
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
        Log::info('All standart_part entries added successfully');

        // Redirect with success message
        return redirect()->route('activities.createstandartpart')->with('success', 'Standart Part(s) added successfully.');
    }


    public function editstandartpart($id)
    {
        $standartpart = DB::table('standart_part')->where('id', $id)->first();
        if (!$standartpart) {
            return redirect()->route('activities.standartpart')->with('error', 'Standard part not found.');
        }

        $orders = Order::get();
        $items = ItemAdd::get();
        $standardParts = StandartpartAPI::get();

        return view('activities.editstandartpart', compact('standartpart', 'orders', 'items', 'standardParts'));
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
    public function sub_contract()
    {
        return view('activities.subcontract');
    }

    public function createsub_contract()
    {
        $orders = Order::where('order_status', '!=', 'Finished')->get();
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
        return redirect()->route('activities.createsub_contract')->with('success', 'Sub Contract(s) added successfully.');
    }

    public function editsub_contract($id)
    {
        $sub_contract = sub_contract::find($id);
        if (!$sub_contract) {
            return redirect()->route('activities.sub_contract')->with('error', 'Sub-contract not found.');
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
            return redirect()->route('activities.sub_contract')->with('error', 'Sub-contract not found.');
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
        return redirect()->route('activities.sub_contract')->with('success', 'Sub-contract updated successfully.');
    }

    public function deletesub_contract($id)
    {
        $sub_contract = sub_contract::find($id);
        if (!$sub_contract) {
            return redirect()->route('activities.sub_contract')->with('error', 'Sub-contract not found.');
        }

        // Delete the sub-contract entry
        $sub_contract->delete();

        // Redirect with success message
        return redirect()->route('activities.sub_contract')->with('success', 'Sub-contract deleted successfully.');
    }



    //Overhead_manufacture Controller
    public function overhead_manufacture()
    {
        return view('activities.overheadmanufacture');
    }

    public function createoverhead_manufacture()
    {
        $orders = Order::where('order_status', '!=', 'Finished')->get();
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

    public function editoverhead_manufacture($id)
    {
        $overhead = overhead::find($id);
        if (!$overhead) {
            return redirect()->route('activities.overhead_manufacture')->with('error', 'Overhead manufacture record not found.');
        }

        $order = Order::where('order_status', '!=', 'Finished')->get();
        return view('activities.editoverhead_manufacture', compact('overhead', 'order'));
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


    //Material Controller
    public function material()
    {
        $material = Material::get();
        return view('activities.material', compact('material'));
    }

    public function creatematerial()
    {
        $creatematerial = Material::get();
        return view('activities.creatematerial', compact('creatematerial'));
    }

    public function storeMaterial(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_material' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'length' => 'required|numeric|min:0',
            'width' => 'required|numeric|min:0',
            'thickness' => 'required|numeric|min:0',
        ]);

        // Create a new material record
        $material = new Material;
        $material->id_material = $request->id_material;
        $material->material = $request->material;
        $material->length = $request->length;
        $material->width = $request->width;
        $material->thickness = $request->thickness;
        $material->save();

        // Redirect with success message
        return redirect()->route('activities.material')->with('success', 'Material added successfully!');
    }

    public function editMaterial($id)
    {
        $material = Material::findOrFail($id);
        return view('activities.editmaterial', compact('material'));
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

        // Filter by item_number if provided and ensure item_number is in the filtered orders
        if ($request->filled('item_number')) {
            $query->where('item_number', $request->item_number);
            Log::info('Filtering by item number', ['item_number' => $request->item_number]);
        } else {
            Log::info('No item number provided for filtering');
        }

        // Get the filtered used time data
        $usedtime = $query->get();
        Log::info('Used time data retrieved', ['usedtime' => json_encode($usedtime)]);

        $user = auth()->user();
        Log::info('Authenticated user', ['user' => json_encode($user)]);

        return view('activities.used_time', compact('usedtime', 'orders', 'items', 'user'));
    }

    public function updateStatus(Request $request, $id)
    {
        Log::info('Update status method called.', ['processing_add_id' => $id, 'action' => $request->action]);

        $processingAdd = ProcessingAdd::find($id);
        $user = auth()->user();

        if (!$processingAdd) {
            Log::error('ProcessingAdd not found.', ['processing_add_id' => $id]);
            return redirect()->route('activities.used_time')->withErrors(['error' => 'ProcessingAdd not found.']);
        }

        if ($request->action == 'start') {
            if ($processingAdd->status == 'pending') {
                $processingAdd->status = 'started';
                $processingAdd->started_at = now();
            } else {
                // Start from initial state
                $processingAdd->status = 'started';
                $processingAdd->started_at = now();
                $processingAdd->duration = 0;
            }
        } elseif ($request->action == 'pending') {
            $processingAdd->status = 'pending';
            $processingAdd->pending_at = now();
            $processingAdd->duration += now()->diffInSeconds($processingAdd->started_at);
        } elseif ($request->action == 'finish') {
            $processingAdd->status = 'finished';
            $processingAdd->finished_at = now();
            $processingAdd->duration += now()->diffInSeconds($processingAdd->started_at);
        } else {
            Log::error('Invalid action provided.', ['action' => $request->action]);
            return redirect()->route('activities.used_time')->withErrors(['error' => 'Invalid action.']);
        }

        $processingAdd->user_name = $user->name; // Storing the user's name
        $processingAdd->save();
        Log::info('ProcessingAdd status updated.', ['processing_add_id' => $processingAdd->id, 'status' => $processingAdd->status, 'duration' => $processingAdd->duration]);

        // Update the order status based on the new processing statuses
        try {
            $processingAdd->order->updateOrderStatus();
            Log::info('Order status updated.', ['order_id' => $processingAdd->order->id]);
        } catch (\Exception $e) {
            Log::error('Error updating order status.', ['order_id' => $processingAdd->order->id, 'error' => $e->getMessage()]);
            return redirect()->route('activities.used_time')->withErrors(['error' => 'Error updating order status.']);
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
    public function CloseOrder()
    {
        $order = Order::finished()->get();
        return view('activities.closeorder', compact('order'));
    }

    public function updateStatusClosed(Request $request, $id)
    {
        Log::info('Received request to update order status', [
            'order_id' => $id,
            'request_data' => $request->all(),
        ]);

        // Validate the request
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
            return response()->json(['success' => false, 'message' => 'Validation failed.'], 400); // Return 400 for validation error
        }

        try {
            // Find the order and update the status
            $order = Order::findOrFail($id);
            $newStatus = $request->input('order_status');
            $order->order_status = $newStatus;
            $order->save();

            Log::info('Order status updated', [
                'order_id' => $order->id,
                'new_status' => $newStatus,
            ]);

            return response()->json(['success' => true, 'message' => 'Order status updated successfully.'], 200); // Return 200 for success
        } catch (\Exception $e) {
            Log::error('Error updating order status', [
                'order_id' => $id,
                'error_message' => $e->getMessage(),
            ]);
            return response()->json(['success' => false, 'message' => 'Failed to update order status.'], 500); // Return 500 for server error
        }
    }



    public function calculation()
    {
        $orders = Order::where('order_status', '!=', 'Finished')->pluck('order_number', 'id'); // Fetch orders with condition
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
            $totalSales = $order->salesOrder->total_amount ?? 0;
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

    // Store or update WIP data
    // Store or update WIP data
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

            WIP::updateOrCreate(
                ['order_id' => $order->id],
                $wipData
            );
            Log::info('WIP data stored/updated successfully.', $wipData);
        } catch (\Exception $e) {
            Log::error('Error storing/updating WIP data.', ['error' => $e->getMessage()]);
            throw $e; // Re-throw exception for higher-level handling if necessary
        }
    }


    // Store or update WIP data for all orders
    private function storeWIPDataForAllOrders()
    {
        try {
            // Fetch all orders that need to be updated. You can apply filters if needed.
            $orders = Order::with(['items.processings', 'processings', 'subContracts', 'salesOrder', 'standartParts', 'overheads'])->get();

            foreach ($orders as $order) {
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
                    'wip_date' => now() // Add current date
                ];

                // Update or create WIP data for each order
                WIP::updateOrCreate(
                    ['order_id' => $order->id],
                    $wipData
                );

                Log::info('WIP data stored/updated successfully for order.', $wipData);
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
    public function maintenance_standart()
    {
        return view('activities.maintenancestandart');
    }
    public function copyOrder()
    {
        $orders = Order::all(); // Fetch all orders
        return view('activities.copy_order', compact('orders'));
    }

    public function storeCopiedOrder(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'selected_order_id' => 'required|exists:order,id',
            'order_number' => 'required|unique:order,order_number'
        ]);

        // Fetch the selected order
        $selectedOrder = Order::find($validatedData['selected_order_id']);

        // Create a new Order instance with the data from the selected order
        $newOrder = $selectedOrder->replicate();
        $newOrder->order_number = $request->input('order_number');
        $newOrder->save();

        // Copy related items
        $items = Item::where('order_number', $selectedOrder->order_number)->get();
        foreach ($items as $item) {
            $newItem = $item->replicate();
            $newItem->order_number = $newOrder->order_number;
            $newItem->save();

            // Copy associated item additions
            $itemAdds = ItemAdd::where('order_number', $item->order_number)->get();
            foreach ($itemAdds as $itemAdd) {
                $newItemAdd = $itemAdd->replicate();
                $newItemAdd->order_number = $newItem->order_number;
                $newItemAdd->save();
            }
        }

        // Copy related processing additions
        $processes = ProcessingAdd::where('order_number', $selectedOrder->order_number)->get();
        foreach ($processes as $process) {
            $newProcess = $process->replicate();
            $newProcess->order_number = $newOrder->order_number;
            $newProcess->save();
        }

        // Redirect back with a success message
        return redirect()->route('activities.order')->with('success', 'Order copied successfully with related items and processes.');
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


    public function delivery_process()
    {
        $order = Order::finished()->get();
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
