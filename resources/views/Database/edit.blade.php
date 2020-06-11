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
<a href="{{route('data_base.index')}}">Kembali</a>
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
              <form role="form" action="{{ route('data_base.update',$base->id_database)}}" method="POST">
              {{method_field('put')}}
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="jenis_database">Jenis Database</label>
                    <input type="text" class="form-control" name="jenis_database" value="{{$base->jenis_database}}" >
                    @if ($errors->any())
                        {!! $errors->first('jenis_database', '<p style="font-size: 12px; color:red">ERROR! input tidak boleh kosong / Tidak Boleh Sama</p>') !!}
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