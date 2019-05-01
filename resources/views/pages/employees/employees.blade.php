@extends('template.default')
@section('title', 'Nhân Viên')
@section('main')
	<!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
               <div class="row">
	            	<div class="col-sm-4">
	            		<div class="page-header-title">
			                <i class="feather icon-clipboard bg-c-blue"></i>
			                <div class="d-inline">
			                    <h5>Nhân viên</h5>
			                    <span>Quản lý nhân viên</span>
			                </div>
			            </div>
	            	</div>
	            	<div class="col-sm-6">
	            		<a class="btn btn-success" href="{{ asset('admin/employees/add') }}"> 
	            			<i class="fa fa-plus-square"></i> Thêm mới nhân viên
	            		</a>
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
                        <li class="breadcrumb-item"><a href="{{URL::current()}}#">Quản lý nhân viên</a> </li>
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
                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Danh sách nhân viên</h5>
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
                                                    <th width="20px;">STT</th>
                                                    <th>Tên nhân viên</th>
                                                    <th>Giới tính</th>
                                                    <th>Ngày sinh</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Email</th>
                                                    <th>Chức vụ</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tùy chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $stt=1;
                                                @endphp
                                                @foreach ($listEmployees as $employees)
                                                    <tr>
                                                        <td>#{{ $stt++ }}</td>
                                                        <td>{{  $employees->em_name }}</td>
                                                        <td>
                                                            @if ($employees->em_sex == 1)
                                                                Nam
                                                            @else
                                                                Nữ
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ date( 'd/m/Y', strtotime($employees->em_birthday)) }}
                                                        </td>
                                                        <td>{{ $employees->em_address }}</td>
                                                        <td>
                                                            <a href="tel:{{ $employees->em_phone }}"> 
                                                                {{ $employees->em_phone }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                             {{ $employees->em_email }}
                                                        </td>
                                                        <td>
                                                            @if ($employees->em_title == 1)
                                                                Quản lý
                                                            @elseif($employees->em_title == 2)
                                                                Kế toán
                                                            @elseif($employees->em_title == 3)
                                                                Nhân viên bán hàng
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($employees->em_status == 1)
                                                                <label class="label label-success"> Đang làm việc </label>
                                                            @else($employees->em_title == 2)
                                                                <label class="label label-danger"> Đã nghỉ việc </label>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ asset('admin/employees/lock/') }}/{{$employees->em_title}}"><i class="icon feather icon-lock f-w-600 f-16 m-r-15 text-c-red"></i></i></a>
                                                            <a href="{{ asset('admin/employees/edit/') }}/{{$employees->em_title}}">
                                                                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
                                                            </a>
                                                            <a href="{{ asset('admin/employees/delete/') }}/{{$employees->em_title}}" class="btnxoa">
                                                                <i class="icon feather icon-trash-2 f-w-600 f-16 text-c-red"></i>
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
            </div>
        </div>
        <!-- Page-body end -->
    </div>
@endsection