<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Order_detail;
use Illuminate\Support\Collection;
use DateTime;
use DB;
class PosController extends Controller
{
    //
    public function getPos()
    {
        $data['listProduct'] = Product::all();
		return view('possales.sales', $data);
    }
    public function Search(Request $request)
    {
    	$keyword =  $request->q;
    	$data = Product::where('prod_name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('prod_code', 'LIKE', '%' . $keyword . '%')
                        ->get();
    	$results = array();
    	foreach ($data as $value) {
    		$results[] = [
    			'id' => $value->prod_id,
                'code' => $value->prod_code,
    			'name' => $value->prod_name,
                'img' => $value->prod_img,
                'price' => number_format($value->prod_sell_price, 0, '.', ','),
                'quantity' => $value->prod_quantity
    		];
    	}
    	return response()->json($results);
    }
    public function getSelectProduct(Request $request)
    {
        $idProduct = $request->id;
        $seq = $request->seq;
        $data = Product::find($idProduct);
        $output = '<tr data-id="'.$data->prod_id.'">
                <td class="text-center seq">'.$seq.'</td>
                <td class="text-center">'.$data->prod_code.'</td>
                <td>'.$data->prod_name.'</td>
                <td class="text-center" style="max-width: 30px;">
                    <div class="ui input">
                      <input type="text" type="text" class="txtNumber form-control quantity_product_order text-center number" value="1" style="max-height: 30px;" >
                    </div>
                </td>
                <td class="text-center price-order">
                    <div class="ui input">
                      <input type="text" type="text" class="txtNumber form-control price_product_order text-right number" value="'.number_format($data->prod_sell_price, 0, '.', ',').'" style="max-height: 30px;" >
                      <input type="hidden" value="'.number_format($data->prod_origin_price, 0, '.', ',').'" id="prod_origin_price">
                    </div>
                </td>
                <td style="display: none;" class="text-center price-order-hide"><input type="hidden" value="'.number_format($data->prod_origin_price, 0, '.', ',').'" id="total_origin_price"></td>
                <td class="total-money text-right">'.number_format($data->prod_sell_price, 0, '.', ',').'
                </td>
                <td class="text-center del-pro-order"><i class="fa fa-trash del-pro-order"></i></td>
            </tr>';
        echo $output;
    }

    /* AJAX ADD Khách hàng */
    public function postAddCustomersAjax(Request $request)
    {
        $code = $request->code;
        if($code==""){
            $code = PosController::customerCode();
        }
        $customers = new Customers;
        $customers->customer_name = $request->input('name');
        $customers->customer_code = $code;
        $customers->customer_birthday = date( 'Y/m/d', strtotime($request->input('date')));
        $customers->customer_phone = $request->input('phone');
        $customers->customer_email = $request->input('email');
        $customers->customer_gender = $request->input('gender');
        $customers->customer_addr = $request->input('address');
        $customers->customer_nodes = $request->input('note');
        $customers->created_at = new DateTime();
        $customers->updated_at = null;
        if($customers->save()== 1){
            return $customers->customer_id;
        }
    }

    /* Hàm tự động tăng mã khách hàng */
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

    public function SearchCustomer(Request $request)
    {
        $keyword =  $request->key;
        $keyword = str_replace(' ', '%', $keyword);
        $data = Customers::where('customer_name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('customer_phone', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('customer_email', 'LIKE', '%' . $keyword . '%')
                        ->get();
        if($data->isEmpty() != true){
            echo '<ul class="list-unstyled">';
            foreach ($data as $value) {
                echo '
                <li style="cursor: pointer;" onclick="pos_selected_cys('.$value->customer_id.','.$value->customer_phone.')">
                    <ul class="list-unstyled">
                        <li style="padding: 3px 10px;" class="data-cys-name-'.$value->customer_id.'"><i class="fa fa-user" style="color: #0B87C9;" aria-hidden="true"></i> '.$value->customer_name.' </li>
                        <li style="padding: 3px 10px;"><i class="fa fa-barcode" style="color: #0B87C9;"></i> '.$value->customer_code.' </li>
                        <li style="padding: 3px 10px;"><i class="fa fa-phone" style="color: #0B87C9;" aria-hidden="true"></i> '.$value->customer_phone.' </li>
                    </ul>
                </li>
                <hr style="color: #0B87C9; margin: 10px 0;"/>';

            }
            echo '</ul>';
        }
    }

    public function addOrder(Request $request)
    {
        $customer_id = $request->customer_id;
        $userInid = $request->userInid;
        $store_ID = $request->store_ID;
        $none = $request->notes;
        $payMethod = $request->payMethod;
        $toTalPrice = $request->toTalPrice;
        $total_qty = $request->total_qty;
        $customer_pay= $request->customer_pay;
        $orderCode = PosController::orderCode();
        $total_origin_money = $request->total_origin_money;
        $ord_coupon = $request->disCount;

        /* Tổng tiền sau khi đã trừ khuyễn mãi */
        
        $ord_total_money = $request->ord_total_money;

        /* Số tiền khách hàng thanh toán */
        $customer_pay = $request->customer_pay;

        if( $customer_pay < $ord_total_money){
            $lake = $ord_total_money - $customer_pay;
        }else {
            $lake = 0;
        }
        
        /* add Database */
        $order = new Orders;
        $order->ord_code = $orderCode;
        $order->ord_user_init = $userInid;
        $order->ord_customer_id = $customer_id;
        $order->ord_store_id = $store_ID;
        $order->ord_nodes = $none;
        $order->ord_payment_method = $payMethod;
        /* Giá bán */
        $order->ord_total_price = $toTalPrice;
        /* Giá gỗc */
        $order->ord_total_origin_price = $total_origin_money;
        $order->ord_coupon = $ord_coupon;
        $order->ord_total_money = $ord_total_money;
        $order->ord_customer_pay = $customer_pay;
        $order->ord_lake = $lake;
        $order->ord_total_quantity = $total_qty;
        $order->ord_status = 1;
        $order->ord_source = 1;
        $order->ord_created = new DateTime();
        $order->save();
        echo $order->ord_id;
    }


    /* Hàm tạo mã hóa đơn tự động */
    public function orderCode()
    {
        $order_code = '';
        $max_order_code = Orders::where('ord_code', 'like', '%HD-%')->orderBy('ord_id','desc')->first();
        if( $max_order_code != null){
            $max_code = (int)(str_replace('HD-', '', $max_order_code->ord_code)) + 1;
            if ($max_code < 10)
                return 'HD-0000' . ($max_code);
            else if ($max_code < 100)
                return 'HD-000' . ($max_code);
            else if ($max_code < 1000)
                return 'HD-00' . ($max_code);
            else if ($max_code < 10000)
                return  'HD-0' . ($max_code);
            else if ($max_code < 100000)
               return 'HD-' . ($max_code);
        }else {
            return 'HD-00001';
        }
    }


    /* Hàm lưu chi tiết hóa đơn */
    public function saveOderDetail(Request $request)
    {
        $ord_id = $request->ord_id;
        $prod_id = $request->prod_id;
        $value_qty = $request->value_qty;
        $value_price = $request->value_price;
        $total = $request->total;
        
        $detail = new Order_detail;
        $detail->orde_ord_id = $ord_id;
        $detail->orde_pro_id = $prod_id;
        $detail->orde_quantity = $value_qty;
        $detail->orde_price = $value_price;
        $detail->order_total = $total;
        $detail->save();
        $this->updateQuantityProduct($prod_id, $value_qty);
    }

    public function printOrder($id)
    {
        $data['listProduct'] = DB::table('vp_order_detail')
                ->join('vp_products', 'vp_products.prod_id','=','vp_order_detail.orde_pro_id')
                ->where('orde_ord_id', '=',  $id)
                ->get();

        $data['infoOrder'] = DB::table('vp_orders')
                ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
                ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init')
                ->where('ord_id', '=', $id)
                ->get();
        if($data['infoOrder']->isEmpty()){
            echo 'Không tồn tại hóa đơn này. Xin kiểm tra lại';
            $text = '<a href="/possales/admin/sales"> Quay Lại </a>';
            echo html_entity_decode($text);
        }else {
            return view('template.ajax.billTemplate', $data)->render();
        }
    }
    public function updateQuantityProduct($id, $qt)
    {
        $product = Product::find($id);
        $qty = $product->prod_quantity;
        $product->prod_quantity = $qty - $qt;
        $product->save();
    }
}