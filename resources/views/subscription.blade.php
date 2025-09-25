<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscription.css') }}">
    @endpush

    <div class="subscription-container">
        <div class="subscription-title"><i class="bi bi-star-fill"></i> Choose Your Plan</div>
        <div class="subscription-desc">Select the perfect plan for your journey. All plans include real-time tracking and notifications.</div>

        <!-- Package Selection -->
        <div class="packages-grid">
            <!-- Monthly Plan -->
            <div class="package-card" data-plan="monthly" data-price="1500" data-name="Monthly Plan">
                <div class="package-name">Monthly Plan</div>
                <div class="package-price">৳1,500</div>
                <div class="package-period">/month</div>
                <div class="package-daily">BDT 50 per day</div>
                <ul class="package-features">
                    <li><i class="bi bi-check-circle-fill"></i>Real-time bus tracking</li>
                    <li><i class="bi bi-check-circle-fill"></i>Route planning & scheduling</li>
                    <li><i class="bi bi-check-circle-fill"></i>Delay notifications</li>
                    <li><i class="bi bi-check-circle-fill"></i>24/7 customer support</li>
                    <li><i class="bi bi-check-circle-fill"></i>Mobile app access</li>
                </ul>
                <button class="choose-btn" onclick="selectPackage('monthly', 'Monthly Plan', '৳1,500')">Choose Monthly</button>
            </div>

            <!-- 6 Months Plan -->
            <div class="package-card popular" data-plan="6months" data-price="8100" data-name="6 Months Plan">
                <div class="popular-badge">Most Popular</div>
                <div class="package-name">6 Months Plan</div>
                <div class="package-price">৳8,100</div>
                <div class="package-period">/6 months</div>
                <div class="package-daily">BDT 45 per day (Save 10%)</div>
                <ul class="package-features">
                    <li><i class="bi bi-check-circle-fill"></i>Everything in Monthly</li>
                    <li><i class="bi bi-check-circle-fill"></i>Priority customer support</li>
                    <li><i class="bi bi-check-circle-fill"></i>Advanced route analytics</li>
                    <li><i class="bi bi-check-circle-fill"></i>Custom notifications</li>
                    <li><i class="bi bi-check-circle-fill"></i>Exclusive student discounts</li>
                </ul>
                <button class="choose-btn" onclick="selectPackage('6months', '6 Months Plan', '৳8,100')">Choose 6 Months</button>
            </div>

            <!-- 1 Year Plan -->
            <div class="package-card" data-plan="yearly" data-price="14400" data-name="1 Year Plan">
                <div class="package-name">1 Year Plan</div>
                <div class="package-price">৳14,400</div>
                <div class="package-period">/year</div>
                <div class="package-daily">BDT 40 per day (Save 20%)</div>
                <ul class="package-features">
                    <li><i class="bi bi-check-circle-fill"></i>Everything in 6 Months</li>
                    <li><i class="bi bi-check-circle-fill"></i>VIP customer support</li>
                    <li><i class="bi bi-check-circle-fill"></i>Personal route optimization</li>
                    <li><i class="bi bi-check-circle-fill"></i>Early access to new features</li>
                    <li><i class="bi bi-check-circle-fill"></i>Free premium workshops</li>
                </ul>
                <button class="choose-btn" onclick="selectPackage('yearly', '1 Year Plan', '৳14,400')">Choose Yearly</button>
            </div>
        </div>

        <!-- Payment Section -->
        <div class="payment-section" id="payment-section">
            <div class="selected-package-info">
                <h4>Selected Plan: <span id="selected-plan-name">-</span></h4>
                <p>Total Amount: <span id="selected-plan-price">-</span></p>
            </div>

            <div class="payment-tabs">
                <button class="payment-tab active" id="tab-card" onclick="showTab('card')"><i class="bi bi-credit-card"></i> Card Payment</button>
                <button class="payment-tab" id="tab-mobile" onclick="showTab('mobile')"><i class="bi bi-phone"></i> Mobile Banking</button>
            </div>

            <form class="payment-form" id="form-card">
                <div class="form-group">
                    <label class="form-label">Card Number</label>
                    <input type="text" class="form-input" placeholder="1234 5678 9012 3456" maxlength="19" required />
                </div>
                <div class="form-group" style="display:flex; gap:10px;">
                    <div style="flex:1;">
                        <label class="form-label">Expiry</label>
                        <input type="text" class="form-input" placeholder="MM/YY" maxlength="5" required />
                    </div>
                    <div style="flex:1;">
                        <label class="form-label">CVV</label>
                        <input type="password" class="form-input" placeholder="123" maxlength="4" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Name on Card</label>
                    <input type="text" class="form-input" placeholder="Full Name" required />
                </div>
                <button type="submit" class="subscribe-btn"><i class="bi bi-lock-fill"></i> Subscribe Now</button>
            </form>

            <form class="payment-form" id="form-mobile" style="display:none;">
                <div class="form-group">
                    <label class="form-label">Provider</label>
                    <select class="form-select" required>
                        <option value="">Select Provider</option>
                        <option value="bkash">bKash</option>
                        <option value="nagad">Nagad</option>
                        <option value="rocket">Rocket</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Account/Number</label>
                    <input type="text" class="form-input" placeholder="01XXXXXXXXX" maxlength="15" required />
                </div>
                <div class="form-group">
                    <label class="form-label">Transaction ID</label>
                    <input type="text" class="form-input" placeholder="Enter Transaction ID" required />
                </div>
                <button type="submit" class="subscribe-btn"><i class="bi bi-lock-fill"></i> Subscribe Now</button>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        function selectPackage(plan, name, price) {
            // Update selected package info
            document.getElementById('selected-plan-name').textContent = name;
            document.getElementById('selected-plan-price').textContent = price;
            
            // Show payment section
            document.getElementById('payment-section').style.display = 'block';
            
            // Scroll to payment section
            document.getElementById('payment-section').scrollIntoView({ behavior: 'smooth' });
        }

        function showTab(tabName) {
            // Hide all forms
            document.getElementById('form-card').style.display = 'none';
            document.getElementById('form-mobile').style.display = 'none';
            
            // Remove active class from all tabs
            document.querySelectorAll('.payment-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected form and activate tab
            if (tabName === 'card') {
                document.getElementById('form-card').style.display = 'block';
                document.getElementById('tab-card').classList.add('active');
            } else {
                document.getElementById('form-mobile').style.display = 'block';
                document.getElementById('tab-mobile').classList.add('active');
            }
        }

        // Card number formatting
        document.querySelector('input[placeholder="1234 5678 9012 3456"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });

        // Expiry date formatting
        document.querySelector('input[placeholder="MM/YY"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });
    </script>
    @endpush
</x-app-layout>
