@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="customer-table-search product_table_search">
                            <form>
                                <div class="d-flex flex-wrap justify-content-end align-items-center">
                                <div class="pro_name">
                                    <input type="search" name="" placeholder="Name..">
                                </div>
                                <div class="autocomplete">
                                    <input type="search" id="batch" name="" placeholder="Email..">
                                </div>
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="customer-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Shop</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Shop</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$customer->shop->shop_name}}</td>
                                            <td><a href="{{ url('/customers/'.$customer->id) }}">
                                            {{$customer->first_name ? $customer->first_name : '--'}}
                                            {{$customer->last_name ? $customer->last_name : '--'}}
                                            </a></td>
                                            <td>{{$customer->email}}</td>
                                            <td>{{ $customer->phone ? $customer->phone: '--' }}</td>
                                            <td>{{ $customer->shop->shop_name }}</td>
                                            <td>{{ $customer->city ? $customer->city: '--' }}</td>
                                            <td>{{ $customer->country ? $customer->country: '--' }}</td>
                                            <td valign="middle" style="text-align: center;"><a href="{{ url('/customers/'.$customer->customer_id) }}">
                                                <i class="fa fa-info-circle"></i>
                                            </a></td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-4">
                        <div class="col-xl-2 text-right">
                        {{ $customers->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection