<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Click;
class ProductController extends Controller
{
    public function index($id = null)
    {
        if($id==null){
            $products = $this->getJsonFromUrl("https://api.bol.com/catalog/v4/search/?q=printer&offset=0&limit=2&dataoutput=products&format=json");
        }else{
            //save click
            $click = new Click();
            $click->productid=$id;
            $click->title=$this->getProductDetails($id)->products[0]->title;
            $click->save();
            $products = $this->getJsonFromUrl("https://api.bol.com/catalog/v4/recommendations/".$id."/?format=json&limit=2");
        }
        $recproducts=$this->getRecommendedProducts($products->products[0]->id);
        return view('home.index',["products" => $products->products, "recproducts" => $recproducts->products]);
    }
    private function getRecommendedProducts($productid){
        $url="https://api.bol.com/catalog/v4/recommendations/".$productid."/?format=json&limit=4";
        return $this->getJsonFromUrl($url);
    }
    private function getProductDetails($productid){
        $url="https://api.bol.com/catalog/v4/products/".$productid."?offers=cheapest&includeAttributes=false&format=json";
        return $this->getJsonFromUrl($url);
    }
    private function getJsonFromUrl($url){
        $url=$url."&apikey=9BD066C2A14643CCB798949B15AFBCC1";
        $json = file_get_contents($url);
        $data = json_decode($json);
        return $data;
    }
}