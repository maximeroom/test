<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = $this->getJsonFromUrl("https://api.bol.com/catalog/v4/search/?q=laptop&offset=0&limit=10&dataoutput=products&apikey=9BD066C2A14643CCB798949B15AFBCC1&format=json");
        return view('home.index',["products" => $products]);
    }

    private function getJsonFromUrl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);
        echo $result;
    }
}
