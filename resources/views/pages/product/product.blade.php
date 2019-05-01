@extends('template.default')
@section('title', 'Thêm Mới Sản Phẩm')
@section('main')
	<div class="page-header card">
	    <div class="row align-items-end">
	        <div class="col-lg-8">
	            <div class="row">
	            	<div class="col-sm-4">
	            		<div class="page-header-title">
			                <i class="feather icon-clipboard bg-c-blue"></i>
			                <div class="d-inline">
			                    <h5>Sản Phẩm</h5>
			                    <span>Danh Sách Sản Phẩm</span>
			                </div>
			            </div>
	            	</div>
	            	<div class="col-sm-6">
	            		<a class="btn btn-success" href="{{ asset('admin/product/add') }}"> 
	            			<i class="fa fa-plus-square"></i> Thêm mới sản phẩm
	            		</a>
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
	                        <a href="#!">Product</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="pcoded-inner-content">
	   <div class="main-body">
	      <div class="page-wrapper">
	         <!-- Page body start -->
	         <div class="page-body">
	            <div class="row">
	               <div class="col-md-12">
	                    <div class="card table-card">
	                        <div class="card-header">
	                            <h5>Sản Phẩm</h5>
	                            <div class="card-header-right">
	                                <ul class="list-unstyled card-option">
	                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
	                                    <li><i class="feather icon-maximize full-card"></i></li>
	                                    <li><i class="feather icon-minus minimize-card"></i></li>
	                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
	                                    <li><i class="feather icon-trash close-card"></i></li>
	                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="card-block">
	                            <div class="table-responsive">
	                                <table class="table table-hover m-b-0">
	                                    <thead>
	                                        <tr>
	                                            <th>Sản phẩm</th>
	                                            <th>Loại</th>
	                                            <th>Có thể bán</th>
	                                            <th>Trạng thái</th>
	                                            <th>Giá bán</th>
	                                            <th>Tùy chọn</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach ($productlist as $item)
                                    		<tr>
                                            <td style="padding: 13px">
                                            	<a href="{{ asset('admin/product/edit').'/'.$item->prod_id }}">
	                                                <div class="d-inline-block align-middle">
	                                                    <img src="{{ asset( 'public/uploads/imagesProduct' ).'/'.$item->prod_img }}" alt="user image" class="img-40 align-top m-r-15">
	                                                    <div class="d-inline-block">
	                                                        <h6>{{ $item->prod_name }}</h6>
	                                                        <p class="text-muted m-b-0">Mã SP: {{ $item->prod_code }}</p>
	                                                    </div>
	                                                </div>
                                                </a>
                                            </td>
                                            <td>{{ $item->cate_name }}</td>
                                            <td>{{ $item->prod_quantity }}
                                            	@if ($item->prod_quantity == 0)
                                            		<label class="label label-danger">Hết Hàng</label>
                                            	@endif
                                            </td>
                                            <td>
                                            	@if ($item->prod_status == 1)
                                            		<label class="label label-success">Đang giao dịch</label>
                                            	@else
                                            		<label class="label label-danger">Đã khóa</label>
                                            	@endif
                                            </td>
                                            <td>
                                               <div class="d-inline-block">
                                                    <p style="margin-bottom: 0px">Giá nhập: 
                                                    	<b>
                                                    		{{ number_format($item->prod_origin_price, 0, '.', ',') }} đ
                                                    	</b>
                                                	</p>
                                                    @if ($item->prod_sell_price != null)
	                                                    <p style="margin-bottom: 0px">Giá bán: 
	                                                    	<b>
	                                                    		{{ number_format($item->prod_sell_price, 0, '.', ',') }} đ
	                                                    	</b>
	                                                	</p>
                                                    @endif
                                                    
                                                </div>
                                            </td>
                                            <td>
                                            	<a href="{{ asset( 'admin/product/edit' ) }}/{{ $item->prod_id }}">
                                            		<i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green" style="font-size: 25px"></i></a>
                                        		<a href="{{ asset( 'admin/product/delete' ) }}/{{ $item->prod_id }}" class="btnxoa">
                                        			<i class="feather icon-trash-2 f-w-600 f-16 text-c-red" style="font-size: 25px"></i>
                                        		</a>
                                            </td>
	                                        </tr>
	                                    	@endforeach
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	         </div>
	         <!-- Page body end -->
	      </div>
	   </div>
	</div>     
@endsection
