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
			                    <span>Quản lý thông tin khách hàng</span>
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
	                        <a href="#!">Custommer</a>
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
		                           	<h5>Thêm mới khách hàng</h5>
		                        </div>
		                        <div class="card-block ui form">
		                        	<div class="field">
							        	<label>Tên khách hàng</label>
							        	<input type="text" name="name" placeholder="Nhập tên khách hàng" required>
							      	</div>
	                        		<div class="field">
								        <div class="two fields">
								          <div class="field">
								          	<label>Giới tính</label>
								            <select class="ui dropdown" name="sex">
											  <option value="1">Nam</option>
											  <option value="0">Nữ</option>
											</select>
								          </div>
								          <div class="field">
								          	<label>Ngày sinh <span style="color: red">(*)</span></label>
								            <div class="ui action input">
											  <input type="text" placeholder="Ngày Sinh" data-toggle="datepicker" name="date">
											  <span class="ui icon button btndate">
											    <i class="fa fa-calendar"></i>
											  </span>
											</div>
								          </div>
								        </div>
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
							         <label>Mã khách hàng</label>
						          	 <div class="ui form">
							            <input type="text" placeholder="Mã KH sẽ tự sinh nếu bỏ trống" name="code">
							          </div>
							        </div>
							        <div class="field ui form">
							        	<label>Nhóm khách hàng</label>
							        	<select class="ui dropdown">
										  <option value="1">Khách lẻ</option>
										  <option value="2">Khách buôn</option>
										  <option value="3">Khách thân thiết</option>
										</select>
							        </div>
							        <input type="submit" class="btn btn-success" style="width: 48%" value="LƯU LẠI">
							        <a class="btn btn-danger" href="{{ asset('/admin/customers') }}" style="width: 48%"><i class="fa fa-times"></i> HỦY BỎ</a>
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
