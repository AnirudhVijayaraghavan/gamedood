<div class="space-y-12">
    {{-- 1) Account Info --}}
    <div class="profile-card bg-black/50 dark:bg-white/10 p-6 rounded-2xl shadow-xl backdrop-blur-md">
        <h3 class="text-2xl font-bold text-white mb-4 flicker" style="text-shadow:0 0 4px rgba(255,255,255,0.6)">
            Account Information
        </h3>

        @if ($accountMessage)
            <div class="p-3 bg-green-600 text-white rounded mb-4 text-center">
                {{ $accountMessage }}
            </div>
        @endif

        <form wire:submit.prevent="updateAccount" class="space-y-4">
            <div>
                <label class="block text-sm mb-1 text-white">Name</label>
                <input type="text" wire:model="name"
                    class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white
                 focus:outline-none focus:ring-2 focus:ring-white/60" />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm mb-1 text-white">Email</label>
                <input type="text" wire:model="email"
                    class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white
                 focus:outline-none focus:ring-2 focus:ring-white/60" />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="mt-2 px-6 py-2 bg-neon-blue text-white rounded font-bold uppercase tracking-wide shadow
               hover:bg-neon-blue/70 transition">
                Save Changes
            </button>
        </form>
    </div>

    {{-- 2) Security --}}
    <div class="profile-card bg-black/50 dark:bg-white/10 p-6 rounded-2xl shadow-xl backdrop-blur-md">
        <h3 class="text-2xl font-bold text-white mb-4 flicker" style="text-shadow:0 0 4px rgba(255,255,255,0.6)">
            Change Password
        </h3>

        @if ($passwordMessage)
            <div class="p-3 bg-green-600 text-white rounded mb-4 text-center">
                {{ $passwordMessage }}
            </div>
        @endif

        <form wire:submit.prevent="changePassword" class="space-y-4">
            <div>
                <label class="block text-sm mb-1 text-white">New Password</label>
                <input type="password" wire:model="new_password"
                    class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white
                 focus:outline-none focus:ring-2 focus:ring-white/60" />
                @error('new_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm mb-1 text-white">Confirm Password</label>
                <input type="password" wire:model="new_password_confirmation"
                    class="w-full border border-gray-400 dark:border-gray-600 p-2 rounded bg-transparent text-white
                 focus:outline-none focus:ring-2 focus:ring-white/60" />
            </div>
            <button type="submit"
                class="mt-2 px-6 py-2 bg-neon-pink text-black rounded font-bold uppercase tracking-wide shadow
               hover:bg-neon-pink/70 transition">
                Update Password
            </button>
        </form>
    </div>

    {{-- 3) Danger Zone --}}
    <div class="profile-card bg-black/50 dark:bg-white/10 p-6 rounded-2xl shadow-xl backdrop-blur-md">
        <h3 class="text-2xl font-bold text-red-500 mb-4">Danger Zone</h3>
        <p class="text-sm text-gray-300 mb-4">Once you delete your account, there is no going back. Please be certain.
        </p>
        <button wire:click="confirmDelete"
            class="px-6 py-2 bg-red-600 text-white rounded font-bold uppercase tracking-wide shadow
             hover:bg-red-700 transition">
            Delete My Account
        </button>
    </div>

    {{-- 4) Future Features --}}
    <div class="profile-card bg-black/50 dark:bg-white/10 p-6 rounded-2xl shadow-xl backdrop-blur-md">
        <h3 class="text-2xl font-bold text-white mb-4 flicker" style="text-shadow:0 0 4px rgba(255,255,255,0.6)">
            Future Features
        </h3>
        <ul class="list-disc list-inside text-gray-300 space-y-2">
            <li>Two-Factor Authentication (coming soon)</li>
            <li>Notification Settings</li>
            <li>Connected Accounts (Discord, Steam)</li>
            <li>Privacy Preferences</li>
        </ul>
    </div>

    {{-- Confirmation Modal --}}
    @if ($confirmingDelete)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-70">
            <div class="bg-black/80 dark:bg-white/20 p-6 rounded-lg text-center max-w-sm mx-auto">
                <p class="text-white mb-6">
                    Are you absolutely sure?<br>
                    <span class="font-bold">Deleting your account cannot be undone.</span>
                </p>
                <div class="flex justify-center gap-4">
                    <button wire:click="deleteAccount" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Yes, Delete
                    </button>
                    <button wire:click="cancelDelete"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    gsap.from('.profile-card', {
      opacity: 0,
      y: 100,
      duration: 1,
      ease: 'power2.out',
      stagger: 0.9
    });
  });
</script>
