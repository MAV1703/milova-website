<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();
    $this->redirect('/', navigate: true);
};

?>

<nav class="absolute top-0 left-0 right-0 z-50 bg-gradient-to-b from-black via-black/70 to-transparent">
    <div class="flex justify-between items-center px-3 sm:px-6 lg:px-12 py-4 lg:py-6">

        {{-- Логотип --}}
        <div class="flex gap-1 sm:gap-2 lg:gap-6 items-center min-w-0">
            <span style="color: #a89983;" class="text-lg sm:text-2xl lg:text-4xl max-[400px]:text-base mr-1">&lt;/&gt;</span>
            <a href="{{ route('main') }}" class="text-white min-w-0">
                <p class="text-xs sm:text-lg lg:text-4xl font-bold drop-shadow-[0_1px_2px_rgba(0,0,0,0.8)] tracking-wide leading-tight whitespace-nowrap">
                    Анастасия Милова
                </p>
                <p class="text-[9px] sm:text-xs lg:text-2xl font-semibold drop-shadow-[0_1px_2px_rgba(0,0,0,0.8)] leading-tight whitespace-nowrap">
                    Laravel + Livewire Developer
                </p>
            </a>
        </div>

        {{-- Правая часть --}}
        <div class="flex items-center gap-3 sm:gap-4 lg:gap-6 flex-shrink-0">

            {{-- Иконки соцсетей --}}
            <div class="flex items-center gap-2 lg:gap-4 text-[#59a8d6]">

				<a href="https://t.me/Jenny_Doe" title="Telegram"
				class="transition-transform duration-200 hover:scale-125">
					<img src="{{ asset('images/networks/telegram.png') }}"
					class="w-5 h-5 sm:w-6 sm:h-6 lg:w-8 lg:h-8" alt="Telegram">
				</a>

				<a href="https://max.ru/u/f9LHodD0cOK5E08_341IUeGWGIZaW7UNAyYN9ELdq4aKM2jZBUaXw3hu9VM" title="MAX"
				class="transition-transform duration-200 hover:scale-125">
					<img src="{{ asset('images/networks/max.png') }}"
					class="w-5 h-5 sm:w-6 sm:h-6 lg:w-8 lg:h-8" alt="MAX">
				</a>

				<a href="https://github.com/MAV1703?tab=repositories" title="GitHub"
				class="hidden lg:block transition-transform duration-200 hover:scale-125">
					<img src="{{ asset('images/networks/github.png') }}"
					class="w-8 h-8" alt="GitHub">
				</a>

				<a href="tel:+79874329745" title="Позвонить"
				class="lg:hidden transition-transform duration-200 hover:scale-125">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
						class="w-4 h-4 sm:w-5 sm:h-5">
						<path fill-rule="evenodd"
							d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
							clip-rule="evenodd" />
					</svg>
				</a>
			</div>

            {{-- Ссылка на полную версию --}}
            <a href="{{ route('main') }}"
               class="text-xs sm:text-sm text-[#9f7e51]/80 hover:text-[#9f7e51] underline underline-offset-2 transition-colors duration-200 whitespace-nowrap mr-2">
                Полная версия
            </a>
        </div>
    </div>
</nav>