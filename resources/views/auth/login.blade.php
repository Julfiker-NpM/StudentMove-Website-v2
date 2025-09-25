<x-guest-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
    @endpush

    <div class="signin-container">
        <div class="signin-header">
            <h1 class="signin-title"><i class="bi bi-person-circle"></i> Welcome Back</h1>
            <p class="signin-subtitle">Sign in to your StudentMove account</p>
        </div>

        <!-- Demo Information -->
        <div class="demo-info">
            <i class="bi bi-info-circle"></i> <strong>Sign in to your account</strong>
        </div>

        <form class="signin-form" method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <input type="email" name="email" class="form-input" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <input type="password" name="password" class="form-input" placeholder="Password" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-options">
                <label class="checkbox-group">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span style="font-size: 0.9rem; color: #6c757d;">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                @endif
            </div>

            <button type="submit" class="signin-btn">
                <i class="bi bi-box-arrow-in-right"></i> Sign In
            </button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="signup-link">
            Don't have an account? <a href="{{ route('register') }}">Create Account</a>
        </div>
    </div>
</x-guest-layout>