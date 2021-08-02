<?php
//Inicia uma sessao
session_start();

//Se tiver alguem logado atribui o nome e perfil as variaveis
if (isset($_SESSION['UsuarioLogado'])):
    $NomeUsuarioLogado = $_SESSION['NomeUsuarioLogado'];
    $PerfilUsuarioLogado = $_SESSION['PerfilUsuarLologado'];
//    Se não ira ser redirecionado ao index
else:
    header("location: index.php");

endif;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!--        Estilos para formaytação da pagina-->
        <link rel="stylesheet" type="text/css" href="Visao/css/RestritoEstilo.css">
        <script src="Visao/js/jquery-2.2.2.min.js"></script>
        <script src="Visao/js/velocity.min.js"></script>
        <script src="Visao/js/velocity.ui.js"></script>

        <!--        Script para animaçao
                    Se o usuario passar o mouse no menu o conteudo ira desaparecer
                    
        -->
        <script type="text/javascript">
            $(document).ready(function () {
                $(".itemmenu").click(function () {
                    $('#logo').velocity('transition.fadeOut', 300);
                    $('#conteudoiframe').delay(1000).velocity('transition.slideRightIn', 300);
                });
                $("#menuesquerdo").mouseenter(function () {
                    $('#conteudoiframe').velocity('transition.slideRightOut', 300);
                    $('#logo').delay(1000).velocity('transition.fadeIn', 300);
                });
            });
        </script>

        <!--        Carrega a cada 1s a mensagem de nova atividade-->
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 1400);
            function carrega()
            {
                $('.carregaratividades').load('Listaratividadesnaovisualizadas.php');
            }

        </script>


    </head>
    <body>
        <nav id="menuesquerdo">
            <ul id="descricaolog">

                <li class="imglogin">
                    <?php
                    if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 1):
                        echo '<img src="Visao/img/adm.png">';
                    endif;
                    if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 2):
                        echo '<img src="Visao/img/Coordenator.png">';
                    endif;
                    if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 3):
                        echo '<img src="Visao/img/prof.png">';
                    endif;
                    ?>  

                </li>


                <li class="usuario">Logado como</li>
                <li class="logadocomo"><?php
                    if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 1):
                        echo 'Administrador';
                    endif;
                    if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 2):
                        echo 'Coordenador';
                    endif;
                    if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 3):
                        echo 'Professor';
                    endif;
                    ?></li>
                <li class="disciplina">
                    <?php
                    if (isset($_SESSION['UsuarioLogado']) && isset($_SESSION['DisciplinaUsuarLologado'])):
                        echo $_SESSION['DisciplinaUsuarLologado'];
                    endif;
                    ?>    
                </li>

            </ul>
            <ul class="menu">
                <?php if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 1): ?>

                    <li>Gerenciar Administrador
                        <ul class="submenu">
                            <div class="intenssubmenu">
                                <li>    <a href="Visao/formCadastroAdministrador.php" target="conteudo"  class="itemmenu">Cadastrar Administrador</a>
                                </li>
                                <li>    <a href="Visao/formBuscaAdministrador.php" target="conteudo" class="itemmenu">Buscar Administrador</a>
                                </li>
                                <li>    <a href="Controle/controladorListarAdministrador.php" class="itemmenu" target="conteudo">Listar Administrador</a>
                                </li>
                            </div>
                        </ul>
                    </li>

                <?php endif; ?>
                <?php if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] == 1)): ?>

                    <li>Gerenciar Coordenador
                        <ul class="submenu">
                            <div class="intenssubmenu">

                                <li>   
                                    <a href="Visao/formCadastroCoordenador.php" class="itemmenu" target="conteudo">Cadastrar Coordenador</a>
                                </li>                    
                                <li>   
                                    <a href="Visao/formBuscaCoordenador.php" class="itemmenu" target="conteudo">Buscar Coordenador</a>
                                </li>
                                <li>    <a href="Controle/controladorListarCoordenador.php" class="itemmenu" target="conteudo">Listar Coordenador</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] == 1 || $_SESSION['PerfilUsuarLologado'] == 2)): ?>
                    <li>Gerenciar Professor
                        <ul class="submenu">
                            <div class="intenssubmenu">
                                <?php if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 1): ?>


                                    <li>        <a href="Visao/formCadastroProfessor.php" class="itemmenu" target="conteudo">Cadastrar Professor</a>

                                    </li>
                                    <li>    <a href="Controle/controladorListarProfessor.php" class="itemmenu" target="conteudo">Listar Professor</a>    
                                        

                                    </li>
                                <?php endif; ?>

                                <li> <a href="Visao/formBuscaProfessor.php" class="itemmenu" target="conteudo">Buscar Professor</a>
                                           

                                </li>
                            </div>
                        </ul>
                    </li>
                <?php endif; ?>

                <li>Gerenciar Aluno
                    <ul class="submenu">
                        <div class="intenssubmenu">

                            <?php if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] == 1 || $_SESSION['PerfilUsuarLologado'] == 2)): ?>

                                <li>            <a href="Visao/formCadastroAluno.php" class="itemmenu" target="conteudo">Cadastrar Aluno</a>


                                </li>

                                <li>        <a href="Controle/controladorListarAlunos.php" class="itemmenu" target="conteudo">Listar Alunos</a> 
                                     
                                    
                                </li>
                            <?PHP endif; ?>
                                
                            <li>  <a href="Visao/formBuscaAluno.php" class="itemmenu" target="conteudo">Buscar Aluno</a>         


                            </li>
                        </div>

                    </ul>
                </li>
                <li>Atividades Adaptadas 
                    <div class="carregaratividades">
                        <?php
                        require_once 'Listaratividadesnaovisualizadas.php';
                        ?>
                    </div>
                    <ul class="submenu">
                        <div class="intenssubmenu">
                            <?php if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] == 1 || $_SESSION['PerfilUsuarLologado'] == 2)): ?>

                                <li>            <a href="Visao/formCadastroAtividadesAdaptadas.php" class="itemmenu" target="conteudo">Cadastrar Atividades</a>

                                </li>
                            <?php endif; ?>
                            <li>            <a href="Visao/formBuscaAtividadesAdaptadas.php" class="itemmenu" target="conteudo">Buscar Atividades</a>


                            </li>
                            <li>
                                <div class="carregaratividades" style="position: absolute;left: 27px;width: 11px;height: 11px;font-size: 6px;line-height: 11px;">
                                    <?php
                                    require_once 'Listaratividadesnaovisualizadas.php';
                                    ?>
                                </div>
                                <a href="Controle/controladorListarAtividadesAdaptadas.php?visualizado=1" class="itemmenu" target="conteudo">Listar Atividades</a>

                            </li>
                        </div>
                    </ul>  
                </li>  
                <?php if (isset($_SESSION['UsuarioLogado'])): ?>
                    <ul class="menuusuariologado">
                        <li style="font-weight: bolder;height: 30px;font-size: 12px;float: right;padding: 7px 10px;text-transform: uppercase">
                            <a href="Controle/controladorLogin.php?logout=1" style="color: #eee;text-decoration: none">Sair</a>
                        </li>
                        <li style="font-weight: bolder;height: 30px;font-size: 12px;float: right;padding: 7px 10px;color: #eee;text-transform: uppercase">
                            <?php echo $NomeUsuarioLogado ?>
                        </li>
                        <li style="font-weight: bolder;height: 30px;font-size: 15px;float: right;">
                            <!--<img src="Visao/img/User.png" style="height: 30px;width: auto">-->
                        </li>

                    </ul>
                <?php endif; ?>
        </nav>

        <section id="conteudodireito">
            <div style="width: 100%">
                <img src="Visao/img/LogoApsar.png" id="logo">
                <iframe id="conteudoiframe" name="conteudo">

                </iframe>
            </div>
        </section>


    </body>
</html>
