@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{asset('public/assets/autocomplete/typeahed.css') }}">
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
                                            <input type="search" id="batch" name="" placeholder="Products..">
                                        </div>
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div style="padding: 20px;">
                    <p id="order_status">Status: </p>
                    <button class="btn btn-primay" style="background: #198754;color: #fff;" id="import_product">Import Order</button>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-table table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Shop</th>
                                            <th>Customer</th>
                                            <th>Products</th>
                                            <th>Status</th>
                                            <th>Order time</th>
                                            <th>Order at</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->shop->shop_name }}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ Str::limit($order->product_name, 20) }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->date_created ? $order->date_created : '--' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->order_created_at)->diffForHumans() }}
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="{{ url('/orders/' . $order->order_id) }}">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <form action="">

                                <div class="form-group">
                                    <label for="county">County</label>
                                    <input type="text" id="name" name="county">
                                </div>
                                <div class="form-group">
                                    <label for="sub_county">sub County</label>
                                    <input type="text" name="sub_county" id="user_id">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')


{{--autocompete--}}
<script src="{{asset('public/assets/autocomplete/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('public/assets/autocomplete/babylontypeahed.js')}}"></script>
<script src="{{asset('public/assets/autocomplete/custom.js')}}"></script>

<script>
    //callback function to fetch data using api from database

   

    let import_product = document.getElementById('import_product')
    let status = document.getElementById('order_status')
    import_product.addEventListener('click', importOrder)


    async function importOrder() { 

        status.innerHTML = 'Product Importing, Pleas Wait';

        let data = await fetch(`http://localhost:8080/logistable/api/orders/1/import`)
            .then(response => response.json())
            .then(json => {

                 return json;
            })

            status.innerHTML = 'Product Imported Successfully';    

            console.log(data)
    }


</script>


@endsection