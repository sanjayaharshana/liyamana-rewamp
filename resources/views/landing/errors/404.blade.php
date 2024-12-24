@extends('landing.common.app')

@section('content')
    <!-- Hero Section -->

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Pacifico", cursive;
        }

        .center, .envelope-wrapper .letter, .container {
            display: grid;
            place-items: center;
        }

        .container {
            height: 100vh;
        }

        .envelope-wrapper {
            position: relative;
            cursor: pointer;
            outline: none;
            background-color: #500101;
            box-shadow: 0 0 10px #999;
        }
        .envelope-wrapper .envelope {
            width: 300px;
            height: 200px;
            position: relative;
            border-top: calc(200px / 2) solid transparent;
            border-bottom: calc(200px / 2) solid #ce2e2e;
            border-right: calc(300px / 2) solid #6e0b0b;
            border-left: calc(300px / 2) solid #8c1313;
            z-index: 2;
        }
        .envelope-wrapper .opened-envelope {
            width: 0;
            height: 0;
            position: absolute;
            border-top: calc(300px / 2.5) solid #b70606;
            border-bottom: none;
            border-right: calc(300px / 2) solid transparent;
            border-left: calc(300px / 2) solid transparent;
            z-index: 3;
        }
        .envelope-wrapper .letter {
            position: absolute;
            margin: 10px;
            width: calc(300px - 20px);
            height: calc(200px - 20px);
            color: #420202;
            font-size: 22px;
            font-style: italic;
            z-index: 1;
            background-color: #fff;
            box-shadow: 0 0 20px #9999998f;
        }
        .envelope-wrapper .letter ion-icon {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>

    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="envelope-wrapper">
                    <div class="opened-envelope"></div>
                    <div class="letter">
                        Page not found
                        <ion-icon class="close-icon" name="close"></ion-icon>
                    </div>
                    <div class="envelope"></div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Page not found guys!</h3>
                <p>Handle the 404 in Laravel: Laravel automatically renders the 404.blade.php file when a NotFoundHttpException occurs. To customize the behavior, you can define it in the render method in the App\Exceptions\Handler class.</p>

            </div>
        </div>

    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/gsap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/CSSRulePlugin.min.js'></script>


    <script>
        var openLetter = gsap.timeline({ paused: true });

        openLetter
            .to(".opened-envelope", {
                duration: 0.5,
                ease: "back",
                rotateX: 180,
                transformOrigin: "top",
                zIndex: 0
            })
            .set(".opened-envelope", { cssRule: { marginTop: "-10px" } })
            .to(".letter", {
                duration: 1,
                ease: "back",
                translateY: -200
            })
            .set(".letter", { zIndex: 99 })
            .to(".letter", {
                duration: 0.7,
                ease: "back",
                translateY: 0,
                scale: 1.5
            });

        $(".envelope-wrapper").click(() => {
            event.stopPropagation();
            openLetter.play();
        });

        $(".close-icon").click(() => {
            event.stopPropagation();
            openLetter.reverse();
        });
    </script>

@endsection





