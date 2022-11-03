<?php
require_once 'process_signup.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <title>Сеть доставки пиццы</title>
</head>
<body style="background-color: #e7e7e7">
<div class="container-fluid">
    <div class="row" style="background-color: #ff8c00">
        <div class="col-md-1">
            <div class="p-1"> </div>
        </div>
        <div class="col-md-2">
            <div class="p-1" style="color: white">
                <a href="#" class="text-decoration-none" style="color: white">
                    <img src="../img/icons/location.png" height="20" width="20"></img>
                    Волгоград
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-1">
                <a href="#" style="padding-right: 20px; color: white" class="text-decoration-none">Магазины</a>
                <a href="#" style="padding-right: 20px; color: white" class="text-decoration-none">Покупателям</a>
                <a href="#" style="padding-right: 20px; color: white" class="text-decoration-none">Акции</a>
                <a href="#" style="padding-right: 20px; color: white" class="text-decoration-none">Клубная карта</a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="p-1">
                <a href="#" class="text-decoration-none" style="color: white; pointer-events: none; cursor: default">
                    <img src="../img/icons/phone.png" height="20" width="20"></img>
                    8-800-555-35-35
                </a>
            </div>
        </div>
        <div class="col-md-1">
            <div class="p-1"> </div>
        </div>

    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="p-4"></div>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-md navbar-white bg-white front">
    <div class="container">
        <a href="#" class="navbar-brand h1" style="font-size: 2.5rem; padding-left:2.4rem; color: #ff8c00;font-weight: bolder">DNS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown" style="padding-right: 20px">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-weight: bold; width: 8rem; height: 3rem">
                            Каталог
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Действие</a></li>
                            <li><a class="dropdown-item" href="#">Другое действие</a></li>
                            <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Поиск по сайту" aria-label="Search" style="width: 25rem">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </li>
                <li class="nav-item" style="padding-left: 20px">

                    <a class="nav nav-link" href="#" style="--bs-link-hover-color: #ff8c00; --bs-link-color: black">
                        <img src="../img/icons/favourite.png" height="20" width="20"></img>
                        Избранное
                    </a>
                </li>
                <li class="nav-item" style="padding-left: 20px">
                    <a class="nav nav-link" href="#" style="--bs-link-hover-color: #ff8c00; --bs-link-color: black">
                        <img src="../img/icons/cart.png" height="20" width="20"></img>
                        Корзина
                    </a>
                </li>
                <?php
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    ?>
                    <li class="nav-item" style="padding-left: 20px">
                        Вы вошли как <?php echo $_SESSION['user'].'.'; ?>
                        <a class="nav nav-link red" href="logout.php" style="--bs-link-hover-color: #ff8c00; --bs-link-color: black; display:inline">
                            Выйти.
                        </a>
                    </li>
                    <?php
                }else{
                    ?>
                    <li class="nav-item" style="padding-left: 20px">
                        Вы не авторизованы.
                        <a class="nav nav-link" href="login.php" style="--bs-link-hover-color: #ff8c00; --bs-link-color: black; display:inline">
                            Ввести логин и пароль
                        </a>
                        или
                        <a class="nav nav-link" href="signup.php" style="--bs-link-hover-color: #ff8c00; --bs-link-color: black; display:inline">
                            зарегестрироваться
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid" style="margin-top:5rem">
    <div class="row">
        <div class="col-md-1">
            <div class="p-1">

            </div>
        </div>
        <div class="col-md-10">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="a-b-o" href="main_page.php">Главная страница</a></li>
                    <li class="breadcrumb-item"><a class="a-b-o" href="signup.php">Регистрация</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-1"       >

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">
            <div class="p-1">

            </div>
        </div>
        <div class="col-md-10">

        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-10 mx-auto" style="background-color: white;min-height:20rem;">
            <div class="col-md-5 mx-auto">
                <div class="text-center">
                    <h3><b>Регистрация</b></h3>
                    <?php
                    if(!isset($_SESSION['user'])){
                    ?>
                        <form action="signup.php" method="POST">
                            <input type="hidden" name="action" value="signup">
                            <div class="form-group">
                                <label for="email">Email (Логин) <span class="red">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>">
                                <span class="red"><?php if(!empty($arrErr['email'])){echo $arrErr['email'];} ?></span>
                            </div>
                            <div class="form-group">
                                <label for="full_name">ФИО <span class="red">*</span></label>
                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Иванов Иван Иванович" value="<?php if(isset($_POST['full_name'])){ echo $_POST['full_name'];}?>">
                                <span class="red"><?php if(!empty($arrErr['full_name'])){echo $arrErr['full_name'];} ?></span>
                            </div>
                            <div class="form-group">
                                <label for="birthday_date">Дата рождения</label>
                                <input type="date" name="birthday_date" id="birthday_date" class="form-control" max="2022-10-01" value="<?php if(isset($_POST['birthday_date'])){ echo $_POST['birthday_date'];}?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="г.Волгоград, Университетский проспект 100" value="<?php if(isset($_POST['address'])){ echo $_POST['address'];}?>">
                            </div>
                            <div class="form-group">
                                <label for="sex">Пол <span class="red">*</span></label>
                                <select name="sex" id="sex" class="form-control">
                                    <option value="" disabled="" selected="" >Выберите пол</option>
                                    <?php if(isset($_POST['sex']) && !empty($_POST['sex'])){
                                        switch($_POST['sex']){
                                            case 1:
                                                echo '<option value="1" selected="">Мужской</option>';
                                                echo '<option value="2">Женский</option>';
                                                break;
                                            case 2:
                                                echo '<option value="1">Мужской</option>';
                                                echo '<option value="2" selected="">Женский</option>';
                                                break;
                                        }
                                    }else{
                                        echo '<option value="1">Мужской</option>';
                                        echo '<option value="2">Женский</option>';
                                    }
                                    ?>
                                </select>
                                <span class="red"><?php if(!empty($arrErr['sex'])){echo $arrErr['sex'];} ?></span>
                            </div>
                            <div class="form-group">
                                <label for="interests">Интересы</label>
                                <input type="text" name="interests" id="interests" class="form-control" placeholder="Люблю сидеть, спать, сидеть" value="<?php if(isset($_POST['interests'])){ echo $_POST['interests'];}?>">
                            </div>
                            <div class="form-group">
                                <label for="blood_type">Группа крови <span class="red">*</span></label>
                                <select name="blood_type" id="blood_type" class="form-control">
                                    <option value="" disabled="" selected="">Группа крови</option>
                                    <?php if(isset($_POST['blood_type']) && !empty($_POST['blood_type'])){
                                        switch($_POST['blood_type']){
                                            case 1:
                                                echo '<option value="1" selected="">0 (I)</option>';
                                                echo '<option value="2">A (II)</option>';
                                                echo '<option value="3">B (III)</option>';
                                                echo '<option value="4">AB (IV)</option>';
                                                break;
                                            case 2:
                                                echo '<option value="1">0 (I)</option>';
                                                echo '<option value="2" selected="">A (II)</option>';
                                                echo '<option value="3">B (III)</option>';
                                                echo '<option value="4">AB (IV)</option>';
                                                break;
                                            case 3:
                                                echo '<option value="1">0 (I)</option>';
                                                echo '<option value="2">A (II)</option>';
                                                echo '<option value="3" selected="">B (III)</option>';
                                                echo '<option value="4">AB (IV)</option>';
                                                break;
                                            case 4:
                                                echo '<option value="1">0 (I)</option>';
                                                echo '<option value="2">A (II)</option>';
                                                echo '<option value="3">B (III)</option>';
                                                echo '<option value="4" selected="">AB (IV)</option>';
                                                break;
                                        }
                                    }else{
                                        echo '<option value="1">0 (I)</option>';
                                        echo '<option value="2">A (II)</option>';
                                        echo '<option value="3">B (III)</option>';
                                        echo '<option value="4">AB (IV)</option>';
                                    }
                                    ?>
                                </select>
                                <span class="red"><?php if(!empty($arrErr['blood_type'])){echo $arrErr['blood_type'];} ?></span>

                            </div>
                            <div class="form-group">
                                <label for="factor">Резус-фактор <span class="red">*</span></label>
                                <select name="factor" id="factor" class="form-control">
                                    <option value="" disabled="" selected="">Резус-Фактор</option>
                                    <?php if(isset($_POST['factor']) && !empty($_POST['factor'])){
                                        switch($_POST['factor']){
                                            case 'plus':
                                                echo '<option value="plus" selected="">Положительный (+)</option>';
                                                echo '<option value="minus">Отрицательный (-)</option>';
                                                break;
                                            case 'minus':
                                                echo '<option value="plus">Положительный (+)</option>';
                                                echo '<option value="minus" selected="">Отрицательный (-)</option>';
                                                break;
                                        }
                                    }else{
                                        echo '<option value="plus">Положительный (+)</option>';
                                        echo '<option value="minus">Отрицательный (-)</option>';
                                    }
                                    ?>
                                </select>
                                <span class="red"><?php if(!empty($arrErr['factor'])){echo $arrErr['factor'];} ?></span>
                            </div>
                            <div class="form-group">
                                <label for="vk">Ссылка на профиль Вконтакте</label>
                                <input type="url" name="vk" id="vk" class="form-control" placeholder="https://vk.com/idx" value="<?php if(isset($_POST['vk'])){ echo $_POST['vk'];}?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль <span class="red">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="********">
                                <span class="red"><?php if(!empty($arrErr['password'])){echo $arrErr['password'];} ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password_confirm">Подтвердите пароль <span class="red">*</span></label>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="********">
                                <span class="red"><?php if(!empty($arrErr['password_confirm'])){echo $arrErr['password_confirm'];} ?></span>
                            </div>
                            <button type="submit" class=" btn btn-block btn-primary tx-tfm register-btn" style="margin-top: 1rem">
                                Зарегистрироваться
                            </button>
                            <div class="form-group">
                                <p class="text-center">Уже есть аккаунт? <a href="login.php">Войти в аккаунт</a></p>
                            </div>
                        </form>
                        <?php
                        }else{
                            echo '<p class="text-warning"> Вы уже авторизованы как ' . $_SESSION['user'] . '</p>' . '<a class="red" href="logout.php">Выйти.</a>';
                        }
                        ?>
                        <!--Отображение шаблона формы регистрации.
                        Данные об ошибках выводим из $signUpErrors,
                        поля формы предзаполняем из $_POST с фильтрацией!-->
                </div>
            </div>


        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>




</body>
<footer>
    <!--Icons by <a target="_blank" href="https://icons8.com">Icons8</a>-->
</footer>
</html>

