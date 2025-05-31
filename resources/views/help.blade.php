<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help - Our Platform</title>

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
            {{-- Updated header navigation section to match welcome/about --}}
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
                    {{-- Style 'Help' as active on this page --}}
                    <a href="{{ route('help') }}" class="text-white font-semibold hover:text-white transition-colors auth-link auth-link-primary">Help</a>

                    {{-- Ensure 'about' is a named route and 'register' route check is intended here --}}
                    @if (Route::has('register')) {{-- This condition was from your provided code --}}
                    <a href="{{ route('about') }}" class="ml-2 text-gray-300 hover:text-white transition-colors auth-link">About</a>
                    @else
                        {{-- Fallback or alternative if register route doesn't exist but you still want an About link --}}
                        <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors auth-link ml-2">About</a>
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
        {{-- Main content for the Help page --}}
        <div class="bg-gray-800/50 backdrop-blur-md p-8 md:p-12 rounded-lg shadow-xl max-w-3xl w-full text-left">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-6 highlight-smarter inline-block">Help & Support</h1>
            <div class="text-gray-300 space-y-4 text-lg leading-relaxed">
                <p>
                    Welcome to the help section! Here you'll find answers to common questions and guidance on how to use our platform.
                </p>
                <blockquote class="border-l-4 border-purple-500 pl-4 italic text-gray-400 my-6">
                    No surplus words or unnecessary actions. - Marcus Aurelius
                </blockquote>
                <p>
                    If you can't find what you're looking for, please don't hesitate to reach out to our support team.
                </p>
                <h2 class="text-2xl font-semibold text-white mt-8 mb-3 highlight-effortlessly inline-block">Frequently Asked Questions</h2>
                <div class="space-y-3">
                    <div>
                        <h3 class="font-semibold text-purple-300">How do I reset my password?</h3>
                        <p>You can reset your password by clicking the "Forgot Password" link on the login page and following the instructions.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-purple-300">Where can I find my account settings?</h3>
                        <p>Once logged in, you can access your account settings from the dashboard, usually under a "Profile" or "Settings" section.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-purple-300">How is my data protected?</h3>
                        <p>We take data security very seriously. All sensitive data is encrypted, and we follow industry best practices to protect your information. You can learn more in our Privacy Policy.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full text-center py-10 mt-auto">
        <p class="text-sm text-gray-600">&copy; {{ date('Y') }} The Async Studio. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
