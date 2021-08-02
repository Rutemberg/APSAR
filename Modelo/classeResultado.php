
<?php

//require_once 'classeUsuario.php';  Modificado no dia 10.11.16

class classeResultado /*extends classeUsuario*/ {

    private $idResultado;
    private $idAtividade;
    private $parecerResultado;
    private $idProfessor;
    
    
    public function getIdProfessor() {
        return $this->idProfessor;
    }

    public function setIdProfessor($idProfessor) {
        $this->idProfessor = $idProfessor;
    }

    
    public function getIdAtividade() {
        return $this->idAtividade;
    }

    public function setIdAtividade($idAtividade) {
        $this->idAtividade = $idAtividade;
    }
    
    public function setIdResultado($idResultado) {
        $this->idResultado = $idResultado;
    }

    public function getIdResultado() {
        return $this->idResultado;
    }

    public function setParecerResultado($parecerResultado) {
        $this->parecerResultado = $parecerResultado;
    }

    public function getParecerResultado() {
        return $this->parecerResultado;
    }

}
