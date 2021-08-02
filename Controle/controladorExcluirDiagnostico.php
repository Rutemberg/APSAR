<?php

require_once '../Modelo/DAO/classeDiagnosticoDAO.php';

if (isset($_GET['idDiagnostico'])) {
    $idDiagnostico = $_GET['idDiagnostico'];
    $nomearquivo = $_GET['nomearquivo'];
}

$diagnosticoDAO = new classeDiagnosticoDAO();
$excluir = $diagnosticoDAO->excluirDiagnostico($idDiagnostico);
if ($excluir) {
    if (is_dir("../Arquivos") && file_exists("../Arquivos/" . $nomearquivo)):
        unlink("../Arquivos/{$nomearquivo}");
    endif;
    echo "<script>alert('Excluido com Sucesso');
                        window.location.href='controladorListarAlunos.php';
                        </script>";
}

