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
    <a href="{{route('data_rak.index')}}">Kembali</a>
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
                    <form role="form" action="{{route('data_rak.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nomer_rak">Nomer Rak</label>
                                <input type="text" class="form-control" name="nomer_rak" placeholder="Nomer Rak">
                                @if ($errors->any())
                                    {!! $errors->first('nomer_rak', '<p style="font-size: 12px; color:red">ERROR! input Nomer Rak Harus Berupa Angka / Tidak Boleh Sama</p>') !!}
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
