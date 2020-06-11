<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisDatabase;
use Yajra\DataTables\DataTables;

class DatabaseController extends Controller
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
        $data_base = JenisDatabase::all();
        return view('Database.dashboard', compact('data_base'));
    }
    public function tablebase()
    {
        return DataTables::of(JenisDatabase::all())
            ->addColumn('action', function ($data) {
                $del = '<a href="#" data-id="' . $data->id_database . '" class="hapus-data" style="font-size: 15px"><i style="color:#d9534f" class="fa fa-trash"></i></a>';
                $edit = '<a href="' . route('data_base.edit', $data->id_database) . '" style="font-size: 15px"><i style="color:#5cb85c" class="fa fa-edit"></i></a>';
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
       return view('Database.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_database' => 'unique:tb_database|required',
        ]);
        JenisDatabase::create($request->all());
        return redirect()->route('data_base.index')->with(['success' => 'Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $base = JenisDatabase::all()->where('id_database',$id)->first();
        return view('Database.edit', compact('base'));
        // return $ram;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_database' => 'required',
        ]);
        $base01 = JenisDatabase::find($id);
        $base01->jenis_database = $request->get('jenis_database');
        $base01->update();
        return redirect()->route('data_base.index')->with(['success' => 'Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisDatabase::destroy($id);
    }
}
