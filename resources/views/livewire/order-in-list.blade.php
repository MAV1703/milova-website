<div wire:poll.5s>
	@if($order->status_id != 1 || (auth()->user()->status == 'admin' && $messages->count()>0))
	<div @class(["relative rounded-xl p-[1px] text-white  m-2 cursor-pointer lg:transition-transform lg:duration-200 lg:hover:translate-x-[4px]", "bg-gradient-to-l from-[#203d13]/20 to-[#31641a]/20 border-[#31641a]"=>$order->id == $chatingOrder->id, "bg-gradient-to-l from-[#494338] to-[#111111]"=>$order->id != $chatingOrder->id]) >
		<div @class(["bg-[#141414] rounded-lg p-3 sm:p-4", "bg-transparent/10"=>$order->id == $chatingOrder->id])>
			<div class="flex gap-4 items-center">
					<p class="text-sm">Заказ №{{ $order->id }} </p>
					@if($order->is_canceled == true)
						<p class="text-xs px-4 py-2 rounded-lg mx-6 bg-gradient-to-l from-[#921e1e]/40 to-[#b81c1c]/40 text-[#b81c1c]">Отменён</p>
					@else
						<p @class(["text-xs px-2 py-2 rounded-lg mx-1", 
								"bg-gradient-to-l from-[#203d13]/40 to-[#31641a]/40 text-[#429e18]" => $order->status_id == 4 || $order->status_id == 7, 
								"bg-gradient-to-l from-[#494338]/40 to-[#9f7e51]/40 text-[#9f7e51]" => $order->status_id == 2 || $order->status_id == 3 || $order->status_id == 5 || $order->status_id == 6])>
							{{ $order->status->status }}
						</p>
					@endif
					<div class="flex gap-2 absolute right-[20px] bottom-[10px]">
					@if(auth()->user()->unreadCountIn($conversation)>0)
						<div class="text-[#31641a] ">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
							</svg>
						</div>	
					@endif
					@if(auth()->user()->status === 'admin' && $order->max_link_code && ! $order->user->max_user_id)
						<div class="text-[#7f511f]" title="Клиент запросил подключение MAX">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5">
								<path fill="#7f511f" fill-rule="evenodd" clip-rule="evenodd" d="M16 5C9.925 5 5 9.925 5 16c0 1.4.26 2.74.735 3.97L5 27l6.03-1.735A10.94 10.94 0 0 0 16 27c6.075 0 11-4.925 11-11S22.075 5 16 5zm0 4a7 7 0 1 1 0 14 7 7 0 0 1 0-14z"/>
							</svg>
						</div>
					@endif
					</div>
				</div>
				<p class="text-xs sm:text-sm mt-3 sm:mt-4 text-gray-200">{{ str($order->name)->limit(25) }}</p>
			</div>
		</div>
		@elseif(auth()->user()->status != 'admin')
			<div @class(["relative rounded-xl p-[1px] text-white  m-2 cursor-pointer lg:transition-transform lg:duration-200 lg:hover:translate-x-[4px]", "bg-gradient-to-l from-[#203d13]/20 to-[#31641a]/20 border-[#31641a]"=>$order->id == $chatingOrder->id, "bg-gradient-to-l from-[#494338] to-[#111111]"=>$order->id != $chatingOrder->id]) >
				<div @class(["bg-[#141414] rounded-lg p-3 sm:p-4 ", "bg-transparent/10"=>$order->id == $chatingOrder->id])>
					<div class="flex justify-between">
						<p class="text-xs sm:text-sm mt-2">Чат вне заказа</p>
					</div>
				@if(auth()->user()->unreadCountIn($conversation)>0)
					<div class="text-[#31641a] absolute right-[20px] top-[20px]">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
						</svg>
					</div>	
				@endif
				</div>
				@if($order->name)
					<p class="text-sm mt-4 text-gray-200">{{ $order->name }}</p>
				@endif
			</div>	
		@endif
</div>
			