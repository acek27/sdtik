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
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                           role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                           href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                           role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                         aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a
                        eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel.
                        Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed
                        venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus.
                        Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit
                        mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies
                        neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc
                        vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros,
                        vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus.
                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel"
                         aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                        condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut
                        commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis
                        elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare,
                        eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod
                        lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget,
                        ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui.
                        Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum.
                    </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean
                        elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque.
                        Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod
                        neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh
                        rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl.
                        Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit,
                        at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta
                        lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper.
                        Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat.
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

