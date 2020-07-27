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


                <div class="col-sm" style="margin-left:900px; ">
                    <form method="get" action="{{url('/lap_har/search')}}">
                        <label>Search</label>
                        <input class="form-control mr-sm-2" style="height: calc(1.8125rem + 2px);
padding-top: .25rem;
padding-bottom: .25rem;
padding-left: .5rem;
font-size: 75%;" type="text" name="search" placeholder="Kata Kunci" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"></button>
                </div>
                </form>


            </div>

        </div>


        <div class="box-footer">


            <div style="margin-bottom:20px;" class="input-group input-group-sm">

            </div>
            <div class="box-body form-inline ml-3">

                <table border="1">
                    <tr>
                        <th>no</th>
                        <th>nama tenaga</th>
                        <th>divisi</th>
                        <th>tanggal</th>
                        <th>Action</th>

                    </tr>
                    @foreach($tb_laporan_harian as $p)
                        <tr>
                            <td>{{ $p->id_laporan_harian }}</td>
                            <td>{{ $p->nm_tenaga }}</td>
                            <td>{{ $p->nama_divisi}}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>
                                <a href="{{url('/laporan_hari/edit',$p->id_laporan_harian)}}"><i
                                        class="fas fa-edit"></i></a>
                                |
                                <a href="#"><i class="far fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>


            </div>
            <!-- /.box-body <th>No</th>
                        <th>Nama Tenaga</th>
                        <th>Divisi</th>
						<th>Tanggal</th>
						<th>Action</th>-->
        </div>
    </section>

@endsection
@push('script')
    <script>

        $(document).on('keyup', '#search', function () {
            var query = $(this).val();
            fetch_customer_data(query);
        });
        })
        ;
    </script>
@endpush

