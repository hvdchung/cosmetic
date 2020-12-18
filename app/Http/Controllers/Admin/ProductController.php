<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Product;
use App\Order;
use App\Image;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id','ASC')->paginate(10);;
        $categoryID = Category::all();
        return view('admin.product.list', compact('products','categoryID'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryID = Category::all();
        return view('admin.product.create',compact('categoryID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');

        if(!empty($file)) {
            foreach ($file as $key => $value) {
                 $newName = md5(microtime(true)).$value->getClientOriginalName();
            $value->move(public_path('admin/images/products/'),$newName);
            $dataNameImage[$key]=$newName;
            }
        }
        $data = $request->except('_token');
        $data['image'] = '/admin/images/products/'.$dataNameImage[0];
       $product =  Product::create($data);
       foreach ($dataNameImage as $key => $value) {
         $dataTableImage[] = ['product_id'=>$product->id, 'name'=> '/admin/images/products/'.$value];
       }
       Image::insert($dataTableImage);   
        return redirect()->route('product.index')->with(['message'=>'Đã tạo thành công !!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category')->find($id);
        //dd($sp->category->name);
        return view('admin.product.list-id', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categoryID = Category::all();
        return view('admin.product.edit', compact('product', 'categoryID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->except('_token', '_method');
        if($request->hasFile('image')){
            //code upload file
            $newName =md5(microtime(true)).$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('admin/images/products/'),$newName);
            
        }
        $data['image'] = '/admin/images/products/'.$newName;
        $product->update($data);
        return redirect()->route('product.index')->with(['message'=>'Đã sửa thành công!!']);
        // $this->validate($request,
		// [
		// 	'category_id'=>'required',
		// 	'name'=>'required|min:3|unique:Product,name',
		// 	'title'=>'required',
        //     'description'=>'required',
        //     'price'=>'required',
        //     'quantity'=>'required',
        //     'color'=>'required',
        //     'warranty'=>'required'
		// ],[
        //     'category_id.required'=>'Bạn chưa chọn hãng sản xuất',
        //     'name.required'=>'Bạn chưa nhập tên',
		// 	'title.required'=>'Bạn chưa nhập tiêu đề',		
        //     'description.required'=>'Bạn chưa nhập nội dung',
        //     'price.required'=>'Bạn chưa nhập giá',
        //     'qunatity.required'=>'Bạn chưa nhập số lượng',
        //     'color.required'=>'Bạn chưa nhập màu',
        //     'warranty.required'=>'Bạn chưa nhập thời gian bảo hành'
            
        // ]);
        // $product->name = $request->name;
		// $product->title = $request->title;
		// $product->category_id = $request->categories;
		// $product->description = $request->description;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->color = $request->color;
        // $product->warranty = $request->warranty;

        // if($request->hasFile('image'))
		// {
		// 	$file = $request->file('image');// lưu hình vào biến file
		// 	$duoi = $file->getClientOriginalExtension();
		// 	if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
		// 	{
		// 		return redirect('admin/product/create')->with('thongbao','lỗi bạn chỉ được chọn file có đuôi jpg, png, jpeg');
		// 	}
		// 	$name = $file->getClientOriginalName();
		// 	$image = str_random(4)."_". $name;//radom ko để trùng tên hình
		// 	while(file_exists("admin/images/products/".$image))
		// 	{
		// 		$image = str_random(4)."_". $name;
		// 	}
		// 	$file->move("admin/images/products",$image);
		// 	unlink("uploads/product/".$product->image);//xóa file cũ 
		// 	$product->image = $image;

		// }
		// $product->save();
		// return redirect('admin/product'.$id)->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

     $a = DB::table('order_details')->select('*')->where('product_id',$id)->get()->toArray();
       if($a==null) { //khong co trong don hang

        Product::find($id)->delete();
        return redirect()->route('product.index')->with(['message'=>'Đã xóa sản phẩm thành công. !!']);
    }
    else{
                $check=0; 
                foreach ($a as $key => $value) {
                    if((Order::find($value->order_id)->status_id)==4) {
                        $check =0;
                    }
                    else {
                       $check =1;
                       break;
                    }

                }
                if($check==1) {
                    return redirect()->route('product.index')->with(['error'=>'Không thể xóa vì đơn hàng của sản phẩm này chưa hủy.!!']);
                    
                }
                else {
                   Product::find($id)->delete();
                    return redirect()->route('product.index')->with(['message'=>'Đã xóa sản phẩm thành công. !!']); 
                }

    }
     
}
public function search(Request $request){
    $categoryID = Category::all();
    if($request->name){
        $products = Product::where('name','like','%'.$request->name.'%')
        ->orWhere('price',$request->name)
        ->get();
        return view('admin.product.search', compact('products','categoryID'));
    }
    if($request->brand){
            //dd($request->brand);
        $products = Product::where('category_id',$request->brand)->get();

        return view('admin.product.search', compact('products','categoryID'));
    }
}

}
