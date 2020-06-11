<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rak;
use Yajra\DataTables\DataTables;

class LandingPageController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  
    
	
    public function index()
    {
        return view('landing-page');
    }
	
	
}
