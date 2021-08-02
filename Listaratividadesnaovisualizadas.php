<?php

if(!isset($_SESSION['UsuarioLogado'])):
    session_start();
endif;

if (file_exists("Modelo/DAO/classeAtividadesAdaptadasDAO.php"))://Se existir o arquivo
    require_once 'Modelo/DAO/classeAtividadesAdaptadasDAO.php';
endif;

if(isset($_SESSION['DisciplinaUsuarLologado'])):

$atividadesAdaptadasDAO = new classeAtividadesAdaptadasDAO();
$atividade = $atividadesAdaptadasDAO->VisualizarAtividadesAdaptadas();

if($atividade>0):
echo '<div class="icon">';
echo $atividade;
echo '</div>';
endif;
endif;
?>