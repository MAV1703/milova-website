@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white rounded-lg my-4 ']) }}>
    {{ $value ?? $slot }}
</label>
