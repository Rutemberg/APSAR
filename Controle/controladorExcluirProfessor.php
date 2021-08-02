<?php

require_once '../Modelo/DAO/classeProfessorDAO.php';

if (isset($_GET['idProfessor'])) {
    $idProfessor = $_GET['idProfessor'];
}

$professorDAO = new classeProfessorDAO();
$excluir = $professorDAO->excluirProfessor($idProfessor);
if ($excluir) {
    echo "<script>alert('Excluido com Sucesso');
                        window.location.href='controladorListarProfessor.php';
                        </script>";
}



