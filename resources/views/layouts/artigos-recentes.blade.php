<section class="ji gp uq">
    <!-- Section Title Start -->
    <div x-data="{ sectionTitle: `Novidades e Artigos Recentes do Nosso Blog`, sectionTitleText: `Leia ou assista o que temos publicado regularmente sobre o tema de resiliência, bem como as pesquisas mais recentes sobre o tema.`}">
        <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
            </h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
        </div>


    </div>
    <!-- Section Title End -->

    <!-- Nome dos campos da tabela Artigos
        'title',
        'slug',
        'thumbnail',
        'body',
        'active',
        'published_at',
        'user_id',
        'categorias' -->

    <div class="bb ye ki xn vq jb jo">
        <div class="wc qf pn xo zf iq">
            <!-- Blog Item -->
            @foreach($artigos as $artigo)

            <div class="animate_top sg vk rm xm">
                <div class="c rc i z-1 pg">
                    <img class="w-full" src="{{ URL::asset('/storage/' . $artigo->thumbnail) }}" alt="Blog" />

                    <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                        <a href="{{ url ('/publicacoes/' . $artigo->id) }}" class="vc ek rg lk gh sl ml il gi hi">Continue lendo</a>
                    </div>
                </div>

                <div class="yh">
                    <div class="tc uf wf ag jq">
                        <div class="tc wf ag">
                            <img src="images/icon-man.svg" alt="User" />
                            <p>{{ $artigo->autor }}</p>
                        </div>
                        <div class="tc wf ag">
                            <img src="images/icon-calender.svg" alt="Calender" />
                            <p>{{ Carbon\Carbon::parse($artigo->published_at)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <h4 class="ek tj ml il kk wm xl eq lb">
                        <a href="./blogSinglePost.php">{{ $artigo->title }}</a>
                    </h4>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- ===== Blog End ===== -->