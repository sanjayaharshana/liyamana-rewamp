@extends('landing.common.app')

@section('content')

        <style>
            body {
                background-color: #f8f9fa;
            }
            .login-container {
                margin-top: 100px;
            }
            .card {
                border: none;
                box-shadow: 0 4px 6px rgb(0 0 0 / 35%);
                border-radius: 10px;
            }
            .form-control:focus {
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
                border-color: #80bdff;
            }
            .login-btn {
                background-color: #007bff;
                color: #fff;
            }
            .login-btn:hover {
                background-color: #0056b3;
            }
            .form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
                color: #ffffff;
                opacity: 1; /* Firefox */
            }

            .form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
                color: #ffffff;
            }

            .form-control::-ms-input-placeholder { /* Microsoft Edge */
                color: #ffffff;
            }

            .button {
                --primary: #ff5569;
                --neutral-1: #f7f8f7;
                --neutral-2: #e7e7e7;
                --radius: 14px;

                cursor: pointer;
                border-radius: var(--radius);
                text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
                border: none;
                box-shadow: 0 0.5px 0.5px 1px rgba(255, 255, 255, 0.2),
                    0 10px 20px rgba(0, 0, 0, 0.2), 0 4px 5px 0px rgba(0, 0, 0, 0.05);
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                transition: all 0.3s ease;
                min-width: 200px;
                padding: 20px;
                height: 68px;
                font-family: "Galano Grotesque", Poppins, Montserrat, sans-serif;
                font-style: normal;
                font-size: 18px;
                font-weight: 600;
                }
                .button:hover {
                transform: scale(1.02);
                box-shadow: 0 0 1px 2px rgba(255, 255, 255, 0.3),
                    0 15px 30px rgba(0, 0, 0, 0.3), 0 10px 3px -3px rgba(0, 0, 0, 0.04);
                }
                .button:active {
                transform: scale(1);
                box-shadow: 0 0 1px 2px rgba(255, 255, 255, 0.3),
                    0 10px 3px -3px rgba(0, 0, 0, 0.2);
                }
                .button:after {
                content: "";
                position: absolute;
                inset: 0;
                border-radius: var(--radius);
                border: 2.5px solid transparent;
                background: linear-gradient(var(--neutral-1), var(--neutral-2)) padding-box,
                    linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.45))
                    border-box;
                z-index: 0;
                transition: all 0.4s ease;
                }
                .button:hover::after {
                transform: scale(1.05, 1.1);
                box-shadow: inset 0 -1px 3px 0 rgba(255, 255, 255, 1);
                }
                .button::before {
                content: "";
                inset: 7px 6px 6px 6px;
                position: absolute;
                background: linear-gradient(to top, var(--neutral-1), var(--neutral-2));
                border-radius: 30px;
                filter: blur(0.5px);
                z-index: 2;
                }
                .state p {
                display: flex;
                align-items: center;
                justify-content: center;
                }
                .state .icon {
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                margin: auto;
                transform: scale(1.25);
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                }
                .state .icon svg {
                overflow: visible;
                }

                /* Outline */
                .outline {
                position: absolute;
                border-radius: inherit;
                overflow: hidden;
                z-index: 1;
                opacity: 0;
                transition: opacity 0.4s ease;
                inset: -2px -3.5px;
                }
                .outline::before {
                content: "";
                position: absolute;
                inset: -100%;
                background: conic-gradient(
                    from 180deg,
                    transparent 60%,
                    white 80%,
                    transparent 100%
                );
                animation: spin 2s linear infinite;
                animation-play-state: paused;
                }
                @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
                }
                .button:hover .outline {
                opacity: 1;
                }
                .button:hover .outline::before {
                animation-play-state: running;
                }

                /* Letters */
                .state p span {
                display: block;
                opacity: 0;
                animation: slideDown 0.8s ease forwards calc(var(--i) * 0.03s);
                }
                .button:hover p span {
                opacity: 1;
                animation: wave 0.5s ease forwards calc(var(--i) * 0.02s);
                }
                .button:focus p span {
                opacity: 1;
                animation: disapear 0.6s ease forwards calc(var(--i) * 0.03s);
                }
                @keyframes wave {
                30% {
                    opacity: 1;
                    transform: translateY(4px) translateX(0) rotate(0);
                }
                50% {
                    opacity: 1;
                    transform: translateY(-3px) translateX(0) rotate(0);
                    color: var(--primary);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0) translateX(0) rotate(0);
                }
                }
                @keyframes slideDown {
                0% {
                    opacity: 0;
                    transform: translateY(-20px) translateX(5px) rotate(-90deg);
                    color: var(--primary);
                    filter: blur(5px);
                }
                30% {
                    opacity: 1;
                    transform: translateY(4px) translateX(0) rotate(0);
                    filter: blur(0);
                }
                50% {
                    opacity: 1;
                    transform: translateY(-3px) translateX(0) rotate(0);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0) translateX(0) rotate(0);
                }
                }
                @keyframes disapear {
                from {
                    opacity: 1;
                }
                to {
                    opacity: 0;
                    transform: translateX(5px) translateY(20px);
                    color: var(--primary);
                    filter: blur(5px);
                }
                }

                /* Plane */
                .state--default .icon svg {
                animation: land 0.6s ease forwards;
                }
                .button:hover .state--default .icon {
                transform: rotate(45deg) scale(1.25);
                }
                .button:focus .state--default svg {
                animation: takeOff 0.8s linear forwards;
                }
                .button:focus .state--default .icon {
                transform: rotate(0) scale(1.25);
                }

                @keyframes takeOff {
                0% {
                    opacity: 1;
                }
                60% {
                    opacity: 1;
                    transform: translateX(70px) rotate(45deg) scale(2);
                }
                100% {
                    opacity: 0;
                    transform: translateX(160px) rotate(45deg) scale(0);
                }
                }
                @keyframes land {
                0% {
                    transform: translateX(-60px) translateY(30px) rotate(-50deg) scale(2);
                    opacity: 0;
                    filter: blur(3px);
                }
                100% {
                    transform: translateX(0) translateY(0) rotate(0);
                    opacity: 1;
                    filter: blur(0);
                }
                }

                /* Contrail */
                .state--default .icon:before {
                content: "";
                position: absolute;
                top: 50%;
                height: 2px;
                width: 0;
                left: -5px;
                background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.5));
                }
                .button:focus .state--default .icon:before {
                animation: contrail 0.8s linear forwards;
                }
                @keyframes contrail {
                0% {
                    width: 0;
                    opacity: 1;
                }
                8% {
                    width: 15px;
                }
                60% {
                    opacity: 0.7;
                    width: 80px;
                }
                100% {
                    opacity: 0;
                    width: 160px;
                }
                }

                /* States */
                .state {
                padding-left: 29px;
                z-index: 2;
                display: flex;
                position: relative;
                }
                .state--default span:nth-child(8) {
                margin-right: 5px;
                }
                .state--default span:nth-child(12) {
                margin-right: 5px;
                }
                .state--sent {
                display: none;
                }
                .state--sent svg {
                transform: scale(1.25);
                margin-right: 8px;
                }
                .button:focus .state--default {
                position: absolute;
                }
                .button:focus .state--sent {
                display: flex;
                }
                .button:focus .state--sent span {
                opacity: 0;
                animation: slideDown 0.8s ease forwards calc(var(--i) * 0.2s);
                }
                .button:focus .state--sent .icon svg {
                opacity: 0;
                animation: appear 1.2s ease forwards 0.8s;
                }
                @keyframes appear {
                0% {
                    opacity: 0;
                    transform: scale(4) rotate(-40deg);
                    color: var(--primary);
                    filter: blur(4px);
                }
                30% {
                    opacity: 1;
                    transform: scale(0.6);
                    filter: blur(1px);
                }
                50% {
                    opacity: 1;
                    transform: scale(1.2);
                    filter: blur(0);
                }
                100% {
                    opacity: 1;
                    transform: scale(1);
                }
                }

                .loading-spinner {
                    width: 24px;
                    height: 24px;
                }



                /* Update icon styles */
                .state--default .icon {
                display: flex;
                align-items: center;
                margin-right: 10px; /* Add spacing between icon and text */
                }

                /* Adjust icon size if needed */
                .state--default .icon svg {
                width: 18px;
                height: 18px;
                }

                /* Text alignment */
                .state--default p {
                display: flex;
                align-items: center;
                margin: 0;
                }

                /* Optional: fine-tune vertical position */
                .state--default span {
                display: inline-block;
                line-height: 1;
                }

                .futuristic-span {
                    width: 100%;
                    text-align: center;
                    position: relative;
                    margin: 25px 0;
                }

                .futuristic-span::before,
                .futuristic-span::after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    width: 45%;
                    height: 2px;
                    background: rgba(255, 255, 255, 0.3);
                }

                .futuristic-span::before {
                    left: 0;
                }

                .futuristic-span::after {
                    right: 0;
                }

                .futuristic-span span {
                    background: #9e1c36;
                    color: #ffffff;
                    padding: 0 15px;
                    font-size: 18px;
                    position: relative;
                    display: inline-block;
                    text-transform: lowercase;
                    animation: glowText 2s infinite;
                }

                .futuristic-span span::after {
                    content: '';
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    transform: translate(-50%, -50%);
                    width: 40px;
                    height: 40px;
                    background: #9e1c36;
                    border: 2px solid rgba(255, 255, 255, 0.2);
                    border-radius: 50%;
                    z-index: -1;
                    animation: pulseCircle 2s infinite ease-in-out;
                }

                @keyframes glowText {
                    0%, 100% {
                        text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
                        opacity: 1;
                    }
                    50% {
                        text-shadow: 0 0 20px rgba(255, 255, 255, 0.7);
                        opacity: 0.8;
                    }
                }

                @keyframes pulseCircle {
                    0% {
                        transform: translate(-50%, -50%) scale(1);
                        border-color: rgba(255, 255, 255, 0.2);
                    }
                    50% {
                        transform: translate(-50%, -50%) scale(1.1);
                        border-color: rgba(255, 255, 255, 0.4);
                    }
                    100% {
                        transform: translate(-50%, -50%) scale(1);
                        border-color: rgba(255, 255, 255, 0.2);
                    }
                }

        </style>

        <div style="padding-top: 49px;padding-bottom: 22vh;background-size: contain;background: #480c0c">

            <div class="container login-container">
                <div class="row justify-content-center">
                    <div class="col-md-6" style="border-right-style: solid;border-width: 2px;border-color: #9e1c36;">
                        <div>
                            <div style="background: url('http://localhost:8000/landing_pages/banding/liyamana_logo.png');height: 104px;background-size: contain;background-position: center;background-repeat: no-repeat;filter: invert(1);margin-bottom: 31px;"></div>
                            <div style="color: white;">

                                <div style="font-size: 30px;padding-top: 24px;padding-bottom: 20px;color: white;">Welcome to Liyamana – Your Trusted Online Letter-Sending Platform!</div>

                                Simplify your letter-sending process with Liyamana. Whether you're managing personal or professional communications, Liyamana provides a seamless and secure platform to send letters digitally. Access your account to track sent letters, manage your drafts, and ensure timely delivery with just a few clicks.

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card p-4" style="background: #9e1c36;color: white;">
                            <div class="text-center mb-4" style="color: white;">
                                <h3 style="color: white;">Login</h3>
                                <p class="text-muted" style="color: white !important;!i;!;">Access your account</p>
                            </div>

                            <form method="POST" action="{{ route('landing.login') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="list-style:none;">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                    <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required style="background-color: #5b1a20;border-style: inherit;">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required style="background-color: #5b1a20;border-style: inherit;">
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn login-btn" style="background: #520202;">Login</button>
                                </div>
                                <p class="text-center mt-3">
                                    Don't have an account? <a href="{{url('register')}}" class="text-primary">Sign up</a>
                                </p>
                            </form>

                            <div class="futuristic-span">
                                <span>or</span>
                            </div>

                            <a href="{{ route('google-auth')}}" style="text-align: center; display: flex; justify-content: center;">
                                <button class="button">
                                  <div class="outline"></div>
                                  <div class="state state--default">
                                    <!-- Replace the first icon with Google icon -->
                                    <div class="icon">
                                        <svg viewBox="0 0 24 24" width="1em" height="1em">
                                          <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                          <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                          <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                          <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                        </svg>
                                      </div>
                                      <p>
                                        <span style="--i:0">C</span>
                                        <span style="--i:1">o</span>
                                        <span style="--i:2">n</span>
                                        <span style="--i:3">t</span>
                                        <span style="--i:4">i</span>
                                        <span style="--i:5">n</span>
                                        <span style="--i:6">u</span>
                                        <span style="--i:7">e</span>
                                        <span style="--i:8">W</span>
                                        <span style="--i:9">i</span>
                                        <span style="--i:10">t</span>
                                        <span style="--i:11">h</span>
                                        <span style="--i:12">G</span>
                                        <span style="--i:13">o</span>
                                        <span style="--i:14">o</span>
                                        <span style="--i:15">g</span>
                                        <span style="--i:16">l</span>
                                        <span style="--i:17">e</span>
                                      </p>
                                  </div>
                                  <div class="state state--sent">
                                   <!-- Replace the second icon with loading animation -->
                                   <div class="icon">
                                    <svg viewBox="0 0 24 24" width="1em" height="1em" class="loading-spinner">
                                      <path fill="#4285F4" d="M12 4V2C6.48 2 2 6.48 2 12h2c0-4.41 3.59-8 8-8z">
                                        <animateTransform
                                          attributeName="transform"
                                          type="rotate"
                                          from="0 12 12"
                                          to="360 12 12"
                                          dur="1s"
                                          repeatCount="indefinite"
                                        />
                                      </path>
                                    </svg>
                                  </div>

                                    <p>
                                      <span style="--i:5">l</span>
                                      <span style="--i:6">o</span>
                                      <span style="--i:7">a</span>
                                      <span style="--i:8">d</span>
                                      <span style="--i:9">i</span>
                                      <span style="--i:10">n</span>
                                      <span style="--i:11">g</span>
                                      <span style="--i:12">.</span>
                                      <span style="--i:13">.</span>
                                      <span style="--i:14">.</span>
                                    </p>
                                  </div>
                                </button>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection





<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
