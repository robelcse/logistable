@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    
  <div class="col-xl-3 col-sm-6 box-col-3 chart_data_right">
      <div class="card income-card card-secondary">
        <div class="card-body align-items-center">
          <div class="round-progress knob-block text-center">
            <i class="fa fa-shopping-cart text-success" style="font-size: 60px;"></i>
            <h5 style="font-weight: 700; margin-top: 15px;">Total Shop: <span class="text-success" style="font-weight: 700;">{{ $total_shop ? $total_shop: 0 }}</span></h5>
            <p style="font-weight:400; color: #0d0d0d; font-size: 12px;"><a href="{{ route('webShops') }}">View all Shops</a></p>
          </div>
        </div>
      </div>
    </div>
    
  <div class="col-xl-3 col-sm-6 box-col-3 chart_data_right">
      <div class="card income-card card-secondary">
        <div class="card-body align-items-center">
          <div class="round-progress knob-block text-center">
            <i class="fa fa-cubes text-success" style="font-size: 60px;"></i>
            <h5 style="font-weight: 700; margin-top: 15px;">Total Products: <span class="text-success" style="font-weight: 700;">{{ $total_product ? $total_product: 0}}</span></h5>
            <p style="font-weight:400; color: #0d0d0d; font-size: 12px;"><a href="{{ route('products') }}">View all Products</a></p>
          </div>
        </div>
      </div>
    </div>
    
  <div class="col-xl-3 col-sm-6 box-col-3 chart_data_right">
      <div class="card income-card card-secondary">
        <div class="card-body align-items-center">
          <div class="round-progress knob-block text-center">
            <i class="fa fa-shopping-bag text-success" style="font-size: 60px;"></i>
            <h5 style="font-weight: 700; margin-top: 15px;">Total Order: <span class="text-success" style="font-weight: 700;">{{ $total_order ? $total_order : 0}}</span></h5>
            <p style="font-weight:400; color: #0d0d0d; font-size: 12px;"><a href="{{ route('orders') }}">View all Orders</a></p>
          </div>
        </div>
      </div>
    </div>
    
  <div class="col-xl-3 col-sm-6 box-col-3 chart_data_right">
      <div class="card income-card card-secondary">
        <div class="card-body align-items-center">
          <div class="round-progress knob-block text-center">
            <i class="fa fa-users text-success" style="font-size: 60px;"></i>
            <h5 style="font-weight: 700; margin-top: 15px;">Total Customer: <span class="text-success" style="font-weight: 700;"> {{ $total_customer ? $total_customer : 0}} </span></h5>
            <p style="font-weight:400; color: #0d0d0d; font-size: 12px;">View all Customers</p>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-xl-4 col-50 box-col-6 des-xl-50">
          <div class="card">
            <div class="card-header">
              <div class="header-top d-sm-flex align-items-center">
                <h5>Sales Overview</h5>
                <div class="center-content">
                  <p class="d-flex align-items-center"><i class="toprightarrow-primary fa fa-arrow-up me-2"></i>80% Growth</p>
                </div>
                <div class="setting-list">
                  <ul class="list-unstyled setting-option">
                    <li>
                      <div class="setting-primary"><i class="icon-settings">                                      </i></div>
                    </li>
                    <li><i class="view-html fa fa-code font-primary"></i></li>
                    <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                    <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                    <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                    <li><i class="icofont icofont-error close-card font-primary"></i></li>
                  </ul>
                </div>
              </div>
            </div>
          <div class="card-body p-0">
            <div id="chart-dashbord"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 recent-order-sec">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5>Recent Orders</h5>
               @if($recent_orders->count() != 0)

               <table class="table table-bordernone">                                         
                <thead>
                  <tr>                                        
                    <th>Name</th>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>
                      <div class="setting-list">
                        <ul class="list-unstyled setting-option">
                          <li>
                            <div class="setting-primary"><i class="icon-settings">                                      </i></div>
                          </li>
                          <li><i class="view-html fa fa-code font-primary"></i></li>
                          <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                          <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                          <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                          <li><i class="icofont icofont-error close-card font-primary"></i></li>
                        </ul>
                      </div>
                    </th>
                  </tr>
                </thead>
                <tbody>

                @foreach($recent_orders as $r_order)
 
                  @php 
                   $product_ids =  $r_order->original_product_ids; 
                   $product_ids_arr = explode(",", $product_ids);
                   $product_image =  App\Models\Product::productById($product_ids_arr[0]);
                  @endphp
 
                  <tr>
                    <td>
                      <div class="media"><img height="80" width="80" class="img-fluid rounded-circle" src="{{ $product_image->picture }}" alt="" data-original-title="" title="">
                        <div class="media-body"><a href="product-page.html"><span>{{ $r_order->customer_name }}</span></a></div>
                      </div>
                    </td>
                    <td>
                      <p>{{  \Carbon\Carbon::parse($r_order->order_created_at)->diffForHumans()}}</p>
                    </td>
                    <td>

                    @php 
                    $josn_order = json_decode($r_order->order_obj);
                    $total_quantity = 0;
                    foreach($josn_order->line_items as $x){
                      $total_quantity += $x->quantity;
                    }
                    @endphp
                       
                    </td>
                    
                    <td>
                       
                      <p>
                          {{ $r_order->total }}
                      </p> 
                    </td>
                    <td>
                      <p>{{ $r_order->status }}</p>
                    </td>
                  </tr>
                  
                @endforeach    
                </tbody>
              </table>

               @else

                 <p>No order available!</p>

               @endif
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
@section('script')
  <script type="application/javascript">
    console.log('you can add your custom script here!')
    console.log($('a.nav-link.menu-title.active').offset())
  </script>
@endsection