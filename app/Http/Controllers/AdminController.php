<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Click;
use DB;
use Stevebauman\Location\Facades\Location;

class AdminController extends Controller
{
    public function Index(){
        $location= Location::get();
        $totalcount=Click::count();

        $clicks = DB::table('clicks')
            ->select('title', DB::raw('count(id) as total'))
            ->groupBy('title')
            ->orderBy('total', 'desc')
            ->get();

        return view('admin.index', ["clicks" => $clicks, "totalcount" => $totalcount, "location" => $location, "adminpage" => true]);

    }
}
