<?php

require_once 'classeUsuario.php'; //require_once, copiando os atributos da classeUsuário.

class classeAdministrador extends classeUsuario { //extends, palavra chave para estender..
                                               //...os atributos da classeUsuario para a classeAdministrador, que herda todos os atributos.
    private $idAdministrador; //private, define a acessibilidade a classe, não permite acesso...
    private $perfil; //atributos da classe.               //...das classes filhas, só permite acesso dentro da própria classe.

    function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador; //$this, diferencia as propriedades do objeto e váriaveis locais...
    }                                            //...referência o objeto atual, instâncias da classe.

    function getIdAdministrador() {   
        return $this->idAdministrador;
    } 
    function setPerfil($perfil) { //Metodo set recebe o valor(variável).
        $this->perfil = $perfil;
    }

    function getPerfil() {//Metodo get pega o valor.
        return $this->perfil;
    }

}
