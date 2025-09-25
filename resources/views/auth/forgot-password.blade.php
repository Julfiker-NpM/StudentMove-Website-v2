<x-guest-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
    @endpush

    <div class="signin-container">
        <div class="signin-header">
            <h1 class="signin-title"><i class="bi bi-key"></i> Forgot Password</h1>
            <p class="signin-subtitle">Enter your email to reset your password</p>
        </div>

        <!-- Demo Information -->
        <div class="demo-info">
            <i class="bi bi-info-circle"></i> <strong>We'll send you a password reset link</strong>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="success-message">
                <i class="bi bi-check-circle"></i> {{ session('status') }}
            </div>
        @endif

        <form class="signin-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div class="form-group">
                <input type="email" name="email" class="form-input" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="signin-btn">
                <i class="bi bi-envelope"></i> Send Reset Link
            </button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="signup-link">
            Remember your password? <a href="{{ route('login') }}">Sign In</a>
        </div>
    </div>

    <style>
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .success-message i {
            color: #28a745;
            font-size: 1.2em;
        }

        .signin-title i {
            color: #007BFF;
        }

        .signin-btn {
            background: linear-gradient(135deg, #007BFF, #0056b3);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            margin-top: 20px;
        }

        .signin-btn:hover {
            background: linear-gradient(135deg, #0056b3, #007BFF);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
        }

        .signin-btn i {
            font-size: 1.2em;
        }
    </style>
</x-guest-layout>
