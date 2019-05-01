/*
 * Process ajax request
 *
 * $param là một object {'type','url', 'data', 'callback'}
 *
 * default type POST
 
 * Nếu gửi post phải thêm 
 $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': token
  }
});
/*********************************************************************/
function pos_adapter_ajax($param) {
    $.ajax({
        url: $param.url,
        type: $param.type,
        data: $param.data,
        async: true,
        success: $param.callback
    });
}

/* Hàm gửi Ajax */

/* hàm hiển thị thông báo */
function toastMess($text) {
     $.toast({
        text: $text,
        heading: 'Thông Báo', 
        icon: 'success', 
        showHideTransition: 'slide', 
        allowToastClose: true, 
        hideAfter: 4000, 
        stack: 5, 
        position: 'bottom-right',
        textAlign: 'left', 
        loader: false, 
        loaderBg: '#9ec600',  
        beforeShow: function () {}, 
        afterShown: function () {}, 
        beforeHide: function () {},
        afterHidden: function () {} 
    });
}


function pos_add_product($id) {
    NProgress.start();
    if($('tbody#pro_search_append tr').length != 0){
        $flag = 0;
        $('tbody#pro_search_append tr').each(function () {
            $id_temp = $(this).attr('data-id');
            if ($id == $id_temp) {
                value_input = $(this).find('input.quantity_product_order');
                value_input.val(parseInt(value_input.val()) + 1);
                $flag = 1;
                value_price = $(this).find('input.price_product_order').val();
                value_price = pos_decode_currency_format(value_price);
                value_input = $(this).find('input.quantity_product_order').val();
                total_money = value_input * value_price;
                $(this).find('td.total-money').text(pos_encode_currency_format(total_money));
                /* Tính toán giá gốc */
                origin_price = $(this).find('input#prod_origin_price').val();
                 origin_price = pos_decode_currency_format(origin_price) ;
                total_origin_money = value_input * origin_price;
                $(this).find('td.price-order-hide').children('#total_origin_price').val(total_origin_money)
                pos_load_infor_import();
                NProgress.done();
                return false;
            }
        });
        if ($flag == 0) {
            var $seq = parseInt($('td.seq').last().text()) + 1;
            var $param = {
                'type': 'GET',
                'url': '/possales/admin/sales/select',
                'data': {'id': $id, 'seq': $seq},
                'callback': function (data) {
                   $('#pro_search_append').append(data);
                    pos_load_infor_import();
                    NProgress.done();
                }
            };
            pos_adapter_ajax($param);
        }
    }else{
    	 var $param = {
            'type': 'GET',
            'url': '/possales/admin/sales/select',
            'data': {'id': $id, 'seq' : 1 },
            'callback': function (data) {
                $('#pro_search_append').append(data);
                pos_load_infor_import();
                NProgress.done();
            }
        };
        pos_adapter_ajax($param);
    }
}

/* Xóa dấu phảy trong chuỗi */
function pos_decode_currency_format(obs) {
    return parseInt(obs.replace(/,/g, ''));
}

/* Thêm dấu phẩy để hiển thị  */
function pos_encode_currency_format(obs) {
    return obs.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
/* Hàm tính toán tổng tiền */
function pos_load_infor_import() {
    var total_money = 0;
    var total_origin_money = 0 ;
    $('tbody#pro_search_append tr').each(function () {
        var total = pos_decode_currency_format($(this).find('td.total-money').text());
        var total_origin = pos_decode_currency_format($(this).find('td.price-order-hide ').children('#total_origin_price').val());
        total_origin_money += total_origin;
        total_money += total;
    });
    $('#total_money').text(pos_encode_currency_format(total_money));
    $('#total_origin_money').val(total_origin_money);
    var disCount = $('#disCount').val();
    if(total_money != 0){
        if(disCount == 0 || disCount== ''){
            $('#total-after-discount').text(pos_encode_currency_format(total_money));
        }else{
            var pay = total_money - pos_decode_currency_format(disCount);
            if(pay <= 0 ){
                $('#total-after-discount').text(0);
             }else{
                $('#total-after-discount').text(pos_encode_currency_format(pay));
             }
        }
    }else{
        $('#total-after-discount').text(0);
    }
    
}
/* Hàm tính tiền trả lại khách */
function debt() {
    var customerPay = $('#customer-pay').val();
    var total = $('#total-after-discount').text();
    total = pos_decode_currency_format(total);
    customerPay = pos_decode_currency_format(customerPay);
    var debt = customerPay - total;
    if(debt < 0){
        debt = total - customerPay;
        $('#debt').text("Khách nợ: "+pos_encode_currency_format(debt));
    }else{
        $('#debt').text(pos_encode_currency_format(debt));
    } 
}
/* chưa bắt lỗi */
/* Thêm khách hàng bằng Ajax */
function pos_crCustomer() {
    var code = $('input#codeCus').val();
    var name = $('input#nameCus').val();
    var phone = $('input#phoneCus').val();
    var email = $('input#emailCus').val();
    var address = $('input#addCus').val();
    var note = $('input#noteCus').val();
    var date = $('input#dateCus').val();
    var gender= $('#genderCus').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var $param = {
        'type': 'POST',
        'url': '/possales/admin/sales/addCustomer',
        'data': { 
            '_token': token,
            'name': name,
            'phone': phone,
            'code': code,
            'email': email,
            'address': address,
            'note': note,
            'gender': gender,
            'date': date
        },
        'callback': function (data) {
            if(data !=0){
                $("#search-box-cys").prop('disabled', true).attr('data-id', data).val(name);
                $(".del-cys").html('<i class="fa fa-minus-circle" aria-hidden="true"></i>').css('cursor', 'pointer');
                $('#custommerPhone').text(phone);
                reset_valCustomer();
                $.toast({
                    text: "Thêm thành công khách hàng "+name,
                    heading: 'Thông Báo', 
                    icon: 'success', 
                    showHideTransition: 'slide', 
                    allowToastClose: true, 
                    hideAfter: 4000, 
                    stack: 5, 
                    position: 'bottom-right',
                    textAlign: 'left', 
                    loader: false, 
                    loaderBg: '#9ec600',  
                    beforeShow: function () {}, 
                    afterShown: function () {}, 
                    beforeHide: function () {},
                    afterHidden: function () {} 
                });
            }
        }
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': token
      }
    });
    pos_adapter_ajax($param);   
}
function reset_valCustomer() {
    $('input#codeCus').val("");
    $('input#nameCus').val("");
    $('input#phoneCus').val("");
    $('input#emailCus').val("");
    $('input#addCus').val("");
    $('input#noteCus').val("");
    $('input#dateCus').val("");
    $("#create-cust .close").click();
}


/* Tìm kiếm khách hàng */
function pos_search_box_customer() {
    $("body").on('keyup ajaxComplete', '#search-box-cys', function () {
        $('#cys-suggestion-box').show();
        $key = $(this).val();
        if ($key.length == 0) {
            $('.search-cys-inner').html('Không có kết quả phù hợp').parent().hide().delay(1000);
        } else {
            var $param = {
                'type': 'GET',
                'url': '/possales/admin/sales/searchCustomer',
                'data': {
                    'key': $key
                },
                'callback': function (data) {
                    if (data.length != 0) {
                        $('.search-cys-inner').html(data).css('padding', '0px');
                    } else {
                        $('.search-cys-inner').html('Không có kết quả phù hợp').css('padding', '10px');
                    }
                }
            };
           pos_adapter_ajax($param);
        }
    });
}
function pos_selected_cys($id, $phone) {
    $name = $('li.data-cys-name-' + $id).text();
    $("#search-box-cys").prop('disabled', true).attr('data-id', $id).val($name);
                $(".del-cys").html('<i class="fa fa-minus-circle" aria-hidden="true"></i>').css('cursor', 'pointer');
    $('#custommerPhone').text($phone)
    $('#cys-suggestion-box').hide();
}

/* Lưu hóa đơn */
function pos_click_save_order() {
    $('body').on('click', '.btn-thanhtoan', function(event) {
        if ($('tbody#pro_search_append tr').length == 0){
            swal("Thông báo", "Xin vui lòng chọn ít nhất 1 sản phẩm cần xuất trước khi lưu đơn hàng. Xin cảm ơn! ", "error");
        }else{
            flag = 0;
            customer = $('#search-box-cys').val();
            var customerPay = $('#customer-pay').val();
            var total = $('#total-after-discount').text();
            total = pos_decode_currency_format(total);
            customerPay = pos_decode_currency_format(customerPay);
            var debt = customerPay - total;
            if(debt < 0 && customerPay !=0){
                flag = 1;
            }
            if(customer.length != 0){
                swal({   
                    title: "Bạn có chắc muốn thanh toán cho hóa đơn này ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#2ed8b6",
                    confirmButtonText: "Thanh Toán",
                    cancelButtonText: "Hủy",
                    closeOnConfirm: false,
                    closeOnCancel: true 
                    }, function(isConfirm){
                        if (isConfirm) {
                            if(flag == 1){
                                swal({   
                                    title: "Thông báo",
                                    text: "Khách hàng đang trả thiếu tiền có tiếp tục thanh toán và ghi vào sổ nợ ?",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#2ed8b6",
                                    confirmButtonText: "Thanh Toán",
                                    cancelButtonText: "Hủy",
                                    closeOnConfirm: false,
                                    closeOnCancel: true 
                                    }, function(isConfirm){
                                        pos_save_order();
                                });
                            }else{
                                pos_save_order();
                            }
                        }
                });
            }else{
                $('#search-box-cys').focus();
                swal({   
                    title: "Thông báo",
                    text: "Bạn chưa nhập thông tin khách hàng !",
                    type: "warning",
                    confirmButtonColor: "#2ed8b6",
                    confirmButtonText: "OK"
                });
            }
        }
    });
}


function pos_total_qty() {
    $total_qty = 0;
     $('tbody#pro_search_append  tr').each(function () {
        $id = $(this).attr('data-id');
        $value_qty = $(this).find('input.quantity_product_order').val();
        $value_qty = pos_decode_currency_format($value_qty);
        $total_qty +=$value_qty;
    });
     return $total_qty;
}
function pos_save_order() {
    var token = $('meta[name="csrf-token"]').attr('content');
    var customer_id = $('#search-box-cys').attr('data-id');
    var userInid = $('#user_init').val();
    var store_ID = $('#storeID').val();
    var notes = $('#notes').val();
    var payMethod = $('#payMethod').val();
    var toTalPrice = $('b#total_money').text();
    toTalPrice = pos_decode_currency_format(toTalPrice);
    var disCount = $('#disCount').val();
    disCount = pos_decode_currency_format(disCount);
    total_qty = pos_total_qty();
    var ord_total_money  = $('#total-after-discount').text();
    ord_total_money = pos_decode_currency_format(ord_total_money);
    var total_origin_money = $('#total_origin_money').val();
    var customer_pay = $('#customer-pay').val();
    customer_pay = pos_decode_currency_format(customer_pay);
    if(customer_pay >= ord_total_money){
        customer_pay = ord_total_money;
    }if(customer_pay == 0){
        customer_pay = ord_total_money;
    }
    var $param = {
        'type': 'POST',
        'url': '/possales/admin/sales/addOrder',
        'data': {
            'customer_id': customer_id,
            'userInid': userInid,
            'store_ID' : store_ID,
            'notes' : notes,
            'payMethod': payMethod,
            'toTalPrice': toTalPrice,
            'disCount': disCount,
            'total_qty': total_qty,
            'ord_total_money': ord_total_money,
            'customer_pay' : customer_pay,
            'total_origin_money' : total_origin_money
        },
        'callback': function (data) {
            if(data!=""){
                ord_id = data;
                pos_save_order_detal(ord_id);
                printOrder(ord_id);
            }else{
                swal("Thông báo", "Thanh toán thất bại ! Vui lòng kiểm tra đường truyền", "warning");
            }
        }
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': token
      }
    });
    pos_adapter_ajax($param);
}
/* Tinh toan phai ep kieu */
/* Hàm lưu chi tiết hóa đơn */
function pos_save_order_detal(ord_id) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('tbody#pro_search_append  tr').each(function () {
        prod_id = $(this).attr('data-id');
        value_qty = $(this).find('input.quantity_product_order').val();
        value_qty = pos_decode_currency_format(value_qty);
        value_price = $(this).find('input.price_product_order').val();
        value_price = pos_decode_currency_format(value_price);
        total = value_qty * value_price;
        var $param = {
            'type': 'POST',
            'url': '/possales/admin/sales/saveOrderDetail',
            'data': {
                'ord_id' : ord_id,
                'prod_id': prod_id,
                'value_qty': value_qty,
                'value_price' : value_price,
                'total' : total
            },
            'callback': function (data) {
                
            }
        };
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': token
          }
        });
        pos_adapter_ajax($param);
    });
}
function printOrder($id) {
    var $param = {
        'type': 'GET',
        'url': '/possales/admin/sales/printOrder/'+$id,
        'data': "",
        'callback': function (data) {
            var restorepage = $('body').html();
            var printcontent = data;
            $('body').empty().html(printcontent);
            window.print();
            location.reload();
        }
    };
    pos_adapter_ajax($param);
}

function findOrder() {
    var mahd = $('[name=mahd]').val();
    var $param = {
        'type': 'GET',
        'url': '/possales/admin/order/findOrder?mahd='+mahd,
        'data': "",
        'callback': function (data) {
            $('div#orderItem').html(data);
        }
    };
    pos_adapter_ajax($param);
}


/* Hàm Đã Nâng Cấp */
/* Chưa nâng cấp xem dưới comment */
function getDataFilter() {
    var khachHang = $('[name=khachhang]').val();
    var nhanvien = $('[name=nhanvien]').val();
    var fromDate = $('[name=fromDate]').val();
    var toDate = $('[name=toDate]').val();
    var trangThai = $('[name="status"]').val();
    fromDate = fromDate.replace(/\//g,'-');
    toDate = toDate.replace(/\//g,'-');
    var data = {
        'advanced': 'true',
        'status' : trangThai
    };
    if ( fromDate.length  == 0 && toDate.length == 0 ){
        if( khachHang == 0 ){
            if( nhanvien != 0 ){
                data.nhanvien = nhanvien;
            }
        }else{
            data.khachHang = khachHang;
            if( nhanvien != 0 ){
                data.nhanvien = nhanvien;
            }
        }
    }else{
        data.fromDate = fromDate;
        data.toDate = toDate;
        if( khachHang == 0 ){
            if( nhanvien != 0 ){
                data.nhanvien = nhanvien;
            }
        }else{
            data.khachHang = khachHang;
            if( nhanvien != 0 ){
                data.nhanvien = nhanvien;
            }
        }
    }
    return data;
}
function advancedFindOrder() {
    var data = getDataFilter();
    var $param = {
        'type': 'GET',
        'url': '/possales/admin/order/findOrder',
        'data': data,
        'callback': function (data) {
            $('div#orderItem').html(data);
        }
    };
    pos_adapter_ajax($param);
}

function pos_crSuppliers() {
    var codeSupp = $('#codeSupp').val();
    var nameSupp = $('#nameSupp').val();
    var phoneSupp = $('#phoneSupp').val();
    var emailSupp = $('#emailSupp').val();
    var addSupp = $('#addSupp').val();
    var nodeSupp = $('#nodeSupp').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var data = {
        'codeSupp': codeSupp,
        'nameSupp': nameSupp,
        'phoneSupp': phoneSupp,
        'emailSupp' : emailSupp,
        'addSupp': addSupp,
        'nodeSupp': nodeSupp
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': token
      }
    });
    var $param = {
        'type': 'POST',
        'url': '/possales/admin/posimport/addSupplier',
        'data': data,
        'callback': function (data) {
             $("#search-box-supplier").prop('disabled', true).attr('data-id', data).val(nameSupp);
                $(".del-cys").html('<i class="fa fa-minus-circle" aria-hidden="true"></i>').css('cursor', 'pointer');
            reset_valSuppliers();
           toastMess("Thêm thành công nhà cung cấp "+nameSupp);
        }
    };
    pos_adapter_ajax($param);
}
function reset_valSuppliers(){
    var codeSupp = $('#codeSupp').val("");
    var nameSupp = $('#nameSupp').val("");
    var phoneSupp = $('#phoneSupp').val("");
    var emailSupp = $('#emailSupp').val("");
    var addSupp = $('#addSupp').val("");
    $("#create-suppliers .close").click();
}



/* Tìm kiếm nhà cung cấp */
function pos_search_box_supplier() {
    $("body").on('keyup ajaxComplete', '#search-box-supplier', function () {
        $('#cys-suggestion-box').show();
        $key = $(this).val();
        if ($key.length == 0) {
            $('.search-cys-inner').html('Không có kết quả phù hợp').parent().hide().delay(1000);
        } else {
            var $param = {
                'type': 'GET',
                'url': '/possales/admin/posimport/searchSuppliers',
                'data': {
                    'key': $key
                },
                'callback': function (data) {
                    if (data.length != 0) {
                        $('.search-cys-inner').html(data).css('padding', '0px');
                    } else {
                        $('.search-cys-inner').html('Không có kết quả phù hợp').css('padding', '10px');
                    }
                }
            };
           pos_adapter_ajax($param);
        }
    });
}
/* Chọn nhà cung cấp */
function pos_selected_supplier($id, $phone) {
    $name = $('li.data-cys-name-' + $id).text();
    $("#search-box-supplier").prop('disabled', true).attr('data-id', $id).val($name);
                $(".del-cys").html('<i class="fa fa-minus-circle" aria-hidden="true"></i>').css('cursor', 'pointer');
    $('#cys-suggestion-box').hide();
}

/* tính tiền nợ */
function debtImprot() {
    $('body').on('change', '#shop-pay', function () {
        if($(this).val() == ''){
          $(this).val(0);
        }
        shopPay = pos_decode_currency_format($(this).val());
        total_money = pos_decode_currency_format($('#total_money').text());
        disCount = pos_decode_currency_format($('#disCount').val());
        lake = shopPay - (total_money -  disCount);
        if(lake < 0){
            lake =  (total_money -  disCount) - shopPay;
            $('#debtImport').text('Còn nợ: '+ pos_encode_currency_format(lake));
        }else if(lake > 0){
            $('#debtImport').text('Thừa: '+  pos_encode_currency_format(lake));
        }else{
            $('#debtImport').text(0);
        }
    });
}


function click_save_input_bill() {
    if ($('tbody#pro_search_append tr').length == 0){
        swal("Thông báo", "Xin vui lòng chọn ít nhất 1 sản phẩm cần xuất trước khi lưu hóa đơn. Xin cảm ơn! ", "error");
    }else{
        flag = 0;
        supplier = $('#search-box-supplier').val();
        var shopPay = $('#shop-pay').val();
        var total = $('#total_money').text();
        var disCount = $('#disCount').val();
        total = pos_decode_currency_format(total);
        disCount = pos_decode_currency_format(disCount);
        totalBeforeDiscout = total - disCount;
        shopPay = pos_decode_currency_format(shopPay);
        var debt = shopPay - totalBeforeDiscout;
        if(debt < 0 && shopPay !=0){
            flag = 1;
        }
        if(supplier.length != 0){
            swal({   
                title: "Bạn có chắc muốn thanh toán và in phiếu nhập này ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2ed8b6",
                confirmButtonText: "Thanh Toán",
                cancelButtonText: "Hủy",
                closeOnConfirm: false,
                closeOnCancel: true 
                }, function(isConfirm){
                    if (isConfirm) {
                        if(flag == 1){
                            swal({   
                                title: "Thông báo",
                                text: "Bạn đang trả thiếu tiền có tiếp tục thanh toán và ghi vào sổ nợ ?",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#2ed8b6",
                                confirmButtonText: "Thanh Toán",
                                cancelButtonText: "Hủy",
                                closeOnConfirm: false,
                                closeOnCancel: true 
                                }, function(isConfirm){
                                    save_input_bill();
                            });
                        }else{
                            save_input_bill();
                        }
                    }
            });
        }else{
            $('#search-box-supplier').focus();
            swal({   
                title: "Thông báo",
                text: "Bạn chưa nhập thông tin nhà cung cấp !",
                type: "warning",
                confirmButtonColor: "#2ed8b6",
                confirmButtonText: "OK"
            });
        }
    }
}

function save_input_bill() {
    var token = $('meta[name="csrf-token"]').attr('content');
    var userInid = $('#user_init').val();
    var dateInput =  $('#dateInput').val();
    var supplier_id = $('#search-box-supplier').attr('data-id');
    var node = $('#notes').val();
    var payMethod = $('#payMethod').val();
    var coupon = $('#disCount').val();
    coupon = pos_decode_currency_format(coupon);
    var total_qty = pos_total_qty();
    var total_money = pos_decode_currency_format($('#total_money').text()) - coupon;
    var shoppay = pos_decode_currency_format($('#shop-pay').val());
    if(shoppay == 0){
        shoppay = total_money;
    }
    var lake = 0;
    if( (shoppay - total_money) < 0){
        lake = total_money - shoppay;
    }
    var data = {
        'userInid' : userInid,
        'dateInput' : dateInput,
        'supplier_id' : supplier_id,
        'node' : node,
        'paymethod' : payMethod,
        'coupon' : coupon,
        'total' : total_money,
        'shoppay' : shoppay,
        'lake' : lake,
        'total_quantity' : total_qty
    }
    var $param = {
        'type': 'POST',
        'url': '/possales/admin/posimport/addInputBill',
        'data': data,
        'callback': function (data) {
            save_input_detail(data);
            printInputBill(data);
        }
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': token
      }
    });
    pos_adapter_ajax($param);
    
}
function save_input_detail(ip_id) {
    var token = $('meta[name="csrf-token"]').attr('content');
    $('tbody#pro_search_append  tr').each(function () {
        prod_id = $(this).attr('data-id');
        value_qty = $(this).find('input.quantity_product_order').val();
        value_qty = pos_decode_currency_format(value_qty);
        value_price = $(this).find('input.price_product_order').val();
        value_price = pos_decode_currency_format(value_price);
        total = value_qty * value_price;
        var $param = {
            'type': 'POST',
            'url': '/possales/admin/posimport/addInputBillDetail',
            'data': {
                'ipB_id' : ip_id,
                'prod_id': prod_id,
                'value_qty': value_qty,
                'value_price' : value_price,
                'total' : total
            },
            'callback': function (data) {
                //console.log("Xong");
            }
        };
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': token
          }
        });
        pos_adapter_ajax($param);
    });
}
function printInputBill($id) {
    var $param = {
        'type': 'GET',
        'url': '/possales/admin/posimport/printBill/'+$id,
        'data': "",
        'callback': function (data) {
            var restorepage = $('body').html();
            var printcontent = data;
            $('body').empty().html(printcontent);
            window.print();
            location.reload();
        }
    };
    pos_adapter_ajax($param);
}










/* Comment 
data = {
            'trangThai': trangThai,
            'khachhang' : khachHang,
            'fromDate' : null,
            'toDate' : null,
            'nhanvien' : nhanvien
        };

data = {
        'advanced': 'true',
        'status' : trangThai,
        'fromDate' : fromDate,
        'toDate': toDate
    };

    var $param = {
        'type': 'GET',
        'url': '/possales/admin/order/findOrder',
        'data': data,
        'callback': function (data) {
            if(data=="ErrorDate"){
                $('[name=toDate]').focus();
                swal("Thông báo", "Chọn sai mốc thời gian ! ", "error");
            }else{
                $('div#orderItem').html(data);
            }
        }
    };
    pos_adapter_ajax($param);


    Hàm chưa nâng cấp - Bắt Đầu Hàm
    function getDataFilter() {
        var khachHang = $('[name=khachhang]').val();
        var nhanvien = $('[name=nhanvien]').val();
        var fromDate = $('[name=fromDate]').val();
        var toDate = $('[name=toDate]').val();
        var trangThai = $('[name="status"]').val();
        fromDate = fromDate.replace(/\//g,'-');
        toDate = toDate.replace(/\//g,'-');
        var data = {
            'advanced': 'true',
            'status' : trangThai
        };
        if ( fromDate.length  == 0 && toDate.length == 0 ){
            console.log("Khong chon Ngay Thang !");
            if( khachHang == 0 ){
                // console.log("Không chon khach hàng");
                if( nhanvien == 0 ){
                    // console.log("Khong chon nhan vien ");
                }else{
                    // console.log("Chon nhan vien");
                    data.nhanvien = nhanvien;
                }
            }else{
                // console.log("Chon Khach Hàng");
                data.khachHang = khachHang;
                if( nhanvien == 0 ){
                    // console.log("Khong chon nhan vien ");
                }else{
                    // console.log("Chon nhan vien");
                    data.nhanvien = nhanvien;
                }
            }
        }else{
            // console.log("Chon ngay thang !");
            data.fromDate = fromDate;
            data.toDate = toDate;
            if( khachHang == 0 ){
                // console.log("Không chon khach hàng");
                if( nhanvien == 0 ){
                    // console.log("Khong chon nhan vien ");
                }else{
                    data.nhanvien = nhanvien;
                    // console.log("Chon nhan vien");
                }
            }else{
                // console.log("Chon Khach Hàng");
                data.khachHang = khachHang;
                if( nhanvien == 0 ){
                    // console.log("Khong chon nhan vien ");
                }else{
                    // console.log("Chon nhan vien");
                    data.nhanvien = nhanvien;
                }
            }
        }
        console.log(data);
    }
*/