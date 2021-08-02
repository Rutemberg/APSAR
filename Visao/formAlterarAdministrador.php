
<?php
session_start();
if (isset($_SESSION['AdministradorAlterado'])) {
    $idAdministrador = $_SESSION['idAdministradorAlterado'];
    $nomeAdministrador = $_SESSION['nomeAdministradorAlterado'];
    $cpfAdministrador = $_SESSION['cpfAdministradorAlterado'];
    $emailAdministrador = $_SESSION['emailAdministradorAlterado'];
    $senhaAdministrador = $_SESSION['senhaAdministradorAlterado'];

    $cep = $_SESSION['cepAdministradorAlterado'];
    $uf = $_SESSION['ufAdministradorAlterado'];
    $cidade = $_SESSION['cidadeAdministradorAlterado'];
    $bairro = $_SESSION['bairroAdministradorAlterado'];
    $log = $_SESSION['logradouroAdministradorAlterado'];
    $comp = $_SESSION['complementoAdministradorAlterado'];

    $ddi = $_SESSION['ddiAdministradorAlterado'];
    $ddd = $_SESSION['dddAdministradorAlterado'];
    $numero = $_SESSION['numeroAdministradorAlterado'];
} else {
    $idAdministrador = NULL;
    $nomeAdministrador = NULL;
    $cpfAdministrador = NULL;
    $emailAdministrador = NULL;
    $perfilAdministrador = NULL;
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>

        <meta charset="UTF-8">
        <title>Formulário</title>
        <link rel="stylesheet" type="text/css" href="css/formalterar.css">

    </head>
    <body>


        <form id="formalterar" 
              name="formAdministrador" 
              method="POST" 
              action="../Controle/controladorAlterarAdministrador.php">

            <header>
                <img src="img/Att.png">
                <h2>Alterar Administrador</h2>
            </header>



            <div class="corpoformulario">
                <div class="triangulo"></div>
                <div class="formesquerdo">
                    <input id="idAdministrador" name="idAdministrador" type="hidden"   
                           value="<?php echo $idAdministrador; ?>">

                    <label for="nomeAdministrador">Nome</label>
                    <input id="nomeAdministrador" name="nomeAdministrador" placeholder="Nome do Administrador"
                           type="text" size="30"
                           value="<?php echo $nomeAdministrador; ?>">

                    <label for="cpfAdministrador">CPF</label>
                    <input id="cpfAdministrador" name="cpfAdministrador" placeholder="Numero do CPF"
                           type="text" size="30" 
                           value="<?php echo $cpfAdministrador; ?>">

                    <label for="emailAdministrador">Email</label>
                    <input id="emailAdministrador" name="emailAdministrador" placeholder="exemplo@exemplo" type="text" size="30" 
                           value= "<?php echo $emailAdministrador; ?>">

                    <label for="senhaAdministrador">Senha</label>
                    <input id="senhaAdministrador" name="senhaAdministrador" type="password" size="30" accept=""
                           value="<?php echo $senhaAdministrador; ?>">

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


                    <input type="submit" value="Alterar Administrador"> 
                </div>
            </div>
            <footer>

            </footer>
        </form>

    </body>
</html>


