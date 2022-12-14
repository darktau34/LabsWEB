<?php
require_once 'file_works.php';
require_once 'validation_logic.php';
$menu_name = $category_id = $price = $recipe = $file_name = '';

$arrErr = [];
$arrErr['menu_name'] = $arrErr['category_id'] = $arrErr['price'] = $arrErr['recipe'] = $arrErr['file_name'] = '';

$fullList = UserTable::ShowAll();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['addItem'])){




        if(!empty($_POST['menu_name'])){
            $menu_name = validation('menu_name', $_POST['menu_name']);
            if(!$menu_name) $arrErr['menu_name'] = 'Некорректное название А-Я а-я Ёё';
        } else $arrErr['menu_name'] = 'Введите название';

        if(!empty($_POST['category_id'])){
            $category_id = validation('category_id', $_POST['category_id']);
            if(!$category_id) $arrErr['category_id'] = 'Некорректно выбрана категория';
        } else $arrErr['category_id'] = 'Выберите категорию';

        if(!empty($_POST['price'])){
            $price = validation('price', $_POST['price']);
            if(!$price) $arrErr['price'] = 'Некорректно указана цена';
        } else $arrErr['price'] = 'Введите цену';

        if(!empty($_POST['recipe'])){
            $recipe = validation('recipe', $_POST['recipe']);
            if(!$recipe) $arrErr['recipe'] = 'Некорректно указана рецептура';
        } else $arrErr['recipe'] = 'Введите рецептуру';

        if($menu_name && $category_id && $price && $recipe){
            $file_name = load_and_getFileName();
            if($file_name == '00'){
                $arrErr['file_name'] = 'Файл не выбран';
                $file_name = false;
            }
            if($file_name == '01'){
                $arrErr['file_name'] = 'Недопустимый тип файла';
                $file_name = false;
            }
            if($file_name){
                UserTable::create($menu_name,$category_id,$price,$recipe,$file_name);
                header('Location: interfaces.php');
            }
        }
    }


    if(!empty($_POST['Edit'])){
        $id = $_POST['Edit'];
        header('Location: edit.php' . '?id=' . $id);

    }
    if(!empty($_POST['Delete'])){
        $id = $_POST['Delete'];
        $img_path = UserTable::get_img_path($id);
        UserTable::delete($id);
        unlink('../img/pizza/' . $img_path);
        header('Location: interfaces.php');
    }
}

