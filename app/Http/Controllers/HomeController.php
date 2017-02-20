<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = $this->getJsonFromUrl("https://api.bol.com/catalog/v4/search/?q=laptop&offset=0&limit=10&dataoutput=products&apikey=9BD066C2A14643CCB798949B15AFBCC1&format=json");
        return view('home.index',["products" => $products->products]);
    }

    private function getJsonFromUrl($url){
        $json = file_get_contents($url);
        $data = json_decode($json);
        return $data;
    }
}
