@extends('landing.common.app')

@section('content')



    <div style="margin-top: 50px"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                   <div style="margin-bottom: 27px;border-radius: 12px;padding: 30px;border-style: solid;border-width: 1px;border-color: lightgrey;color: white;background: #732027;">

                       <div class="row">
                           <div class="col-md-6">
                               <input type="text" class="form-control">
                           </div>
                           <div class="col-md-6">
                               <div class="row">
                                   <div class="col-md-8">
                                       <select class="form-select">
                                           <option value="romance">Romance</option>
                                       </select>
                                   </div>
                                   <div class="col-md-4">
                                       <button class="btn btn-primary" style="background: #a32c36;border-style: unset;border-radius: 10px;padding-left: 30px;padding-right: 50px;">
                                           <i class="bi bi-search" style="padding-right: 10px"></i>Search
                                       </button>
                                   </div>


                               </div>

                           </div>

                       </div>

                   </div>

                    <div style="background: url('https://img.lazcdn.com/us/domino/c7dca190-6437-4a8c-bb69-05926912ff19_LK-1976-688.jpg_1200x1200q80.jpg_.webp');height: 460px;margin-bottom: 18px;background-repeat: no-repeat;background-size: contain;background-position: center;">

                    </div>
                </div>

                <div class="row">
                    @foreach($templates as $templeteItem)
                        <div class="col-md-3">
                            <a href="{{url('market-place/'.$templeteItem->slug)}}">
                                <div class="card" style="margin-bottom: 20px;">
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
        </div>


    </div>

@endsection
