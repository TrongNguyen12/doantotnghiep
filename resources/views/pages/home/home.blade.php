@extends('template.default')
@section('title', 'Home')
@section('main')
	<div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Home</h5>
                        <span>Phần mềm quản lý bán hàng POSSALES</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard CRM</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
		<div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- [ page content ] start -->
                    <div class="row">
                    	<div class="col-xl-3 col-md-6">
	                        <div class="card prod-p-card card-red">
	                            <div class="card-body">
	                                <div class="row align-items-center m-b-30">
	                                    <div class="col">
	                                        <h6 class="m-b-5 text-white">Tổng Tiền Bán Hàng</h6>
	                                        <h3 class="m-b-0 f-w-700 text-white">$1,783</h3>
	                                    </div>
	                                    <div class="col-auto">
	                                        <i class="fas fa-money-bill-alt text-c-red f-18"></i>
	                                    </div>
	                                </div>
	                                <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Orders</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">15,830</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-database text-c-blue f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-green">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Average Price</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">$6,780</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign text-c-green f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
	                        <div class="card prod-p-card card-yellow">
	                            <div class="card-body">
	                                <div class="row align-items-center m-b-30">
	                                    <div class="col">
	                                        <h6 class="m-b-5 text-white">Product Sold</h6>
	                                        <h3 class="m-b-0 f-w-700 text-white">6,784</h3>
	                                    </div>
	                                    <div class="col-auto">
	                                        <i class="fas fa-tags text-c-yellow f-18"></i>
	                                    </div>
	                                </div>
	                                <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xl-12">
                            <div class="card proj-progress-card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Published Project</h6>
                                            <h5 class="m-b-30 f-w-700">532<span class="text-c-green m-l-10">+1.69%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-red" style="width:25%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Completed Task</h6>
                                            <h5 class="m-b-30 f-w-700">4,569<span class="text-c-red m-l-10">-0.5%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-blue" style="width:65%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Successfull Task</h6>
                                            <h5 class="m-b-30 f-w-700">89%<span class="text-c-green m-l-10">+0.99%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-green" style="width:85%"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Ongoing Project</h6>
                                            <h5 class="m-b-30 f-w-700">365<span class="text-c-green m-l-10">+0.35%</span></h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-yellow" style="width:45%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card product-progress-card">
                                <div class="card-block">
                                    <div class="row pp-main">
                                        <div class="col-xl-3 col-md-6">
                                            <div class="pp-cont">
                                                <div class="row align-items-center m-b-20">
                                                    <div class="col-auto">
                                                        <i class="fas fa-cube f-24 text-mute"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h2 class="m-b-0 text-c-blue">2476</h2>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center m-b-15">
                                                    <div class="col-auto">
                                                        <p class="m-b-0">Total Product</p>
                                                    </div>
                                                    <div class="col text-right">
                                                        <p class="m-b-0 text-c-blue"><i class="fas fa-long-arrow-alt-up m-r-10"></i>64%</p>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-c-blue" style="width:45%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="pp-cont">
                                                <div class="row align-items-center m-b-20">
                                                    <div class="col-auto">
                                                        <i class="fas fa-tag f-24 text-mute"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h2 class="m-b-0 text-c-red">843</h2>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center m-b-15">
                                                    <div class="col-auto">
                                                        <p class="m-b-0">New Orders</p>
                                                    </div>
                                                    <div class="col text-right">
                                                        <p class="m-b-0 text-c-red"><i class="fas fa-long-arrow-alt-down m-r-10"></i>34%</p>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-c-red" style="width:75%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="pp-cont">
                                                <div class="row align-items-center m-b-20">
                                                    <div class="col-auto">
                                                        <i class="fas fa-random f-24 text-mute"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h2 class="m-b-0 text-c-yellow">63%</h2>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center m-b-15">
                                                    <div class="col-auto">
                                                        <p class="m-b-0">Conversion Rate</p>
                                                    </div>
                                                    <div class="col text-right">
                                                        <p class="m-b-0 text-c-yellow"><i class="fas fa-long-arrow-alt-up m-r-10"></i>64%</p>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-c-yellow" style="width:65%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="pp-cont">
                                                <div class="row align-items-center m-b-20">
                                                    <div class="col-auto">
                                                        <i class="fas fa-dollar-sign f-24 text-mute"></i>
                                                    </div>
                                                    <div class="col text-right">
                                                        <h2 class="m-b-0 text-c-green">41M</h2>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center m-b-15">
                                                    <div class="col-auto">
                                                        <p class="m-b-0">Conversion Rate</p>
                                                    </div>
                                                    <div class="col text-right">
                                                        <p class="m-b-0 text-c-green"><i class="fas fa-long-arrow-alt-up m-r-10"></i>54%</p>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-c-green" style="width:35%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card sos-st-card facebook">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="m-b-0"><i class="fab fa-facebook-f"></i> 3.56k</h3>
                                        </div>
                                        <div class="col-auto">
                                            <h5 class="m-b-0">Likes</h5>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-arrow-up text-c-green"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card sos-st-card twitter">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="m-b-0"><i class="fab fa-twitter"></i> 3k</h3>
                                        </div>
                                        <div class="col-auto">
                                            <h5 class="m-b-0">Followers</h5>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-arrow-up text-c-green"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card sos-st-card linkedin">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="m-b-0"><i class="fab fa-linkedin-in"></i> 2k</h3>
                                        </div>
                                        <div class="col-auto">
                                            <h5 class="m-b-0">Connections</h5>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-arrow-down text-c-red"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection