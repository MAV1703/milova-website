<x-app-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>

    <div class="px-2 sm:px-4 lg:px-10">
        <div style="background-image: url('{{ asset('images/chat3.jpeg') }}');" 
             class="bg-no-repeat bg-center bg-cover items-start mt-24 lg:mt-40 px-2 sm:px-4 lg:px-20 py-4">
            
			<div class="flex font-semibold text-white m-3 text-base sm:text-lg bg-[#111111]/80 p-2 rounded-lg gap-2 items-center">
				<a href="{{ route('orders', $order->id) }}" class="flex items-center justify-center w-8 h-8 sm:w-8 sm:h-8 rounded-lg bg-[#111111]/80 border-1 border-[#494338] text-white/80 text-xl sm:text-2xl transition hover:bg-[#9f7e51] hover:text-black active:scale-95">
                        &#8592;
                </a>
				<h1>
					Детали заказа №{{ $order->id }}
				</h1>
			</div>

            <div class="flex flex-col lg:flex-row gap-4">

                {{-- ЛЕВЫЙ БЛОК: данные заказа --}}
                <div class="rounded-xl p-[2px] w-full lg:w-1/2 bg-gradient-to-r from-[#494338] to-[#111111] text-white text-sm">
                    <div class="bg-[#111111]/80 rounded-xl h-full">
                        <div class="flex">
                            <h4 class="p-2 rounded-lg m-1">Дата создания:</h4>
                            <p class="p-2 rounded-lg m-1">{{ $order->created_at->format('d.m.Y') }}</p>
                        </div>
                        <div class="flex">
                            <h4 class="p-2 rounded-lg m-1">Пользователь:</h4>
                            <p class="p-2 rounded-lg m-1">{{ $order->user->name }}</p>
                        </div>
                        <div class="flex">
                            <h4 class="p-2 rounded-lg m-1">Телефон для связи:</h4>
                            <p class="p-2 rounded-lg m-1">{{ $order->phone }}</p>
                        </div>
                        <div class="flex">
                            <h4 class="p-2 rounded-lg m-1">Название проекта:</h4>
                            <p class="p-2 rounded-lg m-1">{{ $order->name }}</p>
                        </div>
                    </div>
                </div>

                {{-- ПРАВЫЙ БЛОК: описание и примечания --}}
                <div class="rounded-xl p-[2px] w-full lg:w-1/2 bg-gradient-to-r from-[#494338] to-[#111111] text-white text-sm">
                    <div class="bg-[#111111]/80 rounded-xl h-full p-4">
                        <h4 class="font-semibold mb-2">Описание проекта</h4>
                        <p class="mb-4 whitespace-pre-line">{{ $order->description ?: '—' }}</p>
                        
                        <h4 class="font-semibold mb-2">Примечания</h4>
                        <p class="whitespace-pre-line">{{ $order->notes ?: '—' }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>