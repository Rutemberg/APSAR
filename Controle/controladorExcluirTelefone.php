<?php
//  Atualizado em 12.11.2016.
require_once '../Modelo/DAO/classeTelefoneDAO.php';

if (isset($_GET['idTelefone'])) {
    $idTelefone = $_GET['idTelefone'];
}

$telefoneDAO = new classeTelefoneDAO();
$excluir = $telefoneDAO->excluirTelefone($idTelefone);
if ($excluir) {
    echo "<script>alert('Telefone Excluido com Sucesso');
                        window.location.href='../index.php';
                        </script>";
}
