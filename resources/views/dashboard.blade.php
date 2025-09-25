<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endpush

    <div class="dashboard-container">
        <!-- Greeting/Profile Section -->
        <section class="main-greeting-section">
            <div class="profile-row">
                <div class="main-greeting">
                    <div class="greeting-text">
                        Welcome back, <span class="blue-text">{{ Auth::user()->first_name ?? 'Student' }}!</span>
                    </div>
                    <p class="dashboard-subtitle">What do you want to do today?</p>
                </div>
                <div class="profile-pic">
                    <a href="{{ route('profile.edit') }}" style="text-decoration: none; display: block;">
                        <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://randomuser.me/api/portraits/men/32.jpg' }}" alt="Profile" />
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Subscription CTA Button -->
        <div class="dashboard-cta-row">
            <a href="{{ route('subscription') }}" class="dashboard-cta-btn">
                <i class="bi bi-star-fill"></i> Subscribe Now
            </a>
        </div>

        <!-- Cards Grid -->
        <main>
            <div class="dashboard-section">
                <h2>Dashboard</h2>
                <div class="dashboard-cards">
                    <a href="{{ route('next-bus-arrival') }}" class="dashboard-card blue" style="text-decoration:none;">
                        <div class="card-title">Next Bus Arrival</div>
                        <div class="card-desc">upcoming bus arrivals</div>
                        <span class="arrow">&rarr;</span>
                    </a>
                    <a href="{{ route('route-suggestion') }}" class="dashboard-card green" style="text-decoration:none;">
                        <div class="card-title">Personalized Route Suggestion</div>
                        <div class="card-desc">Recommend routes</div>
                        <span class="arrow">&rarr;</span>
                    </a>
                    <div class="dashboard-card">
                        <div class="card-title">Past Routes Taken</div>
                        <div class="card-desc">
                            <a href="#" class="route-link" onclick="showRoute('Uttara to DSC')">Uttara to DSC</a><br>
                            <a href="#" class="route-link" onclick="showRoute('Uttara to DU')">Uttara to DU</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent-activity-section">
                <h2>Recent Activity</h2>
                <div class="dashboard-cards">
                    <div class="dashboard-card green" onclick="showFeedback()">
                        <div class="card-title">Feedback Submitted</div>
                        <div class="card-desc">Your feedback</div>
                    </div>
                    <a href="{{ route('offers') }}" class="dashboard-card red" style="text-decoration:none;">
                        <div class="card-title">Click to know about the offer</div>
                    </a>
                </div>
            </div>
        </main>
    </div>

    @push('scripts')
    <script>

        function showRoute(route) {
            alert(`Route Details: ${route}\n\nDistance: 12.5 km\nDuration: 35 minutes\nFare: ৳25\n\nBus Schedule:\n- Every 15 minutes\n- Last bus: 10:00 PM`);
        }

        function showFeedback() {
            alert('Feedback Submitted:\n\nRating: ⭐⭐⭐⭐⭐\nService: Excellent\nComments: "Very helpful app, accurate timing!"\n\nThank you for your feedback!');
        }
    </script>
    @endpush
</x-app-layout>