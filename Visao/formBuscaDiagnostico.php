<<!DOCTYPE html>
<!--Atualizado em 12.11.2016.-->
<html lang="pt"> 
    
    <head>

        <meta charset="UTF-8">
        <title>Formulário</title>
        <!--<link href='https://font.googleapis.com/css?family=Oswald' rel="stylesheet"
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
                  
            .btn:houver{            
                   cursor: pointer;
                   border: 2px solid black
               } 
             .btn-envio{
                         background-color:#389739
               }
             .btn-delete{
                         background-color: #A80B12


              </style>-->
        <style>
            body{
                font-family: 'arial'
            }
            #formBuscaDiagnostico{
                border: 1px solid #ccc;
                text-align: center;
                width: 500px;
                font-size: 18px;
                margin: 0 auto;
                padding: 10px 0px
            }
            #formBuscaDiagnostico input{
                border: 1px solid #ccc;
                text-align: center;
                width: 300px;
                height: 30px;
                font-size: 18px;
                margin: 0 auto;
                margin-bottom: 5px;
            }
            #formBuscaDiagnostico input[type='submit']{
                border: 1px solid black;
                text-align: center;
                width: 300px;
                height: 30px;
                font-size: 18px;
                margin: 0 auto;
                margin-bottom: 5px;
                background: #3498db;
                color: white;
                border: none
            }
        </style>
    </head>
    <body>
        <form id="formBuscaDiagnostico" name="formBuscaDiagnostico" 
              method="POST" action="../Controle/controladorBuscarDiagnostico.php">
            <label>Nome</label><br>
            <input type="text" id="nomeDiagnostico" name="nomeDiagnostico" value="">
            <br>
            <input type="submit" value="Buscar Diagnostico">


        </form>

    </body>
</html>
