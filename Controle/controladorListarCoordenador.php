<head>
    <link rel="stylesheet" type="text/css" href="../Visao/css/esttilosdelistas.css">
</head>
<header>Coordenadores</header>
<div class='corpolista'>


    <?php
// Atualizado em 09.11.2016.
    require_once '../Modelo/DAO/classeCoordenadorDAO.php'; //require_once, buscando informação na classeCoordenadorDAO.

    $novoCoordenadorDAO = new classeCoordenadorDAO();
    $coordenadores = $novoCoordenadorDAO->listarCoordenador();


    if (isset($coordenadores)) {
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
    }
    echo "</div>";
    ?>
