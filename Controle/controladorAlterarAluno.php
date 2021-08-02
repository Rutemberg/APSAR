
<?php

require_once '../Modelo/DAO/classeAlunoDAO.php';

$alunoDAO = new classeAlunoDAO();


if (isset($_GET['idAluno'])) { //array associativo de variáveis passadas para o script via o método HTTP GET.
    $idAluno = $_GET['idAluno'];
    $alunoDAO->buscarAlunoPorId($idAluno);
    header("Location:../Visao/formAlterarAluno.php");
} else {
    $idAluno = $_POST['idAluno'];
    $nomeAluno = $_POST['nomeAluno'];
    $cpfAluno = $_POST['cpfAluno'];
    $emailAluno = $_POST['emailAluno'];
    $matriculaAluno = $_POST['matriculaAluno'];

    $cepAluno = $_POST['inputCep'];
    $ufAluno = $_POST['inputUf'];
    $cidadeAluno = $_POST['inputCidade'];
    $bairroAluno = $_POST['inputBairro'];
    $logradouroAluno = $_POST['inputLogradouro'];
    $complementoAluno = $_POST['inputComplemento'];

    $dddAluno = $_POST['inputDdd'];
    $ddiAluno = $_POST['inputDdi'];
    $numeroAluno = $_POST['inputNumero'];




    require_once '../Modelo/classeAluno.php'; //require_once copia informações de um lugar para outro.   
    require_once '../Modelo/classeEndereco.php'; //require_once copia informações de um lugar para outro.
    require_once '../Modelo/classeTelefone.php'; //require_once copia informações de um lugar para outro.

    $alterarAluno = new classeAluno();
    $alterarAluno->setIdAluno($idAluno);
    $alterarAluno->setNome($nomeAluno);
    $alterarAluno->setCpf($cpfAluno);
    $alterarAluno->setEmail($emailAluno);
    $alterarAluno->setMatricula($matriculaAluno);

    $alterarenderecoAluno = new classeEndereco();
    $alterarenderecoAluno->setCep($cepAluno);
    $alterarenderecoAluno->setUf($ufAluno);
    $alterarenderecoAluno->setCidade($cidadeAluno);
    $alterarenderecoAluno->setBairro($bairroAluno);
    $alterarenderecoAluno->setLogradouro($logradouroAluno);
    $alterarenderecoAluno->setComplemento($complementoAluno);

    $alterartelefoneAluno = new classeTelefone();
    $alterartelefoneAluno->setDdd($dddAluno);
    $alterartelefoneAluno->setDdi($ddiAluno);
    $alterartelefoneAluno->setNumero($numeroAluno);


    $alterar = $alunoDAO->alterarAluno($alterarAluno, $alterarenderecoAluno, $alterartelefoneAluno);
    if ($alterar == FALSE) {
        echo "<script>alert('Erro na Alteracao');
                        window.location.href='../index.php';
                        </script>";
    } else {
        echo "<script>alert('Alterado com Sucesso');
                        window.location.href='controladorListarAlunos.php';
                        </script>";
    }
}



/* $alterar = $alunoDAO->alterarAluno($alterarAluno);
  if ($alterar == FALSE) {
  echo "<script>alert('Erro na Alteracao');
  window.location.href='../index.php';
  </script>";
  } else {
  echo "<script>alert('Alterado com Sucesso');
  window.location.href='../index.php';

  </script>";
  }

  } */
?>