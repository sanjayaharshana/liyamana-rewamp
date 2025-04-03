@extends('landing.common.app')
@section('title', 'Register - Liyamana')
@section('meta_description', 'Create your Liyamana account to send heartfelt letters and connect with loved ones worldwide.')
@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="row g-0">
            <!-- Left side with branding -->
            <div class="col-lg-5 auth-brand">
                <div class="brand-content">
                    <img src="{{url('landing_pages/banding/liyamana_logo.png')}}" alt="Liyamana Logo" class="brand-logo">
                    <h2>Join Liyamana</h2>
                    <p>Create your account and start sending beautiful letters to your loved ones.</p>
                    <div class="brand-features">
                        <div class="feature">
                            <i class="bi bi-person-check"></i>
                            <span>Personal Account</span>
                        </div>
                        <div class="feature">
                            <i class="bi bi-shield-check"></i>
                            <span>Secure & Private</span>
                        </div>
                        <div class="feature">
                            <i class="bi bi-envelope-paper"></i>
                            <span>Send Letters Worldwide</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right side with registration form -->
            <div class="col-lg-7 auth-form">
                <div class="form-wrapper">
                    <div class="form-header">
                        <h2>Create Account</h2>
                        <p>Join our community of letter writers</p>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('landing.register') }}" id="registerForm">
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
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                           required placeholder="Create a password">
                                    <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
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
                    <div class="social-divider">
                        <span><b>Or</b></span>
                    </div>
                    <div class="social-login">
                        <a href="{{ route('google-auth') }}" class="btn btn-google">
                            <img src="{{url('landing_pages/assets/img/google-icon.png')}}" alt="Google">
                            <span>Continue with Google</span>
                        </a>
                    </div>
                    <div class="login-prompt">
                        <p>Already have an account? <a href="{{ route('landing.loginPage') }}">Login Now</a></p>
                    </div>
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
    margin-top: -200px;
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

/* Progress Steps */
.progress-steps {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    position: relative;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
    flex: 0 0 auto;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #fff;
    border: 2px solid #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #6c757d;
    margin-bottom: 8px;
    transition: all 0.3s ease;
}

.step-title {
    font-size: 0.875rem;
    color: #6c757d;
    transition: all 0.3s ease;
}

.step.active .step-number {
    background: #721f26;
    border-color: #721f26;
    color: #fff;
}

.step.active .step-title {
    color: #721f26;
    font-weight: 500;
}

.step.completed .step-number {
    background: #721f26;
    border-color: #721f26;
    color: #fff;
}

.step.completed .step-title {
    color: #721f26;
}

/* Progress Bar */
.progress-bar-container {
    flex: 1;
    padding: 0 10px;
    margin-bottom: 25px; /* Align with step numbers */
}

.progress-bar-track {
    height: 4px;
    background-color: #e9ecef;
    border-radius: 4px;
    position: relative;
    overflow: hidden;
}

.progress-bar-fill {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 0%; /* Will be updated via JS */
    background-color: #721f26;
    border-radius: 4px;
    transition: width 0.5s ease;
}

.form-actions {
    margin-top: 2rem;
    display: flex;
    justify-content: flex-end;
}
.step2-actions {
    justify-content: space-between;
}
.btn-primary {
    background-color: #721f26;
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border-radius: 8px;
}
.btn-primary:hover {
    background-color: #5a1920;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(114, 31, 38, 0.2);
}
.btn-outline-primary {
    border: 1px solid #721f26;
    color: #721f26;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border-radius: 8px;
    background-color: transparent;
}
.btn-outline-primary:hover {
    background-color: #f8f9fa;
    color: #5a1920;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.btn-register {
    background-color: #721f26;
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
.login-prompt {
    text-align: center;
    margin-top: auto;
}
.login-prompt p {
    color: #6c757d;
    margin-bottom: 0;
}
.login-prompt a {
    color: #721f26;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}
.login-prompt a:hover {
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
        font-size: 1.8rem;
    }
    .social-divider::before,
    .social-divider::after {
        width: calc(50% - 60px);
    }
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

    // Password toggle functionality for password field
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

    // Password toggle functionality for password confirmation field
    const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
    const passwordConfirmation = document.querySelector('#password_confirmation');
    togglePasswordConfirmation.addEventListener('click', function() {
        // Toggle the type attribute
        const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmation.setAttribute('type', type);
        // Toggle the icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    function showStep(step) {
        // Hide all steps
        steps.forEach(s => s.style.display = 'none');
        // Show current step
        document.getElementById(`step${step}`).style.display = 'block';
        // Update progress steps
        progressSteps.forEach((s, index) => {
            if (index + 1 < step) {
                s.classList.add('completed');
                s.classList.remove('active');
            } else if (index + 1 === step) {
                s.classList.add('active');
                s.classList.remove('completed');
            } else {
                s.classList.remove('active', 'completed');
            }
        });
        currentStep = step;

        // Update progress bar
        updateProgressBar(currentStep, totalSteps);
    }

    function updateProgressBar(currentStep, totalSteps) {
        // Calculate progress percentage
        // For a 2-step process: Step 1 = 0%, Between Step 1 and 2 = 50%, Step 2 complete = 100%
        const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
        progressBarFill.style.width = `${progressPercentage}%`;
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

            // First name validation
            if (firstNameInput.value.trim().length < 2) {
                firstNameInput.classList.add('is-invalid');
                if (!firstNameInput.nextElementSibling || !firstNameInput.nextElementSibling.classList.contains('invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.classList.add('invalid-feedback');
                    feedback.textContent = 'First name must be at least 2 characters';
                    firstNameInput.parentNode.appendChild(feedback);
                }
                isValid = false;
            }

            // Last name validation
            if (lastNameInput.value.trim().length < 2) {
                lastNameInput.classList.add('is-invalid');
                if (!lastNameInput.nextElementSibling || !lastNameInput.nextElementSibling.classList.contains('invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.classList.add('invalid-feedback');
                    feedback.textContent = 'Last name must be at least 2 characters';
                    lastNameInput.parentNode.appendChild(feedback);
                }
                isValid = false;
            }

            // Phone validation (simple check for numeric and minimum length)
            const phoneValue = phoneInput.value.trim().replace(/[^0-9]/g, '');
            if (phoneValue.length < 10) {
                phoneInput.classList.add('is-invalid');
                if (!phoneInput.nextElementSibling || !phoneInput.nextElementSibling.classList.contains('invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.classList.add('invalid-feedback');
                    feedback.textContent = 'Please enter a valid phone number (at least 10 digits)';
                    phoneInput.parentNode.appendChild(feedback);
                }
                isValid = false;
            }
        }

        // Additional validation for step 2
        if (step === 2) {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value.trim())) {
                emailInput.classList.add('is-invalid');
                if (!emailInput.nextElementSibling || !emailInput.nextElementSibling.classList.contains('invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.classList.add('invalid-feedback');
                    feedback.textContent = 'Please enter a valid email address';
                    emailInput.parentNode.appendChild(feedback);
                }
                isValid = false;
            }

            // Password validation (at least 8 characters)
            if (passwordInput.value.length < 8) {
                passwordInput.classList.add('is-invalid');
                if (!passwordInput.nextElementSibling || !passwordInput.nextElementSibling.classList.contains('invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.classList.add('invalid-feedback');
                    feedback.textContent = 'Password must be at least 8 characters long';
                    passwordInput.parentNode.appendChild(feedback);
                }
                isValid = false;
            }

            // Password confirmation validation
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordInput.classList.add('is-invalid');
                if (!confirmPasswordInput.nextElementSibling || !confirmPasswordInput.nextElementSibling.classList.contains('invalid-feedback')) {
                    const feedback = document.createElement('div');
                    feedback.classList.add('invalid-feedback');
                    feedback.textContent = 'Passwords do not match';
                    confirmPasswordInput.parentNode.appendChild(feedback);
                }
                isValid = false;
            }
        }

        return isValid;
    }
});

</script>
@endsection
