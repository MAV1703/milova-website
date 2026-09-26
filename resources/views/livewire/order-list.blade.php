<div class="rounded-xl p-[2px] ... w-full lg:w-auto lg:m-4 flex-shrink-0">
    <div class="flex flex-col h-auto lg:h-[100vh] bg-[#0f0e0c]/80 rounded-lg px-3 sm:px-6">

        <h2 class="font-semibold text-white text-lg sm:text-xl px-4 py-6">Мои заказы:</h2>

        @if($orders)
            @if(auth()->user()->status != 'guest')
                {{-- Фильтр --}}
                <div x-data="{open:false}" class="mb-2">
                    <div class="rounded-xl p-[1px] bg-gradient-to-l from-[#494338] to-[#111111] text-white w-full cursor-pointer">
                        <div @click="open = !open" class="h-full bg-[#1d1a15]/100 rounded-lg flex justify-between items-center">
                            <p class="p-2 text-sm sm:text-base">
                                @if($this->filter == 'active') Активные
                                @elseif($this->filter == 'completed') Завершённые
                                @else Все
                                @endif
                            </p>
                            <p class="text-xs p-2">&#9660;</p>
                        </div>
                    </div>
                    <div x-show="open" @click.outside="open = false" x-transition
                         class="rounded-xl p-[1px] bg-gradient-to-l from-[#494338] to-[#111111] text-white w-full mt-2">
                        <div wire:click="filterOrders('all')" @click="open = false" class="flex gap-2 items-center bg-[#161616] p-2 cursor-pointer">
                            <img class="w-4 h-4" src="{{asset('/images/doc1.png')}}" alt="..."><p class="text-sm">Все</p>
                        </div>
                        <div wire:click="filterOrders('active')" @click="open = false" class="flex gap-2 items-center bg-[#161616] p-2 cursor-pointer">
                            <img class="w-4 h-4" src="{{asset('/images/watches.png')}}" alt="..."><p class="text-sm">Активные</p>
                        </div>
                        <div wire:click="filterOrders('completed')" @click="open = false" class="flex gap-2 items-center bg-[#161616] p-2 cursor-pointer">
                            <img class="w-4 h-4" src="{{asset('/images/tick.png')}}" alt="..."><p class="text-sm">Завершённые</p>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Список заказов --}}
            <div class="max-h-[60vh] overflow-y-auto" style="scrollbar-width: thin; scrollbar-color: #9f7e51 #1d1d1d;">
                @if($filtered == false)
                    @foreach($orders as $order)
                        <a href="{{ route('orders', ['order' => $order->id, 'openChat' => 1]) }}" wire:navigate class="block">
                            <livewire:order-in-list :order="$order" :chatingOrder="$chatingOrder" />
                        </a>
                    @endforeach
                @elseif($filtered == true)
                    @foreach($filteredOrders as $order)
                        <a href="{{ route('orders', ['order' => $order->id, 'openChat' => 1]) }}" wire:navigate class="block">
                            <livewire:order-in-list :order="$order" :chatingOrder="$chatingOrder" />
                        </a>
                    @endforeach
                @endif

                @if($orders->count() == 1 && $orders->first()->status_id == 1)
                    <div class="text-center flex flex-col justify-center mt-10 md:mt-20">
                        <img src="{{ asset('/images/pencil.png') }}" class="w-[20%] mx-auto" alt="...">
                        <h3 class="font-semibold text-base md:text-lg m-6">У вас пока нет заказов</h3>
                        <p class="text-sm md:text-base">Когда вы создадите заказ,<br>он появится здесь</p>
                        <a href="{{ route('newOrder') }}"
                           class="rounded-lg my-4 mx-auto w-fit text-black px-3 py-2 bg-[#9f7e51] text-sm md:text-lg transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
                            Оформить заказ &rarr;
                        </a>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>