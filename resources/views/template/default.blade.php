<!DOCTYPE html>
<html lang="vi">
    <!-- head -->
    @include('template.partials.head')
    <!-- end head -->
<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            @include('template.partials.navheader')
            <!-- [ chat user list ] start -->
             @include('template.partials.chatuserlist')
            <!-- [ chat user list ] end -->

            <!-- [ chat message ] start -->
             @include('template.partials.chatmessage')
            <!-- [ chat message ] end -->

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                        @include('template.partials.navmenu')
                    <!-- [ navigation menu ] end -->
                    <div class="pcoded-content">
                        @yield("main")
                    </div>
                </div>
                <!-- [ style Customizer ] start -->
                <div id="styleSelector">
                </div>
                <!-- [ style Customizer ] end -->
            </div>
        </div>
    </div>
    <!-- script -->
    @include('template.partials.script')
    <!-- end script -->



    <!-- [ chat message ] start -->
        @include('template.partials.modal')
    <!-- [ chat message ] end -->


    @if (Request::segment(2)=='posimport')
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
                            return '<div class="list-group-item"><div class="img-thumbnail"><img src="{{ asset('public/uploads/imagesProduct') }}/'+data.img+'"></div><div class="search-product-content"><div class="search-product-content-name"><span>'+data.name+'</span></div><div class="search-product-content-sku">'+data.code+'</div></div><div class="search-product-price " style=""><div class="search-product-content-name">'+data.price+'</div><div class="search-product-content-sku">Tồn kho: <span style="font-weight:bold;">'+data.quantity+'</span> </div></div></div>';
                        }
                    }
                }).on("typeahead:selected", function(obj, data, name) {
                    pos_add_product(data.id);
                    $('#search-pro-box').typeahead('val','');
                });
            });
            </script>
    @endif

   
</body>
</html>
