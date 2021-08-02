<?php

require_once 'conexao.php'; //Professor modificado com novos atributos e acrescentado endereço/telefone 10.11.16.

class classeProfessorDAO {

    public function cadastrarProfessor(classeProfessor $novoProfessor, classeEndereco $novoEndereco, classeTelefone $novoTelefone) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO professor(nome,dataNascimento,sexo,cpf,email,disciplina,senha,perfil) VALUES (?,?,?,?,?,?,?,?);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoProfessor->getNome());
            $stmt->bindValue(2, $novoProfessor->getDataNascimento());
            $stmt->bindValue(3, $novoProfessor->getSexo());
            $stmt->bindValue(4, $novoProfessor->getCpf());
            $stmt->bindValue(5, $novoProfessor->getEmail());
            $stmt->bindValue(6, $novoProfessor->getDisciplina());
            $stmt->bindValue(7, $novoProfessor->getSenha());
            $stmt->bindValue(8, 3);

            $stmt->execute();


            $idProfessorinserido = $pdo->lastInsertId();


            $sqlEndereco = "INSERT INTO endereco(cep,uf,cidade,bairro,logradouro,complemento, idProfessor) "
                    . "VALUES (?,?,?,?,?,?,?);";

            $stmt = $pdo->prepare($sqlEndereco);
            $stmt->bindValue(1, $novoEndereco->getCep());
            $stmt->bindValue(2, $novoEndereco->getUf());
            $stmt->bindValue(3, $novoEndereco->getCidade());
            $stmt->bindValue(4, $novoEndereco->getBairro());
            $stmt->bindValue(5, $novoEndereco->getLogradouro());
            $stmt->bindValue(6, $novoEndereco->getComplemento());
            $stmt->bindValue(7, $idProfessorinserido);

            $stmt->execute();


            $sqlTelefone = "INSERT INTO telefone(ddi,ddd,numero, idProfessor) "
                    . "VALUES (?,?,?,?);";

            $stmt = $pdo->prepare($sqlTelefone);
            $stmt->bindValue(1, $novoTelefone->getDdi());
            $stmt->bindValue(2, $novoTelefone->getDdd());
            $stmt->bindValue(3, $novoTelefone->getNumero());
            $stmt->bindValue(4, $idProfessorinserido);
            $stmt->execute();


            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarProfessor() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM professor";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $professores = array();
            While ($professor = $stmt->fetchObject(__CLASS__)) {
                $professores[] = $professor;
            }

            return $professores;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarProfessorPorNome($nomeProfessor) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM professor WHERE nome LIKE :nomeProfessor";
            $nomeProfessor = "%" . $nomeProfessor . "%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nomeProfessor', $nomeProfessor, PDO::PARAM_STR);
            $stmt->execute();
            $Professores = array();
            While ($Professor = $stmt->fetchObject(__CLASS__)) {
                $Professores[] = $Professor;
            }

            return $Professores;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscarProfessorPorId($idProfessor) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM professor WHERE idprofessor = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idProfessor);
            $stmt->execute();
            $professor = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['professorAlterado'] = TRUE;
            $_SESSION['idProfessorAlterado'] = $idProfessor;
            $_SESSION['nomeProfessorAlterado'] = $professor->nome;
            $_SESSION['cpfProfessorAlterado'] = $professor->cpf;
            $_SESSION['emailProfessorAlterado'] = $professor->email;
            $_SESSION['disciplinaProfessorAlterado'] = $professor->disciplina;
            $_SESSION['senhaProfessorAlterado'] = $professor->senha;

            $sqlendereco = "SELECT * FROM endereco WHERE idProfessor = ?";
            $stmt = $pdo->prepare($sqlendereco);
            $stmt->bindValue(1, $idProfessor);
            $stmt->execute();

            $Professorendereco = $stmt->fetchObject(__CLASS__);
            $_SESSION['cepProfessorAlterado'] = $Professorendereco->cep;
            $_SESSION['ufProfessorAlterado'] = $Professorendereco->uf;
            $_SESSION['cidadeProfessorAlterado'] = $Professorendereco->cidade;
            $_SESSION['bairroProfessorAlterado'] = $Professorendereco->bairro;
            $_SESSION['logradouroProfessorAlterado'] = $Professorendereco->logradouro;
            $_SESSION['complementoProfessorAlterado'] = $Professorendereco->complemento;


            $sqltelefone = "SELECT * FROM telefone WHERE idProfessor = ?";
            $stmt = $pdo->prepare($sqltelefone);
            $stmt->bindValue(1, $idProfessor);
            $stmt->execute();

            $Professortelefone = $stmt->fetchObject(__CLASS__);
            $_SESSION['ddiProfessorAlterado'] = $Professortelefone->ddi;
            $_SESSION['dddProfessorAlterado'] = $Professortelefone->ddd;
            $_SESSION['numeroProfessorAlterado'] = $Professortelefone->numero;


            return $professor;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarProfessor(classeProfessor $professorAlterado, classeEndereco $enderecoAlterado, classeTelefone $telefoneAlterado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE professor SET "
                    . "nome=?,"
                    . "cpf=?,"
                    . "email=?,"
                    . "disciplina=?,"
                    . "senha=?"
                    . " WHERE idprofessor = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $professorAlterado->getNome());
            $stmt->bindValue(2, $professorAlterado->getCpf());
            $stmt->bindValue(3, $professorAlterado->getEmail());
            $stmt->bindValue(4, $professorAlterado->getDisciplina());
            $stmt->bindValue(5, $professorAlterado->getSenha());
            $stmt->bindValue(6, $professorAlterado->getIdProfessor());
            $stmt->execute();

            $sqlendereco = "UPDATE endereco SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "cep=?,"
                    . "uf=?,"
                    . "cidade=?,"
                    . "bairro=?,"
                    . "logradouro=?,"
                    . "complemento=?"
                    . " WHERE idProfessor = ?; ";
            $stmt = $pdo->prepare($sqlendereco);
            $stmt->bindValue(1, $enderecoAlterado->getCep());
            $stmt->bindValue(2, $enderecoAlterado->getUf());
            $stmt->bindValue(3, $enderecoAlterado->getCidade());
            $stmt->bindValue(4, $enderecoAlterado->getBairro());
            $stmt->bindValue(5, $enderecoAlterado->getLogradouro());
            $stmt->bindValue(6, $enderecoAlterado->getComplemento());
            $stmt->bindValue(7, $professorAlterado->getIdProfessor());
            $stmt->execute();



            $sqltelefone = "UPDATE telefone SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "ddi=?,"
                    . "ddd=?,"
                    . "numero=?"
                    . " WHERE idProfessor = ?; ";
            $stmt = $pdo->prepare($sqltelefone);
            $stmt->bindValue(1, $telefoneAlterado->getDdi());
            $stmt->bindValue(2, $telefoneAlterado->getDdd());
            $stmt->bindValue(3, $telefoneAlterado->getNumero());
            $stmt->bindValue(4, $professorAlterado->getIdProfessor());
            $stmt->execute();



            return $stmt;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirProfessor($idProfessor) {
        try {
            $pdo = conexao::getInstance();
            $sql = "DELETE FROM professor WHERE idProfessor = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idProfessor);
            $stmt->execute();
            
            $sqlresult = "DELETE FROM resultado WHERE id_Professor = ?";
            $stmt = $pdo->prepare($sqlresult);
            $stmt->bindValue(1, $idProfessor);
            $stmt->execute();
            
            return $stmt;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here
}
