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

    public static function delete($id){
        $query = Database::prepare(
            'DELETE FROM `menu_copy` WHERE id = ?'
        );
        $query->bind_param('i', $id);

        if(!$query->execute()){
            trigger_error("Query Execute failed", E_USER_ERROR);
        }

    }

    public static function get_img_path($id){
        $query = Database::prepare(
            'SELECT `img_path` FROM `menu_copy` WHERE id = ?;'
        );
        $query->bind_param('i', $id);
        if(!$query->execute()){
            trigger_error("Query Execute failed", E_USER_ERROR);
        }
        $img_path = $query->get_result();
        $img_path = $img_path->fetch_array(MYSQLI_NUM);
        return $img_path[0];
    }

    public static function get_by_id($id){
        $query = Database::prepare(
            'SELECT `img_path`,`name`,`id_category`,`recipe`,`cost` FROM `menu_copy` WHERE id=?'
        );
        $query->bind_param('i', $id);
        if(!$query->execute()){
            trigger_error("Query Execute failed", E_USER_ERROR);
        }
        $data = $query->get_result();
        $data = $data->fetch_array(MYSQLI_ASSOC);
        return $data;
    }

    public static function replace_by_id($id, $menu_name, $category_id, $price, $recipe, $file_name){
        $query = Database::prepare(
            'UPDATE `menu_copy` 
                        SET `img_path` = ?,
                            `name` = ?,
                            `id_category` = ?,
                            `recipe` = ?,
                            `cost` = ?
                      WHERE id = ?');

        $query->bind_param('ssisii', $file_name, $menu_name, $category_id, $recipe, $price, $id);

        if(!$query->execute()){
            trigger_error("Query Execute failed", E_USER_ERROR);
        }

    }
}