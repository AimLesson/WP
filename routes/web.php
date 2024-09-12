<?php

use function Laravel\Prompts\table;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\TablesController;
use App\Http\Controllers\UsedTimeController;
use App\Http\Controllers\ActivitiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logoutOnClose', [LoginController::class, 'logoutOnClose']);
Route::get('/fetch-table-data', [ActivitiesController::class, 'fetchData'])->name('fetch.data');

Route::group(['middleware' => 'disable_back_btn'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
                //file
        Route::get('/file', [HomeController::class, 'file'])->name('file');
        //file - change password
        Route::get('file/user/changepw', [HomeController::class, 'changepw'])->name('user.changepw');
        //file - user profile
        Route::get('/file/user', [HomeController::class, 'user'])->name('user');
        Route::get('file/user/create', [HomeController::class, 'createuser'])->name('user.create');
        Route::post('file/user/store', [HomeController::class, 'storeuser'])->name('user.store');
        Route::get('file/user/edit/{id}', [HomeController::class, 'edituser'])->name('user.edit');
        Route::post('file/user/updatepw', [HomeController::class, 'updatepw'])->name('user.updatepw');
        Route::put('file/user/update/{id}', [HomeController::class, 'updateuser'])->name('user.update');
        Route::delete('file/user/delete/{id}', [HomeController::class, 'deleteuser'])->name('user.delete');

        //file - active user
        Route::get('/file/user/active', [HomeController::class, 'active'])->name('user.active');


        //setup
        Route::get('/file/privileges', [SetupController::class, 'privileges'])->name('file.privileges');
        Route::get('/setup', [SetupController::class, 'setup'])->name('setup');
        //setup - machine
        Route::get('/setup/machine', [SetupController::class, 'machine'])->name('setup.machine');
        Route::get('/setup/machine/view/{id}', [SetupController::class, 'viewmachine'])->name('setup.viewmachine');
        Route::get('/setup/machine/create', [SetupController::class, 'createmachine'])->name('setup.createmachine');
        Route::get('/setup/machine/edit/{id}', [SetupController::class, 'editmachine'])->name('setup.editmachine');
        Route::put('/setup/machine/update/{id}', [SetupController::class, 'updatemachine'])->name('setup.updatemachine');
        Route::post('/setup/machine/store', [SetupController::class, 'storemachine'])->name('setup.storemachine');
        Route::delete('/setup/machine/delete/{id}', [SetupController::class, 'deletemachine'])->name('setup.deletemachine');

        //setup - work unit
        Route::get('/setup/workunit', [SetupController::class, 'workunit'])->name('setup.workunit');
        Route::get('/setup/workunit/add', [SetupController::class, 'createworkunit'])->name('setup.createworkunit');
        Route::get('/setup/workunit/edit/{id}', [SetupController::class, 'editworkunit'])->name('setup.editworkunit');
        Route::put('/setup/workunit/update/{id}', [SetupController::class, 'updateworkunit'])->name('setup.updateworkunit');
        Route::post('/setup/workunit/store', [SetupController::class, 'storeworkunit'])->name('setup.storeworkunit');
        Route::delete('/setup/workunit/delete/{id}', [SetupController::class, 'deleteworkunit'])->name('setup.deleteworkunit');

        //setup - plan
        Route::get('/setup/plan', [SetupController::class, 'plan'])->name('setup.plan');
        Route::get('/setup/plan/create', [SetupController::class, 'createplan'])->name('setup.createplan');
        Route::get('setup/plan/view/{plan_name}', [SetupController::class, 'viewplan']);
        Route::post('/setup/plan/store', [SetupController::class, 'storeplan'])->name('setup.storeplan');
        Route::get('/setup/plan/edit/{plan_name}', [SetupController::class, 'editplan']);
        Route::post('/setup/plan/update', [SetupController::class, 'updateplan'])->name('setup.updateplan');
        Route::delete('/setup/plan/{id}/destroy', [SetupController::class, 'destroyplan'])->name('setup.destroyplan');
        Route::delete('/setup/planadd/delete', [SetupController::class, 'deleteplanadd'])->name('setup.deleteplanadd');

        //setup - order code
        Route::get('/setup/ordercode', [SetupController::class, 'ordercode'])->name('setup.ordercode');

        //setup - order code - order unit
        Route::get('/setup/ordercode/orderunit', [SetupController::class, 'orderunit'])->name('setup.orderunit');
        Route::get('/setup/ordercode/orderunit/add', [SetupController::class, 'createorderunit'])->name('setup.createorderunit');
        Route::post('/setup/ordercode/orderunit/store', [SetupController::class, 'storeorderunit'])->name('setup.storeorderunit');
        Route::get('/setup/ordercode/orderunit/edit/{id}', [SetupController::class, 'editorderunit'])->name('setup.editorderunit');
        Route::put('/setup/ordercode/orderunit/update/{id}', [SetupController::class, 'updateorderunit'])->name('setup.updateorderunit');
        Route::delete('/setup/ordercode/orderunit/delete/{id}', [SetupController::class, 'deleteorderunit'])->name('setup.deleteorderunit');

        //setup - order code - machine state
        Route::get('/setup/ordercode/machine', [SetupController::class, 'ordermachine'])->name('setup.ordermachine');
        Route::get('/setup/ordercode/machine-state/add', [SetupController::class, 'createmachinestate'])->name('setup.createmachinestate');
        Route::post('/setup/ordercode/machine-state/store', [SetupController::class, 'storemachinestate'])->name('setup.storemachinestate');
        Route::get('/setup/ordercode/machine-state/edit/{id}', [SetupController::class, 'editmachinestate'])->name('setup.editmachinestate');
        Route::put('/setup/ordercode/machine-state/update/{id}', [SetupController::class, 'updatemachinestate'])->name('setup.updatemachinestate');
        Route::delete('/setup/ordercode/machine-state/delete/{id}', [SetupController::class, 'deletemachinestate'])->name('setup.deletemachinestate');

        //setup - order code - unit
        Route::get('/setup/ordercode/unit', [SetupController::class, 'unit'])->name('setup.unit');
        Route::get('/setup/ordercode/unit/add', [SetupController::class, 'createunit'])->name('setup.createunit');
        Route::post('/setup/ordercode/unit/store', [SetupController::class, 'storeunit'])->name('setup.storeunit');
        Route::get('/setup/ordercode/unit/edit/{id}', [SetupController::class, 'editunit'])->name('setup.editunit');
        Route::put('/setup/ordercode/unit/update/{id}', [SetupController::class, 'updateunit'])->name('setup.updateunit');
        Route::delete('/setup/ordercode/unit/delete/{id}', [SetupController::class, 'deleteunit'])->name('setup.deleteunit');

        //setup - department
        Route::get('/setup/department', [SetupController::class, 'department'])->name('setup.department');
        Route::get('/setup/department/add', [SetupController::class, 'createdepartment'])->name('setup.createdepartment');
        Route::get('/ambil-data-workunit/{workunit}', [SetupController::class, 'ambilDataWorkUnit']);
        Route::get('/setup/department/edit/{id}', [SetupController::class, 'editdepartment'])->name('setup.editdepartment');
        Route::put('/setup/department/update/{id}', [SetupController::class, 'updatedepartment'])->name('setup.updatedepartment');
        Route::post('/setup/department/store', [SetupController::class, 'storedepartment'])->name('setup.storedepartment');
        Route::delete('/setup/department/delete/{id}', [SetupController::class, 'deletedepartment'])->name('setup.deletedepartment');

        //setup - kbli code
        Route::get('/setup/kblicode', [SetupController::class, 'kblicode'])->name('setup.kblicode');
        Route::get('/setup/kblicode/add', [SetupController::class, 'createkblicode'])->name('setup.createkblicode');
        Route::get('/setup/kblicode/edit/{id}', [SetupController::class, 'editkblicode'])->name('setup.editkblicode');
        Route::put('/setup/kblicode/update/{id}', [SetupController::class, 'updatekblicode'])->name('setup.updatekblicode');
        Route::post('/setup/kblicode/store', [SetupController::class, 'storekblicode'])->name('setup.storekblicode');
        Route::delete('/setup/kblicode/delete/{id}', [SetupController::class, 'deletekblicode'])->name('setup.deletekblicode');

        //setup - target so
        Route::get('/setup/sotarget', [SetupController::class, 'sotarget'])->name('setup.sotarget');
        Route::get('/setup/sotarget/add', [SetupController::class, 'createsotarget'])->name('setup.createsotarget');
        Route::get('/setup/sotarget/edit/{id}', [SetupController::class, 'editsotarget'])->name('setup.editsotarget');
        Route::put('/setup/sotarget/update/{id}', [SetupController::class, 'updatesotarget'])->name('setup.updatesotarget');
        Route::post('/setup/sotarget/store', [SetupController::class, 'storesotarget'])->name('setup.storesotarget');
        Route::delete('/setup/sotarget/delete/{id}', [SetupController::class, 'deletesotarget'])->name('setup.deletesotarget');

        //setup - tax type
        Route::get('/setup/taxtype', [SetupController::class, 'taxtype'])->name('setup.taxtype');
        Route::get('/setup/taxtype/add', [SetupController::class, 'createtaxtype'])->name('setup.createtaxtype');
        Route::get('/setup/taxtype/edit/{id}', [SetupController::class, 'edittaxtype'])->name('setup.edittaxtype');
        Route::put('/setup/taxtype/update/{id}', [SetupController::class, 'updatetaxtype'])->name('setup.updatetaxtype');
        Route::post('/setup/taxtype/store', [SetupController::class, 'storetaxtype'])->name('setup.storetaxtype');
        Route::delete('/setup/taxtype/delete/{id}', [SetupController::class, 'deletetaxtype'])->name('setup.deletetaxtype');

        //setup - product type
        Route::get('/setup/producttype', [SetupController::class, 'producttype'])->name('setup.producttype');
        Route::get('/setup/producttype/add', [SetupController::class, 'createproducttype'])->name('setup.createproducttype');
        Route::get('/setup/producttype/edit/{id}', [SetupController::class, 'editproducttype'])->name('setup.editproducttype');
        Route::put('/setup/producttype/update/{id}', [SetupController::class, 'updateproducttype'])->name('setup.updateproducttype');
        Route::post('/setup/producttype/store', [SetupController::class, 'storeproducttype'])->name('setup.storeproducttype');
        Route::delete('/setup/producttype/delete/{id}', [SetupController::class, 'deleteproducttype'])->name('setup.deleteproducttype');

        //setup - shipping
        Route::get('/setup/shipping', [SetupController::class, 'shipping'])->name('setup.shipping');
        Route::get('/setup/shipping/add', [SetupController::class, 'createshipping'])->name('setup.createshipping');
        Route::get('/setup/shipping/edit/{id}', [SetupController::class, 'editshipping'])->name('setup.editshipping');
        Route::put('/setup/shipping/update/{id}', [SetupController::class, 'updateshipping'])->name('setup.updateshipping');
        Route::post('/setup/shipping/store', [SetupController::class, 'storeshipping'])->name('setup.storeshipping');
        Route::delete('/setup/shipping/delete/{id}', [SetupController::class, 'deleteshipping'])->name('setup.deleteshipping');

        //setup - directoryset
        Route::get('/setup/directoryset', [SetupController::class, 'directoryset'])->name('setup.directoryset');

        //setup - order code - print
        Route::get('/setup/print/productionsheet/view', [SetupController::class, 'viewps'])->name('setup.viewps');
        Route::get('/setup/print/productionsheet', [SetupController::class, 'print_productionsheet'])->name('setup.print_productionsheet');
        Route::get('/setup/print/productionsheet/create', [SetupController::class, 'create_productionsheet'])->name('setup.create_productionsheet');

        //setup - order code - previleges
        Route::get('/setup/privileges', [SetupController::class, 'privileges'])->name('setup.privileges');

        //setup - order code - company info
        Route::get('/setup/companyinfo', [SetupController::class, 'companyinfo'])->name('setup.companyinfo');
        Route::get('/setup/companyinfo/edit/{id}', [SetupController::class, 'editcompanyinfo'])->name('setup.editcompanyinfo');
        Route::put('/setup/companyinfo/update/{id}', [SetupController::class, 'updatecompanyinfo'])->name('setup.updatecompanyinfo');

        //setup - order code - tabel repair
        Route::get('/setup/tabelrepair', [SetupController::class, 'tabelsrepair'])->name('setup.tabelrepair');

        //setup - order code - setup database acc
        Route::get('/setup/databaseacc', [SetupController::class, 'databaseacc'])->name('setup.databaseacc');

        //setup - order code - re-calculation
        Route::get('/setup/recalculation', [SetupController::class, 'recalculation'])->name('setup.recalculation');

        //setup - order code - setting host
        Route::get('/setup/settinghost3', [SetupController::class, 'settinghost3'])->name('setup.settinghost3');

        //setup - material
        Route::get('/setup/material', [SetupController::class, 'material'])->name('setup.material');
        Route::get('/setup/material/create_material', [SetupController::class, 'creatematerial'])->name('setup.creatematerial');
        Route::post('/setup/material/store', [SetupController::class, 'storematerial'])->name('setup.storematerial');
        Route::get('/setup/material/edit/{id}', [SetupController::class, 'editmaterial'])->name('setup.editmaterial');
        Route::put('/setup/material/update/{id}', [SetupController::class, 'updatematerial'])->name('setup.updatematerial');
        Route::delete('/setup/material/delete/{id}', [SetupController::class, 'deletematerial'])->name('setup.deletematerial');

        //setup - Katalog
        Route::get('/setup/katalog', [SetupController::class, 'katalog'])->name('setup.katalog');
        Route::get('/setup/katalog/create_katalog', [SetupController::class, 'createkatalog'])->name('setup.createkatalog');
        Route::post('/setup/katalog/store', [SetupController::class, 'storekatalog'])->name('setup.storekatalog');
        Route::get('/setup/katalog/edit/{id}', [SetupController::class, 'editkatalog'])->name('setup.editkatalog');
        Route::put('/setup/katalog/update/{id}', [SetupController::class, 'updatekatalog'])->name('setup.updatekatalog');
        Route::delete('/setup/katalog/delete/{id}', [SetupController::class, 'deletekatalog'])->name('setup.deletekatalog');



        //table
        Route::get('/table', [TablesController::class, 'tables'])->name('tables');
        //table - order
        Route::get('/table/order', [TablesController::class, 'orders'])->name('tables.orders');
        Route::get('/table/ordersstandartpart', [TablesController::class, 'ordersstandartpart'])->name('tables.ordersstandartpart');
        Route::get('/table/ordersmaterial', [TablesController::class, 'ordersmaterial'])->name('tables.ordersmaterial');
        Route::get('/table/orderssubcontr', [TablesController::class, 'orderssubcontr'])->name('tables.orderssubcontr');
        Route::get('/table/ordersopd', [TablesController::class, 'ordersopd'])->name('tables.ordersopd');

        //table - customer
        Route::get('/table/customers', [TablesController::class, 'customers'])->name('tables.customers');
        Route::get('/table/customers/add', [TablesController::class, 'createcustomers'])->name('tables.createcustomers');
        Route::get('/table/customers/edit/{id}', [TablesController::class, 'editcustomers'])->name('tables.editcustomers');
        Route::put('/table/customers/update/{id}', [TablesController::class, 'updatecustomers'])->name('tables.updatecustomers');
        Route::post('/table/customers/store', [TablesController::class, 'storecustomers'])->name('tables.storecustomers');
        Route::delete('/table/customers/delete/{id}', [TablesController::class, 'deletecustomers'])->name('tables.deletecustomers');

        //table - machine
        Route::get('/table/machine', [TablesController::class, 'machines'])->name('tables.machines');
        //table - machine activity
        //table - machine activity - order priority(real)
        Route::get('/table/machineactivity/orderpriority/real', [TablesController::class, 'orderpriority_real'])->name('tables.orderpriority_real');
        //table - machine activity - order priority(all)
        Route::get('/table/machineactivity/orderpriority/all', [TablesController::class, 'orderpriority_all'])->name('tables.orderpriority_all');
        //table - machine activity - load of machine
        Route::get('/table/machineactivity/loadofmachines', [TablesController::class, 'loadofmachines'])->name('tables.loadofmachines');
        //table - machine activity - order on process
        Route::get('/table/machineactivity/orderonprocess', [TablesController::class, 'orderonprocess'])->name('tables.orderonprocess');
        //table - overhead manufacture
        Route::get('/table/overheadmanufacture', [TablesController::class, 'overheadmanufacture'])->name('tables.overheadmanufacture');
        //table - standart part
        Route::get('/table/standartpart', [TablesController::class, 'standartpart'])->name('tables.standartpart');
        //table - sub contr
        Route::get('/table/subcontr', [TablesController::class, 'subcontr'])->name('tables.subcontr');
        //table - machine history
        Route::get('/table/machinehistory', [TablesController::class, 'machineshistory'])->name('tables.machineshistory');
        //table - old order
        Route::get('/table/oldorder', [TablesController::class, 'oldorders'])->name('tables.oldorders');
        //table - tracking order
        Route::get('/table/trackingorder', [TablesController::class, 'trackingorder'])->name('tables.trackingorder');
        //table - monitor
        Route::get('/table/monitor', [TablesController::class, 'monitor'])->name('tables.monitor');
        //table - delivery
        Route::get('/table/delivery', [TablesController::class, 'delivery'])->name('tables.delivery');
        //table - order rekap ma
        Route::get('/table/rekaporderma', [TablesController::class, 'rekaporderma'])->name('tables.rekaporderma');



        //activities - quotation
        Route::get('/activities', [ActivitiesController::class, 'activities'])->name('activities');
        Route::get('/activities/quotation', [ActivitiesController::class, 'quotationindex'])->name('activities.quotation');
        Route::get('/activities/quotation/create', [ActivitiesController::class, 'createquotation'])->name('activities.createquotation');
        Route::get('/activities/usedtime/create', [ActivitiesController::class, 'createusedtime'])->name('activities.createusedtime');
        Route::get('activities/quotation/view/{quotation_no}', [ActivitiesController::class, 'viewquotation']);
        Route::post('/activities/quotation/store', [ActivitiesController::class, 'storequotation'])->name('activities.storequotation');
        Route::get('/activities/quotation/edit/{quotation_no}', [ActivitiesController::class, 'editquotation']);
        Route::post('/activities/quotation/update', [ActivitiesController::class, 'updatequotation'])->name('activities.updatequotation');
        Route::delete('/activities/quotation/{id}/destroy', [ActivitiesController::class, 'destroyquotation'])->name('activities.destroyquotation');
        Route::delete('/activities/quotationadd/delete', [ActivitiesController::class, 'deletequotationadd'])->name('activities.deletequotationadd');
        Route::get('/activities/quotation/get-customer-data/{companyName}', [ActivitiesController::class, 'getCustomerData']);
        Route::get('/activities/quotation/print/', [ActivitiesController::class, 'printquotation'])->name('activities.printquotation');

        //activities - sales order
        Route::get('/activities/salesorder', [ActivitiesController::class, 'salesorder'])->name('activities.salesorder');
        Route::get('/activities/salesorder/create', [ActivitiesController::class, 'createso'])->name('activities.createso');
        Route::post('/activities/salesorder/store', [ActivitiesController::class, 'storeso'])->name('activities.storeso');
        Route::get('/activities/salesorder/edit/{so_number}', [ActivitiesController::class, 'editsalesorder']);
        Route::post('/activities/salesorder/update', [ActivitiesController::class, 'updatesalesorder'])->name('activities.updatesalesorder');
        Route::delete('/activities/salesorder/{id}/destroy', [ActivitiesController::class, 'destroyso'])->name('activities.destroyso');
        Route::delete('/activities/soadd/delete', [ActivitiesController::class, 'deletesoadd'])->name('activities.deletesoadd');
        Route::get('activities/salesorder/view/{so_number}', [ActivitiesController::class, 'viewsalesorder']);
        Route::get('activities/salesorder/get-quotation-data/{quotationNo}', [ActivitiesController::class, 'getQuotationData']);

        //activities - order
        Route::get('/activities/order', [ActivitiesController::class, 'order'])->name('activities.order');
        Route::get('/activities/order/create', [ActivitiesController::class, 'createorder'])->name('activities.createorder');
        Route::post('/activities/order/store', [ActivitiesController::class, 'storeorder'])->name('activities.storeorder');
        Route::get('/activities/order/edit/{id}', [ActivitiesController::class, 'editorder'])->name('activities.editorder');
        Route::put('/activities/order/update/{id}', [ActivitiesController::class, 'updateorder'])->name('activities.updateorder');
        Route::delete('/activities/order/delete/{id}', [ActivitiesController::class, 'deleteorder'])->name('activities.deleteorder');

        //activities - items
        Route::get('/activities/item', [ActivitiesController::class, 'item'])->name('activities.item');
        Route::get('/activities/item/create', [ActivitiesController::class, 'createitem'])->name('activities.createitem');
        Route::post('/activities/item/store', [ActivitiesController::class, 'storeitem'])->name('activities.storeitem');
        Route::get('/activities/item/edit/{order_number}', [ActivitiesController::class, 'edititem']);
        Route::post('/activities/item/update', [ActivitiesController::class, 'updateitem'])->name('activities.updateitem');
        Route::delete('/activities/item/{id}/destroy', [ActivitiesController::class, 'destroyitem'])->name('activities.destroyitem');
        Route::post('/activities/soadd/delete', [ActivitiesController::class, 'deleteitem'])->name('activities.deleteitem');
        Route::get('activities/item/view/{order_number}', [ActivitiesController::class, 'viewitem']);
        Route::get('activities/item/get-Order-data/{OrderNo}', [ActivitiesController::class, 'getOrderData']);

        //activities - customer
        Route::get('/activities/customer', [ActivitiesController::class, 'customer'])->name('activities.customer');
        Route::get('/activities/customer/add', [ActivitiesController::class, 'createcustomer'])->name('activities.createcustomer');
        Route::get('/activities/customer/edit/{id}', [ActivitiesController::class, 'editcustomer'])->name('activities.editcustomer');
        Route::put('/activities/customer/update/{id}', [ActivitiesController::class, 'updatecustomer'])->name('activities.updatecustomer');
        Route::post('/activities/customer/store', [ActivitiesController::class, 'storecustomer'])->name('activities.storecustomer');
        Route::delete('/activities/customer/delete/{id}', [ActivitiesController::class, 'deletecustomer'])->name('activities.deletecustomer');

        Route::get('/items-by-order/{orderNumber}', [ActivitiesController::class,'getItemsByOrderNumber']);
        Route::get('/items-by-orders/{orderNumber}', [ReportController::class,'getItemsByOrderNumber']);
        Route::get('/items-by-orders/{orderNumber}', [ReportController::class, 'getItemsByOrder']);


        //activities - processing
        Route::get('/activities/processing', [ActivitiesController::class, 'processing'])->name('activities.processing');
        Route::get('/activities/processing/create', [ActivitiesController::class, 'createprocessing'])->name('activities.createprocessing');
        Route::post('/activities/processing/store', [ActivitiesController::class, 'storeprocessing'])->name('activities.storeprocessing');
        Route::get('/activities/processing/edit/{id}', [ActivitiesController::class, 'editprocessing'])->name('activities.editprocessing');
        Route::post('/activities/processing/update/{id}', [ActivitiesController::class, 'updateprocessing'])->name('activities.updateprocessing');
        Route::delete('/activities/processing/{id}', [ActivitiesController::class, 'deleteprocessing'])->name('activities.deleteprocessing');
        // Route::post('/activities/soadd/delete', [ActivitiesController::class, 'deleteprocessing'])->name('activities.deleteprocessing');
        Route::get('activities/processing/view/{order_number}', [ActivitiesController::class, 'viewprocessing']);
        Route::get('activities/processing/get-Order-data/{OrderNo}', [ActivitiesController::class, 'getOrderData']);
        Route::get('activities/processing/get-itemadd-by-orderno', [ActivitiesController::class, 'getItemAddByOrderNo'])->name('get.itemadd.byorderno');
        Route::get('/machine-cost/{machineName}', [ActivitiesController::class, 'getMachineCost']);
        Route::get('/machine-operation/{machineName}', [ActivitiesController::class, 'getMachineOperation']);
        Route::get('/machine-details', [ActivitiesController::class, 'getMachineDetails'])->name('machine.details');


        Route::get('/activities/standart_part', [ActivitiesController::class, 'standart_part'])->name('activities.standart_part');
        Route::get('/activities/overhead_manufacture', [ActivitiesController::class, 'overhead_manufacture'])->name('activities.overhead_manufacture');

        //activities - material
        Route::get('/activities/material', [ActivitiesController::class, 'material'])->name('activities.material');
        Route::get('/activities/material/create_material', [ActivitiesController::class, 'creatematerial'])->name('activities.creatematerial');
        Route::post('/activities/material/store', [ActivitiesController::class, 'storematerial'])->name('activities.storematerial');
        Route::get('/activities/material/edit/{id}', [ActivitiesController::class, 'editmaterial'])->name('activities.editmaterial');
        Route::put('/activities/material/update/{id}', [ActivitiesController::class, 'updatematerial'])->name('activities.updatematerial');
        Route::delete('/activities/material/delete/{id}', [ActivitiesController::class, 'deletematerial'])->name('activities.deletematerial');

        Route::get('/activities/labor_cost', [ActivitiesController::class, 'labor_cost'])->name('activities.labor_cost');
        Route::get('/activities/depreciation_cost', [ActivitiesController::class, 'depreciation_cost'])->name('activities.depreciation_cost');
        Route::get('/activities/used_time', [ActivitiesController::class, 'used_time'])->name('activities.used_time');
        Route::get('/activities/used_time_barcode', [ActivitiesController::class, 'used_time_barcode'])->name('activities.used_time_barcode');
        Route::get('/activities/order_approval_ppic', [ActivitiesController::class, 'updateapproval_ppic'])->name('activities.order_approval_ppic');
        Route::get('/activities/order_approval_log', [ActivitiesController::class, 'order_approval_log'])->name('activities.order_approval_log');
        Route::get('/activities/calculation', [ActivitiesController::class, 'calculation'])->name('activities.calculation');
        Route::get('/activities/delivery_orders_wh', [ActivitiesController::class, 'delivery_orders_wh'])->name('activities.delivery_orders_wh');
        Route::get('/activities/maintenance_standart', [ActivitiesController::class, 'maintenance_standart'])->name('activities.maintenance_standart');

        //CopyOrder
        Route::get('/activities/copy_order', [ActivitiesController::class, 'copyOrder'])->name('activities.copy_order');
        Route::post('/store-copied-order', [ActivitiesController::class, 'storeCopiedOrder'])->name('activities.storecopyorder');

        Route::get('/activities/data_maintenance', [ActivitiesController::class, 'data_maintenance'])->name('activities.data_maintenance');
        Route::get('/activities/update_group_unit', [ActivitiesController::class, 'update_group_unit'])->name('activities.update_group_unit');
        Route::get('/activities/delivery_process', [ActivitiesController::class, 'delivery_process'])->name('activities.delivery_process');
        Route::get('/activities/real_hpp', [ActivitiesController::class, 'real_hpp'])->name('activities.real_hpp');
        Route::get('/activities/finish_order', [ActivitiesController::class, 'finish_order'])->name('activities.finish_order');


        //activities - standartpart
        Route::get('/activities', [ActivitiesController::class, 'activities'])->name('activities');
        Route::get('/activities/standart_part', [ActivitiesController::class, 'standartpartindex'])->name('activities.standartpart');
        Route::get('/standartpart/{no_barcode}', [ActivitiesController::class, 'getPartDetails']);
        Route::get('/activities/standart_part/create', [ActivitiesController::class, 'createstandartpart'])->name('activities.createstandartpart');
        Route::get('/activities/usedtime/create', [ActivitiesController::class, 'createusedtime'])->name('activities.createusedtime');
        Route::get('activities/standart_part/view/{order_number}', [ActivitiesController::class, 'viewstandartpart']);
        Route::post('/activities/standart_part/store', [ActivitiesController::class, 'storestandartpart'])->name('activities.storestandartpart');
        Route::get('/activities/standartpart/edit/{id}', [ActivitiesController::class, 'editstandartpart'])->name('activities.editstandartpart');
        Route::post('/activities/standartpart/update/{id}', [ActivitiesController::class, 'updatestandartpart'])->name('activities.updatestandartpart');
        Route::delete('/activities/standartpart/delete/{id}', [ActivitiesController::class, 'deletestandartpart'])->name('activities.deletestandartpart');
        Route::delete('/activities/standartpartadd/delete', [ActivitiesController::class, 'deletestandartpartadd'])->name('activities.deletestandartpartadd');
        Route::get('/activities/standart_part/get-customer-data/{companyName}', [ActivitiesController::class, 'getCustomerData']);
        Route::get('/activities/standart_part/print/', [ActivitiesController::class, 'printstandartpart'])->name('activities.printstandartpart');

                //activities - sub_contract
                Route::get('/activities', [ActivitiesController::class, 'activities'])->name('activities');
                Route::get('/activities/sub_contract', [ActivitiesController::class, 'sub_contract'])->name('activities.sub_contract');
                Route::get('/activities/sub_contract/create', [ActivitiesController::class, 'createsub_contract'])->name('activities.createsub_contract');
                Route::get('/activities/usedtime/create', [ActivitiesController::class, 'createusedtime'])->name('activities.createusedtime');
                Route::get('activities/sub_contract/view/{order_number}', [ActivitiesController::class, 'viewsub_contract']);
                Route::post('/activities/sub_contract/store', [ActivitiesController::class, 'storesub_contract'])->name('activities.storesub_contract');
                Route::get('/activities/sub_contract/edit/{id}', [ActivitiesController::class, 'editsub_contract'])->name('activities.editsub_contract');
                Route::post('/activities/sub_contract/update/{id}', [ActivitiesController::class, 'updatesub_contract'])->name('activities.updatesub_contract');
                Route::delete('/activities/sub_contract/delete/{id}', [ActivitiesController::class, 'deletesub_contract'])->name('activities.deletesub_contract');
                Route::delete('/activities/sub_contractadd/delete', [ActivitiesController::class, 'deletesub_contractadd'])->name('activities.deletesub_contractadd');
                Route::get('/activities/sub_contract/get-customer-data/{companyName}', [ActivitiesController::class, 'getCustomerData']);
                Route::get('/activities/sub_contract/print/', [ActivitiesController::class, 'printsub_contract'])->name('activities.printsub_contract');

                //activities - Overhead Manufacture
                Route::get('/activities', [ActivitiesController::class, 'activities'])->name('activities');
                Route::get('/activities/overhead_manufacture', [ActivitiesController::class, 'overhead_manufacture'])->name('activities.overhead_manufacture');
                Route::get('/activities/overhead_manufacture/create', [ActivitiesController::class, 'createoverhead_manufacture'])->name('activities.createoverhead_manufacture');
                Route::get('/activities/usedtime/create', [ActivitiesController::class, 'createusedtime'])->name('activities.createusedtime');
                Route::get('activities/overhead_manufacture/view/{order_number}', [ActivitiesController::class, 'viewoverhead_manufacture']);
                Route::post('/activities/overhead_manufacture/store', [ActivitiesController::class, 'storeoverhead_manufacture'])->name('activities.storeoverhead_manufacture');
                Route::get('/activities/overhead_manufacture/edit/{id}', [ActivitiesController::class, 'editoverhead_manufacture'])->name('activities.editoverhead_manufacture');
                Route::post('/activities/overhead_manufacture/update/{id}', [ActivitiesController::class, 'updateoverhead_manufacture'])->name('activities.updateoverhead_manufacture');
                Route::delete('/activities/overhead_manufacture/delete/{id}', [ActivitiesController::class, 'deleteoverhead_manufacture'])->name('activities.deleteoverhead_manufacture');
                Route::get('/activities/overhead_manufacture/get-customer-data/{companyName}', [ActivitiesController::class, 'getCustomerData']);
                Route::get('/activities/overhead_manufacture/print/', [ActivitiesController::class, 'printoverhead_manufacture'])->name('activities.printoverhead_manufacture');

                //activities - Used Time
                Route::get('/activities', [ActivitiesController::class, 'activities'])->name('activities');
                Route::get('/activities/used_time', [ActivitiesController::class, 'used_time'])->name('activities.used_time');
                Route::get('/activities/used_time/create', [ActivitiesController::class, 'createused_time'])->name('activities.createused_time');
                Route::post('/activities/used_time/update_status/{id}', [ActivitiesController::class, 'updateStatus'])->name('activities.update_status');

                //activities - Used Time Barcode
                Route::get('/activities', [ActivitiesController::class, 'activities'])->name('activities');
                Route::get('/activities/used_time_barcode', [ActivitiesController::class, 'used_time_barcode'])->name('activities.used_time_barcode');
                Route::get('/activities/used_time_barcode/create', [ActivitiesController::class, 'createused_time_barcode'])->name('activities.createused_time_barcode');
                Route::get('/activities/usedtime/create', [ActivitiesController::class, 'createusedtime'])->name('activities.createusedtime');
                Route::get('activities/used_time_barcode/view/{order_number}', [ActivitiesController::class, 'viewused_time_barcode']);
                Route::post('/activities/used_time_barcode/store', [ActivitiesController::class, 'storeused_time_barcode'])->name('activities.storeused_time_barcode');
                Route::get('/activities/used_time_barcode/edit/{order_number}', [ActivitiesController::class, 'editused_time_barcode']);
                Route::post('/activities/used_time_barcode/update', [ActivitiesController::class, 'updateused_time_barcode'])->name('activities.updateused_time_barcode');
                Route::delete('/activities/used_time_barcode/{id}/destroy', [ActivitiesController::class, 'destroyused_time_barcode'])->name('activities.destroyused_time_barcode');
                Route::delete('/activities/used_time_barcodeadd/delete', [ActivitiesController::class, 'deleteused_time_barcodeadd'])->name('activities.deleteused_time_barcodeadd');
                Route::get('/activities/used_time_barcode/get-customer-data/{companyName}', [ActivitiesController::class, 'getCustomerData']);
                Route::get('/activities/used_time_barcode/print/', [ActivitiesController::class, 'printused_time_barcode'])->name('activities.printused_time_barcode');

        //activities - Close Order
        Route::get('/activities/closeorder', [ActivitiesController::class, 'closeorder'])->name('activities.closeorder');
        Route::put('/activities/update-status-closed/{id}', [ActivitiesController::class, 'updateStatusClosed'])->name('activities.updateStatusClosed');
        Route::post('/update-status', [ActivitiesController::class, 'updateStatusOrder'])->name('update-status');



        //report
        Route::get('/report', [ReportController::class, 'report'])->name('report');
        //report-order
        Route::get('/report/order', [ReportController::class, 'order'])->name('report.order');
        //report-controlsheet
        Route::get('/report/controlsheet', [ReportController::class, 'controlsheet'])->name('report.controlsheet');
        Route::get('/controlsheet', [ReportController::class, 'controlsheet'])->name('controlsheet');

        //report-productionsheet
        Route::get('/report/productionsheet', [ReportController::class, 'productionsheet'])->name('report.productionsheet');
        //report-inspectionsheet
        Route::get('/report/inspectionsheet', [ReportController::class, 'inspectionsheet'])->name('report.inspectionsheet');
        //report-materialsheet
        Route::get('/report/materialsheet', [ReportController::class, 'materialsheet'])->name('report.materialsheet');
        //report-standartpartsheet
        Route::get('/report/standartpartsheet', [ReportController::class, 'standartpartsheet'])->name('report.standartpartsheet');
        //report- subcont
        Route::get('/report/subcont', [ReportController::class, 'subcont'])->name('report.subcont');
        //report-overheadmanufacure
        Route::get('/report/overheadmanufacture', [ReportController::class, 'overheadmanufacture'])->name('report.overheadmanufacture');
        //report-monitoranalisaorder
        Route::get('/report/monitoranalisaorder', [ReportController::class, 'monitoranalisaorder'])->name('report.monitoranalisaorder');
        //report-statistic
        Route::get('/report/statistic', [ReportController::class, 'statistic'])->name('report.statistic');
        //report-reportordergraph
        Route::get('/report/reportordergraph', [ReportController::class, 'reportordergraph'])->name('report.reportordergraph');
        //report-capacity
        Route::get('/report/capacity', [ReportController::class, 'capacity'])->name('report.capacity');
        //report-wip
        Route::get('/report/wip', [ReportController::class, 'wip'])->name('report.wip');
        //report - wip process
        Route::get('/report/wip/process', [ReportController::class, 'wip_process'])->name('report.wip_process');
        //report - wip material
        Route::get('/report/wip/material', [ReportController::class, 'wip_material'])->name('report.wip_material');
        //report-outstanding
        Route::get('/report/outstanding', [ReportController::class, 'outstanding'])->name('report.outstanding');
        //report-outstanding process
        Route::get('/report/outstanding/process', [ReportController::class, 'outstanding'])->name('report.outstanding2');
        //report-finishgood
        Route::get('/report/finishgood', [ReportController::class, 'finishgood'])->name('report.finishgood');
        //report-delivered
        Route::get('/report/delivered', [ReportController::class, 'delivered'])->name('report.delivered');
        //report-hpp
        Route::get('/report/hpp', [ReportController::class, 'hpp'])->name('report.hpp');
        //report-hpp mdc
        Route::get('/report/hppmdc', [ReportController::class, 'hppmdc'])->name('report.hppmdc');
        //report-hpp wf
        Route::get('/report/hppwf', [ReportController::class, 'hppwf'])->name('report.hppwf');
        //report-perhitunganwip
        Route::get('/report/perhitunganwip', [ReportController::class, 'perhitunganwip'])->name('report.perhitunganwip');
        //report-salesorder
        Route::get('/report/salesorder', [ReportController::class, 'salesorder'])->name('report.salesorder');

        //fetch input
        Route::get('/getOrderData', [ActivitiesController::class, 'getOrderData'])->name('getOrderData');
        Route::get('/getItemData', [ActivitiesController::class, 'getItemData'])->name('getItemData');

        Route::get('/activities/calculations', [ActivitiesController::class, 'showForm'])->name('calculations.form');
        Route::post('/activities/calculations/calculate', [ActivitiesController::class, 'calculate'])->name('calculations.calculate');

        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/create', [TaskController::class, 'create']);
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::post('/tasks/{task}/mark-as-pending', [TaskController::class, 'markAsPending'])->name('tasks.markAsPending');
        Route::post('/tasks/{task}/mark-as-finished', [TaskController::class, 'markAsFinished'])->name('tasks.markAsFinished');
        Route::post('/tasks/{task}/mark-as-not-started', [TaskController::class, 'markAsNotStarted'])->name('tasks.markAsNotStarted');
        Route::post('/tasks/{task}/refresh-from-pending', [TaskController::class, 'refreshFromPending'])->name('tasks.refreshFromPending');
        Route::get('/taskdataAPI', [TaskController::class, 'getData']);});
});
