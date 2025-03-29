@extends('landing.common.app')

@section('content')
<div class="register-page">
    <div class="row g-0">
        <!-- Left side with background image -->
        <div class="col-lg-6 register-bg">
            <div class="register-bg-content">
                <img src="{{url('landing_pages/banding/liyamana_logo.png')}}" alt="Liyamana Logo" class="register-bg-logo">
                <h1>Join Liyamana</h1>
                <p>Create your account and start sending beautiful letters to your loved ones.</p>
                <div class="register-features">
                    <div class="feature-item">
                        <i class="bi bi-person-check"></i>
                        <span>Personal Account</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Secure & Private</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-envelope-paper"></i>
                        <span>Send Letters Worldwide</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side with registration form -->
        <div class="col-lg-6 register-form-container">
            <div class="register-form-wrapper">
                <div class="text-center mb-4">
                    <h2 class="register-title">Create Account</h2>
                    <p class="register-subtitle">Join our community of letter writers</p>
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
                        <div class="step" data-step="2">
                            <div class="step-number">2</div>
                            <div class="step-title">Account Details</div>
                        </div>
                    </div>

                    <!-- Step 1: Personal Information -->
                    <div class="form-step" id="step1">
                        <div class="form-group mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary next-step">
                                Next <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Account Details -->
                    <div class="form-step" id="step2" style="display: none;">
                        <div class="form-group mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
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

                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-primary prev-step">
                                <i class="bi bi-arrow-left"></i> Previous
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Create Account
                            </button>
                        </div>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0">Already have an account? 
                        <a href="{{ route('landing.loginPage') }}" class="login-link">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.register-page {
    min-height: 100vh;
    background-color: #f8f9fa;
}

.register-bg {
    background: linear-gradient(rgba(114, 31, 38, 0.9), rgba(114, 31, 38, 0.9)),
                url('{{url('landing_pages/assets/img/letter-bg.jpg')}}') center/cover no-repeat;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
    color: white;
}

.register-bg-content {
    max-width: 500px;
    text-align: center;
}

.register-bg-logo {
    height: 80px;
    margin-bottom: 30px;
    filter: brightness(0) invert(1);
}

.register-bg h1 {
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 20px;
}

.register-bg p {
    font-size: 18px;
    opacity: 0.9;
    margin-bottom: 40px;
}

.register-features {
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

.register-form-container {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
    background: white;
}

.register-form-wrapper {
    max-width: 400px;
    width: 100%;
}

.register-title {
    color: #721f26;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 10px;
}

.register-subtitle {
    color: #6c757d;
    font-size: 16px;
}

/* Progress Steps */
.progress-steps {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
    position: relative;
}

.progress-steps::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background: #dee2e6;
    z-index: 1;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    border: 2px solid #dee2e6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #6c757d;
    margin-bottom: 8px;
    transition: all 0.3s ease;
}

.step-title {
    font-size: 14px;
    color: #6c757d;
    transition: all 0.3s ease;
}

.step.active .step-number {
    background: #721f26;
    border-color: #721f26;
    color: white;
}

.step.active .step-title {
    color: #721f26;
    font-weight: 500;
}

.step.completed .step-number {
    background: #721f26;
    border-color: #721f26;
    color: white;
}

.step.completed .step-title {
    color: #721f26;
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

.btn-primary {
    background-color: #721f26;
    border: none;
    padding: 12px 24px;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #5a1920;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(114, 31, 38, 0.2);
}

.btn-outline-primary {
    border: 1px solid #721f26;
    color: #721f26;
    padding: 12px 24px;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background-color: #721f26;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(114, 31, 38, 0.2);
}

.login-link {
    color: #721f26;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.login-link:hover {
    color: #5a1920;
    text-decoration: underline;
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
    .register-bg {
        min-height: 300px;
        padding: 20px;
    }
    
    .register-bg-content {
        max-width: 100%;
    }
    
    .register-bg h1 {
        font-size: 28px;
    }
    
    .register-bg p {
        font-size: 16px;
    }
    
    .register-form-container {
        padding: 20px;
    }
}

@media (max-width: 576px) {
    .register-bg {
        min-height: 250px;
    }
    
    .register-bg-logo {
        height: 60px;
    }
    
    .register-title {
        font-size: 24px;
    }
    
    .feature-item {
        font-size: 14px;
    }
    
    .step-title {
        font-size: 12px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const steps = document.querySelectorAll('.form-step');
    const progressSteps = document.querySelectorAll('.step');
    let currentStep = 1;

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

    function showStep(step) {
        // Hide all steps
        steps.forEach(s => s.style.display = 'none');
        
        // Show current step
        document.getElementById(`step${step}`).style.display = 'block';
        
        // Update progress steps
        progressSteps.forEach((s, index) => {
            if (index + 1 < step) {
                s.classList.add('completed');
            } else if (index + 1 === step) {
                s.classList.add('active');
                s.classList.remove('completed');
            } else {
                s.classList.remove('active', 'completed');
            }
        });
        
        currentStep = step;
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

        return isValid;
    }
});
</script>
@endsection
