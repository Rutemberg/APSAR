<?php

if (!isset($_SESSION['UsuarioLogado'])):
    session_start();
endif;

//Novo código classeAtividadesAdaptadas feito 10.11.16
require_once 'conexao.php';

class classeAtividadesAdaptadasDAO {

    public function cadastrarAtividadesAdaptadas(classeAtividadesAdaptadas $novoAtividadesAdaptadas) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO atividadesAdaptadas(descricao,disciplina,arquivoAtividadesAdaptadas,nome) VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoAtividadesAdaptadas->getDescricao());
            $stmt->bindValue(2, $novoAtividadesAdaptadas->getDisciplina());
            $stmt->bindValue(3, $novoAtividadesAdaptadas->getArquivoAtividadesAdaptadas());
            $stmt->bindValue(4, $novoAtividadesAdaptadas->getNome());
            $stmt->execute();

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAtividadesAdaptadas($Disciplina = null) {
        try {
            $pdo = conexao::getInstance();
            if (isset($Disciplina)):
                $sql = "SELECT * FROM atividadesadaptadas WHERE disciplina = '{$Disciplina}' ORDER BY idatividadesAdaptadas DESC";
            else:
                $sql = "SELECT * FROM atividadesadaptadas ORDER BY idatividadesAdaptadas DESC";

            endif;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $atividadesAdaptadas = array();
            While ($atividadesAdaptada = $stmt->fetchObject(__CLASS__)) {
                $atividadesAdaptadas[] = $atividadesAdaptada;
            }

            return $atividadesAdaptadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function VisualizarAtividadesAdaptadas() {
        try {
            if (isset($_SESSION['DisciplinaUsuarLologado'])):
                $Disciplina = $_SESSION['DisciplinaUsuarLologado'];
            endif;
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM atividadesadaptadas WHERE visualizado = 'Nao' and disciplina = '$Disciplina'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $atividadesAdaptada = $stmt->fetchObject(__CLASS__);
            $atividadesAdaptada = $stmt->rowCount();

            return $atividadesAdaptada;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarAtividadesAdaptadasPorNome($nomeAtividadesAdaptadas, $Disciplina = null) {
        try {
            $pdo = conexao::getInstance();
            if (isset($Disciplina)):
                $sql = "SELECT * FROM atividadesadaptadas WHERE nome LIKE :nomeAtividadesAdaptadas and disciplina = '{$Disciplina}' ORDER BY idatividadesAdaptadas DESC";
            else:
                $sql = "SELECT * FROM atividadesadaptadas WHERE nome LIKE :nomeAtividadesAdaptadas OR disciplina LIKE :disciplina ORDER BY idatividadesAdaptadas DESC";

            endif;
            $nomeAtividadesAdaptadas = $nomeAtividadesAdaptadas . "%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nomeAtividadesAdaptadas', $nomeAtividadesAdaptadas, PDO::PARAM_STR);
            if (!isset($Disciplina)):
                $stmt->bindValue(':disciplina', $nomeAtividadesAdaptadas, PDO::PARAM_STR);
            endif;
            $stmt->execute();
            $AtividadesAdaptadas = array();
            While ($AtividadesAdaptada = $stmt->fetchObject(__CLASS__)) {
                $AtividadesAdaptadas[] = $AtividadesAdaptada;
            }

            return $AtividadesAdaptadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscarAtividadesAdaptadasPorId($idAtividadesAdaptadas) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM atividadesadaptadas WHERE idatividadesAdaptadas = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idAtividadesAdaptadas);
            $stmt->execute();
            $atividadesAdaptadas = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['atividadesAdaptadasAlterado'] = TRUE;
            $_SESSION['idAtividadesAdaptadasAlterado'] = $atividadesAdaptadas->idatividadesAdaptadas;
            $_SESSION['nomeAtividadesAdaptadasAlterado'] = $atividadesAdaptadas->nome;
            $_SESSION['disciplinaAtividadesAdaptadasAlterado'] = $atividadesAdaptadas->disciplina;
            $_SESSION['descricaoAtividadesAdaptadasAlterado'] = $atividadesAdaptadas->descricao;
            $_SESSION['arquivoAtividadesAdaptadasAlterado'] = $atividadesAdaptadas->arquivoAtividadesAdaptadas;

            return $atividadesAdaptadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarAtividadesAdaptadas(classeAtividadesAdaptadas $atividadesAdaptadasAlterado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE atividadesadaptadas SET "
                    . "nome=?,"
                    . "disciplina=?,"
                    . "descricao=?,"
                    . "arquivoAtividadesAdaptadas=?"
                    . " WHERE idatividadesAdaptadas = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $atividadesAdaptadasAlterado->getNome());
            $stmt->bindValue(2, $atividadesAdaptadasAlterado->getDisciplina());
            $stmt->bindValue(3, $atividadesAdaptadasAlterado->getDescricao());
            $stmt->bindValue(4, $atividadesAdaptadasAlterado->getArquivoAtividadesAdaptadas());
            $stmt->bindValue(5, $atividadesAdaptadasAlterado->getIdAtividadesAdapatadas());
            $stmt->execute();
            return $stmt;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function Visualizado($atividadesAdaptadasAlterado) {
        try {
            if (isset($_SESSION['DisciplinaUsuarLologado'])):
                $Disciplina = $_SESSION['DisciplinaUsuarLologado'];
                if ($atividadesAdaptadasAlterado == 1):
                    $atividadesAdaptadasAlterado = 'Sim';
                endif;
                $pdo = conexao::getInstance();
                $sql = "UPDATE atividadesadaptadas SET "
                        . "visualizado=? WHERE disciplina = '$Disciplina'";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, $atividadesAdaptadasAlterado);
                $stmt->execute();
                return $stmt;
            endif;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirAtividadesAdaptadas($idAtividadesAdaptadas) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE FROM atividadesadaptadas WHERE idatividadesAdaptadas = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idAtividadesAdaptadas);
            $stmt->execute();
            $sqlresult = "DELETE FROM resultado WHERE id_atividadesAdaptadas = ?";
            $stmt = $pdo->prepare($sqlresult);
            $stmt->bindValue(1, $idAtividadesAdaptadas);
            $stmt->execute();
            return $stmt;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here
}

?>
