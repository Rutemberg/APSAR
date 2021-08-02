<?php

class classeTelefone{

    private $idtelefone;
    private $ddi;
    private $ddd;   
    private $numero;
    private $idProfessor;
    private $idAluno;
    private $idAdministrador;
    private $idCoordenador;

    function getIdtelefone() {
        return $this->idtelefone;
    }

    function getDdi() {
        return $this->ddi;
    }

    function getDdd() {
        return $this->ddd;
    }

    function getNumero() {
        return $this->numero;
    }

    function getIdProfessor() {
        return $this->idProfessor;
    }

    function getIdAluno() {
        return $this->idAluno;
    }

    function getIdAdministrador() {
        return $this->idAdministrador;
    }

    function getIdCoordenador() {
        return $this->idCoordenador;
    }

    function setIdtelefone($idtelefone) {
        $this->idtelefone = $idtelefone;
    }

    function setDdi($ddi) {
        $this->ddi = $ddi;
    }

    function setDdd($ddd) {
        $this->ddd = $ddd;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setIdProfessor($idProfessor) {
        $this->idProfessor = $idProfessor;
    }

    function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }

    function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }

    function setIdCoordenador($idCoordenador) {
        $this->idCoordenador = $idCoordenador;
    }


}
