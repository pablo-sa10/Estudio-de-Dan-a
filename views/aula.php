<?php

include "../controller/dancaController.php";
include_once "../menu.php";

$id_aula = $_GET['aula'];

$dancaController = new DancaController();
$aula = $dancaController->getAula($id_aula);

$registrosAula = $dancaController->getRegistroAula($id_aula, "", "");

if (isset($_POST['action'])) {
    $acao = $_POST['action'];

    if ($acao == "update") {
        $nivel = $_POST['nivel'];
        $id_aluno = $_POST['id_aluno'];
        var_dump($nivel, $id_aluno);
        $atualizarNivel = $dancaController->atualizarNivel($nivel, $id_aluno, $id_aula);
        header("Location: ./aula.php?aula=$id_aula");
        exit;
        
    } else if ($acao == "delete") {
        $id_aluno = $_POST['id_aluno'];
        $deletarAlunoAula = $dancaController->deletarAlunoAula($id_aluno, $id_aula);
        header("Location: ./aula.php?aula=$id_aula");
        exit;
    }
}

?>

<main class="">

    <section class="cor_fundo_primeira_secao py-5">
        <h1 class="text_color text-center">AULA DE <?= mb_strtoupper($aula->danca) ?> </h1>
        <div class="container d-flex text-center justify-content-center my-5">
            <div class="mx-5">
                <img src="../assets/images/Ellipse<?= $id_aula ?>.png" alt="">
            </div>
            <div class="text-start flex-column">
                <h3 class="text_color my-2">Professor: <?= $aula->professor ?></h3>
                <h3 class="text_color my-3">Especialista em: <?= $aula->especialidade ?></h3>
                <div class="mt-4 d-flex justify-content-md-center">
                    <?php for ($i = 1; $i < 6; $i++) { ?>
                        <h4><i class="estrela bi bi-star-fill"></i></h4>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="cor_fundo_quarta_secao py-5">
        <div class="container">
            <table class="table  table-dark table-striped my-5 text-center">
                <thead>
                    <tr class="">
                        <th class="w-25" scope="col">Aluno</th>
                        <th class="w-25" scope="col">Idade</th>
                        <th class="w-25" scope="col">Experiência</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($registrosAula as $registro => $item) { ?>
                        <tr>
                            <form method="post">
                                <td hidden><input type="hidden" name="action" value=""></td>
                                <td hidden><input type="hidden" name="id_aluno" value="<?= $item->id_aluno ?>"></td>
                                <td class="w-25 pt-4"><?= $item->nome ?></td>
                                <td class="w-25 pt-4"><?= $item->idade ?></td>
                                <td class="w-25"><select onchange="this.form.action.value='update'; this.form.submit()" class="text-center form-select form_nivel rounded my-2 py-2" name="nivel" aria-label="Default select example" required>
                                        <?php

                                        $iniciante = "";
                                        $inter = "";
                                        $avanc = "";

                                        switch ($item->nivel) {
                                            case "Iniciante":
                                                $iniciante = "selected";
                                                break;
                                            case "Intermediário":
                                                $inter = "selected";
                                                break;
                                            case "Avançado":
                                                $avanc = "selected";
                                                break;
                                        }

                                        ?>
                                        <option <?= $iniciante ?> value="Iniciante">Iniciante</option>
                                        <option <?= $inter ?> value="Intermediário">Intermediário</option>
                                        <option <?= $avanc ?> value="Avançado">Avançado</option>
                                    </select></td>
                                <td class="pt-3"><button name="deletar" onclick="this.form.action.value='delete'; this.form.submit()" class="btn btn-danger">
                                        <i class="text-white bi bi-trash3-fill"></i>
                                    </button></td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="text-center">
                <a href="./registrar_aluno_aula.php?aula=<?= $id_aula ?>"><button class="text_color btn_salvar btn">CADASTRAR UM NOVO ALUNO NA AULA</button></a>
            </div>
        </div>
    </section>

    <?php

    include_once "../footer.php";

    ?>

</main>