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
                                            <input type="search" name="" placeholder="Product..">
                                        </div>
                                        <div class="autocomplete">
                                            <input type="search" id="batch" name="" placeholder="Product status..">
                                        </div>
                                        <div class="autocomplete">
                                            <input type="search" name="" id="shop" placeholder="Shop..">
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
                                            <th class="text-left">Product</th>
                                            <th width="30%">Name</th>
                                            <th>Shop</th>
                                            <th>Product details</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($products as $product)
                                        <tr>
                                            <td><a href="{{url('products',$product->product_id)}}"><img src="{{$product->picture}}"><br>{{ $product->sku }}</a></td>
                                            <td valign="middle"><a href="{{url('products',$product->product_id)}}">{{ $product->name}}</a></td>
                                            <td valign="middle">{{ $product->shop->shop_name }}</td>
                                            <td valign="middle">{{ $product->status}}</td>
                                            <td valign="middle">€ {{ $product->price}}</td>
                                            <td valign="middle">{{ $product->quantity }}</td>
                                            <td valign="middle" style="text-align: center;"><a href="{{ url('/products/'.$product->product_id) }}">
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
                            {{ $products->links("pagination::bootstrap-4") }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $("#importProduct").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/products/5/import",

                success: function(result) {
                    alert('products imported successfully');
                },

                error: function(result) {
                    alert('product not inserted!');
                }
            });
        });

    });
</script>

<script src="{{ asset('public/assets/js/autocomplete.js') }}"></script>
@endsection