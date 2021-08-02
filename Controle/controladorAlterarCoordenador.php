<?php

//Atualizado em 10.11.2016
require_once '../Modelo/DAO/classeCoordenadorDAO.php';
$coordenadorDAO = new classeCoordenadorDAO();


if (isset($_GET['idCoordenador'])) {
    $idCoordenador = $_GET['idCoordenador'];
    $coordenadorDAO->buscarCoordenadorPorId($idCoordenador);
    header('Location:../Visao/formAlterarCoordenador.php');
} else {

    $idCoordenador = $_POST['idCoordenador'];
    $nomeCoordenador = $_POST['nomeCoordenador'];
    $cpfCoordenador = $_POST['cpfCoordenador'];
    $qualificacaoCoordenador = $_POST['inputQualificacoes'];
    $emailCoordenador = $_POST['emailCoordenador'];
    $senhaCoordenador = $_POST['senhaCoordenador'];

    $cepCoordenador = $_POST['inputCep'];
    $ufCoordenador = $_POST['inputUf'];
    $cidadeCoordenador = $_POST['inputCidade'];
    $bairroCoordenador = $_POST['inputBairro'];
    $logradouroCoordenador = $_POST['inputLogradouro'];
    $complementoCoordenador = $_POST['inputComplemento'];

    $dddCoordenador = $_POST['inputDdd'];
    $ddiCoordenador = $_POST['inputDdi'];
    $numeroCoordenador = $_POST['inputNumero'];

    require_once '../Modelo/classeCoordenador.php';
    require_once '../Modelo/classeEndereco.php'; //require_once copia informações de um lugar para outro.
    require_once '../Modelo/classeTelefone.php'; //require_once copia informações de um lugar para outro.


    $alterarCoordenador = new classeCoordenador();
    $alterarCoordenador->setIdCoordenador($idCoordenador);
    $alterarCoordenador->setNome($nomeCoordenador);
    $alterarCoordenador->setCpf($cpfCoordenador);
    $alterarCoordenador->setEmail($emailCoordenador);
    $alterarCoordenador->setQualificacao($qualificacaoCoordenador);
    $alterarCoordenador->setSenha($senhaCoordenador);

    $alterarenderecoCoordenador = new classeEndereco();
    $alterarenderecoCoordenador->setCep($cepCoordenador);
    $alterarenderecoCoordenador->setUf($ufCoordenador);
    $alterarenderecoCoordenador->setCidade($cidadeCoordenador);
    $alterarenderecoCoordenador->setBairro($bairroCoordenador);
    $alterarenderecoCoordenador->setLogradouro($logradouroCoordenador);
    $alterarenderecoCoordenador->setComplemento($complementoCoordenador);
    
    $alterartelefoneCoordenador = new classeTelefone();
    $alterartelefoneCoordenador->setDdd($dddCoordenador);
    $alterartelefoneCoordenador->setDdi($ddiCoordenador);
    $alterartelefoneCoordenador->setNumero($numeroCoordenador);

    $alterar = $coordenadorDAO->alterarCoordenador($alterarCoordenador, $alterarenderecoCoordenador, $alterartelefoneCoordenador);
    if ($alterar == FALSE) {
        echo "<script>alert('Erro na Alteracao');
                        window.location.href='../Visao/formAlterarCoordenador.php';
                        </script>";
    } else {
        echo "<script>alert('Alterado com Sucesso');
                        window.location.href='controladorListarCoordenador.php';
                        </script>";
    }
}

