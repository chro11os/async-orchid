<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Our Platform</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Custom CSS has been removed as per user request, assuming it's in app.css --}}
</head>
<body class="antialiased bg-[#0A0A0C] text-gray-100 font-figtree">
<div class="relative min-h-screen flex flex-col">

    <header class="fixed top-0 left-0 right-0 z-50 glassmorphism-header">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center h-16">
            <div class="flex items-center space-x-8">
                <a href="/" class="text-xl font-bold text-white hover:opacity-80 transition-opacity">Logo Natin?</a>
                {{-- Removed main navigation links as per request --}}
            </div>
            <div class="flex items-center space-x-4">
                {{-- Removed social media links as per request --}}

                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:text-white transition-colors auth-link">
                            Log Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-2 text-white bg-purple-600 hover:bg-purple-700 transition-colors auth-link auth-link-primary">Register</a>
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
        <div class="pill-notification text-sm text-gray-200 py-2.5 px-6 rounded-full inline-flex items-center space-x-2.5 mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 text-purple-400 animate-pulse">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.39-3.423 3.118a.75.75 0 00.44 1.316l5.034.73L8.12 16.12a.75.75 0 001.327.727l1.838-4.347 4.76-.392 3.422-3.117a.75.75 0 00-.439-1.316l-5.033-.73-1.542-3.696zM14.25 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75v-.01a.75.75 0 00-.75-.75h-.01zM9.25 10.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75v-.01a.75.75 0 00-.75-.75h-.01zM4.25 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75v-.01a.75.75 0 00-.75-.75H4.25z" clip-rule="evenodd" />
            </svg>
            <span>Making OR's Better</span>
        </div>

        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold hero-text-shadow mb-8 leading-tight">
            <span class="highlight-smarter">Async</span> <span class="highlight-effortlessly">Orchid.</span>
        </h1>

        <p class="max-w-3xl text-lg md:text-xl text-gray-300 mb-12 leading-relaxed">
            Create better receipts, with ease.
        </p>

        <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 mb-16">
            @guest <a href="{{ route('login') }}" class="bg-white text-gray-900 font-semibold py-3.5 px-10 rounded-lg hover:bg-gray-200 transition-all duration-300 ease-in-out transform hover:scale-105 button-primary-shadow text-lg">
                Log In
                <span class="ml-2 transition-transform duration-300 group-hover:translate-x-1">→</span>
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-white font-semibold py-3.5 px-10 rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105 button-secondary-glass text-lg">
                    Register
                </a>
            @endif
            @else <a href="{{ url('/dashboard') }}" class="bg-white text-gray-900 font-semibold py-3.5 px-10 rounded-lg hover:bg-gray-200 transition-all duration-300 ease-in-out transform hover:scale-105 button-primary-shadow text-lg">
                Go to Dashboard
                <span class="ml-2 transition-transform duration-300 group-hover:translate-x-1">→</span>
            </a>
            @endguest
        </div>

        <p class="text-xs text-gray-500 tracking-wider uppercase">
            BUILT FOR THE ASYNC TEAM.
        </p>
    </main>

    <footer class="w-full text-center py-10 mt-auto">
        <p class="text-sm text-gray-600">&copy; {{ date('Y') }} The Async Studio. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
