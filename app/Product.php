<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use  SoftDeletes;
    protected $table = 'products';
	protected $fillable = [
        'category_id','name','title','description','price','quantity','NSX','HSD','color','image','warranty'
    ];
    protected $dates = ['deleted_at'];

    public function category(){ //khai bao quan he 1 nhieu với bảng category
        return $this->belongsTo('App\Category','category_id');
   }

    public function order_details()
    {
        return $this->hasMany('App\Order_detail');
    }
    
}

