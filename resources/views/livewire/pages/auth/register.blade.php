<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state([
    'name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => '',
	'remember' => true,
]);

rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();
    $validated['password'] = Hash::make($validated['password']);
	$guestId = session()->pull('guest_id_to_merge');
	$guest = $guestId ? User::find($guestId) : null;

	if ($guest && $guest->status === 'guest') {
		$guest->update([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
        'status' => 'client',
        'session_id' => null]);
		$user = $guest;
		cookie()->queue(cookie()->forget('guest_id'));
	} else {
		event(new Registered($user = User::create($validated)));
	}
	
    Auth::login($user, $this->remember);

    $this->redirect(route('main', absolute: false), navigate: false);
};

?>

<div>
	<h1 class="text-xl">Создайте аккаунт</h1>
    <form  wire:submit="register">
        <!-- Name -->
		<p class="text-white/60 text-sm my-4">Добро пожаловать! Регистрируйтесь и приступаем к вашему проекту</p>
        <div>
			<div class="flex items-center gap-1">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
				<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
				</svg>
				<x-input-label for="name" :value="__('Ваше имя')" />
			</div>
            
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
		<div class="flex items-center gap-1">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
			<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
			</svg>
			<x-input-label for="email" :value="__('Email')" />
		</div>
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
		<div class="flex items-center gap-1">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
			<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
			</svg>
			<x-input-label for="password" :value="__('Пароль')" />
		</div>
            <div x-data="{ show: false }" class="relative mt-1">
    <input
        wire:model="password"
        id="password"
        :type="show ? 'text' : 'password'"
        name="password"
        required
        autocomplete="current-password"
        class="block w-full pr-10 rounded-md border-[#494338] bg-[#1d1d1d] text-white focus:border-[#9f7e51] focus:ring-0"
    >

    <button type="button"
            @click="show = !show"
            class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#9f7e51] hover:text-[#f8d495] transition-colors">

        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>

        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
        </svg>
    </button>
	</div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
		<div class="flex items-center gap-1">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
			<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
			<circle cx="12" cy="16" r="1" fill="currentColor" stroke="none" />
			</svg>
			<x-input-label for="password_confirmation" :value="__('Подтверждение пароля')" />
		</div>
            <div x-data="{ show: false }" class="relative mt-1">
		<input
			wire:model="password_confirmation"
			id="password"
			:type="show ? 'text' : 'password'"
			name="password"
			required
			autocomplete="current-password"
			class="block w-full pr-10 rounded-md border-[#494338] bg-[#1d1d1d] text-white focus:border-[#9f7e51] focus:ring-0"
		>

		<button type="button"
				@click="show = !show"
				class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#9f7e51] hover:text-[#f8d495] transition-colors">

			<svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
				<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
				<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
			</svg>

			<svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
			</svg>
		</button>
	</div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
		
		<div class="block mt-4">
		<label for="remember" class="inline-flex items-center">
			<input 
				wire:model="remember" 
				id="remember" 
				type="checkbox" 
				checked
				class="m-2 bg-[#1d1d1d] rounded-md text-[#494338] w-5 h-5 border-[#494338]  rounded-sm  transition-all duration-100 focus:border-transparent focus:ring-0 focus:outline-none">
			<span class="ms-2 text-sm text-[#9f7e51]">Запомнить меня</span>
		</label>
</div>

        <div class="flex flex-col">
			<x-primary-button class="ms-4">
                {{ __('Создать аккаунт') }}
            </x-primary-button>
				<div class="flex gap-4 items-center justify-center my-2">
				<div class="h-[1px] w-56 bg-gradient-to-r from-[transparent] to-[#9f7e51]"></div>
				<h3 class="text-white text-xs tracking-[2px] font-semibold text-white/60">ИЛИ</h3>
				<div class="h-[1px] w-56 bg-gradient-to-l from-[transparent] to-[#9f7e51]"></div>
			</div>
            <a class="text-center text-sm bg-transparent border border-[#494338] py-3 px-5 rounded-lg ransition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]" href="{{ route('login') }}" wire:navigate>
                {{ __('У меня есть профиль') }}
            </a>
        </div>
    </form>
	<div class="flex justify-between mt-4">
		<a href="{{ route('password.request') }}" wire:navigate" class="text-[#9f7e51] border border-[#9f7e51] rounded-lg px-3 py-2 text-xs hover:bg-gradient-to-r hover:from-[transparent] hover:to-[#494338]">Забыли пароль?</a>
		<a href="{{ route('main') }}" class="text-[#9f7e51] border border-[#9f7e51] rounded-lg px-3 py-2 text-xs hover:bg-gradient-to-r hover:from-[transparent] hover:to-[#494338]">&#8592; На главную</a>
	</div>
</div>
