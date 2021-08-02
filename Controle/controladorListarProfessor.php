<head>
    <link rel="stylesheet" type="text/css" href="../Visao/css/esttilosdelistas.css">
</head>
<header>Professores</header>
<div class='corpolista'>




    <?php
//Listar professor modificado dia 08.11.16
    require_once '../Modelo/DAO/classeProfessorDAO.php';

    $novoProfessorDAO = new classeProfessorDAO();
    $professores = $novoProfessorDAO->listarProfessor();


    if (isset($professores)) {
        foreach ($professores as $professor) {
            echo '<ul class="lista">';
            ?>

            <li class='excluir'>
                <a href="controladorExcluirProfessor.php?idProfessor=<?php echo $professor->idprofessor; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">
                    <img src="../Visao/img/Close.png"></a></li>

            <?php
            echo "<li class='alterar'>"
            . "<a href='controladorAlterarProfessor.php?idProfessor="
            . $professor->idprofessor . "' onclick='return checkDelete()'>"
            . "<img src='../Visao/img/Att.png'></a></li>";

            echo "<li class='nome'>";
            echo $professor->nome;
            echo "</li>";

            echo "<li class='cpf'>DISCIPLINA: ";
            echo $professor->disciplina;
            echo "</li>";

            echo "<li class='email'>EMAIL: ";
            echo $professor->email;
            echo "</li>";
            echo "<li class='imagem'>";
            echo "<img src='../Visao/img/prof.png'>";
            echo '</li>';


            echo "</ul>";
        }
    }
    echo "</div>";
    ?>

