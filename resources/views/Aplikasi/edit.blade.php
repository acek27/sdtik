@extends('layouts.master')
@section('header')
<div class="container-fluid" style="position: relative;
	left: 50%;
	text-align:center;
	vertical-align: middle;
	margin-left: -5px;
	margin-right: -260px;
	">
    Edit Data
	</div>
@endsection
@section('home')
<a href="{{route('data_aplikasi.index')}}">Kembali</a>
@endsection
@section('page')
    Data Aplikasi
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
              <form role="form" action="{{route('data_aplikasi.update',$data_aplikasi->id_aplikasi)}}" method="POST">
              {{method_field('put')}}
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_aplikasi">Nama Aplikasi</label>
                    <input type="text" class="form-control" name="nama_aplikasi" value="{{$data_aplikasi->nama_aplikasi}}">
                  </div>
                  <div class="form-group">
                    <label for="ip_vps">Ip Vps</label>
                    <input type="text" class="form-control" name="ip_vps" value="{{$data_aplikasi->ip_vps}}">
                  </div>
                  <div class="form-group">
                    <label for="ip_public">Ip Public</label>
                    <input type="text" class="form-control" name="ip_public" value="{{$data_aplikasi->ip_public}}">
                  </div>
                  <div class="form-group">
                    <label for="id_perangkat">Nama Perangkat</label>
                    <select class="form-control" name="id_perangkat">
                    <option>Pilih Nama Perangkat</option>
                    @foreach ($data_perangkat as $perangkat)
                    <option value="{{ $perangkat->id_perangkat }}" {{ $perangkat->id_perangkat == $data_aplikasi->id_perangkat ? 'selected="selected"' : '' }}> {{ $perangkat->nama_perangkat }} (Tipe : {{ $perangkat->tipe_perangkat }} & Kepemilikan : {{ $perangkat->status_kepemilikan }})</option>
                    @endforeach    
                    </select>
                  </div>
				  <div class="form-group">
                    <label for="id_pengembang">Nama Pengembang </label>
                    <select id="id_pengembang" class="form-control" name="id_pengembang">
					
					<option value="">Pilih Nama Pengembang</option>
					@foreach ($data_pengembang as $Pengembang )
                    <option value="{{ $Pengembang->id_pengembang }}" {{ $Pengembang->id_pengembang == $data_aplikasi->id_pengembang ? 'selected="selected"' : '' }}> {{ $Pengembang->id_pengembang }} ( Nama Pengembang 1 : {{ $Pengembang->nama_pengembang1 }} & Nama Pengembang 2 : {{ $Pengembang->nama_pengembang2 }} & Nama Pengembang 3: {{ $Pengembang->nama_pengembang3 }})</option>
         
					@endforeach
					</select>
                    @if ($errors->any())
                       {!! $errors->first('id_pengembang', '<p style="font-size: 12px; color:red">ERROR! input Id Pengembang Tidak Boleh Sama</p>') !!}
                    @endif
                  </div>
				  
				  <div class="form-group" > 
					<label for="waktu_pengembangan">Waktu Pengembangan</label>
					<span class="fas fa-calendar  date-picker"></span>
					<input name="waktu_pengembangan" type="date" class="form-control"   id="datepicker" value="{{$data_aplikasi->waktu_pengembangan}}" data-date-format="DD/MMM/YYYY" required autofocus>                  
					</div>	
					
				    <div class="form-group">
                    <label for="id_database">Jenis Database Yang Digunakan</label>
                    <select id="id_database" class="form-control" name="id_database">
                    <option value=" ">---Pilih Jenis Database Yang Dipakai---</option>
                    @foreach ($database as $base )
                    <option value="{{ $base->id_database }}" {{ $base->id_database == $data_aplikasi->id_database ? 'selected="selected"' : '' }}> {{ $base->jenis_database }}</option>
                    @endforeach
                  </select>
                    @if ($errors->any())
                       {!! $errors->first('id_database', '<p style="font-size: 12px; color:red">ERROR! input Id Pengembang Tidak Boleh Sama</p>') !!}
                    @endif
                  </div>	
                  <!--code Framework-->
                  <div class="form-group">
                    <label for="id_framework_platform">Jenis Framework Yg Dipakai & Jenis Platform Yg diHasilkan</label>
                    <select id="id_framework_platform" class="form-control" name="id_framework_platform">
                    <option value=" ">--Pilih Jenis Framework Yg Dipakai & Jenis Platform Yg diHasilkan--</option>
                    @foreach ($frame as $work )
                    <option value="{{ $work->id_framework_platform }}" {{ $work->id_framework_platform == $data_aplikasi->id_framework_platform ? 'selected="selected"' : '' }}> {{ $work->jenis_framework }} || {{ $work->jenis_platform }}</option>
                    @endforeach
                  </select>
                    @if ($errors->any())
                       {!! $errors->first('id_framework_platform', '<p style="font-size: 12px; color:red">ERROR! input Id Pengembang Tidak Boleh Sama</p>') !!}
                    @endif
                  </div>		
					<!--code platform-->
				
				  
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
@endpush