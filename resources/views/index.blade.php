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
                {!! Form::open(['url'=>route('daftar.store')]) !!}
                @csrf
                @include('Tenagatik._form')

                <div class="form-group">
                    {!! Form::submit('Simpan', [
                        'class'=>'btn btn-primary',
                        'id' => 'save'
                    ]) !!}
                </div>
                <!-- /.form group -->
            </div>
        {!! Form::close() !!}
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
                    <a href="{{route('profildetail',$new->id_tenaga)}}"
                       class="btn btn-primary btn-block"><b>Lihat</b></a>
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
