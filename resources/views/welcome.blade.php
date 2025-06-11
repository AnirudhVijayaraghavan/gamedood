{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
    <section class="relative flex items-center justify-center h-screen overflow-hidden px-4">
        {{-- Floating shapes --}}
        <div class="shape circle"></div>
        <div class="shape square"></div>
        <div class="shape triangle"></div>

        {{-- Hero content --}}
        <div class="relative z-10 text-center">
            <h1 class="text-6xl sm:text-7xl font-bold text-neon fade-in delay-1 flicker">
                Gamedood.
            </h1>
            <p class="text-xl mb-8 text-neon fade-in delay-2">
                A throwback to a simpler era.
            </p>
            <div class="flex items-center justify-center gap-6 fade-in delay-3">
                {{-- Login Button --}}
                <a href="{{ route('login') }}"
                    class="inline-block px-6 py-2 border-2 rounded-lg border-neon-blue
                text-neon font-bold uppercase hover:bg-neon-blue/40
                transition duration-300">
                    Login
                </a>
                {{-- Browse Games --}}
                <a href="#browse"
                    class="inline-block px-6 py-2 border-2 rounded-lg border-neon-pink
                text-neon font-bold uppercase hover:bg-neon-pink/40
                transition duration-300">
                    Browse Games
                </a>
            </div>
        </div>
    </section>

    {{-- Features section (unchanged) --}}
    <section id="features" class="py-20 px-6 bg-black/20 dark:bg-white/10">
        <h2 class="text-4xl text-center text-neon fade-in delay-4">Features</h2>
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div class="p-6 bg-black/50 dark:bg-white/10 rounded-lg text-center fade-in delay-5">
                <div class="mb-4 text-5xl text-neon">🕹️</div>
                <h3 class="font-bold mb-2">Thousands of Games</h3>
                <p class="text-sm">Browse a massive library of 2D & 3D browser titles.</p>
            </div>
            <div class="p-6 bg-black/50 dark:bg-white/10 rounded-lg text-center fade-in delay-5">
                <div class="mb-4 text-5xl text-neon">🏆</div>
                <h3 class="font-bold mb-2">Live Leaderboards</h3>
                <p class="text-sm">Compete in real-time and climb the ranks.</p>
            </div>
            <div class="p-6 bg-black/50 dark:bg-white/10 rounded-lg text-center fade-in delay-5">
                <div class="mb-4 text-5xl text-neon">💬</div>
                <h3 class="font-bold mb-2">Community Chat</h3>
                <p class="text-sm">Join lobbies, chat, and make friends.</p>
            </div>
        </div>
    </section>
@endsection
