@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'text-white/60 rounded-lg bg-[#111111]/70 border-[#494338] focus:outline-none focus:ring-0 focus:border-[#9f7e51]']) }}>
