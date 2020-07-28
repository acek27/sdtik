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
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$data->where('id_divisi',1)->count('id_tenaga')}}<sup style="font-size: 20px"> Orang</sup>
                    </h3>

                    <p>Programming</p>
                </div>
                <div class="icon">
                    <i class="fa fa-code"></i>
                </div>
                <a href="{{route('homes.show',1)}}  " class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$data->where('id_divisi',2)->count('id_tenaga')}}<sup style="font-size: 20px"> Orang</sup>
                    </h3>
                    <p>Networking</p>
                </div>
                <div class="icon">
                    <i class="fa fa-sitemap"></i>
                </div>
                <a href="{{route('homes.show',2)}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$data->where('id_divisi',3)->count('id_tenaga')}}<sup style="font-size: 20px"> Orang</sup>
                    </h3>

                    <p>Multimedia</p>
                </div>
                <div class="icon">
                    <i class="fa fa-image"></i>
                </div>
                <a href="{{route('homes.show',3)}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$data->where('id_divisi',4)->count('id_tenaga')}}<sup style="font-size: 20px"> Orang</sup>
                    </h3>

                    <p>Keamanan Informasi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-key"></i>
                </div>
                <a href="{{route('homes.show',4)}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <section class="col-lg-7 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Grafik Tenaga Teknis
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="myChart" style="height:230px"></canvas>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <canvas id="myChart" style="height:230px"></canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <section class="col-lg-5 connectedSortable ui-sortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-graduation-cap"></i>
                        Data Pendidikan
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="donat" style="height:230px; "></canvas>
                </div>
                <!-- /.card-body-->
            </div>
            <!-- /.card -->

        </section>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Tenaga TIK</h3>
            <a href="{{route('download')}}" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Download</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="data_tenaga" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Tenaga Teknis</th>
                    <th>Tanggal Lahir</th>
                    <th>No. HP</th>
                    <th>Divisi</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Galeri Tenaga Teknis</h3>

                <div class="card-tools">
                    <span class="badge badge-danger">{{$data->count('id')}} Tenaga Teknis</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="users-list clearfix">
                    @foreach($data as $galeri)
                        <li>
                            <img src="dist/img/user1-128x128.jpg" alt="User Image">
                            <a class="users-list-name" href="#">{{$galeri->nm_tenaga}}</a>
                            <span class="users-list-date">{{$galeri->divisi->nama_divisi}}</span>
                        </li>
                    @endforeach
                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="#">View All Users</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!--/.card -->
    </div>
    <!-- /.card -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i>
                        Biodata Tenaga Teknis
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-header">
                    <!--<h4>Biodata Tenaga Teknis TIk</h4>-->
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Divisi</th>
                                <td><p id="divisi"></td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td><p id="nik"></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap & Gelar</th>
                                <td><p style="text-transform: capitalize" id="nm_tenaga"></td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td id="ttl" style="text-transform: capitalize"></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td id="alamat" style="text-transform: capitalize"></td>
                            </tr>
                            <tr>
                                <th>E-Mail</th>
                                <td id="email"></td>
                            </tr>
                            <tr>
                                <th>No. HP</th>
                                <td id="hp"></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td id="jk"></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td id="pendidikan"></td>
                            </tr>
                            <tr>
                                <th>No Rekening</th>
                                <td id="no_rekening"></td>
                            </tr>
                            <tr>
                                <th>NPWP</th>
                                <td id="npwp"></td>
                            </tr>
                            <tr>
                                <th>Nama Dev Team</th>
                                <td id="dev_team"></td>
                            </tr>

                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{url('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var dt = $('#data_tenaga').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('tenaga.data')}}',
                columns: [
                    {data: 'nik', name: 'nik'},
                    {data: 'nm_tenaga', name: 'nm_tenaga'},
                    {data: 'tgl_lahir', name: 'tgl_lahir'},
                    {data: 'telp', name: 'telp'},
                    {data: 'nama_divisi', name: 'nama_divisi', orderable: false, searchable: false, align: 'center'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, align: 'center'},
                ],
            });
        });

        $('body').on("click", '.show-data', function (e) {
            $('#myModal').modal("show");
            $.get("{{url('/biodata')}}/" + $(this).attr('data-id'), function (data) {
                console.log(data);
                $('#divisi').text(data.nama_divisi);
                $('#nik').text(data.nik);
                $('#nm_tenaga').text(data.nm_tenaga);
                $('#ttl').text(data.tempat_lahir + ', ' + data.tgl_lahir);
                $('#alamat').text(data.alamat);
                $('#email').text(data.email);
                $('#hp').text(data.telp);
                $('#jk').text(data.jenis_kelamin);
                $('#pendidikan').text(data.pendidikan + ', ' + data.prog_studi);
                $('#no_rekening').text(data.no_rekening);
                $('#npwp').text(data.npwp);
                $('#dev_team').text(data.dev_team);
            });
        });
    </script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js')}}"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Programming', 'Networking', 'Multimedia', 'Keamanan Informasi'],
                datasets: [{
                    label: 'Tenaga Teknis TIK',
                    data: [
                        {{$data1}}
                    ],
                    backgroundColor: [
                        'rgba(0, 192, 239, 1)',
                        'rgba(0, 166, 90, 1)',
                        'rgba(243, 156, 18, 1)',
                        'rgba(221, 75, 57, 1)',
                    ],
                    borderColor: [
                        'rgba(0, 192, 239, 1)',
                        'rgba(0, 166, 90, 1)',
                        'rgba(243, 156, 18, 1)',
                        'rgba(221, 75, 57, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            userCallback: function (label, index, labels) {
                                // when the floored value is the same as the value we have a whole number
                                if (Math.floor(label) === label) {
                                    return label;
                                }

                            },
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return tooltipItem.yLabel;
                        }
                    }
                }
            }
        });

        var nut = document.getElementById('donat').getContext('2d');
        var donat = new Chart(nut, {
            type: 'doughnut',
            data: {
                labels: ['SMA/SMK', 'Diploma 1', 'Diploma 3', 'Diploma 4 / Strata 1', 'S2'],
                datasets: [{
                    label: 'Tenaga Teknis TIK',
                    data: [
                        @foreach($donat as $donut)
                        {{$donut->total}},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(245, 245, 245, 1)',
                        'rgba(191, 191, 191, 1)',
                    ],
                    borderColor: [
                        'rgba(191, 191, 191, 1)',
                        'rgba(245, 245, 245, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: "white",
                        fontSize: 15
                    }
                },
            }
        });
    </script>
@endpush
