<head>
    <link rel="stylesheet" type="text/css" href="../Visao/css/Stilolistaatividade.css">
    <script src="../Visao/js/jquery-2.2.2.min.js"></script>
    <script src="../Visao/js/velocity.min.js"></script>
    <script src="../Visao/js/velocity.ui.js"></script>
    <script type="text/javascript">
// Validação
        function ValidaFormulario() {



            // email
            if (document.formResult.avaliacao.value == "") {
                alert("Avalie!");
                return false;
            }
            if (document.formResult.parecer.value == "") {
                alert("Digite seu parecer!");
                return false;
            }

            return true;
        }
    </script>

</head>
<header>Atividades</header>

<div id="corpolista">



    <?php
    require_once '../Modelo/DAO/classeAtividadesAdaptadasDAO.php';

    if (isset($_GET["visualizado"])):
        $visualizadoS = $_GET["visualizado"];
        $VisualizadoDAO = new classeAtividadesAdaptadasDAO();
        $visualizado = $VisualizadoDAO->Visualizado($visualizadoS);

    endif;


    if (!isset($_SESSION["UsuarioLogado"])):
        session_start();
    endif;
    require_once '../Modelo/DAO/classeAtividadesAdaptadasDAO.php';

    $novoAtividadesAdaptadasDAO = new classeAtividadesAdaptadasDAO();
    if (isset($_SESSION['DisciplinaUsuarLologado'])):
        $Disciplina = $_SESSION['DisciplinaUsuarLologado'];
        $atividades = $novoAtividadesAdaptadasDAO->listarAtividadesAdaptadas($Disciplina);

    else: $atividades = $novoAtividadesAdaptadasDAO->listarAtividadesAdaptadas();

    endif;


    if (isset($atividades)) {
        foreach ($atividades as $atividade) {
            $nomearquivo = $atividade->arquivoAtividadesAdaptadas;
            $extensao = pathinfo($nomearquivo, PATHINFO_EXTENSION);
            $novonome = substr($nomearquivo, 0, strrpos($nomearquivo, "."));

            echo '<ul class="lista">';

            echo '<li class="disciplina">';
            echo $atividade->disciplina;
            echo '</li>';

            echo '<li class="nome">';
            echo $atividade->nome;
            echo '</li>';

            echo '<div class="corpodesceArqu">';


            echo '<li class="arquivo">';
            echo '<div class="tipoarquivo">';
            echo $extensao;
            echo '</div>';



            echo '<div class="nomearquivo">';
            echo "ID:" . $novonome;
            echo '</div>';

            echo "<a href='../baixar.php?arquivo=ArquivosAtividades/" . $nomearquivo . "'>";
            echo '<div class="download">';
            echo '<img src="..//../Visao/img/downloadicon.png">';
            echo '</div></a>';
            echo '</li>';

            echo '</div>';


            echo '<li class="descricao">';
            echo $atividade->descricao;
            echo '</li>';


            if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] == 1 || $_SESSION['PerfilUsuarLologado'] == 2)):
                ?>

                <div style="width:245px;margin: 0 auto;margin-top: 10px;padding: 3px 0">
                    <a href='controladorExcluirAtividadesAdaptadas.php?idAtividadesAdaptadas=<?php echo $atividade->idatividadesAdaptadas; ?>&nomearquivo=<?php echo $nomearquivo; ?>' onclick="return confirm('Tem certeza que deseja excluir essa atividade?');">
                        <li class="delete">Deletar</li></a>

                    <?php
                    echo "<a href='controladorAlterarAtividadesAdaptadas.php?idAtividadesAdaptadas=" . $atividade->idatividadesAdaptadas . "' onclick='return checkDelete()'>";
                    echo '<li class="alterar">';
                    echo 'Alterar';
                    echo '</li></a>';
                    ?>
                </div>
                <?php
            endif;

            //aqui começa 

            if (isset($_SESSION['IdUsuarLologado'])):

                $IDprofessor = $_SESSION['IdUsuarLologado'];
                require_once '../Modelo/DAO/classeResultadoDAO.php';

                $ResultadosDao = new classeResultadoDAO();
                $Resultados = $ResultadosDao->pesquisarResultado($IDprofessor, $atividade->idatividadesAdaptadas);

                if (!isset($Resultados)):

                    echo '<div id="escreverresult">';
                    echo 'Avaliar resultado desta atividade';
                    echo '</div>';

                    echo '<div id="corpocadastroresult">';

                    echo '<header><img src="../Visao/img/prof.png"><h3>' .
                    $_SESSION['NomeUsuarioLogado']
                    . '</h3></header>';


                    echo '<form id="formResult"
                           name="formResult" 
                           onSubmit="return ValidaFormulario();"
                           method="POST" 
                           action="controladorCadastrarResultado.php">';

                    echo '<input id = "idAtividade" name = "idAtividade" type = "hidden"
            value = "' . $atividade->idatividadesAdaptadas . '">';

                    echo '<h4>Parecer</h4>';

                    echo '<textarea name="parecer" id="parecer"></textarea>';
                    echo '<input type="submit" value="Salvar" id="botaosubmit">';

                    echo '</form>';


                    echo '</div>';



                else:

                    foreach ($Resultados as $Resultado):
                        echo '<div id="escreverresult" style="background: #ffb233">';
                        echo 'Editar minha avaliação';
                        echo '</div>';

                        echo '<div id="corpocadastroresult" style="border-top: 1px solid #ffb233;border-bottom: 1px solid #ffb233"">';
                        echo '<a id="excluirResultado" href="controladorExcluirResultado.php?idResultado=' . $Resultado->idresultado . '"><img src="../Visao/img/delete-2-xxl.png"></a>';
                        echo '<header><img src="../Visao/img/prof.png"><h3>' .
                        $_SESSION['NomeUsuarioLogado']
                        . '</h3></header>';


                        echo '<form id="formResult"
                           name="formResult" 
                           method="POST" 
                           action="controladorAlterarResultado.php">';

                        echo '<input id = "idAtividade" name = "IdResultado" type = "hidden"
            value = "' . $Resultado->idresultado . '">';


                        echo '<h4>Parecer</h4>';

                        echo '<textarea name="parecer" id="parecer" style="outline-color: #ffb233">' . $Resultado->parecer . '</textarea>';
                        echo '<input type="submit" value="Alterar" id="botaosubmit" style="background: #ffb233">';

                        echo '</form>';


                        echo '</div>';

                    endforeach;


                endif;


            else:

                require_once '../Modelo/DAO/classeResultadoDAO.php';

                $IDAtividade = $atividade->idatividadesAdaptadas;
                $PesquisarporidResultDAO = new classeResultadoDAO();
                $Results = $PesquisarporidResultDAO->pesquisarResultadoPorID($IDAtividade);

                if (isset($Results)):
                    echo '<div id="escreverresult">';
                    echo 'Ver Resultados';
                    echo '</div>';
                    echo '<div id="corpocadastroresult">';
                    echo '<div id="corpocadastroresult2">';

                    foreach ($Results as $Result):
                        $IDprofessor = $Result->id_Professor;
                        $PesquisarpornomeprofessorDAO = new classeResultadoDAO();
                        $Resultsnomes = $PesquisarpornomeprofessorDAO->pesquisarnomeprofessor($IDprofessor);

                        foreach ($Resultsnomes as $Resultsnome):

                            echo '<header><img src="../Visao/img/prof.png"><h3>' .
                            $Resultsnome->nome
                            . '</h3></header>';


                            if ($Resultsnome->idprofessor == $Result->id_Professor):
                                echo '<div id="mensagemparecer">';
                                echo $Result->parecer;
                                echo '</div>';
                            endif;
                        endforeach;


                    endforeach;
                    echo '</div>';
                    echo '</div>';
                endif;
            endif;




            echo '</ul>';
        }
    }
    ?>
</div>