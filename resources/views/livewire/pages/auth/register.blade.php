<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public $birthday;
    public string $sex = '';
    public string $address = '';
    public string $usertype = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'birthday' => ['required'],
            'sex' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'usertype' => ['required', 'string', 'max:155'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('documate.home', absolute: false), navigate: true);
    }
}; ?>

<div class="my-5" style="overflow: scroll; height: 70vh">
    <form wire:submit="register" class="px-5">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Birthday -->
        <div class="mt-4 text-black">
            <x-input-label for="birthday" :value="__('Birthday')" />
            <x-text-input wire:model="birthday" id="birthday" class="block mt-1 w-full" type="date" name="birthday" required autofocus autocomplete="birthday" />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <!-- Sex -->
        <div class="mt-4 text-black">
            <x-input-label for="sex" :value="__('Sex')" />
            <div class="block mt-1 w-full">
                <select wire:model="sex" class="block mt-1 w-full rounded-md border-slate-300">
                    <option value="none" selected>None</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <x-input-error :messages="$errors->get('sex')" class="mt-2" />
            </div>
        </div>

        <!-- Address -->
        <div class="mt-4 text-black">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input wire:model="address" id="address" class="block mt-1 w-full" type="text" name="address" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Usertype -->
        <div class="mt-4 text-black">
            <x-input-label for="usertype" :value="__('User Type')" />
            <div class="block mt-1 w-full">
                <select wire:model="usertype" class="block mt-1 w-full rounded-md border-slate-300">
                    <option value="none" selected>None</option>
                    <option value="Customer">Customer</option>
                    @if (Auth::user())
                        @if (Auth::user()->usertype == "Administrator")
                            <option value="Staff">Staff</option>
                            <option value="Admistrator">Administrator</option>
                        @endif
                    @endif
                </select>
                <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4 text-black">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 text-black">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 text-black">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
