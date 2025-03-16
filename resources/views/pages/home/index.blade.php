@extends('layouts.app')

@section('content')
<div>
    <!-- Info box -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0">3564</h3>
                            <h5 class="text-muted m-b-0">New Customers</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0">342</h3>
                            <h5 class="text-muted m-b-0">New Products</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0">56%</h3>
                            <h5 class="text-muted m-b-0">Today's Profit</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-success"><i class="ti-settings"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0">56%</h3>
                            <h5 class="text-muted m-b-0">New Leads</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->

    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title ">Leads by Source</h5>
                    <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
                    <ul class="list-inline m-t-30 text-center">
                        <li class="p-r-20">
                            <h5 class="text-muted"><i class="fa fa-circle" style="color: #fb9678;"></i> Ads</h5>
                            <h4 class="m-b-0">8500</h4>
                        </li>
                        <li class="p-r-20">
                            <h5 class="text-muted"><i class="fa fa-circle" style="color: #01c0c8;"></i> Tredshow</h5>
                            <h4 class="m-b-0">3630</h4>
                        </li>
                        <li>
                            <h5 class="text-muted"> <i class="fa fa-circle" style="color: #4F5467;"></i> Web</h5>
                            <h4 class="m-b-0">4870</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top Products sales</h5>
                    <ul class="list-inline text-center">
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>iMac</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>iPhone</h5>
                        </li>
                    </ul>
                    <div id="morris-area-chart2" style="height: 370px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><small class="pull-right text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small> Total Leads</h5>
                    <div class="stats-row">
                        <div class="stat-item">
                            <h6>Overall Growth</h6>
                            <b>80.40%</b>
                        </div>
                        <div class="stat-item">
                            <h6>Montly</h6>
                            <b>15.40%</b>
                        </div>
                        <div class="stat-item">
                            <h6>Day</h6>
                            <b>5.50%</b>
                        </div>
                    </div>
                </div>
                <div id="sparkline8" class="minus-mar"></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><small class="pull-right text-danger"><i class="fa fa-sort-desc"></i> 18% High then last month</small> Total Vendor</h5>
                    <div class="stats-row">
                        <div class="stat-item">
                            <h6>Overall Growth</h6>
                            <b>80.40%</b>
                        </div>
                        <div class="stat-item">
                            <h6>Montly</h6>
                            <b>15.40%</b>
                        </div>
                        <div class="stat-item">
                            <h6>Day</h6>
                            <b>5.50%</b>
                        </div>
                    </div>
                </div>
                <div id="sparkline9" class="minus-mar"></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><small class="pull-right text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small> Invoice</h5>
                    <div class="stats-row">
                        <div class="stat-item">
                            <h6>Overall Growth</h6>
                            <b>80.40%</b>
                        </div>
                        <div class="stat-item">
                            <h6>Montly</h6>
                            <b>15.40%</b>
                        </div>
                        <div class="stat-item">
                            <h6>Day</h6>
                            <b>5.50%</b>
                        </div>
                    </div>
                </div>
                <div id="sparkline10" class="minus-mar"></div>
            </div>
        </div>
    </div>

    <!-- /row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">New Customers List</h5>
                    <p class="text-muted">this is the sample data here for crm</p>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Deshmukh</td>
                                    <td>Prohaska</td>
                                    <td>@Genelia</td>
                                    <td><span class="label label-danger">admin</span> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Deshmukh</td>
                                    <td>Gaylord</td>
                                    <td>@Ritesh</td>
                                    <td><span class="label label-info">member</span> </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sanghani</td>
                                    <td>Gusikowski</td>
                                    <td>@Govinda</td>
                                    <td><span class="label label-warning">developer</span> </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Roshan</td>
                                    <td>Rogahn</td>
                                    <td>@Hritik</td>
                                    <td><span class="label label-success">supporter</span> </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Joshi</td>
                                    <td>Hickle</td>
                                    <td>@Maruti</td>
                                    <td><span class="label label-info">member</span> </td>
                                </tr>
                                <tr>
                                    <td class="pb-0">6</td>
                                    <td class="pb-0">Nigam</td>
                                    <td class="pb-0">Eichmann</td>
                                    <td class="pb-0">@Sonu</td>
                                    <td class="pb-0"><span class="label label-success">supporter</span> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">New Product List</h5>
                    <p class="text-muted">this is the sample data here for crm</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Products</th>
                                    <th>Popularity</th>
                                    <th>Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Milk Powder</td>
                                    <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#13dafe"], "stroke":["#13dafe"]}' data-height="40">0,-3,-2,-4,-5,-4,-3,-2,-5,-1</span> </td>
                                    <td><span class="text-danger text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> 28.76%</span> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Air Conditioner</td>
                                    <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#13dafe"], "stroke":["#13dafe"]}' data-height="40">0,-1,-1,-2,-3,-1,-2,-3,-1,-2</span> </td>
                                    <td><span class="text-warning text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> 8.55%</span> </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>RC Cars</td>
                                    <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#13dafe"], "stroke":["#13dafe"]}' data-height="40">0,3,6,1,2,4,6,3,2,1</span> </td>
                                    <td><span class="text-success text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 58.56%</span> </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Down Coat</td>
                                    <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#13dafe"], "stroke":["#13dafe"]}' data-height="40">0,3,6,4,5,4,7,3,4,2</span> </td>
                                    <td><span class="text-info text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 35.76%</span> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection