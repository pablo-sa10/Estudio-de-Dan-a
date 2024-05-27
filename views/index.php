<?php

include_once "../controller/dancaController.php";

$dancaController = new DancaController();

$aulas = $dancaController->getAulas();

include_once "../menu.php"

?>

<main>

    <section class="cor_fundo_primeira_secao">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center">
                    <img class="w-75" src="../assets/images/Dancer.png" alt="Imagem de uma bailarina">
                </div>
                <div class="col-md-4 border border-danger introducao_home">
                    <div class="d-flex text-start flex-column">
                        <p class="text_color fs-5">Enjoy each step along the way.</p>
                        <h2 class="text_color mt-4">Learn to dance with style</h2>
                    </div>
                    <div class="redes">
                        <p class="text_color fs-5">Siga-nos </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cor_fundo_segunda_secao">
        <div class="container">
            <div class="row">
                <div class="col-md-4 somos_nos">
                    <h1 class="text_color">TUDO SOBRE NÓS</h1>
                    <p class="text_color mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. </p>
                </div>
                <div class="col-md-8 text-center">
                    <img class="w-75" src="../assets/images/Yellow Dancer.png" alt="Imagem de uma bailarina">
                </div>
            </div>
        </div>
    </section>

    <section class="cor_fundo_terceira_secao py-5">
        <div class="container">
            <div class="text-center">
                <h1 class="text_color">NOSSAS AULAS</h1>
            </div>
            <div class="mt-5 row">
                <?php
                $i = 0;
                foreach ($aulas as $aulas) {
                    $i++;
                ?>
                    <div class="col-md-6 mt-5">
                        <div class="d-flex py-3 aula border border-danger rounded-4">
                            <div class="text-center">
                                <img class="w-75" src="../assets/images/img<?= $i; ?>.png" alt="">
                            </div>
                            <div class="d-flex text-center justify-content-around flex-column w-75">
                                <h2 class="text_color"><?= $aulas->danca ?></h2>
                                <div class="justify-content-center">
                                <a class="btn btn-dark text_color w-75">Registrar-se nesta aula</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

</main>