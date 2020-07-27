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
    <a href="{{route('data_core.index')}}">Kembali</a>
@endsection
@section('page')
    Data Core
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
                    <form role="form" action="{{route('data_core.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jumlah_core">Jumlah Core</label>
                                <input type="text" class="form-control" name="jumlah_core"
                                       value="{{old('jumlah_core')}}" placeholder="Jumlah Core">
                                @if ($errors->any())
                                    {!! $errors->first('jumlah_core', '<p style="font-size: 12px; color:red">ERROR! input Jumlah Core Harus Berupa Angka / Tidak Boleh Sama</p>') !!}
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
