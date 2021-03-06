<?php

namespace App\Http\Controllers;

use App\divisi;
use App\jeniskelamin;
use App\pendidikan;
use App\tenagateknis;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = tenagateknis::all()->take(4);
        $donat = tenagateknis::select(DB::raw('count(*) as total'))->groupby('id_pendidikan')->get();
        $chart = tenagateknis::select('id_divisi', DB::raw('count(*) as total'))->groupby('id_divisi')->get();

        $re = [0, 0, 0, 0];
        foreach ($chart as $key => $value) {
            $re[$value->id_divisi - 1] = $value->total;
        }
        $data1 = implode(', ', $re);
        return view('dashboards', compact('data', 'data1', 'donat'));
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
        return view('datatenaga', compact('dataid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $jk = jeniskelamin::all();
        $divisi = divisi::all();
        $pendidikan = pendidikan::all();
        $biodata = tenagateknis::join('tb_jk', 'tb_tenagateknis.id_jk', '=', 'tb_jk.id_jk')
            ->join('tb_pendidikanterakhir', 'tb_tenagateknis.id_pendidikan', '=', 'tb_pendidikanterakhir.id_pendidikan')
            ->join('tb_divisi', 'tb_tenagateknis.id_divisi', '=', 'tb_divisi.id_divisi')
            ->where('id_tenaga', $id)->first();
        return view('edittenaga', compact('biodata', 'jk', 'divisi', 'pendidikan'));
    }

    public function datatenaga(Request $request)
    {
        if ($request->id == 0) {
            return DataTables::of(tenagateknis::join('tb_divisi', 'tb_tenagateknis.id_divisi', '=', 'tb_divisi.id_divisi'))
                ->addColumn('action', function ($data) {
                    $edit = '<a href="' . route('daftar.edit', $data->id_tenaga) . '" class="edit-data"><i class="fa fa-edit text-primary"></i></a>';
                    $detail = '<a href="#" data-id="' . $data->user_id . '" class="show-data"><i class="fas fa-search text-success"></i></a>';
                    $del = '<a href="#" class="hapus-data" data-id="' . $data->user_id . '" ><i class="fa fa-trash text-danger"></i></a>';
                    return $edit . '&nbsp' . '&nbsp' . $detail . '&nbsp' . $del;

                })->make(true);
        } else {
            return DataTables::of(tenagateknis::join('tb_jk', 'tb_tenagateknis.id_jk', '=', 'tb_jk.id_jk')
                ->where('tb_tenagateknis.id_divisi', $request->id))
                ->addColumn('action', function ($data) {
                    $detail = '<a href="#" data-id="' . $data->user_id . '" class="show-data"><i class="fas fa-search"></i></a>';
                    return $detail;
                })->make(true);
        }
    }

    public function biodata($id)
    {
        $biodata = tenagateknis::join('tb_jk', 'tb_tenagateknis.id_jk', '=', 'tb_jk.id_jk')
            ->join('tb_pendidikanterakhir', 'tb_tenagateknis.id_pendidikan', '=', 'tb_pendidikanterakhir.id_pendidikan')
            ->join('tb_divisi', 'tb_tenagateknis.id_divisi', '=', 'tb_divisi.id_divisi')
            ->where('user_id', $id)->first();
        return $biodata;
    }

    public function download()
    {
        $download = tenagateknis::join('tb_jk', 'tb_tenagateknis.id_jk', '=', 'tb_jk.id_jk')
            ->join('tb_pendidikanterakhir', 'tb_tenagateknis.id_pendidikan', '=', 'tb_pendidikanterakhir.id_pendidikan')
            ->join('tb_divisi', 'tb_tenagateknis.id_divisi', '=', 'tb_divisi.id_divisi')->get();
        return view('download', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
//        tenagateknis::where('user_id', $id)->delete();
    }
}
