<?php

require_once "conexao.php";

class DancaModel
{

    public function aulas()
    {
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $sql = "SELECT a.id, p.nome as profsesor, a.danca, a.horario, p.especialidade FROM dance.aulas a
            INNER JOIN dance.professores p ON p.id = a.professor_id";

            $busca = $db->prepare($sql);
            $busca->execute();

            $resultado = $busca->fetchAll(PDO::FETCH_OBJ);
            $busca->closeCursor();
        } catch (PDOException $e) {
            echo "<a  href='./index.php'> 
                        <div class='text-center alert alert-danger ' role='alert'>
                            <h4 class='alert-heading'> <span class='glyphicon glyphicon-alert'></span>  Atenção:<h4>
                            <hr/>
                            Erro de Consulta!$e
                            <h6>Notifique Pablo TI</h6>
                        </div>
                    </a>";
            exit(); //NÃO DEIXA CONTINUAR A EXECUÇÃO
        }

        if (isset($resultado)) {
            return $resultado;
        } else {
            return null;
        }
    }

    public function alunosResgistrados()
    {
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $sql = "SELECT nome
            ,idade
            ,(SELECT COUNT(*) FROM participacoes WHERE aluno_id = a.id)  AS 'total'
            FROM alunos a";

        $busca = $db->prepare($sql);
        $busca->execute();

        $resultado = $busca->fetchAll(PDO::FETCH_OBJ);
        $busca->closeCursor();

        } catch (PDOException $e) {
            echo "<a  href='./index.php'> 
                        <div class='text-center alert alert-danger ' role='alert'>
                            <h4 class='alert-heading'> <span class='glyphicon glyphicon-alert'></span>  Atenção:<h4>
                            <hr/>
                            Erro de Consulta!$e
                            <h6>Notifique Pablo TI</h6>
                        </div>
                    </a>";
            exit(); //NÃO DEIXA CONTINUAR A EXECUÇÃO
        }

        return $resultado;
    }
}
