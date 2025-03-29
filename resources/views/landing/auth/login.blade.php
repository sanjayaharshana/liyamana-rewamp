@extends('landing.common.app')

@section('content')
<div class="login-page">
    <div class="row g-0">
        <!-- Left side with background image -->
        <div class="col-lg-6 login-bg">
            <div class="login-bg-content">
                <img src="{{url('landing_pages/banding/liyamana_logo.png')}}" alt="Liyamana Logo" class="login-bg-logo">
                <h1>Welcome to Liyamana</h1>
                <p>Your trusted platform for sending heartfelt letters and connecting with loved ones.</p>
                <div class="login-features">
                    <div class="feature-item">
                        <i class="bi bi-envelope-paper"></i>
                        <span>Send Beautiful Letters</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Secure & Reliable</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-globe"></i>
                        <span>Worldwide Delivery</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side with login form -->
        <div class="col-lg-6 login-form-container">
            <div class="login-form-wrapper">
                <div class="text-center mb-4">
                    <h2 class="login-title">Welcome Back</h2>
                    <p class="login-subtitle">Please login to your account</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('landing.login') }}">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" 
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary login-btn">
                            Login
                        </button>
                    </div>

                    <div class="divider">
                        <span>OR</span>
                    </div>

                    <div class="d-grid mb-4">
                        <a href="{{ route('google-auth') }}" class="btn btn-outline-primary google-btn">
                            <img src="{{url('landing_pages/assets/img/google-icon.png')}}" alt="Google" class="google-icon">
                            Continue with Google
                        </a>
                    </div>
                </form>

                <div class="text-center">
                    <p class="mb-0">Don't have an account? 
                        <a href="{{ route('landing.registerPage') }}" class="register-link">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.login-page {
    min-height: 100vh;
    background-color: #f8f9fa;
}

.login-bg {
    background: linear-gradient(rgba(114, 31, 38, 0.9), rgba(114, 31, 38, 0.9)),
                url('{{url('landing_pages/assets/img/letter-bg.jpg')}}') center/cover no-repeat;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
    color: white;
}

.login-bg-content {
    max-width: 500px;
    text-align: center;
}

.login-bg-logo {
    height: 80px;
    margin-bottom: 30px;
    filter: brightness(0) invert(1);
}

.login-bg h1 {
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 20px;
}

.login-bg p {
    font-size: 18px;
    opacity: 0.9;
    margin-bottom: 40px;
}

.login-features {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 16px;
}

.feature-item i {
    font-size: 24px;
    color: rgba(255, 255, 255, 0.9);
}

.login-form-container {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
    background: white;
}

.login-form-wrapper {
    max-width: 400px;
    width: 100%;
}

.login-title {
    color: #721f26;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 10px;
}

.login-subtitle {
    color: #6c757d;
    font-size: 16px;
}

.form-label {
    color: #495057;
    font-weight: 500;
    margin-bottom: 8px;
}

.input-group-text {
    background-color: #f8f9fa;
    border-right: none;
    color: #721f26;
}

.form-control {
    border-left: none;
    padding: 12px;
}

.form-control:focus {
    border-color: #721f26;
    box-shadow: 0 0 0 0.2rem rgba(114, 31, 38, 0.25);
}

.input-group:focus-within {
    box-shadow: 0 0 0 0.2rem rgba(114, 31, 38, 0.25);
}

.input-group:focus-within .input-group-text,
.input-group:focus-within .form-control {
    border-color: #721f26;
}

.login-btn {
    background-color: #721f26;
    border: none;
    padding: 12px;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
}

.login-btn:hover {
    background-color: #5a1920;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(114, 31, 38, 0.2);
}

.google-btn {
    border: 1px solid #721f26;
    color: #721f26;
    padding: 12px;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.google-btn:hover {
    background-color: #721f26;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(114, 31, 38, 0.2);
}

.google-icon {
    width: 20px;
    height: 20px;
}

.register-link {
    color: #721f26;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.register-link:hover {
    color: #5a1920;
    text-decoration: underline;
}

.forgot-password {
    color: #721f26;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

.forgot-password:hover {
    color: #5a1920;
    text-decoration: underline;
}

.form-check-label {
    color: #6c757d;
}

.divider {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 20px 0;
    color: #6c757d;
    font-size: 14px;
}

.divider::before,
.divider::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #dee2e6;
}

.divider span {
    padding: 0 10px;
}

.alert {
    border-radius: 10px;
    margin-bottom: 20px;
}

.alert-danger {
    background-color: #fff5f5;
    border-color: #ffebeb;
    color: #721f26;
}

.invalid-feedback {
    color: #721f26;
    font-size: 14px;
}

@media (max-width: 991px) {
    .login-bg {
        min-height: 300px;
        padding: 20px;
    }
    
    .login-bg-content {
        max-width: 100%;
    }
    
    .login-bg h1 {
        font-size: 28px;
    }
    
    .login-bg p {
        font-size: 16px;
    }
    
    .login-form-container {
        padding: 20px;
    }
}

@media (max-width: 576px) {
    .login-bg {
        min-height: 250px;
    }
    
    .login-bg-logo {
        height: 60px;
    }
    
    .login-title {
        font-size: 24px;
    }
    
    .feature-item {
        font-size: 14px;
    }
}
</style>
@endsection
