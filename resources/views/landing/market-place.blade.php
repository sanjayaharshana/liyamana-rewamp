@extends('landing.common.app')

@section('content')

    <div style="margin-top: 100px"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
               @include('landing.common.market-place-sidebar')

            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{url('market-place/apple0slug')}}">
                            <div class="card" style="margin-bottom: 10px;">
                                <div style="background: url('{{url('landing_pages/assets/img/portfolio/portfolio-1.jpg')}}');height: 100px;background-size: cover;background-repeat: no-repeat;"></div>
                                <div class="card-body">
                                    <h4>Product Item 1</h4>
                                    <p style="font-size: 13px;">Rediscover the joy of sending and receiving letters with Liyamana, the modern postal platform that bridges the gap between tradition and technology </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>


    </div>

@endsection
