@extends('layouts.ds.master1')
@section('header')

@endsection
@push('css')
    <style>
        .borderless td, .borderless th {
            padding: 0px 20px 0px;
        }

        #hero-h1 {
            font-size: 20px;
            line-height: 40px;
        }

        #hero-h1 {
            margin: 0 0 20px 0;
            font-size: 30px;
            font-weight: 700;
            line-height: 56px;
            color: #364146;
        }

        h1 {
            font-family: "Raleway";
        }

        body, html {


            margin: 0;
        }

        .a {
            color: black;
            text-decoration: none;
            background-color: transparent;
        }

        body {
            background-image: url({{('assets/img/abstract.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
        }


        .container {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .container img {
            width: 100%;
            height: auto;
        }

        .container .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            color: black;
            font-size: 16px;
            padding: 16px 30px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .container .btn:hover {
            background-color: black;
            color: white;
        }

        img {
            border-radius: 10%;
        }
    </style>
@endpush
@section('home')
    Home
@endsection
@section('page')
    Data
@endsection
@section('content')
    @php
        $pilihan = 0;
        if (Request::has('id')){
            $pilihan = Request::get('id');
        }
    @endphp

    <br>
    <br>


    <div class="form-group">


        <div>

            <div class="col-sm-12">
                <div class="box-body">


                    <div class="col-sm-12">

                        <div style="margin-left:10px">
                            <img src="{{url('assets/img/kab-situbondo.png')}}" alt="kab-situbondo" style="width:50px">&nbsp
                            <img src="{{url('assets/img/logo-kom.png')}}" alt="kab-situbondo" style="width:50px">


                        </div>

                    </div>

                    <body>
                    <div>

                        <div class="col-sm-12">
                            <div class="box-body">


                                <div class="row col-sm-12">
                                    <div class="col-lg-8"
                                         data-aos="fade-up">
                                        <br>
                                        <div>
                                            <h1>Inventaris Sumber Daya TIK di lingkungan Pemerintah Kabupaten
                                                Situbondo</h1>
                                            <br>
                                            <h2 style='font-size: 20px'> Sistem Informasi Ini dirancang Untuk Melakukan
                                                Pendataan Sumber Daya TIK di lingkungan Pemerintah Kabupaten
                                                Situbondo </h2>

                                        </div>
                                        <div>
                                            <br>
                                        </div>
                                        <button class="btn" style="background-color:#DAA520">
                                            <a href="{{url('/login')}}" class="a"> Selanjutnya </a></button>
                                    </div>
                                    <div class="col-lg-4 order-2 " data-aos="fade-left">
                                        <img src="{{url('assets/img/hero-img.png')}}" class="img-fluid" alt="">
                                    <!--<img src="{{ url('assets/img/abstract.jpg') }}" alt="">-->
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    </body>

@endsection
