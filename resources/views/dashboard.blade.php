<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Our Platform</title>

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
                @auth
                    {{-- Dashboard link styled as active --}}
                    <a href="{{ url('/dashboard') }}" class="text-white font-semibold hover:text-white transition-colors auth-link auth-link-primary">Dashboard</a>
                    <a href="{{ route('help') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Help</a>
                    <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors auth-link">About</a>
                    <form method="POST" action="{{ route('logout') }}" class="ml-2">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:text-white transition-colors auth-link">
                            Log Out
                        </button>
                    </form>
                @else
                    {{-- Fallback for non-authenticated users, though typically a dashboard is for authenticated users --}}
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-2 text-white bg-purple-600 hover:bg-purple-700 transition-colors auth-link auth-link-primary">Register</a>
                    @endif
                @endauth

                {{-- Removed dark mode button as per previous instructions on other pages, can be re-added if needed --}}
                {{-- <button aria-label="Toggle dark mode" class="text-gray-300 hover:text-white transition-colors ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                </button> --}}
            </div>
        </nav>
    </header>

    <main class="flex-grow flex flex-col items-center pt-24 pb-16 px-4"> {{-- Adjusted pt-24 for page title --}}
        {{-- Dashboard Content --}}
        <div class="w-full max-w-5xl mx-auto">
            {{-- Page Title (from user's provided dashboard HTML) --}}
            <h2 class="font-bold text-3xl text-white leading-tight drop-shadow-md mb-8 text-center sm:text-left">
                {{ __('Orchid') }} {{-- Assuming this is the desired title for the dashboard page --}}
            </h2>

            {{-- Form Container from user's provided dashboard HTML --}}
            {{-- The outermost div from user's code is used as the main content wrapper here --}}
            <div class="backdrop-blur-lg bg-[#0b1f35]/60 border border-white/20 shadow-2xl rounded-2xl p-6">
                {{-- The py-12 bg-gradient... section from user's code is omitted to avoid redundant full-screen backgrounds --}}
                {{-- The inner form container from user's code --}}
                <div class="backdrop-blur-lg bg-white/70 dark:bg-white/5 border border-gray-200 dark:border-white/10 shadow-2xl rounded-2xl p-6 sm:p-10 transition duration-300">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-8">Generate Official Receipt</h3>

                    <form action="{{ route('receipt.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Project Name</label>
                            <input type="text" name="projectName" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 placeholder-gray-400 border border-gray-300
                                   dark:bg-black/20 dark:text-white dark:placeholder-gray-300 dark:border-white/20
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Customer Name</label>
                            <input type="text" name="customerName" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 placeholder-gray-400 border border-gray-300
                                   dark:bg-black/20 dark:text-white dark:placeholder-gray-300 dark:border-white/20
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Amount</label>
                            <input type="number" name="customerBalance" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 placeholder-gray-400 border border-gray-300
                                   dark:bg-black/20 dark:text-white dark:placeholder-gray-300 dark:border-white/20
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Description</label>
                            <input type="text" name="description" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 placeholder-gray-400 border border-gray-300
                                   dark:bg-black/20 dark:text-white dark:placeholder-gray-300 dark:border-white/20
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Project Start</label>
                            <input type="date" name="projectStart" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 border border-gray-300
                                   dark:bg-black/20 dark:text-white dark:border-white/20
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400"
                                   style="color-scheme: dark;"> {{-- Helps with date picker styling in dark mode --}}
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Project End</label>
                            <input type="date" name="projectEnd" required
                                   class="w-full rounded-xl p-3 bg-white/70 text-gray-900 border border-gray-300
                                   dark:bg-black/20 dark:text-white dark:border-white/20
                                   focus:outline-none focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400"
                                   style="color-scheme: dark;"> {{-- Helps with date picker styling in dark mode --}}
                        </div>

                        <div class="md:col-span-2">
                            <button type="submit"
                                    class="w-full mt-4 bg-purple-600 hover:bg-purple-700 transition-all duration-200 text-white px-6 py-3.5 rounded-xl font-semibold shadow-lg hover:shadow-purple-500/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-purple-500">
                                Download Receipt PDF
                            </button>
                        </div>
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
