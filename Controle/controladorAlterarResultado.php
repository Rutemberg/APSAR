<?php

require_once '../Modelo/DAO/classeResultadoDAO.php';
$resultadoDAO = new classeResultadoDAO();


if (isset($_GET['idresultado'])) {
    $idresultado = $_GET['idresultado'];
    $resultadoDAO->buscarresultadoPorId($idresultado);
    header('Location:../Visao/formAlterarResultado.php');
} else {
    
    $idresultado = $_POST['IdResultado'];
    $parecerResultado = $_POST['parecer'];



    require_once '../Modelo/classeResultado.php';
    
    $novoresultado = new classeResultado();
    $novoresultado->setIdresultado($idresultado);
    $novoresultado->setParecerResultado($parecerResultado);


    $alterar = $resultadoDAO->alterarResultado($novoresultado);
    if ($alterar == FALSE) {
//        echo "<script>alert('Erro na Alteracao');
//                        window.location.href='controladorListarAtividadesAdaptadas.php';
//                        </script>";
    } else {
        echo "<script>alert('Alterado com Sucesso');
                        window.location.href='controladorListarAtividadesAdaptadas.php';
                        </script>";
    }
}

