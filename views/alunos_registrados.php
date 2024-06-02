<?php

require_once "../model/conexao.php";
require_once "../controller/dancaController.php";

$alunosController = new DancaController();

$alunos = $alunosController->getAlunosRegistrados("");

if (isset($_POST['action'])) {
    $id = $_POST['id_aluno'];
    $deletar = $alunosController->deletarAluno($id);
    header("Location: alunos_registrados.php");
    exit;
}

require_once "../menu.php";

?>

<main class="">

    <section class="cor_fundo_primeira_secao py-5">
        <div class="container margemBaixo">
            <h1 class="text_color text-center">ALUNOS REGISTRADOS NO NOSSO ESTÚDIO</h1>
            <table class="table table-dark table-striped my-5 text-center">
                <thead>
                    <tr class="">
                        <th class="w-25" scope="col">Aluno</th>
                        <th class="w-25" scope="col">Idade</th>
                        <th class="w-25" scope="col">Quantidade de Cursos Matriculados</th>
                        <th class="w-25" scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($alunos as $alunos => $item) { ?>
                        <tr class="">

                            <td class="pt-3 text_color w-25"><?= $item->nome ?></td>
                            <td class="pt-3 text_color w-25"><?= $item->idade ?></td>
                            <td class="pt-3 text_color w-25"><?= $item->total ?></td>
                            <td><a href="./registrar_aluno.php?aluno=<?= $item->id ?>"><button class="btn btn-primary"><i class="text-white bi bi-pencil-fill"></i></button></a></td>
                            <form method="post">
                                <td hidden><input type="hidden" name="action" value=""></td>
                                <td hidden><input type="hidden" name="id_aluno" value="<?= $item->id ?>"></td>

                                <td><button name="delete" onclick="this.form.action.value='delete'; this.form.submit()" class="btn btn-danger"><i class="text-white bi bi-trash3-fill"></i></button></td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="text-center">
                <a href="./registrar_aluno.php"><button class="text_color btn_salvar btn">CADASTRAR UM NOVO ALUNO</button></a>
            </div>
        </div>
    </section>

    <?php

    include_once "../footer.php";

    ?>

</main>