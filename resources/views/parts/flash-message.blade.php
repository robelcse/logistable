<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-up alert-center"></i>
                <p><b> Well done! </b>{{$message}}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down alert-center"></i>
                <p><b> Alert! </b>{{$message}}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            @endif

            @if ($message = Session::get('warning'))
            <div class="alert alert-warning inverse alert-dismissible fade show" role="alert"><i class="icon-heart alert-center"></i>
                <p><b> Alert! </b>{{$message}}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            @endif

            @if ($message = Session::get('info'))
            <div class="alert alert-warning inverse alert-dismissible fade show" role="alert"><i class="icon-info-alt alert-center"></i>
                <p><b> Alert! </b>{{$message}}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-info-alt alert-center"></i>
                <p>Please check the errors below!</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            @endif
        </div>
    </div>
</div>