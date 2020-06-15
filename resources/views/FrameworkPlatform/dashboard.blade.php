@extends('layouts.master')
@section('header')
    Data Platform dan Framework Aplikasi
@endsection
@section('home')
    Home
@endsection
@section('page')
    Data
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="col-sm-12">
        <a href="{{route('data_frame.create')}}" class="btn btn-primary float-right">Tambah Data</a>
    </div>
    <br>
    <br>
    <div class="box-body col-lg-6">
        <div class="table-responsive-sm">
            <table id="table1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>jenis platform Aplikasi</th>
                    <th>jenis framework aplikasi</th>
                    <th width="20%">Aksi</th>
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
                ajax: '{{route('table.framework')}}',
                "fnCreatedRow": function (row, data, index) {
                    $('td', row).eq(0).html(index + 1)
                },
                columns: [{
                    data: 'id_framework_platform', width: '10px',
                    name: 'id_framework_platform'
                },
                    {
                        data: 'jenis_platform', width: '120px',
                        name: 'jenis_platform'
                    },
                    {
                        data: 'jenis_framework', width: '120px',
                        name: 'jenis_framework'
                    },

                    {data: 'action', name: 'action', orderable: false, searchable: false, align: 'center'},
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
                            url: "data_frame/" + id + "/delete",
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
