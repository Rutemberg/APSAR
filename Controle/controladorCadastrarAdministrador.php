<?php

$nome = $_POST['inputNome'];
$cpf = $_POST['inputcpf'];
$email= $_POST['inputEmail'];
$senha = $_POST['inputSenha'];
$datanascimento = $_POST['inputdataNascimento'];
$sexo = $_POST ['inputSexo'];
$perfil = 1;

$ddi= $_POST ['inputDdi'];
$ddd= $_POST ['inputDdd'];
$numero= $_POST ['inputNumero'];

$cep=$_POST ['inputCep'];
$uf=$_POST ['inputUf'];
$cidade=$_POST ['inputCidade'];
$bairro=$_POST ['inputBairro'];
$logradouro=$_POST ['inputLogradouro'];
$complemento=$_POST ['inputComplemento'];

//require_once '../Modelo/classeAdministrador.php';
//require_once '../Modelo/DAO/classeEnderecoDAO.php';
//require_once '../Modelo/DAO/classeTelefoneDAO.php';
//require_once '../Modelo/DAO/classeAdministradorDAO.php';
require_once '../Modelo/classeAdministrador.php';
require_once '../Modelo/classeEndereco.php';
require_once '../Modelo/classeTelefone.php';
require_once '../Modelo/DAO/classeAdministradorDAO.php';

$novoAdministrador = new classeAdministrador();
$novoAdministrador->setNome($nome);
$novoAdministrador->setEmail($email);
$novoAdministrador->setSenha($senha);
$novoAdministrador->setDataNascimento($datanascimento);
$novoAdministrador->setSexo($sexo);
$novoAdministrador->setPerfil($perfil);
$novoAdministrador->setCpf($cpf);

$novoTelefone = new classeTelefone();
$novoTelefone->setDdi($ddi);
$novoTelefone->setDdd($ddd);
$novoTelefone->setNumero($numero);

$novoEndereco = new classeEndereco();
$novoEndereco->setCep($cep);
$novoEndereco->setUf($uf);
$novoEndereco->setCidade($cidade);
$novoEndereco->setBairro($bairro);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setComplemento($complemento);

$novoAdministradorDAO = new classeAdministradorDAO();
$cadastrar = $novoAdministradorDAO->cadastrarAdministrador($novoAdministrador,$novoEndereco,$novoTelefone);
if ($cadastrar) {
     echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='controladorListarAdministrador.php';
                        </script>";
} else {
        echo "<script>alert('Erro no Cadastro');
                        window.location.href='../Visao/formCadastroAdministrador.php';
                 </script>";

}
?>
 