<?php
session_start(); //Atualizado em 08.11.2016
if (isset($_SESSION['professorAlterado'])) {
    $idProfessor = $_SESSION['idProfessorAlterado'];
    $nomeProfesssor = $_SESSION['nomeProfessorAlterado'];
    $cpfProfessor = $_SESSION['cpfProfessorAlterado'];
    $emailProfessor = $_SESSION['emailProfessorAlterado'];
    $senhaProfessor = $_SESSION['senhaProfessorAlterado'];
    $DisciplinaProfessor = $_SESSION['disciplinaProfessorAlterado'];

    $cep = $_SESSION['cepProfessorAlterado'];
    $uf = $_SESSION['ufProfessorAlterado'];
    $cidade = $_SESSION['cidadeProfessorAlterado'];
    $bairro = $_SESSION['bairroProfessorAlterado'];
    $log = $_SESSION['logradouroProfessorAlterado'];
    $comp = $_SESSION['complementoProfessorAlterado'];

    $ddi = $_SESSION['ddiProfessorAlterado'];
    $ddd = $_SESSION['dddProfessorAlterado'];
    $numero = $_SESSION['numeroProfessorAlterado'];
} else {
    $idProfessor = NULL;
    $nomeProfesssor = NULL;
    $dataNascimentoProfesssor = NULL;
    $sexoProfesssor = NULL;
    $cpfProfessor = NULL;
    $emailProfessor = NULL;
    $senhaProfessor = NULL;
    $perfilprofessor = NULL;
    $DisciplinaProfessor = NULL;
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>

        <meta charset="UTF-8">
        <title>Formulários</title>

        <link rel="stylesheet" type="text/css" href="css/formalterar.css">

    </head>
    <body>
        <form id="formalterar" 
              name="formProfessor" 
              method="POST" 
              action="../Controle/controladorAlterarProfessor.php">


            <header>
                <img src="img/Att.png">
                <h2>Alterar Professor</h2>
            </header>



            <div class="corpoformulario">
                <div class="triangulo"></div>
                <div class="formesquerdo">

                    <input id="idProfessor" name="idProfessor" type="hidden" 
                           value="<?php echo $idProfessor; ?>">

                    <label for="nomeProfessor">Nome</label>
                    <input id="nomeProfessor" name="nomeProfessor" type="text" size="30"
                           value="<?php echo $nomeProfesssor; ?>">

                    <label for="cpfProfessor">CPF</label>
                    <input id="cpfProfessor" name="cpfProfessor" type="text" size="30"
                           value="<?php echo $cpfProfessor; ?>">

                    <label for="emailProfessor">Email</label>
                    <input id="emailProfessor" name="emailProfessor" type="text" size="30" 
                           value="<?php echo $emailProfessor; ?>">

                    <label for="DisciplinaProfessor">Disciplina</label><br>
                    <select id="DisciplinaProfessor"
                            name="DisciplinaProfessor"
                            >
                        <option value="<?php echo $DisciplinaProfessor; ?>"><?php echo $DisciplinaProfessor; ?></option>
                        <option value="Arte">Arte</option>
                        <option value="Biologia">Biologia</option>
                        <option value="Educação Física">Educação Física</option>
                        <option value="Educação Religiosa">Educação Religiosa</option>
                        <option value="Espanhol">Espanhol</option>
                        <option value="Filosofia">Filosofia</option>
                        <option value="Física">Física</option>
                        <option value="Geografia">Geografia</option>
                        <option value="História">História</option>
                        <option value="Inglês">Inglês</option>
                        <option value="Língua Portuguesa">Língua Portuguesa</option>
                        <option value="Literatura">Literatura</option>
                        <option value="Matemática">Matemática</option>
                        <option value="Química">Química</option>
                        <option value="Sociologia">Sociologia</option>
                    </select>

                    <label for="senhaProfessor">Senha</label>
                    <input id="senhaProfessor" name="senhaProfessor" type="password" size="30"  
                           value="<?php echo $senhaProfessor; ?>">

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

                </div>

                <div class="formdireito">
                    <label for="inputCidade">Cidade</label>
                    <input id="inputCidade"
                           name="inputCidade"
                           placeholder="Digite a Cidade"
                           type="text"
                           value="<?php echo $cidade; ?>">

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




                    <input type="submit" value="Alterar Professor"> 

                </div>
            </div>
            <footer>

            </footer>
        </form>


    </body>
</html>

