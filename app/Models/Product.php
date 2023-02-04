<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','summary','description','additional_info','return_cancellation','size_guide','stock','price','offer_price','discount','status','photo','user_id','brand_id','cat_id','child_cat_id','size','added_by','is_featured','conditions'];


    public function category()
    {
      return $this->belongsTo(\App\Models\Category::class,'cat_id');  
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

     public function rel_prods()
    {
        return $this->hasMany('App\Models\Product','cat_id','cat_id')
              ->where('status','active')->limit(10);
    }

    public function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();
        
    }

     public function orders(){
        return $thid->belongsToMany(Order::class,'product_orders')->withPivot('quantity');
        
    }
}
