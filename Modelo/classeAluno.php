<?php
//classe modelo aluno atualizado com novo atributo chave estrangeira idDiagnostico em 09.11.16.
require_once 'classeUsuario.php';

class classeAluno extends classeUsuario {
    
    private $idAluno;
    private $matricula;
    private $idDiagnostico;
    
    
    function getIdAluno() {
        return $this->idAluno;
    }
    function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }
    function getMatricula() {
        return $this->matricula;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }
    
    function getIdDiagnostico() {
        return $this->idDiagnostico;
    }

    function setIdDiagnostico($idDiagnostico) {
        $this->idDiagnostico = $idDiagnostico;
    }
    
} 
      

    

    


