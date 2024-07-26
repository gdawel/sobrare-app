<div>
    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Seu Carrinho de Compras</h1>
    <div class="flex flex-col md:flex-row gap-4">
      <div class="md:w-3/4">
        <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
          <table class="w-full">
            <thead>
              <tr>
                <th class="text-left font-semibold">Produto</th>
               {{--  <th class="text-left font-semibold">Preço</th>
                <th class="text-left font-semibold">Quantidade</th> --}}
                <th class="text-left font-semibold">Total</th>
                <th class="text-left font-semibold">Remover</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($cart_items as $item )
                  <tr wire:key="{{ $item['produto_id'] }}">
                <td class="py-4">
                  <div class="flex items-center">
                    <img class="h-16 w-16 mr-4" 
                        @if ($item['imagemGrupo'])
                            src="{{ asset('storage/'.$item['imagemGrupo']) }}" alt="{{ $item['nomeGrupo'] }}">
                        @else
                            src="{{ asset('storage/ywbjBmIX0KdJgKCBS5sqNwRF2lRbXe-metaTWluaS1MT0dPXzIwMjQucG5n-.png') }}"
                        @endif      
                    
                    <span class="font-semibold">{{ $item['nomeGrupo'] }}</span>
                  </div>
                </td>
                <td class="py-4">{{ Number::currency($item['precoGrupo'], 'BRL') }}</td>
                {{-- <td class="py-4">
                  <div class="flex items-center">
                    <button class="border rounded-md py-2 px-4 mr-2">-</button>
                    <span class="text-center w-8">1</span>
                    <button class="border rounded-md py-2 px-4 ml-2">+</button>
                  </div>
                </td>
                <td class="py-4">R$19.99</td> --}}
                <td><button wire:click="removerItem({{ $item['produto_id'] }})" class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">
                            <span wire:loading.remove wire:target="removerItem({{ $item['produto_id'] }})">Remover</span>
                            <span wire:loading wire:target="removerItem({{ $item['produto_id'] }})">Removendo...</span>
                    </button></td>
              </tr>
              @empty
                  <tr>
                    <td colspan="4" class="text-center py-4 text-4xl font-semibold text-slate-500">
                        Nenhum item adicionado ao Carrinho</td>
                  </tr>
              @endforelse
              
              
            </tbody>
          </table>
        </div>
      </div>
      <div class="md:w-1/4">
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-4">Resumo</h2>
          <div class="flex justify-between mb-2">
            <span>Subtotal</span>
            <span>{{ Number::currency($total_geral, 'BRL') }}</span>
          </div>
          <div class="flex justify-between mb-2">
            <span>Impostos</span>
            <span>R$0.00</span>
          </div>
          
          <hr class="my-2">
          <div class="flex justify-between mb-2">
            <span class="font-semibold">Total</span>
            <span class="font-semibold">{{ Number::currency($total_geral, 'BRL') }}</span>
          </div>
          @if ($cart_items)
              <a href="/checkout" class="bg-green-500 block text-center text-white py-2 px-4 rounded-lg mt-4 w-full">
                Finalizar Compra</a>
          @endif
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>
