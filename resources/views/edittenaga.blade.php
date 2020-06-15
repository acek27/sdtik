@extends('layouts.master')
@section('title')
    <title>DATA TENAGA TEKNIS TIK</title>
@endsection
@section('css')
    <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css')}}"
          rel="stylesheet"/>
@endsection
@section('header')


    <div class="col-md-18" style="position: relative;
	left: 50%;

text-align:center;

vertical-align: middle;
	margin-left: -9px;

margin-right: -100px;
	">


        <h4 class="card ">
            DATA TENAGA TEKNIS TIK
            <small>Dinas Kominfo dan Persandian</small>
        </h4>
    </div>
@endsection

@section('content')
    <style>
        .form-horizontal {

        }
    </style>

    <section class="content">
        <div class="container-fluid" style="position: relative;
	left: 50%;
	margin-left: -310px;">

            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Pengisian Formulir</h3>
                                </div>
                                @if (session()->has('flash_notification.message'))
                                    <div class="alert alert-{{ session()->get('flash_notification.level') }}">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        {!! session()->get('flash_notification.message') !!}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <p>Terjadi Kesalahan, isi data dengan benar!</p>
                                    </div>
                            @endif
                            <!-- /.box-header -->
                                <!-- form start -->

                                <form action="{{ route('homes.update',$biodata->id_tenaga) }}" class="form-horizontal"
                                      method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="divisi" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Divisi</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="divisi" name="divisi"
                                                        style="width: 100%;"
                                                        required>
                                                    <option selected="selected" value="">-- Pilih Divisi --</option>
                                                    @foreach($divisi as $value)
                                                        @if ($biodata->id_divisi == $value->id_divisi)
                                                            <option value="{{$value->id_divisi}}"
                                                                    selected>{{$value->nama_divisi}}</option>
                                                        @else
                                                            <option
                                                                value="{{$value->id_divisi}}">{{$value->nama_divisi}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="nama" class="col-sm-3 control-label" style="font-size: 12pt">Nama
                                                Lengkap & Gelar</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama"
                                                       value="{{$biodata->nm_tenaga}}"
                                                       id="nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="tempatlahir" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Tempat
                                                lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="tempatlahir" class="form-control"
                                                       id="tempatlahir"
                                                       value="{{$biodata->tempat_lahir}}"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="tanggallahir" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Tanggal Lahir</label>
                                            <div class="input-group date" style="margin-top: 0pt">
                                                <div class="col-sm-12">
                                                    <input name="tanggallahir" type="text"
                                                           class="form-control pull-right datepicker"
                                                           id="datepicker" value="{{$biodata->tgl_lahir}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="alamat" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Alamat Lengkap</label>
                                            <div class="col-sm-8">
                                                <input name="alamat" type="text" class="form-control"
                                                       value="{{$biodata->alamat}}"
                                                       id="alamat" required>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="nik" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">NIK</label>
                                            <div class="col-sm-8">
                                                <input name="nik" type="number" class="form-control" id="nik"
                                                       value="{{$biodata->nik}}" required>
                                                @if ($errors->any())
                                                    {!! $errors->first('nik', '<p style="font-size: 12px; color:red">ERROR! input NIK harus 16 digit dan Berupa Angka.</p>') !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="email" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">E-mail</label>
                                            <div class="col-sm-8">
                                                <input name="email" type="text" class="form-control" id="email"
                                                       value="{{$biodata->email}}" required>
                                                @if ($errors->any())
                                                    {!! $errors->first('email', '<p style="font-size: 12px; color:red">ERROR! inputkan dengan format e-mail yang benar.</p>') !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="hp" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">No. HP</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="hp" id="hp"
                                                       value="{{$biodata->telp}}"
                                                       required>
                                                @if ($errors->any())
                                                    {!! $errors->first('hp', '<p style="font-size: 12px; color:red">ERROR! input No. HP Harus Berupa Angka.</p>') !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="jeniskelamin" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Jenis Kelamin</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="jeniskelamin" name="jeniskelamin"
                                                        style="width: 100%;" required>
                                                    <option selected="selected" value="">-- Pilih Jenis Kelamin --
                                                    </option>
                                                    @foreach($jk as $data)
                                                        @if ($biodata->id_jk == $data->id_jk)
                                                            <option value="{{$data->id_jk}}"
                                                                    selected>{{$data->jenis_kelamin}}</option>
                                                        @else
                                                            <option
                                                                value="{{$data->id_jk}}">{{$data->jenis_kelamin}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="pendidikan" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Pendidikan
                                                Terakhir</label>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="pendidikan" id="pendidikan"
                                                            style="width: 100%;" required>
                                                        <option selected="selected" value="">-- Pilih Pendidikan
                                                            Terakhir --
                                                        </option>
                                                        @foreach($pendidikan as $pend)
                                                            @if ($biodata->id_pendidikan == $pend->id_pendidikan)
                                                                <option value="{{$pend->id_pendidikan}}"
                                                                        selected>{{$pend->pendidikan}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$pend->id_pendidikan}}">{{$pend->pendidikan}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="jurusan" class="form-control" id="jurusan"
                                                           placeholder="Masukkan jurusan"
                                                           value="{{$biodata->prog_studi}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="npwp" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Nomor NPWP</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="npwp" id="npwp"
                                                       value="{{$biodata->npwp}}" required>

                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="no_rekening" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Nomor Rekening</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="no_rekening"
                                                       id="no_rekening"
                                                       value="{{$biodata->no_rekening}}" required>

                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 0px">
                                            <label for="dev_team" class="col-sm-3 control-label"
                                                   style="font-size: 12pt">Nama Dev Team</label>

                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="dev_team"
                                                       value="{{$biodata->dev_team}}"
                                                       id="dev_team" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer" style="margin-bottom:20px;">
                                        <button type="submit" class="btn btn-info" style="position: relative;
	left: 50%;
	margin-left: -70px;">SIMPAN
                                        </button>
                                    </div>

                                    <!-- /.box-footer -->
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js')}}"></script>
    <script>
        $(function () {
            $('#datepicker').datepicker({
                format: 'yyyy-m-d',
                autoclose: true,
            });
            $('.select2').select2()
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#pendidikan').change(function () {
                $("#divjurusan").fadeIn();
            });
        });
    </script>
@endpush
