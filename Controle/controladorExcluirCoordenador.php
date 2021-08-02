<?php

require_once '../Modelo/DAO/classeCoordenadorDAO.php';

if (isset($_GET['idCoordenador'])) {
    $idCoordenador = $_GET['idCoordenador'];
}

$coordenadorDAO = new classeCoordenadorDAO();
$excluir = $coordenadorDAO->excluirCoordenador($idCoordenador);
if ($excluir) {
    echo "<script>alert('Excluido com Sucesso');
                        window.location.href='controladorListarCoordenador.php';
                        </script>";
}

