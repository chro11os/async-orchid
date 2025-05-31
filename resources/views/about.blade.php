<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Our Platform</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Assuming custom CSS (glassmorphism, highlights, shadows, grid background etc.)
         is in resources/css/app.css as per previous instructions --}}
</head>
<body class="antialiased bg-[#0A0A0C] text-gray-100 font-figtree">
<div class="relative min-h-screen flex flex-col">

    <header class="fixed top-0 left-0 right-0 z-50 glassmorphism-header">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center h-16">
            <div class="flex items-center space-x-8">
                {{-- Updated to use an image for the logo --}}
                <a href="/" class="hover:opacity-80 transition-opacity">
                    <img src="{{ asset('img/async-logo.png') }}" alt="Async Logo" class="h-8 w-auto"> {{-- Adjust h-8 (height) as needed --}}
                </a>
            </div>
            {{-- Updated header navigation section --}}
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:text-white transition-colors auth-link">
                            Log Out
                        </button>
                    </form>
                @else
                    {{-- Ensure 'help' is a named route in your web.php --}}
                    <a href="{{ route('help') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Help</a>

                    {{-- Ensure 'about' is a named route and 'register' route check is intended here --}}
                    {{-- Style 'About' as active on this page --}}
                    @if (Route::has('register')) {{-- This condition was from your provided code --}}
                    <a href="{{ route('about') }}" class="ml-2 text-white font-semibold hover:text-white transition-colors auth-link auth-link-primary">About</a>
                    @else
                        {{-- Fallback or alternative if register route doesn't exist but you still want an About link --}}
                        <a href="{{ route('about') }}" class="text-white font-semibold hover:text-white transition-colors auth-link auth-link-primary ml-2">About</a>
                    @endif
                @endauth

                <button aria-label="Toggle dark mode" class="text-gray-300 hover:text-white transition-colors ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                </button>
            </div>
        </nav>
    </header>

    <main class="flex-grow flex flex-col justify-center items-center pt-32 pb-16 px-4 text-center">
        {{-- Main content for the About page --}}
        <div class="bg-gray-800/50 backdrop-blur-md p-8 md:p-12 rounded-lg shadow-xl max-w-3xl w-full text-left">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-6 highlight-smarter inline-block">About Us</h1>
            <div class="text-gray-300 space-y-4 text-lg leading-relaxed">
                <p>
                    Welcome to "Logo Natin?"! We are The Async Studio, a passionate team dedicated to creating innovative solutions that make a difference. Our project, Async / Orchid, is designed to revolutionize how official receipts (ORs) are handled, making the process smoother and more efficient.
                </p>
                <p>
                    Our mission is to build tools that are not only powerful but also intuitive and easy to use. We believe in the power of technology to simplify complexities and empower individuals and businesses alike.
                </p>
                <h2 class="text-2xl font-semibold text-white mt-8 mb-3 highlight-effortlessly inline-block">Our Vision</h2>
                <p>
                    We envision a future where managing essential documentation is seamless and effortless. Through continuous innovation and a user-centric approach, we strive to be at the forefront of digital transformation in this space.
                </p>
                <h2 class="text-2xl font-semibold text-white mt-8 mb-3 highlight-smarter inline-block">The Team</h2>
                <p>
                    "Logo Natin?" is brought to you by The Async Team. We are a group of dedicated developers, designers, and thinkers committed to excellence and driven by the challenge of solving real-world problems.
                </p>
                <blockquote class="border-l-4 border-purple-500 pl-4 italic text-gray-400 my-6">
                    "Simplicity is the ultimate sophistication." - Leonardo da Vinci (Placeholder quote)
                </blockquote>
            </div>
        </div>
    </main>

    <footer class="w-full text-center py-10 mt-auto">
        <p class="text-sm text-gray-600">&copy; {{ date('Y') }} The Async Studio. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
