<header class="custom-navbar">
    <div class="nav-content">
        <div class="logo-circle">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="StudentMove" />
            </a>
        </div>
        <nav class="main-menu">
            <a href="{{ route('home') }}" class="@if(request()->routeIs('home')) active @endif">Home</a>
            <a href="{{ route('notifications') }}" class="@if(request()->routeIs('notifications')) active @endif">Notifications</a>
            <a href="{{ route('messages') }}" class="@if(request()->routeIs('messages')) active @endif">Contact</a>
            <a href="{{ route('offers') }}" class="@if(request()->routeIs('offers')) active @endif">Offers</a>
            @auth
                <a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')) active @endif">Dashboard</a>
            @endauth
        </nav>
        <div class="auth-actions">
            @auth
                <div class="user-dropdown">
                    <button class="user-btn" onclick="toggleDropdown()">
                        {{ Auth::user()->first_name ?? Auth::user()->name }} ▼
                    </button>
                    <div class="dropdown-menu" id="userDropdown">
                        <a href="{{ route('profile.edit') }}">Profile</a>
                        <hr>
                        <form method="POST" action="{{ route('logout') }}">@csrf
                            <button type="submit" class="logout-btn">Log Out</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="auth-btn signin-btn">Sign In</a>
                <a href="{{ route('register') }}" class="auth-btn signup-btn">Sign Up</a>
            @endauth
        </div>
    </div>
</header>

<style>
.auth-actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.user-dropdown {
    position: relative;
}

.user-btn {
    background: #007BFF;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 20px;
    cursor: pointer;
    font-weight: 500;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    padding: 10px 0;
    min-width: 150px;
    display: none;
    z-index: 1000;
}

.dropdown-menu a {
    display: block;
    padding: 8px 16px;
    color: #333;
    text-decoration: none;
    transition: background 0.3s ease;
}

.dropdown-menu a:hover {
    background: #f8f9fa;
}

.dropdown-menu hr {
    margin: 5px 0;
    border: none;
    border-top: 1px solid #eee;
}

.logout-btn {
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    padding: 8px 16px;
    color: #dc3545;
    cursor: pointer;
    transition: background 0.3s ease;
}

.logout-btn:hover {
    background: #f8f9fa;
}

.auth-btn {
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.signin-btn {
    background: transparent;
    color: #007BFF;
    border: 2px solid #007BFF;
}

.signin-btn:hover {
    background: #007BFF;
    color: white;
}

.signup-btn {
    background: #28A745;
    color: white;
}

.signup-btn:hover {
    background: #1e7e34;
    color: white;
}
</style>

<script>
function toggleDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('userDropdown');
    const userBtn = event.target.closest('.user-btn');
    
    if (!userBtn && dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    }
});
</script>