@extends('layouts.master')
@section('title')
    <title>DATA TENAGA TEKNIS TIK</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('header')
    <section class="content-header">
        <h1>
            Data Tenaga Teknis TIK
            <small>
                @if($dataid == 1)
                    Divisi Programming
                @elseif($dataid == 2)
                    Divisi Networking
                @elseif($dataid == 3)
                    Divisi Multimedia
                @elseif($dataid == 4)
                    Divisi Keamanan Informasi
                @endif
            </small>
        </h1>

    </section>
@endsection

@section('content')
    <div class="card">
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


                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!--  <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	-->
    <script>
        $(document).ready(function () {
            var dt = $('#data_tenaga').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('tenaga.data')}}?id={{$dataid}}',
                columns: [
                    {data: 'nik', name: 'nik'},
                    {data: 'nm_tenaga', name: 'nm_tenaga'},
                    {data: 'tgl_lahir', name: 'tgl_lahir'},
                    {data: 'telp', name: 'telp'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, align: 'center'},
                ]
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
@endpush
