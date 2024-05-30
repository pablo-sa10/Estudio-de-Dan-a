<?php

if(isset($_POST['enviar'])){
    $dancaController = new DancaController();

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $registrarAluno = $dancaController->registrarAluno($nome, $idade);
    header("Location: alunos_registrados.php");
    exit;
}




include_once "../menu.php";

?>

<main>

    <section class="cor_fundo_primeira_secao py-5">
        <div class="container">
            <form action="post" class="">
                <div class="d-flex flex-column">
                    <label class="text_color my-2" for="">NOME</label>
                    <input name="nome" class="w-25 rounded py-1" type="text">
                </div>
                <div class="d-flex flex-column mt-2">
                    <label class="text_color my-2" for="">IDADE</label>
                    <input name="idade" class="w-25 rounded py-1" type="number">
                </div>
                <div class="">
                    <button name="enviar" class="mt-3 btn btn-success">SALVAR</button>
                </div>
            </form>
        </div>
    </section>

</main>