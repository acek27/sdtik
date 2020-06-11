@extends('layouts.master')
@section('title')
    <title>LAPORAN HARIAN</title>
@endsection
@section('css')
<link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css')}}"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('header')
    <section class="content-header">
        <h1>
            Data Laporan Harian
        </h1>
        
    </section>
@endsection




@section('content')
@if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
      </div>
    @endif
    <section class="content">
        <div class="box row col-sm">
            
            
		<div class="row">
  
  </div>
    	<div class="box-body form-inline ml-3">
  
 
	@foreach($tb_laporan_harian as $p)
	<form action="{{ url('/laporan_hari/update') }}" method="post">
	
		{{ csrf_field() }}
		<input type="hidden" name="id_laporan_harian" value="{{ $p->id_laporan_harian }}"> <br/>
		Nama Tenaga<input type="text" required="required" name="nm_tenaga" value="{{ $p->nm_tenaga }}"> <br/>
		Nama Divisi<input type="text" required="required" name="nama_divisi" value="{{ $p->nama_divisi }}"> <br/>
		Tanggal <input type="date" required="required" name="tanggal" value="{{ $p->tanggal }}"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</section>
@endsection