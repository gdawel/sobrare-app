<div>
   <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <h1 class="text-4xl font-bold text-slate-500">Meus Pedidos</h1>
  <div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">N. Pedido</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Data</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Situação Pedido</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Situação Pagamento</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total do Pedido</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Acões Disponíveis</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($pedidos as $pedido)
                <tr wire:key="{{ $pedido->id }}" class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                        {{ $pedido->id }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                        {{ $pedido->created_at->format('d-m-Y') }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><span class="bg-orange-500 py-1 px-3 rounded text-white shadow">
                        {{ $pedido->orderStatus }}</span></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><span class="bg-green-500 py-1 px-3 rounded text-white shadow">
                        {{ $pedido->paymentStatus }}</span></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                        {{ Number::currency($pedido->grand_total, 'BRL') }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <a href="/meus-pedidos/{{ $pedido->id }}" class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">
                      Ver Detalhes</a>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <a href="/meus-pedidos/{{ $pedido->id }}" class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">
                      Ver Testes</a>
                  </td>
                </tr>
              @endforeach

              


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
