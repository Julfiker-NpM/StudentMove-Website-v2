<x-app-layout>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @endpush

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">Smart Transportation for Dhaka City Students</h1>
                    <p class="hero-subtitle">Plan your route. Track your bus. Arrive on time.</p>
                
                    @auth
                        <a href="{{ route('dashboard') }}" class="cta-button">
                            Dashboard <i class="bi bi-arrow-right"></i>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="cta-button">
                            Get Started <i class="bi bi-arrow-right"></i>
                        </a>
                    @endauth
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/home & schedula.png') }}" alt="Home and Schedule" class="illustration">
                </div>
            </div>
        </div>
    </section>

    <!-- Animated Statistics -->
    <section class="stats-section" id="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <h2 class="counter" data-target="12000">0</h2>
                    <p>Students Served</p>
                </div>
                <div class="stat-card">
                    <h2 class="counter" data-target="25">0</h2>
                    <p>University Routes</p>
                </div>
                <div class="stat-card">
                    <h2 class="counter" data-target="98">0</h2>
                    <p>% On-time Arrival</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Features</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card text-center feature-card glass-effect h-100 animate__animated animate__fadeInUp">
                        <div class="card-body">
                            <i class="bi bi-bus-front-fill"></i>
                            <h5 class="card-title mt-3">Real-time Bus Tracking</h5>
                            <p class="card-text">See live locations of university buses for smarter travel decisions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center feature-card glass-effect h-100 animate__animated animate__fadeInUp">
                        <div class="card-body">
                            <i class="bi bi-map"></i>
                            <h5 class="card-title mt-3">Route Planning & Scheduling</h5>
                            <p class="card-text">Find optimal routes, schedules, and departure times tailored for students.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center feature-card glass-effect h-100 animate__animated animate__fadeInUp">
                        <div class="card-body">
                            <i class="bi bi-bell-fill"></i>
                            <h5 class="card-title mt-3">Notifications for Delays</h5>
                            <p class="card-text">Get instant alerts about delays or schedule changes in real-time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center feature-card glass-effect h-100 animate__animated animate__fadeInUp">
                        <div class="card-body">
                            <i class="bi bi-star-fill"></i>
                            <h5 class="card-title mt-3">Feedback & Ratings</h5>
                            <p class="card-text">Share your feedback and rate the service to help us improve.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section py-5" id="pricing">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Choose Your Plan</h2>
            <p class="text-center mb-5 lead">Starting at BDT 50 per day. Price varies based on your destination.</p>
            
            <div class="row g-4 justify-content-center">
                <!-- Monthly Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card h-100 animate__animated animate__fadeInUp">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title text-primary fw-bold">Monthly Plan</h5>
                            <div class="price-tag mb-3">
                                <span class="currency">BDT</span>
                                <span class="amount">1,500</span>
                                <span class="period">/month</span>
                            </div>
                            <p class="text-muted mb-4">BDT 50 per day</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Real-time bus tracking</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Route planning & scheduling</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Delay notifications</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>24/7 customer support</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Mobile app access</li>
                            </ul>
                            <a href="{{ route('subscription') }}" class="pricing-btn">Choose Monthly</a>
                        </div>
                    </div>
                </div>

                <!-- 6 Months Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card h-100 animate__animated animate__fadeInUp" style="border: 2px solid #3B82F6;">
                        <div class="card-body text-center p-4">
                            <div class="badge bg-primary mb-2">Most Popular</div>
                            <h5 class="card-title text-primary fw-bold">6 Months Plan</h5>
                            <div class="price-tag mb-3">
                                <span class="currency">BDT</span>
                                <span class="amount">8,100</span>
                                <span class="period">/6 months</span>
                            </div>
                            <p class="text-muted mb-4">BDT 45 per day (Save 10%)</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Everything in Monthly</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Priority customer support</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Advanced route analytics</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Custom notifications</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Exclusive student discounts</li>
                            </ul>
                            <a href="{{ route('subscription') }}" class="pricing-btn primary">Choose 6 Months</a>
                        </div>
                    </div>
                </div>

                <!-- 1 Year Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card h-100 animate__animated animate__fadeInUp">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title text-primary fw-bold">1 Year Plan</h5>
                            <div class="price-tag mb-3">
                                <span class="currency">BDT</span>
                                <span class="amount">14,400</span>
                                <span class="period">/year</span>
                            </div>
                            <p class="text-muted mb-4">BDT 40 per day (Save 20%)</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Everything in 6 Months</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>VIP customer support</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Personal route optimization</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Early access to new features</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Free premium workshops</li>
                            </ul>
                            <a href="{{ route('subscription') }}" class="pricing-btn">Choose Yearly</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <p class="text-muted mb-3">* Prices may vary based on your specific destination and route</p>
                <a href="#contact" class="cta-button">
                    <i class="bi bi-chat-dots"></i> Contact for Custom Pricing
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose StudentMove Section -->
    <section class="why-section" id="why">
        <div class="container">
            <h2 class="text-center mb-4">Why Choose StudentMove?</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <ul class="list-unstyled fs-5">
                        <li class="mb-3"><i class="bi bi-check-circle me-2"></i>Specifically designed for students in Dhaka city universities.</li>
                        <li class="mb-3"><i class="bi bi-check-circle me-2"></i>Save time & energy with real-time updates and efficient route planning.</li>
                        <li class="mb-3"><i class="bi bi-check-circle me-2"></i>Receive instant notifications for bus delays or schedule changes.</li>
                        <li class="mb-3"><i class="bi bi-check-circle me-2"></i>Contribute to a safer, more reliable student transport system.</li>
                        <li class="mb-3"><i class="bi bi-check-circle me-2"></i>Accessible on mobile and desktop — anytime, anywhere.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Carousel Section -->
    <section class="testimonial-section" id="testimonials">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">What Students Say</h2>
            <div id="testimonialCarousel" class="carousel slide testimonial-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                        <div class="d-flex flex-column align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Md Julfikar Hasan" class="testimonial-avatar">
                            <p class="testimonial-quote mb-1">
                                "StudentMove makes commuting to campus so much easier. I always know where my bus is and when it will arrive!"
                            </p>
                            <div class="testimonial-author">
                                Md Julfikar Hasan, Dhaka University
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item text-center">
                        <div class="d-flex flex-column align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Ayesha Rahman" class="testimonial-avatar">
                            <p class="testimonial-quote mb-1">
                                "The notifications about delays save me from waiting endlessly at the bus stop. Highly recommended for all students!"
                            </p>
                            <div class="testimonial-author">
                                Ayesha Rahman, BRAC University
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Quick Navigation Section -->
    <section class="quick-nav-section">
        <div class="container">
            <h2 class="section-title">Quick Access</h2>
            <div class="quick-nav-grid">
                <a href="{{ route('notifications') }}" class="quick-nav-card">
                    <div class="card">
                        <i class="bi bi-bell-fill" style="font-size: 2rem; color: #007BFF; margin-bottom: 15px;"></i>
                        <h3>Notifications</h3>
                        <p>Get real-time bus alerts and updates</p>
                    </div>
                </a>
                <a href="{{ route('messages') }}" class="quick-nav-card">
                    <div class="card">
                        <i class="bi bi-envelope-fill" style="font-size: 2rem; color: #28A745; margin-bottom: 15px;"></i>
                        <h3>Contact Us</h3>
                        <p>Get help and support</p>
                    </div>
                </a>
                <a href="{{ route('offers') }}" class="quick-nav-card">
                    <div class="card">
                        <i class="bi bi-gift-fill" style="font-size: 2rem; color: #FFC107; margin-bottom: 15px;"></i>
                        <h3>Offers</h3>
                        <p>Check out special promotions</p>
                    </div>
                </a>
                <a href="{{ route('next-bus-arrival') }}" class="quick-nav-card">
                    <div class="card">
                        <i class="bi bi-bus-front-fill" style="font-size: 2rem; color: #17A2B8; margin-bottom: 15px;"></i>
                        <h3>Bus Tracking</h3>
                        <p>Track your bus in real-time</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact / Footer Section -->
    <section class="footer-section" id="contact">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <h4>Contact Us</h4>
                    <form>
                        <div class="mb-2">
                            <input type="text" class="contact-input" placeholder="Your Name" required>
                        </div>
                        <div class="mb-2">
                            <input type="email" class="contact-input" placeholder="Your Email" required>
                        </div>
                        <div class="mb-2">
                            <textarea class="contact-textarea" rows="3" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="cta-button">Send Message</button>
                    </form>
                </div>
                <div class="col-md-6 mb-3">
                    <h4>Connect With Us</h4>
                    <div class="mb-2">
                        <i class="bi bi-envelope-fill me-2"></i> wweare63fighters@gmail.com
                    </div>
                    <div class="mb-3">
                        <a href="#" class="me-3"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="me-3"><i class="bi bi-twitter-x fs-4"></i></a>
                        <a href="#" class="me-3"><i class="bi bi-linkedin fs-4"></i></a>
                        <a href="#"><i class="bi bi-instagram fs-4"></i></a>
                    </div>
                    <form class="d-flex align-items-center">
                        <input type="email" class="newsletter-input" placeholder="Subscribe to newsletter" aria-label="Newsletter">
                        <button class="newsletter-btn" type="submit"><i class="bi bi-send-fill"></i></button>
                    </form>
                </div>
            </div>
            <hr style="border-color: #495057;">
            <div class="text-center small">
                &copy; 2025 StudentMove. All rights reserved.
            </div>
        </div>
    </section>

    <!-- Floating CTA Button -->
    @auth
        <a href="{{ route('dashboard') }}" class="floating-cta animate__animated animate__fadeInUp" title="Go to Dashboard">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
    @else
        <a href="{{ route('register') }}" class="floating-cta animate__animated animate__fadeInUp" title="Get Started">
            <i class="bi bi-rocket-takeoff-fill"></i> Get Started
        </a>
    @endauth

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const target = document.querySelector(this.getAttribute('href'));
                    if(target){
                        e.preventDefault();
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
            
            // Animated counters
            const counters = document.querySelectorAll('.counter');
            const speed = 150;
            const animateCounters = () => {
                counters.forEach(counter => {
                    const animate = () => {
                        const value = +counter.getAttribute('data-target');
                        const data = +counter.innerText;
                        const increment = value / speed;
                        if(data < value) {
                            counter.innerText = Math.ceil(data + increment);
                            setTimeout(animate, 8);
                        } else {
                            counter.innerText = value;
                        }
                    }
                    animate();
                });
            };
            
            let statsVisible = false;
            window.addEventListener('scroll', () => {
                const statsSection = document.getElementById('stats');
                if(!statsVisible && window.scrollY + window.innerHeight > statsSection.offsetTop + 60) {
                    animateCounters();
                    statsVisible = true;
                }
            });
        });
    </script>
    @endpush
</x-app-layout>