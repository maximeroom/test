<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Click;
use DB;
class AdminController extends Controller
{
    public function Index(){
        $clicks = DB::table('clicks')
            ->select('title', DB::raw('count(id) as total'))
            ->groupBy('title')
            ->orderBy('total', 'desc')
            ->get();

        return view('admin.index', ["clicks" => $clicks]);

    }
}
