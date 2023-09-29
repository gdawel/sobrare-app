
@include('layouts.header', ['siteConfigData' => $siteConfigData])

<main>
    <!-- ===== Hero Start ===== -->
    <section class="gj do ir hj sp jr i pg">
        <!-- Hero Images -->
        <div class="xc fn zd/2 2xl:ud-w-187.5 bd 2xl:ud-h-171.5 h q r">
            <img src="images/shape-01.svg" alt="shape" class="xc 2xl:ud-block h t -ud-left-[10%] ua" />
            <img src="images/shape-02.svg" alt="shape" class="xc 2xl:ud-block h u p va" />
            <img src="images/shape-03.svg" alt="shape" class="xc 2xl:ud-block h v w va" />
            <img src="images/shape-04.svg" alt="shape" class="h q r" />
            <img src="images/hero4.png" alt="Woman" class="h q r ua" />
        </div>

        <!-- Hero Content -->
        <div class="bb ze ki xn 2xl:ud-px-0">
            <div class="tc _o">
                <div class="animate_left jn/2">
                    <h1 class="fk vj zp or kk wm wb">{{ $siteConfigData->cta1Titulo }}</h1>
                    <p class="fq">
                        {!! $siteConfigData->cta1TextoBase !!}
                    </p>

                    <div class="tc tf yo zf mb">
                        <a href="#support" class="ek jk lk gh gi hi rg ml il vc _d _l">{{ $siteConfigData->cta1TextoBotao }}</a>

                        <span class="tc sf">
                            <a href="#" class="inline-block ek xj kk wm"> {{ $siteConfigData->cta1TextoExtra }}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Hero End ===== -->

    <!-- ===== Seleciona qual sessão carregar na posição 1 da página principal ===== -->
    @isset($siteConfigData->sessionPosition1)

        @include ('layouts.' . $siteConfigData->sessionPosition1, ['siteConfigData' => $siteConfigData])

    @endisset
    
    <!-- ===== Seleciona qual sessão carregar na posição 2 da página principal ===== -->
    @isset($siteConfigData->sessionPosition2)

        @include ('layouts.' . $siteConfigData->sessionPosition2, ['siteConfigData' => $siteConfigData])

    @endisset

    <!-- ===== Seleciona qual sessão carregar na posição 3 da página principal ===== -->
    @isset($siteConfigData->sessionPosition3)

        @include ('layouts.' . $siteConfigData->sessionPosition3, ['siteConfigData' => $siteConfigData])

    @endisset

    <!-- ===== Seleciona qual sessão carregar na posição 4 da página principal ===== -->
    @isset($siteConfigData->sessionPosition4)

        @include ('layouts.' . $siteConfigData->sessionPosition4, ['siteConfigData' => $siteConfigData])

    @endisset

    <!-- ===== Seleciona qual sessão carregar na posição 5 da página principal ===== -->
    @isset($siteConfigData->sessionPosition5)

        @include ('layouts.' . $siteConfigData->sessionPosition5, ['siteConfigData' => $siteConfigData])
    @endisset
   
    <!-- ===== Seção de Contato ===== -->
    @include ('layouts.contato')

    
</main>

@include('layouts.footer', ['siteConfigData' => $siteConfigData])
