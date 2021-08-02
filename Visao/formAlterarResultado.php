<?php 
session_start(); //Atualizado em 10.11.2016.
if (isset($_SESSION['resultadoAlterado'])) {
    $idResultado = $_SESSION['idResultadoAlterado'];
    $parecerResultado = $_SESSION['parecerresultadoAlterado'];
    
}  else {
    $idResultado = NULL;
    $parecerResultado = NULL;
    }

 
?>
<!DOCTYPE html>
<html lang="pt">
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
                   
             .btn:houver{            
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
        <form id="formResultado" 
              name="formResultado" 
              method="POST" 
              action="../Controle/controladorAlterarResultado.php">
            <fieldset>
                <legend>Resultado</legend>
            <input id="idResultado" name="idResultado" type="hidden" 
                   value="<?php echo $idResultado; ?>">
            <br/>
             <label for="parecerResultado">Parecer</label>
             <input id="parecerResultado" name="parecerResultado" type="text" size="30"
                   value="<?php echo $parecerResultado;?>">
            <br/><br/>
                        
            <input type="submit" value="Alterar Resultado"> 
            </fieldset>
        </form>

        <?php
        // put your code here
        ?>
    </body>
</html>


