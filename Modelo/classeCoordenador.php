<?php

require_once 'classeUsuario.php'; //Coordenaador modificado com novo atributo qualificacao em 09.11.16

class classeCoordenador extends classeUsuario {

    private $qualificacoes;
    private $idCoordenador;
    private $perfil;
    
    public function getQualificacao() {
        return $this->qualificacoes;
    }

    public function setQualificacao($qualificacoes) {
        $this->qualificacoes = $qualificacoes;
    }
    public function getIdCoordenador(){
        return $this->idCoordenador;
    }
    public function setIdCoordenador($idCoordenador){
        $this->idCoordenador=$idCoordenador;
    }
    public function getPerfil(){
        return $this->perfil;
    }
    public function setPerfil($perfil) {
        $this->perfil=$perfil;        
    }

}
