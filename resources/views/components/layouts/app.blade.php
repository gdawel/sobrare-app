<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SOBRARE | Neurodiversidade' }}</title>
        @livewireStyles
    </head>
    <body class="bg-slate-200 dark:bg-slate-700">

        @livewire('layouts.ecomm.navbar')
        <main>
            
            {{ $slot }}

        </main>
        @livewire('layouts.ecomm.rodape')
        @livewireScripts
    </body>
</html>
