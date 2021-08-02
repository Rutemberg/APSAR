<?php

require_once 'conexao.php';

//classeCoordenador corrigido e acrecentado endereço e telefone em 10.11.16
class classeCoordenadorDAO {

    public function cadastrarCoordenador(classeCoordenador $novoCoordenador, classeEndereco $novoEndereco, classeTelefone $novoTelefone) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO coordenador(nome, sexo, email, cpf, dataNascimento, qualificacoes, senha, perfil) VALUES (?,?,?,?,?,?,?,?);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoCoordenador->getNome());
            $stmt->bindValue(2, $novoCoordenador->getSexo());
            $stmt->bindValue(3, $novoCoordenador->getEmail());
            $stmt->bindValue(4, $novoCoordenador->getCpf());
            $stmt->bindValue(5, $novoCoordenador->getDataNascimento());
            $stmt->bindValue(6, $novoCoordenador->getQualificacao());
            $stmt->bindValue(7, $novoCoordenador->getSenha());
            $stmt->bindValue(8, 2);

            $stmt->execute();


            $idCoordenadorinserido = $pdo->lastInsertId();

            $sqlEndereco = "INSERT INTO endereco(cep, uf, cidade, bairro, logradouro, complemento, idCoordenador) "
                    . "VALUES (?,?,?,?,?,?,?);";

            $stmt = $pdo->prepare($sqlEndereco);
            $stmt->bindValue(1, $novoEndereco->getCep());
            $stmt->bindValue(2, $novoEndereco->getUf());
            $stmt->bindValue(3, $novoEndereco->getCidade());
            $stmt->bindValue(4, $novoEndereco->getBairro());
            $stmt->bindValue(5, $novoEndereco->getLogradouro());
            $stmt->bindValue(6, $novoEndereco->getComplemento());
            $stmt->bindValue(7, $idCoordenadorinserido);

            $stmt->execute();


            $sqlTelefone = "INSERT INTO telefone(ddi,ddd,numero, idCoordenador) "
                    . "VALUES (?,?,?,?);";

            $stmt = $pdo->prepare($sqlTelefone);
            $stmt->bindValue(1, $novoTelefone->getDdi());
            $stmt->bindValue(2, $novoTelefone->getDdd());
            $stmt->bindValue(3, $novoTelefone->getNumero());
            $stmt->bindValue(4, $idCoordenadorinserido);

            $stmt->execute();


            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarCoordenador() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM coordenador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $coordenadores = array();
            While ($coordenador = $stmt->fetchObject(__CLASS__)) {
                $coordenadores[] = $coordenador;
            }

            return $coordenadores;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscarCoordenadorPorId($idCoordenador) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM coordenador WHERE idcoordenador = ?"; //Recupera registros especificos na tabela.
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idCoordenador);
            $stmt->execute();
            $Coordenador = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['coordenadorAlterado'] = TRUE; //retorna valor valor 1
            $_SESSION['idCoordenadorAlterado'] = $idCoordenador;
            $_SESSION['nomeCoordenadorAlterado'] = $Coordenador->nome;
            $_SESSION['cpfCoordenadorAlterado'] = $Coordenador->cpf;
            $_SESSION['emailCoordenadorAlterado'] = $Coordenador->email;
            $_SESSION['senhaCoordenadorAlterado'] = $Coordenador->senha;
            $_SESSION['qualificacaoCoordenador'] = $Coordenador->qualificacoes;

            $sqlendereco = "SELECT * FROM endereco WHERE idCoordenador = ?";
            $stmt = $pdo->prepare($sqlendereco);
            $stmt->bindValue(1, $idCoordenador);
            $stmt->execute();

            $coordenadorendereco = $stmt->fetchObject(__CLASS__);
            $_SESSION['cepcoordenadorAlterado'] = $coordenadorendereco->cep;
            $_SESSION['ufcoordenadorAlterado'] = $coordenadorendereco->uf;
            $_SESSION['cidadecoordenadorAlterado'] = $coordenadorendereco->cidade;
            $_SESSION['bairrocoordenadorAlterado'] = $coordenadorendereco->bairro;
            $_SESSION['logradourocoordenadorAlterado'] = $coordenadorendereco->logradouro;
            $_SESSION['complementocoordenadorAlterado'] = $coordenadorendereco->complemento;


            $sqltelefone = "SELECT * FROM telefone WHERE idCoordenador = ?";
            $stmt = $pdo->prepare($sqltelefone);
            $stmt->bindValue(1, $idCoordenador);
            $stmt->execute();

            $coordenadortelefone = $stmt->fetchObject(__CLASS__);
            $_SESSION['ddicoordenadorAlterado'] = $coordenadortelefone->ddi;
            $_SESSION['dddcoordenadorAlterado'] = $coordenadortelefone->ddd;
            $_SESSION['numerocoordenadorAlterado'] = $coordenadortelefone->numero;


            return $Coordenador;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarCoordenadorPorNome($nomeCoordenador) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM coordenador WHERE nome LIKE :nomeCoordenador"; //Pesquisa registro por nome no BD.
            $nomeCoordenador = "%" . $nomeCoordenador . "%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nomeCoordenador', $nomeCoordenador, PDO::PARAM_STR);
            $stmt->execute();
            $Coordenadores = array();
            While ($Coordenador = $stmt->fetchObject(__CLASS__)) {
                $Coordenadores[] = $Coordenador;
            }

            return $Coordenadores;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarCoordenador(classeCoordenador $coordenadorAlterado, classeEndereco $enderecoAlterado, classeTelefone $telefoneAlterado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE coordenador SET "
                    . "nome=?,"
                    . "email=?,"
                    . "cpf=?,"
                    . "qualificacoes=?,"
                    . "senha=?"
                    . " WHERE idcoordenador = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $coordenadorAlterado->getNome());
            $stmt->bindValue(2, $coordenadorAlterado->getEmail());
            $stmt->bindValue(3, $coordenadorAlterado->getCpf());
            $stmt->bindValue(4, $coordenadorAlterado->getQualificacao());
            $stmt->bindValue(5, $coordenadorAlterado->getSenha());
            $stmt->bindValue(6, $coordenadorAlterado->getIdCoordenador());
            $stmt->execute();

            $sqlendereco = "UPDATE endereco SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "cep=?,"
                    . "uf=?,"
                    . "cidade=?,"
                    . "bairro=?,"
                    . "logradouro=?,"
                    . "complemento=?"
                    . " WHERE idCoordenador = ?; ";
            $stmt = $pdo->prepare($sqlendereco);
            $stmt->bindValue(1, $enderecoAlterado->getCep());
            $stmt->bindValue(2, $enderecoAlterado->getUf());
            $stmt->bindValue(3, $enderecoAlterado->getCidade());
            $stmt->bindValue(4, $enderecoAlterado->getBairro());
            $stmt->bindValue(5, $enderecoAlterado->getLogradouro());
            $stmt->bindValue(6, $enderecoAlterado->getComplemento());
            $stmt->bindValue(7, $coordenadorAlterado->getIdCoordenador());
            $stmt->execute();



            $sqltelefone = "UPDATE telefone SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "ddi=?,"
                    . "ddd=?,"
                    . "numero=?"
                    . " WHERE idCoordenador = ?; ";
            $stmt = $pdo->prepare($sqltelefone);
            $stmt->bindValue(1, $telefoneAlterado->getDdi());
            $stmt->bindValue(2, $telefoneAlterado->getDdd());
            $stmt->bindValue(3, $telefoneAlterado->getNumero());
            $stmt->bindValue(4, $coordenadorAlterado->getIdCoordenador());
            $stmt->execute();



            return $stmt;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirCoordenador($idCoordenador) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE FROM coordenador WHERE idCoordenador = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idCoordenador);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here
}
?>

