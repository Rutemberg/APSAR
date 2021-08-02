<?php

require_once 'conexao.php';

class classeTelefoneDAO {

    public function cadastrarTelefone(classeTelefone $novoTelefone) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO telefone(idtelefone,ddi,ddd,numero,idcoordenadora,idprofessor,idaluno) VALUES (?,?,?,?,?,?,? now());";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoTelefone->getIdtelefone());
            $stmt->bindValue(2, $novoTelefone->getDdi());
            $stmt->bindValue(3, $novoTelefone->getDdd());
            $stmt->bindValue(4, $novoTelefone->getNumero());
            $stmt->bindValue(5, $novoTelefone->getIdcoordenadora());
            $stmt->bindValue(6, $novoTelefone->getidprofessor());
            $stmt->bindValue(7, $novoTelefone->getIdaluno());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarTelefone() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM telefone";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $Telefones = array();
            While ($Telefone = $stmt->fetchObject(__CLASS__)) {
                $Telefones[] = $Telefone;
            }

            return $Telefones;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarTelefonePorNome($nomeTelefone) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM telefone WHERE nome LIKE :nomeTelefone";
            $nomeTelefone = "%" . $nomeTelefone . "%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nometelefone', nomeTelefone,  PDO::PARAM_STR);
            $stmt->execute();
            $Telefones = array();
            While ($Telefone = $stmt->fetchObject(__CLASS__)) {
                $Telefones[] = $Telefone;
            }

            return $Telefones;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscartelefonePorId($idTelefone) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM telefone WHERE idTelefone = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idTelefone);
            $stmt->execute();
            $telefone = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['TelefoneAlterado'] = TRUE;
            $_SESSION['idTelefoneAlterado'] = $telefone->idtelefone;
            $_SESSION['ddiTelefoneAlterado'] = $telefone->ddi;
            $_SESSION['dddTelefoneAlterado'] = $telefone->ddd;
            $_SESSION['numeroTelefoneAlterado'] = $telefone->numero;
            $_SESSION['idcoordenadoraTelefoneAlterado'] = $telefone->idcoordenadora;
            $_SESSION['idprofessorTelefoneAlterado'] = $telefone->idprofessor;
            $_SESSION['idalunoTelefoneAlterado'] = $telefone->idaluno;
            return $telefone;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

   
    public function alterarTelefone(classeTelefone $telefoneAlterado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE telefone SET "
                    . "ddi=?,"
                    . "ddd=?,"
                    . "numero=?,"
                    . "idCoordenadora=?,"
                    . "idProfessor=?,"
                    . "idAluno=?,"
                    . " WHERE idTelefone = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $telefoneAlterado->getDdi());
            $stmt->bindValue(2, $telefoneAlterado->getDdd());
            $stmt->bindValue(3, $telefoneAlterado->getNumero());
            $stmt->bindValue(4, $telefoneAlterado->getIdcoordenadora());
            $stmt->bindValue(5, $telefoneAlterado->getIdprofessor());
            $stmt->bindValue(6, $telefoneAlterado->getIdaluno());
            return $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirTelefone($idTelefone) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE FROM telefone WHERE idTelefone = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idTelefone);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here
}

?>
