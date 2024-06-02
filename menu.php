<?php

$current_page = basename($_SERVER['PHP_SELF']);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estúdio de Dança</title>
    <!-- Link boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg p-0 pt-3">
        <div class="container">
            <a class="navbar-brand link_color fs-1" href="#">DANCE</a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link link_color mx-3" href="./">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_color mx-3" href="./alunos_registrados.php">ALUNOS REGISTRADOS</a>
                    </li>
                    <?php if ($current_page == 'index.php') { ?>
                        <li class="<?= $hidden ?> nav-item">
                            <a class="nav-link link_color mx-3" href="#aulas" aria-disabled="true">AULAS</a>
                        </li>
                    <?php } else if ($current_page != 'index.php') { ?>
                        <li class="<?= $hidden ?> nav-item dropdown">
                            <a class="nav-link link_color dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                AULAS
                            </a>
                            <ul id="dropAula" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item link_color" href="./aula.php?aula=1">DANÇA DE RUA</a></li>
                                <li><a class="dropdown-item link_color" href="./aula.php?aula=2">BALLET</a></li>
                                <li><a class="dropdown-item link_color" href="./aula.php?aula=3">DANÇA DE SALÃO</a></li>
                                <li><a class="dropdown-item link_color" href="./aula.php?aula=4">DANÇA CONTEMPORÂNEA</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>