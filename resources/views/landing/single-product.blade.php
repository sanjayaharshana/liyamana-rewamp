@extends('landing.common.app')

@section('content')

    <div style="margin-top: 70px"></div>
    @include('landing.single-product.navigration_tab',[
    'activeTab'=>'template-overview'])

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

               <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" style="background: maroon;border-style: none"><i class="bi bi-envelope" style="margin-right: 10px"></i> Quick Send</a>
               <button class="btn btn-primary" style="background: maroon;border-style: none"><i class="bi bi-pen" style="margin-right: 10px"></i> Edit This Template</button>
           </div>
       </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body" style="background: #670000;">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="text-align: center;padding: 10px;background: #670000;color: white;padding-bottom: 120px;border-radius: 20px;padding-left: 40px;padding-right: 50px;">
                                <div style="text-align: center;margin-top: 50px;margin-bottom: 50px;">
                                    <h2 style="color: white;">Do you have existing Liyamana Account?</h2>
                                </div>
                                <p style="text-align: left;">Hmmm... What is your Email Address?</p>
                                <input type="text" class="form-control" style="background-color: #450404;border-style: unset;color: white;">
                                <p style="text-align: left;padding-top: 20px;"> And your Password &gt;</p>
                                <input type="text" class="form-control" style="background-color: #450404;border-style: unset;color: #ffffff;">
                                <a href="{{url('password/forget')}}">Forget Password? </a> <br>
                                <button class="btn btn-primary" style="background: #500101;border-style: none;margin-top: 20px;">Login as Liyamana Account</button>
                            </div>
                        </div>
                        <div class="col-md-6" style="background: #490202;">
                            <div style="color: white;padding: 30px;">
                                <h2 style="color: white;margin-bottom: 30px;">Send as a guest account</h2>

                                <div class="row">
                                    <didv class="col-md-6">
                                        <label style="padding-bottom: 10px;">First Name</label>
                                        <input type="text" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                    </didv>
                                    <didv class="col-md-6">
                                        <label style="padding-bottom: 10px;">Last Name</label>
                                        <input type="text" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                    </didv>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label style="padding-bottom: 10px;">What is your Email Address</label>
                                        <input type="text" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="padding-bottom: 10px;">Phone Number</label>
                                        <input type="tel" class="form-control" style="margin-bottom: 20px;background: #670000;border-style: unset;border-radius: 10px;color: white;">
                                    </div>
                                </div>

                                <label>Address</label>
                                <textarea class="form-control" rows="2" style="background: #670000;border-style: unset;border-radius: 10px;color: white;" spellcheck="false"></textarea>

                                <div style="background: #650303;border-radius: 10px;margin-top: 10px">
                                    <div class="form-check form-switch" style="padding-left: 50px;padding-top: 20px;padding-bottom: 20px;font-size: 13px;margin-bottom: 20px;">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Do you want to create liyamana account?</label> <br>
                                        <small>Why this people make details apis</small>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
