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

    public function getAula($id_aula){
        $aula = (new DancaModel())->getAula($id_aula);
        return $aula;
    }

    public function getRegistroAula($id_aula){
        $registroAula = (new DancaModel())->getRegistroAula($id_aula);
        return $registroAula;
    }
}