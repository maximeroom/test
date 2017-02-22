<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRepo extends Model
{
    public static function getRecommendedProducts($productid,$limit){
        $url="https://api.bol.com/catalog/v4/recommendations/".$productid."/?format=json&limit=".$limit;
        return ProductRepo::getJsonFromUrl($url);
    }
    public static function getSearchProducts($query,$limit){
        $url="https://api.bol.com/catalog/v4/search/?q=".$query."&offset=0&limit=".$limit."&dataoutput=products&format=json";
        return ProductRepo::getJsonFromUrl($url);
    }
    public static function getProductDetails($productid){
        $url="https://api.bol.com/catalog/v4/products/".$productid."?offers=cheapest&includeAttributes=false&format=json";
        return ProductRepo::getJsonFromUrl($url);
    }
    private static function getJsonFromUrl($url){
        $url=$url."&apikey=9BD066C2A14643CCB798949B15AFBCC1";
        $json = file_get_contents($url);
        $data = json_decode($json);
        return $data;
    }
}
