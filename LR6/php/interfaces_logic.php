<?php


$menu_name = $category_id = $price = $recipe = $file_name = '';

$fullList = UserTable::ShowAll();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['addItem'])){

        if(isset($_FILES['image']['name'])) {
            $file = $_FILES['image'];
            // проверяем, можно ли загружать изображение
            $check = can_upload($file['name']);

            if($check === true){
                // загружаем изображение на сервер
                $file_name = make_upload($file);
            }
            else{
                // выводим сообщение об ошибке
                echo "<strong>$check</strong>";
            }
        }

        if(!empty($_POST['menu_name'])) $menu_name = $_POST['menu_name'];
        if(!empty($_POST['category_id'])) $category_id = $_POST['category_id'];
        if(!empty($_POST['price'])) $price = $_POST['price'];
        if(!empty($_POST['recipe'])) $recipe = $_POST['recipe'];

        UserTable::create($menu_name,$category_id,$price,$recipe,$file_name);
        header('Location: interfaces.php');
    }
}

function can_upload($file_name){
    if ($file_name == '') return 'Файл не выбран';

    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $file_name);

    // последний элемент массива - расширение
    $mime = strtolower(end($getMime));

    // массив разрешенных типов
    $allow_types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

    if(!in_array($mime, $allow_types)) return 'Недопустимый тип файла';

    return true;
}

function make_upload($file){
    // формируем уникальное имя картинки: случайное число и name
    $name = mt_rand(0, 10000) . $file['name'];
    $dir = '../img/pizza/' . $name;
    copy($file['tmp_name'], $dir);

    return $name;
}
