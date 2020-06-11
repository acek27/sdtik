<?php

namespace App\Http\Controllers;

use App\divisi;
use App\jeniskelamin;
use App\pendidikan;
use App\tenagateknis;
use App\laporHarian;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class lapController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	  
    public function index()
    {
		$tb_laporan_harian = DB::table('tb_laporan_harian')
		  ->join('tb_tenagateknis', 'tb_tenagateknis.id_tenaga', '=', 'tb_laporan_harian.id_tenaga')
		  ->join('tb_divisi', 'tb_divisi.id_divisi', '=', 'tb_tenagateknis.id_divisi')
		  ->select('tb_laporan_harian.*', 'tb_tenagateknis.nm_tenaga','tb_divisi.nama_divisi')
		  ->get();
		
 
    	// mengirim data pegawai ke view index
    	return view('lapharian',['tb_laporan_harian' => $tb_laporan_harian]);
		
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $dataid = $id;
        return view('lapharian', compact('dataid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
       $tb_laporan_harian = DB::table('tb_laporan_harian')
		  ->join('tb_tenagateknis', 'tb_tenagateknis.id_tenaga', '=', 'tb_laporan_harian.id_tenaga')
		  ->join('tb_divisi', 'tb_divisi.id_divisi', '=', 'tb_tenagateknis.id_divisi')
		  ->select('tb_laporan_harian.*', 'tb_tenagateknis.nm_tenaga','tb_divisi.nama_divisi')
		->where('id_laporan_harian',$id)->get();
	   
	// passing data pegawai yang didapat ke view edit.blade.php
	return view('editlapharian',['tb_laporan_harian' => $tb_laporan_harian]);
 
    }
public function update(Request $request)
{
	// update data pegawai
	DB::table('tb_laporan_harian')
	 ->join('tb_tenagateknis', 'tb_tenagateknis.id_tenaga', '=', 'tb_laporan_harian.id_tenaga')
	 ->join('tb_divisi', 'tb_divisi.id_divisi', '=', 'tb_tenagateknis.id_divisi')
	 ->select('tb_laporan_harian.*', 'tb_tenagateknis.nm_tenaga','tb_divisi.nama_divisi')
	->where('id_laporan_harian',$request->id_laporan_harian)->update([
		'nm_tenaga' => $request->nm_tenaga,
		'nama_divisi' => $request->nama_divisi,
		'tanggal' => $request->tanggal
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/laporan_harian');
}
    public function datatenaga(Request $request)
    {
		//$contacts = tb_laporan_harian::select(array(
         //    'id_laporan_harian', 'id_tenaga','tanggal'
        //));

       // return(laporHarian::of($contacts)->make(true));
		
		
		
		 return DataTables::of(laporHarian::join('tb_tenagateknis', 'tb_tenagateknis.id_tenaga', '=', 'tb_tenagateknis.id_tenaga'))
               
            ->addColumn('action', function ($data) {
                $edit = '<a href="#" class="edit-data"><i class="fa fa-edit"></i></a>';
                   $detail = '<a href="#" class="show-data"><i class="fas fa-search"></i></a>';
		   $hapus = '<a href="#"  class="hapus-data"><i class="fas fa-trash-alt"></i></a>';
                    return $edit . '&nbsp' . '&nbsp' . $detail . '&nbsp' . '&nbsp' . $hapus;
            })
            ->make(true);
			
			
		
}

    public function search(Request $request){
			$search = $request->search;
    		// mengambil data dari table pegawai sesuai pencarian data
		$tb_laporan_harian = DB::table('tb_laporan_harian')
		->join('tb_tenagateknis', 'tb_tenagateknis.id_tenaga', '=', 'tb_laporan_harian.id_tenaga')
		  ->join('tb_divisi', 'tb_divisi.id_divisi', '=', 'tb_tenagateknis.id_divisi')
		  ->select('tb_laporan_harian.*', 'tb_tenagateknis.nm_tenaga','tb_divisi.nama_divisi')
		->where('nm_tenaga','like',"%".$search."%")
		->orWhere('tanggal','like',"%".$search."%")
		->orWhere('nama_divisi','like',"%".$search."%")
		->paginate();

    		// mengirim data pegawai ke view index
	return view('lapharian',['tb_laporan_harian' => $tb_laporan_harian]);
   
}

    public function paginate()
    {
		
	
     //       $biodata = laporHarian::join('tb_tenagateknis', 'tb_tenagateknis.id_tenaga', '=', 'tb_jk.id_tenaga')
		//	->join('tb_laporan_harian','tb_tenagateknis.id_tenaga','=','tb_laporan_harian.id_tenaga')
         //   ->join('tb_pendidikanterakhir', 'tb_tenagateknis.id_pendidikan', '=', 'tb_pendidikanterakhir.id_pendidikan')
          //  ->join('tb_divisi', 'tb_tenagateknis.id_divisi', '=', 'tb_divisi.id_divisi')
           // ->where('id_tenaga', $id)->first();
        //return $biodata;
    }

  //  public function download()
   // {
       
   // }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
   // public function update(Request $request, $id)
    //{
       
   // }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
   // public function destroy($id)
    //{
        //
   // }

}