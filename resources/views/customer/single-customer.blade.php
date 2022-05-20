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
                             {{ $customer->name != ' ' ? $customer->name : '----'}}
                           </h3>
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
                                            <td> {{ $customer->name != ' ' ? $customer->name : '----'}}</td>
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
                                            @php
                                                   $full_name = $billing_info->first_name.$billing_info->last_name;
                                            @endphp
                                            <td>
                                            {{ $full_name != '' ? $full_name : '----'}}
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Phone</th>
                                            <td>{{ $billing_info->phone !=''?$billing_info->phone:'----' }}</td>
                                        </tr>
                                     <tr>
                                            <th>City</th>
                                            <td>{{ $billing_info->city !=''?$billing_info->city:'----' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $billing_info->address_1 !=''?$billing_info->address_1:'----' }}</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Company</th>
                                            <td>{{ $billing_info->company !=''?$billing_info->company:'----' }}
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Post Code</th>
                                            <td>{{ $billing_info->postcode !=''?$billing_info->postcode:'----' }}</td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td>{{ $billing_info->state !=''?$billing_info->state:'----' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{ $billing_info->country !=''?$billing_info->country:'----' }}</td>
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
                                            @php
                                                   $name = $shipping_info->first_name.$shipping_info->last_name;
                                            @endphp
                                            <td>{{ $name != '' ? $name : '----'}}
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Phone</th>
                                            <td>{{ $billing_info->phone !=''?$billing_info->phone:'----' }}</td>
                                        </tr>
                                     <tr>
                                            <th>City</th>
                                            <td>{{ $billing_info->city !=''?$billing_info->city:'----' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $billing_info->address_1 !=''?$billing_info->address_1:'----' }}</td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Company</th>
                                            <td>{{ $billing_info->company !=''?$billing_info->company:'----' }}
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Post Code</th>
                                            <td>{{ $billing_info->postcode !=''?$billing_info->postcode:'----' }}</td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td>{{ $billing_info->state !=''?$billing_info->state:'----' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{ $billing_info->country !=''?$billing_info->country:'----' }}</td>
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