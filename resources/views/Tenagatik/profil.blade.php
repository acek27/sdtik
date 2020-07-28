@extends('layouts.master')
@section('title')
    <title>DASHBOARD | SDTIK</title>
@endsection
@push('css')
    <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css')}}"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css')}}">
@endpush
@section('header')
    Dashboard SDTIK
@endsection
@section('link')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
            <li class="breadcrumb-item active">SDTIK</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{$data->nm_tenaga}}</h3>
                    <div class="col-12">
                        <img src="../../dist/img/user1-128x128.jpg" class="product-image" alt="Product Image">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$data->nm_tenaga}}</h3>
                    <p>{{$data->divisi->nama_divisi}}</p>
                    <hr>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Total Project</span>
                                        <span class="info-box-number text-center text-muted mb-0">2300</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">total Laporan Tugas</span>
                                        <span class="info-box-number text-center text-muted mb-0">2000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Kinerja</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-default text-center active">
                            <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                            <br>
                            <i class="fas fa-circle fa-2x text-green"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option2" autocomplete="off">
                            <br>
                            <i class="fas fa-circle fa-2x text-blue"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option3" autocomplete="off">
                            <br>
                            <i class="fas fa-circle fa-2x text-purple"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option4" autocomplete="off">
                            <br>
                            <i class="fas fa-circle fa-2x text-red"></i>
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option5" autocomplete="off">
                            <br>
                            <i class="fas fa-circle fa-2x text-orange"></i>
                        </label>
                    </div>

                    <h4 class="mt-4">Progres Tugas</h4>
                    <div class="col-lg-12">
                        <div class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57"
                                     aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                                </div>
                            </div>
                            <small>
                                57% Complete
                            </small>
                        </div>
                        <br>
                        <p>Tugas yang sedang dikerjakan</p>
                    </div>
                    <div class="col-lg-12 mt-3 mt-3">
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mail-bulk"></i></span>
                                {{$data->email}}
                            </li>
                            <li class="small"><span class="fa-li"><i
                                        class="fas fa-lg fa-phone"></i></span> Phone #: {{$data->telp}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="example1_length"><label>Show <select
                                            name="example1_length" aria-controls="example1"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="example1"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable"
                                       role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 200.226px;">Rendering engine
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 256.892px;">Browser
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 228.003px;">Platform(s)
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 171.337px;">Engine version
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                            style="width: 121.337px;">CSS grade
                                        </th>
                                    </tr>
                                    </thead>
                                   <tbody>

                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

