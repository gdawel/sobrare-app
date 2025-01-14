<div>
    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
	{{-- <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
		
	</h1> --}}
    <h2 class="text-4xl text-center font-bold text-slate-500 pb-2">Dados Sócio-demográficos e Histórico Médico</h2></div>
	<form wire:submit.prevent="salvarHistorico">
	<div class="w-full grid grid-cols-12 gap-2 px-2">
		<div class="md:col-span-12 lg:col-span-12 col-span-12">
			<!-- Card -->
			<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
				<!-- Shipping Address -->
				<div class="mb-3">
					<h4 class="text-xl text-center font-semibold  text-gray-700 dark:text-white mb-4">
						Por favor, preencha os dados abaixo que ajudam a compor o seu histórico de saúde.. 
					</h4>
					
          <div class="grid grid-cols-2 gap-4 mb-3">
						<div>
                            
							<label class="block text-gray-700 dark:text-white mb-1" for="dataNasc">
								Data de Nascimento
							</label>
							<input wire:model="dataNasc" type="date" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
												dark:text-white dark:border-none 
												@error('dataNasc')
													border-red-500 
												@enderror"
												id="nome" type="text">
							</input>
							@error('dataNasc')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror
						</div>
						
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="sexoBiologico">
								Sexo Biológico
							</label>
							<select wire:model="sexoBiologico" class="w-full rounded-lg border py-2 px-3 
										dark:bg-gray-700 dark:text-white dark:border-none
										@error('sexoBiologico')
											border-red-500 
											@enderror" 
										id="sexoBiologico">
                                    <option selected>Sexo Biológico</option> 
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                        </select>
                                    
							
                            {{-- <input wire:model="sexoBiologico" type="select" class="w-full rounded-lg border py-2 px-3 
										dark:bg-gray-700 dark:text-white dark:border-none
										@error('sexoBiologico')
											border-red-500 
											@enderror" 
										id="sexoBiologico" type="text" value="Masculino">
							</input>--}}
							@error('sexoBiologico')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror	 
						</div>
          </div>
          
          
          <div class="grid grid-cols-2 gap-4 mb-3">
            <div>
							<label class="block text-gray-700 dark:text-white mb-1" for="estadoNasc">
								Estado de Nascimento
							</label>
							<select wire:model="estadoNasc" class="w-full rounded-lg border py-2 px-3 
										dark:bg-gray-700 dark:text-white dark:border-none
										@error('estadoNasc')
											border-red-500 
											@enderror" 
										id="estadoNasc" type="text">
                                        <option selected>Estado de Nascimento</option>
                                        @foreach ($this->estados as $estado)
                                        <option value="{{ $estado->estado }}">{{ $estado->estado }}</option>
                                        @endforeach
                                        
                        </select>
							@error('estadoNasc')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror	
						</div>
						
					{{-- </div>

                    <div class="grid grid-cols-3 gap-4 mb-3"> --}}
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="genero">
								Gênero
							</label>
							<select wire:model="genero" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
												dark:text-white dark:border-none 
												@error('genero')
													border-red-500 
												@enderror"
												id="genero" type="text">
                        <option selected>Gênero</option>
                                        @foreach ($this->generos as $genero)
                                        <option value="{{ $genero->genero }}">{{ $genero->genero }}</option>
                                        @endforeach
                                        
                        </select>

							
							@error('genero')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror
						</div>
          </div>
					
          <div class="grid grid-cols-2 gap-4 mb-3">
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="etnia">
								Etnia
							</label>
							<select wire:model="etnia" class="w-full rounded-lg border py-2 px-3 
										dark:bg-gray-700 dark:text-white dark:border-none
										@error('etnia')
											border-red-500 
											@enderror" 
										id="etinia" type="text">
                    <option selected>Etnia</option>
                                        @foreach ($this->descendencias as $etnia)
                                        <option value="{{ $etnia->descendencia }}">{{ $etnia->descendencia }}</option>
                                        @endforeach

							</select>
							@error('etnia')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror	
						</div>

            <div>
							<label class="block text-gray-700 dark:text-white mb-1" for="maoMaisAgil">
								Mão Mais Ágil
							</label>
							<input wire:model="maoMaisAgil" class="w-full rounded-lg border py-2 px-3 
										dark:bg-gray-700 dark:text-white dark:border-none
										@error('maoMaisAgil')
											border-red-500 
											@enderror" 
										id="maoMaisAgil" type="text">
							</input>
							@error('maoMaisAgil')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror	
						</div>
						
					</div>

          <div class="grid grid-cols-1 gap-4">
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="cidadeQueReside">
								Cidade que Reside
							</label>
							<input wire:model="cidadeQueReside" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
												dark:text-white dark:border-none 
												@error('cidadeQueReside')
													border-red-500 
												@enderror"
												id="cidadeQueReside" type="text">
							</input>
							@error('cidadeQueReside')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror
						</div>

          </div>
        </div>
						
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="outrosIdiomas">
								Se fala outra língua, qual(quais)?
							</label>
							<input wire:model="outrosIdiomas" class="w-full rounded-lg border py-2 px-3 
										dark:bg-gray-700 dark:text-white dark:border-none
										@error('outrosIdiomas')
											border-red-500 
											@enderror" 
										id="outrosIdiomas" type="text">
							</input>
							@error('outrosIdiomas')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror	
						</div>

                        <div>
							<label class="block text-gray-700 dark:text-white mb-1" for="grauEscolar">
								Grau Escolar
							</label>
							<select wire:model="grauEscolar" class="w-full rounded-lg border py-2 px-3 
										dark:bg-gray-700 dark:text-white dark:border-none
										@error('grauEscolar')
											border-red-500 
											@enderror" 
										id="grauEscolar" type="text">
                    <option selected>Grau Escolar</option>
                                        @foreach ($this->grausEscolares as $grau)
                                        <option value="{{ $grau->grau_escolar }}">{{ $grau->grau_escolar }}</option>
                                        @endforeach

							</select>
							@error('grauEscolar')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror	
						</div>
						
					</div>
                </div>
            </div>
            
<!-- Card Section  -  Diagnostico Pessoal e Familiar - Start -->
<div class="max-w-4xl py-10 sm:px-6 lg:px-8 mx-auto"><!-- Card -->
  <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-800">
    <div class="mb-8 ">
      <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
        Bloco de perguntas sobre o diagnostico pessoal e familiar quanto a saúde mental:
      </h2>
      <p class="text-sm font-semibold text-gray-600 dark:text-neutral-400">
        <br>Você já foi diagnosticada(o) formalmente em uma das questões abaixo? </p>
      
    </div>

    
      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-2 sm:gap-6 items-start">
       
        {{-- 01.  Déficit de atenção com ou sem hiperatividade - Start --}}
        <div class="col-span-12 bg-white">
          <label for="deficitAtencao" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            01.  Déficit de atenção com ou sem hiperatividade
          </label>
        
        
        <div class="sm:col-span-9 lg:col-span-4 @error('deficitAtencao')
										 bg-red-300
									 @enderror">
          <div wire:model="deficitAtencao" class="sm:flex " >
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" wire:model="deficitAtencao" name="deficitAtencao" class="col-span-6 shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim"></input>
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" wire:model="deficitAtencao" name="deficitAtencao" class="col-span-6 shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao"></input>
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" wire:model="deficitAtencao" name="deficitAtencao" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco"></input>
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
            
          </div>
            @error('deficitAtencao')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div>
      </div>

        {{-- 01.  Déficit de atenção com ou sem hiperatividade - End --}}

        {{-- 02.  Anorexia nervosa - Start --}}
        <div class="col-span-12 bg-white ">
          <label for="anorexiaNervosa" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            02.  Anorexia nervosa
          </label>
       
        
          <div class="sm:col-span-9 lg:col-span-4  @error('anorexiaNervosa')
                      bg-red-300
                    @enderror">
            <div wire:model="anorexiaNervosa" class="sm:flex">
              <label for="anorexiaNervosaSim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="anorexiaNervosa" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="anorexiaNervosaSim" value="sim"></input>
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
              </label>

              <label for="anorexiaNervosaNao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="anorexiaNervosa" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="anorexiaNervosaNao" value="nao"></input>
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
              </label>

              {{-- <label for="anorexiaNervosaBranco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="anorexiaNervosa" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="anorexiaNervosaBranco" value="branco"></input>
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
              </label> --}}
            </div>
              @error('anorexiaNervosa')
              <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
        
        {{-- 02.  Anorexia nervosa - End --}}

        {{-- 03.  Transtorno de Ansiedade - Start --}}
        <div class="col-span-12 bg-white ">
          <label for="transtornoAnsiedade" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            03.  Transtorno de Ansiedade (por exemplo, Ansiedade Generalizada)
          </label>
        
        
          <div class="sm:col-span-9 lg:col-span-4 @error('transtornoAnsiedade')
                      bg-red-300
                    @enderror">
            <div wire:model="transtornoAnsiedade" class="sm:flex">
              <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="transtornoAnsiedade" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="sim"  value="sim">
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
              </label>

              <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="transtornoAnsiedade" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="nao" value="nao">
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
              </label>

              {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="transtornoAnsiedade" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="branco" value="branco">
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
              </label> --}}
              
            </div>
            @error('transtornoAnsiedade')
              <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
              @enderror
          </div>
      </div>
        {{-- 03.  Transtorno de Ansiedade - End --}}

        {{-- 04.  Autismo Nível 1 - Start --}}
        <div class="col-span-12 bg-white ">
          <label for="autismoNivel1" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            04.  Autismo Nível 1 (Antiga Síndrome de Asperger)
          </label>
        

          <div class="sm:col-span-9 lg:col-span-4 @error('autismoNivel1')
                      bg-red-300
                    @enderror">
            <div wire:model="autismoNivel1" class="sm:flex">
              <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="autismoNivel1" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="sim" value="sim">
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
              </label>

              <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="autismoNivel1" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="nao" value="nao">
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
              </label>

              {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <input type="radio" name="autismoNivel1" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                id="branco"  value="branco">
                <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
              </label> --}}
            </div>
              @error('autismoNivel1')
                <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
              @enderror
          </div>
      </div>
        {{-- 04.  Autismo Nível 1 - End --}}

        {{-- 05.  Transtorno Bipolar - Start --}}
        <div class="col-span-12 bg-white ">
          
            <label for="transtornoBipolar" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
              05.  Transtorno Bipolar ( Alternância entre episódios de euforismo, exaltação e estados de tristeza, depressivos. A alternância, por vezes, pode ser semanais, trimestrais, ou em períodos maiores.
            </label>

            <div class="sm:col-span-9 lg:col-span-4 @error('transtornoBipolar')
                 bg-red-300
                  @enderror">

              <div wire:model="transtornoBipolar" class="sm:flex">

                  <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <input type="radio" name="transtornoBipolar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                    id="sim" value="sim">
                    <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
                  </label>

                  <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <input type="radio" name="transtornoBipolar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                    id="nao" value="nao">
                    <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
                  </label>

                  {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <input type="radio" name="transtornoBipolar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                    id="branco" value="branco">
                    <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
                  </label> --}}
          </div>
              @error('transtornoBipolar')
                <div class="col-span-6 text-center text-red-800 text-sm">{{ $message }}</div>
              @enderror
          </div>
        </div>
    {{-- 05.  Transtorno Bipolar - End --}}

    {{-- 06.  Depressão - Start --}}
        <div class="col-span-12 bg-white ">
          
            <label for="depressao" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
              06.  Depressão
            </label>

            <div class="sm:col-span-9 lg:col-span-4 @error('depressao')
                 bg-red-300
                  @enderror">
          
            <div wire:model="depressao" class="sm:flex @error('depressao')
                  bg-red-300
                  @enderror">
                <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                  <input type="radio" name="depressao" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                  id="sim" value="sim">
                  <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
                </label>

                <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                  <input type="radio" name="depressao" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                  id="nao" value="nao">
                  <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
                </label>

                {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                  <input type="radio" name="depressao" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                  id="branco" value="branco">
                  <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
                </label> --}}
            </div>
                @error('depressao')
                  <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
                @enderror 
          </div>
        </div>
        {{-- 06.  Depressão - End --}}

        {{-- 07.  Transtorno Histriônico - Start --}}
        <div class="col-span-12 bg-white ">
        
          <label for="transtornoHistrionico" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            07.  Transtorno Histriônico - Ampliar os feitos e realizações pessoais. Agir de modo sedutor(a) ou provocativa(o) ou manipuladora(or). Usar a aparência física como uma vitrine. Agir e atuar de modo inapropriado e todas estas possibilidades usadas como estratégia para  chamar a atenção ou vencer as pessoas pela argumentação.
          </label>
        
          <div class="sm:col-span-9 lg:col-span-4 @error('transtornoHistrionico')
                 bg-red-300
                  @enderror">
          
            
          <div wire:model="transtornoHistrionico" class="sm:flex @error('transtornoHistrionico')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoHistrionico" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoHistrionico" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoHistrionico" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('transtornoHistrionico')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 07.  Transtorno Histriônico - End --}}

        {{-- 08.  Transtorno Anancástico - Start --}}
        <div class="col-span-12 bg-white ">
       
          <label for="transtornoAnancastico" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            08.  Transtorno Anancástico - Excessiva preocupação com detalhes (detalhismo), apego a regras, ordem, pontualidade, dificuldade para tomar decisão, preocupação em excesso com as formalidades, dúvidas recorrentes quando diante de uma atividade e demonstrar ser pessoa insegura.			

          </label>
       
          <div class="sm:col-span-9 lg:col-span-4 @error('transtornoAnancastico')
          bg-red-300
           @enderror">

          <div wire:model="transtornoAnancastico" class="sm:flex col-span-3 @error('transtornoAnancastico')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoAnancastico" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoAnancastico" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoAnancastico" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('transtornoAnancastico')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 08.  Transtorno Anancástico - End --}}
        
        {{-- 09.  Transtorno Intelectual - Start --}}
        <div class="col-span-12 bg-white ">
        
          <label for="transtornoIntelectual" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            09.  Transtorno Intelectual (por exemplo, Dificuldade de Aprendizagem)
          </label>
        
          <div class="sm:col-span-9 lg:col-span-4 @error('transtornoIntelectual')
          bg-red-300
           @enderror">

          <div wire:model="transtornoIntelectual" class="sm:flex @error('transtornoIntelectual')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoIntelectual" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoIntelectual" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoIntelectual" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('transtornoIntelectual')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 09.  Transtorno Intelectual - End --}}

        {{-- 10.  Dificuldades de Expressar - Start --}}
        <div class="col-span-12 bg-white ">
        
          <label for="dificuldadeExpressar" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            10.  Atraso, déficit ou dificuldades de expressar nosso idioma (por exemplo, certas dificuldades na fala ou comunicação, como entender predominantemente o literal do que lhe é dito, dificuldades com o uso de gírias, voz monótona (sem modulações), fala demasiada formal ou refinada e até com termos técnicos - sem ser profissional da área técnica.
          </label>
        

          <div class="sm:col-span-9 lg:col-span-4 @error('dificuldadeExpressar')
          bg-red-300
           @enderror">

          <div wire:model="dificuldadeExpressar" class="sm:flex @error('dificuldadeExpressar')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="dificuldadeExpressar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="dificuldadeExpressar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="dificuldadeExpressar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('dificuldadeExpressar')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 10.  Dificuldades de Expressar - End --}}

        {{-- 11.  Transtorno Obsessivo Compulsivo (TOC) - Start --}}
        <div class="col-span-12 bg-white ">
        
          <label for="toc" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            11.  Transtorno Obsessivo Compulsivo (TOC)
          </label>
        

          <div class="sm:col-span-9 lg:col-span-4 @error('toc')
          bg-red-300
           @enderror">

          <div wire:model="toc" class="sm:flex @error('toc')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="toc" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="toc" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="toc" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('toc')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 11.  Transtorno Obsessivo Compulsivo (TOC) - End --}}

        {{-- 12.  Transtorno de Personalidade - Start --}}
        <div class="col-span-12 bg-white ">
        
          <label for="transtornoDePersonalidade" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            12.  Transtorno de Personalidade do tipo Borderline, Narcisista, Esquizotípico, Evitativo ou Psicótico
          </label>
        

          <div class="sm:col-span-9 lg:col-span-4 @error('transtornoDePersonalidade')
          bg-red-300
           @enderror">

          <div wire:model="transtornoDePersonalidade" class="sm:flex @error('transtornoDePersonalidade')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoDePersonalidade" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoDePersonalidade" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="transtornoDePersonalidade" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('transtornoDePersonalidade')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 12.  Transtorno de Personalidade - End --}}

        {{-- 13.  Fobias - Start --}}
        <div class="col-span-12 bg-white ">
        
          <label for="fobias" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            13.  Fobias
          </label>
       

          <div class="sm:col-span-9 lg:col-span-4 @error('fobias')
          bg-red-300
           @enderror">

          <div wire:model="fobias" class="sm:flex @error('fobias')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="fobias" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="fobias" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>
{{-- 
            <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="fobias" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('fobias')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 13.  Fobias - End --}}

        {{-- 14.  Transtorno de Esquizofrenia --}}
        <div class="col-span-12 bg-white ">
        
          <label for="esquizofrenia" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            14.  Transtorno de Esquizofrenia
          </label>
       

          <div class="sm:col-span-9 lg:col-span-4 @error('esquizofrenia')
          bg-red-300
           @enderror">

          <div wire:model="esquizofrenia" class="sm:flex @error('esquizofrenia')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="esquizofrenia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="esquizofrenia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="esquizofrenia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('esquizofrenia')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 14.  Transtorno de Esquizofrenia - End --}}

        <div class="col-span-12">
          <label for="af-account-bio" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            Outro (por favor especifique qualquer outro diagnóstico ou, opcionalmente, 
            comente algo sobre os diagnósticos marcados com Sim.)
          </label>
        </div>
        
        <!-- End Col -->

        <div class="col-span-12">
          <textarea wire:model="outroEspecificar" id="af-account-bio" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" 
            rows="6" placeholder="Digite seu comentário..."></textarea>
        </div>
        @error('outroEspecificar')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror

      </div>
      <!-- End Grid -->
      
      {{-- Separador --}}
      <hr class="my-6 border-blue-500 height:2px">

      <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                Quando criança, você tinha alguma habilidade excepcional (muito além do normal) em algum destes talentos?
            </h2>
            
            <p class="text-sm font-semibold text-gray-600 dark:text-neutral-400">
                <br>Responda SIM ou NÃO quanto você ser uma pessoa com desempenho excepcional em uma das seguintes áreas:</p>
            
        </div>

        {{-- 01.  Hiperlexia --}}
        <div class="col-span-12 bg-white ">
        
          <label for="hiperlexia" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            01.  Hiperlexia (aprendeu a ler antes dos 3 anos de idade)
          </label>
        

        <div class="sm:col-span-9 lg:col-span-4 @error('hiperlexia')
          bg-red-300
           @enderror">

       
          <div wire:model="hiperlexia" class="sm:flex @error('hiperlexia')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="hiperlexia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="hiperlexia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="hiperlexia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('hiperlexia')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{-- 01.  Hiperlexia - End --}}

        {{--  02.  Hipercalculia --}}
        <div class="col-span-12 bg-white ">
        
          <label for="hipercalculia" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            02.  Hipercalculia (antes dos 4 anos com habilidade em matemática significativamente acima da expectativa de idade - cálculos / lógica /astronomia / geometria)
          </label>
        

          <div class="sm:col-span-9 lg:col-span-4 @error('hipercalculia')
          bg-red-300
           @enderror">

          <div wire:model="hipercalculia" class="sm:flex @error('hipercalculia')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="hipercalculia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="hipercalculia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="hipercalculia" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('hipercalculia')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{--  02.  Hipercalculia - End --}}

        {{--  03.  Ouvido absoluto --}}
        <div class="col-span-12 bg-white ">
        
          <label for="ouvidoAbsoluto" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            03.  Ouvido absoluto (musical)
          </label>
       

          <div class="sm:col-span-9 lg:col-span-4 @error('ouvidoAbsoluto')
          bg-red-300
           @enderror">

          <div wire:model="ouvidoAbsoluto" class="sm:flex @error('ouvidoAbsoluto')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="ouvidoAbsoluto" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="ouvidoAbsoluto" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="ouvidoAbsoluto" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('ouvidoAbsoluto')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{--  03.  Ouvido absoluto - End --}}

        {{--  04.  Talento para pintar / desenhar --}}
        <div class="col-span-12 bg-white ">
        
          <label for="talentoPintar" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            04.  Talento para pintar / desenhar antes dos 04 anos
          </label>
        

          <div class="sm:col-span-9 lg:col-span-4 @error('talentoPintar')
          bg-red-300
           @enderror">

          <div wire:model="talentoPintar" class="sm:flex @error('talentoPintar')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="talentoPintar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="talentoPintar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="talentoPintar" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('talentoPintar')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{--  04.  Talento para pintar / desenhar - End --}}

        {{--  05.  Faixa superdotada de QI para a idade --}}
        <div class="col-span-12 bg-white ">
       
          <label for="faixaSuperiorQI" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            05.  Faixa superdotada de QI para a idade
          </label>
        

          <div class="sm:col-span-9 lg:col-span-4 @error('faixaSuperiorQI')
          bg-red-300
           @enderror">

          <div wire:model="faixaSuperiorQI" class="sm:flex @error('faixaSuperiorQI')
                bg-red-300
            @enderror">
            <label for="sim" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="faixaSuperiorQI" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="sim" value="sim">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Sim</span>
            </label>

            <label for="nao" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="faixaSuperiorQI" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="nao" value="nao">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Não</span>
            </label>

            {{-- <label for="branco" class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
              <input type="radio" name="faixaSuperiorQI" class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
              id="branco" value="branco">
              <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Branco</span>
            </label> --}}
          </div>
          @error('faixaSuperiorQI')
            <div class="col-span-12 text-center text-red-800 text-sm">{{ $message }}</div>
            @enderror
        </div></div>
        {{--  05.  Faixa superdotada de QI para a idade - End --}}

        {{--  06.  Irmãs biológicas --}}
        <div class="col-span-12 bg-white ">
        <div >
          <label for="qtdIrmasBio" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            06.  Quantas irmãs biológicas você tem? (Use os sinais +/- ou digite o número)
          </label>
        </div>

        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700">
        <div class="flex items-center gap-x-1.5">
            <button wire:click="diminuir('qtdIrmasBio')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
            </svg>
            </button>
            <input wire:model.live="qtdIrmasBio" name="qtdIrmasBio" min="0" max="15" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" type="number" value="0">
            <button wire:click="somar('qtdIrmasBio')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>
            </button>
        </div>
        </div>
    </div>
        {{--  06.  Irmãs biológicas - End --}}

        {{--  07.  Irmãos biológicas --}}
        <div class="col-span-12 bg-white ">
        <div >
          <label for="qtdIrmaosBio" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            07.  Quantos irmãos biológicos você tem? (Use os sinais +/- ou digite o número)
          </label>
        </div>

        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700" data-hs-input-number="">
        <div class="flex items-center gap-x-1.5">
            <button wire:click="diminuir('qtdIrmaosBio')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
            </svg>
            </button>
            <input wire:model.live="qtdIrmaosBio" name="qtdIrmaosBio" max="15" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" style="-moz-appearance: textfield;" type="number" value="0">
            <button wire:click="somar('qtdIrmaosBio')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" tabindex="-1" aria-label="Increase" data-hs-input-number-increment="">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>
            </button>
        </div>
        </div>
        </div>
        {{--  07.  Irmãos biológicas - End --}}

        {{--  08.  Filhos e Filhas biológicas --}}
        <div class="col-span-12 bg-white ">
        <div >
          <label for="qtdFilhosBio" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            08.  Quantos filhos e filhas biológicos você tem? (Trás a carga genética sua ou do[a] parceiro[a] em gestações assistidas)
          </label>
        </div>

        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700">
        <div class="flex items-center gap-x-1.5">
            <button wire:click="diminuir('qtdFilhosBio')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
            </svg>
            </button>
            <input wire:model.live="qtdFilhosBio" max="15" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" style="-moz-appearance: textfield;" type="number" value="0">
            <button wire:click="somar('qtdFilhosBio')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>
            </button>
        </div>
        </div>
        </div>
        {{--  08.  Filhos e Filhas biológicas - End --}}

        {{--  09.  Família Nuclear - Start --}}
        <div class="col-span-12 bg-white ">
        <div >
          <label for="familiaNuclear" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            09.  Algum membro da sua família nuclear (pai, mãe, irmãos/irmãs) foi diagnosticado com TEA (Espectro do autismo)?			

          </label>
          
        </div>

        <select wire:model="familiaNuclear" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
            <option selected>Selecione uma das opções abaixo</option>
            <option value="Nenhum">Nenhum</option>
            <option value="Pai">Pai</option>
            <option value="Mãe">Mãe</option>
            <option value="Irmão">Irmão</option>
            <option value="Irmã">Irmã</option>
            </select>
        </div>
            @error('familiaNuclear')
            <div class="col-span-12 text-center text-red-800 bg-red-300 text-sm">{{ $message }}</div>
            @enderror
        {{--  09.  Família Nuclear - End --}}

        {{--  10.  Disgnóstico Parentes --}}
        <div class="col-span-12 bg-white ">
        <div >
          <label for="diagnosticoParentes" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            10.  Algum de seus avós, tios(as) ou primos(as), tem um diagnóstico formal de neurodivergência como Hipersensibilidade sensorial, autismo, TDAH, Dislexia etc.? E, em caso afirmativo, quantos?
          </label>
        </div>

        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700">
        <div class="flex items-center gap-x-1.5">
            <button wire:click="diminuir('diagnosticoParentes')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
            </svg>
            </button>
            <input wire:model.live="diagnosticoParentes" max="15" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" style="-moz-appearance: textfield;" type="number" aria-roledescription="Number field" value="0">
            <button wire:click="somar('diagnosticoParentes')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>
            </button>
        </div>
        </div>
        </div>
        {{--  10.  Diagnóstico Parentess - End --}}

        {{--  11.  Filhos e Filhas sob Cuidados --}}
        <div class="col-span-12 bg-white ">
        <div >
          <label for="filhosSobCuidados" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            11.  Você tem filhos e filhas não biológicos sob seus cuidados? (Coloque zero para responder "não".)
          </label>
        </div>

        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700">
        <div class="flex items-center gap-x-1.5">
            <button wire:click="diminuir('filhosSobCuidados')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
            </svg>
            </button>
            <input wire:model.live="filhosSobCuidados" max="15" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" style="-moz-appearance: textfield;" type="number" aria-roledescription="Number field" value="0">
            <button wire:click="somar('filhosSobCuidados')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>
            </button>
        </div>
        </div>
        </div>
        {{--  11.  Filhos e Filhas sob Cuidados - End --}}

        {{--  12.  Descendentes Precisam Avaliacao --}}
        <div class="col-span-12 bg-white ">
        <div >
          <label for="descendentesPrecisamAvaliacao" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            12.  Algum destes seus filhos ou filhas / netos "deve ser" encaminhado para uma avaliação de diagnóstico de neurodivergência (Hipersensibilidade, autismo, TDAH, TEA, Dislexia etc.) e, em caso afirmativo, quantos? (Coloque zero para responder "não".)
          </label>
        </div>

        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700">
        <div class="flex items-center gap-x-1.5">
            <button wire:click="diminuir('descendentesPrecisamAvaliacao')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
            </svg>
            </button>
            <input wire:model.live="descendentesPrecisamAvaliacao" max="15" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" style="-moz-appearance: textfield;" type="number" value="0">
            <button wire:click="somar('descendentesPrecisamAvaliacao')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>
            </button>
        </div>
        </div>
        </div>
        {{--  12.  Descendentes Precisam Avaliacao - End --}}

        {{--  13.  Filhos/Filhas com Diagnóstico --}}
        <div class="col-span-12 bg-white ">
        <div >
          <label for="filhosComDiagnostico" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            13.  Algum de seus filhos/ filhas foi formalmente diagnosticado em neurodivergência por um profissional (Hipersensibilidade sensorial, TDAH, TEA, Dislexia e etc.)? Em caso afirmativo, quantos?  (Coloque zero para responder "não".)
          </label>
        </div>

        <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700">
        <div class="flex items-center gap-x-1.5">
            <button wire:click="diminuir('filhosComDiagnostico')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
            </svg>
            </button>
            <input wire:model.live="filhosComDiagnostico" max="15" class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" style="-moz-appearance: textfield;" type="number" aria-roledescription="Number field" value="0">
            <button wire:click="somar('filhosComDiagnostico')" type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg>
            </button>
        </div>
        </div>
        </div>
        {{--  13.  Filhos/Filhas com Diagnostico - End --}}

        {{--  14.  Ocupação - Start --}}
        <div class="col-span-12 bg-white ">
        
          <label for="ocupacaoPrincipal" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
            14.  Qual é a sua ocupação (ou ocupação passada se aposentado ou atualmente desempregado)?
          </label>
            <div class="sm:col-span-9 lg:col-span-4 @error('ocupacaoPrincipal')
            bg-red-300
            @enderror">

            <div wire:model="ocupacaoPrincipal" class="sm:flex @error('ocupacaoPrincipal')
                bg-red-300
            @enderror">

        {{-- <div class="max-w-sm space-y-3 @error('ocupacaoPrincipal')
										border-red-500 
									@enderror"> --}}
        <input wire:model="ocupacaoPrincipal" type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" 
            placeholder="ocupação atual ou última ocupação">
        </div>
        @error('ocupacaoPrincipal')
            <div class="text-red-800 text-sm">{{ $message }}</div>
        @enderror
        </div>
        {{--  14.  Ocupação - End --}}


      <div class="mt-5 flex justify-end gap-x-2">
        <a href="/meus-pedidos" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
          Cancelar
        </a>
        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Salvar Histórico
        </button>
      </div>
    
  </div>
  <!-- End Card -->
        


</div>
<!-- End Card Section -  Diagnostico Pessoal e Familiar -->



		</div>
		
	</div>
	</form>
</div>
</div>

