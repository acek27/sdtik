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
        $jk = jeniskelamin::all();
        $divisi = divisi::all();
        $pendidikan = pendidikan::all();
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
        $divisi = $request->get('divisi');
        $nama = $request->get('nama');
        $tempatlahir = $request->get('tempatlahir');
        $tanggallahir = $request->get('tanggallahir');
        $alamat = $request->get('alamat');
        $nik = $request->get('nik');
        $email = $request->get('email');
        $hp = $request->get('hp');
        $jeniskelamin = $request->get('jeniskelamin');
        $pendidikan = $request->get('pendidikan');
        $jurusan = $request->get('jurusan');
        $no_rekening = $request->get('no_rekening');
        $npwp = $request->get('npwp');

        $request->validate([
            'tanggallahir' => 'date|required',
            'nik' => 'numeric|digits:16|required|unique:tb_tenagateknis',
            'hp' => 'numeric|required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $nama;
        $user->email = $email;
        $user->password = Hash::make($request->get('password'));
        $user->role_id = '2';
        $user->save();

        $cek = User::where('name', $nama)->where('email', $email);
        if ($cek->exists()) {
            $user_id = User::where('name', $nama)->where('email', $email)->value('id');
            $tenaga = new tenagateknis();
            $tenaga->nm_tenaga = $nama;
            $tenaga->tempat_lahir = $tempatlahir;
            $tenaga->tgl_lahir = $tanggallahir;
            $tenaga->alamat = $alamat;
            $tenaga->nik = $nik;
            $tenaga->email = $email;
            $tenaga->telp = $hp;
            $tenaga->id_jk = $jeniskelamin;
            $tenaga->id_pendidikan = $pendidikan;
            $tenaga->prog_studi = $jurusan;
            $tenaga->npwp = $npwp;
            $tenaga->no_rekening = $no_rekening;
            $tenaga->id_divisi = $divisi;
            $tenaga->user_id = $user_id;
            $tenaga->save();
        }

        \Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan, $nama!"
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
        //
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
        //
    }
}
