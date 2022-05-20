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
                                <h6 style="font-size: 20px; line-height: 32px; font-weight: 600;">Cupon Details</h6>
                                <a href="{{ url('/cupons') }}" class="btn btn-success">All Cupons</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-12">
                            <p class="my-4" style="font-size: 15px; color:#601761; line-height: 21px; font-weight: 600;">Cupon Information</p>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                <tr>
                                            <th>Product IDS</th>
                                            @php $prodouct_ids = json_decode($coupon->product_ids) @endphp
                                            <td>
                                            
                                                 @if(count($prodouct_ids) !=0)
                                                  
                                                      @foreach($prodouct_ids as $id)
                                                          {{ $id }},
                                                      @endforeach

                                                 @else
                                                        <span>IDS Not available</span>
                                                 @endif
                                            
                                            </td>
                                        </tr>
                                     <tr>
                                            <th>Description</th>
                                            <td>{{ $coupon->description }}</td>
                                        </tr>
                                     <tr>
                                            <th>Cupon Code</th>
                                            <td>{{ $coupon->code }}</td>
                                        </tr>
                                        
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="customer-table table-responsive">
                                <table class="table text_center table-striped">
                                        <tr>
                                            <th>Cupon Amount</th>
                                            <td>{{ $coupon->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th>Cupon Expire</th>
                                            <td>{{ $coupon->date_expires !=null ? $coupon->date_expires:'NULL' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created time</th>
                                            <td>{{ $coupon->date_created !=null ? $coupon->date_created:'NULL' }}</td>
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