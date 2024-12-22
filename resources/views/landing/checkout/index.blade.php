@extends('landing.common.app')

@section('content')

    <div style="margin-top: 70px"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>




    @include('landing.single-product.navigration_tab',[
    'activeTab'=>'checkout',
    'writingDeskLink'=> url('market-place/'.$template_details->slug.'/writing-desk/'.$order_details->id),
    ])


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div style="background: ghostwhite;border-style: solid;border-width: 1px;border-radius: 10px;border-color: #ffffff;padding-top: 20px;padding-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-4">
                            <div style="background:url('{{url('storage/'.$template_details->feature_image)}}');height: 120px;background-position: center;background-size: contain;background-repeat: no-repeat;"></div>
                        </div>
                        <div class="col-md-8">
                            <h4>{{$template_details->name}}</h4>
                            <p style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3; /* number of lines to show */line-clamp: 2;-webkit-box-orient: vertical;font-size: 12px;">{{$template_details->description}}</p>
                            <div>
                                 LKR {{number_format($template_details->price,2)}}
                            </div>

                        </div>
                        <div style="padding: 10px;background: #ffedbe;color: #161616;font-size: 11px;margin-top: 20px;border-radius: 11px;">
                            You're one step away from sending your heartfelt letter through Liyamana, the trusted online letter-sending platform
                        </div>
                    </div>
                    <form id="checkout-form" method="post" action="https://sandbox.payhere.lk/pay/checkout">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="container">
                                    <input type="hidden" name="merchant_id" value="121XXXX">    <!-- Replace your Merchant ID -->
                                    <input type="hidden" name="return_url" value="http://sample.com/return">
                                    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
                                    <input type="hidden" name="notify_url" value="http://sample.com/notify">
                                    <input type="hidden" name="order_id" value="{{$order_details->id}}">
                                    <input type="hidden" name="items" value="{{$template_details->name}}">
                                    <input type="hidden" name="currency" value="LKR">
                                    <input type="hidden" name="amount" value="{{$template_details->price}}">
                                    <input type="hidden" name="first_name" value="{{$order_details->order_details['first_name']}}">
                                    <input type="hidden" name="last_name" value="{{$order_details->order_details['last_name']}}">
                                    <input type="hidden" name="email" value="{{$order_details->order_details['email']}}">
                                    <input type="hidden" name="phone" value="{{$order_details->order_details['phone_number']}}">
                                    <input type="hidden" name="address" value="{{$order_details->address['from_address']}}">
                                    <input type="hidden" name="city" value="Colombo">
                                    <input type="hidden" name="country" value="Sri Lanka">
                                    <input type="hidden" name="hash" value="098F6BCD4621D373CADE4E832627B4F6">    <!-- Replace with generated hash -->

                                    <div style="padding-top: 10px;padding-bottom: 10px;padding-left: 10px;padding-right: 10px;border-radius: 8px;margin-top: 20px;">

                                        <div class="row">


                                            <div class="col-md-4">
                                                <div onclick="document.getElementById('checkout-form').submit()" style="border-style: none" type="submit">
                                                    <div class="card">
                                                        <div class="card-body" style="text-align: center">
                                                            <i class="bi bi-credit-card-2-front" style="font-size: 30px;"></i>
                                                            <div style="font-size: 10px">Checkout and Send Your Letter</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{route('preview_design',['slug' => $template_details->slug,'order_id' => $order_details->id])}}">
                                                    <div class="card">
                                                        <div class="card-body" style="text-align: center">
                                                            <i class="bi bi-envelope-open" style="font-size: 30px;"></i>
                                                            <div style="font-size: 10px">Edit your letter design</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                        </div>
                                        <br>


                                    </div>

                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-6">
                <div style="background: url('{{url('envolope.png')}}');background-size: contain;background-repeat:no-repeat;height: 441px;background-position: center;">
                    <div class="row">
                        <div class="col-md-12">

                            <div style="padding-left: 80px;padding-top: 90px;font-size: 14px;">
                                <b>From Address:</b><br>
                                Sanjaya Harsana Senevirathne,<br>
                                No.128, Wellawaya Street,<br>
                                Buttala,<br>
                                Sri Lanka
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div style="padding-left: 80px;padding-top: 90px;font-size: 14px;">
                                    <b>To:</b><br>
                                    Sanjaya Harsana Senevirathne,<br>
                                    No.128, Wellawaya Street,<br>
                                    Buttala,<br>
                                    Sri Lanka
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <script>
        let t1 = gsap.timeline({ paused: true });
        let flap = CSSRulePlugin.getRule(".envelope:before");

        t1.to(flap, {
            duration: 0.5,
            cssRule: {
                rotateX: 180
            }
        })
            .set(flap, {
                cssRule: {
                    zIndex: 10
                }
            })
            .to('.letter', {
                translateY: -200,
                duration: 0.9,
                ease: "back.inOut(1.5)"
            })
            .set('.letter', {
                zIndex: 40
            })
            .to('.letter', {
                duration: .7,
                ease: "back.out(.4)",
                translateY: -5,
                translateZ: 250
            });

        let t2 = gsap.timeline({ paused: true });
        t2.to('.shadow', {
            delay: 1.4,
            width: 450,
            boxShadow: "-75px 150px 10px 5px #eeeef3",
            ease: "back.out(.2)",
            duration: .7
        });

        function openCard(e) {
            t1.play();
            t2.play();
        }

        function closeCard(e) {
            t1.reverse();
            t2.reverse();
        }
    </script>
@endsection
