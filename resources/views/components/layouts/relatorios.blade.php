<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SOBRARE | Neurodiversidade' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
       
    </head>

    <body class="bg-white dark:bg-slate-700">
 
        <main>
            
            {{ $slot }}

        </main>
        
        @livewireScripts
    </body>
</html>
