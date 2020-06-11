<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarAplikasi;
use App\Perangkat;
use App\Ram;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
           
		
		
        // $re = [0, 0, 0, 0];
        // foreach ($chart as $key => $value) {
        //     $re[$value->id_divisi - 1]= $value->total;
        // }
        // $data1 = implode(', ', $chart-<);
    // return redirect()->view('dashhome');	
	
				
	
//    }
		
}
