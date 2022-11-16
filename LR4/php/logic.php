<?php
session_start();
require_once 'connectDB.php';
global $connect;

if(!isset($_SESSION['user'])){
    header('Location: login.php');
}

$sql = "SELECT img_path, menu.name as menu_name, categories.name as category_name , recipe, cost 
        FROM menu 
        INNER JOIN categories ON menu.id_category=categories.id"; // Стандартный SQL запрос


function addFilter($where, $add){
    if($where){
        $where .= " AND $add";
    } else{
        $where = $add;
    }
    return $where;
}

if(isset($_GET['applyFilter'])){
    if(count($_GET) > 0){
        $sql .= " WHERE ";
        $where = "";
        if ($_GET['menu_name']) {
            $value = htmlspecialchars('%'.$_GET['menu_name'].'%');
            $value = '"'.$value.'"';
            $where = addFilter($where, "menu.name LIKE ".$value);

        }
        if ($_GET['category_name']) {
            $value = htmlspecialchars('%'.$_GET['category_name'].'%');
            $value = '"'.$value.'"';
            $where = addFilter($where, "categories.name LIKE ".$value);
        }
        if ($_GET['recipe']) {
            $value = htmlspecialchars('%'.$_GET['recipe'].'%');
            $value = '"'.$value.'"';
            $where = addFilter($where, "recipe LIKE ".$value);
        }
        if ($_GET['price_start']) {
            $value = htmlspecialchars($_GET['price_start']);
            $where = addFilter($where, "cost >= ".$value);
        }
        if ($_GET['price_end']) {
            $value = htmlspecialchars($_GET['price_end']);
            $where = addFilter($where, "cost <= ".$value);
        }

        $sql .= $where;
    }
}else{
    $_GET['menu_name'] = "";
    $_GET['category_name'] = "";
    $_GET['recipe'] = "";
    $_GET['price_start'] = "";
    $_GET['price_end'] = "";

}

$sqlPrepare = mysqli_prepare($connect, $sql); // подготавливаем SQL запрос (защита от инъекций)
mysqli_stmt_execute($sqlPrepare); // выполняем запрос return TRUE or FALSE
$result = mysqli_stmt_get_result($sqlPrepare); // получаем результат запроса
$fullList = mysqli_fetch_all($result,MYSQLI_ASSOC); // помещаем строки в массив

