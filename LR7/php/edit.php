<?php
require_once 'session.php';
require_once 'db.php';
require_once 'user_table.php';
require_once 'edit_logic.php';

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
                    <li class="breadcrumb-item"><a class="a-b-o" href="interfaces.php">Интерфейсы[LR6-7]</a></li>
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
        <div class="col-md-10" style="background-color: white;min-height: 30rem;">
            <form method="post" enctype="multipart/form-data">
                <div class="container">
                    <h1>Редактирование позиции id = <?php if(isset($id) && !empty($id)){ echo $id; } ?></h1>
                    <h5>Текущее изображение:</h5>
                    <?php
                    if(isset($data['img_path']) && !empty($data['img_path'])){ ?>
                    <img src="../img/pizza/<?=$data['img_path']?>" style="max-width:150px;">
                    <?php
                    }else{?>
                    <span class="input-group-text" id="inputGroup-sizing-default">ПУСТО</span>
                    <?php
                    }
                    ?>
                    <div class="container mt-3">
                        <button class="btn btn-outline-success" name="reset">Вернуть исходные поля</button>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Наименование</span>
                        <input type="text" name="menu_name" id="menu_name" class="form-control" aria-describedby="inputGroup-sizing-default" placeholder="Введите название"
                               value="<?php
                               if(isset($second_data) && !empty($second_data['name'])){
                                   echo $second_data['name'];
                               }else if(isset($data) && !empty($data['name'])){
                                   echo $data['name'];
                               }
                               ?>"
                        >
                        <span class="red"><?php if(!empty($arrErr['menu_name'])){echo $arrErr['menu_name'];} ?></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Категория меню</span>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="" disabled="" selected="">Выберите категорию</option>
                            <?php if(isset($second_data) && !empty($second_data['name'])){
                                switch($second_data['id_category']){
                                    case 1:
                                        echo '<option value="1" selected="">Категория 1</option>';
                                        echo '<option value="2">Категория 2</option>';
                                        echo '<option value="3">Категория 3</option>';
                                        echo '<option value="4">Категория 4</option>';
                                        echo '<option value="5">Категория 5</option>';
                                        break;
                                    case 2:
                                        echo '<option value="1">Категория 1</option>';
                                        echo '<option value="2" selected="">Категория 2</option>';
                                        echo '<option value="3">Категория 3</option>';
                                        echo '<option value="4">Категория 4</option>';
                                        echo '<option value="5">Категория 5</option>';
                                        break;
                                    case 3:
                                        echo '<option value="1">Категория 1</option>';
                                        echo '<option value="2">Категория 2</option>';
                                        echo '<option value="3" selected="">Категория 3</option>';
                                        echo '<option value="4">Категория 4</option>';
                                        echo '<option value="5">Категория 5</option>';
                                        break;
                                    case 4:
                                        echo '<option value="1">Категория 1</option>';
                                        echo '<option value="2">Категория 2</option>';
                                        echo '<option value="3">Категория 3</option>';
                                        echo '<option value="4" selected="">Категория 4</option>';
                                        echo '<option value="5">Категория 5</option>';
                                        break;
                                    case 5:
                                        echo '<option value="1">Категория 1</option>';
                                        echo '<option value="2">Категория 2</option>';
                                        echo '<option value="3">Категория 3</option>';
                                        echo '<option value="4">Категория 4</option>';
                                        echo '<option value="5" selected="">Категория 5</option>';
                                        break;
                                }
                            }else if(isset($data) && !empty($data['id_category'])){
                                switch($data['id_category']){
                                    case 1:
                                        echo '<option value="1" selected="">Категория 1</option>';
                                        echo '<option value="2">Категория 2</option>';
                                        echo '<option value="3">Категория 3</option>';
                                        echo '<option value="4">Категория 4</option>';
                                        echo '<option value="5">Категория 5</option>';
                                        break;
                                    case 2:
                                        echo '<option value="1">Категория 1</option>';
                                        echo '<option value="2" selected="">Категория 2</option>';
                                        echo '<option value="3">Категория 3</option>';
                                        echo '<option value="4">Категория 4</option>';
                                        echo '<option value="5">Категория 5</option>';
                                        break;
                                    case 3:
                                        echo '<option value="1">Категория 1</option>';
                                        echo '<option value="2">Категория 2</option>';
                                        echo '<option value="3" selected="">Категория 3</option>';
                                        echo '<option value="4">Категория 4</option>';
                                        echo '<option value="5">Категория 5</option>';
                                        break;
                                    case 4:
                                        echo '<option value="1">Категория 1</option>';
                                        echo '<option value="2">Категория 2</option>';
                                        echo '<option value="3">Категория 3</option>';
                                        echo '<option value="4" selected="">Категория 4</option>';
                                        echo '<option value="5">Категория 5</option>';
                                        break;
                                    case 5:
                                        echo '<option value="1">Категория 1</option>';
                                        echo '<option value="2">Категория 2</option>';
                                        echo '<option value="3">Категория 3</option>';
                                        echo '<option value="4">Категория 4</option>';
                                        echo '<option value="5" selected="">Категория 5</option>';
                                        break;
                                }
                            }else{
                                echo '<option value="1">Категория 1</option>';
                                echo '<option value="2">Категория 2</option>';
                                echo '<option value="3">Категория 3</option>';
                                echo '<option value="4">Категория 4</option>';
                                echo '<option value="5">Категория 5</option>';
                            }
                            ?>
                        </select>
                        <span class="red"><?php if(!empty($arrErr['category_id'])){echo $arrErr['category_id'];} ?></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Стоимость</span>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Введите стоимость"
                               value="<?php
                               if(isset($second_data) && !empty($second_data['cost'])){
                                   echo $second_data['cost'];
                               }else if(isset($data) && !empty($data['cost'])){
                                   echo $data['cost'];
                               }
                               ?>"
                        >
                        <span class="red"><?php if(!empty($arrErr['price'])){echo $arrErr['price'];} ?></span>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" type="file" name="image" id="image">
                        <span class="red"><?php if(!empty($arrErr['file_name'])){echo $arrErr['file_name'];} ?></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Рецептура</span>
                        <textarea class="form-control" name="recipe" id="recipe" maxlength="255" placeholder="Введите рецептуру"><?php if(isset($second_data) && !empty($second_data['recipe'])){
                                echo $second_data['recipe'];
                            }else if(isset($data) && !empty($data['recipe'])){
                                echo $data['recipe'];
                            }
                            ?></textarea>
                        <span class="red"><?php if(!empty($arrErr['recipe'])){echo $arrErr['recipe'];} ?></span>
                    </div>

                    <button class="btn btn-primary" name="applyEdit" value="submit_edit">Подтвердить редактирование</button>
                    <button class="btn btn-primary" name="closeEdit" value="close_edit">Назад</button>


                </div>
            </form>
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