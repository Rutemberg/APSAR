<?php

require_once 'conexao.php';

class classeEnderecoDAO {

    public function cadastrarEndereco(classeEndereco $novoEndereco) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO endereco(idendereco,cep,uf,cidade,bairro,logradouro,complemento) VALUES (?,?,?,?,?,?,? now());";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoEndereco->getIdendereco());
            $stmt->bindValue(2, $novoEndereco->getCep());
            $stmt->bindValue(3, $novoEndereco->getUf());
            $stmt->bindValue(4, $novoEndereco->getCidade());
            $stmt->bindValue(5, $novoEndereco->getBairro());
            $stmt->bindValue(6, $novoEndereco->getLogradouro());
            $stmt->bindValue(7, $novoEndereco->getComplemento());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarEndereco() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM endereco";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $Enderecos = array();
            While ($Endereco = $stmt->fetchObject(__CLASS__)) {
                $Enderecos[] = $Endereco;
            }

            return $Enderecos;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarEnderecoPorNome($nomeEndereco) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM endereco WHERE nome LIKE :nomeEndereco";
            $nomeEndereco = "%" . $nomeEndereco . "%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nomeEndereco', $nomeEndereco, PDO::PARAM_STR);
            $stmt->execute();
            $Enderecos = array();
            While ($Endereco = $stmt->fetchObject(__CLASS__)) {
                $Enderecos[] = $Endereco;
            }

            return $Enderecos;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscarEnderecoPorId($idEndereco) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM endereco WHERE idendereco = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idEndereco);
            $stmt->execute();
            $endereco = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['enderecoAlterado'] = TRUE;
            $_SESSION['idenderecoAlterado'] = $endereco->idendereco;
            $_SESSION['cependerecoAlterado'] = $endereco->cep;
            $_SESSION['ufenderecoAlterado'] = $endereco->uf;
            $_SESSION['cidadeenderecoAlterado'] = $endereco->cidade;
            $_SESSION['bairroenderecoAlterado'] = $endereco->bairro;
            $_SESSION['logradouroenderecoAlterado'] = $endereco->logradouro;
            $_SESSION['complementoenderecoAlterado'] = $endereco->complemento;
            return $endereco;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarEndereco(classeEndereco $enderecoAlterado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE endereco SET "
                    . "cep=?,"
                    . "uf=?,"
                    . "cidade=?"
                    . "bairro=?"
                    . "logradouro=?"
                    . "complemento=?"
                    . " WHERE idendereco = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $enderecoAlterado->getCep());
            $stmt->bindValue(2, $enderecoAlterado->getUf());
            $stmt->bindValue(3, $enderecoAlterado->getCidade());
            $stmt->bindValue(4, $enderecoAlterado->getBairro());
            $stmt->bindValue(5, $enderecoAlterado->getLogradouro());
            $stmt->bindValue(6, $enderecoAlterado->getComplemento());
            return $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirEndereco($idendereco) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE FROM endereco WHERE idendereco = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idendereco);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here
}

?>
