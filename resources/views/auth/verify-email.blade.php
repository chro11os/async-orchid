<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Email - Our Platform</title>

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
                <a href="/" class="hover:opacity-80 transition-opacity">
                    <img src="{{ asset('img/async-logo.png') }}" alt="Async Logo" class="h-8 w-auto"> {{-- Adjust h-8 (height) as needed --}}
                </a>
            </div>
            <div class="flex items-center space-x-4">
                {{-- Navigation for a user needing to verify email (likely authenticated) --}}
                @auth
                    {{-- Optional: Link to a restricted dashboard or profile page if applicable --}}
                    {{-- <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Dashboard</a> --}}
                    <a href="{{ route('help') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Help</a>
                    <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors auth-link">About</a>
                    <form method="POST" action="{{ route('logout') }}" class="ml-2">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:text-white transition-colors auth-link">
                            Log Out
                        </button>
                    </form>
                @else
                    {{-- Fallback if somehow user is not authenticated on this page --}}
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-2 text-white bg-purple-600 hover:bg-purple-700 transition-colors auth-link auth-link-primary">Register</a>
                    @endif
                @endauth
            </div>
        </nav>
    </header>

    <main class="flex-grow flex flex-col justify-center items-center pt-24 pb-16 px-4">
        {{-- Verify Email Content --}}
        <div class="w-full max-w-md">
            <div class="backdrop-blur-lg bg-[#0b1f35]/70 border border-white/20 shadow-2xl rounded-2xl p-8 md:p-10">
                <h2 class="text-3xl font-bold text-white text-center mb-6">Verify Your Email Address</h2>

                <div class="mb-4 text-sm text-gray-300">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-6 flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                    <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                        @csrf
                        <div>
                            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 transition-all duration-200 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-purple-500/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-purple-500">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="w-full text-center underline text-sm text-gray-400 hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-offset-gray-800 py-3 px-4">
                            {{ __('Log Out') }}
                        </button>
                    </form>
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
