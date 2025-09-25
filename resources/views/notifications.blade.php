<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
    @endpush

    <div class="dashboard-container">
        <section class="notification-section">
            <h2 class="section-title"><i class="bi bi-bell"></i> Notifications</h2>
            <div class="notification-list">
                <div class="notification-card">
                    <div class="notification-icon blue"><i class="bi bi-bus-front"></i></div>
                    <div>
                        <div class="notification-message">Your bus #7 is arriving in 5 minutes!</div>
                        <small class="notification-time">2 min ago</small>
                    </div>
                </div>
                <div class="notification-card">
                    <div class="notification-icon green"><i class="bi bi-check-circle"></i></div>
                    <div>
                        <div class="notification-message">Your feedback was received. Thank you!</div>
                        <small class="notification-time">1 hour ago</small>
                    </div>
                </div>
                <div class="notification-card">
                    <div class="notification-icon red"><i class="bi bi-gift"></i></div>
                    <div>
                        <div class="notification-message">Special Offer: 30% off for students!</div>
                        <small class="notification-time">1 day ago</small>
                    </div>
                </div>
                <div class="notification-card">
                    <div class="notification-icon blue"><i class="bi bi-clock"></i></div>
                    <div>
                        <div class="notification-message">Route #205 schedule updated for tomorrow</div>
                        <small class="notification-time">2 days ago</small>
                    </div>
                </div>
                <div class="notification-card">
                    <div class="notification-icon green"><i class="bi bi-star"></i></div>
                    <div>
                        <div class="notification-message">Welcome to StudentMove! Complete your profile to get started.</div>
                        <small class="notification-time">3 days ago</small>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
