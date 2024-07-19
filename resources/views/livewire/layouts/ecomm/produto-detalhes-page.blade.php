<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!-- Features -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
    <div>
      <img class="rounded-xl " src="{{ asset('storage/' . $grupoSelecionado->imagemGrupo ) }}" alt="Image Description">
    </div>
    <!-- End Col -->

    <div class="mt-5 sm:mt-10 lg:mt-0">
      <div class="space-y-6 sm:space-y-8">
        <!-- Title -->
        <div class="space-y-2 md:space-y-4">
          <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
            
            {{ $grupoSelecionado->nomeGrupo }}
          </h2>
          <p class="text-gray-500 dark:text-neutral-500">
            {!! $grupoSelecionado->descricaoLonga !!}
          </p>
        </div>
        <span class="block mb-1 text-lg font-semibold uppercase text-blue-600 dark:text-blue-500">
          {{ Number::currency($grupoSelecionado->precoGrupo, 'BRL') }}
        </span>
        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" 
            href="#">
          Adicionar ao Carrinho
        </a>
        <!-- End Title -->

       
      </div>
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Features -->
</div>
