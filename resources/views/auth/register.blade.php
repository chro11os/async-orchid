<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Our Platform</title>

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
                {{-- Navigation for guest users on the register page --}}
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Log In</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-white font-semibold hover:text-white transition-colors auth-link auth-link-primary">Register</a>
                @endif
                <a href="{{ route('help') }}" class="text-gray-300 hover:text-white transition-colors auth-link">Help</a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors auth-link">About</a>
                {{-- Dark mode toggle removed as per previous instructions for other pages --}}
            </div>
        </nav>
    </header>

    <main class="flex-grow flex flex-col justify-center items-center pt-24 pb-16 px-4">
        {{-- Register Form Content --}}
        <div class="w-full max-w-md">
            {{-- Using a similar styled container as login/help/about pages for the form --}}
            <div class="backdrop-blur-lg bg-[#0b1f35]/70 border border-white/20 shadow-2xl rounded-2xl p-8 md:p-10">
                <h2 class="text-3xl font-bold text-white text-center mb-8">Create Your Account</h2>

                {{-- The user's provided form structure starts here --}}
                {{-- Note: The <x-guest-layout> component is typically used for the entire page layout in Breeze/Jetstream.
                     Since we are building a custom layout, we'll integrate the form directly.
                     Laravel Breeze/Jetstream components like x-input-label, x-text-input, x-input-error, x-primary-button
                     are assumed to be available and styled appropriately by your app.css (Tailwind).
                     If they are not, you might need to replace them with standard HTML and Tailwind classes. --}}

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-1">{{ __('Name') }}</label>
                        <input id="name" class="block mt-1 w-full rounded-xl p-3 bg-black/20 text-white placeholder-gray-400 border-white/20 focus:ring-purple-500 focus:border-purple-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1">{{ __('Email') }}</label>
                        <input id="email" class="block mt-1 w-full rounded-xl p-3 bg-black/20 text-white placeholder-gray-400 border-white/20 focus:ring-purple-500 focus:border-purple-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-1">{{ __('Password') }}</label>
                        <input id="password" class="block mt-1 w-full rounded-xl p-3 bg-black/20 text-white placeholder-gray-400 border-white/20 focus:ring-purple-500 focus:border-purple-500"
                               type="password"
                               name="password"
                               required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" class="block mt-1 w-full rounded-xl p-3 bg-black/20 text-white placeholder-gray-400 border-white/20 focus:ring-purple-500 focus:border-purple-500"
                               type="password"
                               name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a class="underline text-sm text-gray-400 hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button type="submit" class="ms-4 w-full sm:w-auto bg-purple-600 hover:bg-purple-700 transition-all duration-200 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-purple-500/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-purple-500">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="w-full text-center py-10 mt-auto">
        <p class="text-sm text-gray-600">&copy; {{ date('Y') }} The Async Studio. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
