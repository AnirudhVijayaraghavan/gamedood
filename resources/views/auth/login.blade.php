@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <section class="relative flex items-center justify-center min-h-screen overflow-hidden px-4 py-12">
        {{-- Floating shapes --}}
        <div class="shape circle"></div>
        <div class="shape square"></div>
        <div class="shape triangle"></div>

        {{-- Card container --}}
        <div class="relative z-10 w-full max-w-md bg-black/50 dark:bg-white/10 p-8 rounded-2xl shadow-xl backdrop-blur-md">
            <h2 class="text-3xl font-bold text-neon flicker mb-6">Login</h2>

            {{-- Embed the Livewire component --}}
            <livewire:auth.login />
        </div>
    </section>
@endsection
