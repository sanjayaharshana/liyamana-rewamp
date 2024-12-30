@extends('landing.common.app')

@section('content')
    <!-- Hero Section -->
    <style>
        /*======================
    404 page
=======================*/


        .page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
        }

        .page_404  img{ width:100%;}

        .four_zero_four_bg{

            background-image: url({{url('dribbble_1.gif')}});
            height: 400px;
            background-position: center;
        }


        .four_zero_four_bg h1{
            font-size:80px;
        }

        .four_zero_four_bg h3{
            font-size:80px;
        }

        .link_404{
            color: #fff!important;
            padding: 10px 20px;
            background: #500101;
            margin: 20px 0;
            display: inline-block;}
        .contant_box_404{ margin-top:-50px;}
    </style>

    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="" style="padding: 60px;text-align: center;">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>


                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                Look like you're lost
                            </h3>

                            <p>the page you are looking for not avaible!</p>

                            <a href="" class="link_404">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        var parallax = function(e) {
                var windowWidth = $(window).width();
                if (windowWidth < 768) return;
                var halfFieldWidth = $(".parallax").width() / 2,
                    halfFieldHeight = $(".parallax").height() / 2,
                    fieldPos = $(".parallax").offset(),
                    x = e.pageX,
                    y = e.pageY - fieldPos.top,
                    newX = (x - halfFieldWidth) / 30,
                    newY = (y - halfFieldHeight) / 30;
                $('.parallax [class*="wave"]').each(function(index) {
                    $(this).css({
                        transition: "",
                        transform:
                            "translate3d(" + index * newX + "px," + index * newY + "px,0px)"
                    });
                });
            },
            stopParallax = function() {
                $('.parallax [class*="wave"]').css({
                    transform: "translate(0px,0px)",
                    transition: "all .7s"
                });
                $timeout(function() {
                    $('.parallax [class*="wave"]').css("transition", "");
                }, 700);
            };
        $(document).ready(function() {
            $(".not-found").on("mousemove", parallax);
            $(".not-found").on("mouseleave", stopParallax);
        });
    </script>
@endsection





