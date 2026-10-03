<div>
	@if($chatingOrder->is_canceled == false)
		<button wire:click="canceleToggle" class="border border-white rounded-lg px-3 py-2 text-sm transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">Отменить заказ</button>
	@elseif($chatingOrder->is_canceled == true)
		<p class="mb-2 text-sm text-[#a89983] text-center">Заказ отменён</p>
		<button wire:click="canceleToggle" class="border border-white rounded-lg px-3 py-2 text-sm transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">Вернуть в работу</button>
	@endif
</div>

