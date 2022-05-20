@extends('layout.app')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-0">
          <h5>New webshop</h5>
        </div>
        <div class="card-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8">
                <div class="webshop-title">
                  <form action="" method="POST">
                    @csrf
                    <div class="row mb-4">
                      <div class="col-md-5">
                        <label>Webshop type</label>
                      </div>
                      <div class="col-md-7">
                        <input type="hidden" name="shop_type" value="{{$platform}}">
                        <label>{{ $platform }}</label>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-5">
                        <label>Name</label>
                      </div>
                      <div class="col-md-7">
                        <input class="form-control @error('shop_name') is-invalid @enderror" type="text" name="shop_name" value="{{ old('shop_name')}}">
                        <label class="invalid-feedback">{{ $errors->first('shop_name') }}</label>
                      </div>
                    </div>
                    <!-- <div class="row mb-4">
                      <div class="col-md-5">
                        <label>Import orders placed on or after this date</label>
                      </div>
                      <div class="col-md-7">
                        <input class="form-control" type="text" name="">
                      </div>
                    </div> -->
                    <!-- </form> -->
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="connection-section">
                  <h5 class="undeline-area">Connection</h5>
                  <div class="connection-form">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row mb-4">
                          <div class="col-md-5 text-right">
                            <label>URL</label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control @error('shop_url') is-invalid @enderror" type="text" name="shop_url" placeholder="https://" value="{{old('shop_url')}}">
                            <small class="text-muted">URL of the homepage of the WooCommerce shop (including https://)</small>
                            <label class="invalid-feedback">{{ $errors->first('shop_url') }}</label>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-5 text-right">
                            <label>API Consumer key</label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control @error('consumer_key') is-invalid @enderror" type="text" name="consumer_key" value="{{old('consumer_key')}}">
                            <label class="invalid-feedback">{{ $errors->first('consumer_key') }}</label>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-5 text-right">
                            <label>API Consumer secret</label>
                          </div>
                          <div class="col-md-7">
                            <input class="form-control @error('consumer_secret') is-invalid @enderror" type="text" name="consumer_secret" value="{{old('consumer_secret')}}">
                            <label class="invalid-feedback">{{ $errors->first('consumer_secret') }}</label>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-5 text-right">
                            <label>Validate SSL certificate</label>
                          </div>
                          <div class="col-md-7">
                            <input type="radio" value="1" checked id="ssl_validation_yes" name="ssl_validation">
                            <label for="ssl_validation_yes">Yes, validate SSL</label><br>
                            <input type="radio" value="0" id="ssl_validation_no" name="ssl_validation">
                            <label for="ssl_validation_no">No, also accept invalid/unsigned SSL</label><br>
                            <small class="text-muted">Only set to No in test environments</small>
                            <label class="invalid-feedback">{{ $errors->first('ssl_validation') }}</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="submit-section">
                            <button class="btn btn-primary" type="submit">Save</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="syncing-section">
                  <h5 class="undeline-area">Syncing</h5>
                  <div class="syncing-form">
                    <div class="row">
                      <div class="col-md-8">
                        <form>
                          <div class="row mb-4">
                            <div class="col-md-5 text-right">
                              <label>Import orders from shop</label>
                            </div>
                            <div class="col-md-7">
                              <input type="radio" name="">
                              <label>Yes, including expected orders</label><br>
                              <input type="radio" name="">
                              <label>Yes, without expected orders</label><br>
                              <input type="radio" name="">
                              <label>No</label><br>
                              <small class="text-muted">Importing expected orders will enable Picqer to reserve stock before the order is to be processed</small>
                            </div>
                          </div>
                          <div class="row mb-4">
                            <div class="col-md-5 text-right">
                              <label>Import initial stock from webshop</label>
                            </div>
                            <div class="col-md-7">
                              <input type="radio" name="">
                              <label>Yes</label><br>
                              <input type="radio" name="">
                              <label>No</label><br>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="order-options-section">
                  <h5 class="undeline-area">Order options</h5>
                  <div class="order-options-form">
                    <div class="row">
                      <div class="col-md-8">
                        <form>
                          <div class="row mb-4">
                            <div class="col-md-5 text-right">
                              <label>Order product prices</label>
                            </div>
                            <div class="col-md-7">
                              <input type="radio" name="">
                              <label>Use prices as shown in the cart</label><br>
                              <input type="radio" name="">
                              <label>Use price from product in Picqer</label><br>
                            </div>
                          </div>
                          <div class="row mb-4">
                            <div class="col-md-5 text-right">
                              <label>Shipment product</label>
                            </div>
                            <div class="col-md-7">
                              <input class="form-control" type="text" name="">
                              <small class="text-muted">Productcode of product in Picqer to use for shipment costs</small>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection