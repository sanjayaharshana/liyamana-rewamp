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
                                    <a href="#" class="text-decoration-none">Forgot Password?</a>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn login-btn" style="background: #520202;">Login</button>
                                </div>
                                <p class="text-center mt-3">
                                    Don't have an account? <a href="{{url('register')}}" class="text-primary">Sign up</a>
                                </p>
                            </form>
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
