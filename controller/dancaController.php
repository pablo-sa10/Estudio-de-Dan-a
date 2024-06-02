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

    public function getRegistroAula($id_aula, $aluno_id, $experiencia){
        $registroAula = (new DancaModel())->getRegistroAula($id_aula, $aluno_id);

        if(!empty($aluno_id) && empty($registroAula[0])){
            //SE NÃO TIVER REGISTRO DO ALUNO FAZ O INSERT
            $registroAluno = (new DancaModel())->setRegistroAula($id_aula, $aluno_id, $experiencia);
            return $registroAluno;
            exit; 

        }else if(!empty($aluno_id) && !empty($registroAula[0])){
            //SE TIVER REGISTRO VOLTA COMO FALSE
            return false;
            exit;
        }

        return $registroAula;
        
    }

    public function atualizarNivel($nivel, $aluno_id, $id_aula){
        $atualizarNivel = (new DancaModel())->atualizarNivel($nivel, $aluno_id, $id_aula);
        return $atualizarNivel;
    }

    public function deletarAlunoAula($id_aluno, $id_aula){
        $deletarAluno = (new DancaModel())->deletarAlunoAula($id_aluno, $id_aula);
        return $deletarAluno;
    }
}