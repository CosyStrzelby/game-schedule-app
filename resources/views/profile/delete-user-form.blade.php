<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('DELETE')
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required autocomplete="current-password" />
        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
    </div>
    <div class="mt-6 flex justify-end">
        <x-danger-button>
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>
</form>
