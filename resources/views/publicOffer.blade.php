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
                <h1 class="text-white text-base sm:text-lg lg:text-xl xl:text-2xl whitespace-nowrap">Договор публичной оферты</h1>
                <p class="hidden lg:block mt-3 md:mt-4 text-white/60 text-sm md:text-base">Ознакомьтесь с условиями нашего сотрудничества</p>

                <div class="rounded-xl p-[2px] bg-gradient-to-l from-[#494338] to-[#111111]/50 text-white w-full sm:w-3/5 lg:w-auto min-w-0 lg:min-w-[280px] mt-3 md:mt-4">
                    <div class="h-full bg-[#0f0e0c]/70 rounded-lg p-4">
                        <h4 class="text-sm md:text-base">Что вы здесь найдёте:</h4>
                        <ul>
                            @php
                                $items = [
                                    '1' => 'Общие положения',
                                    '2' => 'Предмет Оферты',
                                    '3' => 'Порядок работы',
                                    '4' => 'Стоимость и порядок оплаты',
                                    '5' => 'Согласование и правки',
                                    '6' => 'Порядок сдачи-приёмки работ',
                                    '7' => 'Права на размещение ссылок',
                                    '8' => 'Авторские и смежные права',
                                    '9' => 'Ответственность и форс-мажор',
                                    '10' => 'Разрешение споров',
                                    '11' => 'Прочие условия',
                                    '12' => 'Реквизиты Исполнителя',
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

            {{-- Правая колонка: договор --}}
            <div class="rounded-xl p-[2px] bg-gradient-to-l from-[#494338] to-[#111111]/40 text-white min-w-0 lg:min-w-[280px] w-full lg:flex-1 lg:ml-10">
                <div class="h-full bg-[#0f0e0c]/60 rounded-lg p-4 md:p-6 lg:pr-12 xl:pr-[100px]">

                    {{-- Заголовок --}}
					
                    <div class="flex gap-2 md:gap-4 justify-center items-center">
                        <div class="h-[2px] w-12 sm:w-24 md:w-36 bg-gradient-to-r from-transparent to-[#9f7e51]"></div>
                        <h2 class="font-semibold my-2 text-sm md:text-lg whitespace-nowrap">ПУБЛИЧНАЯ ОФЕРТА</h2>
                        <div class="h-[2px] w-12 sm:w-24 md:w-36 bg-gradient-to-l from-transparent to-[#9f7e51]"></div>
                    </div>
                    <p class="text-center mt-2 text-sm md:text-base">на оказание услуг по разработке веб-сайтов</p>
                    <p class="my-4 text-white/60 text-sm md:text-base">Дата публикации: 14.09.2026</p>

                    {{-- Тело договора --}}
                    <div class="text-justify text-sm md:text-base">

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="1">1. Общие положения</h4>
                        <p class="text-white/60 mb-4">1.1. Настоящий документ является публичной офертой (далее — «Оферта») Миловой Анастасии Викторовны, зарегистрированной в качестве плательщика налога на профессиональный доход (самозанятого), именуемого в дальнейшем «Исполнитель», и адресован неопределённому кругу лиц (далее — «Заказчик»).</p>
                        <p class="text-white/60 mb-4">1.2. В соответствии с п. 2 ст. 437 ГК РФ настоящая Оферта является публичной.</p>
                        <p class="text-white/60 mb-4">1.3. Оферта размещена на Сайте Исполнителя по адресу: https://milova.website и действует до момента её отзыва.</p>
                        <p class="text-white/60 mb-4">1.4. Акцептом Оферты (полным и безоговорочным принятием условий) является совершение Заказчиком любого из следующих действий:</p>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li>оплата услуг Исполнителя;</li>
                            <li>отправка заявки через форму на Сайте;</li>
                            <li>проставление галочки согласия с условиями Оферты.</li>
                        </ul>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="2">2. Предмет Оферты</h4>
                        <p class="text-white/60 mb-4">2.1. Исполнитель обязуется по заданию Заказчика оказать услуги по разработке, созданию и/или доработке веб-сайтов, а Заказчик обязуется принять и оплатить эти услуги.</p>
                        <p class="text-white/60 mb-4">2.2. Конкретный перечень, объём, сроки и стоимость услуг согласовываются Сторонами в переписке (по электронной почте, в мессенджере или в чате на Сайте).</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="3">3. Порядок работы</h4>
                        <p class="text-white/60 mb-4">3.1. Стороны согласовывают функционал, стоимость, и дизайн будущего сайта и сроки выполнения заказа.</p>
                        <p class="text-white/60 mb-4">3.2. После достижения соглашения Заказчик вносит предоплату в размере 50% от общей стоимости.</p>
                        <p class="text-white/60 mb-4">3.3. Исполнитель приступает к работе.</p>
                        <p class="text-white/60 mb-4">3.4. По готовности Исполнитель демонстрирует результат Заказчику на тестовом хостинге или через демонстрацию экрана.</p>
                        <p class="text-white/60 mb-4">3.5. Стороны обсуждают возможные правки, Исполнитель дорабатывает проект сайта.</p>
                        <p class="text-white/60 mb-4">3.5. Заказчик вносит остаток оплаты (50%).</p>
                        <p class="text-white/60 mb-4">3.6. Исполнитель выполняет деплой сайта на хостинг Заказчика.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="4">4. Стоимость и порядок оплаты</h4>
                        <p class="text-white/60 mb-4">4.1. Стоимость услуг определяется Сторонами индивидуально, согласовывается в переписке и/или в коммерческом предложении.</p>
                        <p class="text-white/60 mb-4">4.2. Оплата производится в российских рублях путём перевода на банковскую карту Исполнителя или иным способом, согласованным Сторонами.</p>
                        <p class="text-white/60 mb-4">4.3. Работа выполняется по предоплате 50%. Остаток оплачивается после согласования и приёмки работы.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="5">5. Согласование и правки</h4>
                        <p class="text-white/60 mb-4">5.1. Этап согласования и правок входит в стоимость услуг.</p>
                        <p class="text-white/60 mb-4">5.2. Количество итераций правок в рамках согласованного технического задания — до 3. Дополнительные правки, а также изменения объёма работ, не предусмотренные ТЗ, согласовываются Сторонами отдельно и оплачиваются дополнительно.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="6">6. Порядок сдачи-приёмки работ</h4>
                        <p class="text-white/60 mb-4">6.1. По завершении работ Исполнитель уведомляет Заказчика о готовности результата.</p>
                        <p class="text-white/60 mb-4">6.2. Заказчик обязуется в течение 3 рабочих дней с момента получения результата направить Исполнителю замечания (при наличии) или подтвердить, что работа принята.</p>
                        <p class="text-white/60 mb-4">6.3. В случае отсутствия мотивированного отказа в указанный срок результат работ считается принятым Заказчиком.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="7">7. Права на размещение ссылок</h4>
                        <p class="text-white/60 mb-4">7.1. Исполнитель имеет право разместить ссылку на сайт Заказчика в своём портфолио и на своём сайте.</p>
                        <p class="text-white/60 mb-4">7.2. Заказчик соглашается указать ссылку на сайт Исполнителя на своём сайте (в футере или разделе «Разработчик»).</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="8">8. Авторские и смежные права</h4>
                        <p class="text-white/60 mb-4">8.1. Исключительные права на исходные макеты, шаблоны, скрипты и другие материалы, созданные Исполнителем в ходе выполнения заказа, принадлежат Исполнителю до момента полной оплаты оказанных услуг.</p>
                        <p class="text-white/60 mb-4">8.2. После полной оплаты права на результаты работы переходят к Заказчику в объёме, необходимом для использования Сайта.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="9">9. Ответственность и форс-мажор</h4>
                        <p class="text-white/60 mb-4">9.1. За неисполнение или ненадлежащее исполнение обязательств по Договору Стороны несут ответственность в соответствии с действующим законодательством РФ.</p>
                        <p class="text-white/60 mb-4">9.2. Стороны освобождаются от ответственности за неисполнение обязательств, если оно вызвано действием обстоятельств непреодолимой силы (форс-мажор).</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="10">10. Разрешение споров</h4>
                        <p class="text-white/60 mb-4">10.1. Все споры и разногласия решаются путём переписки.</p>
                        <p class="text-white/60 mb-4">10.2. При невозможности достижения согласия — в судебном порядке по месту нахождения Исполнителя.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="11">11. Прочие условия</h4>
                        <p class="text-white/60 mb-4">11.1. Все уведомления и документы направляются по электронной почте или в мессенджерах и признаются Сторонами имеющими юридическую силу.</p>

                        <h4 class="font-semibold my-4 text-base md:text-lg" id="12">12. Реквизиты Исполнителя</h4>
                        <ul class="text-white/60 mb-4 list-disc list-inside ml-4">
                            <li class="mb-2">ФИО: Милова Анастасия Викторовна</li>
                            <li class="mb-2">Статус: Самозанятый</li>
                            <li class="mb-2">ИНН: 631226729272</li>
                            <li class="mb-2">Email: nastya.aleinowa@yandex.ru</li>
                        </ul>
                    </div>

                    {{-- Кнопки --}}
                    <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-between pt-4">
						<a href="{{ asset('public-offer.pdf') }}" download
						class="px-4 flex gap-2 items-center justify-center py-2 border border-white rounded-lg transition-all duration-200 hover:bg-gradient-to-l hover:from-[#7f511f] hover:to-[#9f7e51] text-sm md:text-sm">
							<img src="{{ asset('/images/download.png') }}" class="w-5 md:w-5" alt="">
							<span>Скачать договор (PDF)</span>
						</a>
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