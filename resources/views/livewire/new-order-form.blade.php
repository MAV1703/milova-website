<div>
    <h1 class="text-white mt-20 md:mt-40 text-2xl md:text-4xl px-4 md:px-0">Оформление заказа</h1>
	<p class="text-gray-400 mt-6 md:mt-10 text-sm md:text-base px-4 md:px-0">
        Расскажите о вашем проекте, и я предложу индивидуальное решение.<br>
        Заполните форму ниже, чтобы начать работу
    </p>

    {{-- Контейнер формы --}}
    <div class="rounded-lg p-[1px] bg-gradient-to-l from-[#494338] to-[#111111] text-white mt-6 md:mt-10 mr-0 md:mr-6">
        <div class="bg-[#161616] rounded-lg p-4 md:p-6">
            <form wire:submit="makeOrder" method="" action="" class="p-2 md:p-4 flex flex-col gap-6 md:gap-10 mt-2">
                @csrf

                {{-- Название --}}
                <div>
                    <h3 class="mt-2 md:mt-4 text-sm md:text-base">Как будет называться ваш сайт?</h3>
                    <div class="rounded-lg p-[2px] bg-gradient-to-l from-[#494338] to-[#111111] text-white mt-4 md:mt-6">
                        <textarea wire:model.live="name" maxlength="100"
                                  placeholder="Предложите варианты или опишите идею"
                                  class="bg-[#1d1d1d] rounded-lg p-3 md:p-6 w-full border-[#494338] focus:outline-none focus:ring-0 focus:border-[#9f7e51] text-sm md:text-base"></textarea>
                    </div>
                    <div style="width: calc({{ mb_strlen((string)$this->name ?? '') / 100 * 100 }}%)" @class(["mt-2 h-1 rounded overflow-hidden transition-all duration-200",
						'bg-gradient-to-l from-[#7f511f] to-[#9f7e51]' => mb_strlen($this->name) > 1 && mb_strlen($this->name) < 100,
						'bg-gradient-to-r from-[#9f7e51] to-[darkred]' => mb_strlen($this->name) == 100])>
					</div>
                </div>

                {{-- Описание --}}
                <div>
                    <h3 class="mt-4 md:mt-6 text-sm md:text-base">Опишите вашу задачу<span class="text-[#9f7e51]"> *</span></h3>
                    <div class="rounded-lg p-[2px] bg-gradient-to-l from-[#494338] to-[#111111] text-white mt-4 md:mt-6">
                        <textarea wire:model.live="description" maxlength="1000"
                                  class="bg-[#1d1d1d] rounded-lg p-3 md:p-6 w-full h-32 md:h-40 border-[#494338] focus:outline-none focus:ring-0 focus:border-[#9f7e51] text-sm md:text-base"
                                  placeholder="Расскажите о вашем сайте, его целях и задачах"></textarea>
                    </div>
                    <div style="width: calc({{ mb_strlen((string)$this->description ?? '') / 1000 * 100 }}%)"
						@class(["mt-2 h-1 rounded overflow-hidden transition-all duration-200",
						'bg-gradient-to-l from-[#7f511f] to-[#9f7e51]' => mb_strlen($this->description) > 1 && mb_strlen($this->description) < 1000,
						'bg-gradient-to-r from-[#9f7e51] to-[darkred]' => mb_strlen($this->description) == 1000])>
					</div>
                    @error('description')
                        <span class="text-sm text-[darkred] mt-2 md:mt-4 block">Опишите задачу хотя бы в двух словах</span>
                    @enderror
                </div>

                {{-- Файлы --}}
                <div>
                    <h3 class="mt-4 md:mt-6 mb-4 md:mb-6 text-sm md:text-base">Приложите файлы</h3>
                    <livewire:dropzone wire:model="files" :multiple="true"
                                       :rules="['file', 'mimes:jpeg,png,pdf,doc,docx', 'max:5120']"
                                       browse-class="opacity-0 absolute w-px h-px"></livewire:dropzone>
                </div>

                {{-- Телефон --}}
                <div>
                    <label class="block text-sm md:text-base">Телефон для связи<span class="text-[#9f7e51]"> *</span>
                        <div class="flex items-center gap-1 mt-2 md:mt-4">
                            <span>+</span>
                            <input wire:model.live="phone" placeholder="79999999999" maxlength="11"
                                   class="p-3 rounded-lg bg-[#1d1d1d] h-[40px] border-[#494338] focus:outline-none focus:ring-0 focus:border-[#9f7e51] w-full text-sm md:text-base">
                        </div>
                    </label>
                    <div style="width: calc({{ mb_strlen((string)$this->phone ?? '') / 11 * 100 }}%)"
						@class(["mt-2 h-1 rounded overflow-hidden transition-all duration-200",
						'bg-gradient-to-l from-[#7f511f] to-[#9f7e51]' => mb_strlen($this->phone) > 1 && mb_strlen($this->phone) < 11,
						'bg-gradient-to-r from-[#9f7e51] to-[darkred]' => mb_strlen($this->phone) == 11])>
					</div>
                    @error('phone')
                        <span class="text-sm text-[darkred] mt-2 block">Пожалуйста, укажите номер для связи: 11 цифр</span>
                    @enderror
                </div>

                {{-- Примечания --}}
                <div>
                    <h3 class="mt-4 md:mt-10 text-sm md:text-base">Примечания по способу связи, срокам завершения проекта и другие пожелания</h3>
                    <div class="rounded-lg p-[2px] bg-gradient-to-l from-[#494338] to-[#111111] text-white mt-4 md:mt-6">
                        <textarea wire:model.live="notes"
                                  class="bg-[#1d1d1d] rounded-lg p-3 md:p-6 w-full h-20 border-[#494338] focus:outline-none focus:ring-0 focus:border-[#9f7e51] text-sm md:text-base"
                                  placeholder="Что мне нужно учесть в работе?"></textarea>
                    </div>
                    <div style="width: calc({{ mb_strlen((string)$this->notes ?? '') / 1000 * 100 }}%)"
                         @class(["mt-2 hidden sm:block h-1 w-16 rounded overflow-hidden",
                                 'bg-gradient-to-l from-[#7f511f] to-[#9f7e51]' => mb_strlen($this->notes) > 1 && mb_strlen($this->notes) < 1000,
                                 'bg-gradient-to-r from-[#9f7e51] to-[darkred]' => mb_strlen($this->notes) == 1000])>
                    </div>
                </div>

                {{-- Чекбоксы --}}
                <div class="flex flex-col gap-2 md:gap-4">
                    <label class="flex items-start text-sm md:text-base gap-2">
                        <input type="checkbox"
                               class="m-1 bg-[#1d1d1d] rounded-md text-[#494338] w-5 h-5 border-[#494338] transition-all duration-100 focus:border-transparent focus:ring-0 focus:outline-none flex-shrink-0"
                               required>
                        <span>Я принимаю <a href="{{ route('publicOffer') }}" class="text-[#9f7e51] underline">условия публичной оферты</a><span class="text-[#9f7e51]">*</span></span>
                    </label>
                    <label class="flex items-start text-sm md:text-base gap-2">
                        <input type="checkbox"
                               class="m-1 bg-[#1d1d1d] rounded-md text-[#494338] w-5 h-5 border-[#494338] transition-all duration-100 focus:border-transparent focus:ring-0 focus:outline-none flex-shrink-0"
                               required>
                        <span>Я соглашаюсь с <a href="{{ route('privacy') }}" class="text-[#9f7e51] underline">политикой конфиденциальности</a><span class="text-[#9f7e51]">*</span></span>
                    </label>
                </div>

                {{-- Кнопки --}}
                <div class="flex flex-col-reverse sm:flex-row justify-between gap-3 md:gap-4 mt-6 md:mt-10 items-stretch">
                    <a href="javascript:history.back()"
                       class="block text-center px-4 py-2 border border-white rounded-lg transition-all duration-200 hover:bg-gradient-to-l hover:from-[#7f511f] hover:to-[#9f7e51] text-sm md:text-base">
                        &larr; Назад
                    </a>
                    <button type="submit"
                            @click="window.scrollTo({ top: document.body.scrollHeight / 3, behavior: 'smooth' })"
                            class="rounded-lg text-black px-4 py-2 bg-[#9f7e51] text-sm md:text-lg transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                        Оформить заказ &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>