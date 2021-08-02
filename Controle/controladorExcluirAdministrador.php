<?php

require_once '../Modelo/DAO/classeAdministradorDAO.php';

if (isset($_GET['idAdministrador'])) {
    $idAdministrador = $_GET['idAdministrador'];//Variável de coleção, que acessa os valores do formulário..
}                                             //..enviados pelo metodo get.    

$administradorDAO = new classeAdministradorDAO();
$excluir = $administradorDAO->excluirAdministrador($idAdministrador);
if ($excluir) {
    echo "<script>alert('Excluido com Sucesso');
                        window.location.href='controladorListarAdministrador.php';
                        </script>";
}


