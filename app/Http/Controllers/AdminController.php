<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Click;
use DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function Index(){
        If(Auth::user()->Admin==false){
            return redirect('/');
        }
        $totalcount=Click::count();

        $clicks = DB::table('clicks')
            ->select('title', DB::raw('count(id) as total'))
            ->groupBy('title')
            ->orderBy('total', 'desc')
            ->get();

        return view('admin.index', ["clicks" => $clicks, "totalcount" => $totalcount]);

    }
}
