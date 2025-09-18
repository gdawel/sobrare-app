<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Processando Relatório</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 dark:bg-gray-900">

    {{-- Container principal que centraliza o conteúdo de espera --}}
    <div class="min-h-screen flex flex-col justify-center items-center text-center p-4">

        {{-- Mensagem no topo da página, como solicitado --}}
        <div class="absolute top-0 left-0 w-full p-6 text-center">
            <p class="text-lg text-gray-600 dark:text-gray-300">
                Seu relatório foi enviado para a fila de processamento.
            </p>
            <p class="text-base text-gray-500 dark:text-gray-400">
                Você será redirecionado automaticamente em instantes.
            </p>
            <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Processando...
            </p>
        </div>
 
    </div>
  
</body>
</html>