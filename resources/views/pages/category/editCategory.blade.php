@extends('template.default')
@section('title', 'Danh Mục Sản Phẩm')
@section('main')
  <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-layers bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>DANH MỤC SẢN PHẨM</h5>
                        <span>Danh mục sản phẩm</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::current()}}#">Admin</a> </li>
                        <li class="breadcrumb-item"><a href="{{URL::current()}}#">Danh Mục Sản Phẩm</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-7 col-md-12">
                            <div class="card new-cust-card">
                                <div class="card-header">
                                    <h5>Sửa danh mục sản phẩm</h5>
                                </div>
                                <div class="card-block">
                                   <form method="POST">
                                      @include('errors.note')
                                      <div class="form-group row">
                                         <label class="col-sm-3 col-form-label">Danh mục gốc</label>
                                         <div class="col-sm-9">
                                            <select class="ui search dropdown fluid" name="parentID">
                                              <option value="0">-- Danh Mục Cha --</option>
                                              @php
                                                  menuMulti( $parent  , 0 , '---| ' , $data->cate_parentID);
                                                  //hàm đệ quy
                                              @endphp
                                            </select>
                                         </div>
                                      </div>
                                      <div class="form-group row">
                                         <label class="col-sm-3 col-form-label">Tên danh mục</label>
                                         <div class="col-sm-9">
                                           <div class="ui input fluid">
                                              <input type="text" placeholder="Nhập tên danh mục" required name="name" value="{{ $data->cate_name }}">
                                            </div>
                                         </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Trạng Thái</label>
                                         <div class="col-sm-9" style="display: flex; align-items: center;">
                                            <div class="ui checked checkbox">
                                              <input type="checkbox" name="status" value="active" checked>
                                                <label style="margin: 0px">Kích hoạt</label>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Ngày Tạo </label>
                                        <label class="col-sm-9 col-form-label"><b>{{ date( 'd/m/Y H:i', strtotime($data->created_at) )}}</b> </label>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Đường Dẫn Tĩnh   </label>
                                        <label class="col-sm-9 col-form-label"><b>{{ asset('danh-muc').'/'.$data->cate_slug }} </b></label>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                            <button class="btn btn-success waves-effect waves-light btn-block" type="submit">Sửa Danh Mục
                                            </button>
                                          </div>
                                          <div class="col-sm-6">
                                            <a class="btn btn-danger waves-effect waves-light btn-block" href="{{ asset('admin/category') }}">
                                              Hủy Bỏ
                                            </a>
                                          </div>
                                      </div>
                                      {{csrf_field()}}
                                   </form>
                                </div>
                            </div>
                        </div>
                        <!-- product and new customar end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
@endsection