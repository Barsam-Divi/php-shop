<!DOCTYPE html>
<html lang="fa" dir =rtl>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="assets/https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="assets/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="assets/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="assets/#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="assets/#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="assets/#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="assets/#"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="assets/#"><i class="fa fa-user-o"></i> My Account</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="assets/#" class="logo">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="assets/#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->
                        <?php
                        $total = 0;
                        ?>
                        <!-- Cart -->
                        <?php if (!empty($user_info)) : ?>
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>سبد خرید</span>
                                <div class="qty"><?php echo count($carts_info)?></div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <?php foreach ($carts_info as $item) : ?>
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="<?php echo $item['products_pic']?>">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="assets/#"><?php echo $item['products_title']?></a></h3>
                                            <h4 class="product-price"><span class="qty"><?php echo $item['count']?>x</span><?php echo number_format($item['price'])?></h4>
                                        </div>
                                        <a class="delete"  href="?c=products&a=RemoveCard&id=<?php echo $item['id']?>"><i class="fa fa-close"></i></a>
                                    </div>
                                    <?php  $total +=($item['price'] * $item['count']); endforeach; ?>
                                </div>
                                <div class="cart-summary">
                                    <small>محصولات:<?php echo count($carts_info)?></small>
                                    <h5>محموع قیمت ها:<?php echo number_format($total); echo "  تومان"  ?></h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="?c=products&a=checklist">دیدن محصولات</a>
                                    <a href="?c=products&a=checkout">تسویه حساب<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="assets/#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class=""><a href="?c=home&a=index">خانه</a></li>
                <?php foreach ($categories as $category) : ?>
                    <li class="">
                        <a href="?c=products&a=list&category=<?php echo $category['slug']?>">

                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $category['title']?>
                                </a>
                                <?php if ($categories_OBJ->child($category['id'])) {
                                    $ht = '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                                    foreach ($categories_OBJ->child($category['id']) as $item) {
                                        $ht .='<a class="dropdown-item" href="?c=products&a=list&category='.$item['slug'].'">'.$item['title'].'</a> <br>';
                                    }
                                    $ht .='</div>';
                                    echo $ht;
                                }?>

                            </div>

                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
