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
                                <h6 style="font-size: 20px; line-height: 32px; font-weight: 600;">Customer Details</h6>
                                <a href="{{ url('/customers') }}" class="btn btn-success">All Customers</a>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-12">
                       <div class="customer_sinlge_view_title text-center">
                       <img class="img-90 rounded-circle" src="https://secure.gravatar.com/avatar/f7a81b731d881836570f6a452591e637?s=96&d=mm&r=g" alt="Avatar">
                           <h3 class="mt-2" style="font-size: 20px; line-height: 32px; font-weight: 600;">
                           {{$customer->username}}</h3>
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
                                            <th>Name</th>
                                            <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$customer->email}}</td>
                                        </tr>  
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="my-4" style="font-size: 15px; color: #24695c; line-height: 21px; font-weight: 600;">#Billing Information</p>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$customer->billing->first_name ? $customer->billing->first_name : '--'}}
                                             {{$customer->billing->last_name ? $customer->billing->last_name : '--'}}
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Phone</th>
                                            <td>{{$customer->billing->phone ? $customer->billing->phone : '--'}}</td>
                                        </tr>
                                     <tr>
                                            <th>City</th>
                                            <td>{{$customer->billing->city ? $customer->billing->city : '--'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{$customer->billing->address_1 ? $customer->billing->address_1 : '--'}}</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Company</th>
                                            <td>{{ $customer->billing->company ? $customer->billing->company : '--' }}
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Post Code</th>
                                            <td>{{$customer->billing->postcode ? $customer->billing->postcode : '--'}}</td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td>{{$customer->billing->state ? $customer->billing->state : '--'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{$customer->billing->country ? $customer->billing->country : '--'}}</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="my-4" style="font-size: 15px; color:#601761; line-height: 21px; font-weight: 600;">#Shipping Information</p>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$customer->shipping->first_name ? $customer->shipping->first_name : '--'}}
                                             {{$customer->shipping->last_name ? $customer->shipping->last_name : '--'}}
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Phone</th>
                                            <td>{{$customer->shipping->phone ? $customer->shipping->phone : '--'}}</td>
                                        </tr>
                                     <tr>
                                            <th>City</th>
                                            <td>{{$customer->shipping->city ? $customer->shipping->city : '--'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{$customer->shipping->address_1 ? $customer->shipping->address_1 : '--'}}</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Company</th>
                                            <td>{{$customer->shipping->company ? $customer->shipping->company : '--'}}
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Post Code</th>
                                            <td>{{$customer->shipping->postcode ? $customer->shipping->postcode : '--'}}</td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td>{{$customer->shipping->state ? $customer->shipping->state : '--'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{$customer->shipping->country ? $customer->shipping->country : '--'}}</td>
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