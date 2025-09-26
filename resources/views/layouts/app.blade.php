<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Main Site CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <!-- Animate.css for animations -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
        <!-- Custom Styles -->
        <style>
            .logo-circle {
                width: 50px;
                height: 50px;
                background: linear-gradient(135deg, #007BFF, #28A745);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
            }
            .logo-circle img {
                width: 35px;
                height: 35px;
                object-fit: contain;
            }
        </style>

        <!-- Custom Styles -->
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
            <!-- Custom JavaScript -->
            <script>
                // Simple JavaScript for basic functionality
                function toggleDropdown() {
                    const dropdown = document.getElementById('userDropdown');
                    if (dropdown) {
                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                    }
                }

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    const dropdown = document.getElementById('userDropdown');
                    const userBtn = event.target.closest('.user-btn');
                    
                    if (!userBtn && dropdown && dropdown.style.display === 'block') {
                        dropdown.style.display = 'none';
                    }
                });
            </script>
        
        @stack('scripts')
    </body>
</html>
