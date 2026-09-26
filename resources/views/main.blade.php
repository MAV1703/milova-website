<x-app-layout>
	<x-slot:title>{{ $title}}</x-slot>
	<div class="relative w-full min-h-[100vh] lg:min-h-[80vh] flex items-end lg:items-center justify-start mt-10 overflow-hidden">

    {{-- Фон: cover, фокус слева, обрезается правый край --}}
    <div class="absolute inset-0 bg-cover bg-[position:80%_top] lg:bg-center lg:bg-top z-0"
         style="background-image: url('{{ asset('images/hero.jpeg') }}');"></div>

    {{-- Градиент вертикальный --}}
    <div class="absolute inset-0 z-10 bg-gradient-to-b from-black/40 via-transparent to-black lg:from-transparent lg:via-black/20 lg:to-black"></div>

    {{-- Градиент боковой (слева тёмный) — только мобилка/планшет --}}
    <div class="absolute inset-0 z-10 bg-gradient-to-r from-black/60 via-transparent to-transparent lg:hidden"></div>

    {{-- Левый спейсер (только десктоп) --}}
    <div class="hidden lg:block relative w-[100px]"></div>

    {{-- Контент --}}
    <div class="relative z-20 text-left text-white px-4 sm:px-6 lg:px-4 lg:ml-5 pb-12 lg:pb-0 lg:mt-40 w-full lg:max-w-4xl max-w-[60%] sm:max-w-[55%]">

        <p class="text-sm sm:text-base lg:text-lg text-gray-200 font-semibold">Привет! Я</p>

        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-6xl font-bold mt-2 lg:mt-4 mb-3 lg:mb-4 tracking-wide">
            Анастасия Милова
        </h1>

        <div class="flex items-center mb-3 lg:mb-6 flex-wrap gap-1 lg:gap-2">
            <img src="{{ asset('images/laravel.jpeg') }}"
                 class="w-4 h-4 sm:w-5 sm:h-5 lg:w-8 lg:h-8 object-contain" alt="Laravel">
            <p class="font-semibold text-xs sm:text-sm lg:text-xl" style="color: #a89983;">Laravel</p>
            <span class="mx-1 text-[#a89983] text-sm lg:text-lg">+</span>
            <img src="{{ asset('images/livewire.png') }}"
                 class="w-4 h-4 sm:w-5 sm:h-5 lg:w-8 lg:h-8 object-contain" alt="Livewire">
            <p class="font-semibold text-xs sm:text-sm lg:text-xl" style="color: #a89983;">Livewire Developer</p>
        </div>

        <p class="text-sm sm:text-base lg:text-lg text-gray-200 max-w-2xl mt-2 mb-4 lg:mb-10 font-semibold">
            Сниму головную боль вашего бизнеса.
        </p>

        <p class="text-sm sm:text-base lg:text-lg text-gray-200 max-w-2xl font-semibold hidden sm:block">
            Ваш сайт — не «мёртвая» страничка в интернете, а стильное и удобное веб-приложение
        </p>

        <ul class="bg-[rgba(0,0,0,0.4)] p-2 lg:p-4 rounded-lg mt-3 max-w-full hidden sm:inline-block">
            <li class="font-semibold text-xs sm:text-sm lg:text-lg drop-shadow-[0_10px_10px_rgb(0,0,0)] mb-1">
                <span class="text-xl lg:text-4xl text-[#a89983] align-middle mr-1">&middot;</span>
                Клиенты видят ваши работы, оставляют заявки или выбирают время для записи
            </li>
            <li class="font-semibold text-xs sm:text-sm lg:text-lg drop-shadow-[0_10px_10px_rgb(0,0,0)]">
                <span class="text-xl lg:text-4xl text-[#a89983] align-middle mr-1">&middot;</span>
                Вы управляете заказами, ведёте переписку и не путаетесь в мессенджерах и звонках
            </li>
        </ul>

        <p class="text-sm sm:text-base lg:text-lg text-gray-200 max-w-2xl my-3 lg:my-6 font-semibold">
            Просто, честно, современно, недорого
        </p>

        <a href="{{ route('orders', ['openChat' => 1]) }}"
           class="inline-flex items-center gap-2 rounded-lg text-black px-3 py-2 lg:px-4 lg:py-3 mt-2 lg:mt-10 bg-[#9f7e51] text-sm sm:text-base lg:text-xl transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
            Открыть чат
            <span class="text-[#9f7e51] bg-white rounded-full w-5 h-5 lg:w-6 lg:h-6 flex items-center justify-center text-xs lg:text-sm font-bold">&#8594;</span>
        </a>
    </div>
</div>
	<div class="flex flex-col md:flex-row justify-center gap-4 md:gap-8 p-4 md:p-6 mt-8 bg-black">
    {{-- Hard-skills --}}
    <div class="rounded-xl p-[2px] bg-gradient-to-l from-[#494338] to-[#111111] text-white w-full md:w-2/5 md:min-w-[280px]">
        <div class="rounded-lg h-full p-4 md:p-6 bg-[#111111]">
            <div class="flex items-center gap-3 md:gap-4">
                <img src="{{ asset('images/gear.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="...">
                <h3 class="text-white font-semibold text-lg md:text-2xl">Hard-skills (Технологии)</h3>
            </div>
            <div class="flex flex-wrap gap-2 md:gap-3 text-gray-200 mt-4 md:mt-6 text-xs md:text-sm font-semibold">
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Laravel</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">LiveWire</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">PHP</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">JavaScript</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Tailwind</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">HTML</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">CSS</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">SQL</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">MVC</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">ООП</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Cursor</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Alpine.js</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Bootstrap</p>
            </div>
        </div>
    </div>

    {{-- Soft-skills --}}
    <div class="rounded-xl p-[2px] bg-gradient-to-l from-[#494338] to-[#111111] text-white w-full md:w-2/5 md:min-w-[280px]">
        <div class="rounded-lg h-full p-4 md:p-6 bg-[#111111]">
            <div class="flex items-center gap-3 md:gap-4">
                <img src="{{ asset('images/cup.png') }}" class="w-7 h-8 md:w-9 md:h-10" alt="...">
                <h3 class="text-white font-semibold text-lg md:text-2xl">Soft-skills (Процессы)</h3>
            </div>
            <div class="flex flex-wrap gap-2 md:gap-3 text-gray-200 mt-4 md:mt-6 text-xs md:text-sm font-semibold">
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Системность</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Дисциплина</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Аналитический склад ума</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Ответственность</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Самообучаемость</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Креативность</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Проактивность</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Ориентация на пользователя</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">Глубокая вовлечённость</p>
                <p class="bg-gradient-to-l from-[#242323] to-[#121212] rounded-lg p-2">UX-мышление</p>
            </div>
        </div>
    </div>
</div>
	<div class="flex gap-3 md:gap-4 items-center justify-center mt-10 md:mt-20 mb-6 md:mb-10 px-4">
		<div class="h-[2px] flex-1 max-w-[14rem] bg-gradient-to-r from-[transparent] to-[#9f7e51]"></div>
		<h3 class="text-white text-lg md:text-2xl tracking-[1px] md:tracking-[2px] font-semibold whitespace-nowrap">Мои проекты</h3>
		<div class="h-[2px] flex-1 max-w-[14rem] bg-gradient-to-l from-[transparent] to-[#9f7e51]"></div>
	</div>
		
		<div class="flex flex-wrap gap-6 justify-center mt-4">
		<!-- дальше блоки каруселей, первый--!>
			<div class="mx-1 w-full md:w-2/3 lg:w-1/4 min-w-0 md:min-w-[280px]"
     x-data="{ zoomed: false, toggle() { if (window.innerWidth >= 1024) this.zoomed = !this.zoomed } }">
    <div class="bg-gradient-to-r from-[#494338] to-[#111111] rounded-xl p-[2px] text-white h-full">
        <div class="h-full bg-[#111111] rounded-lg p-4 md:p-6 relative flex flex-col">

            {{-- Затемнение фона --}}
            <div x-show="zoomed"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="zoomed = false"
                 class="fixed inset-0 z-40 bg-black/80 cursor-zoom-out"
                 x-cloak>
            </div>

            <div id="carouselExampleControls"
                 class="carousel slide transition-transform duration-300"
                 :class="zoomed ? 'fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] max-w-4xl cursor-zoom-out' : 'lg:cursor-zoom-in'"
                 @click="toggle"
                 data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/screenshots/calendar/sep.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/calendar/nov.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/calendar/oct.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/calendar/aug2.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/calendar/jan.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/calendar/aug3.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/calendar/march.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" @click.stop>
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden z-[60]">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" @click.stop>
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden z-[60]">Следующий</span>
                </button>
            </div>

						<h4 class="text-gray-200 mt-4 text-lg md:text-xl font-semibold">Интерактивный календарь-планировщик дел</h4>
						<p class="my-4 md:my-6 text-sm md:text-lg flex-grow">Динамическая смена фонов по месяцам и визуализация задач (сроки, просроченные дела). Управление делами написано на ванильном JavaScript.</p>
						<a href="https://github.com/MAV1703/planner" class="text-[#9f7e51] mt-4 font-semibold">Посмотреть код &#8594;</a>
					</div>
				</div>
			</div>
		
		<!-- второй--!>
			<div class="mx-1 w-full md:w-2/3 lg:w-1/4 min-w-0 md:min-w-[280px]"
     x-data="{ zoomed: false, toggle() { if (window.innerWidth >= 1024) this.zoomed = !this.zoomed } }">
    <div class="bg-gradient-to-l from-[#494338] to-[#111111] rounded-xl p-[2px] text-white h-full">
        <div class="h-full bg-[#111111] rounded-lg p-4 md:p-6 relative flex flex-col">

            <div x-show="zoomed"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="zoomed = false"
                 class="fixed inset-0 z-40 bg-black/80 cursor-zoom-out"
                 x-cloak>
            </div>

            <div id="carouselExampleControls1"
                 class="carousel slide transition-transform duration-300"
                 :class="zoomed ? 'fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] max-w-4xl cursor-zoom-out' : 'lg:cursor-zoom-in'"
                 @click="toggle"
                 data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/screenshots/coders-guild/friendship.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/coders-guild/page1.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/coders-guild/register.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/coders-guild/post.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/coders-guild/searching2.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/coders-guild/searching.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/coders-guild/page2.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/coders-guild/post2.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/screenshots/coders-guild/searchtags.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev" @click.stop>
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next" @click.stop>
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>

					<h4 class="text-gray-200 mt-4 text-lg md:text-xl font-semibold">Геймифицированная социальная сеть</h4>
					<p class="my-4 md:my-6 text-sm md:text-lg flex-grow">Система кастомных аватаров, гибкий поиск друзей по фильтрам и лента публикаций с поддержкой загрузки медиа, тегов и текстового поиска.</p>
					<a href="https://github.com/MAV1703/coders-guild" class="text-[#9f7e51] mt-4 font-semibold">Посмотреть код &#8594;</a>
				</div>
			</div>
		</div>
		<!-- третий--!>
			<div class="mx-1 w-full md:w-2/3 lg:w-1/4 min-w-0 md:min-w-[280px]"
     x-data="{ zoomed: false, toggle() { if (window.innerWidth >= 1024) this.zoomed = !this.zoomed } }">
    <div class="bg-gradient-to-r from-[#494338] to-[#111111] rounded-xl p-[2px] text-white h-full">
        <div class="h-full bg-[#111111] rounded-lg p-4 md:p-6 relative flex flex-col">

            <div x-show="zoomed"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="zoomed = false"
                 class="fixed inset-0 z-40 bg-black/80 cursor-zoom-out"
                 x-cloak>
            </div>

            <div id="carouselExampleControls2"
                 class="carousel slide transition-transform duration-300"
                 :class="zoomed ? 'fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] max-w-4xl cursor-zoom-out' : 'lg:cursor-zoom-in'"
                 @click="toggle"
                 data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/screenshots/reminder/background.png" class="d-block w-100 screenshotImg rounded-lg" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev" @click.stop>
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next" @click.stop>
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
				</div>

						<h4 class="text-gray-200 mt-4 text-lg md:text-xl font-semibold">Task Manager с реактивным интерфейсом на Laravel + Livewire.</h4>
						<p class="my-4 md:my-6 text-sm md:text-lg flex-grow">Проект демонстрирует работу реального времени: изменения статуса и сроков мгновенно отражаются в UI без перезагрузки страницы.</p>
						<a href="https://github.com/MAV1703/reminder-laravel" class="text-[#9f7e51] mt-4 font-semibold">Посмотреть код &#8594;</a>
					</div>
				</div>
			</div>
		</div>
	<!--Блок цен-->
	<div class="flex gap-3 md:gap-4 items-center justify-center mt-10 md:mt-20 mb-6 md:mb-10 px-4">
		<div class="h-[2px] flex-1 max-w-[14rem] bg-gradient-to-r from-[transparent] to-[#9f7e51]"></div>
		<h3 class="text-white text-lg md:text-2xl tracking-[1px] md:tracking-[2px] font-semibold whitespace-nowrap">Мои услуги</h3>
		<div class="h-[2px] flex-1 max-w-[14rem] bg-gradient-to-l from-[transparent] to-[#9f7e51]"></div>
	</div>
	<p class="text-center text-white/60 text-sm sm:text-base lg:text-lg mt-4 px-4">Делаю интернет функциональным и красивым - для вас!</p>
	<div class="flex flex-col lg:flex-row gap-6 md:gap-8 lg:gap-8 xl:gap-12 items-stretch justify-center p-4 md:p-6 lg:p-10">

    {{-- Карточка 1 --}}
    <div class="bg-gradient-to-l from-[#494338] to-[#111111] rounded-xl p-[2px] text-white w-full lg:w-1/3">
        <div class="h-full bg-[#111111] rounded-lg flex flex-col">
            <img src="{{ asset('/images/card1.jpeg') }}" class="rounded-lg">
            <div class="flex gap-2 items-center text-[#9f7e51] p-4 md:p-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 md:w-8 md:h-8 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                </svg>
                <h3 class="text-base md:text-lg font-semibold text-white">Лендинг или визитка</h3>
            </div>
            <p class="px-4 md:px-6 pb-2 text-sm md:text-base">Сайт, который мгновенно объясняет, чем вы полезны, и превращает случайных посетителей в клиентов.</p>
            <ul class="px-6 md:px-10 text-[#9f7e51] flex-grow">
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Современный и адаптивный дизайн</p>
                </li>
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Быстрая загрузка — клиенты не потеряются на полпути к сайту</p>
                </li>
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Понятная структура — легко найти нужное</p>
                </li>
            </ul>
            <div class="flex items-center gap-2 text-[#9f7e51] px-4 md:px-6 pt-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                <h4 class="font-semibold">Для кого:</h4>
            </div>
            <p class="text-sm px-4 md:px-6 pt-2">Для мастеров, специалистов и небольших студий, которым важно быстро и эффектно заявить о себе</p>
            <div class="flex px-4 md:px-6 justify-between items-center pb-4 pt-6">
                <p class="text-base md:text-lg text-[#9f7e51] font-bold">от 15 000 &#8381;</p>
                <a href="{{ route('newOrder') }}" class="text-3xl md:text-4xl text-[#9f7e51] font-bold transition-all duration-200 hover:translate-x-1 hover:text-[#f8d495]">&#8594;</a>
            </div>
        </div>
    </div>

    {{-- Карточка 2 --}}
    <div class="bg-gradient-to-l from-[#494338] to-[#111111] rounded-xl p-[2px] text-white w-full lg:w-1/3">
        <div class="h-full bg-[#111111] rounded-lg flex flex-col">
            <img src="{{ asset('/images/card2.jpeg') }}" class="rounded-lg">
            <div class="flex gap-2 items-center text-[#9f7e51] p-4 md:p-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 md:w-8 md:h-8 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" /></svg>
                <h3 class="text-base md:text-lg font-semibold text-white">Корпоративный сайт</h3>
            </div>
            <p class="px-4 md:px-6 pb-2 text-sm md:text-base">Многостраничный сайт, который представляет компанию с лучшей стороны и вызывает доверие с первого взгляда.</p>
            <ul class="px-6 md:px-10 text-[#9f7e51] flex-grow">
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Уникальный дизайн под ваш бренд</p>
                </li>
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Разделы для клиентов, партнёров, соискателей, сотрудников</p>
                </li>
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Удобная структура и навигация</p>
                </li>
            </ul>
            <div class="flex items-center gap-2 text-[#9f7e51] px-4 md:px-6 pt-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                <h4 class="font-semibold">Для кого:</h4>
            </div>
            <p class="text-sm px-4 md:px-6 pt-2">Для компаний, которые хотят укрепить имидж и разграничить функционал сайта для разных пользовательских ролей</p>
            <div class="flex px-4 md:px-6 justify-between items-center pb-4 pt-6">
                <p class="text-base md:text-lg text-[#9f7e51] font-bold">от 25 000 &#8381;</p>
                <a href="{{ route('newOrder') }}" class="text-3xl md:text-4xl text-[#9f7e51] font-bold transition-all duration-200 hover:translate-x-1 hover:text-[#f8d495]">&#8594;</a>
            </div>
        </div>
    </div>

    {{-- Карточка 3 --}}
    <div class="rounded-xl p-[2px] bg-gradient-to-br from-[#7f511f] via-[transparent] to-[#9f7e51] shadow-[0_0_4px_rgba(235,208,55,0.835)] w-full lg:w-1/3 relative">
        <div class="rounded-[10px] bg-[#111111] flex flex-col h-full">
            <div class="flex gap-[2px] items-center justify-center text-[#7f321f] text-center bg-gradient-to-r from-[#f8d495] to-[#9f7e51] w-2/3 rounded-full absolute top-[-2%] right-[5%] z-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.546 3.75 3.75 0 013.255 3.718z" clip-rule="evenodd" /></svg>
                <p class="text-xs md:text-sm text-black font-semibold py-1">Предложение ограничено!</p>
            </div>
            <img src="{{ asset('/images/card3.jpeg') }}" class="rounded-lg">
            <div class="flex gap-2 items-center text-[#9f7e51] p-4 md:p-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 md:w-8 md:h-8 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                <h3 class="text-base md:text-lg font-semibold text-white">Сайт с системой управления заказами</h3>
            </div>
            <p class="px-4 md:px-6 pb-2 text-sm md:text-base text-white">Ваш бизнес в одном окне: заказы, клиенты, команда, оплата и чат — без путаницы в блокнотах и мессенджерах.</p>
            <ul class="px-6 md:px-10 text-[#9f7e51] flex-grow">
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Приём заказов от каталога до оплаты</p>
                </li>
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Личный кабинет для клиентов и удобная админка для вас</p>
                </li>
                <li class="flex gap-2 items-start text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-white my-2">Гибкое решение "под ключ" для ваших задач</p>
                </li>
            </ul>
            <div class="flex items-center gap-2 text-[#9f7e51] px-4 md:px-6 pt-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                <h4 class="font-semibold">Для кого:</h4>
            </div>
            <p class="text-sm px-4 md:px-6 pt-2 text-white">Для всех, кому важно навести порядок в заявках и не потерять ни одного клиента.</p>
            <div class="flex px-4 md:px-6 justify-between items-center pb-4 pt-6">
                <div class="flex gap-1 text-[#7f321f] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.546 3.75 3.75 0 013.255 3.718z" clip-rule="evenodd" /></svg>
                    <p class="text-base md:text-lg text-[#9f7e51] font-bold">от 25 000 &#8381;</p>
                </div>
                <a href="{{ route('newOrder') }}" class="text-3xl md:text-4xl text-[#9f7e51] font-bold transition-all duration-200 hover:translate-x-1 hover:text-[#f8d495]">&#8594;</a>
            </div>
        </div>
    </div>
</div>

	<p class="text-center text-white/60 text-sm sm:text-base my-4 px-4 max-w-3xl mx-auto">Разработаю логику специально для вас: калькулятор расчёта стоимости, уведомления в мессенджер, оформление заказов с выбором параметров и другие решения. Цены указаны как ориентир. Точную стоимость, объём и сроки обсудим индивидуально.</p>

	<footer class="mt-4 relative w-full bg-gradient-to-b from-black/70 via-transparent to-transparent pt-12 md:pt-20 lg:pt-24 pb-8 md:pb-10 overflow-hidden">

    {{-- Фон --}}
    <div class="absolute inset-0 z-0 bg-cover bg-bottom bg-no-repeat pointer-events-none w-full lg:w-2/3"
         style="background-image: url('{{ asset('images/footer.jpeg') }}');"></div>

    {{-- Затемнение --}}
    <div class="absolute inset-0 z-10 bg-black/50"></div>
    <div class="absolute inset-0 z-10 bg-gradient-to-r from-black/100 via-transparent to-transparent"></div>

    {{-- Контент --}}
    <div class="relative z-20 mx-auto px-4 text-center text-white">

        {{-- Блок с текстом и чатом --}}
        <div class="flex justify-center items-start flex-wrap mt-2">
            <div class="bg-gradient-to-l from-[#494338] to-[#111111] rounded-xl p-[1px] text-white w-full max-w-screen-lg">
                <div class="flex flex-col lg:flex-row gap-6 md:gap-8 lg:gap-12 bg-[#111111] p-4 md:p-6 lg:p-8 rounded-lg items-start">

                    {{-- Текст + кнопки --}}
                    <div class="w-full lg:flex-1">
                        <h4 class="text-gray-200 text-lg md:text-xl lg:text-2xl font-semibold text-left">
                            100% качество — это стандарт, а не задача
                        </h4>
                        <p class="mt-4 md:mt-6 lg:mt-8 text-sm md:text-base lg:text-lg text-left">
                            Есть идея? Напишите в чат, и я помогу превратить её в реальность
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 md:gap-4 mt-6 md:mt-10 lg:mt-20">
                            <a href="https://t.me/Jenny_Doe"
                               class="flex items-center justify-center gap-2 bg-transparent border border-[#2c261d] py-2 md:py-3 px-4 md:px-5 rounded-lg transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                                <img src="{{ asset('images/networks/telegram.png') }}" class="w-5 md:w-6" alt="Telegram">
                                Telegram
                            </a>
                            <a href="https://max.ru/u/f9LHodD0cOK5E08_341IUeGWGIZaW7UNAyYN9ELdq4aKM2jZBUaXw3hu9VM"
                               class="flex items-center justify-center gap-2 bg-transparent border border-[#2c261d] py-2 md:py-3 px-4 md:px-5 rounded-lg transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                                <img src="{{ asset('images/networks/max.png') }}" class="w-5 md:w-6" alt="MAX">
                                Max
                            </a>
                        </div>
                    </div>

                    {{-- Чат --}}
                    <div class="w-full lg:flex-1">
                        <livewire:newChatFromMain/>
                    </div>
                </div>
            </div>
        </div>

        {{-- Копирайт --}}
        <p class="text-gray-200 text-xs md:text-sm mt-8 md:mt-12 lg:mt-20 font-semibold">
            Анастасия Милова, 2026г.
        </p>

        {{-- Ссылки --}}
        <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 justify-center mt-4">
            <a class="text-xs md:text-sm text-[#9f7e51] underline font-semibold" href="">
                &middot; Договор публичной оферты &middot;
            </a>
            <a class="text-xs md:text-sm text-[#9f7e51] underline font-semibold" href="">
                &middot; Политика конфиденциальности &middot;
            </a>
        </div>
    </div>
</footer>
</x-app-layout>