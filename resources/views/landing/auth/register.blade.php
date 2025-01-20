@extends('landing.common.app')

@section('content')

    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
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
        .register-btn {
            background-color: #007bff;
            color: #fff;
        }
        .register-btn:hover {
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

    <div style="padding-top: 49px;padding-bottom: 32px;background-size: contain;background: #480c0c">

        <div class="container register-container">
            <div class="row justify-content-center">
                <div class="col-md-6" style="border-right-style: solid;border-width: 2px;border-color: #9e1c36;">
                    <div>
                        <div style="background: url('http://localhost:8000/landing_pages/banding/liyamana_logo.png');height: 104px;background-size: contain;background-position: center;background-repeat: no-repeat;filter: invert(1);margin-bottom: 31px;"></div>
                        <div style="color: white;">

                            <div style="font-size: 30px;padding-top: 24px;padding-bottom: 20px;color: white;">Welcome to Liyamana – Join Us Today!</div>
                            Liyamana offers a seamless letter-sending experience. Sign up now to start managing your letters digitally, securely, and conveniently. Gain access to tracking, drafts, and much more.
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card p-4" style="background: #9e1c36;color: white;">
                        <div class="text-center mb-4" style="color: white;">
                            <h3 style="color: white;">Register</h3>
                            <p class="text-muted" style="color: white !important;">Create your account</p>
                        </div>

                        <form method="POST" action="{{ route('landing.register') }}">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter your first name" required="" style="background-color: #5b1a20;border-style: inherit;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter your last name" required="" style="background-color: #5b1a20;border-style: inherit;">
                                    </div>
                                </div>
                               </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required style="background-color: #5b1a20;border-style: inherit;">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your Phone number" required style="background-color: #5b1a20;border-style: inherit;">

                                    </div>
                                </div>
                               </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required style="background-color: #5b1a20;border-style: inherit;">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm-password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter your password" required style="background-color: #5b1a20;border-style: inherit;">

                                    </div>
                                </div>
                                </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="agreeTerms" required>
                                    <label class="form-check-label" for="agreeTerms">I agree to the <a href="#" class="text-primary text-decoration-none">Terms & Conditions</a></label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn register-btn" style="background: #520202;">Sign Up</button>
                            </div>
                            <p class="text-center mt-3">
                                Already have an account? <a href="{{url('login')}}" class="text-primary">Login</a>
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
