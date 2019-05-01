@extends('template.layout-sales')
@section('title', 'Phần mềm quản lý bán hàng')
@section('main')
	<div class="row" style="margin-top: 37px;">
         <div class="col-sm-9" style="padding-left: 3px; padding-right: 3px;">
     		<div class="card" style="padding: 10px;">
     			<div class="order-search" style="margin: 10px 0px; position: relative;">
                    <div class="field ui form">
			        	<input type="text" name="name" placeholder="Nhập mã sản phẩm hoặc tên sản phẩm (F2)" id="search-pro-box" autocomplete="off" style="padding-left: 30px" style="width: 50%">
			        	<i class="fa fa-search" style="position: absolute; top: 13px; left: 7px;"></i>
			      	</div>
                </div>
     			<div class="product-results">
                    <table class="table table-bordered table-striped ">
                        <thead>
                        <tr>
                            <th width="3%">STT</th>
                            <th width="12%">Mã hàng</th>
                            <th>Tên sản phẩm</th>
                            <th width="7%">Số lượng</th>
                            <th width="15%">Giá bán</th>
                            <th width="15%">Thành tiền</th>
                            <th width="5%"></th>
                        </tr>
                        </thead>
                        <tbody id="pro_search_append">
							
                        </tbody>
                    </table>
                </div>
                <div class="product-list">
                	<p style="color: #777; text-align: left; text-transform: uppercase;margin-bottom: 0px;
    margin-top: 5px;">Danh sách sản phẩm</p>
                	<div class="row" style="padding: 10px;">
                		<div class="swiper-container">
							 <div class="swiper-wrapper">
							 	@foreach ($listProduct as $item)
							 	<div class="swiper-slide">
									<div class="item-product" data-id="{{$item->prod_id}}">
			                			<img src="{{ asset('public/uploads/imagesProduct') }}/{{ $item->prod_img }}" class="set-img" alt="">
			                			<div class="product-content">
			                				<p style="margin-top: 5px;"><b>{{$item->prod_name}}</b></p>
			                				<p>{{$item->prod_code}}</p>
			                				<p><b>{{ number_format($item->prod_sell_price, 0, '.', ',')}} / SL: {{ $item->prod_quantity }}</b></p>
			                			</div>
		                			</div>
                				</div>
							 	@endforeach
								
							 </div>
							 <div class="swiper-button-next"></div>
    						<div class="swiper-button-prev"></div>
                		</div>
                	</div>
                	
                </div>
     		</div>
     	</div>
        <div class="col-sm-3" style="padding-left: 3px; padding-right: 3px;">
        	<div class="card" style="padding: 10px;margin-bottom: 5px;">
        		<div class="form-group row" style="margin: 5px 0px;">
		             <label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
		             	Khách hàng
		         	</label>
		             <div class="col-sm-9" style="padding-left:4px; padding-right: 0px">
		                <div class="ui action input" style="width: 100%;" >
						  <input type="text" placeholder="Tìm kiếm khách hàng" id="search-box-cys">
						  <span class="del-cys"></span>
						  	<div id="cys-suggestion-box">
							    <div class="search-cys-inner">
							    </div>
							</div>
						  <button class="ui icon button btnAdd" style="background: #42a5f5" data-toggle="modal" data-target="#create-cust">
						    <i class="fa fa-user-plus" style="color: white"></i>
						  </button>
						</div>
		             </div>
             	</div>
             	<div class="form-group row" style="margin: 5px 0px;">
		             <label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
		             	SĐT KH: 
		         	</label>
		         	 <label class="col-sm-9 col-form-label text-left" style="padding-left: 0px; padding-right: 0px">
		             	<b id="custommerPhone" style="padding-left: 6px;"></b>
		         	</label>
             	</div>
             	<div class="form-group row" style="margin: 5px 0px;">
	             	<label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
	             		NV Bán hàng
	         		</label>
		             <div class="col-sm-9" style="padding-left:4px; padding-right: 0px">
		                <div class="ui input" style="width: 100%;" >
						  <input type="text" value="{{ Auth::user()->name }}" disabled>
						  <input type="hidden" value="{{ Auth::user()->id }}" id="user_init">
						</div>
		             </div>
             	</div>
             	<div class="form-group row" style="margin: 5px 0px;">
	             	<label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
	             		Ghi chú
	         		</label>
		             <div class="col-sm-9" style="padding-left:4px; padding-right: 0px">
		                <div class="ui form" style="width: 100%;" >
						  <textarea rows="2" id="notes"></textarea>
						</div>
		             </div>
             	</div>
     		</div>
     		<div class="card" style="padding: 10px;">
     			<h5 style="margin-bottom: 0px">Thanh toán <i class="fa fa-info-circle" style="color: #004eff"></i></h5>
     			<div class="form-group row" style="margin: 5px 0px;">
		             <label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
		             	Tổng tiền
		         	</label>
		         	 <label class="col-sm-9 col-form-label text-right" style="padding-left: 0px; padding-right: 0px">
		             	<b id="total_money">0</b>
		             	<input type="hidden" id="total_origin_money">
		         	</label>
             	</div>
             	<div class="form-group row" style="margin: 5px 0px;">
	             	<label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
	             		Chiết khấu
	         		</label>
		             <div class="col-sm-9" style="padding-left:4px; padding-right: 0px">
		                <div class="ui input" style="width: 100%;" >
						  <input type="text" value="0" class="text-right" id="disCount">
						</div>
		             </div>
             	</div>
             	<div class="form-group row" style="margin: 5px 0px;border-top: 1px solid #80808036; border-bottom: 1px solid #80808036; padding-top: 5px; padding-bottom: 5px;">
	             	<label class="col-sm-6 col-form-label" style="padding-left: 0px; padding-right: 0px">
		             	<b>Khách hàng phải trả</b>
		         	</label>
		         	 <label class="col-sm-6 col-form-label text-right" style="padding-left: 0px; padding-right: 0px">
		             	<b style="font-size: 17px;" id="total-after-discount">0</b>
		         	</label>
             	</div>
             	<div class="form-group row" style="margin: 5px 0px;">
	             	<label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
		             	Hình thức
		         	</label>
		         	<div class="col-sm-9" style="padding-left: 0px; padding-right: 0px">
		         		<select class="ui dropdown fluid " id="payMethod">
		         			<option value="1">Tiền Mặt</option>
		         			<option value="2">Chuyển khoản</option>
						  	<option value="3">Thanh toán COD</option>
						</select>
		         	</div>
             	</div>

             	<div class="form-group row" style="margin: 5px 0px;">
	             	<label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
	             		Khách đưa
	         		</label>
		             <div class="col-sm-9" style="padding-left:0px; padding-right: 0px">
		                <div class="ui input" style="width: 100%;" >
						  <input type="text" value="0" class="text-right" id="customer-pay">
						</div>
		             </div>
		             <label class="col-sm-6 col-form-label" style="padding-left: 0px; padding-right: 0px">
	             		Tiền thừa trả lại
	         		</label>
	         		<label class="col-sm-6 col-form-label text-right" style="padding-left: 0px; padding-right: 0px">
	             		<b id="debt">0</b>
	         		</label>
             	</div>
             	<div class="form-group row" style="margin: 5px 0px;">
	             	<button class="btn btn-success btn-block btn-thanhtoan" style="border-radius: 4px;">
	             		<i class="fa fa-print" style="font-size: 17px;"></i> Thanh toán và in hóa đơn</button>
             	</div>
     		</div>
        </div>
    </div>
    {{ csrf_field()}}
    @include('template.partials.modal')
@endsection