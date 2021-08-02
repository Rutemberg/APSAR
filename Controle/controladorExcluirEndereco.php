<?php
//  Atualizado em 12.11.2016.
require_once '../Modelo/DAO/classeEnderecoDAO.php';

if (isset($_GET['idEndereco'])) {
    $idEndereco = $_GET['idEndereco'];
}

$enderecoDAO = new classeEnderecoDAO();
$excluir = $enderecoDAO->excluirEndereco($idEndereco);
if ($excluir) {
    echo "<script>alert('Endereco Excluido com Sucesso');
                        window.location.href='../index.php';
                        </script>";
}
