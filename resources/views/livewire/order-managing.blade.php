<div class="p-3 sm:p-4 lg:p-6">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3 lg:gap-0 lg:px-6">
        <div class="flex items-center gap-3 lg:gap-4">
            <div class="min-w-0 flex-1">
                <div class="flex flex-wrap gap-2 lg:gap-6 items-center">
                    <h3 class="font-semibold text-sm lg:text-base">Заказ №{{ $chatingOrder->id }}</h3>
					
					@if($chatingOrder->is_canceled == true)
						<p class="text-[10px] sm:text-xs px-2 py-1 rounded-lg bg-gradient-to-l from-[#921e1e]/40 to-[#b81c1c]/40 text-[#b81c1c]">Отменён</p>
					@else
                    <p @class(["text-[10px] sm:text-xs px-2 py-1 lg:px-4 lg:py-2 rounded-lg", 
                              "bg-gradient-to-l from-[#203d13]/40 to-[#31641a]/40 text-[#429e18]" => $chatingOrder->status_id == 4 || $chatingOrder->status_id == 7, 
                              "bg-gradient-to-l from-[#494338]/40 to-[#9f7e51]/40 text-[#9f7e51]" => $chatingOrder->status_id == 2 || $chatingOrder->status_id == 3 || $chatingOrder->status_id == 5 || $chatingOrder->status_id == 6])>
                        {{ $chatingOrder->status->status }}
                    </p>
					@endif
					
					@if($chatingOrder->status_id == 3  && auth()->user()->status == 'client'|| $chatingOrder->status_id == 6 && auth()->user()->status == 'client')
						<button class="rounded-lg text-black px-3 py-2 bg-[#9f7e51] text-md transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">Оплатить</button>
					@endif
                </div> 
            </div>
		
        </div>
		@if(auth()->user()->status == 'admin')
			<p class="text-xs lg:text-sm">Телефон клиента: {{ $chatingOrder->phone }}</p>
		@endif
			 
    </div>
	<!--Отображение вложений-->
	@if(!empty($chatingOrder->files))
		<div class="flex flex-wrap rounded-lg bg-[#111111] p-2 gap-4 mx-auto">
			@foreach($chatingOrder->files as $file)
				<div class="rounded-xl p-[1px] bg-gradient-to-l from-[#494338] to-[#111111]">
					<div class="rounded-xl bg-[#151515] p-2 flex gap-1">
						<img src="{{ asset('/images/doc1.png') }}" class="w-4 h-4 items-center">
						<a class="text-xs" href="{{ asset('/storage/' . $file->path) }}" download>{{ Str::limit($file->name, 15) }}</a>
					</div>
				</div>
			@endforeach
		</div>
	@endif
	<!--Отображение прогресса, смена статусов-->
	@php
    $statuses = [
        1 => 'Черновик',
        2 => 'Согласование заказа',
        3 => 'Ожидает оплаты',
        4 => 'В работе',
        5 => 'Согласование и правки',
        6 => 'Ожидает оплаты',
        7 => 'Выполнен',
    ];
    $current = $chatingOrder->status_id;
    $currentName = $statuses[$current] ?? '—';
@endphp

<div class="mt-4">
    {{-- Мобилка: компактная версия --}}
    <div class="lg:hidden flex flex-col gap-2">
    {{-- Прогресс: на всю ширину --}}
    <div class="flex items-center gap-0 w-full">
        @for($i = 1; $i <= 6; $i++)
            {{-- Круг --}}
            <div @class([
                "w-3 h-3 sm:w-5 sm:h-5 rounded-full flex items-center justify-center flex-shrink-0",
                "bg-gradient-to-r from-[#849f51] to-[#84994d]" => $orderStatus >= ($i + 1) && $chatingOrder->is_canceled != true,
                "bg-[gray]/20" => $orderStatus < ($i + 1) || $chatingOrder->is_canceled == true,
            ])>
                <div class="bg-[#151515] w-1.5 h-1.5 sm:w-3 sm:h-3 rounded-full"></div>
            </div>

            {{-- Полоска: растягивается --}}
            @if($i < 6)
                <div @class([
                    "flex-1 h-[3px] sm:h-[4px]",
                    "bg-gradient-to-r from-[#84994d] to-[#839047]" => $orderStatus >= ($i + 2) && $chatingOrder->is_canceled != true,
                    "bg-[gray]/20" => $orderStatus < ($i + 2) || $chatingOrder->is_canceled == true,
                ])></div>
            @endif
        @endfor
    </div>

    {{-- Надпись "Этап N/6" под прогрессом --}}
    <p class="text-xs text-gray-400 text-center">
        Этап {{ $current > 0 ? $current - 1 : 0 }}/6
    </p>
</div>

    {{-- Десктоп: как было --}}
<div class="hidden lg:flex flex-col gap-2 justify-center">
    <div class="flex items-center justify-center gap-4">
        @if(auth()->user()->status == 'admin')
            <p wire:click="changeStatus('back')" class="text-xl p-2 border-[#494338] cursor-pointer bg-[gray]/20 rounded-lg w-8 h-8 flex justify-center items-center hover:bg-[#494338] transition">&#8592;</p>
        @endif

        <div class="flex items-center justify-center">
            <div class="flex items-center justify-center">
				{{-- Внешний круг 1 --}}
				<div @class(["bg-[gray]/20 w-6 h-6 rounded-full flex items-center justify-center", "bg-gradient-to-r from-[#849f51] to-[#84994d]" => $orderStatus >= 2 && $chatingOrder->is_canceled != true])>
					<div class="bg-[#151515] w-4 h-4 rounded-full"></div>
				</div>
				<div @class(["w-20 h-1 bg-[gray]/20 ml-[-2px]", "bg-gradient-to-r from-[#84994d] to-[#839047]" => $orderStatus >= 3 && $chatingOrder->is_canceled != true])></div>

				{{-- Круг 2 --}}
				<div @class(["bg-[gray]/20 w-6 h-6 rounded-full flex items-center justify-center", "bg-gradient-to-r from-[#839047] to-[#838943]" => $orderStatus >= 3 && $chatingOrder->is_canceled != true])>
					<div class="bg-[#151515] w-4 h-4 rounded-full"></div>
				</div>
				<div @class(["bg-[gray]/20 w-20 h-1 ml-[-2px]", "bg-gradient-to-r from-[#838943] to-[#838943]" => $orderStatus >= 4 && $chatingOrder->is_canceled != true])></div>

				{{-- Круг 3 --}}
				<div @class(["bg-[gray]/20 w-6 h-6 rounded-full flex items-center justify-center", "bg-gradient-to-r from-[#838943] to-[#82803d]" => $orderStatus >= 4 && $chatingOrder->is_canceled != true])>
					<div class="bg-[#151515] w-4 h-4 rounded-full"></div>
				</div>
				<div @class(["bg-[gray]/20 w-20 h-1 ml-[-2px]", "bg-gradient-to-r from-[#82803d] to-[#82803d]" => $orderStatus >= 5 && $chatingOrder->is_canceled != true])></div>

				{{-- Круг 4 --}}
				<div @class(["bg-[gray]/20 w-6 h-6 rounded-full flex items-center justify-center", "bg-gradient-to-r from-[#82803d] to-[#817838]" => $orderStatus >= 5 && $chatingOrder->is_canceled != true])>
					<div class="bg-[#151515] w-4 h-4 rounded-full"></div>
				</div>
				<div @class(["bg-[gray]/20 w-20 h-1 ml-[-2px]", "bg-gradient-to-r from-[#817838] to-[#817436]" => $orderStatus >= 6 && $chatingOrder->is_canceled != true])></div>

				{{-- Круг 5 --}}
				<div @class(["bg-[gray]/20 w-6 h-6 rounded-full flex items-center justify-center", "bg-gradient-to-r from-[#817436] to-[#817436]" => $orderStatus >= 6 && $chatingOrder->is_canceled != true])>
					<div class="bg-[#151515] w-4 h-4 rounded-full"></div>
				</div>
				<div @class(["bg-[gray]/20 w-20 h-1 ml-[-2px]", "bg-gradient-to-r from-[#817436] to-[#7f521f]" => $orderStatus >= 7 && $chatingOrder->is_canceled != true])></div>

				{{-- Круг 6 --}}
				<div @class(["bg-[gray]/20 w-6 h-6 rounded-full flex items-center justify-center", "bg-gradient-to-r from-[#80672d] to-[#805b25]" => $orderStatus >= 7 && $chatingOrder->is_canceled != true])>
					<div class="bg-[#151515] w-4 h-4 rounded-full"></div>
				</div>
			</div>
        </div>

        @if(auth()->user()->status == 'admin')
            <p wire:click="changeStatus('forward')" class="text-xl p-2 border-[#494338] cursor-pointer bg-[gray]/20 rounded-lg w-8 h-8 flex justify-center items-center hover:bg-[#494338] transition">&#8594;</p>
        @endif
    </div>

    <div class="flex justify-center gap-4">
        <p class="text-xs text-gray-500 text-center w-20">Согласование заказа</p>
        <p class="text-xs text-gray-500 text-center w-20">Ожидает оплаты</p>
        <p class="text-xs text-gray-500 text-center w-20">В работе</p>
        <p class="text-xs text-gray-500 text-center w-20">Согласование и правки</p>
        <p class="text-xs text-gray-500 text-center w-20">Ожидает оплаты</p>
        <p class="text-xs text-gray-500 text-center w-20">Выполнен</p>
    </div>
</div>
</div>
		@if($chatingOrder->status_id != 2 && $chatingOrder->status_id != 5)
			<div class="rounded-xl p-[1px] bg-gradient-to-l from-[#494338] to-[#111111] mt-4">
				<div class="flex justify-center items-start gap-10 bg-[#151515] rounded-lg border-[#494338] p-4">
						<div class="mx-6">
							<p class="text-sm">Срок сдачи: <span class="text-[#9f7e51]">{{ $chatingOrder->deadline->format('d.m.Y') }}</span></p>
						</div class="mx-6">
						<div>
							<p class="text-sm">Сумма: <span class="text-[#9f7e51]">{{ $chatingOrder->price }} р.</span></p>
						</div>
						<div class="mx-6">
							<livewire:cancel-order :chatingOrder="$chatingOrder" />
						</div>
					</div>
				</div>
			</div>
		@elseif($chatingOrder->status_id == 2)
			@if(auth()->user()->status == 'admin')
			<div class="rounded-xl p-[1px] bg-gradient-to-l from-[#494338] to-[#111111] mt-4">
				<div class="bg-[#151515] rounded-lg border-[#494338] p-4">
					<p class="text-sm mb-3">Обсудите с клиентом сроки выполнения и стоимость заказа. </br>После достижения договорённостей утвердите условия через форму:</p>
						<form wire:submit = "setConditions" class="flex items-start justify-around" method="" action="">
							@csrf
							<div>
								<input 
								x-mask="99.99.9999" class="text-sm bg-transparent rounded-lg mb-3 focus:outline-none focus:ring-0 focus:border-[white]/60"
								wire:model="deadline"
								x-init="$watch('$wire.deadline', value => $el.value = value)"
								type="text"
								placeholder="ДД.ММ.ГГГГ">
								@error('deadline')
									<p class="text-xs text-[darkred] my-2">{{ $message }}</p>
								@enderror
							</div>	
							<div>
								<input wire:model="price" value="{{ $chatingOrder->price }}" class="text-sm bg-transparent rounded-lg mb-3 focus:outline-none focus:ring-0 focus:border-[white]/60" placeholder="Стоимость заказа">
								@error('price')
									<p class="text-xs text-[darkred] mb-2">{{ $message }}</p>
								@enderror
							</div>
							<button type="submit" class="rounded-lg text-white py-2 px-3 w-fit bg-transparent border border-[#9f7e51] text-sm transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">Утвердить</button>
						</form>
						<div class="bg-[#494338] h-[1px] w-[90%] mx-auto"></div>
						@if($chatingOrder->deadline && $chatingOrder->price)
							<p class="text-sm text-gray-400">Внимательно проверьте введённые данные. После выставления счёта их нельзя будет изменить</p>
						@endif
						<div class="flex px-10 mt-4 justify-between items-start">
						<div x-data="{ open: false }">
							<button 
								@click="open = true" 
								class="rounded-lg text-black px-3 py-2 bg-[#9f7e51] text-sm transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51] disabled:opacity-50 disabled:cursor-not-allowed" 
								@if(!$chatingOrder->price || !$chatingOrder->deadline || $chatingOrder->is_canceled == true) disabled @endif
							>
								Выставить счёт
							</button>
							<div 
								x-show="open"
								x-transition:enter="transition ease-out duration-200"
								x-transition:enter-start="opacity-0"
								x-transition:enter-end="opacity-100"
								x-transition:leave="transition ease-in duration-150"
								x-transition:leave-start="opacity-100"
								x-transition:leave-end="opacity-0"
								class="fixed inset-0 z-50 flex items-center justify-center bg-black/60"
								@click.self="open = false">
								<div 
									x-show="open"
									x-transition:enter="transition ease-out duration-200"
									x-transition:enter-start="opacity-0 scale-95"
									x-transition:enter-end="opacity-100 scale-100"
									class="bg-[#141414] border border-[#494338] rounded-xl p-6 max-w-md w-full mx-4">
									<h3 class="text-white text-lg font-semibold mb-4">Выставить счёт?</h3>
									<p class="text-gray-400 text-sm mb-6">
										Клиенту будет отправлена ссылка на оплату заказа №{{ $chatingOrder->id }} 
										на сумму {{ $chatingOrder->price }} ₽.
									</p>

									<div class="flex justify-end gap-3">
										<button 
											@click="open = false"
											class="rounded-lg text-gray-400 px-4 py-2 text-sm border border-gray-600 hover:bg-gray-800 transition">
											Отмена
										</button>
										<button 
											<!--@click="open = false; $wire.createInvoice()"-->
											class="rounded-lg text-black px-4 py-2 text-sm bg-[#9f7e51] hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51] transition">
											Подтвердить
										</button>
									</div>
							</div>
						</div>
					</div>

    <livewire:cancel-order :chatingOrder="$chatingOrder" />
</div>
			@endif
		@endif
		@if($chatingOrder->status_id == 5)
			<form class="my-4 flex justify-around items-start" action="" method="">
				@csrf
				<div>
					<input class="text-sm bg-transparent rounded-lg mb-3 focus:outline-none focus:ring-0 focus:border-[white]/60" placeholder="Остаток стоимости" value="{{ $chatingOrder->price/2 }}">
					<p class="text-sm mb-3 text-gray-400">Проверьте остаток суммы, прежде чем выставить счёт</p>
				</div>
				<button type="submit" class="rounded-lg text-black px-3 py-2 bg-[#9f7e51] text-sm transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51] disabled:opacity-50 disabled:cursor-not-allowed">Выставить счёт</button>
			</form>
		@endif