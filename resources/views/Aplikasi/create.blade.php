@extends('layouts.master')
@section('header')
<div class="container-fluid" style="position: relative;
	left: 50%;
	text-align:center;
	vertical-align: middle;
	margin-left: -5px;
	margin-right: -260px;
	">
    Tambah Data
<div>
@endsection
@section('home')
<a href="{{route('data_aplikasi.index')}}">Kembali</a>
@endsection
@section('page')
    Data Aplikasi
@endsection
@section('content')
<style>

    <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css')}}"
          rel="stylesheet"/>
		  
		
	<link href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

  

    .ui-datepicker-calendar {
        display: none;
    }
   .tm {
        position: relative;
        /*width: 150px; height: 20px;*/
        /*color: white;*/
        
        display: block;
        width: 100%;
        height: 2.4rem;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        align-content: center;
    }

    .tm:before {
        position: absolute;
        top: 10px; left: 3px;
        content: attr(data-date);
        display: block;
        color: #495057;
    }

    .tm::-webkit-datetime-edit, .tm::-webkit-inner-spin-button, .tm::-webkit-clear-button {
        display: none;
    }

    .tm::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 10px;
        right: 0;
        color: #495057;
    }
</style>
<div class="container-fluid" style="position: relative;
	left: 50%;
	margin-left: -270px;">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary" >
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('data_aplikasi.store')}}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group{{ $errors->has('nama_aplikasi') ? ' has-error' : '' }}">
                    <label for="nama_aplikasi">Nama Aplikasi</label>
                    <input type="text" class="form-control" name="nama_aplikasi" value="{{old('nama_aplikasi')}}" placeholder="Nama Aplikasi">
                  </div>
                  <div class="form-group">
                    <label for="ip_vps">Ip Vps</label>
                    <input type="text" class="form-control" name="ip_vps" value="{{old('id_vps')}}" placeholder="Ip Vps">
                    @if ($errors->any())
                        {!! $errors->first('ip_vps', '<p style="font-size: 12px; color:red">ERROR! input Ip Server Tidak Boleh Sama</p>') !!}
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="ip_public">Ip Public</label>
                    <input type="text" class="form-control" name="ip_public" value="{{old('ip_public')}}" placeholder="Ip Public">
                    @if ($errors->any())
                        {!! $errors->first('ip_public', '<p style="font-size: 12px; color:red">ERROR! input Ip Public Tidak Boleh Sama</p>') !!}
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="id_perangkat">Nama Perangkat</label>
                    <select id="perangkat" class="form-control" name="id_perangkat">
                    <option value="">Pilih Nama Perangkat</option>
                    @foreach ($data_perangkat as $perangkat)
                    <option value="{{ $perangkat->id_perangkat }}" {{ old('id_perangkat') == $perangkat->id_perangkat ? 'selected="selected"' : '' }}> Nama Perangkat : {{ $perangkat->nama_perangkat }} || Ip Server : {{ $perangkat->ip_server }}</option>
                    @endforeach    
                    </select>
                    @if ($errors->any())
                        {!! $errors->first('id_perangkat', '<p style="font-size: 12px; color:red">ERROR! Harus Pilih Salah Satu</p>') !!}
                    @endif
                  </div>
				<!--  <div class="form-group">
                    <label for="id_pengembang">Nama Pengembang</label>
                    <select id="id_pengembang" class="form-control" name="id_pengembang">
                    <option value="">Pilih Nama Pengembang 1</option>
					@foreach ($data_aplikasi as $DaftarAplikasi)
                    <option value="{{ $DaftarAplikasi->id_pengembang }}" {{ old('id_pengembang') == $DaftarAplikasi->id_pengembang ? 'selected="selected"' : '' }}> Nama Pengembang : {{ $DaftarAplikasi->id_pengembang }} </option>
                    @endforeach
					</select>
                    @if ($errors->any())
                       {!! $errors->first('id_pengembang', '<p style="font-size: 12px; color:red">ERROR! input Id Pengembang Tidak Boleh Sama</p>') !!}
                    @endif
                  </div>-->
				   <div class="form-group">
                    <label for="id_pengembang">Nama Pengembang </label>
                    <select id="id_pengembang" class="form-control" name="id_pengembang">
                    <option value="">Pilih Nama Pengembang</option>
					@foreach ($data_pengembang as $Pengembang)
                    <option value="{{ $Pengembang->id_pengembang }}" {{ old('id_pengembang') == $Pengembang->id_pengembang ? 'selected="selected"' : '' }}> Id Pengembang : {{ $Pengembang->id_pengembang }} || Nama Pengembang 1 : {{ $Pengembang->nama_pengembang1 }} || Nama Pengembang 2 : {{ $Pengembang->nama_pengembang1 }} || Nama Pengembang 3: {{ $Pengembang->nama_pengembang1 }} </option>
                    @endforeach
					</select>
                    @if ($errors->any())
                       {!! $errors->first('id_pengembang', '<p style="font-size: 12px; color:red">ERROR! input Id Pengembang Tidak Boleh Sama</p>') !!}
                    @endif
					</div>
					<div class="form-group" >
                    
					<label for="waktu_pengembangan">Waktu Pengembangan</label>
					<span class="fas fa-calendar  date-picker"></span>
					<input name="waktu_pengembangan" type="date" class="tm form-control"   id="datepicker" value="{{old('waktu_pengembangan')}}" data-date-format="DD/MMM/YYYY" required autofocus>                  
					
					
					</div>	
					
					
					<div class="form-group">
                    <label for="id_database">Jenis Database Yang Digunakan</label>
                    <select id="id_database" class="form-control" name="id_database">
                    <option value=" ">---Pilih Jenis Database Yang Digunakan---</option>
                    @foreach ($database as $base)
                    <option value="{{ $base->id_database }}" {{ old('id_database') == $base->id_database ? 'selected="selected"' : '' }}> {{ $base->jenis_database }}</option>
                    @endforeach    
                    </select>
                    @if ($errors->any())
                        {!! $errors->first('id_database', '<p style="font-size: 12px; color:red">ERROR! Harus Dipilih Salah satu</p>') !!}
                    @endif
                  </div>
                  <!--code Framework-->
                  <div class="form-group">
                    <label for="id_framework_platform">--Jenis Framework Yg Dipakai & Jenis Platform Yg diHasilkan--</label>
                    <select id="id_framework_platform" class="form-control" name="id_framework_platform">
                    <option value=" ">--Pilih Jenis Framework Yg Dipakai & Jenis Platform Yg diHasilkan--</option>
                    @foreach ($frame as $work)
                    <option value="{{ $work->id_framework_platform }}" {{ old('id_framework_platform') == $work->id_framework_platform ? 'selected="selected"' : '' }}> {{ $work->jenis_framework }} || {{ $work->jenis_platform }}</option>
                    @endforeach    
                    </select>
                    @if ($errors->any())
                        {!! $errors->first('id_framework_platform', '<p style="font-size: 12px; color:red">ERROR! Harus Dipilih Salah satu</p>') !!}
                    @endif
                  </div></div>
				 <!-- 
				  <div class="form-group">
                    <label for="nama_penanggung_jawab">Nama Pengembang 2</label>
                    <input type="text" class="form-control" name="nama_penanggung_jawab" value="{{$perangkat->nama_penanggung_jawab}}">
                  </div>
				  
				  <div class="form-group">
                    <label for="nama_penanggung_jawab">Nama Pengembang 3</label>
                    <input type="text" class="form-control" name="nama_penanggung_jawab" value="{{$perangkat->nama_penanggung_jawab}}">
                  </div>
                </div>-->
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
@push('script')
<script
src="{{url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js')}}">
</script>
<script>
     $(function() {
    $('#datepicker').datepicker({  
       format: 'yyyy-mm-dd',
	});
	 });
</script>
<!--<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js')}}"></script>

    <script src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js')}}"></script>

  <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js')}}"></script>
-->

<!--<link rel="stylesheet" href="{{url('https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css')}}">
  <script src="{{url('https://code.jquery.com/jquery-1.10.2.js')}}"></script>
  <script src="{{url('https://code.jquery.com/ui/1.11.4/jquery-ui.js')}}"></script>
 
<script>
        $('#datepicker').datepicker({  
       format: 'yyyy-mm-dd',
	   autoclose: true,
      
     });  
    </script>
	<!--
<script>
  $(function() {
    $( '#datepicker' ).datepicker({  
       format: 'dd-mm-yyyy',
	   autoclose: true,
      
     });
	   
  });
  </script>-->
<script>
  $(document).ready(function() {
    $('#perangkat').select2();
});
 $(document).ready(function() {
    $('#DaftarAplikasi').select2();
});
</script>
@endpush