<?php

namespace App\Http\Controllers;

use App\divisi;
use App\jeniskelamin;
use App\pendidikan;
use App\Penilaian_indikator;
use App\Reportnoc;
use App\tenagateknis;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class tenagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $add = tenagateknis::orderBy('id_tenaga', 'desc')->get()->take(2);
        $jk = jeniskelamin::pluck('jenis_kelamin', 'id_jk')->all();
        $divisi = divisi::pluck('nama_divisi', 'id_divisi')->all();
        $pendidikan = pendidikan::pluck('pendidikan', 'id_pendidikan')->all();
        return view('index', compact('jk', 'divisi', 'pendidikan', 'add'));
    }

    public function profils()
    {
        $profils = tenagateknis::all();
        return view('Tenagatik.all_tenaga', compact('profils'));
    }

    public function profildetail($id)
    {
        $data = tenagateknis::find($id);
        return view('Tenagatik.profil', compact('data'));
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
     * @return \Illuminate\Http\RedirectResponse
     */


    public function store(Request $request)
    {
        $this->validate($request, User::$rulesCreate);
        $user = new User();
        $user->name = $request->get('nm_tenaga');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role_id = '2';
        $user->save();

        $cek = User::where('name', $request->get('nm_tenaga'))->where('email', $request->get('email'));
        if ($cek->exists()) {
            $this->validate($request, tenagateknis::$rulesCreate);
            $user_id = User::where('name', $request->get('nm_tenaga'))->where('email', $request->get('email'))->value('id');
            $request->merge(['user_id' => $user_id]);
            tenagateknis::create($request->all());
        }

        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan, " . $request->get('nm_tenaga')
        ]);
        return redirect()->route('homes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $add = tenagateknis::orderBy('id_tenaga', 'desc')->get()->take(2);
        $jk = jeniskelamin::pluck('jenis_kelamin', 'id_jk')->all();
        $divisi = divisi::pluck('nama_divisi', 'id_divisi')->all();
        $pendidikan = pendidikan::pluck('pendidikan', 'id_pendidikan')->all();
        $data = tenagateknis::find($id);
        return view('Tenagatik.edit', compact('jk', 'divisi', 'pendidikan', 'add', 'data'));
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
        $data = tenagateknis::find($id);
        $this->validate($request, tenagateknis::rulesEdit($data));
        $data->update($request->all());
        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan, " . $request->get('nm_tenaga')
        ]);
        return redirect()->route('homes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
