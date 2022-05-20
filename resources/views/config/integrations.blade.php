@extends('layout.app')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="workshop-section">

                <div class="row">
                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-integration-item">
                      <img src="{{ asset('/assets/images/integration/woocommerce.png') }}">
                      <div class="single-integration-bottom">
                      <p class="add">
                        <!-- <a href=""><i class="fa fa-info-circle"></i>More info</a> -->
                        </p>
                        <p><a href="{{ url('/config/integrations/connect/woocommerce') }}" class="btn integration-btn"><i class="fa fa-plug"></i>Connect</a></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="single-integration-item">
                      <img src="{{ asset('/assets/images/integration/shopify.png') }}">
                      <div class="single-integration-bottom">
                      <p class="add">
                        <!-- <a href=""><i class="fa fa-info-circle"></i>More info</a> -->
                        </p>
                        <p><a href="" class="btn integration-btn"><i class="fa fa-plug"></i>Connect</a></p>
                      </div>
                    </div>
                  </div>


                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection