<?php
//Atualizado em 09.11.16
require_once 'classeUsuario.php';

class classeProfessor extends classeUsuario {

    private $idProfessor;
    private $disciplina;
    
    
   
    public function getIdProfessor() {
        return $this->idProfessor;   
    }
    public function setIdProfessor($idProfessor) {
        $this->idProfessor=$idProfessor;        
    }
        public function getDisciplina() {
        return $this->disciplina;
        
    }
    public function setDisciplina($disciplina) {
        $this->disciplina=$disciplina;        
    }
}
