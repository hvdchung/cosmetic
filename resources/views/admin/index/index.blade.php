@extends('admin.master.master')
	@section ('content')
	<div class="row">
		<!-- main title -->
		<div class="col-12">
			<div class="">
				<h2>Dashboard</h2>
				<hr>
			</div>
		</div>
		
		<div class="col-12 col-sm-6 col-xl-3">
			<div class="">
			<i class="fas fa-braille"></i><span  style="font-size:20px"> SẢN PHẨM</span>
				<h2>{{$StatisticalProduct}} <a style="font-size:15px" href="{{ url('/admin/product') }}">(chi tiết)</a></h2>
				
			</div>
		</div>

		<div class="col-12 col-sm-6 col-xl-3">
			<div class="">
			<i class="icon ion-ios-person"></i><span  style=" font-size:20px"> USER</span>
				<h2>{{$StatisticalUsers}} <a style="font-size:15px" href="{{ url('/admin/user') }}">(chi tiết)</a> </h2>
				
			</div>
		</div>

		<div class="col-12 col-sm-6 col-xl-3">
			<div class="">
			<i class="fas fa-align-justify"></i> <span  style=" font-size:20px">DANH MỤC SẢN PHẨM</span>
				<h2>{{$StatisticalCategory}} <a style="font-size:15px" href="{{ url('/admin/category') }}">(chi tiết)</a></h2>
				
			</div>
		</div>
		

		<div class="col-12 col-sm-6 col-xl-3">
			<div class="">
			<i class="fas fa-shopping-cart"></i> <span style=" font-size:20px">ĐƠN HÀNG</i></span>
				<h2>{{$StatisticalOrder}} <a style="font-size:15px" href="{{ url('/admin/order') }}">(chi tiết)</a></h2>
				
			</div>
		</div>
	</div>
	<hr><br>
		<!-- end stats -->
	<div class="row">

		<!-- dashbox -->
		<div class="col-12 col-xl-6">
			<div class="dashbox">
				<div class="dashbox__title">
					<h3><i class="fas fa-shopping-cart"></i>ĐƠN HÀNG MỚI</h3>

					<div class="dashbox__wrap">
						<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
						<a class="dashbox__more" href="{{ url('/admin/order') }}">DANH SÁCH</a>
					</div>
				</div>

				<div>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>TÊN KHÁC HÀNG</th>
								<th>GIÁ</th>
								<th>NGÀY MUA HÀNG</th>
							</tr>
						</thead>
						<tbody>
						@foreach($oders as $item)
							<tr>
								<td>
									<div >{{$item->id}}</div>
								</td>
								<td>
									<div >{{$item->name}}</div>
								</td>
								<td>
									<div >{{$item->total_price}}</div>
								</td>
								<td>
									<div >{{date("d-m-Y", strtotime("$item->created_at"))}}</div>
								</td>
						@endforeach
						</tbody>
					</table>
					<div class="clearfix">{{$oders->links()}}</div>
				</div>
			</div>
		</div>
		<!-- end dashbox -->

		<!-- dashbox -->
		<div class="col-12 col-xl-6">
			<div class="table">
				<div class="dashbox__title">
					<h3><i class="icon ion-ios-film"></i>SẢN PHẨM BÁN CHẠY</h3>

					<div class="dashbox__wrap">
						<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
						<a class="dashbox__more" href="catalog.html">View All</a>
					</div>
				</div>

				<div class="dashbox__table-wrap">
					<table class="main__table main__table--dash">
						<thead>
							<tr>
								<th>ID</th>
								<th>TITLE</th>
								<th>CATEGORY</th>
								<th>STATUS</th>
							</tr>
						</thead>
						<!-- <tbody>
							<tr>
								<td>
									<div class="main__table-text">26</div>
								</td>
								<td>
									<div class="main__table-text">I Dream in Another Language</div>
								</td>
								<td>
									<div class="main__table-text">Movie</div>
								</td>
								<td>
									<div class="main__table-text main__table-text--green">Visible</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="main__table-text">25</div>
								</td>
								<td>
									<div class="main__table-text">Benched</div>
								</td>
								<td>
									<div class="main__table-text">Movie</div>
								</td>
								<td>
									<div class="main__table-text main__table-text--green">Visible</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="main__table-text">24</div>
								</td>
								<td>
									<div class="main__table-text">Whitney</div>
								</td>
								<td>
									<div class="main__table-text">TV Series</div>
								</td>
								<td>
									<div class="main__table-text main__table-text--green">Visible</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="main__table-text">23</div>
								</td>
								<td>
									<div class="main__table-text">Blindspotting 2</div>
								</td>
								<td>
									<div class="main__table-text">TV Series</div>
								</td>
								<td>
									<div class="main__table-text main__table-text--green">Visible</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="main__table-text">22</div>
								</td>
								<td>
									<div class="main__table-text">Blindspotting</div>
								</td>
								<td>
									<div class="main__table-text">TV Series</div>
								</td>
								<td>
									<div class="main__table-text main__table-text--green">Visible</div>
								</td>
							</tr>
						</tbody> -->
					</table>
				</div>
			</div>
		</div>
		<!-- end dashbox -->
	</div>
	@endsection	