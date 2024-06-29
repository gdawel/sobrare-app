{{--  
    Autor:  George Dawel
    Data:   Fev/2024
    Notas:  Este é o controlador principal do site sobrare.com.br.
            Desenvolvido com:
            - Laravel 10: framework base de toda a aplicação.
            - FilamentPHP 3: para o painel de administração, aonde são feitas as configurações da página principal
                             em siteConfiguration.
            - Livewire 3: utilizado para as páginas dos testes de Neurodivergência.
--}}


{{-- Aqui é incluído o cabeçalho do site principal e passadas as configurações para montar a página principal,
     configurações estas que vem do HomeController --}}
@include('layouts.header', ['siteConfigData' => $siteConfigData])

<main>
    <!-- ===== Hero Start ===== -->
    <section class="gj do ir hj sp jr i pg">
        <!-- Hero Images -->
        
        <div class="xc fn zd/2 2xl:ud-w-187.5 bd 2xl:ud-h-171.5 h q ba">
             <img src="images/especialistas-reduz.jpg" alt="Especialistas em Resiliência" class="h q b ua" />
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
                            <a href="#" class="inline-block ek xj kk wm"> {{ $siteConfigData->cta1TextoExtra }}</a>
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
