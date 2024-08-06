<div>
   <section class="flex items-center font-poppins dark:bg-gray-800 ">
  <div class="justify-center flex-1 max-w-6xl px-4 py-4 mx-auto bg-white border rounded-md dark:border-gray-900 dark:bg-gray-900 md:py-10 md:px-10">
    <div>
      <h1 class="px-4 mb-8 text-2xl font-semibold tracking-wide text-gray-700 dark:text-gray-300 ">
        Obrigado! Seu pedido foi recebido. </h1>
      <div class="flex border-b border-gray-200 dark:border-gray-700  items-stretch justify-start w-full h-full px-4 mb-8 md:flex-row xl:flex-col md:space-x-6 lg:space-x-8 xl:space-x-0">
        <div class="flex items-start justify-start flex-shrink-0">
          <div class="flex items-center justify-center w-full pb-6 space-x-4 md:justify-start">
            <div class="flex flex-col items-start justify-start space-y-2">
              <p class="text-lg font-semibold leading-4 text-left text-gray-800 dark:text-gray-400">
                {{ $order->orderclientdetail->firstName }} {{ $order->orderclientdetail->lastName }} </p>
              <p class="text-sm leading-4 text-gray-600 dark:text-gray-400">{{ $order->orderclientdetail->cobranca_rua }}</p>
              <p class="text-sm leading-4 text-gray-600 dark:text-gray-400">
                  {{ $order->orderclientdetail->cobranca_cidade }}, {{ $order->orderclientdetail->cobranca_estado }}, {{ $order->orderclientdetail->cobranca_cep }}</p>
              <p class="text-sm leading-4 cursor-pointer dark:text-gray-400">Telefone: {{ $order->orderclientdetail->phone }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap items-center pb-4 mb-10 border-b border-gray-200 dark:border-gray-700">
        <div class="w-full px-4 mb-4 md:w-1/5">
          <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
            Nº do Pedido: </p>
          <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">
            {{ $order->id }}</p>
        </div>
        <div class="w-full px-4 mb-4 md:w-1/5">
          <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
            Data: </p>
          <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">
            {{ $order->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="w-full px-4 mb-4 md:w-1/5">
          <p class="mb-2 text-sm font-medium leading-5 text-gray-800 dark:text-gray-400 ">
            Total: </p>
          <p class="text-base font-semibold leading-4 text-blue-600 dark:text-gray-400">
            {{ Number::currency($order->grand_total, 'BRL') }}
          </p>
        </div>
        <div class="w-full px-4 mb-4 md:w-1/5">
          <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
            Forma de Pagamento: </p>
          <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400 ">
            {{ $order->paymentMethod }} </p>
        </div>
        <div class="w-full px-4 mb-4 md:w-1/5">
          <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
            Situação do Pagamento: </p>
          <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400 ">
            {{ $order->paymentStatus }} </p>
        </div>
      </div>
      <div class="px-4 mb-10">
        <div class="flex flex-col items-stretch justify-center w-full space-y-4 md:flex-row md:space-y-0 md:space-x-8">
          
        </div>
      </div>
      <div class="flex items-center justify-start gap-4 px-4 mt-6 ">
        <a href="/neurodiv" class="w-full text-center px-4 py-2 text-blue-500 border border-blue-500 rounded-md md:w-auto hover:text-white hover:bg-blue-600 dark:border-gray-700 dark:hover:bg-gray-700 dark:text-gray-300">
          Voltar para Página Principal
        </a>
        <a href="/meus-pedidos" class="w-full text-center px-4 py-2 bg-blue-500 rounded-md text-gray-50 md:w-auto dark:text-gray-300 hover:bg-blue-600 dark:hover:bg-gray-700 dark:bg-gray-800">
          Ver Meus Pedidos
        </a>
      </div>
    </div>
  </div>
</section>
</div>
