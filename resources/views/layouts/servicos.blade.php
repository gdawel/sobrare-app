<section class="lp kr">
    <!-- Section Title Start -->

    <div x-data="{ sectionTitle: `{{ $siteConfigData->servicosTitulo }}`, 
                    sectionTitleText: `{!! $siteConfigData->servicosResumo !!}`}">
        <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
            </h2>
            <p class="bb on/5 wo/5 hq">{!! $siteConfigData->servicosResumo !!}</p>

        </div>


    </div>
    <!-- Section Title End -->

    <div class="bb ze ki xn yq mb en">
        <div class="wc qf pn xo ng">
            <!-- Service Item -->
            @foreach ($servicos as $servico)
            <div class="animate_top sg oi pi zq ml il am cn _m">
                <img src="{{ URL::asset('/storage/' . $servico->icon) }}" alt="Icon" />
                <h4 class="ek zj kk wm nb _b">{{ $servico->titulo }}</h4>
                <p>{{ $servico->resumo }}</p>
            </div>
            @endforeach

            
        </div>
    </div>
</section>
<!-- ===== Services End ===== -->