<head>
    <link rel="stylesheet" type="text/css" href="../Visao/css/esttilosdelistas.css">
</head>
<header>Professores</header>
<div class='corpolista'>



    <?php
    $nomeProfesssor = $_POST['nomeProfessor'];

    if (!isset($_SESSION["UsuarioLogado"])):
        session_start();
    endif;


    require_once '../Modelo/DAO/classeProfessorDAO.php';
    $novoProfessorDAO = new classeProfessorDAO();

    $professores = $novoProfessorDAO->pesquisarProfessorPorNome($nomeProfesssor);

    if (!empty($professores)) {

        foreach ($professores as $professor) {
            echo '<ul class="lista">';
            if (isset($_SESSION['UsuarioLogado']) && $_SESSION['PerfilUsuarLologado'] == 1):
                ?>

                <li class='excluir'>
                    <a href="controladorExcluirProfessor.php?idProfessor=<?php echo $professor->idprofessor; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">
                        <img src="../Visao/img/Close.png"></a></li>

                <?php
                echo "<li class='alterar'>"
                . "<a href='controladorAlterarProfessor.php?idProfessor="
                . $professor->idprofessor . "' onclick='return checkDelete()'>"
                . "<img src='../Visao/img/Att.png'></a></li>";

            endif;

            echo "<li class='nome'>";
            echo $professor->nome;
            echo "</li>";

            echo "<li class='cpf'>CPF: ";
            echo $professor->cpf;
            echo "</li>";

            echo "<li class='email'>EMAIL: ";
            echo $professor->email;
            echo "</li>";
            echo "<li class='imagem'>";
            echo "<img src='../Visao/img/prof.png'>";
            echo '</li>';


            echo "</ul>";
        }
    } else {
        echo "<div class='mensagemnadaencontrado'>Ninguem Encontrado!<br>";
        echo "<a href='../Visao/formBuscaProfessor.php'>Voltar</a>";
        echo "<div/>";
    }

    echo "</div>";
    ?>