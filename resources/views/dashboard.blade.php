{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="relative min-h-screen py-12 px-6">

        {{-- Nav --}}
        <nav class="relative z-10 flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-white" style="text-shadow: 0 0 4px rgba(255,255,255,0.6);">
                Gamedood.
            </h1>
            <ul class="flex space-x-6 items-center">
                <li>
                    <a wire:navigate href="{{ route('dashboard') }}" class="text-white hover:underline"
                        style="text-shadow: 0 0 3px rgba(255,255,255,0.6);">
                        Home
                    </a>
                </li>
                <li>
                    <a wire:navigate href="{{ route('profile') }}" class="text-white hover:underline"
                        style="text-shadow: 0 0 3px rgba(255,255,255,0.6);">
                        Profile
                    </a>
                </li>
                <li>
                    <a wire:navigate href="#" class="text-white hover:underline"
                        style="text-shadow: 0 0 3px rgba(255,255,255,0.6);">
                        History
                    </a>
                </li>
                <li>
                    <a wire:navigate href="#" class="text-white hover:underline"
                        style="text-shadow: 0 0 3px rgba(255,255,255,0.6);">
                        Leaderboards
                    </a>
                </li>
                <li>
                    <livewire:auth.logout-button />
                </li>
            </ul>
        </nav>

        {{-- Greeting --}}
        <div class="relative z-10 text-left mb-8">
            <span class="text-lg font-medium text-white" style="text-shadow: 0 0 3px rgba(255,255,255,0.6);">
                Welcome, {{ auth()->user()->name }}!
            </span>
        </div>

        {{-- Header & Search --}}
        <header class="relative z-10 mb-8 text-center fade-in delay-1">
            <h2 class="text-4xl font-bold text-white mb-4" style="text-shadow: 0 0 4px rgba(255,255,255,0.6);">
                Browse Games
            </h2>

            <form class="max-w-md mx-auto">
                <div class="relative">
                    <input type="search" placeholder="Search games..."
                        class="w-full bg-gray-800 dark:bg-gray-700 text-white placeholder-gray-500 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-white/60" />
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500 dark:text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104 10.5a7.5 7.5 0 0012.65 6.15z" />
                    </svg>
                </div>
            </form>
        </header>

        {{-- Game Grid --}}
        <section class="relative z-10 fade-in delay-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @for ($i = 1; $i <= 8; $i++)
                    <div
                        class="bg-black/50 dark:bg-white/10 rounded-2xl overflow-hidden shadow-lg transform hover:scale-105 transition">
                        {{-- Placeholder image --}}
                        <div class="w-full h-48 bg-gray-800 dark:bg-gray-600 flex items-center justify-center">
                            <span class="text-gray-500">Game Image</span>
                        </div>
                        {{-- Card body --}}
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white mb-2"
                                style="text-shadow: 0 0 3px rgba(255,255,255,0.6);">
                                Game Title {{ $i }}
                            </h3>
                            <p class="text-sm text-gray-300 mb-4">Short description of the game.</p>
                            <a href="#"
                                class="inline-block px-4 py-2 bg-white/30 text-black rounded-md font-bold uppercase text-xs tracking-wider shadow-md hover:bg-white/50 transition">
                                Play Now
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
        </section>
    </div>
@endsection
