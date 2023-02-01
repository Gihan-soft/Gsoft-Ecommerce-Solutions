<?php

use App\Models\Settings;
class Helper{

    public static function userDefaultImage()
    {
       return asset('frontend/img/default.png');
    }

    public static function minPrice(){
        return floor(\App\Models\Product::min('offer_price'));
    }
    

    public static function maxPrice(){
        return floor(\App\Models\Product::max('offer_price'));
    }

    
}

    //settings edit

    if(!function_exists('get_setting')) {
        function get_setting($key){
            return Settings::value($key);
        }

    }




?>