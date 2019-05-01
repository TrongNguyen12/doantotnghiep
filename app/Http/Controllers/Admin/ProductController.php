<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use DB;
use DateTime;
class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $data['productlist'] = DB::table('vp_products')
                ->join('vp_categories', 'vp_categories.cate_id','=','vp_products.prod_cate')
                ->orderBy('prod_id','desc')->get();
    	return view('pages.product.product', $data);
    }
    public function getAddProduct()
    {
    	$data['listcate'] = Category::all();
    	return view('pages.product.addProduct', $data);
    }
    // chưa bắt lỗi
    public function postAddProduct(Request $request)
    {
        if( $request->code == '' ){
            $prod_code = ProductController::prodCode();
        }else {
            $prod_code = $request->code;
        }
        $prod_origin_price = str_replace( ',','', $request->price);
        if($request->pricesalse != ''){
            $prod_sell_price = str_replace(',','', $request->pricesalse);
        }else {
            $prod_sell_price = 0;
        }
        if($request->status == 'active'){
            $status = 1;
        }else {
            $status = 0;
        }
        if($request->prodNew == 'active'){
            $prodNew = 1;
        }else {
            $prodNew = 0;
        }
        if($request->prodHot == 'active'){
            $prodHot = 1;
        }else {
            $prodHot = 0;
        }
        if($request->hasFile('img')){
            $filename = $request->img->getClientOriginalName();
            $filename = time().'_'.$filename;
            $request->img->move('public/uploads/imagesProduct' , $filename);
        }else {
            $filename = null;
        }
        if($request->hasFile('moreImg')){
            $moreImg = array();
            foreach ($request->moreImg as $value) {
                $name = $value->getClientOriginalName();
                $name = rand(1, 300).time().'_'.$name;
                $value->move('public/uploads/ListImagesProduct' , $name);
                $moreImg[]=$name;
            }
            $moreImg = json_encode($moreImg); // mã hóa sang dạng JSON
            // $decode = json_decode($encode, false); // Giải mã dạng Array
        }else {
            $moreImg = null;
        }
        $product = new Product;
        $product->prod_code = $prod_code;
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_origin_price = $prod_origin_price;
        if($prod_sell_price != 0){
            $product->prod_sell_price = $prod_sell_price;
        }
        $product->prod_quantity = 0;
        $product->prod_descriptions = $request->description;
        $product->prod_status = $status;
        $product->prod_cate = $request->cate;
        $product->prod_hot =  $prodHot;
        $product->prod_new =  $prodNew;
        $product->prod_img = $filename;
        $product->prod_more_img = $moreImg;
        $product->created_at = new DateTime();
        $product->updated_at = null;
        $product->save();
        return redirect('admin/product')->with('Tsuccess', 'Thêm sản phẩm thành công !');
    }
    public function prodCode()
    {
        $prod_code = '';
        $max_product_code = Product::where('prod_code', 'like', '%SP%')->orderBy('prod_id','desc')->first();
        if( $max_product_code != null){
            $max_code = (int)(str_replace('SP', '', $max_product_code->prod_code)) + 1;
            if ($max_code < 10)
                return 'SP0000' . ($max_code);
            else if ($max_code < 100)
                return 'SP000' . ($max_code);
            else if ($max_code < 1000)
                return 'SP00' . ($max_code);
            else if ($max_code < 10000)
                return  'SP0' . ($max_code);
            else if ($max_code < 100000)
               return 'SP' . ($max_code);
        }else {
            return 'SP00001';
        }
    }
    public function getEditProduct($id)
    {
        $data['listcate'] = Category::all();
        $data['product'] = Product::find($id);
        return view('pages.product.editProduct', $data);
    }
    public function getDeleteProduct($id)
    {
        Product::destroy($id);
        return back()->with('Tsuccess', 'Xóa sản phẩm thành công !');
    }
    public function postEditProduct(Request $request, $id)
    {
        if( $request->code == '' ){
            $prod_code = ProductController::prodCode();
        }else {
            $prod_code = $request->code;
        }
        $prod_origin_price = str_replace( ',','', $request->price);
        if($request->pricesalse != '' && $request->pricesalse != 0){
            $prod_sell_price = str_replace(',','', $request->pricesalse);
        }else {
            $prod_sell_price = 0;
        }
        if($request->status == 'active'){
            $status = 1;
        }else {
            $status = 0;
        }
        if($request->prodNew == 'active'){
            $prodNew = 1;
        }else {
            $prodNew = 0;
        }
        if($request->prodHot == 'active'){
            $prodHot = 1;
        }else {
            $prodHot = 0;
        }
        if($request->hasFile('img')){
            $filename = $request->img->getClientOriginalName();
            $filename = time().'_'.$filename;
            $request->img->move('public/uploads/imagesProduct' , $filename);
        }else {
            $filename = null;
        }
        if($request->hasFile('moreImg')){
            $moreImg = array();
            foreach ($request->moreImg as $value) {
                $name = $value->getClientOriginalName();
                $name = rand(1, 300).time().'_'.$name;
                $value->move('public/uploads/ListImagesProduct' , $name);
                $moreImg[]=$name;
            }
            $moreImg = json_encode($moreImg); // mã hóa sang dạng JSON
            // $decode = json_decode($encode, false); // Giải mã dạng Array
        }else {
            $moreImg = null;
        }
        $product = Product::find($id);
        $product->prod_code = $prod_code;
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_origin_price = $prod_origin_price;
        if($prod_sell_price != 0){
            $product->prod_sell_price = $prod_sell_price;
        }
        $product->prod_descriptions = $request->description;
        $product->prod_status = $status;
        $product->prod_cate = $request->cate;
        $product->prod_hot =  $prodHot;
        $product->prod_new =  $prodNew;
        if ($filename != null) {
            $product->prod_img = $filename;
        }
        if ($moreImg != null) {
            $product->prod_more_img = $moreImg;
        }
        $product->updated_at = new DateTime();
        $product->save();
        return redirect('admin/product')->with('Tsuccess', 'Sửa sản phẩm thành công !');
    }
    
}
