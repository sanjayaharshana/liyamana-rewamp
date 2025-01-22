@extends('landing.common.app')

@section('content')
<style>

</style>

<div style="padding-top: 100px; padding-bottom: 22vh;background-size: contain;background: #480c0c">
    <div class="container forgot-password-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4" style="background: #9e1c36;color: white;">
                    <div class="text-center mb-4">
                        <h3 style="color: thistle">Reset Password</h3>
                        <p>Please enter your new password</p>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required
                                   style="background-color: #5b1a20;border-style: inherit;">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" required
                                   style="background-color: #5b1a20;border-style: inherit;">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required
                                   style="background-color: #5b1a20;border-style: inherit;">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn" style="background: #520202; color: white;">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
