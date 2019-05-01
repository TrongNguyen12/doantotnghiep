<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hóa đơn nhập hàng Possales</title>
</head>
<style>
	body {
	    margin: 0;
	    padding: 0;
	    background-color: #FAFAFA;
	    font: 12pt "Tohoma";
	}
	* {
	    box-sizing: border-box;
	    -moz-box-sizing: border-box;
	}
	.page {
	    width: 21cm;
	    overflow:hidden;
	    min-height:297mm;
	    padding: 2cm;
	    margin-left:auto;
	    margin-right:auto;
	    background: white;
	    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}
	.subpage {
	    padding: 1cm;
	    border: 5px red solid;
	    height: 237mm;
	    outline: 2cm #FFEAEA solid;
	}
	 @page {
	 size: A4;
	 margin: 0;
	}
	button {
	    width:100px;
	    height: 24px;
	}
	.header {
	    overflow:hidden;
	}
	.logo {
	    background-color:#FFFFFF;
	    text-align:left;
	    float:left;
	}
	.company {
	    padding-top:24px;
	    text-transform:uppercase;
	    background-color:#FFFFFF;
	    text-align:right;
	    float:right;
	    font-size:16px;
	}
	.title {
	    text-align:center;
	    position:relative;
	    color:#0000FF;
	    font-size: 24px;
	    top:1px;
	}
	
	.TableData {
	    background:#ffffff;
	    font: 11px;
	    width:100%;
	    border-collapse:collapse;
	    font-family:Verdana, Arial, Helvetica, sans-serif;
	    font-size:12px;
	    border:thin solid #d3d3d3;
	}
	.TableData TH {
	    background: rgba(0,0,255,0.1);
	    text-align: center;
	    font-weight: bold;
	    color: #000;
	    border: solid 1px #ccc;
	    height: 24px;
	}
	.TableData TR {
	    height: 24px;
	    border:thin solid #d3d3d3;
	}
	.TableData TR TD {
	    padding-right: 2px;
	    padding-left: 2px;
	    border:thin solid #d3d3d3;
	}
	.TableData TR:hover {
	    background: rgba(0,0,0,0.05);
	}
	.TableData .cotSTT {
	    text-align:center;
	    width: 10%;
	}
	.TableData .cotTenSanPham {
	    text-align:left;
	    width: 40%;
	}
	.TableData .cotHangSanXuat {
	    text-align:left;
	    width: 20%;
	}
	.TableData .cotGia {
	    text-align:right;
	    width: 120px;
	}
	.TableData .cotSoLuong {
	    text-align: center;
	    width: 50px;
	}
	.TableData .cotSo {
	    text-align: right;
	    width: 120px;
	}
	.TableData .tong {
	    text-align: right;
	    font-weight:bold;
	    text-transform:uppercase;
	    padding-right: 4px;
	}
	.TableData .cotSoLuong input {
	    text-align: center;

	}
	p.doctien{
		font-style: italic;
	}
	p.doctien:first-letter {
    	text-transform: uppercase;
    	padding-left: 20px;
    	
	}
	@media print {
		 @page {
		 margin: 0;
		 border: initial;
		 border-radius: initial;
		 width: initial;
		 min-height: initial;
		 box-shadow: initial;
		 background: initial;
		 
		}
	}
	.info{
		margin-bottom: 20px;
		width: 100%;
	}
	.info tr {
	    margin-bottom: 5px;
	    display: block;
	}

</style>
<body>
		<div id="page" class="page">
	    <div class="header">
	        <div class="logo"><img src="{{ asset('/public/vendor/assets/images/logoden.png') }}"/></div>
	        <div class="company">Phần Mềm Quản Lý Bán Hàng Possale</div>
	    </div>
	  <br/>
	  <div class="title">
	       	PHIẾU NHẬP HÀNG 
	        <br/>
	        -------oOo-------
	        <p style="margin: 0px;
    font-size: 13px;
    padding-top: 9px;">Số HD: {{ $infoOrder->ipB_code }} - {{ date( 'd/m/Y H:i:s', strtotime($infoOrder->ipB_created)) }}
</p>
	  </div>
	  <br/>
	  <table class="info">
	  	<tr>
	  		<td style="width: 120px;">ĐV cấp hàng: </td>
	  		<td>{{ $infoOrder->supplier_name }} -- {{ $infoOrder->supplier_code }}</td>
	  	</tr>
	  	<tr>
	  		<td style="width: 120px;">Số điện thoại: </td>
	  		<td style="padding-right: 40px">{{ $infoOrder->supplier_phone }}</td>
	  		<td>Email: {{ $infoOrder->supplier_email }}</td>
	  	</tr>
	  	<tr>
	  		<td style="width: 120px;">Địa chỉ: </td>
	  		<td>{{ $infoOrder->supplier_addr }}</td>
	  	</tr>
	  </table>
	  <table class="TableData">
	    <tr>
	      <th>Tên sản phẩm</th>
	      <th>Đơn giá</th>
	      <th>Số lượng</th>
	      <th>Thành tiền</th>
	    </tr>
	    @foreach ($listProduct as $value)
	    	<tr>
	    		<td style="padding-left: 5px;">
	    			{{ $value->prod_name }}
	    		</td>
	    		<td style="text-align: right;">
	    			{{ number_format($value->ipBD_price, 0, '.', ',') }}
	    		</td>
	    		<td style="text-align: center;">
	    			{{ $value->ipBD_quantity }}
	    		</td>
	    		<td style="text-align: right;">
	    			{{ number_format( $value->ipBD_total, 0, '.', ',') }}
	    			
	    		</td>
	    	</tr>
	    @endforeach
	    <tr>
	      <td colspan="3" class="tong">Tổng cộng</td>
	      <td class="cotSo">{{  number_format( $infoOrder->ipB_total_money, 0, '.', ',') }}</td>
	    </tr>
	     <tr>
	      <td colspan="3" class="tong">Chiết khấu</td>
	      <td class="cotSo">{{ number_format( $infoOrder->ipB_coupon, 0, '.', ',') }} </td>
	    </tr>
	  </table>
	  <div class="tien" style="margin-top: 20px; clear: both;">
	  	 <b>Đã thanh toán:  </b>
	  	 <p style="margin: 0px; float: right;"><b> {{  number_format( $infoOrder->ipB_shop_pay, 0, '.', ',') }}</b></p>
	  </div>
	  <div class="tien" style="margin-top: 10px; clear: both;">
	  	 <b>Còn nợ lại: </b>
	  	 <p style="margin: 0px; float: right;"><b> {{  number_format( $infoOrder->ipB_lake, 0, '.', ',') }}</b></p>
	  </div>
	  <div class="tien" style="margin-top: 10px;
    clear: both;
    margin-bottom: 10px;
    float: left;">
	  	 <b style="float: left;">Tiền bằng chữ: </b>
	  	 <p style="margin: 0px; float: left;" class="doctien" ><b > {{ convert_number_to_words($infoOrder->ipB_total_money) }} </b></p>
	  </div>
	 <div style="clear: both;"></div>
	  <div class="thongtinhd" style="font-size: 12px;">
	  	<p style="margin: 5px;">Nhân viên nhập hàng: {{ $infoOrder->name }}</p>
	    <p style="margin: 5px;">Thời gian xuất hóa đơn: {{ date( 'H:i:s', strtotime($infoOrder->ipB_created)) }} - Ngày {{ date( 'd/m/Y', strtotime($infoOrder->ipB_created)) }}</p>
	</div>
	<p style="text-align: center; margin: 5px; font-size: 12px;">Xin cảm ơn và hẹn gặp lại quý khách !</p>
</body>
</html>