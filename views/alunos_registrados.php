<?php

require_once "../model/conexao.php";
require_once "../controller/dancaController.php";

$alunosController = new DancaController();

$alunos = $alunosController->getAlunosRegistrados();

require_once "../menu.php";

?>

<main class="">

    <section class="cor_fundo_primeira_secao py-5">
        <div class="container">
            <h1 class="text_color text-center">ALUNOS REGISTRADOS NA ESCOLA</h1>
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
                    <?php foreach ($alunos as $alunos => $item) {?>
                    <tr>
                        <td class="w-25"><?= $item->nome ?></td>
                        <td class="w-25"><?= $item->idade ?></td>
                        <td class="w-25"><?= $item->total ?></td>
                        <td><button class="btn btn-primary">Editar</button></td>
                        <td><button class="btn btn-danger">Excluir</button></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>

            <div class="text-center">
                <a href="./registrar_aluno.php"><button class="btn btn-success">Cadastrar um novo aluno</button></a>
            </div>
        </div>
    </section>

</main>