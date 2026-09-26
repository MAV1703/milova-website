<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="Авторизация на сайте. Разработка современных сайтов на Laravel + Livewire. Лендинги, корпоративные сайты, системы управления заказами. От 15 000 ₽.">
        <title>Разработка сайтов: авторизация пользователя</title>
		<link rel="icon" href="{{ asset('images/fav1.jpeg') }}" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4"
             style="
                background-image:
                    radial-gradient(circle at center, rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 80%, rgba(0,0,0,0.95) 100%),
                    url('{{ asset('images/cabinet.jpeg') }}');
                background-position: center, center;
                background-repeat: no-repeat, no-repeat;
                background-size: cover, cover;">

            <div class="rounded-xl p-[1px] bg-gradient-to-l from-[#494338]/10 to-[#9f7e51]/50 text-white w-full max-w-md md:max-w-lg mt-4">
                <div class="h-full bg-[#111111]/80 rounded-lg py-6 px-5 sm:px-8 md:px-12">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>