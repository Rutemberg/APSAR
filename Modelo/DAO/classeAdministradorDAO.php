<?php

require_once 'conexao.php'; //require_once buscando a conexão.php.(conectar ao banco)

class classeAdministradorDAO {

    public function cadastrarAdministrador(classeAdministrador $novoAdministrador, classeEndereco $novoEndereco, classeTelefone $novoTelefone) {
        try {
            $pdo = conexao::getInstance(); //INSERT INTO comando para quardar dados na tabela do BD
            $sql = "INSERT INTO administrador(nome,cpf,email,senha,sexo, perfil, datanascimento) VALUES (?,?,?,?,?,?,?);";
            $stmt = $pdo->prepare($sql); //comunicação com o banco de dados.
            $stmt->bindValue(1, $novoAdministrador->getNome());
            $stmt->bindValue(2, $novoAdministrador->getCpf());
            $stmt->bindValue(3, $novoAdministrador->getEmail());
            $stmt->bindValue(4, $novoAdministrador->getSenha());
            $stmt->bindValue(5, $novoAdministrador->getSexo());
            $stmt->bindValue(6, 1);
            $stmt->bindValue(7, $novoAdministrador->getDataNascimento());

            $stmt->execute();


            $idAdministradorinserido = $pdo->lastInsertId();

            $sqlEndereco = "INSERT INTO endereco(cep,uf,cidade,bairro,logradouro,complemento, idAdministrador) "
                    . "VALUES (?,?,?,?,?,?,?);";

            $stmt = $pdo->prepare($sqlEndereco);
            $stmt->bindValue(1, $novoEndereco->getCep());
            $stmt->bindValue(2, $novoEndereco->getUf());
            $stmt->bindValue(3, $novoEndereco->getCidade());
            $stmt->bindValue(4, $novoEndereco->getBairro());
            $stmt->bindValue(5, $novoEndereco->getLogradouro());
            $stmt->bindValue(6, $novoEndereco->getComplemento());
            $stmt->bindValue(7, $idAdministradorinserido);

            $stmt->execute();


            $sqlTelefone = "INSERT INTO telefone(ddi,ddd,numero, idAdministrador) "
                    . "VALUES (?,?,?,?);";

            $stmt = $pdo->prepare($sqlTelefone);
            $stmt->bindValue(1, $novoTelefone->getDdi());
            $stmt->bindValue(2, $novoTelefone->getDdd());
            $stmt->bindValue(3, $novoTelefone->getNumero());
            $stmt->bindValue(4, $idAdministradorinserido);

            $stmt->execute();

            //return $smtp;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAdministrador() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM administrador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $Administradores = array();
            While ($Administrador = $stmt->fetchObject(__CLASS__)) {
                $Administradores[] = $Administrador;
            }

            return $Administradores;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscarAdministradorPorId($idAdministrador) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM administrador WHERE idadministrador = ?"; //Recupera registros especificos na tabela.
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idAdministrador);
            $stmt->execute();

            $Administrador = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['AdministradorAlterado'] = TRUE; //retorna valor valor 1
            $_SESSION['idAdministradorAlterado'] = $idAdministrador;
            $_SESSION['nomeAdministradorAlterado'] = $Administrador->nome;
            $_SESSION['cpfAdministradorAlterado'] = $Administrador->cpf;
            $_SESSION['emailAdministradorAlterado'] = $Administrador->email;
            $_SESSION['senhaAdministradorAlterado'] = $Administrador->senha;


            $sqlendereco = "SELECT * FROM endereco WHERE idAdministrador = ?";
            $stmt = $pdo->prepare($sqlendereco);
            $stmt->bindValue(1, $idAdministrador);
            $stmt->execute();

            $Administradorendereco = $stmt->fetchObject(__CLASS__);
            $_SESSION['cepAdministradorAlterado'] = $Administradorendereco->cep;
            $_SESSION['ufAdministradorAlterado'] = $Administradorendereco->uf;
            $_SESSION['cidadeAdministradorAlterado'] = $Administradorendereco->cidade;
            $_SESSION['bairroAdministradorAlterado'] = $Administradorendereco->bairro;
            $_SESSION['logradouroAdministradorAlterado'] = $Administradorendereco->logradouro;
            $_SESSION['complementoAdministradorAlterado'] = $Administradorendereco->complemento;


            $sqltelefone = "SELECT * FROM telefone WHERE idAdministrador = ?";
            $stmt = $pdo->prepare($sqltelefone);
            $stmt->bindValue(1, $idAdministrador);
            $stmt->execute();

            $Administradortelefone = $stmt->fetchObject(__CLASS__);
            $_SESSION['ddiAdministradorAlterado'] = $Administradortelefone->ddi;
            $_SESSION['dddAdministradorAlterado'] = $Administradortelefone->ddd;
            $_SESSION['numeroAdministradorAlterado'] = $Administradortelefone->numero;


            return $Administrador;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarAdministradorPorNome($nomeAdministrador) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM administrador WHERE nome LIKE :nomeAdministrador"; //Pesquisa registro por nome no BD.
            $nomeAdministrador = "%" . $nomeAdministrador . "%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nomeAdministrador', $nomeAdministrador, PDO::PARAM_STR);
            $stmt->execute();
            $Administradores = array();
            While ($Administrador = $stmt->fetchObject(__CLASS__)) {
                $Administradores[] = $Administrador;
            }

            return $Administradores;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarAdministrador(classeAdministrador $administradorAlterado, classeEndereco $enderecoAlterado, classeTelefone $telefoneAlterado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE administrador SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "nome=?,"
                    . "cpf=?,"
                    . "email=?,"
                    . "senha=?"
                    . " WHERE idadministrador = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $administradorAlterado->getNome());
            $stmt->bindValue(2, $administradorAlterado->getCpf());
            $stmt->bindValue(3, $administradorAlterado->getEmail());
            $stmt->bindValue(4, $administradorAlterado->getSenha());
            $stmt->bindValue(5, $administradorAlterado->getIdAdministrador());
            $stmt->execute();
            
            $sqlendereco = "UPDATE endereco SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "cep=?,"
                    . "uf=?,"
                    . "cidade=?,"
                    . "bairro=?,"
                    . "logradouro=?,"
                    . "complemento=?"
                    . " WHERE idAdministrador = ?; ";
            $stmt = $pdo->prepare($sqlendereco);
            $stmt->bindValue(1, $enderecoAlterado->getCep());
            $stmt->bindValue(2, $enderecoAlterado->getUf());
            $stmt->bindValue(3, $enderecoAlterado->getCidade());
            $stmt->bindValue(4, $enderecoAlterado->getBairro());
            $stmt->bindValue(5, $enderecoAlterado->getLogradouro());
            $stmt->bindValue(6, $enderecoAlterado->getComplemento());
            $stmt->bindValue(7, $administradorAlterado->getIdAdministrador());
            $stmt->execute();
            
            
            
            $sqltelefone = "UPDATE telefone SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "ddi=?,"
                    . "ddd=?,"
                    . "numero=?"
                    . " WHERE idAdministrador = ?; ";
            $stmt = $pdo->prepare($sqltelefone);
            $stmt->bindValue(1, $telefoneAlterado->getDdi());
            $stmt->bindValue(2, $telefoneAlterado->getDdd());
            $stmt->bindValue(3, $telefoneAlterado->getNumero());
            $stmt->bindValue(4, $administradorAlterado->getIdAdministrador());
            $stmt->execute();
            
            

            return $stmt;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirAdministrador($idAdministrador) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE FROM administrador WHERE idadministrador = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idAdministrador);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here
}
