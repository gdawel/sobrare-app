<!-- ===== About Start ===== -->
<section class="li uq 2xl:ud-py-3 pg">
    <div class="bb ze ki xn wq">
        <div class="tc wf gg qq">
            <!-- About Images -->
            <div class="animate_left xc gn gg jn/2 i">
                <div>
                    <img src="images/shape-05.svg" alt="Shape" class="h -ud-left-5 x" />
                    <img src="images/about-01.png" alt="About" class="ib" />
                    <img src="images/about-02.png" alt="About" />
                </div>
                <div>
                    <img src="images/shape-06.svg" alt="Shape" />
                    <img src="images/about-03.png" alt="About" class="ob gb" />
                    <img src="images/shape-07.svg" alt="Shape" class="bb" />
                </div>
            </div>

            <!-- About Content -->
            <div class="animate_right jn/2">
                <h4 class="ek yj mk gb">{{ $siteConfigData->aboutChamada }}</h4>
                <h2 class="fk vj zp pr kk wm qb">{{ $siteConfigData->aboutTitulo }}</h2>
                <p class="uo">{!! $siteConfigData->aboutResumo !!}</p>

                <a href="{{ $siteConfigData->aboutLinkBotao }}" data-fslightbox class="vc wf hg mb">
                    <span class="tc wf xf be dd rg i gh ua">
                        <span class="nf h vc yc vd rg gh qk -ud-z-1"></span>
                        <img src="images/icon-play.svg" alt="Play" />
                    </span>
                    <span class="kk">{{ $siteConfigData->aboutTextoBotao }}</span>
                </a>
            </div>
        </div>
    </div>
</section>