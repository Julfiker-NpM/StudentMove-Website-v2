<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
    @endpush

    <div class="dashboard-container">
        <section class="contact-section">
            <h2 class="section-title"><i class="bi bi-chat-dots"></i> Contact Customer Service</h2>
            
            @if(session('success'))
                <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif
            
            <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
                @csrf
                <label for="name">Your Name</label>
                <input id="name" name="name" type="text" placeholder="Enter your name" value="{{ Auth::user()->first_name ?? '' }} {{ Auth::user()->last_name ?? '' }}" required />
                
                <label for="email">Your Email</label>
                <input id="email" name="email" type="email" placeholder="Enter your email" value="{{ Auth::user()->email ?? '' }}" required />
                
                <label for="subject">Subject</label>
                <input id="subject" name="subject" type="text" placeholder="Enter subject" required />
                
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Type your message..." required></textarea>
                
                <button type="submit">
                    <i class="bi bi-send"></i> Send Message
                </button>
            </form>
            
            <div class="contact-info">
                <h3>Other Ways to Reach Us</h3>
                <div class="contact-methods">
                    <div class="contact-method">
                        <i class="bi bi-envelope"></i>
                        <span>studentmove.dhaka@gmail.com</span>
                    </div>
                    <div class="contact-method">
                        <i class="bi bi-telephone"></i>
                        <span>+880 1234 567890</span>
                    </div>
                    <div class="contact-method">
                        <i class="bi bi-geo-alt"></i>
                        <span>Dhaka, Bangladesh</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
