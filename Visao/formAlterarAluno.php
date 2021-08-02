<?php
//Atualizado com novos atributos em 08.11.16
session_start();
if (isset($_SESSION['alunoAlterado'])) { //escrever o atributo de acordo com a SESSION do classeDAO
    $idAluno = $_SESSION['idAlunoAlterado'];
    $nomeAluno = $_SESSION['nomeAlunoAlterado'];
    $sexoAluno = $_SESSION['sexoAlunoAlterado'];
    $cpfAluno = $_SESSION['cpfAlunoAlterado'];
    $emailAluno = $_SESSION['emailAlunoAlterado'];
    $matriculaAluno = $_SESSION['matriculaAlunoAlterado'];

    $cep = $_SESSION['cepAlunoAlterado'];
    $uf = $_SESSION['ufAAlunoAlterado'];
    $cidade = $_SESSION['cidadeAlunoAlterado'];
    $bairro = $_SESSION['bairroAlunoAlterado'];
    $log = $_SESSION['logradouroAlunoAlterado'];
    $comp = $_SESSION['complementoAlunoAlterado'];

    $ddi = $_SESSION['ddiAlunoAlterado'];
    $ddd = $_SESSION['dddAlunoAlterado'];
    $numero = $_SESSION['numeroAlunoAlterado'];
} else {
    $idAluno = NULL;
    $nomeAluno = NULL;
    $sexoAluno = NULL;
    $cpfAluno = NULL;
    $emailAluno = NULL;
    $matriculaAluno = NULL;
    $dataNascimentoAluno = NULL;
    $idDiagnosticoAluno = NULL;
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/formalterar.css">

    </head>
    <body>

        <form id="formalterar" 
              name="formAluno" 
              method="POST" 
              action="../Controle/controladorAlterarAluno.php">
            <header>
                <img src="img/Att.png">
                <h2>Alterar Aluno</h2>
            </header>



            <div class="corpoformulario">
               <div class="triangulo"></div>
                <div class="formesquerdo">

                    <input id="idAluno" name="idAluno" type="hidden" 
                           value="<?php echo $idAluno; ?>">


                    <label for="nomeAluno">Nome</label>
                    <input id="nomeAluno" name="nomeAluno" placeholder="Nome do Aluno" type="text" size="30"
                           value="<?php echo $nomeAluno; ?>">

                    <label for="matriculaAluno">Matricula</label>
                    <input id="matriculaAluno" name="matriculaAluno" placeholder="Digite a matricula" type="text" size="30" 
                           value="<?php echo $matriculaAluno; ?>">
                    <label for="cpfAluno">Cpf</label>
                    <input id="cpfAluno" name="cpfAluno" placeholder="Digite seu cpf" type="text" size="30" 
                           value="<?php echo $cpfAluno; ?>">
                    <label for="emailAluno">Email</label>
                    <input id="emailAluno" name="emailAluno" placeholder="Digite seu email" type="text" size="30" 
                           value="<?php echo $emailAluno; ?>">


                    <label for="inputCep">CEP</label>
                    <input id="inputCep"
                           name="inputCep"
                           placeholder="Digite o CEP."
                           type="text"
                           value="<?php echo $cep; ?>"> 
                    
                    <label for="inputUf">UF</label><br>
                    <select id="inputUf"
                           name="inputUf"
                           >
                        <option value="<?php echo $uf; ?>"><?php echo $uf; ?></option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AM">AM</option>
                        <option value="AP">AP</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MG">MG</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="PR">PR</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="RS">RS</option>
                        <option value="SC">SC</option>
                        <option value="SE">SE</option>
                        <option value="SP">SP</option>
                        <option value="TO">TO</option>
                    </select>
                    

                    <label for="inputCidade">Cidade</label>
                    <input id="inputCidade"
                           name="inputCidade"
                           placeholder="Digite a Cidade"
                           type="text"
                           value="<?php echo $cidade; ?>">
                </div>

                <div class="formdireito">
                    <label for="inputBairro">Bairro</label>
                    <input id="inputBairro"
                           name="inputBairro"
                           placeholder="Digite o Bairro"
                           type="text"
                           value="<?php echo $bairro; ?>"> 

                    <label for="inputLogradouro">Logradouro</label>
                    <input id="inputLogradouro"
                           name="inputLogradouro"
                           placeholder="Digite o Logeradouro"
                           type="text"
                           value="<?php echo $log; ?>">

                    <label for="inputComplemento">Complemento</label>
                    <input id="inputComplemento"
                           name="inputComplemento"
                           placeholder="Digite o Complemento"
                           type="text"
                           value="<?php echo $comp; ?>">

                    <label for="inputDdi">DDI</label>
                    <input id="inputDdi"
                           name="inputDdi"
                           placeholder="Digite o Código Internacional"
                           type="text"
                           value="<?php echo $ddi; ?>">

                    <label for="inputDdd">DDD</label>
                    <input id="inputDdd"
                           name="inputDdd"
                           placeholder="Digite o Numero do telefone"
                           type="text"
                           value="<?php echo $ddd; ?>">

                    <label for="inputNumero">Número do telefone</label>
                    <input id="inputNumero"
                           name="inputNumero"
                           placeholder="Digite o Numero do telefone"
                           type="text"
                           value="<?php echo $numero; ?>">               


                    <input type="submit" value="Alterar Aluno"> 

                </div>
            </div>
            <footer>

            </footer>
        </form>

    </body>
</html>
