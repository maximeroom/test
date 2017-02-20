<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id = null)
    {
        if($id==null){
            $products = $this->getJsonFromUrl("https://api.bol.com/catalog/v4/search/?q=laptop&offset=0&limit=2&dataoutput=products&apikey=9BD066C2A14643CCB798949B15AFBCC1&format=json");
        }else{
            $products = $this->getJsonFromUrl("https://api.bol.com/catalog/v4/recommendations/".$id."/?apikey=9BD066C2A14643CCB798949B15AFBCC1&format=json&limit=2");
        }

        return view('home.index',["products" => $products->products]);
    }

    private function getJsonFromUrl($url){
        $json = file_get_contents($url);
        $data = json_decode($json);
        return $data;
    }
}
