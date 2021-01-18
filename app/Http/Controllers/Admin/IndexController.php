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
        
        
        $StatisticalCategory = \DB::table('categories')->select('id')->count();
        
        $StatisticalProduct = \DB::table('products')->select('id')->count();
        
        $StatisticalUsers   = \DB::table('users')->select('id')->count();
         
        $StatisticalOrder   = \DB::table('orders')->select('id')->count();

        $oders = Order::orderByDesc('id')->paginate(5);
        
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
