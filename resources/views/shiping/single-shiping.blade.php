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
                                <h6 style="font-size: 20px; line-height: 32px; font-weight: 600;">Shipings Details</h6>
                                <a href="{{ url('/shipings') }}" class="btn btn-success">All Shipings</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-12">
                            <p class="my-4" style="font-size: 15px; color:#601761; line-height: 21px; font-weight: 600;">Shipping Information</p>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                <tr>
                                            <th>Name</th>
                                            <td>Hasan Ali</td>
                                        </tr>
                                     <tr>
                                            <th>Address</th>
                                            <td>Kahaloo, Bogura</td>
                                        </tr>
                                     <tr>
                                            <th>Email</th>
                                            <td>mdalihasanpk@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <th>Shiping Line</th>
                                            <td>Sundorban Curier Services</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                <tr>
                                            <th>Company</th>
                                            <td>Product for Sell</td>
                                        </tr>
                                     <tr>
                                            <th>Post Code</th>
                                            <td>5870</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>1234567890</td>
                                        </tr>
                                        <tr>
                                            <th>Shiping Cost</th>
                                            <td style="font-weight: 600;">100.00</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection