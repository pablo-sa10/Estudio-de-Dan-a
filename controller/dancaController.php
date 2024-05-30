<?php 

require_once "../model/dancaModel.php";

class DancaController{

    public function getAulas(){
        $aulas = (new DancaModel())->aulas();
        return $aulas;
    }

    public function getAlunosRegistrados(){
        $alunosRegistrados = (new DancaModel())->alunosResgistrados();
        return $alunosRegistrados;
    }

    public function registrarAluno($nome, $idade){
        $registrarAlunos = (new DancaModel())->registrarAluno($nome, $idade);
        return $registrarAlunos;
    }

    public function professor($id_aula){
        $professor = (new DancaModel())->professor($id_aula);
        return $professor;
    }
}