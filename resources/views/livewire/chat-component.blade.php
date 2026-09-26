<div>
    @if($conversation)
        <livewire:chat-box :conversation="$conversation" />
    @else
        <p class="text-gray-400">Чат недоступен</p>
    @endif
</div>
