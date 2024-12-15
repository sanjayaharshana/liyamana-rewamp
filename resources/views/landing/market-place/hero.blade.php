<div style="padding-top: 50px;background: #8b262f;"></div>

<div style="margin-bottom: 0px;/* border-radius: 12px; */padding: 30px;/* border-style: solid; *//* border-width: 1px; */border-color: lightgrey;color: white;background: #732027;">

    <div class="container">
        <form action="" method="get">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <input name="search_keyword" type="text" value="{{$query['search_keyword'] ?? null}}" placeholder="Search Templates" class="form-control" style="background: #5f1b21;border-style: none;border-radius: 30px;color: #c39898;">
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <select class="form-select" name="category" style="border-style: none;background: #5f1b21;color: #c39898;border-radius: 20px;">
                                <option value="">None</option>
                                @foreach($templateCategories as $item)
                                    <option  value="{{$item->slug}}"
                                        {{ (isset($query['category']) && $query['category'] == $item->slug) ? 'selected' : '' }}>
                                        {{$item->category_name}}</option>
                                @endforeach
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
        </form>


    </div>


</div>

<div style="background: url('http://localhost:8000/landing_pages/banding/banners1.png');height: 323px;margin-bottom: 0px;background-position: center;padding-left: 0px;padding-right: 0px;">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: center">
                    <div style="background: url('{{url('landing_pages/banding/market_place_banner.png')}}');height: 270px;background-size: contain;background-repeat: no-repeat;background-position: center;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
