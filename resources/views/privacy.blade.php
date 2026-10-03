<div style="background-image: url('{{ asset('images/offer1.jpeg') }}'), url('{{ asset('images/chat3.jpeg') }}');
    background-position: bottom center, top center;
    background-repeat: no-repeat, no-repeat;
    background-size: 100% auto, 100% auto;"
     class="min-h-screen px-4 sm:px-6 lg:px-20 pt-24 md:pt-32 lg:pt-40 pb-10 md:pb-20">

    <x-app-layout>
        <x-slot:title>{{ $title }}</x-slot>

        <div class="flex flex-col lg:flex-row gap-6 lg:gap-10 items-start w-full">

            {{-- Левая колонка: содержание --}}
            <div class="w-full lg:w-auto lg:pl-16 xl:pl-[90px]">
					{{-- Заголовок: только для мобилок и планшетов --}}
					<h1 class="lg:hidden text-white text-base sm:text-lg whitespace-nowrap">Политика конфиденциальности</h1>
					<p class="hidden lg:block mt-4 text-white/60 text-sm md:text-base">Я забочусь о безопасности и сохранности ваших персональных данных</p>
					<div class="rounded-xl p-[2px] bg-gradient-to-l from-[#494338] to-[#111111]/50 text-white w-full sm:w-3/5 lg:w-auto min-w-0 lg:min-w-[280px] mt-3 md:mt-4">
                    <div class="h-full bg-[#0f0e0c]/70 rounded-lg p-4">
                        <h4 class="text-sm md:text-base">Что вы здесь найдёте:</h4>
                        <ul>
                            @php
                                $items = [
                                    '1' => 'Общие положения',
                                    '2' => 'Какие данные собираются',
                                    '3' => 'Цели обработки данных',
                                    '4' => 'Условия обработки и передачи данных',
                                    '5' => 'Хранение и удаление данных',
                                    '6' => 'Использование cookie',
                                    '7' => 'Права Пользователя',
                                    '8' => 'Изменение Политики',
                                    '9' => 'Контакты',
                                ];
                            @endphp
                            @foreach($items as $id => $label)
                                <li class="flex mt-3 md:mt-4 items-center gap-2 transition-transform duration-200 hover:translate-x-[4px]">
                                    <img src="{{ asset('/images/tick1.png') }}" class="w-7 h-7 md:w-10 md:h-10 flex-shrink-0" alt="">
                                    <a class="text-white/60 hover:text-white transition text-sm md:text-base" href="#{{ $id }}">{{ $label }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Правая колонка: документ --}}
            <div class="rounded-xl p-[2px] bg-gradient-to-l from-[#494338] to-[#111111]/40 text-white min-w-0 lg:min-w-[280px] w-full lg:flex-1 lg:ml-10">
                <div class="h-full bg-[#0f0e0c]/60 rounded-lg p-4 md:p-6 lg:pr-12 xl:pr-[100px]">

                    {{-- Заголовок --}}
                    <div class="flex gap-2 md:gap-4 justify-center items-center">
                        <div class="h-[2px] w-8 sm:w-16 md:w-24 bg-gradient-to-r from-transparent to-[#9f7e51]"></div>
                        <h1 class="font-semibold my-2 text-xs sm:text-sm md:text-base lg:text-lg whitespace-nowrap">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</h1>
                        <div class="h-[2px] w-8 sm:w-16 md:w-24 bg-gradient-to-l from-transparent to-[#9f7e51]"></div>
                    </div>
                    <p class="my-4 text-white/60 text-sm md:text-base">Дата публикации: 14.09.2026</p>

                    {{-- Тело документа --}}
                    <div class="text-justify text-sm md:text-base">

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="1">1. Общие положения</h4>
                        <p class="text-white/60 mb-4">1.1. Настоящая Политика конфиденциальности (далее — «Политика») действует в отношении всей информации, которую Милова Анастасия Викторовна, зарегистрированная в качестве плательщика налога на профессиональный доход (самозанятый) (далее — «Исполнитель»), может получить о Пользователе во время использования сайта https://milova.website (далее — «Сайт»).</p>
                        <p class="text-white/60 mb-4">1.2. Использование Сайта означает безоговорочное согласие Пользователя с настоящей Политикой и указанными в ней условиями обработки его персональной информации. В случае несогласия с условиями Пользователю следует воздержаться от использования Сайта.</p>
                        <p class="text-white/60 mb-4">1.3. Настоящая Политика разработана в соответствии с Федеральным законом от 27.07.2006 № 152-ФЗ «О персональных данных».</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="2">2. Какие данные собираются</h4>
                        <p class="text-white/60 mb-4">2.1. Исполнитель может собирать следующие данные Пользователя:</p>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li class="mb-2">Имя — для обращения к Пользователю.</li>
                            <li class="mb-2">Адрес электронной почты (email) — для связи и отправки уведомлений.</li>
                            <li class="mb-2">Номер телефона — для связи по вопросам заказа.</li>
                            <li class="mb-2">Текст сообщений — для обработки заявок и ведения переписки.</li>
                            <li class="mb-2">Файлы, прикреплённые к заявке — для выполнения заказа.</li>
                        </ul>
                        <p class="text-white/60 mb-4">2.2. Также автоматически собираются:</p>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li class="mb-2">IP-адрес — для обеспечения безопасности.</li>
                            <li class="mb-2">Данные cookie — для идентификации гостевых пользователей и сохранения истории переписки.</li>
                            <li class="mb-2">Данные о браузере и устройстве — для статистики и улучшения работы Сайта.</li>
                        </ul>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="3">3. Цели обработки данных</h4>
                        <p class="text-white/60 mb-4">3.1. Персональные данные Пользователя обрабатываются в следующих целях:</p>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li class="mb-2">Обработка заявок и выполнение услуг.</li>
                            <li class="mb-2">Связь с Пользователем по вопросам заказа.</li>
                            <li class="mb-2">Отправка уведомлений о статусе заказа.</li>
                            <li class="mb-2">Улучшение качества работы Сайта.</li>
                            <li class="mb-2">Соблюдение требований законодательства РФ.</li>
                        </ul>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="4">4. Условия обработки и передачи данных</h4>
                        <p class="text-white/60 mb-4">4.1. Обработка персональных данных осуществляется с согласия Пользователя.</p>
                        <p class="text-white/60 mb-4">4.2. Исполнитель не передаёт персональные данные третьим лицам, за исключением случаев:</p>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li class="mb-2">Прямого согласия Пользователя.</li>
                            <li class="mb-2">Требования законодательства РФ.</li>
                        </ul>
                        <p class="text-white/60 mb-4">4.3. Персональные данные хранятся на защищённых серверах. Доступ к ним имеет только Исполнитель.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="5">5. Хранение и удаление данных</h4>
                        <p class="text-white/60 mb-4">5.1. Персональные данные хранятся в течение срока, необходимого для выполнения услуг и соблюдения требований законодательства.</p>
                        <p class="text-white/60 mb-4">5.2. Пользователь может запросить удаление своих данных, направив письмо на email: nastya.aleinowa@yandex.ru.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="6">6. Использование cookie</h4>
                        <p class="text-white/60 mb-4">6.1. Сайт использует cookie для:</p>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li class="mb-2">Идентификации гостевых пользователей.</li>
                            <li class="mb-2">Сохранения истории переписки в чате.</li>
                            <li class="mb-2">Улучшения работы Сайта.</li>
                        </ul>
                        <p class="text-white/60 mb-4">6.2. Пользователь может отключить cookie в настройках браузера, но это может ограничить функциональность Сайта.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="7">7. Права Пользователя</h4>
                        <p class="text-white/60 mb-4">7.1. Пользователь имеет право:</p>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li class="mb-2">Получить информацию о своих персональных данных.</li>
                            <li class="mb-2">Требовать их уточнения, блокирования или удаления.</li>
                            <li class="mb-2">Отозвать согласие на обработку персональных данных.</li>
                        </ul>
                        <p class="text-white/60 mb-4">7.2. Для реализации своих прав Пользователь может направить запрос на email: nastya.aleinowa@yandex.ru.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="8">8. Изменение Политики</h4>
                        <p class="text-white/60 mb-4">8.1. Исполнитель имеет право изменять настоящую Политику. Новая редакция вступает в силу с момента её размещения на Сайте.</p>
                        <p class="text-white/60 mb-4">8.2. Пользователь обязуется самостоятельно отслеживать изменения Политики.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="9">9. Контакты</h4>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li class="mb-2">ФИО: Милова Анастасия Викторовна</li>
                            <li class="mb-2">Статус: Самозанятый</li>
                            <li class="mb-2">ИНН: 631226729272</li>
                            <li class="mb-2">Email: nastya.aleinowa@yandex.ru</li>
                            <li class="mb-2">Сайт: <a class="text-white underline" href="{{ route('main') }}">https://milova.website</a></li>
                        </ul>
                    </div>

                    {{-- Кнопка --}}
                    <div class="flex justify-center sm:justify-end pt-4">
                        <a href="{{ route('newOrder') }}"
                           class="rounded-lg text-black px-4 md:px-5 py-2 bg-[#9f7e51] text-sm md:text-sm text-center transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                            &#8592; Вернуться к оформлению заказа
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
