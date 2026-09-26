<div class="px-2 sm:px-4 lg:px-10">
    <div style="background-image: url('{{ asset('images/chat3.jpeg') }}');"
         class="bg-no-repeat bg-center bg-cover flex flex-col lg:flex-row items-start mt-24 lg:mt-40 px-4 sm:px-6 lg:px-20">
		
        {{-- Список заказов --}}
        <div class="{{ $showChatOnMobile ? 'hidden lg:block' : 'block' }} w-full lg:w-1/3 lg:pr-2">
            <livewire:order-list :orders="$orders" :chatingOrder="$chatingOrder" :filtered="$filtered" />
        </div>

        {{-- Управление и чат --}}
        <div class="{{ $showChatOnMobile ? 'block' : 'hidden lg:block' }} w-full lg:w-2/3 lg:pl-2 rounded-xl p-[2px] bg-gradient-to-l from-[#494338] to-[#111111]/60 text-white">
            <div class="bg-[#0f0e0c]/80 rounded-lg px-4 sm:px-6">

					<div class="flex items-center gap-2">
						{{-- Кнопка «Назад / К списку» --}}
						<button
							onclick="if (window.innerWidth >= 1024) { window.history.back(); } else { Livewire.dispatch('close-chat-on-mobile'); }"
							class="h-10 w-10 lg:h-12 lg:w-12 bg-[#151515] border-1 border-[#494338] text-lg rounded-lg flex items-center justify-center cursor-pointer hover:bg-[#222] transition">
							<span class="text-xl lg:text-2xl font-bold">&#8592;</span>
						</button>

						{{-- Кнопка «На главную» — только мобилка/планшет --}}
						<a href="{{ route('main') }}"
						class="lg:hidden h-10 w-10 bg-[#151515] border-1 border-[#494338] text-lg rounded-lg flex items-center justify-center cursor-pointer hover:bg-[#222] transition">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
								<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
							</svg>
						</a>
					</div>
                <div>
                    @if($chatingOrder->status_id !== 1)
                        <livewire:order-managing :chatingOrder="$chatingOrder" />
                    @endif
                    @if($chatingOrder->status_id != 1)
                        <h2 class="my-4 lg:my-6 font-semibold">Чат заказа №{{ $chatingOrder->id }}:</h2>
                    @else
                        @if(auth()->user()->status == 'admin')
                            <h2 class="p-4 font-semibold">Чат c клиентом:</h2>
                        @else
                            <h2 class="p-4 font-semibold">Чат c веб-мастером:</h2>
                        @endif
                    @endif
                </div>

                <div x-data
                     x-init="$nextTick(() => { $el.scrollTop = $el.scrollHeight; })"
                     x-on:chat:new-message.window="$nextTick(() => { $el.scrollTop = $el.scrollHeight; })"
                     class="h-[50vh] overflow-y-auto"
                     style="scrollbar-width: thin; scrollbar-color: #9f7e51 #1d1d1d;">
                    <livewire:chat-component :conversationId="$chatingOrder->conversation_id" />
                </div>

                <livewire:connect-max :chatingOrder="$chatingOrder" :orderAuthor="$orderAuthor" />
            </div>
        </div>
    </div>
</div>