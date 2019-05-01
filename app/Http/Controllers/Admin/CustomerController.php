<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use DateTime;
class CustomerController extends Controller
{
    public function getCustomer()
    {
    	return view('pages.customers.customers');
    }
    public function getAddCustomer()
    {
    	return view('pages.customers.addCustomers');
    }

    /* Chưa bắt lỗi  */
    public function postAddCustomer(Request $request)
    {
    	if( $request->code == '' ){
            $customers_code = CustomerController::customerCode();
        }else {
            $customers_code = $request->code;
        }
    	$customers = new Customers;
    	$customers->customer_name = $request->name;
    	$customers->customer_code = $customers_code;
    	$customers->customer_birthday = date( 'Y/m/d', strtotime($request->date));
    	$customers->customer_phone = $request->phone;
    	$customers->customer_email = $request->email;
    	$customers->customer_gender = $request->sex;
    	$customers->customer_addr = $request->add;
    	$customers->customer_nodes = $request->node;
    	$customers->created_at = new DateTime();
        $customers->updated_at = null;
        $customers->save();
    	return redirect('admin/customers')->with('Tsuccess', 'Thêm khách hàng thành công !');
    }
    public function customerCode()
    {
        $prod_code = '';
        $max_product_code = Customers::where('customer_code', 'like', '%KH%')->orderBy('customer_id','desc')->first();
        if( $max_product_code != null){
            $max_code = (int)(str_replace('KH', '', $max_product_code->customer_code)) + 1;
            if ($max_code < 10)
                return 'KH0000' . ($max_code);
            else if ($max_code < 100)
                return 'KH000' . ($max_code);
            else if ($max_code < 1000)
                return 'KH00' . ($max_code);
            else if ($max_code < 10000)
                return  'KH0' . ($max_code);
            else if ($max_code < 100000)
               return 'KH' . ($max_code);
        }else {
            return 'KH00001';
        }
    }
}
