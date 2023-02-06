<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessPoint_m;
use App\Models\CctvPemko_m;
use App\Models\Server_m;
use App\Models\NvrCctv_m;
use App\Models\PerangkatJar_m;

class Dashboard extends Controller
{
    public function index()
    {
        //get posts
        $ap = AccessPoint_m::orderBy('sn', 'DESC')->count();
        $cctv = CctvPemko_m::orderBy('sn', 'DESC')->count();
        $server = Server_m::orderBy('sn', 'DESC')->count();
        //render view with posts
        return view('dashboard',['title' => 'Dashboard'], compact('ap','cctv','server'));
    }
}
