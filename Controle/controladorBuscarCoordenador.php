<head>
    <link rel="stylesheet" type="text/css" href="../Visao/css/esttilosdelistas.css">
</head>

<header>Coordenadores</header>

<div class='corpolista'>


    <?php
    $nomeCoordenador = $_POST['nomeCoordenador'];

    require_once '../Modelo/DAO/classeCoordenadorDAO.php';
    $novoCoordenadorDAO = new classeCoordenadorDAO();

    $coordenadores = $novoCoordenadorDAO->pesquisarCoordenadorPorNome($nomeCoordenador);


    if (!empty($coordenadores)) {

        foreach ($coordenadores as $coordenador) {
            echo '<ul class="lista">';
            ?>

            <li class='excluir'>
                <a href="controladorExcluirCoordenador.php?idCoordenador=<?php echo $coordenador->idcoordenador; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">
                    <img src="../Visao/img/Close.png"></a></li>

            <?php

            echo "<li class='alterar'>"
            . "<a href='controladorAlterarCoordenador.php?idCoordenador="
            . $coordenador->idcoordenador . "' onclick='return checkDelete()'>"
            . "<img src='../Visao/img/Att.png'></a></li>";

            echo "<li class='nome'>";
            echo $coordenador->nome;
            echo '</li>';

            echo "<li class='cpf'>CPF: ";
            echo $coordenador->cpf;
            echo '</li>';

            echo "<li class='email'>EMAIL: ";
            echo $coordenador->email;
            echo '</li>';

            echo "<li class='imagem'>";
            echo "<img src='../Visao/img/Coordenator.png'>";
            echo '</li>';
            echo "</ul>";
        }
    } else {
        echo "<div class='mensagemnadaencontrado'>Ninguem Encontrado!<br>";
        echo "<a href='../Visao/formBuscaCoordenador.php'>Voltar</a>";
        echo "<div/>";
    }

    echo "</div>";
    ?>

