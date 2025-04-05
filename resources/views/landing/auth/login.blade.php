@extends('landing.common.app')

@section('title', 'Login - Liyamana')
@section('meta_description', 'Login to your Liyamana account to send heartfelt letters and connect with loved ones worldwide.')

@section('content')
<div class="auth-container">
    <div class="split-screen">
        <!-- Left side - Illustration/Content -->
        <div class="split-screen__left">
            <div class="brand-content">
                <img src="{{url('landing_pages/banding/liyamana_logo.png')}}" alt="Liyamana Logo" class="brand-logo">
                <h1 style="color: white">Welcome to Liyamana</h1>
                <p class="brand-description">Your trusted platform for sending heartfelt letters and connecting with loved ones worldwide.</p>

                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-envelope-paper-heart"></i>
                        </div>
                        <div class="feature-text">
                            <h3 style="color: white;">Beautiful Letters</h3>
                            <p>Create and send personalized letters with love</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="feature-text">
                            <h3 style="color: white">Secure & Private</h3>
                            <p>Your messages are protected and private</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-globe-americas"></i>
                        </div>
                        <div class="feature-text">
                            <h3 style="color: white">Global Reach</h3>
                            <p>Connect with loved ones anywhere in the world</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side - Login Form -->
        <div class="split-screen__right" style="margin-top: 50px">
            <div class="form-wrapper">
                <div class="form-header">
                    <h2>Welcome back</h2>
                    <p>Please sign in to your account</p>
                </div>

                @if(session('success') || session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') ?? session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('landing.login') }}" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               placeholder="name@company.com"
                               required
                               autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="password-header">
                            <label for="password">Password</label>
                            <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                        </div>
                        <div class="password-input-group">
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="••••••••"
                                   required>
                            <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Stay signed in for a week</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-login">
                        Sign in to account
                    </button>

                    <div class="auth-separator">
                        <span>Or continue with</span>
                    </div>

                    <a href="{{ route('google-auth') }}" class="btn btn-google">
                        <img src="{{url('landing_pages/assets/img/google-icon.png')}}" alt="Google">
                        Sign in with Google
                    </a>

                    <p class="auth-footer">
                        Don't have an account? <a href="{{ route('landing.registerPage') }}">Create an account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary-color: #2563eb;
    --primary-hover: #1d4ed8;
    --danger-color: #dc2626;
    --success-color: #059669;
    --text-primary: #111827;
    --text-secondary: #4b5563;
    --border-color: #e5e7eb;
    --input-bg: #f9fafb;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
}

.auth-container {
    min-height: 100vh;
    width: 100%;
    background-color: #f3f4f6;
}

.split-screen {
    display: flex;
    min-height: 100vh;
}

/* Left side styles */
.split-screen__left {
    flex: 1;
    background: linear-gradient(135deg, #1e0808 0%, #9b0606 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 3rem;
    position: relative;
    overflow: hidden;
}

.split-screen__left::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><path d="M54 0H6C2.7 0 0 2.7 0 6v48c0 3.3 2.7 6 6 6h48c3.3 0 6-2.7 6-6V6c0-3.3-2.7-6-6-6zm-6 36H36v12H24V36H12V24h12V12h12v12h12v12z" fill="white" opacity="0.03"/></svg>') repeat;
    opacity: 0.1;
}

.brand-content {
    position: relative;
    z-index: 1;
    max-width: 480px;
}

.brand-logo {
    height: 3rem;
    margin-bottom: 2rem;
    filter: brightness(0) invert(1);
}

.brand-content h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.brand-description {
    font-size: 1.125rem;
    opacity: 0.9;
    margin-bottom: 3rem;
    line-height: 1.6;
}

.features-grid {
    display: grid;
    gap: 1.5rem;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 1rem;
    backdrop-filter: blur(8px);
    transition: transform 0.3s ease;
}

.feature-item:hover {
    transform: translateX(8px);
}

.feature-icon {
    flex-shrink: 0;
    width: 2.5rem;
    height: 2.5rem;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-icon i {
    font-size: 1.25rem;
}

.feature-text h3 {
    font-size: 1.125rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.feature-text p {
    font-size: 0.875rem;
    opacity: 0.8;
    margin: 0;
}

/* Right side styles */
.split-screen__right {
    flex: 1;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 4rem;
}

.form-wrapper {
    width: 100%;
    max-width: 420px;
}

.form-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.form-header h2 {
    color: var(--text-primary);
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.form-header p {
    color: var(--text-secondary);
    font-size: 1rem;
}

/* Form styles (keeping existing styles) */
.auth-form .form-group {
    margin-bottom: 1.5rem;
}

.auth-form label {
    display: block;
    color: var(--text-primary);
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.auth-form .form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 0.975rem;
    line-height: 1.5;
    color: var(--text-primary);
    background-color: var(--input-bg);
    border: 1px solid var(--border-color);
    border-radius: 0.5rem;
    transition: all 0.15s ease-in-out;
}

.auth-form .form-control:focus {
    background-color: white;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgb(37 99 235 / 0.1);
    outline: none;
}

/* Keep all other existing form styles */

/* Responsive adjustments */
@media (max-width: 1024px) {
    .split-screen {
        flex-direction: column;
    }

    .split-screen__left {
        padding: 2rem;
        min-height: auto;
    }

    .brand-content {
        text-align: center;
        margin: 0 auto;
    }

    .features-grid {
        max-width: 400px;
        margin: 0 auto;
    }

    .feature-item:hover {
        transform: translateY(-4px);
    }

    .split-screen__right {
        padding: 2rem;
    }
}

@media (max-width: 640px) {
    .split-screen__left,
    .split-screen__right {
        padding: 1.5rem;
    }

    .brand-content h1 {
        font-size: 2rem;
    }

    .form-header h2 {
        font-size: 1.75rem;
    }

    .features-grid {
        gap: 1rem;
    }

    .feature-item {
        padding: 0.75rem;
    }
}

/* Add these additional styles after the existing form styles */

.auth-form .form-control::placeholder {
    color: #9ca3af;
}

.auth-form .form-control.is-invalid {
    border-color: var(--danger-color);
}

.auth-form .invalid-feedback {
    color: var(--danger-color);
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.password-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.password-input-group {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    padding: 0;
    color: var(--text-secondary);
    cursor: pointer;
    transition: color 0.15s ease;
}

.password-toggle:hover {
    color: var(--text-primary);
}

.forgot-link {
    font-size: 0.875rem;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.15s ease;
}

.forgot-link:hover {
    color: var(--primary-hover);
    text-decoration: underline;
}

.form-check {
    margin-bottom: 1.5rem;
}

.form-check-input {
    margin-right: 0.5rem;
    cursor: pointer;
}

.form-check-input:checked {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.form-check-label {
    font-size: 0.875rem;
    color: var(--text-secondary);
    cursor: pointer;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.25rem;
    font-size: 0.975rem;
    font-weight: 500;
    border-radius: 0.5rem;
    transition: all 0.15s ease-in-out;
    cursor: pointer;
    width: 100%;
}

.btn-primary {
    background-color: var(--primary-color);
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1),
                0 2px 4px -1px rgba(37, 99, 235, 0.06);
}

.btn-login {
    margin-bottom: 1.5rem;
}

.auth-separator {
    position: relative;
    text-align: center;
    margin: 1.5rem 0;
}

.auth-separator::before,
.auth-separator::after {
    content: '';
    position: absolute;
    top: 50%;
    width: calc(50% - 1rem);
    height: 1px;
    background-color: var(--border-color);
}

.auth-separator::before {
    left: 0;
}

.auth-separator::after {
    right: 0;
}

.auth-separator span {
    background-color: white;
    padding: 0 1rem;
    color: var(--text-secondary);
    font-size: 0.875rem;
}

.btn-google {
    background-color: white;
    border: 1px solid var(--border-color);
    color: var(--text-primary);
    gap: 0.75rem;
    transition: all 0.15s ease-in-out;
}

.btn-google:hover {
    background-color: var(--input-bg);
    border-color: var(--text-secondary);
    transform: translateY(-1px);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.btn-google img {
    width: 1.25rem;
    height: 1.25rem;
}

.auth-footer {
    text-align: center;
    margin-top: 1.5rem;
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.auth-footer a {
    color: var(--primary-color);
    font-weight: 500;
    text-decoration: none;
    transition: color 0.15s ease;
}

.auth-footer a:hover {
    color: var(--primary-hover);
    text-decoration: underline;
}

.alert {
    border-radius: 0.5rem;
    padding: 1rem;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.alert-success {
    background-color: #ecfdf5;
    color: var(--success-color);
    border: 1px solid #a7f3d0;
}

.alert-danger {
    background-color: #fef2f2;
    color: var(--danger-color);
    border: 1px solid #fecaca;
}

.btn-close {
    background: none;
    border: none;
    padding: 0;
    font-size: 1.25rem;
    line-height: 1;
    opacity: 0.5;
    cursor: pointer;
    transition: opacity 0.15s ease;
}

.btn-close:hover {
    opacity: 0.75;
}

/* Animation styles */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.split-screen__left {
    animation: fadeIn 0.6s ease-out;
}

.form-wrapper {
    animation: fadeIn 0.6s ease-out 0.2s both;
}

.feature-item {
    animation: fadeIn 0.6s ease-out;
    animation-fill-mode: both;
}

.feature-item:nth-child(1) {
    animation-delay: 0.2s;
}

.feature-item:nth-child(2) {
    animation-delay: 0.4s;
}

.feature-item:nth-child(3) {
    animation-delay: 0.6s;
}

/* Additional responsive styles */
@media (max-width: 1024px) {
    .split-screen__left {
        animation: none;
    }

    .form-wrapper {
        animation: none;
    }

    .feature-item {
        animation: none;
    }
}

/* Fix for mobile devices */
@media (max-width: 640px) {
    .auth-container {
        min-height: 100vh;
        height: auto;
    }

    .split-screen {
        min-height: auto;
    }

    .split-screen__left {
        min-height: auto;
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .brand-content {
        padding: 0 1rem;
    }

    .form-wrapper {
        padding: 2rem 1rem;
    }

    .btn {
        padding: 0.875rem 1.25rem;
    }
}

/* Fix for ultra-wide screens */
@media (min-width: 1920px) {
    .split-screen__left,
    .split-screen__right {
        padding: 4rem;
    }

    .brand-content {
        max-width: 560px;
    }

    .form-wrapper {
        max-width: 480px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password visibility toggle
    const togglePassword = document.querySelector('.password-toggle');
    const passwordInput = document.querySelector('#password');
    const toggleIcon = document.querySelector('#togglePassword');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        toggleIcon.classList.toggle('bi-eye');
        toggleIcon.classList.toggle('bi-eye-slash');
    });

    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script>
@endsection
