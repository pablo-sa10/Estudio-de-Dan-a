<?php

include_once "../controller/dancaController.php";

if (isset($_POST['enviar'])) {
    $dancaController = new DancaController();

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $registrarAluno = $dancaController->registrarAluno($nome, $idade);
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
                            <h3 class="text_color">CADASTRAR NOVO ALUNO</h3>
                        </div>
                        <div class="d-flex flex-column">
                            <label class=" text_color my-2" for="">NOME</label>
                            <input name="nome" class="inputs_form rounded py-2" type="text" required>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <label class="text_color my-2" for="">IDADE</label>
                            <input name="idade" class="inputs_form rounded py-2" type="number" required>
                        </div>
                        <div class="text-center">
                            <button name="enviar" class="text_color mt-5 btn btn_form">SALVAR</button>
                        </div>
                    </form>
                    <form class="form_cancelar" action="./alunos_registrados.php" method="post">
                        <input hidden name="id" type="text" value="<?= $aula_id ?>">
                        <button class="btn_cancelar text_color mt-5 btn btn-danger">CANCELAR</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>