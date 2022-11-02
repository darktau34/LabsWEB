<?php
session_start();
require_once 'connectDB.php';
global $connect;

$email = $full_name = $birthday_date = $address = $sex = $interests = $blood_type = $factor = $vk = $password = $salt = NULL;
$arrErr = [];
$arrErr['email'] = $arrErr['full_name'] = $arrErr['sex'] = $arrErr['password'] = '';

$regular_full_name = "/^(([А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+)|([A-Z][a-z]+\s[A-Z][a-z]+\s[A-Z][a-z]+))$/u";
$regular_password = '/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!"№;%:?*()@\#$^&])(?=.*\ )(?=.*\-)(?=.*\_).{6,})/';  // Xy12 -_+@   валидный   Yx21 _-+@

function GenSalt(){
    $salt ='';
    $length = 8;

    for($i=0; $i < $length; $i++){
        $salt .= chr(mt_rand(33,126)); // ascii символ
    }

    return $salt;
}

function DB_find_user($connect, $email){
    $query = "SELECT * FROM `users` WHERE `login` = '$email'";

    $queryPrep = mysqli_prepare($connect, $query); // подготавливаем SQL запрос (защита от инъекций)
    mysqli_stmt_execute($queryPrep); // выполняем запрос return TRUE or FALSE
    $result = mysqli_stmt_get_result($queryPrep); // получаем результат запроса
    $user = mysqli_fetch_assoc($result); // помещаем строки в массив
    return $user;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['email'])){
        $email_pre = htmlspecialchars($_POST['email']);
        if(filter_var($email_pre, FILTER_VALIDATE_EMAIL)){
            $user = DB_find_user($connect, $email_pre);
            if(empty($user)){
                $email = $email_pre;
            }else{
                $arrErr['email'] = 'Пользователь с таким логином существует в Базе Данных!';
            }
        }else{
            $arrErr['email'] = 'Некорректный Email!';
        }
    }else{
        $arrErr['email'] = 'Введите Email!';
    }

    if(!empty($_POST['full_name'])){
        if(preg_match($regular_full_name, $_POST['full_name'])){
            $full_name = htmlspecialchars($_POST['full_name']);
        }else{
            $arrErr['full_name'] = 'Некорректные ФИО!';
        }
    }else{
        $arrErr['full_name'] = 'Введите ФИО!';
    }

    if(!empty($_POST['sex'])){
        $sex = $_POST['sex'];
    }else{
        $arrErr['sex'] = 'Укажите пол!';
    }

    if(!empty($_POST['password'])){
        if(preg_match($regular_password, $_POST['password'])){
            if($_POST['password'] == $_POST['password_confirm']){
                $password = htmlspecialchars($_POST['password']);
                $salt = GenSalt();
                $password = md5($salt . $password);
            }else{
                $arrErr['password_confirm'] = "Пароли не совпадают!";
            }
        }else{
            $arrErr['password'] = "Некорректный пароль!<br>Пароль должен содержать от 6 символов:</br>Большие латинские буквы, маленькие;
                                   <br>Спецсимволы, пробел, дефис, подчеркивание и цифры</br>";
        }
    }else{
        $arrErr['password'] = "Введите пароль!";
    }

    if(!empty($_POST['blood_type'])){
        $blood_type = $_POST['blood_type'];
    }else{
        $arrErr['blood_type'] = 'Укажите группу крови!';
    }

    if(!empty($_POST['factor'])){
        $factor = $_POST['factor'];
    }else{
        $arrErr['factor'] = 'Укажите резус-фактор!';
    }

    $birthday_date = htmlspecialchars($_POST['birthday_date']);
    $address = htmlspecialchars($_POST['address']);
    $interests = htmlspecialchars($_POST['interests']);
    $vk = htmlspecialchars($_POST['vk']);

    if(isset($email, $full_name, $sex, $password, $blood_type, $factor)){
        echo "Данные присутсвуют";
        $insert = "INSERT INTO `users` 
                    (`id`, `login`, `date_birthday`, `address`, `sex`, `interests`, `blood_type`, `factor`, `vk`, `password`, `salt`) 
                    VALUES (NULL, '$email', '$birthday_date', '$address', '$sex', '$interests', '$blood_type', '$factor', '$vk', '$password', '$salt')";

        mysqli_query($connect, $insert);

        $_SESSION['reg_success'] = 'Регистрация прошла успешно';
        header('Location: ../index.php');
    }

}



