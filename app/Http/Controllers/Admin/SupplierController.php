<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use DateTime;
class SupplierController extends Controller
{
    //
    public function getSupplier()
    {
    	return view('pages.suppliers.suppliers');
    }
    public function getAddSupplier()
    {
    	return view('pages.suppliers.addSuppliers');
    }
    public function postAddSupplier(Request $request)
    {
    	if( $request->code == '' ){
            $customers_code = $this->supplierCode();
        }else {
            $customers_code = $request->code;
        }
    	$supplier = new Supplier;
    	$supplier->supplier_name = $request->name;
    	$supplier->supplier_code = $customers_code;
    	$supplier->supplier_phone = $request->phone;
    	$supplier->supplier_email = $request->email;
    	$supplier->supplier_addr = $request->add;
    	$supplier->supplier_notes = $request->note;
    	$supplier->created_at = new DateTime();
        $supplier->updated_at = null;
        $supplier->save();
    	return redirect('admin/suppliers')->with('Tsuccess', 'Thêm nhà cung cấp thành công !');
    }
    public function supplierCode()
    {
        $prod_code = '';
        $max_supplier_code = Supplier::where('supplier_code', 'like', '%NCC%')->orderBy('supplier_id','desc')->first();
        if( $max_supplier_code != null){
            $max_code = (int)(str_replace('NCC', '', $max_supplier_code->supplier_code)) + 1;
            if ($max_code < 10)
                return 'NCC0000' . ($max_code);
            else if ($max_code < 100)
                return 'NCC000' . ($max_code);
            else if ($max_code < 1000)
                return 'NCC00' . ($max_code);
            else if ($max_code < 10000)
                return  'NCC0' . ($max_code);
            else if ($max_code < 100000)
               return 'NCC' . ($max_code);
        }else {
            return 'NCC00001';
        }
    }
}
