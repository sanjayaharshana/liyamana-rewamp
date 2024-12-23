@extends('landing.common.app')

@section('content')

    <div style="margin-top: 70px"></div>
    @include('landing.single-product.navigration_tab',[
    'activeTab'=>'template-overview'])

    <div class="container">
       <div class="row">
           <div class="col-md-5">
               @include('landing.product_page.product_slider')

           </div>
           <div class="col-md-4">

                            @if ($errors->any())
                   <div style="background: #992121;color: white;padding: 5px;margin-bottom: 10px;padding-bottom: 1px;padding-top: 15px;border-radius: 10px;">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif
               <h2>{{$template->name}}</h2>
               <p style="font-size: 14px;">{{$template->description}}</p>

               <p style="background: url('https://www.shutterstock.com/image-photo/wood-texture-natural-plywood-background-600nw-1901761825.jpg');color: white;padding: 10px;width: 170px;border-radius: 10px;text-align: center;font-size: 20px;background-size: contain;">
                   LKR : {{number_format($template->price,2)}}
               </p>




               <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" style="background: maroon;border-style: none"><i class="bi bi-envelope" style="margin-right: 10px"></i> Quick Send</a>


               <button class="btn btn-primary" style="background: maroon;border-style: none"><i class="bi bi-pen" style="margin-right: 10px"></i> Edit This Template</button>
           </div>

           <div class="col-md-3">
               <div style="background: #f3f3f3;">
                   <div class="row">
                       <div class="col-md-12">
                           <div style="padding: 10px;">
                               <div style="font-size: 11px;">Sending Options</div>
                               <div style="margin-top: 10px;background: #eaeaea;padding-left: 9px;padding-right: 9px;border-radius: 4px;padding-bottom: 5px;font-size: 14px;">
                                   <i class="bi bi-envelope-open" style="font-size: 25px;"></i>
                                   <span style="margin-left: 10px;">Send via Email</span>
                               </div>
                           </div>

                           <div style="padding: 10px;">
                               <div style="background: #eaeaea;padding-left: 9px;padding-right: 9px;border-radius: 4px;padding-bottom: 5px;font-size: 14px;">
                                   <i class="bi bi-map" style="font-size: 25px;"></i>
                                   <span style="margin-left: 10px;">Share this template</span>
                               </div>
                           </div>

                           <div style="padding: 10px;">
                               <div style="background: #eaeaea;padding-left: 9px;padding-right: 9px;border-radius: 4px;padding-bottom: 5px;font-size: 14px;">
                                   <i class="bi bi-shop" style="font-size: 25px;"></i>
                                   <span style="margin-left: 10px;">Help and Support</span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <br>
               <div style="background: #f3f3f3;">
                   <div class="row">
                       <div class="col-md-12">
                           <div style="padding: 10px;">
                               <div style="font-size: 11px;">More Information</div>
                               <div style="margin-top: 10px;background: #eaeaea;padding-left: 9px;padding-right: 9px;border-radius: 4px;padding-bottom: 5px;font-size: 14px;">
                                   <i class="bi bi-card-heading" style="font-size: 25px;"></i>
                                   <span style="margin-left: 10px;">Default Letter Type</span>
                                   <div style="margin-left: 40px;font-size: 11px">A4 (Offset 291)</div>
                               </div>
                           </div>

                           <div style="padding: 10px;">
                               <div style="background: #eaeaea;padding-left: 9px;padding-right: 9px;border-radius: 4px;padding-bottom: 5px;font-size: 14px;">
                                   <i class="bi bi-printer" style="font-size: 25px;"></i>
                                   <span style="margin-left: 10px;">Inkject (Canon e202)</span>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <!-- Modal -->
    @include('landing.single-product.models.quick-send')




@endsection

@push('footer-js')
    <script>
        const flexSwitchCheckDefault = document.getElementById('flexSwitchCheckDefault');
        flexSwitchCheckDefault.addEventListener('change',function () {
            if (flexSwitchCheckDefault.checked){
                document.getElementById('password_section').style.display = 'block';
            }else{
                document.getElementById('password_section').style.display = 'none';
            }
        })
    </script>
@endpush
