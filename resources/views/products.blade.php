@extends('layout.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row justify-content-end">
                        <div class="col-lg-2">

                            <div class="customer-table-search">
                                <form class="float-right">
                                    <input type="search" name="" placeholder="Search......" style="padding-left: 7px;">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="display: inline-block">
                        <button id="importProduct" style="padding: 10px; margin:10px;border:none;background: #000;color:#fff">Import Products</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-table table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product code</th>
                                            <th>Name</th>
                                            <th>Shop</th>
                                            <th>Product details</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td><a href="{{url('products',$product->product_id)}}"><img src="{{$product->picture}}"><br>{{ $product->sku }}</a></td>
                                            <td><a href="{{url('products',$product->product_id)}}">{{ $product->name}}</a></td>
                                            <td>{{ $product->shop->shop_name }}</td>
                                            <td>{{ $product->status}}</td>
                                            <td>€ {{ $product->price}}</td>
                                            <td>{{ $product->quantity }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>

                        </div>
                       
                    </div>
                    {{ $products->links('parts.pagination') }}
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
@endsection