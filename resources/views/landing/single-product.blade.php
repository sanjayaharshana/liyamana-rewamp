@extends('landing.common.app')

@section('content')

    <div style="margin-top: 100px"></div>

    <div class="container">
       <div class="row">
           <div class="col-md-6">
               @include('landing.product_page.product_slider')

           </div>
           <div class="col-md-6">
               <h2>{{$template->name}}</h2>
               <p>{{$template->description}}</p>

               <p style="background: url('https://www.shutterstock.com/image-photo/wood-texture-natural-plywood-background-600nw-1901761825.jpg');color: white;padding: 10px;width: 170px;border-radius: 10px;text-align: center;font-size: 20px;background-size: contain;">
                   LKR : {{number_format($template->price,2)}}
               </p>

               <div


               <button class="btn btn-primary" style="background: maroon;border-style: none"><i class="bi bi-envelope" style="margin-right: 10px"></i> Quick Send</button>
               <button class="btn btn-primary" style="background: maroon;border-style: none"><i class="bi bi-pen" style="margin-right: 10px"></i> Edit This Template</button>
           </div>
       </div>
    </div>



@endsection
