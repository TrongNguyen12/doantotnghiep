$(function() {
  $('[data-toggle="datepicker"]').datepicker({
    format: 'dd/mm/yyyy',
    language: 'vi-VN'
  });

	$('.ui.dropdown').dropdown();
	$(".btnxoa").click(function(event){
       event.preventDefault();
       var link = $(this).attr('href');
       swal({   
	    title: "Bạn có chắc muốn xóa ?",
	    text: "Không thể khôi phục khi xóa danh mục này !",
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Xóa",
	    cancelButtonText: "Hủy Bỏ",
	    closeOnConfirm: true,
	    closeOnCancel: true 
		}, function(isConfirm){
		    if (isConfirm) {
		        window.location= link
		    } else {
		        swal("Cancelled", "Your imaginary file is safe :)", "error");
	    	}
		});
    });
    $('#avatar').click(function(){
        $('#img').click();
    });
    $('#btnmoreImg').click(function(event) {
    	$('#moreImg').click();
    });
    var regExp = /[0-9\.\,]/;
      $('.number').on('keydown keyup', function(e) {
        var value = String.fromCharCode(e.which) || e.key;
        console.log(e);
        // Only numbers, dots and commas
        if (!regExp.test(value)
          && e.which != 188 // ,
          && e.which != 190 // .
          && e.which != 8   // backspace
          && e.which != 46  // delete
          && (e.which < 37  // arrow keys
            || e.which > 40)) {
              e.preventDefault();
              return false;
        }
        if (event.which >= 37 && event.which <= 40) return;
        this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      });// khong cho nhap chu vao text box


      $('.number1').on('keydown keyup', function(e) {
        var value = String.fromCharCode(e.which) || e.key;
        console.log(e);
        // Only numbers, dots and commas
        if (!regExp.test(value)
          && e.which != 188 // ,
          && e.which != 190 // .
          && e.which != 8   // backspace
          && e.which != 46  // delete
          && (e.which < 37  // arrow keys
            || e.which > 40)) {
              e.preventDefault();
              return false;
        }
      });
      $('body').on('keydown keyup', '.number', function(e) {
        var value = String.fromCharCode(e.which) || e.key;
        // Only numbers, dots and commas
        if (!regExp.test(value)
          && e.which != 188 // ,
          && e.which != 190 // .
          && e.which != 8   // backspace
          && e.which != 46  // delete
          && (e.which < 37  // arrow keys
            || e.which > 40)) {
              e.preventDefault();
              return false;
        }
        if (event.which >= 37 && event.which <= 40) return;
        this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      });
     $('body').on('keydown keyup', '#disCount', function(e) {
        var value = String.fromCharCode(e.which) || e.key;
        // Only numbers, dots and commas
        if (!regExp.test(value)
          && e.which != 188 // ,
          && e.which != 190 // .
          && e.which != 8   // backspace
          && e.which != 46  // delete
          && (e.which < 37  // arrow keys
            || e.which > 40)) {
              e.preventDefault();
              return false;
        }
        if (event.which >= 37 && event.which <= 40) return;
        this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      });
     $('body').on('keydown keyup', '#shop-pay', function(e) {
        var value = String.fromCharCode(e.which) || e.key;
        // Only numbers, dots and commas
        if (!regExp.test(value)
          && e.which != 188 // ,
          && e.which != 190 // .
          && e.which != 8   // backspace
          && e.which != 46  // delete
          && (e.which < 37  // arrow keys
            || e.which > 40)) {
              e.preventDefault();
              return false;
        }
        if (event.which >= 37 && event.which <= 40) return;
        this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      });
     $('body').on('keydown keyup', '#customer-pay', function(e) {
        var value = String.fromCharCode(e.which) || e.key;
        // Only numbers, dots and commas
        if (!regExp.test(value)
          && e.which != 188 // ,
          && e.which != 190 // .
          && e.which != 8   // backspace
          && e.which != 46  // delete
          && (e.which < 37  // arrow keys
            || e.which > 40)) {
              e.preventDefault();
              return false;
        }
        if (event.which >= 37 && event.which <= 40) return;
        this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      });

});
function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function(e){
            //Thay đổi đường dẫn ảnh
            $('#avatar').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(function() {
   if(window.File && window.FileList && window.FileReader) {
     $("#moreImg").on("change",function(e) {
       var files = e.target.files ,
       filesLength = files.length ;
       $('.listMoreImg').find('img').remove();
       for (var i = 0; i < filesLength ; i++) {
       var f = files[i]
       var fileReader = new FileReader();
       fileReader.onload = (function(e) {
       var file = e.target;
          $('.listMoreImg').append(
            $("<img></img>",{
              class : "thumbnail",
              src : e.target.result,
              title : file.name
            })
          );
          });
         fileReader.readAsDataURL(f);
         }
      });
   }
});
$(function() {
  $('#cys-suggestion-box').hide();
   $(".item-product").on('click', function(event) {
     event.preventDefault();
      var id = $(this).attr("data-id");
      pos_add_product(id);
      pos_load_infor_import();
   });
   $('body').on('click', '.del-pro-order', function () {
        $(this).parents('tr').remove();
        pos_load_infor_import();
    });
   $('body').on('change', '.price_product_order', function () {
        if( $(this).val() == ''){
          $(this).val(0);
        }
        var qyt = $(this).parent().parent().prev().children().children().val();
        var price =  pos_decode_currency_format($(this).val());
        var total = pos_encode_currency_format( qyt* price);
        $(this).parent().parent().next().next().text(total);
        pos_load_infor_import();
    });
   $('body').on('change', '.quantity_product_order', function () {
        if($(this).val() == ''){
          $(this).val(0);
        }
        var qyt = $(this).val();
        var price =  $(this).parent().parent().next().children().children().val();
        /* giá bán */
        price =  pos_decode_currency_format(price);
        /* Giá gỗc */
        var origin_price = $(this).parent().parent().next().children().children().next().val();
        origin_price = pos_decode_currency_format(origin_price);

        var total_origin_price = qyt * origin_price;
        $(this).parent().parent().next().next().find('#total_origin_price').val(total_origin_price);


        var total = pos_encode_currency_format( qyt* price);
        $(this).parent().parent().next().next().next().text(total);
        pos_load_infor_import();
    });
    $('body').on('change', '#disCount', function () {
        pos_load_infor_import();
    });
    $('body').on('change', '#customer-pay', function () {
        debt();
    });
    $('body').on('click', '.del-cys', function () {
       $(this).html('').prev().val('').removeAttr('data-id').prop('disabled', false);
    });
    $('body').on('click', '#btnmoreSearch', function () {
       $('div#moresearch').slideToggle();
    });
    $('body').on('click', '#findOderCode', function () {
       findOrder();
    });
    $('body').on('click', '#btn_advancedFindOrder', function () {
       advancedFindOrder();
    });
    $('body').on('click', '.btn_input_bill', function () {
       click_save_input_bill();
    });

});

/* gọi hàm */

$(function() {
  pos_search_box_customer();
  pos_click_save_order();
  pos_search_box_supplier();
  debtImprot();
});


/* Trang ViewOrder */
$('body').on('click', '.btn-quick-view', function () {
     $id_temp = $(this).attr('data-id');
     /* Loader */
     $('#tab-detal-order').html(" ");
     var $this = $('.order_detal_ajax');
        $this.addClass("card-load");
        $this.append('<div class="card-loader"><i class="feather icon-radio rotate-refresh"></div>');

     var $param = {
          'type': 'GET',
          'url': '/possales/admin/order/quickview/'+$id_temp,
          'callback': function (data) {
              $this.children(".card-loader").remove();
              $this.removeClass("card-load");
              $('.order_detal_ajax').html(data);
          }
      };
      pos_adapter_ajax($param);
});
      

