@extends('landing.common.app')
@section('title', 'Register - Liyamana')
@section('meta_description', 'Create your Liyamana account to send heartfelt letters and connect with loved ones worldwide.')
@section('content')
<div class="auth-container">
    <div class="split-screen">
        <!-- Left side - Illustration/Content -->
        <div class="split-screen__left">
            <div class="brand-content">
                <h1>Join Liyamana</h1>
                <p class="brand-description">Create your account and start sending beautiful letters to your loved ones.</p>



                <div class="features-grid" style="display:unset">

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Secure & Private</h3>
                            <p>Your messages are encrypted and protected</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-envelope-paper"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Beautiful Letters</h3>
                            <p>Choose from our premium templates and designs</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-globe"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Global Reach</h3>
                            <p>Send letters to any corner of the world</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Fast Delivery</h3>
                            <p>Reliable and timely letter delivery service</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Right side - Registration Form -->
        <div class="split-screen__right">
            <div class="form-wrapper" style="padding-top: 40px;padding-bottom: 0px;">
                <div class="form-header" style="font-size:14r">
                    <h2>Create Your Account</h2>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('landing.register') }}" id="registerForm" class="auth-form">
                    @csrf

                    <!-- Progress Steps -->
                    <div class="progress-steps mb-4">
                        <div class="step active" data-step="1">
                            <div class="step-number">1</div>
                            <div class="step-title">Personal Info</div>
                        </div>
                        <div class="progress-bar-container">
                            <div class="progress-bar-track">
                                <div class="progress-bar-fill"></div>
                            </div>
                        </div>
                        <div class="step" data-step="2">
                            <div class="step-number">2</div>
                            <div class="step-title">Account Details</div>
                        </div>
                    </div>

                    <!-- Step 1: Personal Information -->
                    <div class="form-step" id="step1">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                       value="{{ old('first_name') }}" required placeholder="Enter your first name">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                       value="{{ old('last_name') }}" required placeholder="Enter your last name">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}" required placeholder="Enter your phone number">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-primary next-step">
                                Next <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Account Details -->
                    <div class="form-step" id="step2" style="display: none;">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required placeholder="Enter your email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="password-input-group">
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                       required placeholder="Create a password">
                                <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Password must be at least 8 characters long</small>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="password-input-group">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="form-control" required placeholder="Confirm your password">
                                <button type="button" class="password-toggle" aria-label="Toggle password confirmation visibility">
                                    <i class="bi bi-eye-slash" id="togglePasswordConfirmation"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-actions step2-actions">
                            <button type="button" class="btn btn-outline-primary prev-step">
                                <i class="bi bi-arrow-left"></i> Previous
                            </button>
                            <button type="submit" class="btn btn-primary btn-register">
                                <i class="bi bi-person-plus"></i> Create Account
                            </button>
                        </div>
                    </div>
                </form>

                <div class="auth-separator">
                    <span>Or continue with</span>
                </div>

                <a href="{{ route('google-auth') }}" class="btn btn-google">
                    <img src="{{url('landing_pages/assets/img/google-icon.png')}}" alt="Google">
                    Sign up with Google
                </a>

                <p class="auth-footer">
                    Already have an account? <a href="{{ route('landing.loginPage') }}">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary-color: #721f26;
    --primary-hover: #5a1920;
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
    padding: 2rem;
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
    margin-top: -1rem;
}

.brand-logo {
    height: 2.5rem;
    margin-bottom: 1.5rem;
    filter: brightness(0) invert(1);
}

.brand-content h1 {
    font-size: 2.25rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    line-height: 1.2;
}

.brand-description {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
}

.feature-item {
    display: flex;
    margin-bottom: 10px;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 0.75rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 0.75rem;
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

/* Testimonial styles */
.testimonial {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 0.75rem;
    padding: 1.5rem;
    backdrop-filter: blur(8px);
}

.testimonial-content {
    position: relative;
}

.testimonial-content i {
    position: absolute;
    top: -0.5rem;
    left: -0.5rem;
    font-size: 2rem;
    opacity: 0.2;
}

.testimonial-text {
    font-size: 0.875rem;
    line-height: 1.6;
    margin-bottom: 1rem;
    font-style: italic;
}

.testimonial-author {
    display: flex;
    flex-direction: column;
}

.author-name {
    font-weight: 600;
    font-size: 0.875rem;
}

.author-location {
    font-size: 0.75rem;
    opacity: 0.8;
}

/* Right side styles */
.split-screen__right {
    flex: 1;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.form-wrapper {
    width: 100%;
    max-width: 420px;
    padding: 1.5rem;
}

.form-header {
    text-align: center;
    margin-bottom: 1.5rem;
}

.form-header h2 {
    color: var(--text-primary);
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 0;
}

/* Form styles */
.auth-form .form-group {
    margin-bottom: 1.25rem;
}

.auth-form label {
    display: block;
    color: var(--text-primary);
    font-size: 0.875rem;
    font-weight: 500;
    margin-bottom: 0.375rem;
}

.auth-form .form-control {
    width: 100%;
    padding: 0.625rem 1rem;
    font-size: 0.875rem;
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

.auth-form .form-control.is-invalid {
    border-color: var(--danger-color);
}

.auth-form .invalid-feedback {
    color: var(--danger-color);
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

/* Input group styles */
.input-group {
    position: relative;
    display: flex;
    align-items: stretch;
    width: 100%;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.input-group-text {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    background-color: var(--input-bg);
    border: 1px solid var(--border-color);
    border-right: none;
    color: var(--text-secondary);
    border-radius: 0.5rem 0 0 0.5rem;
}

.input-group .form-control {
    position: relative;
    flex: 1 1 auto;
    width: 1%;
    min-width: 0;
    border-left: none;
    border-radius: 0 0.5rem 0.5rem 0;
}

/* Password input group */
.password-input-group {
    position: relative;
    display: flex;
    align-items: stretch;
    width: 100%;
}

.password-input-group .form-control {
    padding-right: 2.5rem;
    border-radius: 0.5rem;
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
    z-index: 2;
}

.password-toggle:hover {
    color: var(--text-primary);
}

/* Progress Steps */
.progress-steps {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
    position: relative;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 1;
}

.step-number {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    background-color: var(--border-color);
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-bottom: 0.375rem;
    transition: all 0.3s ease;
}

.step.active .step-number {
    background-color: var(--primary-color);
    color: white;
}

.step-title {
    font-size: 0.75rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.progress-bar-container {
    flex: 1;
    height: 2px;
    background-color: var(--border-color);
    margin: 0 0.75rem;
    position: relative;
}

.progress-bar-track {
    height: 100%;
    background-color: var(--border-color);
    position: relative;
}

.progress-bar-fill {
    position: absolute;
    height: 100%;
    background-color: var(--primary-color);
    width: 0%;
    transition: width 0.3s ease;
}

/* Button styles */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.625rem 1rem;
    font-size: 0.875rem;
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
    box-shadow: var(--shadow-md);
}

.btn-outline-primary {
    background-color: transparent;
    border: 1px solid var(--primary-color);
    color: var(--primary-color);
}

.btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: white;
}

.form-actions {
    margin-top: 1.5rem;
    display: flex;
    gap: 0.75rem;
}

.step2-actions {
    justify-content: space-between;
}

/* Auth separator */
.auth-separator {
    position: relative;
    text-align: center;
    margin: 1.25rem 0;
}

.auth-separator::before,
.auth-separator::after {
    content: '';
    position: absolute;
    top: 50%;
    width: calc(50% - 0.75rem);
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
    padding: 0 0.75rem;
    color: var(--text-secondary);
    font-size: 0.75rem;
}

/* Google button */
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
    box-shadow: var(--shadow-md);
}

.btn-google img {
    width: 1.25rem;
    height: 1.25rem;
}

/* Auth footer */
.auth-footer {
    text-align: center;
    margin-top: 1.25rem;
    font-size: 0.75rem;
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

/* Alert styles */
.alert {
    border-radius: 0.5rem;
    padding: 1rem;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
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

/* Form step transitions */
.form-step {
    animation: fadeIn 0.3s ease-out;
}

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

/* Responsive styles */
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
        grid-template-columns: 1fr;
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

.form-subtitle {
    color: var(--text-secondary);
    font-size: 1rem;
    margin-bottom: 1.5rem;
}

.form-benefits {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-bottom: 2rem;
    padding: 1rem;
    background-color: var(--input-bg);
    border-radius: 0.5rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: var(--text-secondary);
    font-size: 0.875rem;
}

.benefit-item i {
    color: var(--primary-color);
    font-size: 1rem;
}

.form-text {
    font-size: 0.75rem;
    color: var(--text-secondary);
    margin-top: 0.25rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const steps = document.querySelectorAll('.form-step');
    const progressSteps = document.querySelectorAll('.step');
    const progressBarFill = document.querySelector('.progress-bar-fill');
    let currentStep = 1;
    const totalSteps = steps.length;

    // Initialize progress bar
    updateProgressBar(currentStep, totalSteps);

    // Next button click handler
    document.querySelector('.next-step').addEventListener('click', function() {
        if (validateStep(currentStep)) {
            showStep(currentStep + 1);
        }
    });

    // Previous button click handler
    document.querySelector('.prev-step').addEventListener('click', function() {
        showStep(currentStep - 1);
    });

    // Password toggle functionality
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
    const passwordConfirmation = document.querySelector('#password_confirmation');

    [togglePassword, togglePasswordConfirmation].forEach((toggle, index) => {
        toggle.addEventListener('click', function() {
            const input = index === 0 ? password : passwordConfirmation;
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    });

    function showStep(step) {
        steps.forEach((s, index) => {
            s.style.display = index + 1 === step ? 'block' : 'none';
        });

        progressSteps.forEach((s, index) => {
            if (index + 1 <= step) {
                s.classList.add('active');
            } else {
                s.classList.remove('active');
            }
        });

        updateProgressBar(step, totalSteps);
        currentStep = step;
    }

    function updateProgressBar(current, total) {
        const percentage = ((current - 1) / (total - 1)) * 100;
        progressBarFill.style.width = `${percentage}%`;
    }

    function validateStep(step) {
        const currentStepElement = document.getElementById(`step${step}`);
        const inputs = currentStepElement.querySelectorAll('input[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });

        // Additional validation for step 1
        if (step === 1) {
            const firstNameInput = document.getElementById('first_name');
            const lastNameInput = document.getElementById('last_name');
            const phoneInput = document.getElementById('phone');

            if (firstNameInput.value.trim().length < 2) {
                showError(firstNameInput, 'First name must be at least 2 characters');
                isValid = false;
            }

            if (lastNameInput.value.trim().length < 2) {
                showError(lastNameInput, 'Last name must be at least 2 characters');
                isValid = false;
            }

            const phoneRegex = /^\+?[\d\s-]{10,}$/;
            if (!phoneRegex.test(phoneInput.value.trim())) {
                showError(phoneInput, 'Please enter a valid phone number');
                isValid = false;
            }
        }

        // Additional validation for step 2
        if (step === 2) {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value.trim())) {
                showError(emailInput, 'Please enter a valid email address');
                isValid = false;
            }

            if (passwordInput.value.length < 8) {
                showError(passwordInput, 'Password must be at least 8 characters long');
                isValid = false;
            }

            if (passwordInput.value !== confirmPasswordInput.value) {
                showError(confirmPasswordInput, 'Passwords do not match');
                isValid = false;
            }
        }

        return isValid;
    }

    function showError(input, message) {
        input.classList.add('is-invalid');
        let feedback = input.nextElementSibling;
        if (!feedback || !feedback.classList.contains('invalid-feedback')) {
            feedback = document.createElement('div');
            feedback.classList.add('invalid-feedback');
            input.parentNode.appendChild(feedback);
        }
        feedback.textContent = message;
    }
});
</script>
@endsection
