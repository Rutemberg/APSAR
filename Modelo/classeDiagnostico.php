<?php

//Classe diagnostico corrigido em 09.11.16.
//require_once 'classeUsuario.php';

class classeDiagnostico /* extends classeUsuario */ {

    private $idDiagnostico;
    private $arquivo;
    private $idAluno;

    public function getIdAluno() {
        return $this->idAluno;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }

    public function setIdDiagnostico($idDiagnostico) {
        $this->idDiagnostico = $idDiagnostico;
    }

    public function getIdDiagnostico() {
        return $this->idDiagnostico;
    }

    public function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    public function getArquivo() {
        return $this->arquivo;
    }

}
