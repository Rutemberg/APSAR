
<?php

//classeDiagnostico corrigido com novos atributos em 10.11.16
require_once 'conexao.php';

class classeDiagnosticoDAO {

    public function cadastrarDiagnostico(classeDiagnostico $novoDiagnostico) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO diagnostico(id_Aluno,arquivo) VALUES (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoDiagnostico->getIdAluno());
            $stmt->bindValue(2, $novoDiagnostico->getArquivo());
            $stmt->execute();


            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarDiagnostico() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM diagnostico";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $diagnosticos = array();
            While ($diagnostico = $stmt->fetchObject(__CLASS__)) {
                $diagnosticos[] = $diagnostico;
            }

            return $diagnosticos;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarDiagnosticoPorNome($nomediagnostico) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM diagnostico WHERE tipo LIKE :tipodiagnostico";
            $tipodiagnostico = "%" . $tipodiagnostico . "%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':tipodiagnostico', $tipodiagnostico, PDO::PARAM_STR);
            $stmt->execute();
            $diagnostico = array();
            While ($diagnostico = $stmt->fetchObject(__CLASS__)) {
                $diagnostico[] = $diagnostico;
            }

            return $diagnostico;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarDiagnosticoPorIDAluno($IdAluno) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM diagnostico WHERE id_Aluno = :IdAluno";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':IdAluno', $IdAluno, PDO::PARAM_INT);
            $stmt->execute();
            $linhas = $stmt->rowCount();

            if ($linhas > 0):
                $diagnosticos = array();
                While ($diagnostico = $stmt->fetchObject(__CLASS__)) {
                    $diagnosticos[] = $diagnostico;
                }

                return $diagnosticos;
            endif;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscarDiagnosticoPorId($iddiagnostico) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM diagnostico WHERE iddiagnostico = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $iddiagnostico);
            $stmt->execute();
            $diagnostico = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['diagnosticoAlterado'] = TRUE;
            $_SESSION['idDiagnosticoAlterado'] = $diagnostico->idDiagnostico;
            $_SESSION['arquivoDiagnosticoAlterado'] = $diagnostico->arquivo;

            return $diagnostico;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarDiagnostico(classeDiagnostico $novodiagnostico) {
        try {

            $pdo = conexao::getInstance();
            $sql = "UPDATE diagnostico SET"
                    . " arquivo=?"
                    . " WHERE id_diagnostico = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novodiagnostico->getArquivo());
            $stmt->bindValue(2, $novodiagnostico->getIdDiagnostico());
            $stmt->execute();
            return $stmt;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirDiagnostico($idDiagnostico) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE FROM diagnostico WHERE id_diagnostico = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idDiagnostico);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here
}
