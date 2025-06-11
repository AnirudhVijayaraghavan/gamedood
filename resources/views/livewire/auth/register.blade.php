<div class="relative z-10 w-full max-w-md bg-black/50 dark:bg-white/10 p-8 rounded-2xl shadow-xl backdrop-blur-md">
    

    <form wire:submit.prevent="register" class="space-y-4">
        <div>
            <label class="block text-sm mb-1">Name</label>
            <input type="text" wire:model.debounce.500ms="name"
                class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-neon-pink" />
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm mb-1">Email</label>
            <input type="email" wire:model="email"
                class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-neon-pink" />
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm mb-1">Password</label>
            <input type="password" wire:model="password"
                class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-neon-pink" />
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm mb-1">Confirm Password</label>
            <input type="password" wire:model="password_confirmation"
                class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-neon-pink" />
        </div>

        <button type="submit" class="w-full py-2 rounded text-black font-bold uppercase tracking-wide"
            style="background: var(--neon-pink); box-shadow: 0 0 8px var(--neon-pink);">
            Create Account
        </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-300">
        Already have an account?
        <a wire:navigate href="{{ route('login') }}" class="font-bold hover:underline" style="color: var(--neon-blue);">
            Login
        </a>
    </p>
</div>
