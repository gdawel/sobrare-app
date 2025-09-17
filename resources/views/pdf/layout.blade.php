<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title', 'Relatório Neurodiv')</title>
    <style>
        /*
            Esta seção irá carregar nosso CSS.
            Lembre-se de rodar `npm run build` para que o Vite crie o arquivo CSS compilado.
            O nome exato do arquivo pode mudar, então você pode precisar de uma função
            para encontrá-lo dinamicamente, mas para começar podemos colocar o nome manualmente.
            Vá até a pasta `public/build/assets` e veja o nome que o Vite gerou para `pdf.css`.
        */
        {!! file_get_contents(public_path('build/assets/pdf-884cb29f.css')) !!}
    </style>
</head>
<body>

    <div class="header">
        {{-- Aqui pode ir um logo ou título fixo para todas as páginas --}}
        {{-- <img src="{{ public_path('images/logo.png') }}" style="width: 100px;"> --}}
    </div>

    <div class="footer">
        SOBRARE - Todos os direitos reservados. Página <span class="pagenum"></span>
    </div>

    <main>
        @yield('content')
    </main>

</body>
</html>