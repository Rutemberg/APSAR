<head>
    <link rel="stylesheet" type="text/css" href="../Visao/css/esttilosdelistas.css">
    <script src="../Visao/js/jquery-2.2.2.min.js"></script>
    <script src="../Visao/js/velocity.min.js"></script>
    <script src="../Visao/js/velocity.ui.js"></script>

</head>
<header>Alunos</header>
<div class='corpolista'>




    <?php
    if (!isset($_SESSION["UsuarioLogado"])):
        session_start();
    endif;


    $nomeAluno = $_POST['nomeAluno'];
    require_once '../Modelo/DAO/classeDiagnosticoDAO.php';
    require_once '../Modelo/DAO/classeAlunoDAO.php';
    $novoAlunoDAO = new classeAlunoDAO();

    $alunos = $novoAlunoDAO->pesquisarAlunoPorNome($nomeAluno);




    if (!empty($alunos)) {

        foreach ($alunos as $aluno) {
            echo '<ul class="lista" id="listaraluno">';
            if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 1):
                ?>

                <li class='excluir'>
                    <a href="controladorExcluirAluno.php?idAluno=<?php echo $aluno->idAluno; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">
                        <img src="../Visao/img/Close.png"></a></li>

                <?php
            endif;
            if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] == 1 || $_SESSION['PerfilUsuarLologado'] == 2)):

                echo "<li class='alterar'>"
                . "<a href='controladorAlterarAluno.php?idAluno="
                . $aluno->idAluno . "' onclick='return checkDelete()'>"
                . "<img src='../Visao/img/Att.png'></a></li>";
            endif;
            echo "<li class='nome'>";
            echo $aluno->nome;
            echo '</li>';

            echo "<li class='cpf'>MATRÍCULA: ";
            echo $aluno->matricula;
            echo '</li>';

            echo "<li class='email'>EMAIL: ";
            echo $aluno->email;
            echo '</li>';

            echo "<li class='imagem'>";
            echo "<img src='../Visao/img/student.png'>";
            echo '</li>';

            $novoDiagnosticoDAO = new classeDiagnosticoDAO();
            $diagnosticos = $novoDiagnosticoDAO->pesquisarDiagnosticoPorIDAluno($aluno->idAluno);

            if (isset($diagnosticos)):
                foreach ($diagnosticos as $diagnostico):
                    $nomearquivo = $diagnostico->arquivo;


                    $extensao = pathinfo($nomearquivo, PATHINFO_EXTENSION);
                    $novonome = substr($nomearquivo, 0, strrpos($nomearquivo, "."));

                    echo '<li class="diagnostico">';

                    echo '<div class="corpodiagnostico">';

                    echo '<div class="tipoarquivo">';
                    echo $extensao;
                    echo '</div>';



                    echo '<div class="nomearquivo">';
                    echo "ID:" . $novonome;
                    echo '</div>';

                    echo "<a href='../baixar.php?arquivo=Arquivos/" . $nomearquivo . "'>";
                    echo '<div class="download">';
                    echo '<img src="..//../Visao/img/downloadicon.png">';
                    echo '</div></a>';



                    if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] == 1 || $_SESSION['PerfilUsuarLologado'] == 2)):


                        echo '<div class="arquivodelete">';
                        echo "<a href='controladorExcluirDiagnostico.php?idDiagnostico=" . $diagnostico->id_diagnostico . "&" . "nomearquivo=" . $nomearquivo . "' onclick='return checkDelete()'>";
                        echo '<img src="..//../Visao/img/delete-2-xxl.png"></a>';
                        echo '</div>';


                        echo '<form id="formDiagnostico"
                           enctype="multipart/form-data"
                           name="formDiagnostico" 
                           onSubmit="return ValidaFormulario();"
                           method="POST" 
                           action="controladorAlterarDiagnostico.php">';

                        echo '<input id="idDiagnostico" name="idDiagnostico" type="hidden" 
                            value="' . $diagnostico->id_diagnostico . '">';
                        echo '<input id="idDiagnostico" name="nomearquivo" type="hidden" 
                            value="' . $nomearquivo . '">';
                        echo '<input id="arquivoc" name="arquivo" type="file"/>';
                        echo '<input type="submit" value="Alterar" id="botaosubmit">';
                        echo '</form>';

                        echo '</div>';

                    endif;
                    echo '</li>';
                endforeach;
            else:
                if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarLologado'] == 1 || $_SESSION['PerfilUsuarLologado'] == 2)):
                    echo '<li class="diagnostico">';

                    echo '<div class="corpodiagnostico">';

                    echo '<div class="cadastrararquivo">';

                    echo '<form id="formcadastroDiagnostico"
                           enctype="multipart/form-data"
                           name="formcadastroDiagnostico" 
                           onSubmit="return ValidaFormulario2();"
                           method="POST" 
                           action="controladorCadastrarDiagnostico.php">';
                    echo '<input id="idAluno" name="idAluno" type="hidden" 
                            value="' . $aluno->idAluno . '">';
                    echo '<label>Adicionar diagnóstico</label><input class="arquivo" name="arquivo" type="file"/>';
                    echo '<div class="copbririnput">';
                    echo '</div>';

                    echo '</div>';
                    echo '<input type="submit" value="" class="upload">';
                    echo '</form>';
                    echo '</div>';

                    echo '</li>';

                else:
                    echo '<li class="diagnostico">';

                    echo '<div class="corpodiagnostico" style="line-height: 60px;color:#a8a8a8;text-align: center;width: 500px;">';

                    echo 'Você não tem permissão para cadastrar um diagnostico!';
                    echo '</div>';

                    echo '</li>';
                endif;
            endif;

            echo "</ul>";
        }
    } else {
        echo "<div class='mensagemnadaencontrado'>Ninguem Encontrado!<br>";
        echo "<a href='../Visao/formBuscaAluno.php'>Voltar</a>";
        echo "<div/>";
    }
    ?>
</div>