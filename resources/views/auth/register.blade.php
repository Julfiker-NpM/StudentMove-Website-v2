<x-guest-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    @endpush

    <div class="signup-container">
        <div class="signup-header">
            <h1 class="signup-title"><i class="bi bi-person-plus"></i> Create Account</h1>
            <p class="signup-subtitle">Join StudentMove and start your journey today!</p>
        </div>

        <!-- Demo Information -->
        <div class="demo-info">
            <i class="bi bi-info-circle"></i> <strong>Create your StudentMove account</strong>
        </div>

        <form class="signup-form" method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <input type="text" name="first_name" class="form-input" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>
                    @error('first_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" class="form-input" placeholder="Last Name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-input" placeholder="Email Address" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="tel" name="phone" class="form-input" placeholder="Mobile Number" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="university" class="form-input" placeholder="University" value="{{ old('university') }}" required>
                @error('university')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="student_id" class="form-input" placeholder="Student ID" value="{{ old('student_id') }}" required>
                @error('student_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-input" placeholder="Password" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm Password" required>
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="terms-group">
                <input type="checkbox" name="terms" {{ old('terms') ? 'checked' : '' }} required>
                <div class="terms-text">
                    I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>. I also agree to receive notifications about my bus routes and updates.
                </div>
                @error('terms')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="signup-btn">
                <i class="bi bi-person-plus"></i> Create Account
            </button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="signin-link">
            Already have an account? <a href="{{ route('login') }}">Sign In</a>
        </div>
    </div>
</x-guest-layout>