@extends('admin.master.master')
		@section ('content')
		<div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">SỬA SẢN PHẨM</h3>
			@if(count($errors) > 0)
                   <div class="alert alert-danger">
                       @foreach($errors->all() as $err)
                           {{$err}}<br>
                       @endforeach
                   </div>
                   @endif

                   @if(session('thongbao'))
                   <div class="alert alert-success">
                       {{session('thongbao')}}
                   </div>
                   @endif
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
            </div>
            </div>
            <div class="card-body" style="display: block;  " >
        <form action="{{route('product.update', $product->id)}}" method="POST" role="form" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	
		<div class="row">
			<div class="col-6">
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" name="name" class="form-control" value="{{old('name') ? old('name') : $product->name}}">
			</div>
			<div class="form-group">
				<label for="">Hãng sản xuất</label>
		
				<select name="category_id" id="" required="required" class="form-control">
				<option value="{{$product->category->id}}">{{$product->category->name}}</option>
				<option value="">-- Lựa Chọn --</option>}
			
				@foreach ($categoryID as $value)
			
				<option value="{{$value->id}}">{{$value->name}}</option>
				@endforeach
			
		</select>
	</div>
			<div class="form-group">
				<label for="">Tiêu đề</label>
				<input type="text" name="title" value="{{old('titel') ? old('titel') :$product->title}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Mô tả</label>
				<textarea name="description"  class="form-control" rows="4" >{{old('description') ? old('description') :$product->description}}</textarea>
				
			</div>
			<div class="form-group">
				<label for="">Giá sản phẩm</label>
				<input type="text" name="price" value="{{old('price') ? old('price') :$product->price}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Số lượng</label>
				<input type="text" name="quantity" value="{{old('quantity') ? old('quantity') :$product->quantity}}" class="form-control" id="" placeholder="Input field">
			</div>
		
			<div class="form-group">
				<label for="">Màu sắc</label>
				<input type="text" name="color" value="{{old('color') ? old('color') :$product->color}}" class="form-control" id="" placeholder="Input field">
			</div>
			<label for="">Hình ảnh</label>
			<div class="form-group">
				<p><img width="250px" src="{{asset($product->image)}}" alt=""></p>
				<input type="file" name="image" class="form-control" >
			</div>
			<!-- Thêm Hình ảnh 2 - 3 -->
			<label for="">Hình ảnh 2</label>
				<div class="form-group">
					<div class="custom-file">
					<input type="file" name="image"  multiple>
					
					</div>
				</div>
				<label for="">Hình ảnh 3</label>
				<div class="form-group">
					<div class="custom-file">
					<input type="file" name="image"  multiple>
					
					</div>
				</div>
			</div>

			
			<!-- thêm NSX _ HSD -->
			<div class="form-group">
					<label for="">Ngày Sản Xuất</label>
					<input type="date" name="NSX" value="{{old('NSX')?old('NSX'):''}}" class="form-control" id="" placeholder="Input field">
				</div>

				<div class="form-group">
					<label for="">Hạn Sản Dụng</label>
					<input type="date" name="HSD" value="{{old('HSD')?old('HSD'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
			<!-- hết NSX - HSD -->
		</div>
		<div class="col-6">
			<div class="form-group">
				<label for="">Bảo hành</label>
				<input type="text" name="warranty" value="{{old('warranty') ? old('warranty') :$product->warranty}}" class="form-control" id="" placeholder="Input field">
			</div>
			
			<button type="submit" style="float:right" class="btn btn-primary">Cập nhật</button>

		</div>

	</div>

</form>
              
            </div>
            <!-- /.card-body -->
          </div>
		
		
@endsection