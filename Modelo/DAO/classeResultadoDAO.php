



<?php

//classeResultado corrigido em 10.11.16.
require_once 'conexao.php';

class classeResultadoDAO {

    public function cadastrarResultado(classeResultado $novoResultado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO resultado(id_atividadesAdaptadas,parecer,id_Professor) VALUES (?,?,?);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoResultado->getIdAtividade());
            $stmt->bindValue(2, $novoResultado->getParecerResultado());
            $stmt->bindValue(3, $novoResultado->getIdProfessor());
            $stmt->execute();

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarResultado() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM resultado";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $Resultados = array();
            While ($Resultado = $stmt->fetchObject(__CLASS__)) {
                $Resultados[] = Resultado;
            }

            return $Resultado;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarResultadoPorID($IDAtividade) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM resultado WHERE id_atividadesAdaptadas = :IDresult";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':IDresult', $IDAtividade);
            $stmt->execute();
            $linhas = $stmt->rowCount();
            if ($linhas > 0):
                $Resultados = array();
                While ($Resultado = $stmt->fetchObject(__CLASS__)) {
                    $Resultados[] = $Resultado;
                }

                return $Resultados;
            endif;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function pesquisarnomeprofessor($idProfessor) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM professor WHERE idprofessor = :nameresult";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nameresult', $idProfessor);
            $stmt->execute();
            $linhas = $stmt->rowCount();
            if ($linhas > 0):
                $ResultadoNomes = array();
                While ($ResultadoNome = $stmt->fetchObject(__CLASS__)) {
                    $ResultadoNomes[] = $ResultadoNome;
                }

                return $ResultadoNomes;
            endif;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarResultado($idProfessor, $idAtividade) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM resultado WHERE id_Professor = :idProfessor and id_atividadesAdaptadas = :IdAtividade";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idProfessor', $idProfessor);
            $stmt->bindValue(':IdAtividade', $idAtividade);
            $stmt->execute();
            $linhas = $stmt->rowCount();
            if ($linhas > 0):
                $Resultados = array();
                While ($Resultado = $stmt->fetchObject(__CLASS__)) {
                    $Resultados[] = $Resultado;
                }

                return $Resultados;
            endif;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscarResultadoPorId($idResultado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM resultado WHERE idResultado = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idResultado);
            $stmt->execute();
            $resultado = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['ResultadoAlterado'] = TRUE;
            $_SESSION['idResultadoAlterado'] = $resultado->idResultado;
            $_SESSION['parecerResultadoAlterado'] = $resultado->parecerResultado;
            return $resultado;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarResultado(classeResultado $resultadoAlterado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE resultado SET "
                    . "parecer = ?"
                    . " WHERE idresultado = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $resultadoAlterado->getParecerResultado());
            $stmt->bindValue(2, $resultadoAlterado->getIdResultado());
            $stmt->execute();
            return $stmt;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirResultado($idResultado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE FROM resultado WHERE idresultado = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idResultado);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here
}
