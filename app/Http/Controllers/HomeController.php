<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarAplikasi;
use App\Perangkat;
use App\Ram;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
		if (\Auth::user()->can('admin') == 1) {
        $chart_aplikasi = DaftarAplikasi::select('nama_perangkat',DB::raw('count(nama_aplikasi) as total'))
                ->leftjoin('tb_perangkat','tb_perangkat.id_perangkat','=','tb_daftar_aplikasi.id_perangkat')
                ->groupby('nama_perangkat')->get(); 
        $chart_ip_server = DaftarAplikasi::select('ip_server',DB::raw('count(ip_vps) as total'))
                ->leftjoin('tb_perangkat','tb_perangkat.id_perangkat','=','tb_daftar_aplikasi.id_perangkat')
                ->groupby('ip_server')->get(); 
        $chart_core = Perangkat::select('jumlah_core',DB::raw('count(nama_perangkat) as total'))
                ->leftjoin('tb_core','tb_core.id_core','=','tb_perangkat.id_core')
                ->groupby('jumlah_core')->get();  
        $chart_hdd = Perangkat::select('ukuran_hdd','keterangan',DB::raw('count(nama_perangkat) as total'))
                ->join('tb_hdd','tb_hdd.id_hdd','=','tb_perangkat.id_hdd')
                ->groupby('ukuran_hdd','keterangan')->get();        
        $chart_ram = Ram::select('ukuran_ram',DB::raw('count(nama_perangkat) as total'))
                ->rightjoin('tb_perangkat','tb_perangkat.id_ram','=','tb_ram.id_ram')
                ->groupby('ukuran_ram')->get();  
        $chart = Perangkat::select('nomer_rak',DB::raw('count(nama_perangkat) as total'))
                ->leftjoin('tb_rak','tb_rak.id_rak','=','tb_perangkat.id_rak')
                ->groupby('nomer_rak')->get();        
				///
				
		$chart_pengembang = DaftarAplikasi::select('waktu_pengembangan',DB::raw('count(waktu_pengembangan) as total'))
		       ->join('tb_pengembang','tb_pengembang.id_pengembang','=','tb_daftar_aplikasi.id_pengembang')
		        ->groupby('waktu_pengembangan')
				->get();
		
	
		
		
	
				
			
	
	
		
        // $re = [0, 0, 0, 0];
        // foreach ($chart as $key => $value) {
        //     $re[$value->id_divisi - 1]= $value->total;
        // }
        // $data1 = implode(', ', $chart-<);
        return view('grafik', compact('chart','chart_ram','chart_hdd','chart_core','chart_ip_server','chart_aplikasi','chart_pengembang'));
    
	
		}else if
			(\Auth::user()->can('teknis') == 2) {
			return redirect()->route('laporan_hari.index');
				
		}else if
			  (\Auth::user()->can('admin_teknis') == 3) {
				  return redirect()->route('homes.index');
		
		  }
		}
       		   
    }
		

