<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile-settings.css') }}">
    @endpush

    <div class="profile-container">
        <div class="profile-header">
            <h1 class="profile-title"><i class="bi bi-person-circle"></i> Profile Settings</h1>
            <p class="profile-subtitle">Update your personal information and preferences</p>
            
            @if(session('status') == 'profile-updated')
                <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    <i class="bi bi-check-circle"></i> Profile updated successfully!
                </div>
            @endif
        </div>

        <form id="profile-form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            
            <!-- Profile Picture Section -->
            <div class="avatar-upload">
                <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://randomuser.me/api/portraits/men/32.jpg' }}" 
                     alt="Profile Picture" class="profile-avatar" id="profile-avatar">
                <button type="button" class="upload-btn" onclick="document.getElementById('avatar-input').click()">
                    <i class="bi bi-camera"></i> Change Photo
                </button>
                <input type="file" id="avatar-input" name="profile_image" accept="image/*" style="display: none;" onchange="previewImage(this)">
            </div>

            <!-- Personal Information -->
            <div class="form-section">
                <h3 class="form-section-title"><i class="bi bi-person"></i> Personal Information</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-input" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                        @error('first_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-input" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                        @error('last_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-input" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Mobile Number</label>
                    <input type="tel" class="form-input" name="phone" value="{{ old('phone', $user->phone) }}" required>
                    @error('phone')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-input" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                    @error('date_of_birth')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Academic Information -->
            <div class="form-section">
                <h3 class="form-section-title"><i class="bi bi-mortarboard"></i> Academic Information</h3>
                
                <div class="form-group">
                    <label class="form-label">University</label>
                    <input type="text" class="form-input" name="university" value="{{ old('university', $user->university) }}">
                    @error('university')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-input" name="department" value="{{ old('department', $user->department) }}">
                        @error('department')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Student ID</label>
                        <input type="text" class="form-input" name="student_id" value="{{ old('student_id', $user->student_id) }}">
                        @error('student_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Year of Study</label>
                    <select class="form-input" name="year_of_study">
                        <option value="1" {{ old('year_of_study', $user->year_of_study) == '1' ? 'selected' : '' }}>1st Year</option>
                        <option value="2" {{ old('year_of_study', $user->year_of_study) == '2' ? 'selected' : '' }}>2nd Year</option>
                        <option value="3" {{ old('year_of_study', $user->year_of_study) == '3' ? 'selected' : '' }}>3rd Year</option>
                        <option value="4" {{ old('year_of_study', $user->year_of_study) == '4' ? 'selected' : '' }}>4th Year</option>
                    </select>
                    @error('year_of_study')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Address Information -->
            <div class="form-section">
                <h3 class="form-section-title"><i class="bi bi-geo-alt"></i> Address Information</h3>
                
                <div class="form-group">
                    <label class="form-label">Current Address</label>
                    <input type="text" class="form-input" name="current_address" value="{{ old('current_address', $user->current_address) }}">
                    @error('current_address')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Home Address</label>
                    <input type="text" class="form-input" name="home_address" value="{{ old('home_address', $user->home_address) }}">
                    @error('home_address')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Preferences -->
            <div class="form-section">
                <h3 class="form-section-title"><i class="bi bi-gear"></i> Preferences</h3>
                
                <div class="form-group">
                    <label class="form-label">Preferred Language</label>
                    <select class="form-input" name="preferred_language">
                        <option value="en" {{ old('preferred_language', $user->preferred_language) == 'en' ? 'selected' : '' }}>English</option>
                        <option value="bn" {{ old('preferred_language', $user->preferred_language) == 'bn' ? 'selected' : '' }}>বাংলা</option>
                    </select>
                    @error('preferred_language')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Notification Settings</label>
                    <div style="margin-top: 8px;">
                        <label style="display: flex; align-items: center; margin-bottom: 8px;">
                            <input type="checkbox" name="bus_delay_notifications" value="1" 
                                   {{ old('bus_delay_notifications', $user->bus_delay_notifications) ? 'checked' : '' }} 
                                   style="margin-right: 8px;"> Bus delay notifications
                        </label>
                        <label style="display: flex; align-items: center; margin-bottom: 8px;">
                            <input type="checkbox" name="route_change_alerts" value="1" 
                                   {{ old('route_change_alerts', $user->route_change_alerts) ? 'checked' : '' }} 
                                   style="margin-right: 8px;"> Route change alerts
                        </label>
                        <label style="display: flex; align-items: center; margin-bottom: 8px;">
                            <input type="checkbox" name="promotional_offers" value="1" 
                                   {{ old('promotional_offers', $user->promotional_offers) ? 'checked' : '' }} 
                                   style="margin-right: 8px;"> Promotional offers
                        </label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <button type="submit" class="save-btn">
                <i class="bi bi-check-circle"></i> Save Changes
            </button>
            <button type="button" class="cancel-btn" onclick="window.location.href='{{ route('dashboard') }}'">
                <i class="bi bi-arrow-left"></i> Back to Dashboard
            </button>
        </form>
    </div>

    @push('scripts')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-avatar').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Form validation
        document.getElementById('profile-form').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('input[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#dc3545';
                } else {
                    field.style.borderColor = '#e9ecef';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    </script>
    @endpush
</x-app-layout>