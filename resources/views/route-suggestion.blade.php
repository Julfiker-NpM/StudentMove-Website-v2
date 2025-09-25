<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/route-suggestion.css') }}">
    @endpush

    <div class="route-suggestion-container">
        <div class="page-header">
            <h1 class="page-title"><i class="bi bi-route"></i> Personalized Route Suggestion</h1>
            <p class="page-subtitle">Get the best route recommendations based on your location and destination</p>
        </div>

        <!-- Route Input Form -->
        <div class="route-form-section">
            <form class="route-form" id="routeForm">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="currentLocation">
                            <i class="bi bi-geo-alt-fill"></i> Current Location
                        </label>
                        <input type="text" id="currentLocation" name="current_location" 
                               placeholder="Enter your current location (e.g., Uttara, Dhaka)" 
                               value="{{ Auth::user()->university ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="destination">
                            <i class="bi bi-geo-alt"></i> Destination
                        </label>
                        <input type="text" id="destination" name="destination" 
                               placeholder="Where do you want to go? (e.g., DSC, DU, BUET)" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="departureTime">
                            <i class="bi bi-clock"></i> Preferred Departure Time
                        </label>
                        <input type="time" id="departureTime" name="departure_time" 
                               value="{{ date('H:i') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="travelDate">
                            <i class="bi bi-calendar"></i> Travel Date
                        </label>
                        <input type="date" id="travelDate" name="travel_date" 
                               value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="preferences">
                        <i class="bi bi-gear"></i> Route Preferences
                    </label>
                    <div class="preferences-grid">
                        <label class="preference-item">
                            <input type="checkbox" name="preferences[]" value="fastest" checked>
                            <span>Fastest Route</span>
                        </label>
                        <label class="preference-item">
                            <input type="checkbox" name="preferences[]" value="cheapest" checked>
                            <span>Cheapest Route</span>
                        </label>
                        <label class="preference-item">
                            <input type="checkbox" name="preferences[]" value="comfortable">
                            <span>Most Comfortable</span>
                        </label>
                        <label class="preference-item">
                            <input type="checkbox" name="preferences[]" value="direct">
                            <span>Direct Route</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="suggest-btn">
                    <i class="bi bi-search"></i> Get Route Suggestions
                </button>
            </form>
        </div>

        <!-- Route Suggestions Results -->
        <div class="suggestions-section" id="suggestionsSection" style="display: none;">
            <h2 class="section-title"><i class="bi bi-list-ul"></i> Suggested Routes</h2>
            <div class="suggestions-grid" id="suggestionsGrid">
                <!-- Route suggestions will be populated here -->
            </div>
        </div>

        <!-- Popular Destinations -->
        <div class="popular-destinations">
            <h2 class="section-title"><i class="bi bi-star-fill"></i> Popular Destinations</h2>
            <div class="destinations-grid">
                <div class="destination-card" onclick="setDestination('Dhaka University (DU)')">
                    <i class="bi bi-mortarboard"></i>
                    <span>Dhaka University</span>
                </div>
                <div class="destination-card" onclick="setDestination('Daffodil International University')">
                    <i class="bi bi-building"></i>
                    <span>Daffodil University</span>
                </div>
                <div class="destination-card" onclick="setDestination('BUET')">
                    <i class="bi bi-gear"></i>
                    <span>BUET</span>
                </div>
                <div class="destination-card" onclick="setDestination('North South University')">
                    <i class="bi bi-book"></i>
                    <span>NSU</span>
                </div>
                <div class="destination-card" onclick="setDestination('Farmgate')">
                    <i class="bi bi-shop"></i>
                    <span>Farmgate</span>
                </div>
                <div class="destination-card" onclick="setDestination('Dhanmondi')">
                    <i class="bi bi-house"></i>
                    <span>Dhanmondi</span>
                </div>
            </div>
        </div>

        <!-- Route History -->
        <div class="route-history">
            <h2 class="section-title"><i class="bi bi-clock-history"></i> Recent Routes</h2>
            <div class="history-list">
                <div class="history-item" onclick="loadHistoryRoute('Uttara', 'DSC')">
                    <div class="route-info">
                        <span class="route-path">Uttara → DSC</span>
                        <span class="route-time">45 min • ৳25</span>
                    </div>
                    <i class="bi bi-arrow-right"></i>
                </div>
                <div class="history-item" onclick="loadHistoryRoute('Mirpur', 'DU')">
                    <div class="route-info">
                        <span class="route-path">Mirpur → DU</span>
                        <span class="route-time">35 min • ৳20</span>
                    </div>
                    <i class="bi bi-arrow-right"></i>
                </div>
                <div class="history-item" onclick="loadHistoryRoute('Dhanmondi', 'BUET')">
                    <div class="route-info">
                        <span class="route-path">Dhanmondi → BUET</span>
                        <span class="route-time">25 min • ৳15</span>
                    </div>
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Set destination from popular destinations
        function setDestination(destination) {
            document.getElementById('destination').value = destination;
        }

        // Load route from history
        function loadHistoryRoute(from, to) {
            document.getElementById('currentLocation').value = from;
            document.getElementById('destination').value = to;
            generateSuggestions();
        }

        // Generate route suggestions
        function generateSuggestions() {
            const currentLocation = document.getElementById('currentLocation').value;
            const destination = document.getElementById('destination').value;
            const departureTime = document.getElementById('departureTime').value;
            const travelDate = document.getElementById('travelDate').value;

            if (!currentLocation || !destination) {
                alert('Please enter both current location and destination');
                return;
            }

            // Show suggestions section
            document.getElementById('suggestionsSection').style.display = 'block';

            // Generate sample suggestions based on input
            const suggestions = generateSampleSuggestions(currentLocation, destination, departureTime);
            displaySuggestions(suggestions);
        }

        // Generate sample route suggestions
        function generateSampleSuggestions(from, to, time) {
            const suggestions = [
                {
                    id: 1,
                    title: "Fastest Route",
                    duration: "35 min",
                    cost: "৳25",
                    transfers: 1,
                    buses: ["Bus #101", "Bus #205"],
                    description: "Take Bus #101 from " + from + " to Farmgate, then transfer to Bus #205 to " + to,
                    rating: 4.5,
                    comfort: "High",
                    color: "blue"
                },
                {
                    id: 2,
                    title: "Cheapest Route",
                    duration: "50 min",
                    cost: "৳15",
                    transfers: 2,
                    buses: ["Bus #301", "Bus #102", "Bus #205"],
                    description: "Take Bus #301 to Dhanmondi, transfer to Bus #102 to Farmgate, then Bus #205 to " + to,
                    rating: 4.0,
                    comfort: "Medium",
                    color: "green"
                },
                {
                    id: 3,
                    title: "Direct Route",
                    duration: "60 min",
                    cost: "৳30",
                    transfers: 0,
                    buses: ["Bus #501"],
                    description: "Direct bus from " + from + " to " + to + " with no transfers",
                    rating: 4.2,
                    comfort: "High",
                    color: "purple"
                }
            ];

            return suggestions;
        }

        // Display suggestions
        function displaySuggestions(suggestions) {
            const grid = document.getElementById('suggestionsGrid');
            grid.innerHTML = '';

            suggestions.forEach(suggestion => {
                const card = document.createElement('div');
                card.className = `suggestion-card ${suggestion.color}`;
                card.innerHTML = `
                    <div class="suggestion-header">
                        <h3>${suggestion.title}</h3>
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <span>${suggestion.rating}</span>
                        </div>
                    </div>
                    <div class="suggestion-details">
                        <div class="detail-item">
                            <i class="bi bi-clock"></i>
                            <span>${suggestion.duration}</span>
                        </div>
                        <div class="detail-item">
                            <i class="bi bi-currency-dollar"></i>
                            <span>${suggestion.cost}</span>
                        </div>
                        <div class="detail-item">
                            <i class="bi bi-arrow-repeat"></i>
                            <span>${suggestion.transfers} transfer${suggestion.transfers > 1 ? 's' : ''}</span>
                        </div>
                        <div class="detail-item">
                            <i class="bi bi-shield-check"></i>
                            <span>${suggestion.comfort}</span>
                        </div>
                    </div>
                    <div class="suggestion-description">
                        <p>${suggestion.description}</p>
                    </div>
                    <div class="suggestion-buses">
                        <strong>Buses:</strong>
                        <div class="bus-tags">
                            ${suggestion.buses.map(bus => `<span class="bus-tag">${bus}</span>`).join('')}
                        </div>
                    </div>
                    <div class="suggestion-actions">
                        <button class="select-route-btn" onclick="selectRoute(${suggestion.id})">
                            <i class="bi bi-check-circle"></i> Select This Route
                        </button>
                        <button class="save-route-btn" onclick="saveRoute(${suggestion.id})">
                            <i class="bi bi-bookmark"></i> Save Route
                        </button>
                    </div>
                `;
                grid.appendChild(card);
            });
        }

        // Select route
        function selectRoute(routeId) {
            alert(`Route ${routeId} selected! You will be redirected to the bus tracking page.`);
            // Here you would typically redirect to bus tracking or save the selected route
        }

        // Save route
        function saveRoute(routeId) {
            alert(`Route ${routeId} saved to your favorites!`);
            // Here you would typically save the route to user's favorites
        }

        // Form submission
        document.getElementById('routeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            generateSuggestions();
        });

        // Auto-generate suggestions when both fields are filled
        document.getElementById('currentLocation').addEventListener('blur', generateSuggestions);
        document.getElementById('destination').addEventListener('blur', generateSuggestions);
    </script>
    @endpush
</x-app-layout>
