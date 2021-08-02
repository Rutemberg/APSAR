<?php

require_once '../Modelo/DAO/classeLoginDAO.php';
$loginDAO = new classeLoginDAO();

if (isset($_GET['logout']) && ($_GET['logout'] == TRUE)) {
    $loginDAO->fazerLogout();
} else {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
}
$usuario = $loginDAO->fazerLogin($email, $senha);

if ($usuario == FALSE) {
    echo "<script>alert('Erro no Login! Email e/ou Senha Incorretos!!!');
                        window.location.href='../index.php';
                        </script>";
} else {
    echo "<script>alert('Login com Sucesso');
                        window.location.href='../index.php';
                        </script>";
}
?>



