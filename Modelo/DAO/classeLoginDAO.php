<?php

session_start();   //inicia a sessão
require_once 'conexao.php';

class classeLoginDAO {

    public function fazerLogin($email, $senha) { //valores definidos para o login
        try {
            $pdo = conexao::getInstance(); //PDO, comunicação com o BD relacional, padronização na comunicação.
            $sql = "SELECT nome,perfil FROM administrador
                    WHERE email = ? AND senha = ?"; //SELECT FROM WERE recupera registros especificos de uma tabela.
            $stmt = $pdo->prepare($sql); //SQL Linquagem que administra acesso ao BD
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario != NULL) {
                $_SESSION['UsuarioLogado'] = 5;
                $_SESSION['NomeUsuarioLogado'] = $usuario['nome'];
                $_SESSION['PerfilUsuarLologado'] = $usuario['perfil'];
                return $usuario;
            } else {

                $sql = "SELECT nome,perfil FROM coordenador
                    WHERE email = ? AND senha = ?"; //SELECT FROM WERE recupera registros especificos de uma tabela.
                $stmt = $pdo->prepare($sql); //SQL Linquagem que administra acesso ao BD
                $stmt->bindValue(1, $email);
                $stmt->bindValue(2, $senha);
                $stmt->execute();
                $usuario2 = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($usuario2 != NULL) {
                    $_SESSION['UsuarioLogado'] = 5;
                    $_SESSION['NomeUsuarioLogado'] = $usuario2['nome'];
                    $_SESSION['PerfilUsuarLologado'] = $usuario2['perfil'];
                    return $usuario2;
                } else {
                    $sql = "SELECT * FROM professor
                    WHERE email = ? AND senha = ?"; //SELECT FROM WERE recupera registros especificos de uma tabela.
                    $stmt = $pdo->prepare($sql); //SQL Linquagem que administra acesso ao BD
                    $stmt->bindValue(1, $email);
                    $stmt->bindValue(2, $senha);
                    $stmt->execute();
                    $usuario3 = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($usuario3 != NULL) {
                        $_SESSION['UsuarioLogado'] = 5;
                        $_SESSION['NomeUsuarioLogado'] = $usuario3['nome'];
                        $_SESSION['PerfilUsuarLologado'] = $usuario3['perfil'];
                        $_SESSION['DisciplinaUsuarLologado'] = $usuario3['disciplina'];
                        $_SESSION['IdUsuarLologado'] = $usuario3['idprofessor'];
                        return $usuario3;
                    }
                }
            }
        } catch (Exception $ex) {
            echo "erro" . $exc->getMessage();
        }
    }

    public function fazerLogout() {
        try {
            unset($_SESSION['UsuarioLogado']);

            unset($_SESSION['NomeUsuarioLogado']);
            unset($_SESSION['PerfilUsuarLologado']);
            session_destroy();
            header("location:../index.php");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
