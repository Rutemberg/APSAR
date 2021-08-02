<?php

require_once 'conexao.php';

//classeAlunoDAO atualizado sem perfil e senha, com chave estrangeira idDiagnostico. 10.11.16
class classeAlunoDAO {

    public function cadastrarAluno(classeAluno $novoAluno, classeEndereco $novoEndereco, classeTelefone $novoTelefone, classeDiagnostico $novoDiagnostico = null) {
        try {
            $pdo = conexao::getInstance();
            $sql = "INSERT INTO aluno(nome,sexo,cpf,email,matricula,dataNascimento) "
                    . "VALUES (?,?,?,?,?,?);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoAluno->getNome());
            $stmt->bindValue(2, $novoAluno->getSexo());
            $stmt->bindValue(3, $novoAluno->getCpf());
            $stmt->bindValue(4, $novoAluno->getEmail());
            $stmt->bindValue(5, $novoAluno->getMatricula());
            $stmt->bindValue(6, $novoAluno->getDataNascimento());


            $stmt->execute();

            $idAlunoinserido = $pdo->lastInsertId();

            $sqlEndereco = "INSERT INTO endereco(cep,uf,cidade,bairro,logradouro,complemento,idAluno)"
                    . "VALUES (?,?,?,?,?,?,?);";

            $stmt = $pdo->prepare($sqlEndereco);
            $stmt->bindValue(1, $novoEndereco->getCep());
            $stmt->bindValue(2, $novoEndereco->getUf());
            $stmt->bindValue(3, $novoEndereco->getCidade());
            $stmt->bindValue(4, $novoEndereco->getBairro());
            $stmt->bindValue(5, $novoEndereco->getLogradouro());
            $stmt->bindValue(6, $novoEndereco->getComplemento());
            $stmt->bindValue(7, $idAlunoinserido);
            $stmt->execute();


            $sqlTelefone = "INSERT INTO telefone(ddi,ddd,numero,idAluno) "
                    . "VALUES (?,?,?,?);";

            $stmt = $pdo->prepare($sqlTelefone);
            $stmt->bindValue(1, $novoTelefone->getDdi());
            $stmt->bindValue(2, $novoTelefone->getDdd());
            $stmt->bindValue(3, $novoTelefone->getNumero());
            $stmt->bindValue(4, $idAlunoinserido);
            $stmt->execute();

            if (isset($novoDiagnostico) && $novoDiagnostico != null):
                $sqlDiagnostico = "INSERT INTO diagnostico(arquivo,id_Aluno)"
                        . "VALUES (?,?);";

                $stmt = $pdo->prepare($sqlDiagnostico);
                $stmt->bindValue(1, $novoDiagnostico->getArquivo());
                $stmt->bindValue(2, $idAlunoinserido);
                $stmt->execute();
            endif;

            return $stmt; //teste
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarAluno() {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM Aluno";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = array();
            While ($aluno = $stmt->fetchObject(__CLASS__)) {
                $alunos[] = $aluno;
            }

            return $alunos;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function pesquisarAlunoPorNome($nomeAluno) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM aluno WHERE nome LIKE :nomeAluno"; //Seleciona e mostra na tela os dados do aluno
            $nomeAluno = "%" . $nomeAluno . "%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nomeAluno', $nomeAluno, PDO::PARAM_STR);
            $stmt->execute();
            $alunos = array(); //Aluno em plural por conta da array
            While ($aluno = $stmt->fetchObject(__CLASS__)) {
                $alunos[] = $aluno; //Seleciona e mostra na tela os dados de vários alunos []PLURAL
            }

            return $alunos;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscarAlunoPorId($idAluno) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM aluno WHERE idAluno = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idAluno);
            $stmt->execute();
            $aluno = $stmt->fetchObject(__CLASS__);
            session_start();
            $_SESSION['alunoAlterado'] = TRUE;  //Escrever o atributo de acordo com o SESSION do formAlterar.
            $_SESSION['idAlunoAlterado'] = $idAluno;
            $_SESSION['nomeAlunoAlterado'] = $aluno->nome;
            $_SESSION['sexoAlunoAlterado'] = $aluno->sexo;
            $_SESSION['cpfAlunoAlterado'] = $aluno->cpf;
            $_SESSION['emailAlunoAlterado'] = $aluno->email;
            $_SESSION['matriculaAlunoAlterado'] = $aluno->matricula;


            $sqlendereco = "SELECT * FROM endereco WHERE idAluno = ?";
            $stmt = $pdo->prepare($sqlendereco);
            $stmt->bindValue(1, $idAluno);
            $stmt->execute();

            $Alunoendereco = $stmt->fetchObject(__CLASS__);
            $_SESSION['cepAlunoAlterado'] = $Alunoendereco->cep;
            $_SESSION['ufAAlunoAlterado'] = $Alunoendereco->uf;
            $_SESSION['cidadeAlunoAlterado'] = $Alunoendereco->cidade;
            $_SESSION['bairroAlunoAlterado'] = $Alunoendereco->bairro;
            $_SESSION['logradouroAlunoAlterado'] = $Alunoendereco->logradouro;
            $_SESSION['complementoAlunoAlterado'] = $Alunoendereco->complemento;


            $sqltelefone = "SELECT * FROM telefone WHERE idAluno = ?";
            $stmt = $pdo->prepare($sqltelefone);
            $stmt->bindValue(1, $idAluno);
            $stmt->execute();

            $Alunotelefone = $stmt->fetchObject(__CLASS__);
            $_SESSION['ddiAlunoAlterado'] = $Alunotelefone->ddi;
            $_SESSION['dddAlunoAlterado'] = $Alunotelefone->ddd;
            $_SESSION['numeroAlunoAlterado'] = $Alunotelefone->numero;

            return $aluno;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function alterarAluno(classeAluno $alunoAlterado, classeEndereco $enderecoAlterado, classeTelefone $telefoneAlterado) {
        try {
            $pdo = conexao::getInstance();
            $sql = "UPDATE aluno SET "//Altera o nome do atributo
                    . "nome=?,"
                    . "cpf=?,"
                    . "email=?,"
                    . "matricula=?"
                    . " WHERE idAluno = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $alunoAlterado->getNome());
            $stmt->bindValue(2, $alunoAlterado->getCpf());
            $stmt->bindValue(3, $alunoAlterado->getEmail());
            $stmt->bindValue(4, $alunoAlterado->getMatricula());
            $stmt->bindValue(5, $alunoAlterado->getIdAluno());
            $stmt->execute();

            $sqlendereco = "UPDATE endereco SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "cep=?,"
                    . "uf=?,"
                    . "cidade=?,"
                    . "bairro=?,"
                    . "logradouro=?,"
                    . "complemento=?"
                    . " WHERE idAluno = ?; ";
            $stmt = $pdo->prepare($sqlendereco);
            $stmt->bindValue(1, $enderecoAlterado->getCep());
            $stmt->bindValue(2, $enderecoAlterado->getUf());
            $stmt->bindValue(3, $enderecoAlterado->getCidade());
            $stmt->bindValue(4, $enderecoAlterado->getBairro());
            $stmt->bindValue(5, $enderecoAlterado->getLogradouro());
            $stmt->bindValue(6, $enderecoAlterado->getComplemento());
            $stmt->bindValue(7, $alunoAlterado->getIdAluno());
            $stmt->execute();



            $sqltelefone = "UPDATE telefone SET " //Palavras chaves para alterar registros na tabela do BD.
                    . "ddi=?,"
                    . "ddd=?,"
                    . "numero=?"
                    . " WHERE idAluno = ?; ";
            $stmt = $pdo->prepare($sqltelefone);
            $stmt->bindValue(1, $telefoneAlterado->getDdi());
            $stmt->bindValue(2, $telefoneAlterado->getDdd());
            $stmt->bindValue(3, $telefoneAlterado->getNumero());
            $stmt->bindValue(4, $alunoAlterado->getIdAluno());
            $stmt->execute();


            return $stmt;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirAluno($idAluno) {
        try {

            $pdo = conexao::getInstance();
            $sqldiagnostico = "SELECT * FROM diagnostico WHERE id_Aluno = ?"; //Exclui o Atributo.
            $stmt = $pdo->prepare($sqldiagnostico);
            $stmt->bindValue(1, $idAluno);
            $stmt->execute();
            $Linhas = $stmt->rowCount();
            
            if($Linhas>0):
                
                
            $Diagnosticos = array();
            While ($Diagnostico = $stmt->fetchObject(__CLASS__)) {
                $Diagnosticos[] = $Diagnostico;
                    foreach ($Diagnosticos as $Diagnostico):
                        $arquivo = $Diagnostico->arquivo;
                    endforeach;
            }
            if (isset($Diagnosticos)):
                unlink("../Arquivos/{$arquivo}");
                $sqldeletediag = "DELETE FROM diagnostico WHERE id_Aluno = ?";
                $stmt = $pdo->prepare($sqldeletediag);
                $stmt->bindValue(1, $idAluno);
                $stmt->execute();
            endif;
            
            
            endif;
            $sql = "DELETE FROM aluno WHERE idaluno = ?"; //Exclui o Atributo.
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idAluno);
            $stmt->execute();



            return $stmt;
        } catch (Exception $ex) {
            
        }
    }

    //put your code here*/
}

?>
