<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Data Import</title>
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
                    Verificar a Importação das Tabelas de NeuroDiv<br>.....</h1>
                <div class=" font-sans text-md text-gray-800 text-center">
                    @livewire('tst-form')
                            
                </div>
            </div>
            
            
                
            

        </div>

   

    </div>
    
    
</body>
</html>

