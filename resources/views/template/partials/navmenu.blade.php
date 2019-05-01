                <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <ul class="pcoded-item pcoded-left-item">
                                    <li>
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-home"></i>
                                            </span>
                                            <span class="pcoded-mtext">Tổng quan</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ asset('admin/sales') }}" class="waves-effect waves-dark">
                                             <span class="pcoded-micon">
                                                 <i class="feather icon-shopping-cart"></i>
                                             </span>
                                            <span class="pcoded-mtext">Bán hàng</span>
                                        </a>
                                    </li>
                                    <li class="pcoded-hasmenu @if (Request::segment(2)=='order')pcoded-trigger active @endif">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                            <span class="pcoded-mtext">Đơn hàng</span>
                                            <span class="pcoded-badge label label-warning">Mới</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Tạo đơn online</span>
                                                </a>
                                            </li>
                                            <li class="@if (Request::segment(2)=='order') active @endif ">
                                                <a href="{{ asset('admin/order') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Danh sách đơn hàng</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Quản lý giao hàng</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Khách Trả Hàng</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu @if (Request::segment(2)=='customers' || Request::segment(2)=='suppliers')  pcoded-trigger active @endif ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-users"></i>
                                            </span>
                                            <span class="pcoded-mtext">Khách hàng & Đối tác</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="@if (Request::segment(2)=='customers') active @endif">
                                                <a href="{{ asset('/admin/customers') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Khách hàng</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Nhóm khách hàng</span>
                                                </a>
                                            </li>
                                            <li class="@if (Request::segment(2)=='suppliers') active @endif">
                                                <a href="{{ asset('/admin/suppliers') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Nhà cung cấp</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Đối tác vận chuyển</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                   <li class="pcoded-hasmenu @if (Request::segment(2)=='category' || Request::segment(2)=='product' || Request::segment(2)=='posimport' )  pcoded-trigger active @endif ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-box"></i>
                                            </span>
                                            <span class="pcoded-mtext">Sản phẩm</span>
                                        </a>
                                        <ul class="pcoded-submenu" >
                                            <li class=" @if (Request::segment(2)=='category') active @endif">
                                                <a href="{{ asset('admin/category') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Danh mục sản phẩm</span>
                                                </a>
                                            </li>
                                            <li class="@if (Request::segment(2)=='product') active @endif">
                                                <a href="{{ asset('admin/product') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Danh sách sản phẩm</span>
                                                </a>
                                            </li>
                                            <li class="@if (Request::segment(2)=='posimport' && Request::segment(3)==null) active @endif">
                                                <a href="{{ asset('admin/posimport') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Nhập hàng</span>
                                                </a>
                                            </li>
                                            <li class="{{ Request::segment(3)=='view' ? 'active' : null }}">
                                                <a href="{{ asset('admin/posimport/view') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Thông kê phiếu nhập</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Trả hàng nhà cung cấp</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-clipboard"></i>
                                            </span>
                                            <span class="pcoded-mtext">Sổ quỹ</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Tổng quan</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Phiếu thu</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Loại phiếu thu</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Phiếu chi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Loại phiếu chi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Sổ quỹ</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-file-text"></i>
                                            </span>
                                            <span class="pcoded-mtext">Báo cáo</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Báo cáo bán hàng</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Báo cáo kho</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Báo cáo tài chính</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon">
                                        <i class="feather icon-command"></i>
                                      </span>
                                      <span class="pcoded-mtext">Khuyến mại</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Tạo mã giảm giá</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Tạo chương trình giảm giá</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="pcoded-navigation-label">Nhân viên & Cấu hình</div>
                                <ul class="pcoded-item pcoded-left-item" >
                                    <li class="pcoded-hasmenu  @if (Request::segment(2)=='employees')  pcoded-trigger active @endif">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                              <span class="pcoded-micon">
                                                <i class="feather icon-user"></i>
                                              </span>
                                            <span class="pcoded-mtext">Nhân viên</span>
                                        </a>
                                        <ul class="pcoded-submenu" >
                                            <li class="@if (Request::segment(2)=='employees') active @endif">
                                                <a href="{{ asset('admin/employees') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Danh sách nhân viên</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="breadcrumb.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Quản lý tài khoản</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Reset mật khẩu</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon">
                                        <i class="feather icon-settings"></i>
                                      </span>
                                      <span class="pcoded-mtext">Cấu hình bán hàng</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Quy trình xử lý đơn hàng</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Cấu hình lý do hủy trả</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Cấu hình giao hàng</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Cấu hình thanh toán</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Gói dịch vụ khác</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon">
                                        <i class="feather icon-settings"></i>
                                      </span>
                                      <span class="pcoded-mtext">Cấu hình website</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Cấu hình nội dung</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="button.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Cấu hình giao diện</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon">
                                        <i class="feather icon-message-square"></i>
                                      </span>
                                      <span class="pcoded-mtext">Góp ý</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    {{-- class hieu ung chuyen dong : rotate-refresh --}}