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
    <a href="{{route('data_hdd.index')}}">Kembali</a>
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
                    <form role="form" action="{{route('data_hdd.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ukuran_hdd">Kapasitas Hdd</label>
                                <input type="number" class="form-control" name="ukuran_hdd"
                                       value="{{old('ukuran_hdd')}}" placeholder="Ukuran Hdd">
                                @if ($errors->any())
                                    {!! $errors->first('ukuran_hdd', '<p style="font-size: 12px; color:red">ERROR! input Kapasitas Hdd Harus Berupa Angka / Tidak Boleh Sama</p>') !!}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Satuan Data(GB/TERA)</label>
                                <select class="form-control" name="keterangan" id="keterangan">
                                    <option value="">Pilih(GB/TERA)</option>
                                    <option value="GB">GB</option>
                                    <option value="TERA">TERA</option>
                                </select>
                                @if ($errors->any())
                                    {!! $errors->first('keterangan', '<p style="font-size: 12px; color:red">ERROR! input Keterangan Harus Berupa Karakter</p>') !!}
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
