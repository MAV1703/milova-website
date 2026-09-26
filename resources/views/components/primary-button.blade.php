<button {{ $attributes->merge(['type' => 'submit', 'class' => 'my-4 text-center text-black  px-4 py-2 bg-[#9f7e51] border border-transparent rounded-lg text-md hover:bg-gradient-to-r hover:from-[#7f511f] hover:to-[#9f7e51] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
