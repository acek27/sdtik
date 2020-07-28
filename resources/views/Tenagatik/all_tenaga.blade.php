@extends('layouts.master')
@section('title')
    <title>LAPORAN HARIAN</title>
@endsection


@section('content')
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($profils as $profil)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                {{$profil->divisi->nama_divisi}}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{$profil->nm_tenaga}}</b></h2>
                                        <p class="text-muted text-sm"><b>Alamat: </b>{{$profil->alamat}}</p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mail-bulk"></i></span>
                                                {{$profil->email}}
                                            </li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span> Phone #: {{$profil->telp}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="{{route('profildetail',$profil->id_tenaga)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                </ul>
            </nav>
        </div>
        <!-- /.card-footer -->
    </div>
@endsection
@push('script')
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js')}}"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js')}}"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/id.min.js')}}"></script>
    <script>
        $(document).ready(function () {
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
                });
            });
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

