<?php

    require_once 'CategoriasDao.php';
    $miCategoriaDao = new Categorias();
    $miCategoriaDao->setup();
    // $miCategoriaDao->insertar('Categoria 1', 'Descripcion de la categoria 1', 'ACT');
    // $miCategoriaDao->insertar('Categoria 2', 'Descripcion de la categoria 2', 'ACT');
    // $miCategoriaDao->insertar('Categoria 3', 'Descripcion de la categoria 3', 'ACT');
    // $miCategoriaDao->insertar('Categoria 4', 'Descripcion de la categoria 4', 'ACT');
    print_r($miCategoriaDao->getAll());
?>
