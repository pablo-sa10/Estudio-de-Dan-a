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

    public function alunosResgistrados($id_aluno)
    {
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $sql = "SELECT id
            ,nome
            ,idade
            ,(SELECT COUNT(*) FROM participacoes WHERE aluno_id = a.id)  AS 'total'
            FROM alunos a ";

            if (!empty($id_aluno)) {
                $sql .= " WHERE id = :id ";
            }

            $busca = $db->prepare($sql);
            if (!empty($id_aluno)) {
                $busca->bindValue(":id", $id_aluno, PDO::PARAM_INT);
            }
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

    public function registrarAluno($nome, $idade, $id)
    {
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $db->beginTransaction();

            if (empty($id)) {
                $sql = "INSERT INTO alunos (nome, idade)
                VALUES (:nome, :idade)";
            }elseif(!empty($id)){
                $sql = "UPDATE alunos 
                SET nome = :nome, idade = :idade
                WHERE id = :id";
            }

            $busca = $db->prepare($sql);
            $busca->bindValue(":nome", $nome, PDO::PARAM_STR);
            $busca->bindValue(":idade", $idade, PDO::PARAM_INT);
            if (!empty($id)){
                $busca->bindValue(":id", $id, PDO::PARAM_INT);
            }

            $busca->execute();

            if (empty($id)){
                $db->lastInsertId();
            }
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

    public function getAula($id_aula)
    {
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $sql = "SELECT a.id AS id_aula
                        ,danca
                        ,horario
                        ,nome AS professor
                        ,especialidade
            FROM aulas a
            INNER JOIN professores p ON p.id = a.professor_id
            WHERE a.id = :id_aula";

            $busca = $db->prepare($sql);
            $busca->bindValue(":id_aula", $id_aula, PDO::PARAM_INT);
            $busca->execute();

            $resultado = $busca->fetch(PDO::FETCH_OBJ);
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

    public function getRegistroAula($id_aula, $aluno_id)
    {

        $db = new Conexao();
        $db = $db->conectar();

        try {
            $sql = "SELECT p.id AS id_p
                            ,alu.id AS id_aluno
                            ,alu.nome
                            ,alu.idade
                            ,nivel_experiencia_aluno AS nivel
            FROM participacoes p
            INNER JOIN aulas a ON p.aula_id = a.id
            INNER JOIN alunos alu on p.aluno_id = alu.id
            WHERE a.id = :id ";

            if (!empty($aluno_id)) {
                $sql .= " AND alu.id = :aluno_id ";
            }

            $busca = $db->prepare($sql);
            $busca->bindValue(":id", $id_aula, PDO::PARAM_INT);

            if (!empty($aluno_id)) {
                $busca->bindValue(":aluno_id", $aluno_id, PDO::PARAM_INT);
            }
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

    public function setRegistroAula($id_aula, $aluno_id, $experiencia)
    {

        $db = new Conexao();
        $db = $db->conectar();

        try {
            $db->beginTransaction();

            $sql = "INSERT INTO participacoes (aluno_id, aula_id, nivel_experiencia_aluno)
            VALUES (:aluno_id, :aula_id, :nivel)";

            $busca = $db->prepare($sql);
            $busca->bindValue(":aluno_id", $aluno_id, PDO::PARAM_INT);
            $busca->bindValue(":aula_id", $id_aula, PDO::PARAM_INT);
            $busca->bindValue(":nivel", $experiencia, PDO::PARAM_STR);

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

    public function atualizarNivel($nivel, $aluno_id, $id_aula)
    {

        $db = new Conexao();
        $db = $db->conectar();

        try {
            $db->beginTransaction();

            $sql = "UPDATE participacoes 
            SET nivel_experiencia_aluno = :nivel
            WHERE aluno_id = :id_aluno AND aula_id = :id_aula";

            $busca = $db->prepare($sql);
            $busca->bindValue(":id_aluno", $aluno_id, PDO::PARAM_INT);
            $busca->bindValue(":id_aula", $id_aula, PDO::PARAM_INT);
            $busca->bindValue(":nivel", $nivel, PDO::PARAM_STR);
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

    public function deletarAlunoAula($id_aluno, $id_aula)
    {
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $db->beginTransaction();

            $sql = "DELETE FROM participacoes 
            WHERE aluno_id = :id_aluno AND aula_id = :id_aula";

            $busca = $db->prepare($sql);
            $busca->bindValue(":id_aluno", $id_aluno, PDO::PARAM_INT);
            $busca->bindValue(":id_aula", $id_aula, PDO::PARAM_INT);
            $busca->execute();

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

    public function deletarAluno($id){
        $db = new Conexao();
        $db = $db->conectar();

        try {
            $db->beginTransaction();

            $sql = "DELETE FROM alunos 
            WHERE id = :id";

            $busca = $db->prepare($sql);
            $busca->bindValue(":id", $id, PDO::PARAM_INT);
            $busca->execute();

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
}
