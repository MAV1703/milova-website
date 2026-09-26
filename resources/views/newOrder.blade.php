<div>
    <x-app-layout>
        <x-slot:title>{{ $title }}</x-slot>

        <div class="flex flex-col lg:flex-row bg-black items-start mt-20">

            {{-- Левая часть: скрыта на мобилке --}}
            <div class="hidden lg:block w-full lg:w-1/2">
                <img src="{{asset('images/typingme.jpeg')}}" alt="..." class="w-[90%]">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black z-[-1]"></div>

                <div class="rounded-lg p-[1px] bg-gradient-to-l from-[#494338] to-[#111111] text-white w-[90%] min-w-[280px] mt-6 mr-6">
                    <div class="bg-[#161616] rounded-lg px-6 py-10">
                        <div class="flex items-center">
                            <img src="{{ asset('images/star.png') }}" class="w-8 h-10" alt="...">
                            <h3 class="font-semibold text-lg mb-2">Что вы получаете</h3>
                        </div>
                        <ul>
                            <li class="flex gap-4 items-center m-2"><img class="w-10 h-10" src="{{ asset('images/tick1.png') }}" alt="..."><p>Индивидуальное решение вашей задачи</p></li>
                            <li class="flex gap-4 items-center m-2"><img class="w-10 h-10" src="{{ asset('images/tick1.png') }}" alt="..."><p>Работа "под ключ"</p></li>
                            <li class="flex gap-4 items-center m-2"><img class="w-10 h-10" src="{{ asset('images/tick1.png') }}" alt="..."><p>Лёгкий, современный и функциональный самописный сайт</p></li>
                            <li class="flex gap-4 items-center m-2"><img class="w-10 h-10" src="{{ asset('images/tick1.png') }}" alt="..."><p>Чистый и поддерживаемый код</p></li>
                            <li class="flex gap-4 items-center m-2"><img class="w-10 h-10" src="{{ asset('images/tick1.png') }}" alt="..."><p>Соблюдение сроков и договорённостей</p></li>
                            <li class="flex gap-4 items-center m-2"><img class="w-10 h-10" src="{{ asset('images/tick1.png') }}" alt="..."><p>Поддержка после завершения работы</p></li>
                        </ul>
                    </div>
                </div>

                <div class="rounded-lg p-[1px] bg-gradient-to-l from-[#494338] to-[#111111] text-white w-[90%] min-w-[280px] mt-10 mr-6">
					<div class="bg-[#1d1a15] rounded-lg px-6 py-10">
						<div class="flex items-center">
							<img src="{{ asset('images/doc.png') }}" class="w-10 h-10" alt="...">
							<h3 class="font-semibold text-lg mb-2">Процесс работы</h3>
						</div>

						<ul class="mt-6">
							@php
								$steps = [
									'Вы оставляете заявку',
									'Я предлагаю решение ваших задач и согласовываю его с вами',
									'Обсуждаем и утверждаем дизайн, оформление, стоимость и сроки',
									'Вы вносите предоплату, я начинаю работу',
									'Я представляю вам результат и демонстрирую функционал вашего сайта',
									'Согласовываем и вносим правки',
									'Вы оплачиваете остаток стоимости и получаете работающий сайт в интернете',
								];
							@endphp

							@foreach($steps as $index => $step)
								<li class="flex gap-4 items-start">
									{{-- Номер + линия --}}
									<div class="flex flex-col items-center self-stretch">
										<span class="p-2 bg-gradient-to-l from-[#7f511f] to-[#9f7e51] text-black w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 font-semibold">
											{{ $index + 1 }}
										</span>
										@if($index < count($steps) - 1)
											<div class="w-[2px] flex-1 my-1 bg-gradient-to-b from-[#9f7e51]/60 to-[#9f7e51]/20"></div>
										@endif
									</div>
									{{-- Текст --}}
									<p class="pt-1 pb-4">{{ $step }}</p>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
            </div>

            {{-- Правая часть: форма --}}
            <div class="w-full lg:w-1/2">
                <livewire:new-order-form />
            </div>
        </div>
    </x-app-layout>
</div>