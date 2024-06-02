<?php

include_once "../controller/dancaController.php";

$dancaController = new DancaController();

if (isset($_GET['aluno'])) {
    $id_aluno = $_GET['aluno'];
    $aluno = $dancaController->getAlunosRegistrados($id_aluno);
}

if (isset($_POST['enviar'])) {

    $id_aluno = $_GET['aluno'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $registrarAluno = $dancaController->registrarAluno($nome, $idade, $id_aluno);
    header("Location: alunos_registrados.php");
    exit;
}

include_once "../menu.php";

?>

<main class="">

    <section class="cor_fundo_primeira_secao py-5">
        <div class="container mb-5">
            <div class="imagem_fundo container d-flex justify-content-center justify-content-md-end">
                <div class="margin">
                    <form method="post" class="margin_form">

                        <div class="mb-5">
                            <h3 class="text_color"><?php isset($id_aluno) ? $text = "EDITAR DADOS DO" : $text = "CADASTRAR NOVO" ?><?= $text ?> ALUNO</h3>
                        </div>
                        <div class="d-flex flex-column">
                            <?php

                            $nome = "";
                            $idade = "";

                            if (!empty($id_aluno)) {
                                $nome = $aluno[0]->nome;
                                $idade = $aluno[0]->idade;
                            }

                            ?>
                            <label class=" text_color my-2" for="">NOME</label>
                            <input name="nome" class="inputs_form rounded py-2" value="<?= $nome ?>" type="text" required>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <label class="text_color my-2" for="">IDADE</label>
                            <input name="idade" class="inputs_form rounded py-2" value="<?= $idade ?>" type="number" required>
                        </div>
                        <div class="text-center">
                            <button name="enviar" class="text_color mt-5 btn btn_form">SALVAR</button>
                        </div>
                    </form>
                    <div class="form_cancelar" action="./alunos_registrados.php">
                        <a href="./alunos_registrados.php"><button class="btn_cancelar text_color mt-5 btn btn-danger">CANCELAR</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    include_once "../footer.php";

    ?>

</main>