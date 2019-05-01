<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab-detal-order" role="tab">Thông tin đơn hàng</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab-profile" role="tab">Khách hàng</a>
    </li>
</ul>
<div class="tab-content modal-body">
    <div class="tab-pane active" id="tab-detal-order" role="tabpanel">
        <div class="content-orderde">
        <h3 class="text-center">THÔNG TIN ĐƠN HÀNG: 
            <span style="color: #4183c4; margin-right: 20px;">#{{ $infoOrder[0]->ord_code }}</span>
            @if ($infoOrder[0]->ord_status == 1)
                <label class="label label-lg label-success">Đã hoàn Thành</label>
            @else
                <label class="label label-lg label-warning">Đang xử lý</label>
            @endif
        </h3>
        <p class="text-center">Ngày bán: {{ date( 'd/m/Y', strtotime($infoOrder[0]->ord_created)) }} - {{ date( 'H:i:s', strtotime($infoOrder[0]->ord_created)) }}</p>
        <div class="row">
            <div class="col-sm-6">
                <p><b><i class="fa fa-plus"></i> Tổng số lượng sản phẩm: {{ $infoOrder[0]->ord_total_quantity }}</b></p>
                <p><b><i class="fa fa-plus"></i> Tiền hàng: {{ number_format($infoOrder[0]->ord_total_origin_price, 0, '.', ',') }}</b></p>
                <p><b><i class="fa fa-plus"></i> Giảm giá: {{ number_format($infoOrder[0]->ord_coupon, 0, '.', ',') }}</b></p>
            </div>
            <div class="col-sm-6">
                <p><b><i class="fa fa-plus"></i> Tổng tiền: {{ number_format($infoOrder[0]->ord_total_money, 0, '.', ',') }}</b></p>
                <p><b><i class="fa fa-plus"></i> Còn nợ: {{ number_format($infoOrder[0]->ord_lake, 0, '.', ',') }}</b></p>
                <p><b><i class="fa fa-plus"></i> Thu ngân: {{ $infoOrder[0]->name }}</b></p>

            </div>
        </div>
    </div>
    <table class="table table-bordered table-hover dataTable" style="margin-top: 20px;">
            <thead>
            <tr role="row">
                <th class="text-center">STT</th>
                <th class="text-left hidden-768">Mã</th>
                <th class="text-left">Tên sản phẩm</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Giá bán</th>
                <th class="text-center ">Thành tiền</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $stt=1;
                @endphp
                @foreach ($listProduct as $value)
                    <tr>
                        <td class="text-center width-5 hidden-320 ">{{ $stt++ }}</td>
                        <td class="text-left hidden-768">{{ $value->prod_code }}</td>
                        <td class="text-left ">{{ $value->prod_name }}</td>
                        <td class="text-center ">{{ $value->orde_quantity }}</td>
                        <td class="text-right">{{ number_format($value->orde_price, 0, '.', ',') }}</td>
                        <td class="text-right">{{ number_format( $value->order_total, 0, '.', ',') }}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    <p> Ghi chú đơn hàng: {{ $infoOrder[0]->ord_nodes }}</p>
    <p> Kho xuất: 
        @if ($infoOrder[0]->ord_store_id == 1)
            Kho trung tâm 
        @endif
        - Nguồn : 
        @if ($infoOrder[0]->ord_source == 1)
            POS - Mua trực tiếp tại cửa hàng
        @elseif($infoOrder[0]->ord_source == 2)
            Đặt hàng qua WEBSITE
        @elseif($infoOrder[0]->ord_source == 3)
            Đặt hàng qua FACEBOOK
        @endif</p>               
    </div>
    <div class="tab-pane" id="tab-profile" role="tabpanel">
        <h3 class="text-center">
            THÔNG TIN KHÁCH HÀNG
        </h3>
        <div class="row">
            <div class="col-sm-6">
                <p>Tên Khách:  <b>{{ $infoOrder[0]->customer_name }} - {{ $infoOrder[0]->customer_code }}</b></p>
                <p>Số điện thoại:  <b>{{ $infoOrder[0]->customer_phone }}</b></p>
                <p>Email:  <b>{{ $infoOrder[0]->customer_email }}</b></p>
                <p>Địa chỉ:  <b>{{ $infoOrder[0]->customer_addr }}</b></p>
                <p>Tổng số tiền đã thanh toán:  <b>{{  number_format($infoCustomerOrder["total_money_pay"], 0, '.', ',')}}</b></p>
            </div>
            <div class="col-sm-6">
                <p>Ngày sinh:  <b>{{ date( 'd/m/Y', strtotime($infoOrder[0]->customer_birthday)) }}</b></p>
                <p>Giới tính:  <b>
                    @if ($infoOrder[0]->customer_gender == 1)
                        Nam
                    @else
                        Nữ
                    @endif
                </b></p>
                <p>Ghi chú:  <b>{{ $infoOrder[0]->customer_nodes }}</b></p>
                <p>Số lượng đơn hàng đã mua:  <b>{{ $infoCustomerOrder["qtorder"] }}</b></p>
                <p>Số tiền còn nợ:  <b>{{ $infoCustomerOrder["lake"] }}</b></p>
            </div>
            <div class="col-sm-12 text-center" style="margin-top: 10px;">
                <a href="javascript:void(0)" class="btn btn-success">Chỉnh Sửa Thông Tin Khách Hàng</a>
            </div>
        </div>
    </div> 
</div>