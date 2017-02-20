<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id = null)
    {
        $products="";
        if($id==null){
            $products = $this->getJsonFromUrl("https://api.bol.com/catalog/v4/search/?q=laptop&offset=0&limit=2&dataoutput=products&format=json");
        }else{
            $products = $this->getJsonFromUrl("https://api.bol.com/catalog/v4/recommendations/".$id."/?format=json&limit=2");
        }
        $recproducts=$this->getRecommendedProducts($products->products[0]->id);
        return view('home.index',["products" => $products->products, "recproducts" => $recproducts->products]);
    }

    private function getRecommendedProducts($productid){
        $url="https://api.bol.com/catalog/v4/recommendations/".$productid."/?format=json&limit=4";
        return $this->getJsonFromUrl($url);
    }

    private function getJsonFromUrl($url){
        $url=$url."&apikey=9BD066C2A14643CCB798949B15AFBCC1";
        $json = file_get_contents($url);
        $data = json_decode($json);
        return $data;
    }
}
