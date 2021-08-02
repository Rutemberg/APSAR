<?php

abstract class classeUsuario {

    private $nome;
    private $cpf;
    private $email;    
    private $senha;
    private $dataNascimento;
    private $sexo;

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }
    function getSenha() {
        return $this->senha;
    }
    function getDataNascimento() {
        return $this->dataNascimento;
    }  
    
    function getSexo() {
        return $this->sexo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    function setSenha($senha) {
        $this->senha = $senha;
    }
    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    } 
    function setSexo($sexo) {
        $this->sexo = $sexo;
    }


}
