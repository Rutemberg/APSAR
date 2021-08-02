<?php

$idTelefone = $_POST['inputIdTelefone'];
$dddTelefone = $_POST['inputDdd'];
$ddiTelefone = $_POST['inputDdi'];
$numeroTelefone = $_POST['inputNumero'];
$idProfessorTelefone = $_POST['inputIdProfessor'];
$idAlunoTelefone = $_POST['inputIdAluno'];
$idCoordenadorTelefone=$_POST['inputIdCoordenador'];
$idAdministradorTelefone=$_POST['inputIdAdministrador'];

require_once '../Modelo/classeTelefone.php';

require_once '../Modelo/DAO/classeTelefoneDAO.php';

$novoTelefone = new classeTelefone();

$novoTelefone->setIdTelefone($idTelefone);
$novoTelefone->setDdd($dddTelefone);
$novoTelefone->setDdi($ddiTelefone);
$novoTelefone->setNumero($numeroTelefone);
$novoTelefone->setIdProfessor($idProfessorTelefone);
$novoTelefone->setIdAluno($idAlunoTelefone);
$novoTelefone->setIdCoordenador($idCoordenadorTelefone);
$novoTelefone->setIdAdministrador($idAdministradorTelefone);

$novoTelefoneDAO = new classeTelefoneDAO();
$cadastrar = $novoTelefoneDAO->cadastrarTelefone($novoTelefone);
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
