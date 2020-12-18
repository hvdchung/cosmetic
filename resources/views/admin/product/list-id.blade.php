@extends('admin.master.master')
	@section ('content')
	<h1 class="text-center" style="font-family: serif; color:red">Thông Số Kĩ Thuật Chi Tiết</h1>
	<div class="container" >
  <div class="row">
  	
          <div class="col-6">
            <div class="abc">
              <label for="">Mã SP:</label>
              <p>No</p>
            </div>
            <div class="abc">
              <label for="">Hãng:</label>
              <p>{{$product->category->name}}</p>
            </div>
            <div class="abc">
              <label for="">Tên sản phẩm:</label>
              <p>{{$product->name}}</p>
            </div>
            <div class="abc">
              <label for="">Số lượng:</label>
              <p>{{$product->quantity}}</p>
            </div>
            <div class="abc">
              <label for="">Giá bán:</label>
              <p>{{$product->price}}</p>
            </div>
           
           
            <div class="abc">
              <label for="">Màu:</label>
              <p>{{$product->color}}</p>
            </div>
           
          </div>
            <div class="abc">
              <label for="">Bảo hành:</label>
              <p>{{$product->warranty}}</p>
             </div>

        </div>
		
	</div>
	@endsection