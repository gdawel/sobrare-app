<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste NeuroDiv Responder</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto">
        <div class="row bg-slate-200 m-12 ">
            @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <div class="border-solid border-2 border-indigo-600 p-6">
                
                <h1 class="font-sans text-xl text-gray-800 text-center">
                    NeuroDiv - Responder aos Testes de um Cliente - TESTE INTERNO APENAS<br>.....</h1>
                <div class=" font-sans text-md text-gray-800 text-center">
                {{--    O componente 'seleciona-cliente' vai acionar o componente 'monta-pergunta' de dentro
                            do blade, quando o cliente for selecionado.
                        O componente 'monta-pergunta' vai montar a página com os dados básicos do cliente
                            selecionado e todos os testes referentes ao pedido do cliente, incluindo
                            o botão de 'Responder' o teste. 
                        Ao acionar o botão 'Responder', aciona o método 'monta-teste', que vai montar
                            as informações necessárias para responder o teste. Em seguida, 
                            de dentro do blade 'monta-pergunta', será acionado o componente 'responder-teste' --}}
                    
                    @livewire('seleciona-cliente')
                    
                </div>
            </div>
            <div class="border-solid border-2 border-indigo-600 p-6">
                <div class=" font-sans text-md text-gray-800 text-center">
                    
                    @livewire('responder-teste')
                            
                </div>
            </div>
            <div class="border-solid border-2 border-indigo-600 p-6">
                <div class=" font-sans text-md text-gray-800 text-center">
                    
                    @livewire('relatorios.relat-autopercepcao-do-stress')
                            
                </div>
            </div>
            
            
            
                
            

        </div>

   

    </div>
    
    
</body>
</html>

