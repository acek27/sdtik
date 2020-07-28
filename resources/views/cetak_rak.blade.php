<html>
<head>
    @if($rak->isEmpty())
        <title>Data Aplikasi Server Rak : {{$rak2}}</title>
    @else
        <title>Data Aplikasi Server Rak : {{$rak1->id_rak}}</title>
    @endif
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th {
        font-size: 9pt;
    }
</style>
@if($rak->isEmpty())
    <center>
        <h5>Data Aplikasi Server Rak : {{$rak2}} </h4>
    </center>
@else
    <center>
        <h5>Data Aplikasi Server Rak : {{$rak1->id_rak}} </h4>
    </center>
@endif

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Perangkat</th>
        <th>Kapasitas RAM</th>
        <th>Kapasitas HDD</th>
        <th>Status Kepemilikan</th>
        <th>Status Server</th>
    </tr>
    </thead>
    <tbody>
    @if($rak->isEmpty())
        <tr>
            <td colspan="6" align="center">Data Tidak ditemukan</td>
        </tr>
    @else
        @php $i=1 @endphp
        @foreach($rak as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->nama_perangkat}}</td>
                <td>{{$p->ukuran_ram}} GB</td>
                <td>{{$p->ukuran_hdd}} {{$p->keterangan}}</td>
                <td>{{$p->status_kepemilikan}}</td>
                <td>{{$p->status_server}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

</body>
</html>
