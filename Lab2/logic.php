<?php

$servername = 'localhost';
$database = 'pizza_delivery';
$username = 'root';
$password = '';


$connect = mysqli_connect($servername, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT img_path, menu.name as menu_name, categories.name as category_name , recipe, cost 
        FROM menu 
        INNER JOIN categories ON menu.id_category=categories.id"; // Стандартный SQL запрос



if(isset($_GET['applyFilter'])){
    $arBinds =[];
    $arBinds['menu_name'] = '%%';
    $arBinds['category_name'] = '%%';
    $arBinds['recipe'] = '%%';
    $arBinds['price_start'] = 0;
    $arBinds['price_end'] = PHP_INT_MAX;


    $sql = "SELECT img_path, menu.name as menu_name, categories.name as category_name , recipe, cost 
            FROM menu 
            INNER JOIN categories ON menu.id_category=categories.id
            WHERE
                menu.name LIKE ? AND
                categories.name LIKE ? AND
                recipe LIKE ? AND
                cost >= ? AND cost <= ?
            "; // Подготовленный SQL запрос

    $sqlPrepare = mysqli_prepare($connect, $sql); // подготавливаем SQL запрос (защита от инъекций)

    if($_GET['menu_name']){
        $arBinds['menu_name'] = '%'.$_GET['menu_name'].'%';
    }
    if($_GET['category_name']){
        $arBinds['category_name'] = '%'.$_GET['category_name'].'%';
    }
    if($_GET['recipe']){
        $arBinds['recipe'] = '%'.$_GET['recipe'].'%';
    }
    if($_GET['price_start']){
        $arBinds['price_start'] = $_GET['price_start'];
    }
    if($_GET['price_end']){
        $arBinds['price_end'] = $_GET['price_end'];
    }

    mysqli_stmt_bind_param(
        $sqlPrepare,
        'sssii',
        $arBinds['menu_name'], $arBinds['category_name'], $arBinds['recipe'], $arBinds['price_start'], $arBinds['price_end']
    ); // привязка переменных к параметрам
    mysqli_stmt_execute($sqlPrepare); // выполняем запрос TRUE or FALSE
    $result = mysqli_stmt_get_result($sqlPrepare); // получаем результат запроса
    $fullList = mysqli_fetch_all($result,MYSQLI_ASSOC); // помещаем строки в массив
}else{
    $_GET['menu_name'] = "";
    $_GET['category_name'] = "";
    $_GET['recipe'] = "";
    $_GET['price_start'] = "";
    $_GET['price_end'] = "";

    $sqlPrepare = mysqli_prepare($connect, $sql);
    mysqli_stmt_execute($sqlPrepare);
    $result = mysqli_stmt_get_result($sqlPrepare);
    $fullList = mysqli_fetch_all($result,MYSQLI_ASSOC);
}


