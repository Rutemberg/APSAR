<?php

session_start();

if(isset($_SESSION['IdUsuarLologado'])):
    $idProfessor = $_SESSION['IdUsuarLologado'];
endif;

//Atualizado em 11.11.2016.
$idAtividade = $_POST['idAtividade'];
$parecerResultado = $_POST['parecer'];


require_once '../Modelo/classeResultado.php';
require_once '../Modelo/DAO/classeResultadoDAO.php';

$novoResultado = new classeResultado();
$novoResultado->setIdAtividade($idAtividade);
$novoResultado->setIdProfessor($idProfessor);
$novoResultado->setParecerResultado($parecerResultado);

$novoResultadoDAO = new classeResultadoDAO();
$cadastrar = $novoResultadoDAO->cadastrarResultado($novoResultado);

if ($cadastrar == FALSE) {
    echo "<script>alert('Erro no Cadastro');
                        window.location.href='controladorListarAtividadesAdaptadas.php';
                        </script>";
} else {
    echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='controladorListarAtividadesAdaptadas.php';
                        </script>";
}
?>

