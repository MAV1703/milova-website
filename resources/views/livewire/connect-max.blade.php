<div class="rounded-xl p-[1px] bg-gradient-to-l from-[#494338] to-[#111111]/60">
    <div class="bg-[#0f0e0c]/80 rounded-lg px-3 sm:px-6">

        {{-- КЛИЕНТ --}}
        @if(auth()->user()->status != 'admin')

    {{-- Уже подключён --}}
    @if($orderAuthor->max_user_id != null)
        <div class="flex gap-3 sm:gap-4 items-center py-3 sm:py-4">
            <button wire:click="deleteMaxId"
                    class="rounded-lg text-black px-3 py-2 bg-[#9f7e51] text-sm sm:text-base transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                Отключить уведомления
            </button>
        </div>

    {{-- Ожидание подтверждения от админа --}}
    @elseif($waiting)
        <div class="py-3 sm:py-4">
            <p class="text-sm sm:text-base text-[#9f7e51]">
                Вы запросили уведомления в MAX. Ожидайте подтверждения.
            </p>
        </div>

    {{-- Код показан — ждём действия от клиента --}}
    @elseif($chatingOrder->max_link_code)
        <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 items-start py-3 sm:py-4">
            <p class="text-sm sm:text-base">Скопируйте код:</p>

            <div class="flex flex-wrap items-center gap-2 sm:gap-3 w-full sm:w-auto">
                <span x-data="{ copied: false }"
                      @click="navigator.clipboard.writeText('{{ $chatingOrder->max_link_code }}');
                              copied = true;
                              setTimeout(() => copied = false, 2000);"
                      class="font-mono text-[#9f7e51] text-base sm:text-lg border border-[#9f7e51] px-2 py-1 rounded-lg cursor-pointer hover:bg-[#9f7e51]/10 transition-colors">
                    {{ $chatingOrder->max_link_code }}
                    <span x-show="copied" x-transition class="text-xs ml-2 text-[#9f7e51]/70">Скопировано</span>
                </span>

                <span class="text-sm sm:text-base">и пришлите его боту:</span>

                <a href="https://max.ru/se14397030_bot" target="_blank"
                   class="text-[#9f7e51] text-sm sm:text-base transition-colors duration-300 hover:text-[#7f511f] underline">
                    открыть чат с ботом
                </a>
            </div>
        </div>

        {{-- Кнопка «Я отправил боту» --}}
        <div class="flex py-3 sm:py-4">
            <button wire:click="markAsSent"
                    class="rounded-lg text-black px-3 py-2 bg-[#9f7e51] text-sm sm:text-base transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                Я отправил код боту
            </button>
        </div>

    {{-- Ещё не нажал кнопку «Подключить» --}}
    @else
        <div class="flex gap-3 sm:gap-4 items-center py-3 sm:py-4">
            <button wire:click="generate"
                    class="rounded-lg text-black px-3 py-2 bg-[#9f7e51] text-sm sm:text-base transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                Получать уведомления в MAX
            </button>
        </div>
    @endif

        {{-- АДМИН --}}
        @elseif(auth()->user()->status == 'admin')

            @if($orderAuthor->max_user_id)
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 items-start sm:items-center py-3 sm:py-4">
                    <p class="text-green-400 text-sm sm:text-base">Клиент подключён к MAX</p>
                    <button wire:click="deleteMaxId"
                            class="rounded-lg text-black px-3 py-2 bg-[#9f7e51] text-sm sm:text-base transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                        Отключить уведомления
                    </button>
                </div>

            @elseif($chatingOrder->max_link_code)
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 items-start py-3 sm:py-4">
                    <p class="text-sm sm:text-base">
                        Клиент запросил подключение. Код:
                        <span class="font-mono text-[#9f7e51] text-base sm:text-lg">{{ $chatingOrder->max_link_code }}</span>
                    </p>
                    <button wire:click="confirm"
                            class="rounded-lg text-black px-3 py-2 bg-[#9f7e51] text-sm sm:text-base transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                        Подтвердить подключение
                    </button>
                </div>
                @error('confirm')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            @endif

        @endif
    </div>
</div>