<?php

class classeEndereco {

    private $idendereco;    
    private $cep;
    private $uf;
    private $cidade;    
    private $bairro;
    private $logradouro;
    private $complemento;
    private $idAluno;
    private $idProfessor;
    private $idCoordenador;
    private $idAdministrador;
    
    function getIdendereco() {
        return $this->idendereco;
    }

    function getCep() {
        return $this->cep;
    }

    function getUf() {
        return $this->uf;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getIdAluno() {
        return $this->idAluno;
    }

    function getIdProfessor() {
        return $this->idProfessor;
    }

    function getIdCoordenador() {
        return $this->idCoordenador;
    }

    function getIdAdministrador() {
        return $this->idAdministrador;
    }

    function setIdendereco($idendereco) {
        $this->idendereco = $idendereco;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }

    function setIdProfessor($idProfessor) {
        $this->idProfessor = $idProfessor;
    }

    function setIdCoordenador($idCoordenador) {
        $this->idCoordenador = $idCoordenador;
    }

    function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }



}
