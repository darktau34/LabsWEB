<?php

class UserTable{

    public static function ShowAll(){
        $query = Database::prepare('SELECT * FROM menu_copy');
        $query->execute(); // выполняем запрос TRUE or FALSE
        $result = $query->get_result(); // получаем результат запроса
        $fullList = $result->fetch_all(MYSQLI_ASSOC); // помещаем строки в массив

        return $fullList;
    }

    public static function create($menu_name, $category_id, $price, $recipe, $file_name){
        $query = Database::prepare(
            'INSERT INTO `menu_copy` (`id`, `img_path`, `name`, `id_category`, `recipe`, `cost`) ' .
            'VALUES (NULL, ?, ?, ?, ?, ?)'
        );

        $query->bind_param('ssisi', $file_name, $menu_name, $category_id, $recipe, $price);

        if(!$query->execute()){
            trigger_error("Query Execute failed", E_USER_ERROR);
        }
    }

}