<?php
//Inicio da sessão

session_start();

/* * Verifica se há alguem logado e se o perfil for maior ou igual a 1, se for a pagina ira redirecionar
 * o usuario para o restrito
 * */

if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] >= 1)):
    header('location:Restrito.php');

endif;
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>APSAR</title>
        <link rel="shortcut icon" href="Visao/img/LogoApsar.ico" type="image/x-icon">
        <link rel="icon" href="Visao/img/LogoApsar.ico" type="image/x-icon">
        <!--Formatação da página-->
        <link rel="stylesheet" href="Visao/bootstrap/css/bootstrap.css">

        <!--        Css do carousel-->
        <link href="Visao/js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="Visao/js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.theme.css" rel="stylesheet">
<!--        <script src="Visao/bootstrap/js/bootstrap.js"></script>
        <script src="Visao/bootstrap/js/bootstrap.min.js"></script> -->
        <script src="Visao/js/jquery-2.2.2.min.js"></script>
        <script src="Visao/js/velocity.min.js"></script>
        <script src="Visao/js/velocity.ui.js"></script>

        <!--        Css do estilo do index-->
        <link rel="stylesheet" type="text/css" href="Visao/css/estilos.css">

        <!--        Codigo java script para scrool, quando o usuario clicar em continuar a pagina ira executar um scroll até o elemento-->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#continuar").click(function () {
                    $('.quemsomos2').velocity('transition.slideDownIn', 100);

                    $('html, body').animate({
                        scrollTop: $(".quemsomos").offset().top
                    }, 1000);

                    $('.voltaraotopo').delay(1500).velocity('transition.slideUpIn', 100);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#materiais").click(function () {
                    $('.materialescolar').velocity('transition.slideDownIn', 100); 
//                    quando clicar em materiais ele ira abrir em animaçao sliddown

                    $('html, body').animate({
                        scrollTop: $(".materialescolar2").offset().top
                    }, 1000);
                });
            });
        </script>


    </head>
    <body>  
        <?php
        if (isset($_SESSION['UsuarioLogado'])): //** se tiver algo na sessao usuariologado **//
            $NomeUsuarioLogado = $_SESSION['NomeUsuarioLogado']; //** Atribui os valores que há na sessão nessas variaveis nome e o perfil **//
            $PerfilUsuarioLogado = $_SESSION['PerfilUsuarLologado'];

        endif;
        ?>
        <!--inicio Topo-->
        <header id="cabecalho">
            <div style="width: 1100px; margin: 0 auto;height: 170px;position: relative">
                <nav class="menutop">
                    <ul class="login">
                        <?php if (!isset($_SESSION['UsuarioLogado'])): ?>

                            <!--                        Form login-->
                            <li style="padding: 0;margin: 0"> 
                                <form id="formLogin"   
                                      name="formLogin" 
                                      method="POST" 
                                      action="Controle/controladorLogin.php">
                                    <fieldset>
                                        <input id="email" name="email" type="text" placeholder="Email"
                                               value="" style="border-right: 1px solid #ccc">

                                        <input id="senha" name="senha" type="password" placeholder="Senha"
                                               value="">
                                        <input type="submit" value="Fazer Login">
                                    </fieldset>
                                </form>
                            </li>


                        <?php endif; ?>

                    </ul>
                </nav>
                <a href="index.php"><div class="imgbanner"><img src="Visao/img/LogoApsar.png"></div></a>

                <!--                Menu-->
                <nav class="menulateral">
                    <?php if (!isset($_SESSION['UsuarioLogado'])): ?>

                        <ul class="menu">
                            <li>Home

                            </li>
                            <!--<li>Sobre a escola

                            </li>-->
                            <li id="materiais">Materiais

                            </li>
                            <li>Matricula

                            </li>

                        </ul> 
                        <ul class="menuimg">
                            <li class="imgicon"><img src="Visao/img/6.png"></li>
                            <li class="imgicon"><img src="Visao/img/7.png"></li>
                            <li class="imgicon"><img src="Visao/img/8.png"></li>


                        </ul>   
                    <?php endif; ?>

                </nav>

            </div>
        </header>


        <!--        Carrousel-->
        <div id="owl-demo" class="owl-carousel owl-theme" style="  background: radial-gradient(circle, white, #eee);padding-top: 20px;">
            <div class="item"  style="text-align: center;margin: 0 auto; padding: 0;width: 100%;height: 500px"><img src="Visao/img/education1.jpg" style="width: 1100px;height: auto"></div>
            <div class="item"  style="text-align: center;margin: 0 auto; padding: 0;width: 100%;height: 500px"><img src="Visao/img/education2.jpg" style="width: 1100px;height: auto"></div>
            <div class="item"  style="text-align: center;margin: 0 auto; padding: 0;width: 100%;height: 500px"><img src="Visao/img/education3.jpg" style="width: 1100px;height: auto"></div>
            <div class="item"  style="text-align: center;margin: 0 auto; padding: 0;width: 100%;height: 500px"><img src="Visao/img/education4.jpg" style="width: 1100px;height: auto"></div>
        </div>



        <!--        Sobre a escola-->
        <section id="sobreaescola" >
            <div class="informacoessobreaescola">
                <header>
                    <img src="Visao/img/prof.png">
                    <h3> Profissionais </h3>
                </header>
                <article style="padding: 0px 20px;">
                    <br>

                    A escola é formada por profissionais de diversar áreas: psicologia, 
                    pedagocia, psicopedagogo, assistentes sociais, também contamoos com professores
                    renomados formados nas áreas de exatas e humanas.
                </article>
            </div>
            <a>
                <div class="informacoessobreaescola">
                    <header>
                        <img src="Visao/img/group.png">
                        <h3> Quem somos? </h3>
                    </header>  
                    <article id="continuar" style="padding: 0px 20px">
                        <br> 
                        A escola busca estimular a socialização, a inclusão, a expansão de conhecimentos e a capacidade 
                        criadora, buscando desenvolver nos alunos responsabilidade social e competência
                        para serem no futuro, bons profissionais.<br><br>

                        <b> Continuar </b>
                    </article>
                </div>
            </a>
            <div class="informacoessobreaescola">
                <header>
                    <img src="Visao/img/phone-icon.png">
                    <h3> Contato </h3>
                </header>  
                <article>
                    <b>Matutino:</b> 8:00 às 11:00hs<br>
                    <b>Vespertino:</b> 14:00 às 18:00hs<br>
                    <b>Noturno:</b> 19:00 às 21:30hs<br><br>

                    <b>Para mais informações:</b><br>
                    Telefone: (61) 3901-3734 / 3901-3744<br><br>
                    <b> Email: </b>direcao@cem02.net

                </article>
            </div>

        </section>

        <section id="quemsomos">
            <div style="width: 1100px;margin: 0 auto">
                <header>Nossos objetivos</header>
                <article>
                    Queremos uma escola com acessibilidade para todos, 
                    que colabore para a formação da cidadania, no exercício dos direitos
                    e deveres de seus atores. Uma escola que ofereça um ensino interdisciplinar,
                    contextualizado ao meio em que vivem os alunos, capaz de qualificá-los para 
                    o trabalho, a partir de uma educação integral, nas suas dimensões ética,
                    moral e afetiva. Queremos uma escola que atenda e valorize o ser humano,
                    repudie a discriminação. Que desenvolva as competências necessárias
                    para o homem viver na sociedade atual, abrangendo as relações sociais, existenciais,
                    afetivas, de status e de poder. Queremos uma escola que desenvolva hábitos sustentáveis,
                    nos aspectos ecológicos, nas relações sociais, políticas e econômicas. Enfim, queremos uma escola pública e de qualidade para todos,
                    munida dos recursos materiais, humanos e financeiros necessários ao cumprimento de sua
                    missão de oferecer uma educação para a vida.
                </article>
            </div>
        </section>


        <section class="quemsomos" id="quemsomos" >
            <div class="quemsomos2">
                <header>Quem somos?</header>
                <article>
                    Somos todos iguais, buscamos a inclusão social, estimular a reflexão, a expansão de conhecimentos e a capacidade 
                    criadora, buscando desenvolver nos alunos responsabilidade social e competência,
                    para serem no futuro, bons profissionais.<br>
                    Somos um centro de formação multidisciplinar com o propósito de educação continuada
                    em diálogo com as solicitações do mundo contemporâneo.<br>
                    Oferecemos atividades que privilegiam a socialização, inovação e a aproximação entre conteúdos
                    e o mercado de trabalho, atendendo a demanda do perfil do aluno,
                    de maneira a capacitá-lo para a vida.
                </article>
            </div>
        </section>
        <!--        Material escolar    -->
        <div class="materialescolar2">
        <div class="materialescolar">
            <header>Material escolar</header>
            <ul class="listademateriais">
                <li style="margin-left: 100px">
                    Borracha                    
                </li>

                <li style="margin-left: 150px">
                   Canetas                   
                    
                </li>
                <li style="margin-left: 200px">
                    Caderno                    
                </li>
                <li style="margin-left: 250px">
                    Caderno de Desenho         
                    
                </li>
                <li style="margin-left: 300px">
                    Corretivo
                </li>
                <li style="margin-left: 350px">
                    Lápis
                </li>
                <li style="margin-left: 400px">
                    Lápis de Cor
                    
                </li>
                <li style="margin-left: 450px">
                    Marcador
                </li>
                <li style="margin-left: 500px">                    
                    Resma
                </li>
                <li style="margin-left: 550px">
                    Réguas
                </li>
                
            </ul>
        </div>
        </div>

        <!--        Rodapé-->
        <footer>
            <img src="Visao/img/Governo-de-Brasilia-logo-2015.png">
            <h3>Apsar</h3>
        </footer>

        <!--        Codigo para chamar o carousel-->
        <script src="Visao/js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.js"></script> 
        <script>
            $(document).ready(function () {

                $("#owl-demo").owlCarousel({
                    navigation: false, // Show next and prev buttons
                    pagination: true,
                    slideSpeed: 1000,
                    paginationSpeed: 1500,
                    autoPlay: true,
                    stopOnHover: true,
                    items: 1,
                    itemsDesktop: false,
                    itemsDesktopSmall: false,
                    itemsTablet: false,
                    itemsMobile: false

                });

            });
        </script>
    </body>

</html>
