<?php
session_start(); //Atualizado em 10.11.2016.
if (isset($_SESSION['coordenadorAlterado'])) {

    $idCoordenador = $_SESSION['idCoordenadorAlterado'];
    $nomeCoordenador = $_SESSION['nomeCoordenadorAlterado'];
    $cpfCoordenador = $_SESSION['cpfCoordenadorAlterado'];
    $emailCoordenador = $_SESSION['emailCoordenadorAlterado'];
    $qualificacaoCoordenador = $_SESSION['qualificacaoCoordenador'];
    $senhaCoordenador = $_SESSION['senhaCoordenadorAlterado'];

    $cep = $_SESSION['cepcoordenadorAlterado'];
    $uf = $_SESSION['ufcoordenadorAlterado'];
    $cidade = $_SESSION['cidadecoordenadorAlterado'];
    $bairro = $_SESSION['bairrocoordenadorAlterado'];
    $log = $_SESSION['logradourocoordenadorAlterado'];
    $comp = $_SESSION['complementocoordenadorAlterado'];

    $ddi = $_SESSION['ddicoordenadorAlterado'];
    $ddd = $_SESSION['dddcoordenadorAlterado'];
    $numero = $_SESSION['numerocoordenadorAlterado'];
} else {
    $idCoordenador = NULL;
    $nomeCoordenador = NULL;
    $dataNascimentoCoordenador = NULL;
    $sexoCoordenador = NULL;
    $cpfCoordenador = NULL;
    $emailCoordenador = NULL;
    $senhaCoordenador = NULL;
    $qualificacaoCoordenador = NULL;
    $perfilCoordenador = NULL;
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>

        <meta charset="UTF-8">
        <title>Formulários</title>

        <link rel="stylesheet" type="text/css" href="css/formalterar.css">

    </head>

    <body><!--Atualizado em 10.11.2016.-->
        <form id="formalterar" 
              name="formCoordenador" 
              method="POST" 
              action="../Controle/controladorAlterarCoordenador.php">
            <header>
                <img src="img/Att.png">
                <h2>Alterar Coordenador</h2>
            </header>



            <div class="corpoformulario">
                <div class="triangulo"></div>
                <div class="formesquerdo">


                    <input id="idCoordenador" name="idCoordenador" type="hidden" 
                           value="<?php echo $idCoordenador; ?>">

                    <label for="nomeCoordenador">Nome</label>
                    <input id="nomeCoordenador" name="nomeCoordenador" type="text" size="30"
                           value="<?php echo $nomeCoordenador; ?>">

                    <label for="cpfCoordenador">CPF</label>
                    <input id="cpfCoordenador" name="cpfCoordenador" type="text" size="30"
                           value="<?php echo $cpfCoordenador; ?>">

                    <label for="emailCoordenador">Email</label>
                    <input id="emailCoordenador" name="emailCoordenador" type="text" size="30" 
                           value="<?php echo $emailCoordenador; ?>">

                    <label for="senhaCoordenador">Senha</label>
                    <input id="senhaCoordenador" name="senhaCoordenador" type="password" size="30" 
                           value="<?php echo $senhaCoordenador; ?>">                


                    <label for="inputQualificacoes">Qualificação</label><br>
                    <textarea id="inputQualificacoes" name="inputQualificacoes"><?php echo $qualificacaoCoordenador; ?></textarea>

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

                    <input type="submit" value="Alterar Coordenador"> 

                </div>
            </div>
            <footer>

            </footer>
        </form>

    </body>
</html>


