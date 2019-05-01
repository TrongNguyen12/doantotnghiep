@extends('template.default')
@section('title', 'Thêm Mới Khách Hàng')
@section('main')
	<div class="page-header card">
	    <div class="row align-items-end">
	        <div class="col-lg-8">
	            <div class="row">
	            	<div class="col-sm-4">
	            		<div class="page-header-title">
			                <i class="feather icon-clipboard bg-c-blue"></i>
			                <div class="d-inline">
			                    <h5>Khách hàng</h5>
			                    <span>Quản lý thông tin nhà cung cấp</span>
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
	                        <a href="#!">Suppliers</a>
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
	         	<form method="POST" enctype="multipart/form-data">
		            <div class="row">
		               <div class="col-md-8">
		                    <div class="card">
			                    <div class="card-header">
		                           	<h5>Thêm mới nhà cung cấp</h5>
		                        </div>
		                        <div class="card-block ui form">
		                        	<div class="field">
							        	<label>Tên nhà cung cấp</label>
							        	<input type="text" name="name" placeholder="Nhập tên khách hàng" required>
							      	</div>
							      	<div class="field">
								        <div class="two fields">
								          <div class="field">
								          	<label>Số điện thoại <span style="color: red">(*)</span></label>
								            <input type="text" placeholder="Nhập số điên thoại khách hàng" name="phone" class="number1" required>
								          </div>
								          <div class="field">
								          	<label>Email</label>
								            <input type="email" placeholder="Nhập email của khách hàng" name="email">
								          </div>
								        </div>
							      	</div>
							      	<div class="field">
								        <label>Địa chỉ </label>
								        <textarea name="add" rows="3"></textarea>
							      	</div>
							      	<div class="field">
								        <label>Ghi chú</label>
								        <textarea name="note" rows="3"></textarea>
							      	</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="card">
			                    <div class="card-header">
		                           	<h5></h5>
		                        </div>
		                        <div class="card-block ui form">
		                        	<div class="field">
							         <label>Mã nhà cung cấp</label>
						          	 <div class="ui form">
							            <input type="text" placeholder="Mã NCC sẽ tự sinh nếu bỏ trống" name="code">
							          </div>
							        </div>
							        <div class="field ui form">
							        	<label>Nhóm nhà cung cấp</label>
							        	<select class="ui dropdown">
										  <option value="1">NCC lẻ</option>
										  <option value="2">NCC buôn</option>
										  <option value="3">NCC thân thiết</option>
										</select>
							        </div>
							        <input type="submit" class="btn btn-success" style="width: 48%" value="LƯU LẠI">
							        <a class="btn btn-danger" href="{{ asset('/admin/suppliers') }}" style="width: 48%"><i class="fa fa-times"></i> HỦY BỎ</a>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            {{ csrf_field() }}
	            </form>
	         </div>
	         <!-- Page body end -->
	      </div>
	   </div>
	</div>     
@endsection
