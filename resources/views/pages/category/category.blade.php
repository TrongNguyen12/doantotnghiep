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
                        <div class="col-xl-5 col-md-12">
                            <div class="card new-cust-card">
                                <div class="card-header">
                                    <h5>Thêm mới danh mục</h5>
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
                                                  menuMulti( $listcate , 0 , '' ,   old( 'parentID' ));
                                                  //hàm đệ quy
                                              @endphp
                                            </select>
                                         </div>
                                      </div>
                                      <div class="form-group row">
                                         <label class="col-sm-3 col-form-label">Tên danh mục</label>
                                         <div class="col-sm-9">
                                           <div class="ui input fluid">
                                              <input type="text" placeholder="Nhập tên danh mục" required name="name" value="{{ old( 'name' ) }}">
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
                                      <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success waves-effect waves-light btn-block" type="submit">
                                                Thêm mới danh mục
                                            </button>
                                          </div>
                                      </div>
                                      {{csrf_field()}}
                                   </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>DANH MỤC SẢN PHẨM</h5>
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
                                        <table class="table table-hover m-b-0 tableCategory">
                                            <thead>
                                                <tr>
                                                    <th width="70%">Tên danh mục</th>
                                                    <th width="15%">Trạng thái</th>
                                                    <th width="15%">Tùy chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    listCate($listcate);
                                                @endphp
                                            </tbody>
                                        </table>
                                    </div>

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