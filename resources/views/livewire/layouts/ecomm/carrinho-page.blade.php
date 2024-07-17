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
                <th class="text-left font-semibold">Preço</th>
                <th class="text-left font-semibold">Quantidade</th>
                <th class="text-left font-semibold">Total</th>
                <th class="text-left font-semibold">Remover</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-4">
                  <div class="flex items-center">
                    <img class="h-16 w-16 mr-4" src="https://via.placeholder.com/150" alt="Product image">
                    <span class="font-semibold">Nome do Produto</span>
                  </div>
                </td>
                <td class="py-4">R$19.99</td>
                <td class="py-4">
                  <div class="flex items-center">
                    <button class="border rounded-md py-2 px-4 mr-2">-</button>
                    <span class="text-center w-8">1</span>
                    <button class="border rounded-md py-2 px-4 ml-2">+</button>
                  </div>
                </td>
                <td class="py-4">R$19.99</td>
                <td><button class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">Remover</button></td>
              </tr>
              <!-- More product rows -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="md:w-1/4">
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-4">Resumo</h2>
          <div class="flex justify-between mb-2">
            <span>Subtotal</span>
            <span>R$19.99</span>
          </div>
          <div class="flex justify-between mb-2">
            <span>Impostos</span>
            <span>R$1.99</span>
          </div>
          <div class="flex justify-between mb-2">
            <span>Frete</span>
            <span>R$0.00</span>
          </div>
          <hr class="my-2">
          <div class="flex justify-between mb-2">
            <span class="font-semibold">Total</span>
            <span class="font-semibold">R$21.98</span>
          </div>
          <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Finalizar Compra</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
