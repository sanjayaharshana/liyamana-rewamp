<div style="padding-top: 50px;background: #8b262f;"></div>

<div style="margin-bottom: 0px;/* border-radius: 12px; */padding: 30px;/* border-style: solid; *//* border-width: 1px; */border-color: lightgrey;color: white;background: #732027;">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <select class="form-select">
                            @foreach($templateCategories as $item)
                                <option value="{{$item->slug}}">{{$item->category_name}}</option>
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
    </div>


</div>

<div style="background: url('http://localhost:8000/landing_pages/banding/banners1.png');height: 323px;margin-bottom: 0px;background-position: center;padding-left: 0px;padding-right: 0px;">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: center">
                    <h1 style="color: white;font-size: 40px;">Market Place</h1>
                    <p style="color: white;font-size: 20px;">Find the perfect template for your special occasion</p>
                </div>
            </div>
        </div>
    </div>
</div>
