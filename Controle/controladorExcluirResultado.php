<?php

require_once '../Modelo/DAO/classeResultadoDAO.php';

if (isset($_GET['idResultado'])) {
    $idResultado = $_GET['idResultado'];
}

$resultadoDAO = new classeResultadoDAO();
$excluir = $resultadoDAO->excluirResultado($idResultado);
if ($excluir) {
    echo "<script>alert('Excluido com Sucesso');
                        window.location.href='controladorListarAtividadesAdaptadas.php';
                        </script>";
}

