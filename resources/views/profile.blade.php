@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <section class="relative flex items-center justify-center min-h-screen overflow-hidden px-4 py-12">


        <div class="relative z-10 w-full max-w-2xl space-y-8">
            {{-- Back --}}
            <a href="{{ route('dashboard') }}" class="inline-block text-white hover:underline mb-2"
                style="text-shadow:0 0 3px rgba(255,255,255,0.6);">
                &larr; Back to Dashboard
            </a>

            {{-- Embed component --}}
            <livewire:profile.edit-profile />
        </div>
    </section>
@endsection
