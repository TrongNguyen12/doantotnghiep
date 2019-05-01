@extends('template.default')
@section('title', 'Sửa Thông Tin Nhân Viên')
@section('main')
	<div class="page-header card">
	    <div class="row align-items-end">
	        <div class="col-lg-8">
	            <div class="row">
	            	<div class="col-sm-4">
	            		<div class="page-header-title">
			                <i class="feather icon-clipboard bg-c-blue"></i>
			                <div class="d-inline">
			                    <h5>Nhân Viên</h5>
			                    <span>Quản lý nhân viên</span>
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
	                        <a href="#!">Product</a>
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
		                           	<h5>Chỉnh sửa nhân viên</h5>
		                        </div>
		                        <div class="card-block ui form">
		                        	<div class="field">
							        	<label>Tên nhân viên <span style="color: red">(*)</span></label>
							        	<input type="text" name="name" placeholder="Nhập tên sản phẩm" required value="{{ $employees->em_name }}">
							      	</div>
	                        		<div class="field">
								        <div class="two fields">
								          <div class="field">
								          	<label>Giới tính <span style="color: red">(*)</span></label>
								            <select class="ui dropdown" name="sex">
											  <option value="1" @if ( $employees->em_sex == 1 ) selected @endif>Nam</option>
											  <option value="0" @if ( $employees->em_sex != 1 ) selected @endif >Nữ</option>
											</select>
								          </div>
								          <div class="field">
								          	<label>Ngày sinh <span style="color: red">(*)</span></label>
								            <div class="ui action input">
											  <input type="text" placeholder="Ngày Sinh" data-toggle="datepicker" required name="date" value="{{ date( 'd/m/Y', strtotime($employees->em_birthday)) }}">
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
								            <input type="text" placeholder="Nhập số điên thoại nhân viên" name="phone" class="number1" required value="{{ $employees->em_phone }}">
								          </div>
								          <div class="field">
								          	<label>Email <span style="color: red">(*)</span></label>
								            <input type="email" placeholder="Nhập email của nhân viên" name="email" required value="{{ $employees->em_email }}">
								          </div>
								        </div>
							      	</div>
							      	<div class="field">
								        <label>Địa chỉ <span style="color: red">(*)</span></label>
								        <input type="text" name="add" rows="4" required class="clear" value="{!! $employees->em_address !!}">
							      	</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="card">
			                    <div class="card-header">
		                           	<h5>Chức vụ - Ảnh đại diện</h5>
		                        </div>
		                        <div class="card-block ui form">
		                        	<div class="field">
							          <label>Chức vụ</label>
							          	<select class="ui dropdown" name="emtitle">
										  <option value="1" @if ( $employees->em_title == 1 ) selected @endif>Quản lý</option>
										  <option value="2" @if ( $employees->em_title == 2 ) selected @endif>Kế toán</option>
										  <option value="3" @if ( $employees->em_title == 3 ) selected @endif>Nhân viên bán hàng</option>
										</select>
							        </div>
							        <div class="field">
							        	<label>Ảnh nhân viên</label>
							        	<input style="display: none; cursor: pointer;" id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
			                        	<div style="text-align: center;">
			                        		@if ( $employees->em_img !=null )
			                        			<img style="cursor: pointer;" id="avatar" class="thumbnail" width="200px" src="{{ asset('public/uploads/avatarEmployees/') }}/{{ $employees->em_img }}">
			                        		@else
			                        			<img style="cursor: pointer;" id="avatar" class="thumbnail" width="200px" src="{{ asset('public/uploads/images.png') }}">
			                        		@endif
							             </div>
							        </div>
							        <input type="submit" class="btn btn-success" style="width: 48%" value="LƯU LẠI">
							        <button class="btn btn-danger" style="width: 48%"><i class="fa fa-times"></i> HỦY BỎ</button>
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
