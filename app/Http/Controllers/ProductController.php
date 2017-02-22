<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Click;
use App\ProductRepo;

class ProductController extends Controller
{
    public function index($id = null)
    {
        $notification=null;
        if($id==null){
            //get random products
            $products = ProductRepo::getSearchProducts("laptop",2);
        }else{
            //save click
            $details=ProductRepo::getProductDetails($id);
            if($details->products[0]!=null){
                $click = new Click();
                $click->productid=$id;
                $click->title=$details->products[0]->title;
                $click->save();

                //set notification
                $notification="You chose the product: ".$click->title;
            }

            //get recommended products based on previously clicked product
            $products = ProductRepo::getRecommendedProducts($id,2);
        }
        //get related products for the sidepanel based on the first displayed product
        $recproducts=ProductRepo::getRecommendedProducts($products->products[0]->id,5);
        return view('home.index',["products" => $products->products, "recproducts" => $recproducts->products, "notification" => $notification]);
    }
}