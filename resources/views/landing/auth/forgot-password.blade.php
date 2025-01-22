@extends('landing.common.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .forgot-password-container {
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
    .form-control::placeholder {
        color: #ffffff;
        opacity: 1;
    }
</style>

<div style="padding-top: 49px;padding-bottom: 22vh;background-size: contain;background: #480c0c">
    <div class="container forgot-password-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card p-4" style="background: #9e1c36;color: white;">
                    <div class="text-center mb-4">
                        <h3 style="color: thistle">Reset Password</h3>
                        <p>Enter your email address to receive password reset instructions</p>
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
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
                            <input type="email" name="email" class="form-control" id="email"
                                   placeholder="Enter your email" required
                                   style="background-color: #5b1a20;border-style: inherit;">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn" style="background: #520202; color: white;">
                                Send Reset Link
                            </button>
                        </div>

                        <p class="text-center mt-3">
                            <a href="{{ route('landing.loginPage') }}" class="text-white">Back to Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
