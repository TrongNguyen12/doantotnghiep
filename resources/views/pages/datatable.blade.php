@extends('template.default')
@section('title', 'Phần mềm quản lý bán hàng')
@section('main')
  <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-layers bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Widget data</h5>
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::current()}}#">Widget</a> </li>
                        <li class="breadcrumb-item"><a href="{{URL::current()}}#">data</a> </li>
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
                        
                        <!-- Customer overview start -->
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
                                                    <th>Sản Phẩm</th>
                                                    <th>Nhãn Hiệu</th>
                                                    <th>Có Thể Bán</th>
                                                    <th>Ngày Khởi Tạo</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/anhsp.jpg" alt="user image" class="img img-50 align-top">
                                                            <div class="d-inline-block">
                                                                <h6>Sản Phẩm Áo</h6>
                                                                <p class="text-muted m-b-0"><a href="">Áo khoác</a></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Pinterest</td>
                                                    <td>223</td>
                                                    <td>19-11-2018</td>
                                                    <td>
                                                        <label class="label label-success">Open</label>
                                                    </td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/anhsp.jpg" alt="user image" class="img img-50 align-top">
                                                            <div class="d-inline-block">
                                                                <h6>Sản Phẩm Áo</h6>
                                                                <p class="text-muted m-b-0"><a href="">Áo khoác</a></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Pinterest</td>
                                                    <td>223</td>
                                                    <td>19-11-2018</td>
                                                    <td>
                                                        <label class="label label-success">Open</label>
                                                    </td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/anhsp.jpg" alt="user image" class="img img-50 align-top">
                                                            <div class="d-inline-block">
                                                                <h6>Sản Phẩm Áo</h6>
                                                                <p class="text-muted m-b-0"><a href="">Áo khoác</a></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Pinterest</td>
                                                    <td>223</td>
                                                    <td>19-11-2018</td>
                                                    <td>
                                                        <label class="label label-success">Open</label>
                                                    </td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/anhsp.jpg" alt="user image" class="img img-50 align-top">
                                                            <div class="d-inline-block">
                                                                <h6>Sản Phẩm Áo</h6>
                                                                <p class="text-muted m-b-0"><a href="">Áo khoác</a></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Pinterest</td>
                                                    <td>223</td>
                                                    <td>19-11-2018</td>
                                                    <td>
                                                        <label class="label label-success">Open</label>
                                                    </td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/anhsp.jpg" alt="user image" class="img img-50 align-top">
                                                            <div class="d-inline-block">
                                                                <h6>Sản Phẩm Áo</h6>
                                                                <p class="text-muted m-b-0"><a href="">Áo khoác</a></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Pinterest</td>
                                                    <td>223</td>
                                                    <td>19-11-2018</td>
                                                    <td>
                                                        <label class="label label-success">Open</label>
                                                    </td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/anhsp.jpg" alt="user image" class="img img-50 align-top">
                                                            <div class="d-inline-block">
                                                                <h6>Sản Phẩm Áo</h6>
                                                                <p class="text-muted m-b-0"><a href="">Áo khoác</a></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Pinterest</td>
                                                    <td>223</td>
                                                    <td>19-11-2018</td>
                                                    <td>
                                                        <label class="label label-success">Open</label>
                                                    </td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Customer overview end -->

                        <!-- product and new customar start -->
                        <div class="col-xl-4 col-md-6">
                            <div class="card new-cust-card">
                                <div class="card-header">
                                    <h5>New Customers</h5>
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
                                    <div class="align-middle m-b-25">
                                        <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <div class="d-inline-block">
                                            <a href="{{URL::current()}}#"><h6>Alex Thompson</h6></a>
                                            <p class="text-muted m-b-0">Cheers!</p>
                                            <span class="status active"></span>
                                        </div>
                                    </div>
                                    <div class="align-middle m-b-25">
                                        <img src="assets/images/avatar-3.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <div class="d-inline-block">
                                            <a href="{{URL::current()}}#"><h6>John Doue</h6></a>
                                            <p class="text-muted m-b-0">stay hungry stay foolish!</p>
                                            <span class="status active"></span>
                                        </div>
                                    </div>
                                    <div class="align-middle m-b-25">
                                        <img src="assets/images/avatar-3.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <div class="d-inline-block">
                                            <a href="{{URL::current()}}#"><h6>Alex Thompson</h6></a>
                                            <p class="text-muted m-b-0">Cheers!</p>
                                            <span class="status deactive text-mute"><i class="far fa-clock m-r-10"></i>30 min ago</span>
                                        </div>
                                    </div>
                                    <div class="align-middle m-b-25">
                                        <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <div class="d-inline-block">
                                            <a href="{{URL::current()}}#"><h6>John Doue</h6></a>
                                            <p class="text-muted m-b-0">Cheers!</p>
                                            <span class="status deactive text-mute"><i class="far fa-clock m-r-10"></i>10 min ago</span>
                                        </div>
                                    </div>
                                    <div class="align-middle m-b-25">
                                        <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <div class="d-inline-block">
                                            <a href="{{URL::current()}}#"><h6>Alex Thompson</h6></a>
                                            <p class="text-muted m-b-0">stay hungry stay foolish!</p>
                                            <span class="status active"></span>
                                        </div>
                                    </div>
                                    <div class="align-middle m-b-0">
                                        <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <div class="d-inline-block">
                                            <a href="{{URL::current()}}#"><h6>Alex Thompson</h6></a>
                                            <p class="text-muted m-b-0">Cheers!</p>
                                            <span class="status active"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-6">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>New Products</h5>
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
                                                    <th>Product Name</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>HeadPhone</td>
                                                    <td><img src="assets/images/widget/p1.jpg" alt="" class="img-fluid img-20"></td>
                                                    <td>
                                                        <div class="p-status bg-c-green"></div>
                                                    </td>
                                                    <td>$10</td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Iphone 6</td>
                                                    <td><img src="assets/images/widget/p2.jpg" alt="" class="img-fluid img-20"></td>
                                                    <td>
                                                        <div class="p-status bg-c-green"></div>
                                                    </td>
                                                    <td>$20</td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Jacket</td>
                                                    <td><img src="assets/images/widget/p3.jpg" alt="" class="img-fluid img-20"></td>
                                                    <td>
                                                        <div class="p-status bg-c-green"></div>
                                                    </td>
                                                    <td>$35</td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Sofa</td>
                                                    <td><img src="assets/images/widget/p4.jpg" alt="" class="img-fluid img-20"></td>
                                                    <td>
                                                        <div class="p-status bg-c-green"></div>
                                                    </td>
                                                    <td>$85</td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Iphone 6</td>
                                                    <td><img src="assets/images/widget/p2.jpg" alt="" class="img-fluid img-20"></td>
                                                    <td>
                                                        <div class="p-status bg-c-green"></div>
                                                    </td>
                                                    <td>$20</td>
                                                    <td><a href="{{URL::current()}}#"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a><a href="{{URL::current()}}#"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- product and new customar end -->

                        

                        <!-- Customer overview start -->
                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Project Task List</h5>
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
                                                    <th>Subject</th>
                                                    <th>Regarding</th>
                                                    <th>Activity Type</th>
                                                    <th>Activity Status</th>
                                                    <th>Owner</th>
                                                    <th>Priority</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Building Marketing List</td>
                                                    <td>Software pro</td>
                                                    <td>Task</td>
                                                    <td><label class="label label-danger">Open</label></td>
                                                    <td>Ken Malit</td>
                                                    <td>Normal</td>
                                                    <td>7/8/2017</td>
                                                    <td>8/9/2018</td>
                                                </tr>
                                                <tr>
                                                    <td>Project Task List</td>
                                                    <td>Software pro</td>
                                                    <td>Task</td>
                                                    <td><label class="label label-primary">New</label></td>
                                                    <td>Ken Malit</td>
                                                    <td>Normal</td>
                                                    <td>7/8/2017</td>
                                                    <td>8/9/2018</td>
                                                </tr>
                                                <tr>
                                                    <td>Building Marketing List</td>
                                                    <td>Software pro</td>
                                                    <td>Task</td>
                                                    <td><label class="label label-danger">Open</label></td>
                                                    <td>Ken Malit</td>
                                                    <td>Normal</td>
                                                    <td>7/8/2017</td>
                                                    <td>8/9/2018</td>
                                                </tr>
                                                <tr>
                                                    <td>Project Task List</td>
                                                    <td>Software pro</td>
                                                    <td>Task</td>
                                                    <td><label class="label label-success">Close</label></td>
                                                    <td>Ken Malit</td>
                                                    <td>Normal</td>
                                                    <td>7/8/2017</td>
                                                    <td>8/9/2018</td>
                                                </tr>
                                                <tr>
                                                    <td>Building Marketing List</td>
                                                    <td>Software pro</td>
                                                    <td>Task</td>
                                                    <td><label class="label label-primary">New</label></td>
                                                    <td>Ken Malit</td>
                                                    <td>Normal</td>
                                                    <td>7/8/2017</td>
                                                    <td>8/9/2018</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Customer overview end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
@endsection


   