<?php
require_once 'session.php';
require_once 'db.php';
require_once 'user_table.php';
require_once "interfaces_logic.php";

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
                    <li class="breadcrumb-item"><a class="a-b-o" href="interfaces.php">Интерфейсы[LR6]</a></li>
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
            <div class="text-center">
                <h1>Каталог пицц</h1>
            </div>

            <form method="get">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Изображение</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Категория меню</th>
                        <th scope="col">Рецептура</th>
                        <th scope="col">Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php global $fullList; ?>
                    <?php foreach($fullList as $item):?>
                        <tr>
                            <th scope="row"><img src="../img/pizza/<?=$item['img_path']?>" style="max-width:150px;"></th>
                            <td><?=$item['name']?></td>
                            <td><?=$item['id_category']?></td>
                            <td><?=$item['recipe']?></td>
                            <td><?=$item['cost']?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </form>
            <form method="post" enctype="multipart/form-data">
                    <button name="showAddForm" value="add" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Добавить
                    </button>
                    <div class="collapse mt-3" id="collapseExample">
                        <div class="card card-body" style="width:60%">
                            <label for="menu_name">Наименование</label>
                            <input type="text" name="menu_name" id="menu_name" class="form-control" placeholder="Введите название" value="<?php if(isset($_POST['menu_name'])){ echo $_POST['menu_name'];}?>">

                            <label for="category_id">Категория меню</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option value="" disabled="" selected="">Выберите категорию</option>
                                <?php if(isset($_POST['category_id']) && !empty($_POST['category_id'])){
                                    switch($_POST['category_id']){
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

                            <label for="price">Стоимость</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Введите стоимость" value="<?php if(isset($_POST['price'])){ echo $_POST['price'];}?>">

                            <label for="image">Выберите изображение</label>
                            <input type="file" name="image" id="image">

                            <label for="recipe">Рецептура</label>
                            <textarea name="recipe" id="recipe" maxlength="255" placeholder="Введите рецептуру"><?php if(isset($_POST['recipe'])){ echo $_POST['recipe'];}?></textarea>

                            <button class="btn btn-primary" name="addItem" value="submit" style="width:10rem;height:2.5rem;margin-top:1rem;">Отправить</button>

                        </div>
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