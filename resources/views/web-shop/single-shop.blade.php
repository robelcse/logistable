@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="user_all d-flex justify-content-between align-items-center">
                                    <h6 style="font-size: 20px; line-height: 32px; font-weight: 600;">Shop Details</h6>
                                    <a href="{{ url('/config/integrations/connect') }}" class="btn btn-success">Add
                                        Shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="customer-table table-responsive">
                                    <table class="table text_center table-striped">
                                        <tr>
                                            <th>Shop Name</th>
                                            <td>{{ $shop->shop_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shop URL</th>
                                            <td>{{ $shop->shop_url }}</td>
                                        </tr>
                                        <tr>
                                            <th>Consumer Secret</th>
                                            <td>{{ $shop->consumer_secret }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="customer-table table-responsive">
                                    <table class="table text_center table-striped">
                                        <tr>
                                            <th>Shop Type</th>
                                            <td>{{ $shop->shop_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Consumer Key</th>
                                            <td>{{ $shop->consumer_key }}</td>
                                        </tr>
                                        <tr>
                                            <th>Validate SSL</th>
                                            <td>{{ $shop->validate_ssl ? 'Yes' : 'No' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 style="font-size: 20px; line-height: 20px; font-weight: 600;">Imports</h6>
                                <p class="small-text"> This import button is temporary! Please do not relode or change the page, Until import is not done!</p>
                                <div class="user_all d-flex justify-content-between align-items-center">
                                    <a href="{{ url('/customers/'.$shop->shop_id.'/import') }}" class="btn btn-success">Customers</a>
                                    <a href="{{ url('/products/'.$shop->shop_id.'/import') }}" class="btn btn-success">Products</a>
                                    <a href="{{ url('/orders/'.$shop->shop_id.'/import') }}" class="btn btn-success">Orders</a>
                                    <a href="{{ url('/cupons/'.$shop->shop_id.'/import') }}" class="btn btn-success">Cupons</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
