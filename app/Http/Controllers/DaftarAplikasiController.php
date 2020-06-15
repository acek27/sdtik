<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DaftarAplikasi;
use App\Perangkat;
use App\Pengembang;
use App\JenisDatabase;
use App\FrameworkPlatform;


class DaftarAplikasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_aplikasi = DB::table('tb_daftar_aplikasi')
            //->join('tb_perangkat','tb_perangkat.id_perangkat','=','tb_daftar_aplikasi.id_perangkat')
            //->join('tb_daftar_aplikasi','tb_daftar_aplikasi.id_penanggung_jawab','=','tb_penanggung_jawab.id_penanggung_jawab')
            //->join('tb_tenagateknis','tb_tenagateknis.id_tenaga','=','tb_penanggung_jawab.id_tenaga')
            //->select('tb_daftar_aplikasi.id_aplikasi','tb_daftar_aplikasi.nama_aplikasi','tb_daftar_aplikasi.id_penanggung_jawab'
            //,'tb_perangkat.id_perangkat','tb_perangkat.nama_perangkat','tb_perangkat.tipe_perangkat','tb_perangkat.status_kepemilikan')
            ->JOIN('tb_perangkat', 'tb_daftar_aplikasi.id_perangkat', '=', 'tb_perangkat.id_perangkat')
            ->JOIN('tb_pengembang', 'tb_daftar_aplikasi.id_pengembang', '=', 'tb_pengembang.id_pengembang')
            ->JOIN('tb_database', 'tb_daftar_aplikasi.id_database', '=', 'tb_database.id_database')
            ->JOIN('tb_framework_platform', 'tb_daftar_aplikasi.id_framework_platform', '=', 'tb_framework_platform.id_framework_platform')
            //	-> JOIN ('tb_penanggung_jawab' , 'tb_penanggung_jawab.id_penanggung_jawab','=','tb_daftar_aplikasi.id_penanggung_jawab')
            //	-> JOIN ('tb_tenagateknis' , 'tb_penanggung_jawab.id_tenaga','=','tb_tenagateknis.id_tenaga')
            ->select('tb_daftar_aplikasi.id_aplikasi', 'tb_daftar_aplikasi.nama_aplikasi', 'tb_daftar_aplikasi.id_perangkat', 'tb_daftar_aplikasi.ip_vps', 'tb_daftar_aplikasi.ip_public', 'tb_perangkat.id_perangkat', 'tb_perangkat.nama_perangkat', 'tb_perangkat.tipe_perangkat', 'tb_perangkat.status_kepemilikan', 'tb_daftar_aplikasi.id_pengembang', 'tb_pengembang.nama_pengembang1', 'tb_daftar_aplikasi.waktu_pengembangan', 'tb_database.id_database'
                , 'tb_daftar_aplikasi.id_framework_platform', 'tb_framework_platform.id_framework_platform')
            ->where('tb_daftar_aplikasi.id_aplikasi');
        //->from('tb_daftar_aplikasi');

        return view('Aplikasi.dashboard', compact('data_aplikasi'));
    }

    public function tableaplikasi()
    {
        return DataTables::of(DB::table('tb_daftar_aplikasi')
            // ->join('tb_perangkat','tb_perangkat.id_perangkat','=','tb_daftar_aplikasi.id_perangkat')
            //->select('tb_daftar_aplikasi.id_aplikasi','tb_daftar_aplikasi.nama_aplikasi','tb_daftar_aplikasi.ip_vps','tb_daftar_aplikasi.ip_public','tb_daftar_aplikasi.id_penanggung_jawab'
            //,'tb_perangkat.id_perangkat','tb_perangkat.nama_perangkat','tb_perangkat.tipe_perangkat','tb_perangkat.status_kepemilikan','tb_perangkat.ip_server')
            ->JOIN('tb_pengembang', 'tb_daftar_aplikasi.id_pengembang', '=', 'tb_pengembang.id_pengembang')
            ->JOIN('tb_perangkat', 'tb_daftar_aplikasi.id_perangkat', '=', 'tb_perangkat.id_perangkat')
            ->JOIN('tb_database', 'tb_daftar_aplikasi.id_database', '=', 'tb_database.id_database')
            ->JOIN('tb_framework_platform', 'tb_daftar_aplikasi.id_framework_platform', '=', 'tb_framework_platform.id_framework_platform')

            //-> JOIN ('tb_penanggung_jawab' , 'tb_penanggung_jawab.id_penanggung_jawab','=','tb_daftar_aplikasi.id_penanggung_jawab')
            //-> JOIN ('tb_tenagateknis' , 'tb_penanggung_jawab.id_tenaga','=','tb_tenagateknis.id_tenaga')
            //->select( 'tb_daftar_aplikasi.id_aplikasi','tb_daftar_aplikasi.nama_aplikasi','tb_daftar_aplikasi.id_perangkat','tb_daftar_aplikasi.ip_vps','tb_daftar_aplikasi.ip_public','tb_perangkat.id_perangkat','tb_perangkat.nama_perangkat','tb_perangkat.tipe_perangkat','tb_perangkat.status_kepemilikan,tb_daftar_aplikasi.id_penanggung_jawab','tb_penanggung_jawab.id_tenaga','tb_tenagateknis.nm_tenaga')
            ->select('tb_daftar_aplikasi.id_aplikasi', 'tb_daftar_aplikasi.nama_aplikasi', 'tb_daftar_aplikasi.ip_vps', 'tb_daftar_aplikasi.ip_public', 'tb_daftar_aplikasi.id_pengembang', 'tb_pengembang.nama_pengembang1', 'tb_pengembang.nama_pengembang2', 'tb_pengembang.nama_pengembang3', 'tb_daftar_aplikasi.waktu_pengembangan'
                , 'tb_perangkat.id_perangkat', 'tb_perangkat.nama_perangkat', 'tb_perangkat.tipe_perangkat', 'tb_perangkat.status_kepemilikan', 'tb_perangkat.ip_server', 'tb_daftar_aplikasi.id_database', 'tb_database.jenis_database'
                , 'tb_daftar_aplikasi.id_framework_platform', 'tb_framework_platform.jenis_platform', 'tb_framework_platform.jenis_framework')
            ->get())
            ->addColumn('id_framework_platform', function ($data) {
                $data27 = "$data->jenis_platform";
                return $data27;
            })
            ->addColumn('framework_platform', function ($data) {
                $data28 = "$data->jenis_framework";
                return $data28;
            })
            ->addColumn('id_database', function ($data) {
                $data26 = "$data->jenis_database";
                return $data26;
            })
            ->addColumn('id_pengembang', function ($data) {
                $data23 = "$data->nama_pengembang1";
                $data24 = "$data->nama_pengembang2";
                $data25 = "$data->nama_pengembang3";
                return $data23 . ',' . $data24 . ',' . $data25;
            })
            ->addColumn('action', function ($data) {
                $del = '<a href="#" data-id="' . $data->id_aplikasi . '" class="hapus-data" style="font-size: 15px"><i style="color:#d9534f" class="fa fa-trash"></i></a>';
                $edit = '<a href="' . route('data_aplikasi.edit', $data->id_aplikasi) . '" style="font-size: 15px"><i style="color:#5cb85c" class="fa fa-edit"></i></a>';

                return $edit . '&nbsp' . ' | ' . '&nbsp' . $del;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_perangkat = Perangkat::all();
        $data_aplikasi = DaftarAplikasi::all();
        $data_pengembang = Pengembang::all();
        $database = JenisDatabase::all();
        $frame = FrameworkPlatform::all();
        return view('Aplikasi.create', compact('data_perangkat', 'data_aplikasi', 'data_pengembang', 'database', 'frame'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ip_vps' => 'nullable|unique:tb_daftar_aplikasi',
            'ip_public' => 'nullable|unique:tb_daftar_aplikasi',
            'id_perangkat' => 'required',
            'id_pengembang' => 'required',
            'id_database' => 'required',
            'id_framework_platform' => 'required',
        ]);
        DaftarAplikasi::create($request->all());
        return redirect()->route('data_aplikasi.index')->with(['success' => 'Berhasil Disimpan']);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_perangkat = Perangkat::all();
        $data_pengembang = Pengembang::all();
        $database = JenisDatabase::all();
        $frame = FrameworkPlatform::all();
        $data_aplikasi = DB::table('tb_daftar_aplikasi')
            ->join('tb_pengembang', 'tb_pengembang.id_pengembang', '=', 'tb_daftar_aplikasi.id_pengembang')
            ->join('tb_perangkat', 'tb_perangkat.id_perangkat', '=', 'tb_daftar_aplikasi.id_perangkat')
            ->join('tb_database', 'tb_database.id_database', '=', 'tb_daftar_aplikasi.id_database')
            ->join('tb_framework_platform', 'tb_framework_platform.id_framework_platform', '=', 'tb_daftar_aplikasi.id_framework_platform')
            ->select('tb_daftar_aplikasi.id_aplikasi', 'tb_daftar_aplikasi.nama_aplikasi', 'tb_daftar_aplikasi.id_perangkat', 'tb_daftar_aplikasi.ip_vps', 'tb_daftar_aplikasi.ip_public'
                , 'tb_perangkat.id_perangkat', 'tb_perangkat.nama_perangkat', 'tb_perangkat.tipe_perangkat', 'tb_perangkat.status_kepemilikan', 'tb_daftar_aplikasi.id_pengembang', 'tb_daftar_aplikasi.waktu_pengembangan', 'tb_daftar_aplikasi.id_pengembang', 'tb_daftar_aplikasi.id_database'
                , 'tb_daftar_aplikasi.id_framework_platform', 'tb_framework_platform.id_framework_platform')
            ->where('tb_daftar_aplikasi.id_aplikasi', $id)->first();
        return view('Aplikasi.edit', compact('data_aplikasi', 'data_perangkat', 'data_pengembang', 'database', 'frame'));
    }


    //baru
    public function edit1($id)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aplikasi = DaftarAplikasi::find($id);
        $aplikasi->update($request->all());
        return redirect()->route('data_aplikasi.index')->with(['success' => 'Berhasil Diedit']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DaftarAplikasi::destroy($id);
    }
}
