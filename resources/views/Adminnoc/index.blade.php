@extends('layouts.master')
@section('title')
    <title>LAPORAN HARIAN</title>
@endsection
@push('css')
    <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css')}}"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet"
          href="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css')}}">
    <style>
        .popbox {
            display: none;
            position: absolute;
            z-index: 99999;

        }

    </style>
@endpush

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">NOC Dashboard</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Total Data</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$data->count('id')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 statusnoc">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted"><a href="#" class="popper"
                                                                                              data-popbox="pop1">Status</a></span>
                                        @if($indikator->where('nilai',1)->count('id') == 4)
                                            <span
                                                class="info-box-number bg-success text-center text-muted"> Secure</span>
                                        @elseif($indikator->where('nilai',1)->count('id') < 4)
                                            <span
                                                class="info-box-number bg-warning text-center text-muted"> Warning</span>
                                        @elseif($indikator->where('nilai',1)->count('id') == 0)
                                            <span
                                                class="info-box-number bg-danger text-center text-muted"> Danger</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span
                                            class="info-box-text text-center text-muted">Piket Saat Ini</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$data[0]->users->name}}<span>
                    </span></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @php($bulan =[
                                    'Januari','Februari',
                                    'Maret','April',
                                     'Mei','Juni',
                                     'Juli','Agustus',
                                     'September','Oktober',
                                     'November','Desember'])
                            <div class="col-12">
                                <h4>Recent Activity</h4>
                                @foreach($data as $value)
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                 src="../../dist/img/user1-128x128.jpg"
                                                 alt="user image">
                                            <span class="username">
                          <a href="#">{{$value->users->name}}</a>
                        </span>
                                            <span
                                                class="description">{{$value->created_at->format('l, Y-m-d H:i:s')}}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Status NOC : {{$value->statusnoc}}
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>
                                                Lihat Rincian</a>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-footer text-center">
                                <a href="#">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Jadwal Piket NOC</h3>
                        <div class="calendar-time" id="calendar"></div>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Piket Kemaren
                                <b class="d-block">Deveint Inc</b>
                            </p>
                            <p class="text-sm">Piket Besok
                                <b class="d-block">Tony Chicken</b>
                            </p>
                        </div>

                        <h5 class="mt-5 text-muted">Project files</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                    Functional-requirements.docx</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>
                                    Email-from-flatbal.mln</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                    Contract-10_12_2014.docx</a>
                            </li>
                        </ul>
                        <div class="text-center mt-5 mb-3">
                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <section>
        <div class="card popbox" id="pop1">
            <div class="card-header border-transparent">
                <h3 class="card-title">Indikator NOC</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Indikator</th>
                            <th>Kondisi</th>
                            <th>PIC/No. Telp</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no = 1)
                        @foreach($indikator as $value)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$value->indikatornoc->nama_indikator}}</td>
                                <td>
                                    <span
                                        class="badge badge-{{$value->nilai == 1 ? 'success': 'danger'}}">{{$value->nilai == 1 ? 'Baik': 'Tidak Baik'}}</span>
                                </td>
                                <td>
                                    {{$value->indikatornoc->pic}} ({{$value->indikatornoc->telp}})
                                </td>
                            </tr>
                            @php($no++)
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Detail</a>
                    <button href="javascript:void(0)" class="btn btn-sm btn-secondary float-right"
                            data-card-widget="remove">Close
                    </button>
                </div>
            </div>

            <!-- /.card-footer -->
        </div>
    </section>
@endsection
@push('script')
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js')}}"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js')}}"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/id.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                locale: 'id',
                displayEventTime: false,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
            });
            var moveLeft = 0;
            var moveDown = 0;
            $('a.popper').hover(function (e) {
                var target = '#' + ($(this).attr('data-popbox'));
                $(target).show();
                moveLeft = $(this).outerWidth();
                moveDown = ($(target).outerHeight() / 2);
            }, function () {
                var target = '#' + ($(this).attr('data-popbox'));
                if (!($("a.popper").hasClass("show"))) {
                    $(target).hide();
                }
            });

            $('a.popper').mousemove(function (e) {
                var target = '#' + ($(this).attr('data-popbox'));

                leftD = e.pageX + parseInt(moveLeft);
                maxRight = leftD + $(target).outerWidth();
                windowLeft = $(window).width() - 40;
                windowRight = 0;
                maxLeft = e.pageX - (parseInt(moveLeft) + $(target).outerWidth() + 20);

                if (maxRight > windowLeft && maxLeft > windowRight) {
                    leftD = maxLeft;
                }

                topD = e.pageY - parseInt(moveDown);
                maxBottom = parseInt(e.pageY + parseInt(moveDown) + 20);
                windowBottom = parseInt(parseInt($(document).scrollTop()) + parseInt($(window).height()));
                maxTop = topD;
                windowTop = parseInt($(document).scrollTop());
                if (maxBottom > windowBottom) {
                    topD = windowBottom - $(target).outerHeight() - 20;
                } else if (maxTop < windowTop) {
                    topD = windowTop + 20;
                }

                $(target).css('top', topD).css('left', leftD);
            });
            $('a.popper').click(function (e) {
                var target = '#' + ($(this).attr('data-popbox'));
                if (!($(this).hasClass("show"))) {
                    $(target).show();
                }
                $(this).toggleClass("show");
            });
        });

    </script>
@endpush

