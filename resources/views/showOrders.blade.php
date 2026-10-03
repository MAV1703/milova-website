<x-app-layout>
	<x-slot:title>
	{{ $title }}
	</x-slot>
	<livewire:chat-and-orders :orders="$orders" :chatingOrder="$chatingOrder" :filtered="$filtered" />
</x-app-layout>
