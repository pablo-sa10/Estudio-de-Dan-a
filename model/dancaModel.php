<?php

require_once "conexao.php";

class DancaModel
{

    public function aulas()
    {
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $sql = "SELECT a.id, a.danca, a.horario FROM dance.aulas a";

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

    public function registrarAluno($nome, $idade)
    {
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $db->beginTransaction();

            $sql = "INSERT INTO alunos (nome, idade)
            VALUES (:nome, :idade)";

            $busca = $db->prepare($sql);
            $busca->bindValue(":nome", $nome, PDO::PARAM_STR);
            $busca->bindValue(":idade", $idade, PDO::PARAM_INT);

            $busca->execute();

            $db->lastInsertId();
            $db->commit();
            $busca->closeCursor();

            return true;
        } catch (PDOException $e) {
            $db->rollBack();
            echo "<a  href='./index.php'> 
                        <div class='text-center alert alert-danger ' role='alert'>
                            <h4 class='alert-heading'> <span class='glyphicon glyphicon-alert'></span>  Atenção:<h4>
                            <hr/>
                            Erro de Consulta!$e
                            <h6>Notifique Pablo TI</h6>
                        </div>
                    </a>";
            return false;
            exit(); //NÃO DEIXA CONTINUAR A EXECUÇÃO
        }
    }

    public function professor($id_aula){
        
    }
}
