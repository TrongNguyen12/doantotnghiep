<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Input_bill;
use App\Models\Input_bill_detail;
use DateTime;
use DB;
use App\Models\Product;
class ImportPosController extends Controller
{
    //
    public function getImport()
    {
    	return view('pages.posimport.posimport');
    }
    public function postAddSupplier(Request $request)
    {
    	if( $request->codeSupp == '' ){
            $supplier_code = $this->supplierCode();
        }else {
            $supplier_code = $request->codeSupp;
        }
    	$supplier = new Supplier;
    	$supplier->supplier_name = $request->nameSupp;
    	$supplier->supplier_code = $supplier_code;
    	$supplier->supplier_phone = $request->phoneSupp;
    	$supplier->supplier_email = $request->emailSupp;
    	$supplier->supplier_addr = $request->addSupp;
    	$supplier->supplier_notes = $request->note;
    	$supplier->created_at = new DateTime();
        $supplier->updated_at = null;
        $supplier->save();
        echo $supplier->supplier_id;
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
    public function searchSupplier(Request $request)
    {
        $keyword =  $request->key;
        $keyword = str_replace(' ', '%', $keyword);
        $data = Supplier::where('supplier_name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('supplier_phone', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('supplier_email', 'LIKE', '%' . $keyword . '%')
                        ->get();
        if($data->isEmpty() != true){
            echo '<ul class="list-unstyled">';
            foreach ($data as $value) {
                echo '
                <li style="cursor: pointer;" onclick="pos_selected_supplier('.$value->supplier_id.','.$value->customer_phone.')">
                    <ul class="list-unstyled">
                        <li style="padding: 3px 10px;" class="data-cys-name-'.$value->supplier_id.'"><i class="fa fa-user" style="color: #0B87C9;" aria-hidden="true"></i> '.$value->supplier_name.' </li>
                        <li style="padding: 3px 10px;"><i class="fa fa-barcode" style="color: #0B87C9;"></i> '.$value->supplier_code.' </li>
                        <li style="padding: 3px 10px;"><i class="fa fa-phone" style="color: #0B87C9;" aria-hidden="true"></i> '.$value->supplier_phone.' </li>
                    </ul>
                </li>
                <hr style="color: #0B87C9; margin: 10px 0;"/>';

            }
            echo '</ul>';
        }
    }
    public function addInputBill(Request $request)
    {
        if($request->dateInput !=""){
            $dateCreate = date( 'Y/m/d', strtotime($request->dateInput));
            $dateCreate = $dateCreate." ".date('H:i:s');
        }else {
            $dateCreate = new DateTime();
        }
        $code =  $this->codeInputBill();
        $bill = new Input_bill;
        $bill->ipB_code =  $code;
        $bill->ipB_user_init = $request->userInid;
        $bill->ipB_supplier_id = $request->supplier_id;
        $bill->ipB_nodes = $request->node;
        $bill->ipB_payment_method = $request->paymethod;
        $bill->ipB_coupon = $request->coupon;
        $bill->ipB_total_money = $request->total;
        $bill->ipB_shop_pay = $request->shoppay;
        $bill->ipB_lake = $request->lake;
        $bill->ipB_total_quantity = $request->total_quantity;
        $bill->ipB_status = 1;
        $bill->ipB_created = $dateCreate;
        $bill->save();
        echo $bill->ipB_id;
    }
    public function addInputBillDetail(Request $request)
    {
        $billDetail = new Input_bill_detail;
        $billDetail->ipBD_ipB_id = $request->ipB_id;
        $billDetail->ipBD_pro_id = $request->prod_id;
        $billDetail->ipBD_quantity = $request->value_qty;
        $billDetail->ipBD_price = $request->value_price;
        $billDetail->ipBD_total = $request->total;
        $billDetail->save();
        $this->updateQuantityProduct($request->prod_id , $request->value_qty);
        
    }
    public function updateQuantityProduct($id, $qt)
    {
        $product = Product::find($id);
        $qty = $product->prod_quantity;
        $product->prod_quantity = $qty + $qt;
        $product->save();
    }
    public function codeInputBill()
    {
        $max_inputBill_code = Input_bill::where('ipB_code', 'like', '%PNH%')->orderBy('ipB_id','desc')->first();
        if( $max_inputBill_code != null){
            $max_code = (int)(str_replace('PNH', '', $max_inputBill_code->ipB_code)) + 1;
            if ($max_code < 10)
                return 'PNH0000' . ($max_code);
            else if ($max_code < 100)
                return 'PNH000' . ($max_code);
            else if ($max_code < 1000)
                return 'PNH00' . ($max_code);
            else if ($max_code < 10000)
                return  'PNH0' . ($max_code);
            else if ($max_code < 100000)
               return 'PNH' . ($max_code);
        }else {
            return 'PNH00001';
        }
    }
    public function printInputBill($id)
    {
        $data['listProduct'] = DB::table('vp_inputbill_detail')
                ->join('vp_products', 'vp_products.prod_id','=','vp_inputbill_detail.ipBD_pro_id')
                ->where('ipBD_ipB_id', '=',  $id)
                ->get();
        $data['infoOrder'] = DB::table('vp_inputbill')
                ->join('vp_supplier', 'vp_supplier.supplier_id', '=', 'vp_inputbill.ipB_supplier_id')
                ->join('vp_users', 'vp_users.id', '=', 'vp_inputbill.ipB_user_init')
                ->where('ipB_id', '=', $id)
                ->first();
        if(empty($data['infoOrder'])){
            echo 'Không tồn tại hóa đơn này. Xin kiểm tra lại';
            $text = '<a href="/possales/admin/"> Quay Lại </a>';
            echo html_entity_decode($text);
        }else {
            return view('template.ajax.billInputTempalate', $data)->render();
        }
    }
    public function getViewInputBill()
    {
        return view('pages.posimport.viewImport');
    }
}
