<?php

 //   require_once 'classeUsuario.php'; Nova classe criada em 09.11.16.

    class classeAtividadesAdaptadas /*extends classeUsuario */{

    public $idAtividadesAdaptadas;
    public $idProfessor;
    public $descricao;
    public $arquivoAtividadesAdaptadas;
    public $nome;
    public $disciplina;


    public function getDisciplina() {
        return $this->disciplina;
    }

    public function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

        
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    

    public function setIdAtividadesAdaptadas($idAtividadesAdaptadas) {
        $this->idAtividadesAdaptadas = $idAtividadesAdaptadas;
    }

    public function getIdAtividadesAdapatadas() {
        return $this->idAtividadesAdaptadas;
    }

    public function setIdProfessor($idProfessor) {
        $this->idProfessor = $idProfessor;
    }

    public function getIdProfessor() {
        return $this->idProfessor;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setArquivoAtividadesAdaptadas($arquivoAtividadesAdaptadas) {
        $this->arquivoAtividadesAdaptadas = $arquivoAtividadesAdaptadas;
    }

    public function getArquivoAtividadesAdaptadas() {
        return $this->arquivoAtividadesAdaptadas;
    }

   
}
