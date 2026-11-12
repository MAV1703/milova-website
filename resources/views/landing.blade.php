<div>
    <x-landing-layout>
        <x-slot:title>{{ $title }}</x-slot>

        <div id="main-container" class="relative w-full h-[100dvh] overflow-hidden">

            <!-- ЭКРАН 1 -->
            <div id="screen-1" class="absolute inset-0 w-full h-[100dvh] transition-opacity duration-700 z-10 bg-cover bg-center bg-no-repeat overflow-hidden" style="background-image: url('{{ asset('images/landingbg.jpeg') }}');">
                <div class="w-full h-full flex flex-col-reverse lg:flex-row relative">
                    <div id="hero-photo" class="relative w-full h-[35%] max-h-[35%] lg:h-full lg:max-h-none lg:absolute lg:left-0 lg:bottom-0 lg:w-[45%] xl:w-[50%] z-10 flex justify-start items-end pointer-events-none transition-opacity duration-700 overflow-hidden">
                        <img src="{{ asset('images/landingme.png') }}" alt="Анастасия Милова"
                             class="w-[85%] lg:w-full h-full object-contain object-left-bottom -ml-0 lg:-ml-12 translate-y-0 lg:translate-y-12 -mb-0 lg:-mb-20">
                    </div>
                    <div id="hero-text" class="w-full h-[65%] lg:h-full flex items-start lg:items-center justify-center lg:justify-end relative z-20 pt-4 lg:pt-24 transition-all duration-700">
                        <div class="w-full max-w-[1200px] mx-auto px-4 lg:px-12 xl:px-20 flex justify-center lg:justify-end">
                            <div class="w-full max-w-[700px] flex flex-col items-center pt-2 lg:pt-0">
                                <div class="inline-flex items-center gap-2 px-3 py-1.5 lg:px-4 lg:py-2 rounded-full bg-white/60 backdrop-blur-md border border-white/50 shadow-sm mb-3 lg:mb-6">
                                    <span class="text-[#d18f2d] text-sm">✨</span>
                                    <span class="text-xs lg:text-sm font-medium text-slate-700">Современные сайты для вашего бизнеса</span>
                                </div>
                                <h1 class="text-3xl sm:text-4xl lg:text-4xl xl:text-6xl font-extrabold text-slate-800 text-center leading-tight mb-3 lg:mb-6 w-full">
                                    Создаю сайты, <br> которые открывают <br>
                                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#d18f2d] to-[#b08951]">новые горизонты</span>
                                </h1>
                                <p class="text-sm lg:text-base xl:text-lg text-slate-600 text-center mb-5 lg:mb-8 w-full max-w-[450px] leading-relaxed font-medium">
                                    Стильные &middot; Современные &middot; Работают на ваш бизнес &middot; Приводят клиентов
                                </p>
                                <div class="w-full flex justify-center">
                                    <a href="https://vk.ru/club242088678" target="_blank"
                                       class="inline-flex items-center gap-2 px-6 py-3 lg:px-8 lg:py-4 rounded-full bg-gradient-to-br from-[#e5bb73] to-[#e1ab62] hover:from-[#f6ebca] hover:to-[#b08951] text-slate-800 font-bold text-sm lg:text-base shadow-[0_0_30px_rgba(229,187,115,0.6)] hover:shadow-[0_0_40px_rgba(229,187,115,0.8)] hover:scale-105 transition-all duration-300">
                                        Получить консультацию
                                        <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ПРЕИМУЩЕСТВА -->
                <div id="advantages-block" class="absolute inset-0 z-30 px-4 lg:px-8 pt-24 lg:pt-16 pb-10 opacity-0 pointer-events-none translate-y-10 transition-all duration-700 flex items-center lg:w-[55%] lg:left-auto lg:right-0">
                    <div class="relative z-10 w-full max-w-[1200px] mx-auto flex flex-col justify-center h-full">
                        <div class="mb-4 lg:mb-6 text-center lg:text-left">
                            <h2 class="text-2xl lg:text-2xl xl:text-4xl font-bold text-slate-800 mb-1 lg:mb-2">Почему выбирают <span class="text-[#d18f2d]">меня?</span></h2>
                            <p class="text-xs lg:text-sm xl:text-base text-slate-600">Я не просто делаю сайты — я помогаю бизнесу расти</p>
                        </div>
                        <div class="flex flex-col gap-3 lg:gap-4 xl:gap-5">
                            <div id="adv-row-1" class="grid grid-cols-1 lg:grid-cols-2 gap-3 lg:gap-4 xl:gap-5 w-full transition-all duration-700">
                                <div class="bg-white/90 backdrop-blur-xl rounded-xl lg:rounded-2xl xl:rounded-3xl p-4 lg:p-4 xl:p-6 border border-white/60 shadow-lg">
                                    <div class="w-8 h-8 lg:w-8 lg:h-8 xl:w-10 xl:h-10 rounded-full bg-[#d18f2d]/10 flex items-center justify-center mb-2 xl:mb-3">
                                        <svg class="w-4 h-4 lg:w-4 lg:h-4 xl:w-5 xl:h-5 text-[#d18f2d]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    </div>
                                    <h3 class="text-base lg:text-base xl:text-xl font-bold text-slate-800 mb-1 xl:mb-2">Индивидуальный подход</h3>
                                    <p class="text-xs lg:text-xs xl:text-base text-slate-600 leading-relaxed">Не шаблон, а решение под ваш бизнес. Сначала изучаю, что вы продаете.</p>
                                </div>
                                <div class="bg-white/90 backdrop-blur-xl rounded-xl lg:rounded-2xl xl:rounded-3xl p-4 lg:p-4 xl:p-6 border border-white/60 shadow-lg">
                                    <div class="w-8 h-8 lg:w-8 lg:h-8 xl:w-10 xl:h-10 rounded-full bg-[#d18f2d]/10 flex items-center justify-center mb-2 xl:mb-3">
                                        <svg class="w-4 h-4 lg:w-4 lg:h-4 xl:w-5 xl:h-5 text-[#d18f2d]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    </div>
                                    <h3 class="text-base lg:text-base xl:text-xl font-bold text-slate-800 mb-1 xl:mb-2">Прозрачные условия</h3>
                                    <p class="text-xs lg:text-xs xl:text-base text-slate-600 leading-relaxed">Работаю по договору. Вы видите каждый этап работы.</p>
                                </div>
                            </div>
                            <div id="adv-row-2" class="hidden lg:grid grid-cols-1 lg:grid-cols-2 gap-3 lg:gap-4 xl:gap-5 w-full transition-all duration-700">
                                <div class="bg-white/90 backdrop-blur-xl rounded-xl lg:rounded-2xl xl:rounded-3xl p-4 lg:p-4 xl:p-6 border border-white/60 shadow-lg">
                                    <div class="w-8 h-8 lg:w-8 lg:h-8 xl:w-10 xl:h-10 rounded-full bg-[#d18f2d]/10 flex items-center justify-center mb-2 xl:mb-3">
                                        <svg class="w-4 h-4 lg:w-4 lg:h-4 xl:w-5 xl:h-5 text-[#d18f2d]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                    <h3 class="text-base lg:text-base xl:text-xl font-bold text-slate-800 mb-1 xl:mb-2">Скорость и адаптивность</h3>
                                    <p class="text-xs lg:text-xs xl:text-base text-slate-600 leading-relaxed">Сайт идеально смотрится на любом устройстве.</p>
                                </div>
                                <div class="bg-white/90 backdrop-blur-xl rounded-xl lg:rounded-2xl xl:rounded-3xl p-4 lg:p-4 xl:p-6 border border-white/60 shadow-lg">
                                    <div class="w-8 h-8 lg:w-8 lg:h-8 xl:w-10 xl:h-10 rounded-full bg-[#d18f2d]/10 flex items-center justify-center mb-2 xl:mb-3">
                                        <svg class="w-4 h-4 lg:w-4 lg:h-4 xl:w-5 xl:h-5 text-[#d18f2d]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" /></svg>
                                    </div>
                                    <h3 class="text-base lg:text-base xl:text-xl font-bold text-slate-800 mb-1 xl:mb-2">Сайт под ключ</h3>
                                    <p class="text-xs lg:text-xs xl:text-base text-slate-600 leading-relaxed">Качественно и недорого с нуля. Вам не нужно искать программистов.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ЭКРАН 2 -->
            <div id="screen-2" class="absolute inset-0 w-full h-full z-20 opacity-0 pointer-events-none transition-opacity duration-700 bg-[#e0f2fe]">
                <img src="{{ asset('images/bglandingsky.jpeg') }}" alt="Небо" class="absolute inset-0 w-full h-full object-cover z-0">
                <div id="bird-container" class="absolute z-10 pointer-events-none transition-opacity duration-200 -top-[5%] left-[5%] w-[80%] h-[40%] lg:-top-[10%] lg:left-0 lg:w-[50%] lg:h-[50%]">
                    <img id="bird-frame-a" src="{{ asset('images/bird/1.png') }}" alt="Птица" class="absolute inset-0 w-full h-full object-contain opacity-100">
                    <img id="bird-frame-b" src="{{ asset('images/bird/1.png') }}" alt="Птица" class="absolute inset-0 w-full h-full object-contain opacity-0">
                </div>
                <div id="bird-content" class="absolute inset-0 z-20 flex flex-col items-center justify-center px-4 lg:px-6 opacity-0 translate-y-10 transition-all duration-1000 ease-out pt-20 lg:pt-28">
                    <div class="w-full max-w-[1000px] flex flex-col items-center">
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl xl:text-6xl font-extrabold text-[#1e293b] text-center leading-tight mb-3 lg:mb-6 drop-shadow-sm">
                            Ваш сайт — <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#d18f2d] to-[#b08951]">безграничный простор</span> <br> для творчества
                        </h2>
                        <div class="flex flex-col gap-2 lg:gap-4 xl:gap-5 w-full max-w-[800px] mb-6 lg:mb-10">
                            <div class="bg-white/80 backdrop-blur-xl border border-white/60 rounded-2xl lg:rounded-[2rem] p-3 lg:p-5 xl:p-8 flex flex-row items-center gap-3 lg:gap-4 xl:gap-6 shadow-xl shadow-blue-900/5 text-left transition-transform duration-300 hover:scale-[1.02]">
                                <img src="{{ asset('images/landingcomp.png') }}" alt="Иконка" class="w-10 h-10 lg:w-14 lg:h-14 xl:w-20 xl:h-20 object-contain shrink-0">
                                <p class="text-xs lg:text-base xl:text-xl text-slate-700 leading-relaxed font-medium">Настрою калькуляторы стоимости, личный кабинет, приём заказов, уведомления в мессенджеры, онлайн-запись и оплату на сайте.</p>
                            </div>
                            <div class="bg-white/80 backdrop-blur-xl border border-white/60 rounded-2xl lg:rounded-[2rem] p-3 lg:p-5 xl:p-8 flex flex-row items-center gap-3 lg:gap-4 xl:gap-6 shadow-xl shadow-blue-900/5 text-left transition-transform duration-300 hover:scale-[1.02]">
                                <img src="{{ asset('images/landinglamp.png') }}" alt="Иконка" class="w-10 h-10 lg:w-14 lg:h-14 xl:w-20 xl:h-20 object-contain shrink-0">
                                <p class="text-xs lg:text-base xl:text-xl text-slate-700 leading-relaxed font-medium">Вместе придумаем и реализуем крутую фишку сайта, которая выделит вас из толпы конкурентов и запомнится клиентам.</p>
                            </div>
                        </div>
                        <a href="https://vk.ru/club242088678" target="_blank"
                           class="inline-flex items-center gap-2 px-5 py-2.5 lg:px-8 lg:py-3.5 xl:px-10 xl:py-4 rounded-full bg-gradient-to-br from-[#e5bb73] to-[#e1ab62] hover:from-[#f6ebca] hover:to-[#b08951] text-slate-800 font-bold text-xs lg:text-base xl:text-lg shadow-[0_0_30px_rgba(229,187,115,0.6)] hover:shadow-[0_0_40px_rgba(229,187,115,0.8)] hover:scale-105 transition-all duration-300">
                            Получить бесплатную консультацию
                            <svg class="w-4 h-4 lg:w-5 lg:h-5 xl:w-6 xl:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ЭКРАН 3 -->
            <div id="screen-3" class="absolute inset-0 w-full h-full z-30 opacity-0 pointer-events-none transition-opacity duration-700 bg-[#e0f2fe]">
                <video id="ocean-video" muted playsinline autoplay loop class="absolute inset-0 w-full h-full object-cover z-0">
                    <source src="{{ asset('images/ocean.mp4') }}" type="video/mp4">
                </video>
                <div id="ocean-title" class="absolute inset-0 z-20 flex flex-col items-center justify-center px-4 lg:px-8 transition-all duration-700 pt-10">
                    <h2 class="text-3xl lg:text-6xl font-extrabold text-[#0f2a55] text-center leading-tight mb-2 drop-shadow-sm">Откроем океан <br> возможностей</h2>
                    <div class="text-2xl lg:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#d18f2d] to-[#b08951] text-center mb-6 drop-shadow-sm">для вашего бизнеса</div>
                    <div class="flex items-center gap-3 w-full max-w-[400px] opacity-70">
                        <div class="h-[2px] bg-gradient-to-r from-transparent to-[#0f2a55] flex-grow"></div>
                        <svg class="w-5 h-5 text-[#0f2a55]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 7.2h7.6l-6 4.8 2.4 7.2-6-4.8-6 4.8 2.4-7.2-6-4.8h7.6z"/></svg>
                        <div class="h-[2px] bg-gradient-to-l from-transparent to-[#0f2a55] flex-grow"></div>
                    </div>
                </div>
                <div id="ocean-cards" class="absolute inset-0 z-20 flex flex-col items-center justify-center px-2 lg:px-8 opacity-0 translate-y-10 transition-all duration-700 pt-20 lg:pt-24">
                    <div class="w-full max-w-[1100px] xl:max-w-[1400px] flex flex-col items-center">
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-2.5 lg:gap-6 w-full mb-4 lg:mb-8">
                            <div class="bg-white/90 backdrop-blur-xl border border-white/60 rounded-xl lg:rounded-2xl p-3 lg:p-6 flex flex-col items-center text-center shadow-lg">
                                <h3 class="text-[11px] lg:text-xl font-bold text-[#0f2a55] mb-1 leading-tight">Лендинг</h3>
                                <p class="text-[9px] lg:text-sm text-slate-600 mb-2 leading-tight">Эффектно заявите о себе.</p>
                                <div class="text-[#d18f2d] font-bold text-[10px] lg:text-lg bg-white/90 px-2 py-0.5 rounded-md shadow-sm mt-auto">от 10 000 ₽</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-xl border border-white/60 rounded-xl lg:rounded-2xl p-3 lg:p-6 flex flex-col items-center text-center shadow-lg">
                                <h3 class="text-[11px] lg:text-xl font-bold text-[#0f2a55] mb-1 leading-tight">Сайт-визитка</h3>
                                <p class="text-[9px] lg:text-sm text-slate-600 mb-2 leading-tight">Для экспертов и услуг.</p>
                                <div class="text-[#d18f2d] font-bold text-[10px] lg:text-lg bg-white/90 px-2 py-0.5 rounded-md shadow-sm mt-auto">от 15 000 ₽</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-xl border border-white/60 rounded-xl lg:rounded-2xl p-3 lg:p-6 flex flex-col items-center text-center shadow-lg">
                                <h3 class="text-[11px] lg:text-xl font-bold text-[#0f2a55] mb-1 leading-tight">Приём клиентов</h3>
                                <p class="text-[9px] lg:text-sm text-slate-600 mb-2 leading-tight">Заявки и записи в порядке.</p>
                                <div class="text-[#d18f2d] font-bold text-[10px] lg:text-lg bg-white/90 px-2 py-0.5 rounded-md shadow-sm mt-auto">от 25 000 ₽</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-xl border border-white/60 rounded-xl lg:rounded-2xl p-3 lg:p-6 flex flex-col items-center text-center shadow-lg">
                                <h3 class="text-[11px] lg:text-xl font-bold text-[#0f2a55] mb-1 leading-tight">Сайт-портфолио</h3>
                                <p class="text-[9px] lg:text-sm text-slate-600 mb-2 leading-tight">Покажите работы красиво.</p>
                                <div class="text-[#d18f2d] font-bold text-[10px] lg:text-lg bg-white/90 px-2 py-0.5 rounded-md shadow-sm mt-auto">от 25 000 ₽</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-xl border border-white/60 rounded-xl lg:rounded-2xl p-3 lg:p-6 flex flex-col items-center text-center shadow-lg">
                                <h3 class="text-[11px] lg:text-xl font-bold text-[#0f2a55] mb-1 leading-tight">Интернет-магазин</h3>
                                <p class="text-[9px] lg:text-sm text-slate-600 mb-2 leading-tight">Продажи 24/7 с оплатой.</p>
                                <div class="text-[#d18f2d] font-bold text-[10px] lg:text-lg bg-white/90 px-2 py-0.5 rounded-md shadow-sm mt-auto">от 30 000 ₽</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-xl border border-white/60 rounded-xl lg:rounded-2xl p-3 lg:p-6 flex flex-col items-center text-center shadow-lg">
                                <h3 class="text-[11px] lg:text-xl font-bold text-[#0f2a55] mb-1 leading-tight">Корпоративный сайт</h3>
                                <p class="text-[9px] lg:text-sm text-slate-600 mb-2 leading-tight">Для солидных компаний.</p>
                                <div class="text-[#d18f2d] font-bold text-[10px] lg:text-lg bg-white/90 px-2 py-0.5 rounded-md shadow-sm mt-auto">от 30 000 ₽</div>
                            </div>
                        </div>
                        <a href="https://vk.ru/club242088678" target="_blank"
                           class="inline-flex items-center gap-2 px-6 py-2.5 lg:px-10 lg:py-4 rounded-full bg-gradient-to-r from-[#f6ebca] to-[#d18f2d] hover:from-[#e5bb73] hover:to-[#b08951] text-[#0f2a55] font-bold text-xs lg:text-lg shadow-[0_0_30px_rgba(229,187,115,0.5)] hover:shadow-[0_0_40px_rgba(229,187,115,0.8)] hover:scale-105 transition-all duration-300">
                            Обсудить проект
                            <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ЭКРАН 4 -->
            <div id="screen-4" class="absolute inset-0 w-full h-full z-40 opacity-0 pointer-events-none transition-opacity duration-700 bg-cover bg-center bg-no-repeat overflow-hidden" style="background-image: url('{{ asset('images/landingbg.jpeg') }}');">
                <div class="relative z-10 w-full h-full flex flex-col items-center pt-20 lg:pt-28 pb-10">
                    <div id="slide-carousel" class="absolute inset-0 pt-20 lg:pt-28 pb-10 flex flex-col items-center justify-center px-4 lg:px-6 transition-all duration-700 opacity-100 translate-y-0">
                        <div class="text-center mb-4 lg:mb-8">
                            <h2 class="text-2xl lg:text-6xl font-extrabold text-[#0f2a55] mb-2 drop-shadow-sm">Примеры работ</h2>
                        </div>
                        <div class="relative w-full max-w-[850px] h-[350px] lg:h-[450px] flex items-center justify-center">
                            <div id="project-0" class="project-slide absolute inset-0 flex items-center justify-center transition-all duration-700 opacity-100 translate-y-0">
                                <div class="bg-white/95 backdrop-blur-xl rounded-xl lg:rounded-[2rem] p-3 lg:p-4 shadow-2xl border border-white w-full max-w-[750px]">
                                    <div class="w-full h-[200px] lg:h-[300px] bg-slate-100 rounded-lg lg:rounded-xl overflow-hidden relative mb-3 lg:mb-4">
                                        <div class="absolute top-0 left-0 w-full h-6 lg:h-8 bg-slate-200 flex items-center px-3 lg:px-4 gap-1.5 lg:gap-2 z-20 shadow-sm">
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#c59b27]"></div>
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#e5bb73]"></div>
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#f6ebca]"></div>
                                        </div>
                                        <div class="carousel-container relative w-full h-full pt-6 lg:pt-8 flex overflow-hidden" data-project="0">
                                            <div class="carousel-track flex w-full h-full transition-transform duration-400 ease-in-out">
                                                <img src="{{ asset('images/screenshots/milova/1.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Milova 1">
                                                <img src="{{ asset('images/screenshots/milova/2.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Milova 2">
                                                <img src="{{ asset('images/screenshots/milova/3.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Milova 3">
                                                <img src="{{ asset('images/screenshots/milova/4.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Milova 4">
                                                <img src="{{ asset('images/screenshots/milova/5.jpeg') }}" class="w-full h-full object-cover object-top shrink-0" alt="Milova 5">
                                            </div>
                                            <button class="carousel-prev absolute top-1/2 left-1 lg:left-2 -translate-y-1/2 z-30 w-6 h-6 lg:w-10 lg:h-10 rounded-full bg-white/60 flex items-center justify-center text-[#0f2a55] hover:bg-[#d18f2d] hover:text-white transition-colors shadow-md">
                                                <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                            </button>
                                            <button class="carousel-next absolute top-1/2 right-1 lg:right-2 -translate-y-1/2 z-30 w-6 h-6 lg:w-10 lg:h-10 rounded-full bg-white/60 flex items-center justify-center text-[#0f2a55] hover:bg-[#d18f2d] hover:text-white transition-colors shadow-md">
                                                <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-end px-1 lg:px-2">
                                        <div>
                                            <h3 class="text-sm lg:text-2xl font-bold text-[#0f2a55]">Milova.website</h3>
                                            <p class="text-[10px] lg:text-sm text-slate-600">Личный кабинет и система приема заказов.</p>
                                        </div>
                                        <a href="{{ route('main') }}" target="_blank" class="text-[10px] lg:text-base text-[#d18f2d] font-semibold hover:text-[#b08951] transition">Перейти на сайт →</a>
                                    </div>
                                </div>
                            </div>
                            <div id="project-1" class="project-slide absolute inset-0 flex items-center justify-center transition-all duration-700 opacity-0 translate-y-10 pointer-events-none">
                                <div class="bg-white/95 backdrop-blur-xl rounded-xl lg:rounded-[2rem] p-3 lg:p-4 shadow-2xl border border-white w-full max-w-[750px]">
                                    <div class="w-full h-[200px] lg:h-[300px] bg-slate-100 rounded-lg lg:rounded-xl overflow-hidden relative mb-3 lg:mb-4">
                                        <div class="absolute top-0 left-0 w-full h-6 lg:h-8 bg-slate-200 flex items-center px-3 lg:px-4 gap-1.5 lg:gap-2 z-20 shadow-sm">
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#c59b27]"></div>
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#e5bb73]"></div>
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#f6ebca]"></div>
                                        </div>
                                        <div class="carousel-container relative w-full h-full pt-6 lg:pt-8 flex overflow-hidden" data-project="1">
                                            <div class="carousel-track flex w-full h-full transition-transform duration-400 ease-in-out">
                                                <img src="{{ asset('images/screenshots/astra/1.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Astra 1">
                                                <img src="{{ asset('images/screenshots/astra/2.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Astra 2">
                                                <img src="{{ asset('images/screenshots/astra/3.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Astra 3">
                                                <img src="{{ asset('images/screenshots/astra/4.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Astra 4">
                                                <img src="{{ asset('images/screenshots/astra/5.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Astra 5">
                                                <img src="{{ asset('images/screenshots/astra/6.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Astra 6">
                                            </div>
                                            <button class="carousel-prev absolute top-1/2 left-1 lg:left-2 -translate-y-1/2 z-30 w-6 h-6 lg:w-10 lg:h-10 rounded-full bg-white/60 flex items-center justify-center text-[#0f2a55] hover:bg-[#d18f2d] hover:text-white transition-colors shadow-md">
                                                <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                            </button>
                                            <button class="carousel-next absolute top-1/2 right-1 lg:right-2 -translate-y-1/2 z-30 w-6 h-6 lg:w-10 lg:h-10 rounded-full bg-white/60 flex items-center justify-center text-[#0f2a55] hover:bg-[#d18f2d] hover:text-white transition-colors shadow-md">
                                                <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-end px-1 lg:px-2">
                                        <div>
                                            <h3 class="text-sm lg:text-2xl font-bold text-[#0f2a55]">Интерактивный лендинг ASTRA</h3>
                                            <p class="text-[10px] lg:text-sm text-slate-600">Сложная покадровая анимация при скролле.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="project-2" class="project-slide absolute inset-0 flex items-center justify-center transition-all duration-700 opacity-0 translate-y-10 pointer-events-none">
                                <div class="bg-white/95 backdrop-blur-xl rounded-xl lg:rounded-[2rem] p-3 lg:p-4 shadow-2xl border border-white w-full max-w-[750px]">
                                    <div class="w-full h-[200px] lg:h-[300px] bg-slate-100 rounded-lg lg:rounded-xl overflow-hidden relative mb-3 lg:mb-4">
                                        <div class="absolute top-0 left-0 w-full h-6 lg:h-8 bg-slate-200 flex items-center px-3 lg:px-4 gap-1.5 lg:gap-2 z-20 shadow-sm">
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#c59b27]"></div>
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#e5bb73]"></div>
                                            <div class="w-2 h-2 lg:w-3 lg:h-3 rounded-full bg-[#f6ebca]"></div>
                                        </div>
                                        <div class="carousel-container relative w-full h-full pt-6 lg:pt-8 flex overflow-hidden" data-project="2">
                                            <div class="carousel-track flex w-full h-full transition-transform duration-400 ease-in-out">
                                                <img src="{{ asset('images/screenshots/calendar/oct.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Calendar oct">
                                                <img src="{{ asset('images/screenshots/calendar/jan.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Calendar jan">
                                                <img src="{{ asset('images/screenshots/calendar/sep.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Calendar sep">
                                                <img src="{{ asset('images/screenshots/calendar/march.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Calendar march">
                                                <img src="{{ asset('images/screenshots/calendar/nov.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Calendar nov">
                                                <img src="{{ asset('images/screenshots/calendar/aug2.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Calendar aug2">
                                                <img src="{{ asset('images/screenshots/calendar/aug3.png') }}" class="w-full h-full object-cover object-top shrink-0" alt="Calendar aug3">
                                            </div>
                                            <button class="carousel-prev absolute top-1/2 left-1 lg:left-2 -translate-y-1/2 z-30 w-6 h-6 lg:w-10 lg:h-10 rounded-full bg-white/60 flex items-center justify-center text-[#0f2a55] hover:bg-[#d18f2d] hover:text-white transition-colors shadow-md">
                                                <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                            </button>
                                            <button class="carousel-next absolute top-1/2 right-1 lg:right-2 -translate-y-1/2 z-30 w-6 h-6 lg:w-10 lg:h-10 rounded-full bg-white/60 flex items-center justify-center text-[#0f2a55] hover:bg-[#d18f2d] hover:text-white transition-colors shadow-md">
                                                <svg class="w-4 h-4 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-end px-1 lg:px-2">
                                        <div>
                                            <h3 class="text-sm lg:text-2xl font-bold text-[#0f2a55]">Календарь-планировщик</h3>
                                            <p class="text-[10px] lg:text-sm text-slate-600">Приложение для планирования задач.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="slide-stages" class="absolute inset-0 pt-20 lg:pt-28 pb-10 flex flex-col items-center justify-center px-4 lg:px-6 transition-all duration-700 opacity-0 translate-y-10 pointer-events-none">
                        <h3 class="text-2xl lg:text-5xl font-extrabold text-[#0f2a55] mb-6 lg:mb-12 text-center drop-shadow-sm">Как мы будем работать</h3>
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-6 w-full max-w-[1100px]">
                            <div class="bg-white/80 backdrop-blur-md p-3 lg:p-6 rounded-xl lg:rounded-2xl border border-white shadow-lg flex flex-col gap-2 lg:gap-3">
                                <div class="w-6 h-6 lg:w-10 lg:h-10 shrink-0 rounded-full bg-[#d18f2d] flex items-center justify-center text-white font-bold text-[10px] lg:text-lg shadow-md">1</div>
                                <p class="text-[10px] lg:text-base text-slate-700 font-medium leading-tight">Вы оставляете заявку</p>
                            </div>
                            <div class="bg-white/80 backdrop-blur-md p-3 lg:p-6 rounded-xl lg:rounded-2xl border border-white shadow-lg flex flex-col gap-2 lg:gap-3">
                                <div class="w-6 h-6 lg:w-10 lg:h-10 shrink-0 rounded-full bg-[#d18f2d] flex items-center justify-center text-white font-bold text-[10px] lg:text-lg shadow-md">2</div>
                                <p class="text-[10px] lg:text-base text-slate-700 font-medium leading-tight">Я предлагаю решение ваших задач и согласовываю его с вами</p>
                            </div>
                            <div class="bg-white/80 backdrop-blur-md p-3 lg:p-6 rounded-xl lg:rounded-2xl border border-white shadow-lg flex flex-col gap-2 lg:gap-3">
                                <div class="w-6 h-6 lg:w-10 lg:h-10 shrink-0 rounded-full bg-[#d18f2d] flex items-center justify-center text-white font-bold text-[10px] lg:text-lg shadow-md">3</div>
                                <p class="text-[10px] lg:text-base text-slate-700 font-medium leading-tight">Обсуждаем и утверждаем дизайн, оформление, стоимость и сроки</p>
                            </div>
                            <div class="bg-white/80 backdrop-blur-md p-3 lg:p-6 rounded-xl lg:rounded-2xl border border-white shadow-lg flex flex-col gap-2 lg:gap-3">
                                <div class="w-6 h-6 lg:w-10 lg:h-10 shrink-0 rounded-full bg-[#d18f2d] flex items-center justify-center text-white font-bold text-[10px] lg:text-lg shadow-md">4</div>
                                <p class="text-[10px] lg:text-base text-slate-700 font-medium leading-tight">Вы вносите предоплату, я начинаю работу</p>
                            </div>
                            <div class="bg-white/80 backdrop-blur-md p-3 lg:p-6 rounded-xl lg:rounded-2xl border border-white shadow-lg flex flex-col gap-2 lg:gap-3">
                                <div class="w-6 h-6 lg:w-10 lg:h-10 shrink-0 rounded-full bg-[#d18f2d] flex items-center justify-center text-white font-bold text-[10px] lg:text-lg shadow-md">5</div>
                                <p class="text-[10px] lg:text-base text-slate-700 font-medium leading-tight">Я представляю вам результат и демонстрирую функционал вашего сайта</p>
                            </div>
                            <div class="bg-white/80 backdrop-blur-md p-3 lg:p-6 rounded-xl lg:rounded-2xl border border-white shadow-lg flex flex-col gap-2 lg:gap-3">
                                <div class="w-6 h-6 lg:w-10 lg:h-10 shrink-0 rounded-full bg-[#d18f2d] flex items-center justify-center text-white font-bold text-[10px] lg:text-lg shadow-md">6</div>
                                <p class="text-[10px] lg:text-base text-slate-700 font-medium leading-tight">Согласовываем и вносим правки</p>
                            </div>
                            <div class="bg-white/80 backdrop-blur-md p-3 lg:p-6 rounded-xl lg:rounded-2xl border border-white shadow-lg flex flex-col gap-2 lg:gap-3 col-span-2 lg:col-span-1 lg:col-start-2">
                                <div class="w-6 h-6 lg:w-10 lg:h-10 shrink-0 rounded-full bg-[#d18f2d] flex items-center justify-center text-white font-bold text-[10px] lg:text-lg shadow-md">7</div>
                                <p class="text-[10px] lg:text-base text-slate-700 font-medium leading-tight">Вы оплачиваете остаток стоимости и получаете работающий сайт</p>
                            </div>
                        </div>
                    </div>

                    <div id="slide-contacts" class="absolute inset-0 pt-20 lg:pt-28 pb-10 flex flex-col items-center justify-center px-6 transition-all duration-700 opacity-0 translate-y-10 pointer-events-none">
                        <h3 class="text-3xl lg:text-6xl font-extrabold text-[#0f2a55] mb-4 lg:mb-8 text-center drop-shadow-sm">Готовы обсудить проект?</h3>
                        <p class="text-sm lg:text-lg text-slate-700 mb-6 lg:mb-10 text-center max-w-lg font-medium">Напишите мне в удобный мессенджер, и мы обсудим вашу задачу. Отвечу на все вопросы и предложу лучшее решение.</p>
                        <a href="https://vk.ru/club242088678" target="_blank"
                           class="inline-flex items-center gap-2 px-6 py-3 lg:px-10 lg:py-4 rounded-full bg-gradient-to-r from-[#e5bb73] to-[#d18f2d] hover:from-[#f6ebca] hover:to-[#b08951] text-[#0f2a55] font-bold text-sm lg:text-lg shadow-[0_0_30px_rgba(229,187,115,0.5)] hover:shadow-[0_0_40px_rgba(229,187,115,0.8)] hover:scale-105 transition-all duration-300 mb-6 lg:mb-10">
                            Написать в ВК
                            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <div class="flex items-center gap-6 lg:gap-8">
                            <a href="https://t.me/Jenny_Doe" target="_blank" title="Telegram" class="transition-transform duration-200 hover:scale-125">
                                <img src="{{ asset('images/networks/telegram.png') }}" class="w-8 h-8 lg:w-10 lg:h-10 opacity-80 hover:opacity-100 drop-shadow-md" alt="Telegram">
                            </a>
                            <a href="https://max.ru/u/f9LHodD0cOK5E08_341IUeGWGIZaW7UNAyYN9ELdq4aKM2jZBUaXw3hu9VM" target="_blank" title="MAX" class="transition-transform duration-200 hover:scale-125">
                                <img src="{{ asset('images/networks/max.png') }}" class="w-8 h-8 lg:w-10 lg:h-10 opacity-80 hover:opacity-100 drop-shadow-md" alt="MAX">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </x-landing-layout>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const screen1 = document.getElementById('screen-1');
    const screen2 = document.getElementById('screen-2');
    const screen3 = document.getElementById('screen-3');
    const screen4 = document.getElementById('screen-4');

    const heroText = document.getElementById('hero-text');
    const heroPhoto = document.getElementById('hero-photo');
    const advantagesBlock = document.getElementById('advantages-block');
    const advRow1 = document.getElementById('adv-row-1');
    const advRow2 = document.getElementById('adv-row-2');

    const birdContent = document.getElementById('bird-content');
    const oceanTitle = document.getElementById('ocean-title');
    const oceanCards = document.getElementById('ocean-cards');
    const oceanVideo = document.getElementById('ocean-video');

    const slideCarousel = document.getElementById('slide-carousel');
    const slideStages = document.getElementById('slide-stages');
    const slideContacts = document.getElementById('slide-contacts');
    const projects = [
        document.getElementById('project-0'),
        document.getElementById('project-1'),
        document.getElementById('project-2')
    ];

    const birdA = document.getElementById('bird-frame-a');
    const birdB = document.getElementById('bird-frame-b');
    const birdContainer = birdA.parentElement;
    const birdFrames = Array.from({ length: 41 }, (_, i) => `{{ asset('images/bird') }}/${i + 1}.png`);

    // === ПТИЦА: бесконечный полёт, без fadeOut ===
    let currentFrameIndex = 0;
    let isLayerAActive = true;
    let birdRafId = null;
    let birdProgress = 0;
    let isBirdFlying = false;

    const flyBird = () => {
        if (!isBirdFlying) return;
        birdProgress += 0.015;
        if (birdProgress > 1) birdProgress = 0;
        const totalFrames = birdFrames.length;
        const targetIndex = Math.min(Math.floor(birdProgress * totalFrames), totalFrames - 1);
        if (targetIndex !== currentFrameIndex && targetIndex >= 0) {
            if (isLayerAActive) { birdB.src = birdFrames[targetIndex]; birdB.style.opacity = '1'; birdA.style.opacity = '0'; }
            else { birdA.src = birdFrames[targetIndex]; birdA.style.opacity = '1'; birdB.style.opacity = '0'; }
            isLayerAActive = !isLayerAActive; currentFrameIndex = targetIndex;
        }
        birdRafId = requestAnimationFrame(flyBird);
    };

    const startBirdFlight = () => {
        if (!birdContainer) return;
        cancelAnimationFrame(birdRafId);
        birdContainer.style.opacity = '1';
        isBirdFlying = true;
        birdProgress = 0;
        currentFrameIndex = 0;
        birdA.src = birdFrames[0]; birdB.src = birdFrames[0];
        birdA.style.opacity = '1'; birdB.style.opacity = '0'; isLayerAActive = true;
        flyBird();
    };

    const stopBirdFlight = () => { isBirdFlying = false; cancelAnimationFrame(birdRafId); };

    // === СОСТОЯНИЯ ===
    let currentState = 0;
    let isAnimating = false;
    let currentProject = 0;

    const lockFor = (ms) => {
        isAnimating = true;
        setTimeout(() => { isAnimating = false; }, ms);
    };

    const scrollDown = () => {
        if (isAnimating) return;

        if (currentState === 0) {
            isAnimating = true;
            heroText.classList.add('opacity-0', 'translate-y-10'); heroText.classList.remove('opacity-100');
            if (window.innerWidth < 1024 && heroPhoto) heroPhoto.style.opacity = '0';
            advantagesBlock.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-10');
            advantagesBlock.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
            advRow1.classList.remove('hidden'); advRow1.classList.add('grid');
            if (window.innerWidth < 1024) { advRow2.classList.add('hidden'); advRow2.classList.remove('grid'); }
            else { advRow2.classList.remove('hidden'); advRow2.classList.add('grid'); }
            currentState = 1; lockFor(800);
        }
        else if (currentState === 1) {
            if (window.innerWidth < 1024) {
                isAnimating = true;
                advRow1.classList.add('hidden'); advRow1.classList.remove('grid');
                advRow2.classList.remove('hidden'); advRow2.classList.add('grid');
                currentState = 2; lockFor(800);
            } else {
                isAnimating = true;
                screen1.classList.add('opacity-0', 'pointer-events-none'); screen2.classList.remove('opacity-0', 'pointer-events-none');
                currentState = 3;
                startBirdFlight();
                setTimeout(() => {
                    birdContent.classList.remove('opacity-0', 'translate-y-10');
                    birdContent.classList.add('opacity-100', 'translate-y-0');
                }, 800);
                lockFor(800);
            }
        }
        else if (currentState === 2) {
            isAnimating = true;
            screen1.classList.add('opacity-0', 'pointer-events-none'); screen2.classList.remove('opacity-0', 'pointer-events-none');
            currentState = 3;
            startBirdFlight();
            setTimeout(() => {
                birdContent.classList.remove('opacity-0', 'translate-y-10');
                birdContent.classList.add('opacity-100', 'translate-y-0');
            }, 800);
            lockFor(800);
        }
        else if (currentState === 3) {
            isAnimating = true;
            screen2.classList.add('opacity-0', 'pointer-events-none'); screen3.classList.remove('opacity-0', 'pointer-events-none');
            birdContent.classList.add('opacity-0', 'translate-y-10'); birdContent.classList.remove('opacity-100', 'translate-y-0');
            if (oceanVideo) oceanVideo.play();
            oceanTitle.classList.remove('opacity-0', 'translate-y-10'); oceanTitle.classList.add('opacity-100', 'translate-y-0');
            currentState = 4; lockFor(800);
        }
        else if (currentState === 4) {
            isAnimating = true;
            oceanTitle.classList.add('opacity-0', 'translate-y-10'); oceanTitle.classList.remove('opacity-100', 'translate-y-0');
            oceanCards.classList.remove('opacity-0', 'translate-y-10'); oceanCards.classList.add('opacity-100', 'translate-y-0');
            currentState = 5; lockFor(800);
        }
        else if (currentState === 5) {
            isAnimating = true;
            screen3.classList.add('opacity-0', 'pointer-events-none'); screen4.classList.remove('opacity-0', 'pointer-events-none');
            if (oceanVideo) oceanVideo.pause();
            slideCarousel.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
            slideCarousel.classList.add('opacity-100', 'translate-y-0');
            currentState = 6; lockFor(800);
        }
        else if (currentState === 6) {
            if (currentProject < projects.length - 1) {
                isAnimating = true;
                projects[currentProject].classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                projects[currentProject].classList.remove('opacity-100', 'translate-y-0');
                currentProject++;
                projects[currentProject].classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                projects[currentProject].classList.add('opacity-100', 'translate-y-0');
                lockFor(800);
            } else {
                isAnimating = true;
                slideCarousel.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none'); slideCarousel.classList.remove('opacity-100', 'translate-y-0');
                slideStages.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none'); slideStages.classList.add('opacity-100', 'translate-y-0');
                currentState = 7; lockFor(800);
            }
        }
        else if (currentState === 7) {
            isAnimating = true;
            slideStages.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none'); slideStages.classList.remove('opacity-100', 'translate-y-0');
            slideContacts.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none'); slideContacts.classList.add('opacity-100', 'translate-y-0');
            currentState = 8; lockFor(800);
        }
    };

    const scrollUp = () => {
        if (isAnimating) return;

        if (currentState === 8) {
            isAnimating = true;
            slideStages.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none'); slideStages.classList.add('opacity-100', 'translate-y-0');
            slideContacts.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none'); slideContacts.classList.remove('opacity-100', 'translate-y-0');
            currentState = 7; lockFor(800);
        }
        else if (currentState === 7) {
            isAnimating = true;
            slideCarousel.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none'); slideCarousel.classList.add('opacity-100', 'translate-y-0');
            slideStages.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none'); slideStages.classList.remove('opacity-100', 'translate-y-0');
            currentState = 6; lockFor(800);
        }
        else if (currentState === 6) {
            if (currentProject > 0) {
                isAnimating = true;
                projects[currentProject].classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                projects[currentProject].classList.remove('opacity-100', 'translate-y-0');
                currentProject--;
                projects[currentProject].classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                projects[currentProject].classList.add('opacity-100', 'translate-y-0');
                lockFor(800);
            } else {
                isAnimating = true;
                screen3.classList.remove('opacity-0', 'pointer-events-none'); screen4.classList.add('opacity-0', 'pointer-events-none');
                slideCarousel.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none'); slideCarousel.classList.remove('opacity-100', 'translate-y-0');
                if (oceanVideo) oceanVideo.play();
                currentState = 5; lockFor(800);
            }
        }
        else if (currentState === 5) {
            isAnimating = true;
            oceanTitle.classList.remove('opacity-0', 'translate-y-10'); oceanTitle.classList.add('opacity-100', 'translate-y-0');
            oceanCards.classList.add('opacity-0', 'translate-y-10'); oceanCards.classList.remove('opacity-100', 'translate-y-0');
            currentState = 4; lockFor(800);
        }
        else if (currentState === 4) {
            isAnimating = true;
            screen2.classList.remove('opacity-0', 'pointer-events-none'); screen3.classList.add('opacity-0', 'pointer-events-none');
            oceanTitle.classList.add('opacity-0', 'translate-y-10'); oceanTitle.classList.remove('opacity-100', 'translate-y-0');
            if (oceanVideo) oceanVideo.pause();
            startBirdFlight();
            setTimeout(() => {
                birdContent.classList.remove('opacity-0', 'translate-y-10');
                birdContent.classList.add('opacity-100', 'translate-y-0');
            }, 200);
            currentState = 3; lockFor(800);
        }
        else if (currentState === 3) {
            isAnimating = true;
            screen1.classList.remove('opacity-0', 'pointer-events-none'); screen2.classList.add('opacity-0', 'pointer-events-none');
            birdContent.classList.add('opacity-0', 'translate-y-10'); birdContent.classList.remove('opacity-100', 'translate-y-0');
            stopBirdFlight();
            if (window.innerWidth < 1024) {
                advRow1.classList.add('hidden'); advRow1.classList.remove('grid');
                advRow2.classList.remove('hidden'); advRow2.classList.add('grid');
                currentState = 2;
            } else {
                advRow1.classList.remove('hidden'); advRow1.classList.add('grid');
                advRow2.classList.remove('hidden'); advRow2.classList.add('grid');
                currentState = 1;
            }
            lockFor(800);
        }
        else if (currentState === 2) {
            isAnimating = true;
            advRow1.classList.remove('hidden'); advRow1.classList.add('grid');
            advRow2.classList.add('hidden'); advRow2.classList.remove('grid');
            currentState = 1; lockFor(800);
        }
        else if (currentState === 1) {
            isAnimating = true;
            heroText.classList.remove('opacity-0', 'translate-y-10'); heroText.classList.add('opacity-100');
            if (heroPhoto) heroPhoto.style.opacity = '1';
            advantagesBlock.classList.add('opacity-0', 'pointer-events-none', 'translate-y-10'); advantagesBlock.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
            currentState = 0; lockFor(800);
        }
    };

    window.addEventListener('wheel', (e) => {
        if (window.innerWidth >= 1024) {
            if (e.deltaY > 0) scrollDown();
            else if (e.deltaY < 0) scrollUp();
        }
    }, { passive: false });

    const container = document.getElementById('main-container');
    let touchStartY = 0;
    let touchStartX = 0;
    let touchLock = false;

    container.addEventListener('touchstart', (e) => {
        if (window.innerWidth >= 1024) return;
        const t = e.touches[0];
        touchStartY = t.clientY;
        touchStartX = t.clientX;
        touchLock = false;
    }, { passive: true });

    container.addEventListener('touchmove', (e) => {
        if (window.innerWidth >= 1024 || touchLock) return;
        const t = e.touches[0];
        const deltaY = touchStartY - t.clientY;
        const deltaX = touchStartX - t.clientX;

        if (Math.abs(deltaY) > 60 && Math.abs(deltaY) > Math.abs(deltaX) * 1.5) {
            touchLock = true;
            if (deltaY > 0) scrollDown();
            else scrollUp();
            setTimeout(() => { touchLock = false; }, 500);
        }
    }, { passive: true });

    document.querySelectorAll('.carousel-container').forEach(container => {
        let currentIndex = 0;
        const track = container.querySelector('.carousel-track');
        const images = track.querySelectorAll('img');
        const prevBtn = container.querySelector('.carousel-prev');
        const nextBtn = container.querySelector('.carousel-next');
        const updateCarousel = () => { track.style.transform = `translateX(-${currentIndex * 100}%)`; };
        nextBtn.addEventListener('click', (e) => { e.stopPropagation(); currentIndex = (currentIndex + 1) % images.length; updateCarousel(); });
        prevBtn.addEventListener('click', (e) => { e.stopPropagation(); currentIndex = (currentIndex - 1 + images.length) % images.length; updateCarousel(); });
        let touchStartX = 0, touchEndX = 0;
        container.addEventListener('touchstart', (e) => { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
        container.addEventListener('touchend', (e) => { touchEndX = e.changedTouches[0].screenX; handleSwipe(); }, { passive: true });
        const handleSwipe = () => {
            if (touchEndX < touchStartX - 50) { currentIndex = (currentIndex + 1) % images.length; updateCarousel(); }
            if (touchEndX > touchStartX + 50) { currentIndex = (currentIndex - 1 + images.length) % images.length; updateCarousel(); }
        };
    });

    let lastTime = 0;
    const throttleDelay = 30;
    document.addEventListener('mousemove', (e) => {
        const now = Date.now(); if (now - lastTime < throttleDelay) return; lastTime = now; createBubble(e.clientX, e.clientY);
    });
    document.addEventListener('touchmove', (e) => {
        const now = Date.now(); if (now - lastTime < throttleDelay) return; lastTime = now; const touch = e.touches[0]; createBubble(touch.clientX, touch.clientY);
    }, { passive: true });
    function createBubble(x, y) {
        const bubble = document.createElement('div'); bubble.classList.add('cursor-bubble');
        const size = Math.random() * 10 + 5; bubble.style.width = `${size}px`; bubble.style.height = `${size}px`;
        bubble.style.left = `${x - size / 2}px`; bubble.style.top = `${y - size / 2}px`;
        document.body.appendChild(bubble); setTimeout(() => { bubble.remove(); }, 1500);
    }
});
</script>

<style>
    .cursor-bubble {
        position: fixed; pointer-events: none; border-radius: 50%;
        background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.9), rgba(212, 175, 55, 0.4) 60%, rgba(212, 175, 55, 0) 100%);
        box-shadow: 0 0 10px rgba(246, 235, 202, 0.5); z-index: 9999;
        animation: bubbleFloat 1.5s ease-out forwards;
    }
    @keyframes bubbleFloat {
        0% { transform: translateY(0) scale(1); opacity: 1; }
        100% { transform: translateY(-30px) scale(0.5); opacity: 0; }
    }
</style>