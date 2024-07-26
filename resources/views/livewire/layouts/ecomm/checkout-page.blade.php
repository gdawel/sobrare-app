<div>
    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
	<h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
		Finalização do Pedido
	</h1>
	<form wire:submit.prevent="confirmarPedido">
	<div class="grid grid-cols-12 gap-4">
		<div class="md:col-span-12 lg:col-span-8 col-span-12">
			<!-- Card -->
			<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
				<!-- Shipping Address -->
				<div class="mb-6">
					<h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
						Endereço de Cobrança
					</h2>
					<div class="grid grid-cols-2 gap-4">
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="first_name">
								Nome
							</label>
							<input wire:model="nome" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
												dark:text-white dark:border-none 
												@error('nome')
													border-red-500 
												@enderror"
												id="nome" type="text">
							</input>
							@error('nome')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror
						</div>
						
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="last_name">
								Sobrenome
							</label>
							<input wire:model="sobrenome" class="w-full rounded-lg border py-2 px-3 
										dark:bg-gray-700 dark:text-white dark:border-none
										@error('nome')
											border-red-500 
											@enderror" 
										id="sobrenome" type="text">
							</input>
							@error('sobrenome')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror	
						</div>
						
					</div>
					<div class="mt-4">
						<label class="block text-gray-700 dark:text-white mb-1" for="phone">
							Telefone
						</label>
						<input wire:model="telefone" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700
								 dark:text-white dark:border-none
								 @error('nome')
									border-red-500 
								@enderror" id="telefone" type="text">
						</input>
						@error('telefone')
							<div class="text-red-800 text-sm">{{ $message }}</div>
						@enderror
					</div>
					<div class="mt-4">
						<label class="block text-gray-700 dark:text-white mb-1" for="address">
							Endereço
						</label>
						<input wire:model="endereco" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700
									 dark:text-white dark:border-none
									 @error('endereco')
										border-red-500 
									@enderror" id="endereco" type="text">
						</input>
						@error('endereco')
							<div class="text-red-800 text-sm">{{ $message }}</div>
						@enderror
					</div>
					<div class="mt-4">
						<label class="block text-gray-700 dark:text-white mb-1" for="city">
							Cidade
						</label>
						<input wire:model="cidade" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700
								 dark:text-white dark:border-none
								 @error('cidade')
									border-red-500 
								@enderror" id="cidade" type="text">
						</input>
						@error('cidade')
							<div class="text-red-800 text-sm">{{ $message }}</div>
						@enderror	
					</div>
					<div class="grid grid-cols-2 gap-4 mt-4">
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="state">
								Estado
							</label>
							<input wire:model="estado" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700
									 dark:text-white dark:border-none
									 @error('estado')
										border-red-500 
									 @enderror" id="estado" type="text">
							</input>
							@error('estado')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror
						</div>
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="zip">
								CEP
							</label>
							<input wire:model="cep" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
									dark:text-white dark:border-none
									@error('cep')
										border-red-500 
									@enderror" id="cep" type="text">
							</input>
							@error('cep')
							<div class="text-red-800 text-sm">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				<div class="text-lg font-semibold mb-4">
					Selecione a Forma de Pagamento
				</div>
				<ul class="grid w-full gap-6 md:grid-cols-2">
					<li>
						<input wire:model="forma_pagamento" class="hidden peer" id="hosting-small" required="" type="radio" value="direto" />
						<label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="hosting-small">
							<div class="block">
								<div class="w-full text-lg font-semibold">
									Pagamento Direto
								</div>
							</div>
							<svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
								</path>
							</svg>
						</label>
					</li>
					<li>
						<input wire:model="forma_pagamento" class="hidden peer" id="hosting-big" type="radio" value="stripe">
						<label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="hosting-big">
							<div class="block">
								<div class="w-full text-lg font-semibold">
									Stripe (Cartões)
								</div>
							</div>
							<svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
								</path>
							</svg>
						</label>
						</input>
					</li>
				</ul>
				@error('forma_pagamento')
					<div class="text-red-800 text-sm">{{ $message }}</div>
				@enderror
			</div>
			<!-- End Card -->
		</div>
		<div class="md:col-span-12 lg:col-span-4 col-span-12">
			<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
				<div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
					RESUMO DO PEDIDO
				</div>
				<div class="flex justify-between mb-2 font-bold">
					<span>
						Subtotal
					</span>
					<span>
						{{ Number::currency($total_geral, 'BRL') }}
					</span>
				</div>
				<div class="flex justify-between mb-2 font-bold">
					<span>
						Impostos
					</span>
					<span>
						0.00
					</span>
				</div>
				{{-- <div class="flex justify-between mb-2 font-bold">
					<span>
						Shipping Cost
					</span>
					<span>
						0.00
					</span>
				</div> --}}
				<hr class="bg-slate-400 my-4 h-1 rounded">
				<div class="flex justify-between mb-2 font-bold">
					<span>
						Total Geral
					</span>
					<span>
						{{ Number::currency($total_geral, 'BRL') }}
					</span>
				</div>
				</hr>
			</div>
			<button type="submit" class="bg-green-500 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-green-600">
				<span wire:loading.remove>Confirmar o Pedido</span>
				<span wire:loading>Processando. Aguarde...</span> 
			</button>
			<div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
				<div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
					Resumo do Carrinho
				</div>
				<ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
					@foreach ($cart_items as $item)
						<li wire:key=" {{ $item['produto_id'] }} " class="py-3 sm:py-4">
						<div class="flex items-center">
							<div class="flex-shrink-0">
								<img alt="{{ $item['nomeGrupo'] }}" class="w-12 h-12 rounded-full" 
									@if ($item['imagemGrupo'])
										src="{{ asset('storage/'.$item['imagemGrupo']) }}">
									@else
										src="{{ asset('storage/ywbjBmIX0KdJgKCBS5sqNwRF2lRbXe-metaTWluaS1MT0dPXzIwMjQucG5n-.png') }}"
									@endif  
								</img>
							</div>
							<div class="flex-1 min-w-0 ms-4">
								<p class="text-sm font-medium text-gray-900 truncate dark:text-white">
									{{ $item['nomeGrupo'] }}
								</p>
								{{-- <p class="text-sm text-gray-500 truncate dark:text-gray-400">
									Quantity: 1
								</p> --}}
							</div>
							<div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
								{{ Number::currency($item['precoGrupo'], 'BRL') }}
							</div>
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>
		</div>
	</div>
	</form>
</div>
</div>
