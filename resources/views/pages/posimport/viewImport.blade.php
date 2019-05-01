@extends('template.default')
@section('title', 'Phần mềm quản lý bán hàng')
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
			                    <h5>Đơn Hàng</h5>
			                    <span>Danh sách đơn hàng</span>
			                </div>
			            </div>
	            	</div>
	            </div>
            </div>
        </div>
    </div>
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
                                    <h5>Danh sách phiếu nhập hàng</h5>
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
                                <div class="pad10">
                                    <form method="GET">
                                    <div class="form_search" style="margin-top: 10px;">
                                        <div class="ui form">
                                          <div class="fields">
                                                <div class="five wide field">
                                                 <input type="text" placeholder="Nhập mã đơn hàng để tìm kiếm" name="mahd" id="findOderCodes">
                                                </div>
                                                <div class="two wide field">
                                                    <button type="button" class="ui primary button" id="findOderCode">Tìm Kiếm</button>
                                                </div>
                                                <div class="three wide field">
                                                    <button class="ui success button" type="button" id="btnmoreSearch">Thêm điều kiện lọc</button>
                                                </div>
                                          </div>
                                          <div id="moresearch" style="display: none;">
                                              <div class="fields">
                                                <div class="three wide field">
                                                    <label>Trạng thái</label>
                                                    <select class="ui dropdown" name="status">
                                                      <option value="0">Tất cả</option>
                                                      <option value="1">Đã xóa</option>
                                                      <option value="2">Còn nợ</option>
                                                    </select>
                                                </div>
                                                <div class="two wide field">
                                                    <label>Từ ngày</label>
                                                    <input type="text" placeholder="Từ Ngày" data-toggle="datepicker" name="fromDate">
                                                </div>
                                                <div class="two wide field">
                                                    <label>Đến ngày</label>
                                                    <input type="text" placeholder="Đến Ngày" data-toggle="datepicker" name="toDate">
                                                </div>
                                                <div class="three wide field">
                                                    <label>Khách hàng</label>
                                                    <select class="ui search dropdown" name="khachhang">
                                                      <option value="0">Khách hàng</option>
                                                      
                                                    </select>
                                                </div>
                                                <div class="three wide field">
                                                    <label>Nhân viên bán hàng</label>
                                                    <select class="ui dropdown" name="nhanvien">
                                                      <option value="0">Tất cả</option>
                                                      <option value="3">Nguyễn Văn Trọng</option>
                                                    </select>
                                                </div>
                                                <div class="three wide field">
                                                    <label style="opacity: 0; visibility: hidden;">Kho xuất</label>
                                                     <button class="ui primary button" type="button" id="btn_advancedFindOrder">Tìm kiếm theo điều kiện</button>
                                                </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive" id="orderItem">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th width="20px;"></th>
                                                    <th>Mã phiếu</th>
                                                    <th>Kho nhập</th>
                                                    <th>Nhân viên nhập</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Đơn vị cung cấp</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Đã trả</th>
                                                    <th>Nợ</th>
                                                    <th>Tùy chọn</th>
                                                </tr>
                                            </thead>
                                           {{--  <tbody>
                                                @foreach ($infoOrder as $item)
                                                	<tr>
    	                                                <td>
    	                                                	<a href="javascript:void(0)" class="btn-quick-view" id="btn-quick-view-33853102" data-id="{{ $item->ord_id }}" data-toggle="modal" data-target="#quickvieworder">
    	                                                		<i class="fa fa-angle-double-right fa-lg drill-down-icon"></i>
    	                                                	</a>
    	                                                </td>
    	                                                <td>{{ $item->ord_code }}</td>
    	                                                <td>
                                                            @if ( $item->ord_store_id == 1)
                                                                Kho trung tâm
                                                            @endif   
                                                        </td>
    	                                                <td>
                                                              {{ $item->name }} 
                                                        </td>
    	                                                <td>
                                                            {{ date( 'd/m/Y', strtotime($item->ord_created)) }}</td>
    	                                                <td>
                                                         {{ $item->customer_name }}   
                                                        </td>
    	                                                <td>
                                                            @if ($item->ord_status == 1)
                                                                <label class="label label-success">Đã hoàn Thành</label>
                                                            @else
                                                                <label class="label label-danger">Đang xử lý</label>
                                                            @endif
                                                        </td>
    	                                                <td>{{ number_format( $item->ord_total_money, 0, '.', ',') }}</td>
    	                                                <td>{{ number_format( $item->ord_customer_pay, 0, '.', ',') }}</td>
    	                                                <td>{{ number_format( $item->ord_lake, 0, '.', ',') }}</td>
    								                    <td class="text-center" style="cursor: pointer;">
    									                    <i title="In" class="fa fa-print blue" style="margin-right: 5px; color: #0B87C9" onclick="printOrder({{$item->ord_id}});"></i>
    									                    <i class="fa fa-trash" style="color: darkred;" title="Xóa"></i>
    								                	</td>
    							                	</tr>
                                                @endforeach
                                            </tbody> --}}
                                            
                                        </table>
                                        <div class="row" style="width: 100%; padding-left: 10px; margin-top: 15px; ">
                                            {{-- @if (!$infoOrder->isEmpty())
                                               <div class="col-xs-12 col-sm-12 col-md-5">
                                                  <div class="dataTables_info" id="simpletable_info" role="status" aria-live="polite">
                                                    Hiển thị kết quả từ 
                                                    <b>{{($infoOrder->currentpage()-1) * $infoOrder->perpage()+1}}</b>
                                                    đến 
                                                    <b>{{$infoOrder->currentpage()*$infoOrder->perpage()}} </b>
                                                    trong tổng 
                                                    <b>{{ $infoOrder->total() }} </b>kết quả</div>
                                               </div>
                                               <div class="col-xs-12 col-sm-12 col-md-7">
                                                 {!! $infoOrder->render('vendor.pagination') !!}
                                               </div>
                                            @else
                                                <div class="col-xs-12 col-sm-12 col-md-5">
                                                    <b>Không kết quả nào được tìm thấy ! </b>
                                                </div>
                                            @endif  --}}

                                        </div>
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