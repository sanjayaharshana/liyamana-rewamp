@extends('landing.common.app')

@section('content')



    <div style="margin-top: 100px"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
               @include('landing.common.market-place-sidebar')

            </div>
            <div class="col-md-8">
                <div style="height:100px;background: url('https://blucactus.blue/wp-content/uploads/2020/09/Blucactus-What-is-e-commerce-cover-page-1.jpg')">

                </div>
                <div class="row">
                    @foreach($templates as $templeteItem)
                        <div class="col-md-4">
                            <a href="{{url('market-place/'.$templeteItem->slug)}}">
                                <div class="card" style="margin-bottom: 10px;">
                                    <div style="background: url('{{url('storage/'.$templeteItem->images)}}');height: 200px;background-size: cover;background-repeat: no-repeat;"></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <h3 style="font-size: 20px;text-align: center;">Product Item 1</h3>
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
            <div class="col-md-2">
                <div class="card" style="margin-bottom: 10px;">
                    HARRY
                </div>
            </div>
        </div>


    </div>

@endsection
