<?php

require_once '../Modelo/DAO/classeAlunoDAO.php';

if (isset($_GET['idAluno'])) {
    $idAluno = $_GET['idAluno'];
}

$alunoDAO = new classeAlunoDAO();
$excluir = $alunoDAO->excluirAluno($idAluno);
if ($excluir) {
    echo "<script>alert('Excluido com Sucesso');
                        window.location.href='controladorListarAlunos.php';
                        </script>";
}

