<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/offers.css') }}">
    @endpush

    <div class="dashboard-container">
        <section class="offers-section">
            <h2 class="section-title"><i class="bi bi-gift"></i> Current Offers</h2>
            <div class="offer-list">
                <div class="offer-card-big">
                    <div class="offer-icon-big"><i class="bi bi-gift"></i></div>
                    <div>
                        <div class="offer-title">30% Off for Students!</div>
                        <div class="offer-desc">Use code <b>STUDENT30</b> on your next ride. Valid till 31 July.</div>
                        <button class="offer-btn" onclick="copyCode('STUDENT30')">Copy Code</button>
                    </div>
                </div>
                <div class="offer-card-big">
                    <div class="offer-icon-big green"><i class="bi bi-cash-coin"></i></div>
                    <div>
                        <div class="offer-title">Refer a Friend</div>
                        <div class="offer-desc">Get 2 free rides when your friend signs up using your referral code.</div>
                        <button class="offer-btn" onclick="showReferral()">Get Referral Code</button>
                    </div>
                </div>
                <div class="offer-card-big">
                    <div class="offer-icon-big blue"><i class="bi bi-star"></i></div>
                    <div>
                        <div class="offer-title">Premium Subscription</div>
                        <div class="offer-desc">Get 20% off on 6-month subscription. Limited time offer!</div>
                        <button class="offer-btn" onclick="goToSubscription()">Subscribe Now</button>
                    </div>
                </div>
                <div class="offer-card-big">
                    <div class="offer-icon-big red"><i class="bi bi-calendar"></i></div>
                    <div>
                        <div class="offer-title">Weekend Special</div>
                        <div class="offer-desc">50% off on weekend rides. Use code <b>WEEKEND50</b></div>
                        <button class="offer-btn" onclick="copyCode('WEEKEND50')">Copy Code</button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script>
        function copyCode(code) {
            navigator.clipboard.writeText(code).then(function() {
                alert('Code copied to clipboard: ' + code);
            });
        }

        function showReferral() {
            const referralCode = 'STUDENT{{ Auth::user()->id ?? "123" }}';
            navigator.clipboard.writeText(referralCode).then(function() {
                alert('Your referral code: ' + referralCode + '\n\nCode copied to clipboard!');
            });
        }

        function goToSubscription() {
            window.location.href = '{{ route("subscription") }}';
        }
    </script>
    @endpush
</x-app-layout>
