<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
            'name'=>'required',
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'color'=>'required',
            'image'=>'required',
            'warranty'=>'required'
        ];
    }
    public function messages(){
        return [
             'name.required' =>'Vui lòng nhập tên sản phẩm!',
             'title.required' =>'Vui lòng nhập tiêu đề sản phẩm!',
             'description.required' =>'Vui lòng nhập mô tả sản phẩm!',
             'price.required' =>'Vui lòng nhập giá sản phẩm!',
             'quantity.required' =>'Vui lòng nhập số lượng sản phẩm!',
             'image.required' =>'Vui lòng nhập hình ảnh sản phẩm!',
             'warranty.required' =>'Vui lòng nhập bảo hành sản phẩm!'
        ];
    }
}
