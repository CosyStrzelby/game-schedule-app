@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8 py-3" style="font-size: 48px; font-weight: bolder;">Profile Information</h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('patch')
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
            <form method="POST" action="{{ route('profile.password') }}" class="space-y-6 mt-6">
                @csrf
                @method('patch')
                <div>
                    <x-input-label for="current_password" :value="__('Current Password')" />
                    <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" required autocomplete="current-password" />
                    <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
                </div>
                <div>
                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                    <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Update Password') }}</x-primary-button>
                </div>
            </form>
            <form method="POST" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6">
                @csrf
                @method('delete')
                <div>
                    <x-input-label for="password" :value="__('Type your password to confirm your delete')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
                </div>
            </form>
        </div>
    </div>
@endsection
