@extends('layouts.master')
@section('header')
<div class="container-fluid" style="position: relative;
	left: 50%;
	text-align:center;
	vertical-align: middle;
	margin-left: -5px;
	margin-right: -260px;">
    Edit Data
	</div>
@endsection
@section('home')
<a href="{{route('data_ram.index')}}">Kembali</a>
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
              <form role="form" action="{{ route('data_ram.update',$ram->id_ram)}}" method="POST">
              {{method_field('put')}}
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="ukuran_ram">Ukuran Ram</label>
                    <input type="number" class="form-control" name="ukuran_ram" value="{{$ram->ukuran_ram}}" >
					
                    @if ($errors->any())
                        {!! $errors->first('ukuran_ram', '<p style="font-size: 12px; color:red">ERROR! input Ukuran Ram Harus Berupa Angka / Tidak Boleh Sama</p>') !!}
                    @endif
                  </div>
				  <div class="form-group">
                    <label for="ukuran_ram">Satuan Data (GB/MB)</label>
					<select class="form-control" name="keterangan" id="keterangan">
					<option value="{{$ram->keterangan}}">{{$ram->keterangan}}</option>
                    <option value="">Pilih Lainnya</option>
                    <option value="GB">GB</option>
                    <option value="MB">MB</option>
                    </select>
					  @if ($errors->any())
                        {!! $errors->first('keterangan', '<p style="font-size: 12px; color:red">ERROR! input Keterangan Ram Harus Berupa Huruf / Tidak Boleh Sama</p>') !!}
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