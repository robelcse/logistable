@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div>
        <div class="row product-page-main p-0">
            <div class="col-xl-5 col-md-6 box-col-12 xl-50">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-9 product-main">
                                <div class="pro-slide-single slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track" style="opacity: 1; width: 3232px;">
                                            @php $i = 0; @endphp
                                            @foreach($product->images as $image)
                                            @if($i == 0)
                                            <div class="slick-slide slick-current slick-active" data-slick-index="{{$i}}" aria-hidden="false" tabindex="{{$i}}" style="width: 404px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"><img class="img-fluid" src="{{ $image->src}}" alt=""></div>
                                            @else
                                            <div class="slick-slide" data-slick-index="{{$i}}" aria-hidden="true" tabindex="{{$i}}" style="width: 404px; position: relative; left: -404px; top: 0px; z-index: 998; opacity: 0;"><img class="img-fluid" src="{{ $image->src}}" alt=""></div>
                                            @endif
                                            @php $i++; @endphp
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 product-thumbnail">
                                <div class="pro-slide-right slick-initialized slick-slider slick-vertical">
                                    <div class="slick-list draggable" style="height: 486px;">
                                        <div class="slick-track" style="opacity: 1; height: 3078px; transform: translate3d(0px, -486px, 0px);">
                                            @php $i = 0; @endphp
                                            @foreach($product->images as $image)
                                            <div class="slick-slide slick-current slick-active" data-slick-index="{{$i}}" aria-hidden="false" tabindex="{{$i}}" style="width: 119px;">
                                                <div class="slide-box"><img src="{{ $image->src }}" alt=""></div>
                                            </div>
                                            @php $i++; @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-md-6 box-col-6 xl-50 proorder-lg-1">
                <div class="card">
                    <div class="card-body">
                        <div class="pro-group pt-0 border-0">
                            <div class="product-page-details mt-0">
                                <h3>{{ $product->name}}</h3>

                            </div>
                            <div class="product-price">€ {{ $product->price}}
                                <del> {{ $product->regular_price ? '€' . $product->regular_price : ''}} </del>
                            </div>

                        </div>
                        <div class="pro-group">
                            {!! $product->short_description !!}
                        </div>
                        <div class="pro-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td> <b>Availability &nbsp;: &nbsp;</b></td>
                                                <td class="txt-success">In stock({{$product->stock_quantity ? $product->stock_quantity : 0}})</td>
                                            </tr>
                                            <tr>
                                                <td> <b>Status &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                                <td>{{$product->status}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td> <b>Shop &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                                <td>{{$shop->shop_name}}</td>
                                            </tr>
                                            <tr>
                                                <td> <b>Type &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                                <td>{{$product->type}}</td>
                                            </tr>
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
    <div class="card">
        <div class="row product-page-main">
            <div class="col-sm-12">
                <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">Description</a>
                        <div class="material-border"></div>
                    </li>

                </ul>
                <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <p class="mb-0 m-t-20">{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection