


<!DOCTYPE html>
<html lang="pt"> <!--Atualizado em 08.11.2016.-->
    <head>
          
         <meta charset="UTF-8">
         <title>Formulários</title>
         <link href='https://font.googleapis.com/css?family=Oswald' rel="stylesheet"
               type= text/css>
              
         <style>
              *{
                 font-family: 'Oswald', sans-serif;
               }
        label{
             width:  150px;
              margin-top: 3px;

          input {
                  height: 20px;
                  width:  220px;
                  padding: 5px 8px;
                  border-radius: 3px;
                }
            
             input[type="chekbox"]{
             height: 10px; ;
             width: 10px;
             padding: 1px;;
             }

              .check{
                    font-size: 12px;
                    display: inline;
              }
               input:focus:invalid{
                  border: solid red 2px;
               }

                textarea{
                         padding: 8px;
                         width:300px;
               }
              
               legend{
                       color:darkgoldenrod;
                }

                fieldset{
                          border: none;
                }
                 .btn {
                        background-color:#999999;
                        border: 2px solid white;
                        border-radius: 8px;
                        color: white;
                        display: inline-block;
                        padding: 8px 16px;
                        text-decoration: none;
                        text-align: center;
                        vertical-align: middle;
                }
                   
             .btn:hover{            
                    cursor: pointer;
                    border: 2px solid black
                } 
              .btn-envio{
                          background-color:#389739
                }
              .btn-delete{
                          background-color: #A80B12


               </style>

    </head>
    <body>
        <form name="formCadastroDiagnostico.php" id="formCadastroDiagnostico"
              method="POST"
              action="../Controle/controladorCadastrarDiagnostico.php" > 
            <h1>Cadastro de Diagnóstico</h1>
            <fieldset>
                <h2>Cadastrar Diagnostico</h2>

                <div>
                <label for="inputArquivo">Arquivo</label>
                <input id="inputArquivo"
                       name="inputArquivo"
                       placeholder=""
                       type="text" 
                       value="">
                </div>
                
                <input type="reset" value="Limpar">
                <input type="submit" value="Cadastrar Diagnóstico"> 
            </fieldset>

        </form>

    </body>
</html>




