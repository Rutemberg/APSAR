<?php

//Atualizado em 10.11.2016.
require_once '../Modelo/DAO/classeProfessorDAO.php';
$professorDAO = new classeProfessorDAO();


if (isset($_GET['idProfessor'])) {
    $idProfessor = $_GET['idProfessor'];
    $professorDAO->buscarProfessorPorId($idProfessor);
    header('Location:../Visao/formAlterarProfessor.php');
} else {
    $idProfessor = $_POST['idProfessor'];
    $nome = $_POST ['nomeProfessor'];
    $cpf = $_POST ['cpfProfessor'];
    $email = $_POST ['emailProfessor'];
    $disciplina = $_POST ['DisciplinaProfessor'];
    $senha = $_POST ['senhaProfessor'];

    $cepProfessor = $_POST['inputCep'];
    $ufProfessor = $_POST['inputUf'];
    $cidadeProfessor = $_POST['inputCidade'];
    $bairroProfessor = $_POST['inputBairro'];
    $logradouroProfessor = $_POST['inputLogradouro'];
    $complementoProfessor = $_POST['inputComplemento'];

    $dddProfessor = $_POST['inputDdd'];
    $ddiProfessor = $_POST['inputDdi'];
    $numeroProfessor = $_POST['inputNumero'];

    require_once '../Modelo/classeProfessor.php';
    require_once '../Modelo/classeEndereco.php';
    require_once '../Modelo/classeTelefone.php';

    $alterarProfessor = new classeProfessor();
    $alterarProfessor->setIdProfessor($idProfessor);
    $alterarProfessor->setNome($nome);
    $alterarProfessor->setCpf($cpf);
    $alterarProfessor->setEmail($email);
    $alterarProfessor->setDisciplina($disciplina);
    $alterarProfessor->setSenha($senha);

    $alterarenderecoProfessor = new classeEndereco();
    $alterarenderecoProfessor->setCep($cepProfessor);
    $alterarenderecoProfessor->setUf($ufProfessor);
    $alterarenderecoProfessor->setCidade($cidadeProfessor);
    $alterarenderecoProfessor->setBairro($bairroProfessor);
    $alterarenderecoProfessor->setLogradouro($logradouroProfessor);
    $alterarenderecoProfessor->setComplemento($complementoProfessor);

    $alterartelefoneProfessor = new classeTelefone();
    $alterartelefoneProfessor->setDdd($dddProfessor);
    $alterartelefoneProfessor->setDdi($ddiProfessor);
    $alterartelefoneProfessor->setNumero($numeroProfessor);


    $alterar = $professorDAO->alterarProfessor($alterarProfessor, $alterarenderecoProfessor, $alterartelefoneProfessor);
    if ($alterar == FALSE) {
//        echo "<script>alert('Erro na Alteracao');
//                        window.location.href='../index.php';
//                        </script>";
    } else {
        echo "<script>alert('Alterado com Sucesso');
                        window.location.href='controladorListarProfessor.php';
                        </script>";
    }
}