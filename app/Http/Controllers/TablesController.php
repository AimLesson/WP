<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TablesController extends Controller
{
    //tabels
    public function tables()
    {
        return view('tables.tables');
    }

    public function orders()
    {
        return view('tables.orders');
    }
    public function customers()
    {
        $customer = Customer::get();
        return view('tables.customers', compact('customer'));
    }

    public function createcustomers()
    {
        return view('tables.createcustomers');
    }

    public function storecustomers(Request $request)
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
            return redirect()->route('tables.createcustomers')->withErrors($validator)->withInput();
        }

        $customer = new Customer();
        $customer->customer_no = $request->customer_no;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->tax_address = $request->tax_address;
        $customer->city = $request->city;
        $customer->province = $request->province ?? null; // Menggunakan null jika tidak ada input
        $customer->zipcode = $request->zipcode ?? null; // Menggunakan null jika tidak ada input
        $customer->country = $request->country;
        $customer->phone = $request->phone;
        $customer->fax = $request->fax ?? null; // Menggunakan null jika tidak ada input
        $customer->cp = $request->cp;
        $customer->email = $request->email;
        $customer->company = $request->company;
        $customer->npwp = $request->npwp;
        $customer->web_page = $request->web_page ?? null; // Menggunakan null jika tidak ada input

        $customer->save();

        return redirect()->route('tables.customer')->with('success', 'Customer Added');
    }

    public function editcustomers(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('tables.customers')->with('error', 'Customer not found!');
        }

        return view('tables.editcustomers', compact('customer'));
    }

    public function updatecustomers(Request $request, $id)
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
            return redirect()->route('tables.createcustomers')->withErrors($validator)->withInput();
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

        return redirect()->route('tables.customers')->with('success', 'Customer Updated');
    }

    public function deletecustomers(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('tables.customers')->with('error', 'Customer not found!');
        }

        $customer->delete();

        return redirect()->route('tables.customers')->with('success', 'Customer data successfully deleted');
    }

    public function ordersstandartpart()
    {
        return view('tables.ordersstandartpart');
    }

    public function ordersmaterial()
    {
        return view('tables.ordersmaterial');
    }
    
    public function orderssubcontr()
    {
        return view('tables.orderssubcontr');
    }

    public function ordersopd()
    {
        return view('tables.ordersopd');
    }


    public function machines()
    {
        return view('tables.machines');
    }
    public function orderpriority_real()
    {
        return view('tables.orderpriority_real');
    }

    public function orderpriority_all()
    {
        return view('tables.orderpriority_all');
    }
    public function loadofmachines()
    {
        return view('tables.loadofmachines');
    }
    public function orderonprocess()
    {
        return view('tables.orderonprocess');
    }
    public function overheadmanufacture()
    {
        return view('tables.overheadmanufacture');
    }
    public function standartpart()
    {
        return view('tables.standartpart');
    }
    public function subcontr()
    {
        return view('tables.subcontr');
    }
    public function machineshistory()
    {
        return view('tables.machineshistory');
    }
    public function oldorders()
    {
        return view('tables.oldorders');
    }
    public function trackingorder()
    {
        return view('tables.trackingorder');
    }
    public function monitor()
    {
        return view('tables.monitor');
    }
    public function delivery()
    {
        return view('tables.delivery');
    }
    public function rekaporderma()
    {
        return view('tables.rekaporderma');
    }

//end_tabels
}
