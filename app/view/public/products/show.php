<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">

                    <li><a href="?c=home&a=index">خونه</a></li>
                    <li><a href="#">دسته بندی ها</a></li>
                    <li><a href="#"><?php echo $product['cat_title'] ?></a></li>
                    <li><a href="#"><?php echo $product['categories_title'] ?></a></li>
                    <li class="active"><?php echo $product['title'] ?></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-6 col-ml-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="<?php echo $product['pic']?>" alt="<?php echo $product['title']?>">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->



            <!-- Product details -->
            <div class="col-md-6">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $product['title'] ?></h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 class="product-price"><?php   echo number_format($product['sellingprice']);?> <del class="product-old-price"><?php if ($product['discount'] > 0) { echo number_format($product['price']);}?></del></h3>
                        <span class="product-available"><?php if ($product["quantity"] == 0)
                            { echo "موجود نیست";} else{echo "موجود است";} ?></span>

                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="product-options">
                        <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div>
                    <?php if ($product[9] !=0) : ?>
                        <?php if (isset($user_info)) : ?>
                                <div class="add-to-cart">
                                    <form action="?c=products&a=AddToCart&slug=<?php echo $product['slug']?>" METHOD="post">
                                    <div class="qty-label">
                                            <label for="count"  >تعداد</label>
                                            <input type="number" name="count" min="1" max="<?php echo $product[9];?>" value="1" >
                                            <input type="hidden" name="price" value="<?php echo $product['sellingprice']?>">
                                            <input type="hidden" name="product_id" value="<?php echo $product['id']?>">

                                    </div>
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> اظافه کردن به سبد خرید </button>
                                </div>
                                    </form>
                        <?php else: ?>
                            <div>
                                <p>لطفا اول در حسال کاربری خود وارد شوید</p>
                                <a href="user/login.php" class="btn btn-sm btn-primary">ورود به حساب کاربری</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                    </ul>

                    <ul class="product-links">
                        <li><?php echo $product['categories_title'] ?></li>
                        <li><a href="#"><?php echo $product['title'] ?></a></li>
                        <li><a href="#"><?php echo $product['cat_title'] ?></a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>

                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $product['description']?>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->


                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">محصولات مشایه</h3>
                </div>
            </div>

            <?php foreach ($similar as $item) : ?>
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="<?php echo $item['pic']?>" alt="<?php echo $item['title']?>">
                        <?php if ($item['discount'] > 0) : ?>
                        <div class="product-label">
                            <span class="sale"><?php echo '%'.$item['discount']?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="product-body">
                        <p class="product-category"><?php echo $item['categories_title']?></p>
                        <h3 class="product-name"><a href="#"><?php echo $item['title']?></a></h3>
                        <?php if ($item['quantity'] > 0) : ?>
                        <h4 class="product-price"><?php echo number_format($item['sellingprice']);?><del class="product-old-price"><?php if ($item['discount'] > 0) { echo number_format($item['price']);}?></del></h4>
                        <div class="product-rating">
                        </div>
                        <?php endif; ?>

                        <?php if ($item['quantity'] = 0) : ?>
                            <h4 class="product-price">موجود نیست</h4>
                            <div class="product-rating">
                            </div>
                        <?php endif; ?>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
