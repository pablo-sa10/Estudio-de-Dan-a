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
}