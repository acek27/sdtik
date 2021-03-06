@extends('layouts.master')

@section('header')
    <div class="container-fluid" style="position: relative;
	left: 50%;
	text-align:center;
	vertical-align: middle;
	margin-left: -5px;
	margin-right: -260px;">
        Data Aplikasi
    </div>
@endsection
@section('home')
    Home
@endsection
@section('page')
    Data
@endsection
<body style="height: auto; width:max-content">
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="col-sm-12">
        <a href="{{route('data_aplikasi.create')}}" class="btn btn-primary float-right">Tambah Data</a>
    </div>
    <br>
    <br>
    <div class="box-body">
        <div class="table-responsive-sm">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Aplikasi</th>
                    <th>Nama Perangkat</th>
                    <th>Jenis Database Yang Digunakan</th>
                    <th>Framework Yang Digunakan</th>
                    <th>Platform Yang Dihasilkan</th>
                    <th>Ip Server</th>
                    <th>Ip Vps</th>
                    <th>Ip Public</th>
                    <th>Nama Pengembang</th>
                    <th>Waktu Pengembangan</th>
                    <th>Aksi</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            var dt = $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('table.aplikasi')}}',
                "fnCreatedRow": function (row, data, index) {
                    $('td', row).eq(0).html(index + 1)
                },
                columns: [{
                    data: 'id_aplikasi',
                    name: 'id_aplikasi'
                },
                    {
                        data: 'nama_aplikasi',
                        name: 'nama_aplikasi'
                    },
                    {
                        data: 'nama_perangkat',
                        name: 'nama_perangkat'
                    },
                    {
                        data: 'id_database',
                        name: 'id_database'
                    },
                    {
                        data: 'framework_platform',
                        name: 'framework_platform'
                    },

                    {
                        data: 'id_framework_platform',
                        name: 'id_framework_platform'
                    },

                    {
                        data: 'ip_server',
                        name: 'ip_server'
                    },
                    {
                        data: 'ip_vps',
                        name: 'ip_vps'
                    },
                    {
                        data: 'ip_public',
                        name: 'ip_public'
                    },
                    {
                        data: 'id_pengembang',
                        name: 'id_pengembang',
                    },
                    {
                        data: 'waktu_pengembangan',
                        name: 'waktu_pengembangan',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        align: 'center',
                        width: '100px'
                    },

                ]
            });
            var del = function (id) {
                swal({
                    title: "Apakah anda yakin?",
                    text: "Anda tidak dapat mengembalikan data yang sudah terhapus!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya!",
                    cancelButtonText: "Tidak!",
                }).then(
                    function (result) {
                        $.ajax({
                            url: "data_aplikasi/" + id + "/delete",
                            method: "DELETE",
                        }).done(function (msg) {
                            dt.ajax.reload();
                            swal("Deleted!", "Data sudah terhapus.", "success");
                        }).fail(function (textStatus) {
                            alert("Request failed: " + textStatus);
                        });
                    }, function (dismiss) {
                        // dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                        swal("Cancelled", "Data batal dihapus", "error");
                    });
            };
            $('body').on('click', '.hapus-data', function () {
                del($(this).attr('data-id'));
            });
        });
    </script>
@endpush
</body>
