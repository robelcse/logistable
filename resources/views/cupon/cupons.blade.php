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
                                            <input type="search" id="batch" name="" placeholder="Phone..">
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
                            <div class="product-table table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Shop</th>
                                            <th>Code</th>
                                            <th>Cupon Amount</th>
                                            <th>Discount Type</th>
                                            <th>Description</th> 
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($coupons as $coupon)
                                            <tr>
                                                <td>{{ $coupon->shop ? $coupon->shop->shop_name : '' }}</td>
                                                <td>{{ $coupon->code }}</td>
                                                <td>{{ $coupon->amount }}</td>
                                                <td>{{ $coupon->discount_type }}</td>
                                                <td>{{ $coupon->description }}</td> 
                                                <td style="text-align: center;">
                                                    <a href="{{ url('/cupons/'.$coupon->coupon_id )}}">
                                                        <i class="fa fa-info-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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