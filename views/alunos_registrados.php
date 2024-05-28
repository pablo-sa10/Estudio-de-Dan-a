<?php

require_once "../model/conexao.php";
require_once "../controller/dancaController.php";

require_once "../menu.php";

?>

<main class="">

    <section class="cor_fundo_primeira_secao py-5">
        <div class="container">
            <h1 class="text_color text-center">ALUNOS REGISTRADOS NA ESCOLA</h1>
            <table class="table table-dark table-striped mt-5 text-center">
                <thead>
                    <tr class="">
                        <th class="w-25" scope="col">Aluno</th>
                        <th class="w-25" scope="col">Idade</th>
                        <th class="w-25" scope="col">Quantidade de aulas matriculadas</th>
                        <th class="w-25" scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr>
                        <td class="w-25"> Mark</td>
                        <td class="w-25"> Otto</td>
                        <td class="w-25"> @mdo</td>
                        <td><button class="btn btn-primary">Editar</button></td>
                        <td><button class="btn btn-danger">Excluir</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</main>