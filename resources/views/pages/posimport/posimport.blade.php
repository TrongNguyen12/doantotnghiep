@extends('template.default')
@section('title', 'Phần mềm quản lý bán hàng')
@section('main')
	<div class="page-header card">
	    <div class="row align-items-end">
	        <div class="col-lg-8">
	            <div class="row">
	            	<div class="col-sm-4">
	            		<div class="page-header-title">
			                <i class="feather icon-clipboard bg-c-blue"></i>
			                <div class="d-inline">
			                    <h5>Nhập hàng</h5>
			                    <span>Nhập hàng vào kho hàng</span>
			                </div>
			            </div>
	            	</div>
	            </div>
	        </div>
	        <div class="col-lg-4">
	            <div class="page-header-breadcrumb">
	                <ul class=" breadcrumb breadcrumb-title">
	                    <li class="breadcrumb-item">
	                        <a href="index.html"><i class="feather icon-home"></i></a>
	                    </li>
	                    <li class="breadcrumb-item"><a href="#!">Home</a>
	                    </li>
	                    <li class="breadcrumb-item">
	                        <a href="#!">Nhập Hàng</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="pcoded-inner-content">
	   <div class="main-body product">
	      <div class="page-wrapper">
	         <!-- Page body start -->
	         <div class="page-body">
					<div class="row">
				         <div class="col-sm-8" style="padding-left: 3px; padding-right: 3px;">
				     		<div class="card" style="padding: 10px">
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
				                            <th width="15%">Giá nhập</th>
				                            <th width="15%">Thành tiền</th>
				                            <th width="5%"></th>
				                        </tr>
				                        </thead>
				                        <tbody id="pro_search_append">
											
				                        </tbody>
				                    </table>
				                </div>
				     		</div>
				     	</div>
				        <div class="col-sm-4" style="padding-left: 3px; padding-right: 3px;">
				        	<div class="card" style="padding: 20px;margin-bottom: 5px; padding-right: 30px;">
				        		<div class="form-group row" style="margin: 5px 0px;">
						             <label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
						             	NCC:
						         	</label>
						             <div class="col-sm-9" style="padding-left:4px; padding-right: 0px">
						                <div class="ui action input" style="width: 100%;" >
										  <input type="text" placeholder="Tìm kiếm nhà cung cấp" id="search-box-supplier">
										  <span class="del-cys"></span>
										  	<div id="cys-suggestion-box">
											    <div class="search-cys-inner">
											    </div>
											</div>
										  <button class="ui icon button btnAdd" style="background: #42a5f5" data-toggle="modal" data-target="#create-suppliers">
										    <i class="fa fa-user-plus" style="color: white"></i>
										  </button>
										</div>
						             </div>
				             	</div>
				             	<div class="form-group row" style="margin: 5px 0px;">
						             <label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
						             	Ngày nhập:
						         	</label>
						         	 <div class="col-sm-9 col-form-label text-left ui input" style="padding-left: 4px; padding-right: 0px">
						             	<input type="text" data-toggle="datepicker" id="dateInput">
						         	</div>
				             	</div>
				             	<div class="form-group row" style="margin: 5px 0px;">
					             	<label class="col-sm-3 col-form-label" style="padding-left: 0px; padding-right: 0px">
					             		NV Nhập
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
						             	<b>Tổng tiền</b>
						         	</label>
						         	 <label class="col-sm-9 col-form-label text-right" style="padding-left: 0px; padding-right: 0px">
						             	<b id="total_money">0</b>
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
					             		Thanh toán:
					         		</label>
						             <div class="col-sm-9" style="padding-left:0px; padding-right: 0px">
						                <div class="ui input" style="width: 100%;" >
										  <input type="text" value="0" class="text-right" id="shop-pay">
										</div>
						             </div>
						             <label class="col-sm-6 col-form-label" style="padding-left: 0px; padding-right: 0px">
					             		Còn nợ:
					         		</label>
					         		<label class="col-sm-6 col-form-label text-right" style="padding-left: 0px; padding-right: 0px">
					             		<b id="debtImport">0</b>
					         		</label>
				             	</div>
				             	<div class="form-group row" style="margin: 5px 0px;">
					             	<button class="btn btn-success btn-block btn_input_bill" style="border-radius: 4px;">
					             		<i class="fa fa-print" style="font-size: 17px;"></i> In hóa đơn nhập</button>
				             	</div>
				     		</div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
    {{ csrf_field()}}
    @include('template.partials.modal')
@endsection