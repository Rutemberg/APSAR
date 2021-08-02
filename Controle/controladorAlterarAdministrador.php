<?php

require_once '../Modelo/DAO/classeAdministradorDAO.php';
$AdministradorDAO = new classeAdministradorDAO();


if (isset($_GET['idAdministrador'])) { //array associativo de variáveis passadas para o script via o método HTTP GET.
    $idAdministrador = $_GET['idAdministrador']; 
    $AdministradorDAO->buscarAdministradorPorId($idAdministrador);
    header('Location:../Visao/formAlterarAdministrador.php');
} else {
    
    
    $idAdministrador = $_POST['idAdministrador'];
    $nomeAdministrador = $_POST['nomeAdministrador'];
    $emailAdministrador = $_POST['emailAdministrador'];
    $senhaAdministrador = $_POST['senhaAdministrador'];
    $cpfAdministrador = $_POST['cpfAdministrador'];
    
    $cepAdministrador = $_POST['inputCep'];
    $ufAdministrador = $_POST['inputUf'];
    $cidadeAdministrador = $_POST['inputCidade'];
    $bairroAdministrador = $_POST['inputBairro'];
    $logradouroAdministrador = $_POST['inputLogradouro'];
    $complementoAdministrador = $_POST['inputComplemento'];
    
    $dddAdministrador = $_POST['inputDdd'];
    $ddiAdministrador = $_POST['inputDdi'];
    $numeroAdministrador = $_POST['inputNumero'];

    

    require_once '../Modelo/classeAdministrador.php'; //require_once copia informações de um lugar para outro.
    require_once '../Modelo/classeEndereco.php'; //require_once copia informações de um lugar para outro.
    require_once '../Modelo/classeTelefone.php'; //require_once copia informações de um lugar para outro.

    $alterarAdministrador = new classeAdministrador();
    $alterarAdministrador->setIdAdministrador($idAdministrador);
    $alterarAdministrador->setNome($nomeAdministrador);
    $alterarAdministrador->setEmail($emailAdministrador);
    $alterarAdministrador->setSenha($senhaAdministrador);
    $alterarAdministrador->setCpf($cpfAdministrador);
    
    $alterarenderecoAdministrador = new classeEndereco();
    $alterarenderecoAdministrador->setCep($cepAdministrador);
    $alterarenderecoAdministrador->setUf($ufAdministrador);
    $alterarenderecoAdministrador->setCidade($cidadeAdministrador);
    $alterarenderecoAdministrador->setBairro($bairroAdministrador);
    $alterarenderecoAdministrador->setLogradouro($logradouroAdministrador);
    $alterarenderecoAdministrador->setComplemento($complementoAdministrador);
    
    $alterartelefoneAdministrador = new classeTelefone();
    $alterartelefoneAdministrador->setDdd($dddAdministrador);
    $alterartelefoneAdministrador->setDdi($ddiAdministrador);
    $alterartelefoneAdministrador->setNumero($numeroAdministrador);
    

    $alterar = $AdministradorDAO->alterarAdministrador($alterarAdministrador, $alterarenderecoAdministrador, $alterartelefoneAdministrador);
    if ($alterar == FALSE) {
//        echo "<script>alert('Erro na Alteracao');
//                        window.location.href='../index.php';
//                        </script>";
    } else {
        echo "<script>alert('Alterado com Sucesso');
                        window.location.href='controladorListarAdministrador.php';
                        </script>";
    }
}


