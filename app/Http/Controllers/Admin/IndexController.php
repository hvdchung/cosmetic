<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Order;
class IndexController extends Controller
{
    public function index(){
        
        // tổng danh mục sản phẩm
        $StatisticalCategory = \DB::table('categories')->select('id')->count();
        // tổng sản phẩm
        $StatisticalProduct = \DB::table('products')->select('id')->count();
        // Tổng user 
        $StatisticalUsers   = \DB::table('users')->select('id')->count();
        // Tổng đơn hàng 
        $StatisticalOrder   = \DB::table('orders')->select('id')->count();

        // Xắp xếp đơn hàng mới nhất
        $oders = Order::orderByDesc('id')->limit(5)->get();
        
        $viewData = [
            'StatisticalCategory' => $StatisticalCategory,
            'StatisticalProduct'  => $StatisticalProduct,
            'StatisticalUsers'    => $StatisticalUsers,
            'StatisticalOrder'    => $StatisticalOrder,
            'oders'               => $oders 
        ];
    	return view('admin.index.index', $viewData);
    } 
}
