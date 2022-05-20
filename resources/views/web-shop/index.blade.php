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
											<input type="search" name="" placeholder="Shop Name..">
										</div>
										<div class="autocomplete">
											<input type="search" id="batch" name="" placeholder="Shop type..">
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
							<div class="shop-table table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
											<th>Type</th>
											<th>Shop URL</th>
											<th>Summery</th>
										</tr>
									</thead>
									<tbody>
										@foreach($shops as $shop)
										<tr>
											<td>{{ $shop->shop_name }}</td>
											<td>{{ $shop->shop_type }}</td>
											<td><a href="{{ $shop->shop_url }}" target="_blank">{{ $shop->shop_url }}</a></td>
											<td><a class="btn btn-square btn-primary btn-sm" href="{{ url('web-shop/'.$shop->shop_id)}}"> Details</a></td>
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