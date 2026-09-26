<div class="rounded-xl p-[1px] bg-gradient-to-l from-[#494338] to-[#111111]">
<div class="flex flex-col h-full bg-[#151515]/80 text-white rounded-xl overflow-hidden">
    <div class="flex-1 overflow-y-auto p-4 space-y-6">
        @foreach($messages as $message)
            <div @class(["p-6 bg-[#0f0e0c]/80 rounded-lg", "bg-[#1d1a15]"=>$message->sender_id != auth()->id()])>
                <div @class(["flex items-center gap-2", "justify-end"=>auth()->id() == $message->sender_id])>
                    <strong class="text-[#9f7e51] text-sm">@if($message->sender_id == auth()->id()) Вы @else {{ $message->sender->name }} @endif</strong>
                    <small class="text-[#9f7e51]">{{ $message->created_at->format('H:i') }}</small>
                    @if($message->sender_id == auth()->id())
                        @if($message->readReceipts->isNotEmpty())
                            <div class="flex"><span class="text-[13px] text-[#9f7e51]">✓</span><span class="text-[13px] text-[#9f7e51] ml-[-5px] z-2">✓</span></div>
                        @else
                            <span class="text-[13px] text-[#9f7e51]">✓</span>
                        @endif
                    @endif
                </div>
                <p @class(["flex justify-end"=>auth()->id() == $message->sender_id])])>{{ $message->body }}</p>

                {{-- Вложения --}}
                @if($message->attachments->isNotEmpty())
                    <div @class(["mt-1 flex flex-wrap gap-2", "justify-end"=>auth()->id() == $message->sender_id])>
                        @foreach($message->attachments as $file)
                            <a href="{{ route('chat.attachment.download', $file->id) }}" target="_blank"
                               class="flex items-center gap-1 text-xs bg-[gray]/20 px-2 py-1 rounded-lg hover:bg-[gray]/40">
                                📎 {{ $file->original_name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div class="p-2 border-t border-[#494338]">
        {{-- Выбранные файлы --}}
        @if(!empty($tempFiles))
            <div class="flex flex-wrap gap-2 p-2">
                @foreach($tempFiles as $file)
                    <div class="flex items-center gap-1 bg-gray-700 px-2 py-1 rounded-lg text-xs">
                        {{ $file->getClientOriginalName() }}
                        <button wire:click="$set('tempFiles.{{ $loop->index }}', null)" class="text-red-400 hover:text-red-300">✕</button>
                    </div>
                @endforeach
            </div>
        @endif

        <form wire:submit.prevent="sendMessage" class="flex flex-col gap-2">
			{{-- Строка 1: скрепка + инпут --}}
			<div class="flex gap-2 items-center">
				<label class="cursor-pointer text-[gray]/40 hover:text-[gray]/80 transition flex-shrink-0">
					<input type="file" wire:model="tempFiles" multiple class="hidden" accept="image/*,.pdf,.doc,.docx">
					<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
					</svg>
				</label>

				<input wire:model="body" type="text" placeholder="Напишите сообщение..."
					class="flex-1 min-w-0 p-2 bg-[#0f0e0c]/80 rounded-lg text-white border-[#494338] focus:outline-none focus:ring-0 focus:border-[#9f7e51] text-sm">
			</div>

			{{-- Строка 2: кнопка на всю ширину --}}
			<button type="submit"
					class="w-full text-black py-2 bg-[#9f7e51] rounded-lg text-sm transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51]">
				Отправить
			</button>
		</form>
    </div>
</div>
</div>