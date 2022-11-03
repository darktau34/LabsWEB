<?php
require_once 'logic.php';
global $fullList;
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
                    <li class="breadcrumb-item"><a class="a-b-o" href="menu.php">Секретная страница</a></li>
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
        <div class="col-md-10" style="background-color: white">
            <div class="text-center">
                <form method="get">
                    <div class="fs-4 fw-bold">Фильтр поиска</div>
                    <div class="mt-3 w-50 mx-auto">
                        <p>По названию</p>
                        <input type="text" name="menu_name" placeholder="Введите название" value="<?= $_GET['menu_name']; ?>" class="form-control">
                    </div>
                    <div class="mt-3 w-50 mx-auto">
                        <p>По рецептуре</p>
                        <input type="text" name="recipe" placeholder="Введите ингридиент" value="<?= $_GET['recipe']; ?>" class="form-control">
                    </div>
                    <div class="mt-3 w-50 mx-auto">
                        <p>По категории меню</p>
                        <select name="category_name" class="form-control">
                            <option value="" selected="">Все категории</option>
                            <option value="Хит" <?php if ($_GET['category_name'] == 'Хит') { ?>selected="selected" <?php }; ?>>Хит</option>
                            <option value="Мясная" <?php if ($_GET['category_name'] == 'Мясная') { ?>selected="selected" <?php }; ?>>Мясная</option>
                            <option value="Больше сыра" <?php if ($_GET['category_name'] == 'Больше сыра') { ?>selected="selected" <?php }; ?>>Больше сыра</option>
                            <option value="Острое" <?php if ($_GET['category_name'] == 'Острое') { ?>selected="selected" <?php }; ?>>Острое</option>
                            <option value="Без мяса" <?php if ($_GET['category_name'] == 'Без мяса') { ?>selected="selected" <?php }; ?>>Без мяса</option>
                        </select>
                    </div>
                    <div class="mt-3 w-50 mx-auto">
                        <p>По цене</p>
                        <input type="number" name="price_start" placeholder="Цена от" value="<?= $_GET['price_start']; ?>" class="form-control">
                        <input type="number" name="price_end" placeholder="Цена до" value="<?= $_GET['price_end']; ?>" class="form-control mt-2">
                    </div>
                    <button name="applyFilter" value="Применить фильтр" class="btn btn-primary mt-3 me-3 btn-sm">Применить фильтр</button>
                    <button name="clearFilter" value="Очистить фильтр" class="btn btn-outline-primary mt-3 btn-sm">Очистить фильтр</button>
                </form>
            </div>

            <?php if(count($fullList) > 0): ?>
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
                    <?php foreach($fullList as $item):?>
                        <tr>
                            <th scope="row"><img src="../img/pizza/<?=$item['img_path']?>" style="max-width:150px;"></th>
                            <td><?=$item['menu_name']?></td>
                            <td><?=$item['category_name']?></td>
                            <td><?=$item['recipe']?></td>
                            <td><?=$item['cost']?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            <?php endif;?>
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