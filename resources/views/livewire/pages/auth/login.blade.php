<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
	
    $this->validate();
	
	if (Auth::check() && Auth::user()->status == 'guest') 
	{
        Auth::logout();
    }

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('main', absolute: false), navigate: false);
};

?>

<div>
    {{-- Session Status --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-lg md:text-xl">Вход в личный кабинет</h1>
    <p class="text-white/60 text-sm my-3 md:my-4">Добро пожаловать! Введите данные вашего профиля</p>

    <form wire:submit="login">
        {{-- Email --}}
        <div>
            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <x-input-label for="email" :value="__('Email')" />
            </div>
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                <x-input-label for="password" :value="__('Пароль')" />
            </div>
            <div x-data="{ show: false }" class="relative mt-1">
				<input
					wire:model="form.password"
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
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        {{-- Remember + Forgot --}}
        <div class="flex flex-wrap justify-between items-center gap-2 mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="remember" id="remember" type="checkbox" checked class="m-2 bg-[#1d1d1d] rounded-md text-[#494338] w-5 h-5 border-[#494338] transition-all duration-100 focus:border-transparent focus:ring-0 focus:outline-none">
                <span class="ms-2 text-sm text-[#9f7e51]">Запомнить меня</span>
            </label>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-[#9f7e51] hover:text-[#7f511f]" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Забыли пароль?') }}
                </a>
            @endif
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full">
                {{ __('Войти') }}
            </x-primary-button>
        </div>
    </form>

    {{-- Разделитель "ИЛИ" --}}
    <div class="flex gap-2 md:gap-3 items-center justify-center my-3 md:my-4">
        <div class="h-[1px] flex-1 max-w-[8rem] bg-gradient-to-r from-transparent to-[#9f7e51]"></div>
        <h3 class="text-white/60 text-xs tracking-[2px] font-semibold whitespace-nowrap">ИЛИ</h3>
        <div class="h-[1px] flex-1 max-w-[8rem] bg-gradient-to-l from-transparent to-[#9f7e51]"></div>
    </div>

    {{-- Кнопки внизу --}}
    <div class="flex flex-col gap-3 md:gap-4 justify-center w-full mt-3 md:mt-4">
        <a class="text-center text-sm bg-transparent border border-[#494338] py-3 px-5 rounded-lg transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]" href="{{ route('register') }}" wire:navigate>
            {{ __('У меня нет аккаунта') }}
        </a>
        <a href="{{ route('main') }}" class="text-[#9f7e51] text-sm text-center mt-2 md:mt-4 transition-transform duration-200 hover:translate-x-[-4px]">&#8592 На главную</a>
    </div>
</div>