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
                    Importação da Tabela de Grupo de Testes<br>.....<br><br></h1>
                

                <div class=" font-sans text-md text-gray-800 text-center">
                        <form action="{{ url('import/grupo-de-testes') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-auto">
                                <input type="file" name="import_file" >
                                <!--<button type="submit" class="btn btn-primary">Importar Grupo de Testes</button> -->
                                
                                <button type="submit" class="float-right bg-blue-500 hover:bg-blue-700 text-white text-sm    
                                        font-bold py-2 px-4 rounded focus:outline-none 
                                        focus:shadow-outline" type="button">Importar Grupo de Testes
                                </button>
                            </div>
                            <p class="text-sm text-center italic"><br><br> O arquivo a ser selecionado nesta tela deve ter apenas a Tabela de Grupo de Testes</p>
                        </form>
                        <div class="flex-auto">
                            <a href="/import" class="float-right bg-green-700 hover:bg-green-400 text-white text-sm    
                                            font-bold py-2 px-4 rounded focus:outline-none 
                                            focus:shadow-outline" type="button">Tela Principal
                            </a>
                        </div>   
                </div>
            </div>
            
            
                
            

        </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
            <thead class="text-xs text-white bg-blue-600 dark:text-white">
                    <tr>
                        <th>ID</th>
                        <th>Cod.Grupo</th>
                        <th>Nome do Grupo</th>
                        <th>Slug</th>
                        <th>Descrição Curta</th>
                        <th>Descrição Longa</th>
                        <th>Preço</th>
                        <th>Está Ativo?</th>
                    </tr>
            </thead>
            
            <tbody>
                                
                                @foreach ($listarTodosOsGrupos as $grupo)
                                <tr class="bg-blue-500 border-b border-blue-400 text-xs">
                                    <td>{{ $grupo->id }}</td>
                                    <td>{{ $grupo->codGrupo }}</td>
                                    <td>{{ $grupo->nomeGrupo }}</td>
                                    <td>{{ $grupo->slug }}</td>
                                    <td>{{ $grupo->descricaoCurta }}</td>
                                    <td>{{ $grupo->descricaoLonga }}</td>
                                    <td>{{ $grupo->precoGrupo }}</td>
                                    <td>{{ $grupo->isActive }}</td>
                                 </tr>   
                                    @endforeach
                                    
                                
                            </tbody>
                        </table>

    </div>

    </div>
    
    
</body>
</html>

