<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();
    $this->redirect('/', navigate: true);
};

?>

<nav class="absolute top-0 left-0 right-0 z-50 bg-white/20">
    <div class="flex justify-between items-center px-2 sm:px-4 lg:px-8 xl:px-12 py-2 lg:py-4 xl:py-6 gap-1 sm:gap-2">

        {{-- Логотип --}}
        <div class="flex gap-1 lg:gap-3 items-center shrink-0">
            <span style="color: #9f7e51; text-shadow: 0 0 2px rgba(212, 175, 55, 0.8), 0 0 6px rgba(212, 175, 55, 0.6), 0 0 15px rgba(212, 175, 55, 0.3);" class="text-lg sm:text-2xl lg:text-2xl xl:text-4xl mr-1">&lt;/&gt;</span>
            <a href="{{ route('main') }}" class="min-w-0">
                <p class="text-[#2c3448] text-[11px] sm:text-sm lg:text-xl xl:text-3xl font-bold drop-shadow-[0_1px_2px_rgba(0,0,0,0.8)] tracking-wide leading-tight whitespace-nowrap">
                    Анастасия Милова
                </p>
                <p class="text-[#2c3448] text-[8px] sm:text-[10px] lg:text-sm xl:text-xl font-semibold drop-shadow-[0_1px_2px_rgba(0,0,0,0.8)] leading-tight whitespace-nowrap">
                    Сайты под ключ
                </p>
            </a>
        </div>

        {{-- Центральное меню (ТОЛЬКО ДЕСКТОП) --}}
        <div class="hidden lg:flex gap-3 xl:gap-8 text-[#2c3448] font-semibold items-center text-[11px] xl:text-base">
            <a href="#" data-target="advantages" class="nav-link hover:text-[#9f7e51] transition-colors cursor-pointer whitespace-nowrap">Преимущества</a>
            <a href="#" data-target="ocean" class="nav-link hover:text-[#9f7e51] transition-colors cursor-pointer whitespace-nowrap">Услуги</a>
            <a href="#" data-target="portfolio" class="nav-link hover:text-[#9f7e51] transition-colors cursor-pointer whitespace-nowrap">Портфолио</a>
            <a href="#" data-target="stages" class="nav-link hover:text-[#9f7e51] transition-colors cursor-pointer whitespace-nowrap">Этапы</a>
            <a href="https://vk.ru/club242088678" class="flex gap-2 items-center px-3 py-1.5 xl:px-4 xl:py-2 text-[11px] xl:text-sm bg-gradient-to-br from-[#f6ebca] to-[#b08951] rounded-full hover:from-[#e5bb73] hover:to-[#e1ab62] transition-all duration-200 whitespace-nowrap">Оставить заявку <svg class="w-3 h-3 xl:w-4 xl:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
        </div>

        {{-- Правая часть --}}
        <div class="flex items-center gap-1.5 sm:gap-3 lg:gap-4 xl:gap-6 shrink-0">

            {{-- Ссылка на полную версию --}}
            <a href="{{ route('main') }}" class="text-[9px] sm:text-[11px] lg:text-xs xl:text-sm text-[#9f7e51] hover:[text-shadow:0_0_10px_#f6ebca] underline underline-offset-2 transition-colors duration-200 whitespace-nowrap">
                Полная версия
            </a>

            {{-- Иконки соцсетей + Телефон --}}
            <div class="flex items-center gap-1.5 sm:gap-2.5 lg:gap-3 xl:gap-4 text-[#59a8d6]">
                
                {{-- Трубка (Видна только на мобилках) --}}
                <a href="tel:+79874329745" title="Позвонить" class="flex lg:hidden items-center transition-transform duration-200 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 sm:w-5 sm:h-5 text-[#59a8d6]">
                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="https://t.me/Jenny_Doe" title="Telegram" class="transition-transform duration-200 hover:scale-125">
                    <img src="{{ asset('images/networks/telegram.png') }}" class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 xl:w-8 xl:h-8" alt="Telegram">
                </a>
                <a href="https://max.ru/u/f9LHodD0cOK5E08_341IUeGWGIZaW7UNAyYN9ELdq4aKM2jZBUaXw3hu9VM" title="MAX" class="transition-transform duration-200 hover:scale-125">
                    <img src="{{ asset('images/networks/max.png') }}" class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 xl:w-8 xl:h-8" alt="MAX">
                </a>
                {{-- GitHub только с планшета --}}
                <a href="https://github.com/MAV1703?tab=repositories" title="GitHub" class="hidden sm:block transition-transform duration-200 hover:scale-125">
                    <img src="{{ asset('images/networks/github.png') }}" class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 xl:w-8 xl:h-8" alt="GitHub">
                </a>
            </div>
        </div>
    </div>
</nav>