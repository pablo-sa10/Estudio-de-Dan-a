<?php

require_once "../controller/dancaController.php";

$alunosController = new DancaController();
$alunos = $alunosController->getAlunosRegistrados("");
$aula_id = $_GET['aula'];

$jaRegistrado = false;

if (isset($_POST['enviar'])) {
    $aluno_id = $_POST['aluno'];
    $experiencia = $_POST['nivel'];
    $registro = $alunosController->getRegistroAula($aula_id, $aluno_id, $experiencia);
    if(!$registro){
        $jaRegistrado = true;
    }else{
        header("Location: ./aula.php?aula=$aula_id");
        exit;
    }
}



include_once "../menu.php";

?>

<main class="">

    <?php 
    
    if(!$jaRegistrado){
        $hidden = "hidden";
    }else{
        $hidden = "";
    }
    
    ?>

    <section <?= $hidden ?> class="cor_fundo_quarta_secao py-5">
        <div class="text-center text-white">
            <h1>ATENÇÃO!</h1>
            <h3>ALUNO JÁ REGISTRADO NESSA AULA</h3>
        </div>
    </section>

    <section class="cor_fundo_primeira_secao py-5">
        <div class="container">
            <div class="imagem_fundo container d-flex justify-content-center justify-content-md-end">
                <div class="margin">
                    <form method="post" class="margin_form">
                        <div class="mb-5">
                            <h3 class="text_color">CADASTRAR ALUNO À AULA</h3>
                        </div>
                        <div class="d-flex flex-column">
                            <select class="form-select inputs_form rounded my-2 py-2" name="aluno" aria-label="Default select example" required>
                                <option value="" selected class="">Aluno</option>
                                <?php foreach ($alunos as $a => $item) { ?>
                                    <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <select class="form-select inputs_form rounded my-2 py-2" name="nivel" aria-label="Default select example" required>
                                <option value="" selected class="">Nivel de Experiência</option>
                                <option value="Iniciante">Iniciante</option>
                                <option value="Intermediário">Intermediário</option>
                                <option value="Avançado">Avançado</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button name="enviar" class="text_color mt-5 btn btn_form">SALVAR</button>
                        </div>
                    </form>
                        <a href="./aula.php?aula=<?= $aula_id ?>"><button class="btn_cancelar text_color mt-5 btn btn-danger">CANCELAR</button></a>
                </div>
            </div>
        </div>
    </section>

    <?php

    include_once "../footer.php";

    ?>

</main>