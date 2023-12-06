@include('layouts.header', ['siteConfigData' => $siteConfigData])

<main>
    <!-- Section Title Start -->
    <section class="lp">
        <div class="jigd gp uq">
            <div x-data="{ sectionTitle: `Artigos e Publicações`, 
                            sectionTitleText: `Nas publicações da SOBRARE você encontra nossos artigos, bem como artigos de outros pesquisadores
                            na área da resiliência. Navegue nos artigos abaixo para ver as últimas publicações, ou selecione por Categoria.`}">
                <div class="animate_top bb ze rj ki xn vq">
                    <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
                    </h2>
                    <p class="bb on/5 cegd wo/5 hq" x-text="sectionTitleText"></p>
                </div>
            </div>
            <div class="bb on/5 ze rj sf xf cb mi">
                    <a class="sl ki" href="{{ url ('/publicacoes') }}">Ver Todas</a>
                @foreach ($categorias as $categoria)
                    <a class="sl ki" href="{{ url ('/blogPorCategoria/' . $categoria->id) }}">{{ $categoria->title }}</a>
                @endforeach
        </div>
    </section>
    <!-- Section Title End -->


    <!-- ===== Blog Grid Start ===== -->
    <section class="ki hi">
        <div class="bb ye ki xn vq lb">
            <div class="wc qf pn xo zf iq">
                
                <!-- Blog Item -->
                
                @foreach($artigos as $artigo)
               
                <div class="animate_top sg vk rm xm">
                    <div class="c rc i z-1 pg">
                        <img class="w-full" src="{{ URL::asset('/storage/' . $artigo->thumbnail) }}" alt="Blog" />

                        <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                            <a href="{{ url ('/publicacoes/' . $artigo->id) }}" class="vc ek rg lk gh sl ml il gi hi">Leia Mais</a>
                        </div>
                    </div>

                    <div class="yh">
                        <div class="tc uf wf ag jq">
                            <div class="tc wf ag">
                                <img src="{{ URL::asset('/storage/icon-man.svg') }}" alt="Autor(a)" />
                                <p>{{ $artigo->autor }}</p>
                            </div>
                            <div class="tc wf ag">
                                <img src="{{ URL::asset('/storage/icon-calender.svg') }}" alt="Publicado em" />
                                <p>Publicado em: {{ Carbon\Carbon::parse($artigo->published_at)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <h4 class="ek tj ml il kk wm xl eq lb">
                            <a href="{{ url ('/publicacoes/' . $artigo->id) }}">{{ $artigo->title }}</a>
                        </h4>
                    </div>
                </div>
                @endforeach

            
            </div>
            
            <div class="mb lo bq i ua">
            {{ $artigos->links() }}
            </div>
            
            <!-- Pagination -->
            <!-- Dawel 06/12/2023
            <div class="mb lo bq i ua">
                <nav>
                    <ul class="tc wf xf bg">
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#">
                                <svg class="th lm ml il" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.93884 6.99999L7.88884 11.95L6.47484 13.364L0.11084 6.99999L6.47484 0.635986L7.88884 2.04999L2.93884 6.99999Z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#">
                                2
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#">
                                3
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#">
                                4
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#">
                                ...
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#">
                                12
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#">
                                <svg class="th lm ml il" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.06067 7.00001L0.110671 2.05001L1.52467 0.636014L7.88867 7.00001L1.52467 13.364L0.110672 11.95L5.06067 7.00001Z" fill="#fefdfo" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            -->
            <!-- Pagination -->
        </div>

        
    </section>
    <!-- ===== Blog Grid End ===== -->
    
    
    


@include('layouts.footer', ['siteConfigData' => $siteConfigData])