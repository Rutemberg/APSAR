<!DOCTYPE html>
<html lang="pt">  <!--Atualizado em 09.11.2016.-->
    <head>

        <meta charset="UTF-8">
        <title>Formulários</title>
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/jquery.validate.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                jQuery.validator.addMethod("verificaCPF", function (value, element) {
                    value = value.replace('.', '');
                    value = value.replace('.', '');
                    cpf = value.replace('-', '');
                    while (cpf.length < 11)
                        cpf = "0" + cpf;
                    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
                    var a = [];
                    var b = new Number;
                    var c = 11;
                    for (i = 0; i < 11; i++) {
                        a[i] = cpf.charAt(i);
                        if (i < 9)
                            b += (a[i] * --c);
                    }
                    if ((x = b % 11) < 2) {
                        a[9] = 0
                    } else {
                        a[9] = 11 - x
                    }
                    b = 0;
                    c = 11;
                    for (y = 0; y < 10; y++)
                        b += (a[y] * c--);
                    if ((x = b % 11) < 2) {
                        a[10] = 0;
                    } else {
                        a[10] = 11 - x;
                    }
                    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg))
                        return false;
                    return true;
                }, "*Informe um CPF válido."); // Mensagem padrão 

            });

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#formCadastro").validate({
                    rules: {
                        inputNome: {
                            required: true,
                            minlength: 2
                        },
                        inputdataNascimento: {
                            required: true
                        },
                        inputcep: {
                            required: true
                        },
                        inputuf: {
                            required: true
                            
                        },
                        inputcidade: {
                            required: true
                        },
                        inputbairro: {
                            required: true
                        },
                        inputlogradouro: {
                            required: true
                        },
                        inputcomplemento: {
                            required: true
                        },
                        inputDdi: {
                            required: true,
                            minlength: 2
                        },
                        inputDdd: {
                            required: true,
                            minlength: 2
                        },
                        inputNumero: {
                            required: true
                        },
                        inputCpf: {
                            required: true,
                            verificaCPF: true
                        },
                        inputEmail: {
                            required: true,
                            email: true
                        },
                        inputSenha: {
                            required: true,
                            minlength: 2
                        },
                        inputcontrasenha: {
                            required: true,
                            equalTo: "#inputSenha"
                        }
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                $("#inputCpf").mask("999.999.999-99");
                $("#inputNumero").mask("9999-9999");

            });
        </script>
    </head>
    <body>

        <form name="formCoordenador" id="formCadastro"
              method="POST"
              action="../Controle/controladorCadastrarCoordenador.php">  


            <header>
                <img src="img/document-edit-flat.png">
                <h2>Cadastro Coordenador</h2>
            </header>


            <div class="corpoformulario">
                <div class="formesquerdo">

                    <label for="inputNome">Nome</label><br>
                    <input id="inputNome"
                           name="inputNome"
                           placeholder="Digite o nome"
                           type="text" 
                           value="">



                    <label for="inputDataNascimento">Data de Nascimento</label><br>
                    <input id="inputDataNascimento"
                           name="inputdataNascimento" 
                           placeholder=""
                           type="date" 
                           value=""> 

                    Sexo:
                    <label for='masculino'>Masculino</label>
                    <input type="radio" id="masculino" name="inputSexo" value="masculino" checked>
                    <label for='masculino'>Feminino</label>
                    <input type="radio" id="feminino" name="inputSexo" value="feminino"><br>


                    <label for="inputCpf">CPF</label><br>
                    <input id="inputCpf"
                           name="inputCpf"
                           placeholder="Digite o CPF"
                           type="text"
                           value=''>


                    <label for="inputEmail">Email</label><br>
                    <input id="inputEmail"
                           name="inputEmail"
                           placeholder="exemplo@exemplo.com"
                           type="text" 
                           value="">


                    <label for="inputQualificacoes">Qualificações</label><br>
                    <textarea id="inputQualificacoes" name="inputQualificacoes"></textarea><br>


                    <label for="inputSenha">Senha</label><br>
                    <input id="inputSenha"
                           name="inputSenha"
                           placeholder="Digite sua Senha"
                           type="password"
                           value=''>
                    <label for="inputcontrasenha">Senha novamente</label><br>
                    <input id="inputcontrasenha"
                           name="inputcontrasenha"
                           placeholder="Digite sua Senha"
                           type="password"
                           value=''>

                </div>
                <div class="formcentro">
                    <label for="inputcep">CEP</label><br>
                    <input id="inputcep"
                           name="inputcep"
                           placeholder="Digite o CEP."
                           type="text"
                           value=""> 

                    <label for="inputuf">UF</label><br>
                    <select id="inputuf"
                           name="inputuf"
                           >
                        <option value="">Selecione o estado</option>
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

                    <label for="inputcidade">Cidade</label><br>
                    <input id="inputcidade"
                           name="inputcidade"
                           placeholder="Digite a Cidade"
                           type="text"
                           value=""> 


                    <label for="inputbairro">Bairro</label><br>
                    <input id="inputbairro"
                           name="inputbairro"
                           placeholder="Digite o Bairro"
                           type="text"
                           value=""> 

                    <label for="inputlogradouro">Logradouro</label><br>
                    <input id="inputlogradouro"
                           name="inputlogradouro"
                           placeholder="Digite o Logeradouro"
                           type="text"
                           value=""> 

                    <label for="inputcomplemento">Complemento</label><br>
                    <input id="inputcomplemento"
                           name="inputcomplemento"
                           placeholder="Digite o Complemento"
                           type="text"
                           value=""> 

                </div>
                <div class="formdireito">
                    <label for="inputDdi">DDI</label><br>
                    <input id="inputDdi"
                           name="inputDdi"
                           placeholder="Digite o DDI"
                           type="text"
                           value="">

                    <label for="inputDdi">DDD</label><br>
                    <input id="inputDdd"
                           name="inputDdd"
                           placeholder="Digite o DDD"
                           type="text"
                           value="">
                    <label for="inputDdi">Número</label><br>
                    <input id="inputNumero"
                           name="inputNumero"
                           placeholder="Digite número do telefone"
                           type="text"
                           value="">



                    <input type="reset" value="Limpar">
                    <input type="submit" value="Cadastrar Coordenador"> 

                </div>
            </div>
            <footer>

            </footer>
        </form>

    </body>
</html>
