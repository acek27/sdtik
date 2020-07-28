@extends('layouts.master')
@section('title')
    <title>Buat Biodata | SDTIK</title>
@endsection
@push('css')
    <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css')}}"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.9/datepicker.min.css')}}">
@endpush
@section('header')
    Buat Biodata Tenaga Teknis Baru
@endsection
@section('link')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">Buat Biodata Tenaga Teknis Baru</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9">
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
            <div class="card card-danger">
                <form action="{{route('daftar.store')}}" method="post">
                    {{ method_field('post') }}
                    {{ csrf_field() }}
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Form Biodata</h3>
                    </div>
                    <div class="card-body">
                        <!-- Date dd/mm/yyyy -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Pilih Divisi:</label>

                            <div class="input-group">
                                <select class="form-control" id="divisi" name="divisi"
                                        style="width: 100%;"
                                        required>
                                    <option selected="selected" value="">-- Pilih Divisi --</option>
                                    @foreach($divisi as $value)
                                        @if (Request::old('divisi') == $value->id_divisi)
                                            <option value="{{$value->id_divisi}}"
                                                    selected>{{$value->nama_divisi}}</option>
                                        @else
                                            <option
                                                value="{{$value->id_divisi}}">{{$value->nama_divisi}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Nama Lengkap & Gelar</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nama"
                                       value="{{old('nama')}}"
                                       id="nama" required>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Tempat Lahir</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <input type="text" name="tempatlahir" class="form-control"
                                       id="tempatlahir"
                                       value="{{old('tempatlahir')}}"
                                       required>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input autocomplete="none" name="tanggallahir" type="text"
                                       class="form-control pull-right datepicker"
                                       id="datepicker" value="{{old('tanggallahir')}}" required>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                </div>
                                <input name="alamat" type="text" class="form-control"
                                       value="{{old('alamat')}}"
                                       id="alamat" required>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>NIK</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input name="nik" type="text" class="form-control" id="nik"
                                       value="{{old('nik')}}" required>
                                @if ($errors->any())
                                    {!! $errors->first('nik', '<p style="font-size: 12px; color:red">ERROR! input NIK harus 16 digit dan Berupa Angka atau data sudah ada.</p>') !!}
                                @endif
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                </div>
                                <input name="email" type="text" class="form-control" id="email"
                                       value="{{old('email')}}" required>
                                @if ($errors->any())
                                    {!! $errors->first('email', '<p style="font-size: 12px; color:red">ERROR! inputkan dengan format e-mail yang benar.</p>') !!}
                                @endif
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>No. Telp</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="hp" id="hp"
                                       value="{{old('hp')}}"
                                       required>
                                @if ($errors->any())
                                    {!! $errors->first('hp', '<p style="font-size: 12px; color:red">ERROR! input No. HP Harus Berupa Angka.</p>') !!}
                                @endif
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin:</label>

                            <div class="input-group">
                                <select class="form-control" id="jeniskelamin" name="jeniskelamin"
                                        style="width: 100%;" required>
                                    <option selected="selected" value="">-- Pilih Jenis Kelamin --
                                    </option>
                                    @foreach($jk as $data)
                                        @if (Request::old('jeniskelamin') == $data->id_jk)
                                            <option value="{{$data->id_jk}}"
                                                    selected>{{$data->jenis_kelamin}}</option>
                                        @else
                                            <option
                                                value="{{$data->id_jk}}">{{$data->jenis_kelamin}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Pendidikan</label>

                            <div class="input-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" name="pendidikan" id="pendidikan"
                                                style="width: 100%;" required>
                                            <option selected="selected" value="">-- Pilih Pendidikan
                                                Terakhir --
                                            </option>
                                            @foreach($pendidikan as $pend)
                                                @if (Request::old('pendidikan') == $pend->id_pendidikan)
                                                    <option value="{{$pend->id_pendidikan}}"
                                                            selected>{{$pend->pendidikan}}</option>
                                                @else
                                                    <option
                                                        value="{{$pend->id_pendidikan}}">{{$pend->pendidikan}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6" style="display: none" id="divjurusan">
                                        <input type="text" name="jurusan" class="form-control" id="jurusan"
                                               placeholder="Masukkan jurusan" value="{{old('jurusan')}}"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>No. Rekening</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                                <input name="no_rekening" type="text" class="form-control"
                                       id="no_rekening"
                                       value="{{old('no_rekening')}}" required>
                                @if ($errors->any())
                                    {!! $errors->first('no_rekening', '<p style="font-size: 12px; color:red">ERROR! input No. Rekening harus Berupa Angka.</p>') !!}
                                @endif
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>No. NPWP</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                                <input type="text" class="form-control" name="npwp" id="npwp"
                                       value="{{old('npwp')}}" required>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password"
                                       value="{{old('dev_team')}}"
                                       id="password" required>
                                @if ($errors->any())
                                    {!! $errors->first('password', '<p style="font-size: 12px; color:red">ERROR! input Password minimal 8 digit.</p>') !!}
                                @endif
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info bg-gradient-blue">SIMPAN
                            </button>
                        </div>
                        <!-- /.form group -->
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col (left) -->
        <div class="col-md-3">
            <h4 class="text-primary"><i class="fas fa-user-check"></i><u>Baru Saja Ditambahkan</u></h4>
            @foreach($add as $new)
                <div class="card card-primary card-outline">

                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                 alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$new->nm_tenaga}}</h3>

                        <p class="text-muted text-center">{{$new->users->created_at->format('l, Y-m-d H:i:s')}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Divisi</b> <a class="float-right">{{$new->divisi->nama_divisi}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a
                                    class="float-right">{{$new->id_jk == 1 ? 'Laki-laki': 'Perempuann'}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>No. HP</b> <a class="float-right">{{$new->telp}}</a>
                            </li>
                        </ul>
                        <a href="{{route('profildetail',$new->id_tenaga)}}" class="btn btn-primary btn-block"><b>Lihat</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
            @endforeach
            <div class="card-footer text-center">
                <a href="{{route('profils')}}">View All</a>
            </div>
        </div>
        <!-- /.col (right) -->
    </div>
@endsection
@push('script')
    <script
        src="{{url('https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.9/datepicker.min.js')}}"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
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
