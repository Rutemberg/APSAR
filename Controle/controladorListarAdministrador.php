<head>
    <link rel="stylesheet" type="text/css" href="../Visao/css/esttilosdelistas.css">
</head>
<header>Administradores</header>
<div class='corpolista'>

    <?php
    require_once '../Modelo/DAO/classeAdministradorDAO.php'; //require_once, buscando informação na classeAdministradorDAO.

    $novoAdministradorDAO = new classeAdministradorDAO();
    $administradores = $novoAdministradorDAO->listarAdministrador();


    if (isset($administradores)) {
        foreach ($administradores as $administrador) {
            echo '<ul class="lista">';
            ?>

            <li class='excluir'>
                <a href="controladorExcluirAdministrador.php?idAdministrador=<?php echo $administrador->idadministrador; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">
                    <img src="../Visao/img/Close.png"></a></li>

            <?php
            echo "<li class='alterar'>"
            . "<a href='controladorAlterarAdministrador.php?idAdministrador="
            . $administrador->idadministrador . "' onclick='return checkDelete()'>"
            . "<img src='../Visao/img/Att.png'></a></li>";

            echo "<li class='nome'>";
            echo $administrador->nome;
            echo '</li>';

            echo "<li class='cpf'>CPF: ";
            echo $administrador->cpf;
            echo '</li>';
            echo "<li class='email'>EMAIL: ";
            echo $administrador->email;
            echo '</li>';
            echo "<li class='imagem'>";
            echo "<img src='../Visao/img/Adm.png'>";
            echo '</li>';

            echo "</ul>";
        }
    }
    ?>
</div>