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
		                           	<h5>Thêm mới sản phẩm</h5>
		                        </div>
		                        <div class="card-block ui form">
		                        	<div class="field">
							        	<label>Tên sản phẩm <span style="color: red">(*)</span></label>
							        	<input type="text" name="name" placeholder="Nhập tên sản phẩm" required>
							      	</div>
	                        		<div class="field">
								        <div class="two fields">
								          <div class="field">
								          	<label>Mã sản phẩm</label>
								            <input type="text" placeholder="Có thể nhập mã hoặc bỏ trống" name="code">
								          </div>
								          <div class="field">
								          	<label>Tag</label>
								            <input type="text" placeholder="Có thể nhập tag hoặc bỏ trống" name="tag">
								          </div>
								        </div>
							      	</div>
							      	<div class="field">
								        <div class="two fields">
								          <div class="field">
								          	<label>Giá nhập sản phẩm <span style="color: red">(*)</span></label>
								            <input type="text" placeholder="Giá nhập sản phẩm" name="price" class="number" required>
								          </div>
								          <div class="field">
								          	<label>Giá bán sản phẩm <span style="color: red">(*)</span></label>
								            <input type="text" placeholder="Nhập giá bán sản phẩm" name="pricesalse" class="number" required="">
								          </div>
								        </div>
							      	</div>
							      	<div class="field">
								        <label>Mô tả sản phẩm</label>
								        <textarea name="description"></textarea>
								        <script type="text/javascript">
											var editor = CKEDITOR.replace('description',{
											language:'vi',
											filebrowserImageBrowseUrl: '../vendor/ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../vendor/ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../vendor/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
											});
										</script>
							      	</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <div class="card">
			                    <div class="card-header">
		                           	<h5>Phân loại</h5>
		                        </div>
		                        <div class="card-block ui form">
		                        	<div class="field">
							          <label>Danh mục sản phẩm</label>
							          <select class="ui search dropdown fluid" name="cate">
	                                      @php
	                                          menuMulti( $listcate , 0 , '' ,   old( 'parentID' ));
	                                      @endphp
	                                    </select>
							        </div>
							        <div class="field">
							        	<div class="ui checked checkbox">
	                                  		<input type="checkbox" name="prodNew" value="active">
	                                    	<label style="margin: 0px">Sản phẩm hot</label>
	                                	</div>
							        </div>
							        <div class="field">
							        	<div class="ui checked checkbox">
	                                  		<input type="checkbox" name="prodHot" value="active">
	                                    	<label style="margin: 0px">Sản phẩm mới</label>
	                                	</div>
							        </div>
									<div class="field">
							        	<div class="ui checked checkbox">
	                                  		<input type="checkbox" name="status" value="active">
	                                    	<label style="margin: 0px">Kích hoạt sản phẩm</label>
	                                	</div>
							        </div>
							        <input type="submit" class="btn btn-success" style="width: 48%" value="LƯU LẠI">
							        <button class="btn btn-danger" style="width: 48%"><i class="fa fa-times"></i> HỦY BỎ</button>
		                        </div>
		                    </div>
		                    <div class="card">
		                    	<div class="card-header">
		                           	<h5>Ảnh sản phẩm</h5>
		                           	<div class="card-header-right">
	                                    <a href="javascript:void(0)" id="btnmoreImg"><b>Thêm ảnh sản phẩm</b></a>
	                                    <input type="file" name="moreImg[]" style="display: none;" id="moreImg" multiple>
	                                </div>
		                        </div>
		                        <div class="card-block">
		                        	<input style="display: none; cursor: pointer;" id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
		                        	<div style="text-align: center;">
						             <img style="cursor: pointer;" id="avatar" class="thumbnail" width="200px" src="{{ asset('public/uploads/images.png') }}">
						             </div>
									<div class="listMoreImg">
										
									</div>
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
