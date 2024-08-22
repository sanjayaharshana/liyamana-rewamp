@extends('landing.common.app')

@section('content')

    @include('landing.market-place.hero')



    <div style="margin-top: 50px"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">


                </div>

                <div style="padding-top: 20px;"></div>

                <div class="row">
                    @foreach($templates as $templeteItem)
                        <div class="col-md-3">
                            <a href="{{url('market-place/'.$templeteItem->slug)}}">
                                <div class="card" style="margin-bottom: 20px;">
                                    <div style="background: url('{{url('storage/'.$templeteItem->feature_image)}}');height: 200px;background-size: cover;background-repeat: no-repeat;"></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <h3 style="font-size: 20px;text-align: center;">{{$templeteItem->name}}</h3>
                                            <p style="text-align: center;font-size: 11px;margin-bottom: 9px;">With envolope cover and Pipin paper letter</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                               <div style="background: #9f202c;color: white;text-align: center;border-radius: 7px;">Letter</div>
                                            </div>
                                            <div class="col-md-6">
                                                LKR {{number_format($templeteItem->price,2)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>

@endsection
