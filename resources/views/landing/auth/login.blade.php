@extends('landing.common.app')

@section('title', 'Login - Liyamana')
@section('meta_description', 'Login to your Liyamana account to send heartfelt letters and connect with loved ones worldwide.')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="row g-0">
            <!-- Left side with branding -->
            <div class="col-lg-5 auth-brand">
                <div class="brand-content">
                    <img src="{{url('landing_pages/banding/liyamana_logo.png')}}" alt="Liyamana Logo" class="brand-logo">
                    <h2>Welcome to Liyamana</h2>
                    <p>Your trusted platform for sending heartfelt letters and connecting with loved ones.</p>

                    <div class="brand-features">
                        <div class="feature">
                            <i class="bi bi-envelope-paper"></i>
                            <span>Send Beautiful Letters</span>
                        </div>
                        <div class="feature">
                            <i class="bi bi-shield-check"></i>
                            <span>Secure & Reliable</span>
                        </div>
                        <div class="feature">
                            <i class="bi bi-globe"></i>
                            <span>Worldwide Delivery</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side with login form -->
            <div class="col-lg-7 auth-form">
                <div class="form-wrapper">
                    <div class="form-header">
                        <h2>Welcome Back</h2>
                        <p>Please login to your account</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('landing.login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                       required placeholder="Enter your password">
                                <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-options">
                            <div class="remember-me">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Remember Me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-login">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                        </div>

                        <div class="social-divider">
                            <span> <b>Or</b> </span>
                        </div>

                        <div class="social-login">
                            <a href="{{ route('google-auth') }}" class="btn btn-google">
                                <img src="{{url('landing_pages/assets/img/google-icon.png')}}" alt="Google">
                                <span>Continue with Google</span>
                            </a>
                        </div>

                        <div class="register-prompt">
                            <p>Don't have an account? <a href="{{ route('landing.registerPage') }}">Register Now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Auth Container Styles */
.auth-container {
    min-height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 2rem;
    background-color: #f8f9fa;
    background-image: linear-gradient(135deg, #f5f7fa 0%, #e9edf2 100%);
}

.auth-card {
    width: 100%;
    background: #fff;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

/* Brand Section Styles */
.auth-brand {
    background: linear-gradient(135deg, #721f26 0%, #8b262f 100%);
    padding: 3rem 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #fff;
    position: relative;
    overflow: hidden;
}

.auth-brand::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('{{url('landing_pages/assets/img/letter-bg.jpg')}}');
    background-size: cover;
    background-position: center;
    opacity: 0.15;
    z-index: 0;
}

.brand-content {
    position: relative;
    z-index: 1;
    text-align: center;
    margin-top: -100px;
}

.brand-logo {
    height: 70px;
    margin-bottom: 1.5rem;
    filter: brightness(0) invert(1);
}

.auth-brand h2 {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: #e9e6e5;
}

.auth-brand p {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.brand-features {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feature {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.75rem 1rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.feature:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateX(5px);
}

.feature i {
    font-size: 1.25rem;
}

/* Form Section Styles */
.auth-form {
    padding: 0;
    background: #fff;
}

.form-wrapper {
    padding: 3rem 2.5rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.form-header h2 {
    color: #721f26;
    font-size: 2.4rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.form-header p {
    color: #6c757d;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #495057;
    font-weight: 500;
}

.input-group {
    position: relative;
    display: flex;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.input-group:focus-within {
    box-shadow: 0 0 0 3px rgba(114, 31, 38, 0.15);
}

.input-group-text {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-right: none;
    color: #721f26;
}

.form-control {
    flex: 1;
    padding: 0.75rem 1rem;
    border: 1px solid #e9ecef;
    border-left: none;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: #e9ecef;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

/* Password Toggle Button */
.password-toggle {
    background: none;
    border: none;
    padding: 0 15px;
    color: #6c757d;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-left: none;
    transition: color 0.3s ease;
}

.password-toggle:hover {
    color: #721f26;
}

.password-toggle:focus {
    outline: none;
}

.password-toggle i {
    font-size: 1rem;
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.remember-me {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.remember-me input {
    width: 16px;
    height: 16px;
}

.remember-me label {
    margin-bottom: 0;
    color: #6c757d;
    font-weight: normal;
}

.forgot-link {
    color: #721f26;
    text-decoration: none;
    font-size: 0.875rem;
    transition: color 0.3s ease;
}

.forgot-link:hover {
    color: #5a1920;
    text-decoration: underline;
}

.form-actions {
    margin-bottom: 1.5rem;
}

.btn-login {
    width: 100%;
    padding: 0.75rem;
    background-color: #721f26;
    border: none;
    border-radius: 8px;
    color: #fff;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-login:hover {
    background-color: #5a1920;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(114, 31, 38, 0.2);
}

.social-divider {
    position: relative;
    text-align: center;
    margin: 1.5rem 0;
}

.social-divider::before,
.social-divider::after {
    content: '';
    position: absolute;
    top: 50%;
    width: calc(50% - 70px);
    height: 1px;
    background-color: #e9ecef;
}

.social-divider::before {
    left: 0;
}

.social-divider::after {
    right: 0;
}

.social-divider span {
    display: inline-block;
    padding: 0 1rem;
    background-color: #fff;
    color: #6c757d;
    font-size: 0.875rem;
    position: relative;
    z-index: 1;
}

.social-login {
    display: flex;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.btn-google {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 0.75rem 1.5rem;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    color: #212529;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.btn-google:hover {
    background-color: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn-google img {
    width: 20px;
    height: 20px;
}

.register-prompt {
    text-align: center;
    margin-top: auto;
}

.register-prompt p {
    color: #6c757d;
    margin-bottom: 0;
}

.register-prompt a {
    color: #721f26;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.register-prompt a:hover {
    color: #5a1920;
    text-decoration: underline;
}

.alert {
    padding: 0.75rem 1rem;
    margin-bottom: 1.5rem;
    border-radius: 8px;
    font-size: 0.875rem;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}

/* Responsive Styles */
@media (max-width: 991.98px) {
    .auth-card {
        max-width: 600px;
    }

    .auth-brand {
        padding: 2rem;
    }

    .form-wrapper {
        padding: 2rem;
    }
}

@media (max-width: 767.98px) {
    .auth-container {
        padding: 1rem;
    }

    .auth-card {
        border-radius: 12px;
    }

    .auth-brand {
        padding: 1.5rem;
    }

    .form-wrapper {
        padding: 1.5rem;
    }

    .form-header h2 {
        font-size: 1.5rem;
    }

    .social-divider::before,
    .social-divider::after {
        width: calc(50% - 60px);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
});
</script>
@endsection
