<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entendendo a Neurodiversidade</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Reset e Estilos Globais */
        :root {
            --color-primary: #6D5BBA;
            --color-secondary: #8D58BF;
            --color-background: #F8F9FA;
            --color-hero-bg: #EAEBFF;
            --text-dark: #333;
            --text-light: #f8f9fa;
            --card-radius: 15px;
            --shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-background);
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Container Principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Seção Hero (Topo) */
        .hero {
            background-color: var(--color-hero-bg);
            border-radius: var(--card-radius);
            padding: 60px 30px;
            text-align: center;
            margin-bottom: 60px;
        }

        .hero h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .hero .operator {
            color: var(--color-primary);
        }

        .hero .subtitle {
            font-size: 1.2rem;
            color: #555;
            max-width: 600px;
            margin: 0 auto 30px auto;
        }

        .cta-button {
            display: inline-block;
            background-image: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
            color: var(--text-light);
            padding: 14px 35px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(109, 91, 186, 0.4);
        }
        
        /* Seção de Conteúdo e Cards */
        .content-section {
            text-align: center;
        }

        .content-section h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .intro-text {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto 60px auto;
            color: #444;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .card {
            color: var(--text-light);
            padding: 30px;
            border-radius: var(--card-radius);
            text-align: left;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        /* Cores dos Cards (inspirado na imagem) */
        .card-autismo {
            background-image: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
        }
        
        .card-tdah {
             background-image: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
        }

        .card-dislexia {
            background-image: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            color: rgba(0,0,0,0.5);
        }

        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1rem;
            flex-grow: 1; /* Garante que o texto ocupe o espaço */
        }
        
        .card .example {
            font-style: italic;
            background-color: rgba(255, 255, 255, 0.15);
            padding: 10px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 0.9rem;
        }
        
        /* Rodapé */
        footer {
            text-align: center;
            margin-top: 80px;
            padding: 20px;
            color: #888;
        }

        /* Responsividade para telas menores */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            .content-section h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <header class="hero">
            <h1>Neurodiversidade <span class="operator">+</span> Aceitação <span class="operator">=</span> Inovação</h1>
            <p class="subtitle">Descobrindo o potencial que existe em diferentes formas de pensar, sentir e interagir com o mundo.</p>
            <a href="#" class="cta-button">Quero Entender Mais</a>
        </header>

        <main class="content-section">
            <h2>O que é Neurodiversidade?</h2>
            <p class="intro-text">
                Imagine que os cérebros humanos são como sistemas operacionais de computador. A maioria das pessoas usa o "sistema" mais comum, mas outros usam sistemas diferentes, como Linux ou macOS. Nenhum é inerentemente melhor que o outro, eles apenas funcionam de maneiras distintas. Neurodiversidade é a ideia de que as variações neurológicas, como Autismo, TDAH e Dislexia, não são "defeitos", mas sim diferenças naturais na fiação do cérebro humano.
            </p>

            <h2>Tipos Comuns de Neurodivergência</h2>
            
            <div class="card-grid">

                <div class="card card-autismo">
                    <div class="card-icon">TEA</div>
                    <h3>Espectro do Autismo (TEA)</h3>
                    <p>
                        Pessoas no espectro autista processam informações de forma diferente. Isso pode se manifestar em uma comunicação mais direta e literal, interesses profundos e específicos (hiperfoco), e uma sensibilidade maior a estímulos como luz, som e texturas.
                    </p>
                    <div class="example">
                        <strong>Exemplo:</strong> Uma programadora que consegue focar intensamente por horas para resolver um problema complexo, mas que se sente desconfortável em festas barulhentas e com muita gente.
                    </div>
                </div>

                <div class="card card-tdah">
                    <div class="card-icon">TDAH</div>
                    <h3>Déficit de Atenção e Hiperatividade (TDAH)</h3>
                    <p>
                        O cérebro com TDAH é caracterizado pela busca por estímulos e por uma forma diferente de regular a atenção. Isso pode levar a uma mente cheia de ideias, criatividade, energia, mas também à dificuldade de manter o foco em tarefas repetitivas e à impulsividade.
                    </p>
                     <div class="example">
                        <strong>Exemplo:</strong> Um publicitário que tem ideias brilhantes e inovadoras para campanhas, mas que precisa de lembretes e prazos bem definidos para conseguir entregar os projetos finalizados.
                    </div>
                </div>

                <div class="card card-dislexia">
                    <div class="card-icon">DX</div>
                    <h3>Dislexia</h3>
                    <p>
                        Dislexia é uma diferença na forma como o cérebro processa a linguagem escrita. Não tem nada a ver com inteligência! Pessoas com dislexia podem ter dificuldade para ler com fluidez e decodificar palavras, mas frequentemente se destacam no raciocínio espacial, criatividade e resolução de problemas.
                    </p>
                     <div class="example">
                        <strong>Exemplo:</strong> Um arquiteto renomado que visualiza estruturas complexas em 3D com facilidade, mas que leva mais tempo para ler e revisar e-mails e relatórios escritos.
                    </div>
                </div>

            </div>
        </main>
        
        <footer>
            <p>&copy; {{ date('Y') }} - Conteúdo informativo sobre Neurodiversidade. Todos os direitos reservados.</p>
        </footer>

    </div>

</body>
</html>