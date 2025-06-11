<div class="relative z-10 w-full max-w-md bg-black/50 dark:bg-white/10 p-8 rounded-2xl shadow-xl backdrop-blur-md">
  

  <form wire:submit.prevent="login" class="space-y-4">
    @csrf
    <div>
      <label class="block text-sm mb-1">Email</label>
      <input
        type="email"
        wire:model="email"
        class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-neon-blue"
      />
      @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>

    <div>
      <label class="block text-sm mb-1">Password</label>
      <input
        type="password"
        wire:model="password"
        class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-neon-blue"
      />
      @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>

    <div class="flex items-center">
      <input type="checkbox" wire:model="remember" id="remember" class="mr-2" />
      <label for="remember" class="text-sm">Remember me</label>
    </div>

    <button
      type="submit"
      class="w-full py-2 rounded text-white font-bold uppercase tracking-wide"
      style="background: var(--neon-blue); box-shadow: 0 0 8px var(--neon-blue);"
    >
      Log In
    </button>
  </form>

  <p class="mt-4 text-center text-sm text-gray-300">
    Don’t have an account?
    <a wire:navigate href="{{ route('register') }}"
       class="font-bold hover:underline"
       style="color: var(--neon-pink);">
      Register
    </a>
  </p>
</div>
