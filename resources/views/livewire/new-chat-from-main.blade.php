<div>
    <form wire:submit="sendMessage" class="flex flex-col gap-3 sm:gap-4 flex-grow sm:max-w-[30rem] md:min-w-[500px]">
        @csrf

        {{-- Имя --}}
        <input wire:model="name" placeholder="Ваше имя"
               class="bg-gradient-to-l from-[#242323] to-[#121212] border-none text-sm sm:text-base lg:text-lg rounded-lg p-2 focus:ring-0 focus:outline-none">
        @error('name')
            <p class="text-[darkred] text-left text-xs">{{ $message }}</p>
        @enderror

        {{-- Сообщение --}}
        <textarea wire:model="message" placeholder="Расскажите о вашем проекте..." rows="4"
                  class="mb-2 bg-gradient-to-l from-[#242323] to-[#121212] border-none text-sm sm:text-base lg:text-lg rounded-lg p-2 focus:ring-0 focus:outline-none"></textarea>
        @error('message')
            <p class="text-[darkred] text-left text-xs">{{ $message }}</p>
        @enderror

        {{-- Кнопка --}}
        <button class="rounded-lg text-black py-2 px-4 sm:py-3 sm:px-5 bg-[#9f7e51] text-sm sm:text-base lg:text-xl transition-colors duration-300 hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51] inline-flex items-center justify-center gap-2">
            Отправить
            <span class="text-[#9f7e51] bg-white rounded-full w-5 h-5 sm:w-6 sm:h-6 flex items-center justify-center text-xs sm:text-sm font-bold">&#8594;</span>
        </button>
    </form>
</div>