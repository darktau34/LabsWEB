<?php

// Файл не выбран = код 00
// Недопустимый тип файла = код 01
function can_upload($file_name){
    if ($file_name == '') return '00';

    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $file_name);

    // последний элемент массива - расширение
    $mime = strtolower(end($getMime));

    // массив разрешенных типов
    $allow_types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

    if(!in_array($mime, $allow_types)) return '01';

    return true;
}

function make_upload($file){
    // формируем уникальное имя картинки: случайное число и name
    $name = mt_rand(0, 10000) . $file['name'];
    $dir = '../img/pizza/' . $name;
    copy($file['tmp_name'], $dir);

    return $name;
}

function load_and_getFileName(){
    if(isset($_FILES['image']['name'])){
        $file = $_FILES['image'];
        // проверяем, можно ли загружать изображение
        $check = can_upload($file['name']);

        if($check === true){
            // загружаем изображение на сервер
            $file_name = make_upload($file);
            return $file_name;
        }
        else{
            // выводим сообщение об ошибке
            // echo "<strong>$check</strong>";
            return $check;
        }
    }
    return '00';
}