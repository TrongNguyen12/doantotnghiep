<table class="table table-hover m-b-0">
    <thead>
        <tr>
            <th width="20px;"></th>
            <th>Mã đơn</th>
            <th>Kho xuất</th>
            <th>Thu ngân</th>
            <th>Ngày tạo</th>
            <th>Tên khách</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Khách phải trả</th>
            <th>Nợ</th>
            <th>Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
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
    </tbody>
    
</table>
<div class="row" style="width: 100%; padding-left: 10px; margin-top: 15px; ">
    @if (!$infoOrder->isEmpty())
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
    @endif 
</div>