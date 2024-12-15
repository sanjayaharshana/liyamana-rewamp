@extends('landing.common.app')

@section('content')

    @include('landing.market-place.hero')

    <style>
        .card-label::after{
            position: absolute;
            content: 'New';
            top: 11px;
            right: -14px;
            padding: 0.5rem;
            width: 10rem;
            background: #7e0909;
            color: white;
            text-align: center;
            font-family: 'Roboto', sans-serif;
            box-shadow: 4px 4px 15px rgb(0 0 0 / 72%);
        }
        .card-label::before{
            position: absolute;
            content: '';
            background: #830202;
            height: 28px;
            width: 28px;
            /* Added lines */
            top:2rem;
            right:-0.5rem;
            transform : rotate(45deg);
        }
    </style>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6">
                        <div class="col-md-6">
                            <form action="{{url('market-place')}}" method="get">
                                <div class="input-group mb-3">
                                    <label style="padding-top: 6px;padding-right: 20px;">Sort By: </label>
                                    <select type="text" class="form-select" placeholder="Search" name="search">
                                        <option value="price">Price</option>
                                        <option value="last">Latest</option>
                                        <option value="older">Older</option>
                                        <option value="name">Name</option>
                                        <option value="pages">Pages</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <form action="" method="get">
                                    <div class="input-group mb-3">
                                        <label style="padding-top: 6px;padding-right: 20px;">Sort By: </label>
                                        <select type="text" class="form-select" onchange="this.form.submit()" name="sort_by">
                                            <option value="price_low_to_high">Price low to high</option>
                                            <option value="price_high_to_low">Price high to low</option>
                                            <option value="last">Latest</option>
                                            <option value="older">Older</option>
                                            <option value="name">Name</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>

                <div style="padding-top: 20px;"></div>

                <div class="row">
                    @foreach($templates as $templeteItem)
                        <div class="col-md-3">
                            <a href="{{url('market-place/'.$templeteItem->slug)}}">

                                <div class="card {{$templeteItem->is_trending ? "card-label" : "" }}" style="margin-bottom: 20px;">

                                <div style="background: url('{{url('storage/'.$templeteItem->feature_image)}}');height: 200px;background-size: cover;background-repeat: no-repeat;z-index: 0"></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <h3 style="font-size: 20px;text-align: center;">{{$templeteItem->name}}</h3>
                                            <p style="text-align: center;font-size: 11px;margin-bottom: 9px;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3; /* number of lines to show */line-clamp: 2;-webkit-box-orient: vertical;">{{$templeteItem->description}}</p>
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
