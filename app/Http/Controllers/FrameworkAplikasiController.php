<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrameworkPlatform;
use Yajra\DataTables\DataTables;

class FrameworkAplikasiController extends Controller
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
        $data_frame = FrameworkPlatform::all();
        return view('FrameworkPlatform.dashboard', compact('data_frame'));
    }
    public function tableframe()
    {
        return DataTables::of(FrameworkPlatform::all())
            ->addColumn('action', function ($data) {
                $del = '<a href="#" data-id="' . $data->id_framework_platform . '" class="hapus-data" style="font-size: 15px"><i style="color:#d9534f" class="fa fa-trash"></i></a>';
                $edit = '<a href="' . route('data_frame.edit', $data->id_framework_platform) . '" style="font-size: 15px"><i style="color:#5cb85c" class="fa fa-edit"></i></a>';
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
       return view('FrameworkPlatform.create');
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
			'jenis_platform' => 'unique:tb_framework_platform|required',
            'jenis_framework' => 'unique:tb_framework_platform|required',
			
        ]);
        FrameworkPlatform::create($request->all());
        return redirect()->route('data_frame.index')->with(['success' => 'Berhasil Disimpan']);
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
        $frame01 = FrameworkPlatform::all()->where('id_framework_platform',$id)->first();
        return view('FrameworkPlatform.edit', compact('frame01'));
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
            'jenis_platform' => 'required',
			'jenis_framework' => 'required',
        ]);
        $frame01 = FrameworkPlatform::find($id);
		$frame01->jenis_platform = $request->get('jenis_platform');
		$frame01->jenis_framework = $request->get('jenis_framework');
        $frame01->update();
        return redirect()->route('data_frame.index')->with(['success' => 'Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FrameworkPlatform::destroy($id);
    }
}
