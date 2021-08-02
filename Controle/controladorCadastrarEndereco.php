<?php
$idEndereco = $_POST['inputidEndereco'];
$cepEndereco = $_POST['inputCep'];
$ufEndereco = $_POST['inputUf'];
$cidadeEndereco = $_POST['inputCidade'];
$bairroEndereco = $_POST['inputBairro'];
$logradouroEndereco = $_POST['inputLogradouro'];
$complementoEndereco = $_POST['inputComplemento'];

require_once '../Modelo/classeEndereco.php';
require_once '../Modelo/DAO/classeEnderecoDAO.php';
    
$novoEndereco = new classeEndereco();

$novoEnderecor->setidEndereco($idEndereco);
$novoEnderecor->setCep($cepEndereco);
$novoEnderecor->setUf($ufEndereco);
$novoEnderecor->setCidade($cidadeEndereco);
$novoEnderecor->setBairro($bairroEndereco);
$novoEnderecor->setLogradouro($logradouroEndereco);
$novoEnderecor->setComplemento($complementoEndereco);
$novoEnderecoDAO = new classeEnderecoDAODAO();
$cadastrar = $novoEnderecoDAO->cadastrarEndereco($novoEndereco);
if ($cadastrar == FALSE) {
    echo "<script>alert('Erro no Cadastro');
                        window.location.href='../index.php';
                        </script>";
} else {
    echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='../index.php';
                        </script>";
}
?>

