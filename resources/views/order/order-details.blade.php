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
                                <h6 style="font-size: 20px; line-height: 32px; font-weight: 600;">Order Details</h6>
                                <a href="{{ url('/orders') }}" class="btn btn-success">All Orders</a>
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
                                            <th>Order Status</th>
                                            <td>On Hold</td>
                                        </tr>
                                        <tr>
                                            <th>Order Created</th>
                                            <td>3 week's ago</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td>0.00</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Currency</th>
                                            <td>{{ $order_datails->currency ? $order_datails->currency : '--'}}</td>
                                        </tr>  
                                        <tr>
                                            <th>Total Discount</th>
                                            <td>{{ $order_datails->discount_total ? $order_datails->discount_total : '--'}}</td>
                                        </tr>  
                                        <tr>
                                            <th>Total Price</th>
                                            <td style="font-weight: 600;">{{ $order_datails->total ? $order_datails->total : '--'}}</td>
                                        </tr>  
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="my-4" style="font-size: 15px; color: #24695c; line-height: 21px; font-weight: 600;">#Order Billing Information</p>
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
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="my-4" style="font-size: 15px; color:#601761; line-height: 21px; font-weight: 600;">#Order Shipping Information</p>
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
                        <div class="col-12">
                            <p class="my-4" style="font-size: 15px; color:#601761; line-height: 21px; font-weight: 600;">#Order Payment Information</p>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                <tr>
                                            <th>Payment Method</th>
                                            <td>b-Kash</td>
                                        </tr>
                                     <tr>
                                            <th>Transaction ID</th>
                                            <td>345676543456</td>
                                        </tr>
                                     <tr>
                                            <th>Email</th>
                                            <td>mdalihasanpk@gmail.com</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                <tr>
                                            <th>Customer Note</th>
                                            <td>Hello test Note!</td>
                                        </tr>
                                     <tr>
                                            <th>Complited Date</th>
                                            <td>12/11/2021</td>
                                        </tr>
                                     <tr>
                                            <th>Email</th>
                                            <td>mdalihasanpk@gmail.com</td>
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