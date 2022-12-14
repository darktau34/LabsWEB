<?php

function validation($for, $input){
    switch($for){
        case 'menu_name':
            $regular_menu_name = "/^[А-Яа-яЁё\s]+$/u";
            $input = htmlspecialchars($input);
            if(preg_match($regular_menu_name, $input)){
                return $input;
            }else return false;
        case 'category_id':
            $regular_category_id = "/^\d$/";
            $input = htmlspecialchars($input);
            if(preg_match($regular_category_id, $input)){
                return $input;
            }else return false;
        case 'price':
            $regular_price = "/^[^0]\d+$/";
            $input = htmlspecialchars($input);
            if(preg_match($regular_price, $input)){
                return $input;
            }else return false;
        case 'recipe':
            $regular_recipe =  '/^[А-Яа-яЁё\s,\-:;\"\'.0-9]+$/u';
            $input = htmlspecialchars($input);
            if(preg_match($regular_recipe, $input)){
                return $input;
            }else return false;
    }
    return null;
}