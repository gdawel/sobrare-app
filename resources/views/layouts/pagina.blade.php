@include('layouts.header', ['siteConfigData' => $siteConfigData])

<main>
    
    <section class="do i hj">
          
        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `Título da Página`, 
                        sectionTitleText: `Lorem ipsum dolor sit amet, consectetur adipiscing elit. In convallis tortor eros. Donec vitae tortor lacus. Phasellus aliquam ante in maximus.`}">
                   <!-- Dawel: desabilitado     <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
                        </h2> 
                        <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p> -->
                    <div class="cegd gj">    
                        @isset($pagina->imagemPagina)
                            
                            <img class=" jj" src="{{ asset('storage/' . $pagina->imagemPagina )}}" alt="" />
                        
                        @endisset()
                        <div class="animate_top bb ze rj ki xn vq">
                            
                                <h2 class="fk vj pr kk wm on/5 gq/2 bb _b"> {{ $pagina->tituloPagina }}</h2> 
                                <p class="bb on/5 wo/5 hq">{!! $pagina->subtituloPagina !!}</p>
    
                        </div>
                    </div>


        </div>
        <!-- Section Title End -->

        <div class="bb ze ki xn yq mb en">
            <div class="ri li">
                

                {!! $pagina->conteudoPagina !!}

 

            </div>
        
        </div>
    </section>


</main>

@include('layouts.footer', ['siteConfigData' => $siteConfigData])