@extends('layouts.master')
@section('header')
    <div class="container-fluid" style="position: relative;
	left: 50%;
	text-align:center;
	vertical-align: middle;
	margin-left: -5px;
	margin-right: -260px;">
        Tambah Data
    </div>
@endsection
@section('home')
    <a href="{{route('data_frame.index')}}">Kembali</a>
@endsection
@section('page')
    Data Ram
@endsection
@section('content')
    <div class="container-fluid" style="position: relative;
	left: 50%;
	margin-left: -270px;">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('data_frame.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenis_platform">Jenis Platform Aplikasi</label>
                                <input type="text" class="form-control" name="jenis_platform"
                                       value="{{old('jenis_platform')}}"
                                       placeholder="masukan Jenis Framework Aplikasi Yang Digunakan">
                                @if ($errors->any())
                                    {!! $errors->first('jenis_platform', '<p style="font-size: 12px; color:red">ERROR! input harus diisi / Tidak Boleh Sama</p>') !!}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jenis_framework">Jenis Framework Aplikasi</label>
                                <input type="text" class="form-control" name="jenis_framework"
                                       value="{{old('jenis_framework')}}"
                                       placeholder="masukan Jenis Framework Aplikasi Yang Digunakan">
                                @if ($errors->any())
                                    {!! $errors->first('jenis_framework', '<p style="font-size: 12px; color:red">ERROR! input harus diisi / Tidak Boleh Sama</p>') !!}
                                @endif
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
