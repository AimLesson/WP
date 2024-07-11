<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Unit;
use App\Models\User;
use App\Models\Order;
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
use App\Models\processingadd;
use App\Models\SalesOrderAdd;
use App\Models\standart_part;
use App\Models\StandartpartAPI;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $user = User::get();
        return view('activities.createquotation', compact('user', 'unit', 'tax_type', 'customers'));
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
        $user = User::get();
        $quotation     = DB::table('quotation')->where('quotation_no', $quotation_no)->first();
        $quotationJoin = DB::table('quotation')
            ->join('quotationadd', 'quotation.quotation_no', '=', 'quotationadd.quotation_no')
            ->select('quotation.*', 'quotationadd.*')
            ->where('quotationadd.quotation_no', $quotation_no)
            ->get();

        return view('activities.editquotation', compact('quotation', 'quotationJoin', 'user', 'unit', 'tax_type', 'customers'));
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
        $tax_type = TaxType::get();
        $user = User::get();
        $producttype = ProductType::get();
        $order_unit = OrderUnit::get();
        $quotation  = Quotation::get();

        return view('activities.createso', compact('producttype', 'order_unit', 'user', 'tax_type', 'unit', 'kbli', 'quotation'));
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
        $request->validate([
            'so_number'         => 'required|unique:salesorder,so_number',
            'quotation_no'      => 'required',
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
            $salesorder = new SalesOrder;
            $salesorder->so_number         = $request->so_number;
            $salesorder->quotation_no      = $request->quotation_no;
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

            $inputsubtotal = $request->input('subtotal');
            $subtotal = str_replace(['Rp', '.', ','], '', $inputsubtotal);
            $salesorder->subtotal          = $subtotal;

            $inputdiscount = $request->input('discount');
            $discount = str_replace(['Rp', '.', ','], '', $inputdiscount);
            $salesorder->discount          = $discount;

            $inputtax = $request->input('tax');
            $tax = str_replace(['Rp', '.', ','], '', $inputtax);
            $salesorder->tax               = $tax;

            $inputfreight = $request->input('freight');
            $freight = str_replace(['Rp', '.', ','], '', $inputfreight);
            $salesorder->freight           = $freight;

            $inputTotalAmount = $request->input('total_amount');
            $totalAmount = str_replace(['Rp', '.', ','], '', $inputTotalAmount);
            $salesorder->total_amount = $totalAmount;

            $salesorder->discount_percent  = $request->discount_percent;
            $salesorder->tax_type          = $request->tax_type;
            $salesorder->description       = $request->description;

            if ($request->hasFile('file')) {
                $file = $request->file('file'); // Ubah dari 'image_path' menjadi 'file'
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/lte/dist/so', $fileName); // Simpan gambar ke direktori yang sesuai
                $salesorder->file = $fileName;
            }
            $salesorder->save();

            foreach ($request->item as $key => $items) {
                $soAdd['item']           = $items;
                $soAdd['so_number']      = $salesorder->so_number;
                $soAdd['item_desc']      = $request->item_desc[$key];
                $soAdd['qty']            = $request->qty[$key];
                $soAdd['unit']           = $request->unit[$key];
                $inputUnitPrice = str_replace(['Rp', ',', '.'], '', $request->input('unit_price')[$key]);
                $soAdd['unit_price'] = $inputUnitPrice;

                $soAdd['disc']           = $request->disc[$key];
                $inputAmount = str_replace(['Rp', ',', '.'], '', $request->input('amount')[$key]);
                $soAdd['amount'] = $inputAmount;

                $soAdd['product_type']   = $request->product_type[$key];
                $soAdd['order_no']       = $request->order_no[$key];
                $soAdd['spec']           = $request->spec[$key];
                $soAdd['kbli']           = $request->kbli[$key];

                SalesOrderAdd::create($soAdd);
            }

            DB::commit();

            return redirect()->route('activities.salesorder')->with('success', 'Sales Order added successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('activities.createso')->with('error', 'Failed to add Sales Order. Please try again!');
        }
    }
    public function editsalesorder($so_number)
    {
        $kbli = Kblicode::get();
        $unit = Unit::get();
        $tax_type = TaxType::get();
        $user = User::get();
        $producttype = ProductType::get();
        $order_unit = OrderUnit::get();
        $quotation = Quotation::get();
        $salesorder     = DB::table('salesorder')->where('so_number', $so_number)->first();
        $salesorderJoin = DB::table('salesorder')
            ->join('soadd', 'salesorder.so_number', '=', 'soadd.so_number')
            ->select('salesorder.*', 'soadd.*')
            ->where('soadd.so_number', $so_number)
            ->get();

        return view('activities.editsalesorder', compact('producttype', 'order_unit', 'user', 'tax_type', 'unit', 'kbli', 'quotation', 'salesorder', 'salesorderJoin'));
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
        $order['order_status'] = $request->order_status;
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
        $order = Order::where('order_status', '!=', 'Finished')->get();
        return view('activities.createitem', compact('material', 'order'));
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
            $item = new Item;
            $item->order_number = $request->order_number;
            $item->so_number = $request->so_number;
            $item->product = $request->product;
            $item->company_name = $request->company_name;
            $item->dod = $request->dod;
            $item->save();
            foreach ($request->item as $key => $items) {
                $itemAdd = [
                    'item'        => $items,
                    'dod_item'     => $request->dod_item[$key],
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
            return redirect()->route('activities.item')->with('success', 'Item Data Saved Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
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
        $item = itemadd::where('no_item', $noItem)->first();

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
        $processing = processingadd::whereIn('order_number', $orderNumbers)->get();
    
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

    public function getItemsByOrderNumber($orderNumber)
        {
            $items = ItemAdd::where('order_number', $orderNumber)->get();
            return response()->json($items);
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
            'total.*' => 'required|numeric|min:0',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Iterate over each set of item details and create process entries
        foreach ($request->nop as $index => $nop) {
            Processingadd::create([
                'order_number' => $request->order_number,
                'item_number' => $request->no_item,
                'nop' => $nop,
                'machine' => $request->machine_name[$index],
                'operation' => $request->operation[$index],
                'estimated_time' => $request->est_time[$index],
                'date_wanted' => $request->dod[$index],
                'mach_cost' => $request->machine_cost[$index],
                'total' => $request->total[$index],
            ]);
        }

        // Redirect with success message
        return redirect()->route('activities.createprocessing')->with('success', 'Process(es) added successfully.');
    }
    public function editprocessing($id)
    {
        $processing = Processingadd::find($id);
        if (!$processing) {
            return redirect()->route('activities.processing')->with('error', 'Processing entry not found.');
        }

        $order = Order::where('order_status', '!=', 'Finished')->get();
        $material = Material::get();
        $machine = Machine::get();
        $items = ItemAdd::get();
        $item = ItemAdd::get();

        return view('activities.editprocessing', compact('processing', 'orders', 'material', 'machine', 'items', 'item'));
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
        $processing = Processingadd::find($id);
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
        $processing = Processingadd::find($id);

        // Check if the entry exists
        if (!$processing) {
            return redirect()->route('activities.processing')->with('error', 'Processing entry not found.');
        }

        // Delete the entry
        $processing->delete();

        // Redirect with success message
        return redirect()->route('activities.processing')->with('success', 'Processing entry deleted successfully.');
    }
    public function getMachineCost(Request $request)
    {
        $machineName = $request->input('machine_name');
        $machine = Machine::where('machine_name', $machineName)->first();

        if ($machine) {
            return response()->json([
                'machine_cost' => $machine->mach_cost_per_hour,
            ]);
        }

        return response()->json([
            'error' => 'Machine not found',
        ], 404);
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
        $standardParts = StandartpartAPI::get();
        return view('activities.createstandartpart', compact('standardParts', 'orders', 'items'));
    }

    public function storestandartpart(Request $request)
    {
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

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Iterate over each set of item details and create sub_contract entries
        foreach ($request->date as $index => $date) {
            standart_part::create([
                'order_number' => $request->order_number,
                'item_no' => $request->no_item,
                'item_name' => $request->item,
                'date' => $date,
                'part_name' => $request->part_name[$index],
                'qty' => $request->qty[$index],
                'unit' => $request->unit[$index],
                'price' => $request->price_unit[$index],
                'total' => $request->total_price[$index],
                'info' => $request->info[$index] ?? null,
            ]);
        }

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
        return redirect()->route('activities.createoverhead_manufacture')->with('success', 'Overhead Manufacture(s) added successfully.');
    }

    public function editoverhead_manufacture($id)
    {
        $overhead = overhead::find($id);
        if (!$overhead) {
            return redirect()->route('activities.overhead_manufacture')->with('error', 'Overhead manufacture record not found.');
        }

        $order = Order::where('order_status', '!=', 'Finished')->get();
        return view('activities.editoverhead_manufacture', compact('overhead', 'orders'));
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
        // Get orders with order_status not 'Finished'
        $orders = Order::where('order_status', '!=', 'Finished')->get();
        $orderNumbers = $orders->pluck('order_number');
    
        // Get items where order_number is in the filtered orders
        $items = ItemAdd::whereIn('order_number', $orderNumbers)->get();
    
        // Start the query for ProcessingAdd
        $query = ProcessingAdd::whereIn('order_number', $orderNumbers);
    
        // Filter by order_number if provided
        if ($request->filled('order_number')) {
            $query->where('order_number', $request->order_number);
        }
    
        // Filter by item_number if provided and ensure item_number is in the filtered orders
        if ($request->filled('item_number')) {
            $query->where('item_number', $request->item_number);
        }
    
        // Get the filtered used time data
        $usedtime = $query->get();
    
        return view('activities.used_time', compact('usedtime', 'orders', 'items'));
    }
    

    public function updateStatus(Request $request, $id)
    {
        $processingAdd = ProcessingAdd::find($id);
    
        if ($request->action == 'start') {
            if ($processingAdd->status == 'pending') {
                // Continue from the pending state
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
        }
    
        $processingAdd->save();
    
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



    public function calculation()
    {
        $orders = Order::pluck('order_number', 'id'); // Fetch all orders for selection
        return view('activities.calculation', compact('orders'));
    }

    public function calculate(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:order,id',
        ]);

        $order = Order::with(['items', 'processings', 'subContracts'])->findOrFail($validatedData['order_id']);

        // Calculate totals
        $totalSales = $order->total_amount;

        // Example calculations based on related models
        $totalMaterialCost = $order->items->sum('material_cost');
        $totalProcessingCost = $order->processings->sum('mach_cost');
        $totalSubContractCost = $order->subContracts->sum('total_price');

        return response()->json([
            'totalSales' => number_format($totalSales, 2),
            'totalMaterialCost' => number_format($totalMaterialCost, 2),
            'totalProcessingCost' => number_format($totalProcessingCost, 2),
            'totalSubContractCost' => number_format($totalSubContractCost, 2),
        ]);
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
    public function delivery_process()
    {
        return view('activities.deliveryprocess');
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
