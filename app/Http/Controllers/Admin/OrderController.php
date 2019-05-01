<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Product;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Order_detail;
use Illuminate\Support\Collection;
use DateTime;

class OrderController extends Controller
{
    //
    public function getOrder(Request $request)
    {
        $data['infoOrder'] = DB::table('vp_orders')
            ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
            ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init')
            ->orderBy('ord_id', 'desc')
            ->paginate(7);
        $data['customers'] = Customers::all();
        return view('pages.order.order', $data);
    }
    public function getQuickViewOrder($id)
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


        /* Thông tin khách hàng theo hóa đơn */
        
        $customer_id = $data['infoOrder'][0]->customer_id;
        $qtorder = DB::table('vp_orders')
                ->where('ord_customer_id', '=',  $customer_id)
                ->count();
        $lake = DB::table('vp_orders')
                ->where('ord_customer_id', '=',  $customer_id)
                ->sum('ord_lake');
        $total_money_pay = DB::table('vp_orders')
                ->where('ord_customer_id', '=',  $customer_id)
                ->sum('ord_customer_pay');
        $data['infoCustomerOrder'] = array(
            'qtorder' => $qtorder,
            'lake' =>$lake,
            'total_money_pay' =>$total_money_pay
        );
    	return view('template.ajax.quickview', $data)->render();
    }
    public function findOrderAjax(Request $request)
    {
        if($request->has('mahd')){
            $mahd =  $request->mahd;
            $data['infoOrder'] = DB::table('vp_orders')
                ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
                ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init')
                ->where('ord_code', 'like', '%'.$mahd.'%')
                ->orderBy('ord_id', 'desc')
                ->paginate(7)->withPath( url('/').'/admin/order');
            return view('template.ajax.list_order', $data)->render();
        }if($request->has('advanced')){
            $listOrder = DB::table('vp_orders')
                ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
                ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init');
            if($request->status == 0){
                /* Tất cả các hóa đơn * $data['infoOrder']*/
                if( $request->has('fromDate') && $request->has('toDate') ){
                    $from = date( 'Y/m/d' . ' 00:00:00', strtotime( $request->fromDate));
                    $to = date( 'Y/m/d' . ' 23:59:59', strtotime( $request->toDate));
                    $listOrder = $listOrder->whereBetween('ord_created', [$from , $to]);
                    if ( $request->has('khachHang')){
                        $listOrder = $listOrder->where('ord_customer_id', '=', $request->khachHang);
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }else{
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }
                }else {
                    if ( $request->has('khachHang')){
                        $listOrder = $listOrder->where('ord_customer_id', '=', $request->khachHang);
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }else{
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }
                }
            }elseif ( $request->status == 1 ) {
                if( $request->has('fromDate') && $request->has('toDate') ){
                    $from = date( 'Y/m/d' . ' 00:00:00', strtotime( $request->fromDate));
                    $to = date( 'Y/m/d' . ' 23:59:59', strtotime( $request->toDate));
                    $listOrder = $listOrder->whereBetween('ord_created', [$from , $to]);
                    if ( $request->has('khachHang')){
                        $listOrder = $listOrder->where('ord_customer_id', '=', $request->khachHang);
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }else{
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }
                }else {
                    if ( $request->has('khachHang')){
                        $listOrder = $listOrder->where('ord_customer_id', '=', $request->khachHang);
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }else{
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }
                }
                $listOrder = $listOrder->where('ord_deleted', '!=', null);
            }else {
                if( $request->has('fromDate') && $request->has('toDate') ){
                    $from = date( 'Y/m/d' . ' 00:00:00', strtotime( $request->fromDate));
                    $to = date( 'Y/m/d' . ' 23:59:59', strtotime( $request->toDate));
                    $listOrder = $listOrder->whereBetween('ord_created', [$from , $to]);
                    if ( $request->has('khachHang')){
                        $listOrder = $listOrder->where('ord_customer_id', '=', $request->khachHang);
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }else{
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }
                }else {
                    if ( $request->has('khachHang')){
                        $listOrder = $listOrder->where('ord_customer_id', '=', $request->khachHang);
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }else{
                        if( $request->has('nhanvien') ){
                            $listOrder = $listOrder->where('ord_user_init', '=', $request->nhanvien);
                        }
                    }
                }
                $listOrder = $listOrder->where('ord_lake', '!=', 0);
            }
            $data['infoOrder'] = $listOrder->orderBy('ord_id', 'desc')->paginate(7);
            return view('template.ajax.list_order', $data)->render();
        }
    }

}
/* Comment phan 2
            $data['infoOrder'] = DB::table('vp_orders')
                ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
                ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init')
                ->orderBy('ord_id', 'desc')
                ->paginate(7);
            return view('template.ajax.list_order', $data)->render();


 */



/* Comment 
if($request->fromDate!="" && $request->toDate!="" ){
    $from = strtotime( $request->fromDate);
    $to = strtotime( $request->toDate);
    if( $from > $to){
        echo 'ErrorDate';
    }else {
        $from = date( 'Y/m/d' . ' 00:00:00', strtotime( $request->fromDate));
        $to = date( 'Y/m/d' . ' 23:59:59', strtotime( $request->toDate));
        $data['infoOrder'] = DB::table('vp_orders')
                ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
                ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init')
                ->whereBetween('ord_created', [$from , $to])
                ->orderBy('ord_id', 'desc')
                ->paginate(7);
        return view('template.ajax.list_order', $data)->render();
    }
}else {
    $data['infoOrder'] = DB::table('vp_orders')
            ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
            ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init')
            ->orderBy('ord_id', 'desc')
            ->paginate(7);
    return view('template.ajax.list_order', $data)->render();
}
*/


// /* Hóa đơn đã xóa */
                // $data['infoOrder'] = DB::table('vp_orders')
                //     ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
                //     ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init')
                //     ->where('ord_deleted', '!=', null)
                //     ->orderBy('ord_id', 'desc')
                //     ->paginate(7);
                // return view('template.ajax.list_order', $data)->render();





                /* Hóa đơn còn khách nợ tiền */
                // $data['infoOrder'] = DB::table('vp_orders')
                //     ->join('vp_customers', 'vp_customers.customer_id', '=', 'vp_orders.ord_customer_id')
                //     ->join('vp_users', 'vp_users.id', '=', 'vp_orders.ord_user_init')
                //     ->where('ord_lake', '!=', 0)
                //     ->orderBy('ord_id', 'desc')
                //     ->paginate(7);
                // return view('template.ajax.list_order', $data)->render();



            //     elseif ($request->status == 1) {
                
            // }else{
                
            // }