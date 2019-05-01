<!DOCTYPE html>
<html lang="vi">
<head>
	<!-- head -->
    @include('template.partials.head')
    <!-- end head -->
</head>
<body themebg-pattern="theme1">
	<div class="loader-bg" style="display: none;">
        <div class="loader-bar"></div>
    </div>
    <div id="pcoded" class="pcoded" nav-type="st2" theme-layout="horizontal" horizontal-placement="top" horizontal-layout="widebox" pcoded-device-type="desktop" hnavigation-view="view1" fream-type="theme1" layout-type="light">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <div class="pcoded-main-container" style="margin-top: 0px;">
                <div class="pcoded-wrapper">

                    <!-- [ navigation menu ] start -->
                    <nav class="pcoded-navbar is-hover" navbar-theme="themelight1" active-item-theme="theme1" sub-item-theme="theme2" active-item-style="style1" pcoded-navbar-position="absolute">
                        <a href="{{ asset('admin') }}">
                        <img src="{{ asset('/public/vendor/assets/images/logoden.png') }} " alt="" style="    position: absolute;top: 8px;left: 22px;z-index: 10000;width: 189px;"></a>
                        <div class="pcoded-inner-navbar" style="background: #42a5f5; display: flex; justify-content: flex-end; align-items: center">
                        	<div class="right-top-bar-salse">
								<div class="field">
						          <label style="color: white; font-weight: bold;">Kho Hàng: </label>
						          	<select class="ui dropdown" id="storeID">
									  <option value="1">Kho Mặc Định</option>
									  <option value="2">Kho Hàng 2</option>
									</select>
								</div>
								<div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <span style="font-weight: bolder;">Xin Chào : {{ Auth::user()->name }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                            <i class="feather icon-arrow-left"></i>Trở Về Trang Chủ
                                        </a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('logout') }}">
                                            <i class="feather icon-log-out"></i>Đăng Xuất
                                        </a>
                                        </li>
                                    </ul>
                                </div>
							</div>
                        </div>
                    </nav>
                    <!-- [ navigation menu ] end -->
                    <div class="pcoded-content salse">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <!-- [ page content ] start -->
                                        	@yield('main')
                                        <!-- [ page content ] end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ style Customizer ] start -->
                    <div id="styleSelector">
                    </div>
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
        </div>
    </div>

    {{-- loading bar --}}
    <div id="nprogress"><div class="bar" role="bar" style="transform: translate3d(-0.6%, 0px, 0px); transition: all 200ms ease 0s;"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div></div>

    {{-- end bar --}}

	<!-- script -->
    @include('template.partials.script')
    <!-- end script -->
    <script>
	jQuery(document).ready(function($) {
	    var engine = new Bloodhound({
	        remote: {
	            url: '{{ asset('admin/sales/search') }}?q=%QUERY%',
	            wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });

	    $("#search-pro-box").typeahead({
	        hint: true,
	        highlight: false,
	        minLength: 1
	    }, {
	        source: engine.ttAdapter(),
	        name: 'usersList',
	        display: function(data) {
	            return data.name;
	        },
	        templates: {
	            empty: [
	                '<div class="list-group search-results-dropdown"><div class="list-group-item" style="padding: 10px;">Không có kết quả phù hợp.</div></div>'
	            ],
	            header: [
	                '<div class="list-group search-results-dropdown">'
	            ],
	            suggestion: function (data) {
	                return '<div class="list-group-item"><div class="img-thumbnail"><img src="{{ asset('public/uploads/imagesProduct') }}/'+data.img+'"></div><div class="search-product-content"><div class="search-product-content-name"><span>'+data.name+'</span></div><div class="search-product-content-sku">'+data.code+'</div></div><div class="search-product-price " style=""><div class="search-product-content-name">'+data.price+'</div><div class="search-product-content-sku">Có thể bán: <span style="font-weight:bold;">'+data.quantity+'</span> </div></div></div>';
	            }
	        }
	    }).on("typeahead:selected", function(obj, data, name) {
			pos_add_product(data.id);
			$('#search-pro-box').typeahead('val','');
		});
    });
</script>
 <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 6,
      spaceBetween: 10,
      slidesPerGroup: 1,
      
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
 <script>
     $(function() {
         NProgress.start();
        setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
     });    
 </script>
</body>
</html>