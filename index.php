<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Projeto Integrador</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="folhadeestilo.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="script.js" defer></script>
</head>

<!-- menu e logomarca -->

<body>
    <div id="index.html" class="principal">
        <header>
            <div class="logo_redondo">
                <img src="imagens/logo.png" alt="logo redondo">
            </div>

            <div class="nome_empresa">
                <img src="imagens/logotitulo.png">
            </div>


            <nav>
                <ul>
                    <li><a href="#index.html">Home</a></li>
                    <li><a href="#planos">Planos</a></li>
                    <li><a href="#pag-sobre">Sobre</a></li>
                    <li><a href="#rodape">Contato</a></li>
                    <li><a href="#openmodal1" style="background-color: #FF0000; border-radius: 15px; padding: 2px 15px;">Teste sua velocidade</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <!-- whatsapp fixo sempre na tela -->

    <div class="whatsapp_logo">
        <a href="https://web.whatsapp.com/send?phone=5581986271986" target="_blank" rel="noopener">
            <img src="imagens/whatsapp_logo.png" alt="whatsapp logo">
        </a>
    </div>

    <!-- aqui começa pagina home -->

    <div class="slider">

        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">

            <div class="slide primeiro">
                <img src="imagens/SL1.jpg" alt="Imagem ilustrativa plano 50 mega">
            </div>
            <div class="slide">
                <img src="imagens/SL2.jpg" alt="Imagem ilustrativa plano 100 mega">
            </div>
            <div class="slide">
                <img src="imagens/SL3.jpg" alt="Imagem ilustrativa plano 200 mega">
            </div>
            <div class="slide">
                <img src="imagens/SL4.jpg" alt="Imagem ilustrativa plano 400 mega">
            </div>

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>

        </div>

        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>

    </div>

    <!-- aqui começa pagina planos -->

    <section id="planos">

        <div class="banner_planos">
            <img src="imagens/PL1.jpg" alt="Imagem ilustrativa fundo planos">
        </div>

        <div class="planoPL2">
            <img src="imagens/PL2.png" alt="Imagem ilustrativa de planos">
        </div>

        <div class="planoPL3">
            <img src="imagens/PL3.png" alt="Imagem ilustrativa de planos">
            <h1>400 mega</h1>
            <h2>Sempre ativo<br>
                Pra você</h2>
            <p>Planos básicos a partir<br>
                de R$ 70,00
            </p>
        </div>

        <div class="planoPL4">
            <img src="imagens/PL4.png" alt="Imagem ilustrativa de planos">
        </div>

        <div class="planoPL5">
            <img src="imagens/LP5.png" alt="Imagem ilustrativa de planos">
        </div>

        <div class="planoPL6">
            <img src="imagens/LP6.png" alt="Imagem ilustrativa de planos">
        </div>

        <div class="planoPL7">
            <img src="imagens/LP7.png" alt="Imagem ilustrativa de planos">
        </div>

        <div class="planoPL8">
            <img src="imagens/LP8.png" alt="Imagem ilustrativa de planos">
        </div>

        <div class="planoPL9"></div> <!-- Balão maior -->
        <div class="planoPL9_borda"></div> <!-- Linha do Balão maior -->

        <div class="planoPL10"></div> <!-- Balão interno -->
        <div class="planoPL11"></div> <!-- Balão interno -->
        <div class="planoPL12"></div> <!-- Balão interno -->

        <div class="planoPL13">
            <img src="imagens/visto.png" alt="visto">
            <h3>Plano Premium 100mb</h3>
            <p>Exelente para você que navega sem limites muito<br>
                usados para pesquisas, e-mail, rede sociais e etc.
            </p>
        </div>

        <div class="planoPL14">
            <img src="imagens/visto.png" alt="visto">
            <h3>Plano Extra Top 200mb</h3>
            <p>Muito top para você que joga on-line, filmes, series<br>
                entre outros.
            </p>
        </div>

        <div class="planoPL15">
            <img src="imagens/visto.png" alt="visto">
            <h3>Plano Maximus 400mb</h3>
            <p>Tudo em um só plano, pelo menor preço e qualidade<br>
                Nesse plano você só tem a ganhar.
            </p>
        </div>

        <div class="assine">
            <a href="#enviar_contato"><b id="piscando">ASSINE JÁ</b></a>
        </div>

    </section>

    <!-- aqui comeca os pop-ups -->

    <div id="openmodal" class="modalDialog1">
        <div>
            <a href="#close" class="close">X</a>
            <h1>Tudo sobre fibra óptica</h1>
            <p>Para começar, vamos falar mais sobre o conceito de internet fibra óptica:</p>
            <p>É um meio de transmissão que permite o tráfego de dados com altíssima velocidade, próxima à
                velocidade da
                luz.</p>
            <p>Os cabos são compostos por feixes de vidro, tão finos quanto um fio de cabelo humano, revestidos de
                plástico reflexivo e isolante.</p>
            <img src="imagens/cabo.png" alt="Imagem ilustrativa fibra optica">
        </div>
    </div>

    <div id="openmodal1" class="modalDialog2">
        <div>
            <a href="#close" title="Close" class="close">X</a>
            <iframe frameborder='0' height='545px' scrolling='no' src='https://www.testeavelocidade.net/p/velocimetro-widget.html' width='100%' /><br />
            <font size="2" face="Arial"> O <a href='https://www.testeavelocidade.net' rel='noopener' style='text-decoration:none;font-size: 14px;font-weight: 700;' target='_blank'>Teste de
                    Velocidade</a>
            </font>
            </iframe>
        </div>
    </div>

    <div id="openmodal2" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close">X</a>
            <h2>Como funciona um roteador?</h2>
            <p>Imagine que tudo o que você faz na internet, como downloads e uploads de arquivos, precisa ter
                pacotes em
                circulação. Para qualquer página que você deseja abrir, tudo circula por essa rede sem fio.<br>
            <p>roteador funciona orientando os dados de rede através de pacotes que contém diversos tipos de dados.
                Estes pacotes têm várias camadas ou seções que contêm informações de identificação como:</p>
            <ul>
                <li>Remetente</li>
                <li>Tipos de dados</li>
                <li>Tamanho</li>
                <li>Endereço IP de destino</li>
            </ul>
            <p>O aparelho lerá essa camada e escolherá a melhor rota a ser utilizada para cada transmissão.</p>
            <p>Sua principal característica é buscar as melhores rotas para enviar ou receber os dados, dando
                prioridade
                por transmissões mais curtas.</p>
            </p>
        </div>
    </div>

    <div id="enviar_contato" class="modalDialog3">
        <script>
            function mostra() {
                document.getElementById('enviar_formulario').style.display = 'none';
                document.getElementById('sucesso').style.display = 'block';
            }
        </script>
        <form id="enviar_formulario" name="email" method="POST" action="enviar.php">
            <a href="#close" class="close">X</a>
            <h1>Entre em contato</h1>
            <p>Preencha o formulário abaixo e entraremos em<br>contato com você</p>

            <div class="input-single">
                <input type="text" name="nome" id="nome-box" class="input" autocomplete="off" maxlength="40" required>
                <label for="nome-box">Nome completo</label>
            </div>

            <div class="input-single">
                <input type="text" name="telefone" id="telefone-box" class="input" autocomplete="off" maxlength="15" onkeyup="mascaraTelefone('(  )     -    ', this)" required>
                <label for="telefone-box">Telefone</label>
                <script src="mascara.js"></script>
            </div>

            <div class="input-single">
                <input type="text" name="email" id="email-box" class="input" autocomplete="off" maxlength="40" required>
                <label for="email-box">e-mail</label>
            </div>

            <div class="input-single">
                <textarea type="text" name="mensagem" rows="6" cols="25" id="mensagem-box" class="textarea" autocomplete="off" maxlength="255" required></textarea>
                <label for="mensagem-box">Deixe aqui uma mensagem...</label>
            </div>

            <div class="btn">
                <input type="submit" name="enviar" value="Enviar" onClick="mostra()">
            </div>
        </form>

        <div id="sucesso" class="envio_sucesso" onClick="mostra()">
            <a href=" #close" class="close">X</a>
            <img src="imagens/carta.png">
            <h3>Sua mensagem foi enviada com sucesso!</h3>
            <h5>Em breve entraremos em contato</h5>
            <p>Obrigado!</p>
            <div class="visto">
                <img src="imagens/visto.png" alt="visto ok">
            </div>
        </div>
    </div>

    <!-- aqui comeca pagina sobre -->

    <div id='pag-sobre'>

        <div class='img-titulo'>
            <img src="imagens/sob.png" alt="imagem de sobre">
        </div>

        <section id="container-sobre">
            <div id="txt-sobre">
                <p>Nossa missão é fornecer um serviço de qualidade sem oscilação e sem intervenções, tendo você como
                    nosso principal cliente.<br><br>Fundada em 2010, na cidade de Paulista - PE, somos uma empresa
                    especializada no serviço de telecomunicações. Atuando na área de internet banda larga e
                    homologados
                    pela ANATEL.<br><br>Aplicando tecnologia avançada e inovadoras, sempre estamos comprometidos em
                    prestar um serviço de qualidade, com segurança de dados produtividade e redução de custos para a
                    satisfação de nossos clientes, seja residencial ou corporativo.
                </p>
            </div>
            <div id='img-conteudo-sobre'>
                <img src="imagens/sobre_2.jpg" alt="Imagem ilustrativa do sobre">
            </div>
        </section>
    </div>

    <!-- mapa -->

    <div id="mapa">
        <div class="mapa">
            <div class="quadro">
                <img src="imagens/quadro.png" alt="Imagem do mapa">
            </div>

            <div class="mulher">
                <img src="imagens/mulher.png" alt="Imagem ilustrativa do mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1602.6824106147901!2d-34.840956998483136!3d-7.898244195051964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab3e4a766c6085%3A0x33c7226231628883!2sARTE%20EM%20PC%20Tecnologia!5e0!3m2!1spt-BR!2sbr!4v1665888290752!5m2!1spt-BR!2sbr" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <h2>Venha nos conhecer</h2>
                <p>Av. Antonio Cabral de Souza, 7392 H<br>Lot. Conceição Paulista - PE<br>(81) 3435.6078 /
                    98627.1986
                </p>
            </div>
        </div>
    </div>

    <!--rodapé da página-->

    <footer id="rodape">
        <img src="imagens/rodape.jpg" alt="Imagem ilustrativa do rodape">
        <div class="footer-texto">
            <h3>Menu</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#planos">Nossos planos</a></li>
                <li><a href="#pag-sobre">Sobre a empresa</a></li>
            </ul>
        </div>

        <div class="footer-texto">
            <h3>Fale Conosco</h3>
            <ul>
                <li>(81) 3435-6078</li>
                <li>arteempc.com.br</li>
                <li><a href="mailto:tecnologia@arteempc.com.br" target="_blank" rel="noopener">tecnologia@arteempc.com.br</a></li>
            </ul>
        </div>

        <div class="footer-texto">
            <h3>Saiba Mais</h3>
            <ul>
                <li><a href="#openmodal">Fibra óptica</a></li>
                <li><a href="#openmodal2">O que é roteador</a></li>
                <li><a href="#openmodal1">Teste sua velocidade</a></li>
            </ul>
        </div>

        <div class="footer-texto">
            <h3>Segue lá</h3>
            <div class="sociais">
                <ul>
                    <li><a href="https://www.facebook.com/ARTEEMPC/" target="_blank" rel="noopener">
                            <img src="imagens/icoface.png" alt="facebook">
                        </a></li>
                    <li><a href="https://www.instagram.com/arteempc/" target="_blank" rel="noopener">
                            <img src="imagens/icoinsta.png"><b id="instagram"></b>
                        </a></li>
                </ul>
            </div>
        </div>

        <div class="developer">
            <p>Desenvolvedores do Projeto | Valdery Silva | Gideone Berg | Thamíris Albuquerque</p>
        </div>
    </footer>

</body>

</html>