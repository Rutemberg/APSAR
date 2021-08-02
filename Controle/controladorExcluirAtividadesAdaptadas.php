<?php

//Atualizado em 11.11.2016
require_once '../Modelo/DAO/classeAtividadesAdaptadasDAO.php';

if (isset($_GET['idAtividadesAdaptadas'])) {
    $nomearquivo = $_GET['nomearquivo'];
    $idAtividadesAdaptadas = $_GET['idAtividadesAdaptadas'];
}

$atividadesAdaptadasDAO = new classeAtividadesAdaptadasDAO();
$excluir = $atividadesAdaptadasDAO->excluirAtividadesAdaptadas($idAtividadesAdaptadas);
if ($excluir) {
    if (is_dir("../ArquivosAtividades") && file_exists("../ArquivosAtividades/" . $nomearquivo)):
        unlink("../ArquivosAtividades/{$nomearquivo}");
    endif;
    echo "<script>alert('Atividade Excluida com Sucesso');
                        window.location.href='controladorListarAtividadesAdaptadas.php';
                        </script>";
}

