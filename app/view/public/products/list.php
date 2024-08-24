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
                    <?php foreach ($products as $product) {

                            $cat_title =$product['cat_title'];
                            $categories_title = $product['categories_title'];

                    }?>
                    <li><a href="#"><?php echo $cat_title?></a></li>
                    <li class="active"><?php echo $categories_title ?></li>
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
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-1">
                            <label for="category-1">
                                <span></span>
                                Laptops
                                <small>(120)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-2">
                            <label for="category-2">
                                <span></span>
                                Smartphones
                                <small>(740)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-3">
                            <label for="category-3">
                                <span></span>
                                Cameras
                                <small>(1450)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-4">
                            <label for="category-4">
                                <span></span>
                                Accessories
                                <small>(578)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-5">
                            <label for="category-5">
                                <span></span>
                                Laptops
                                <small>(120)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-6">
                            <label for="category-6">
                                <span></span>
                                Smartphones
                                <small>(740)</small>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-1">
                            <label for="brand-1">
                                <span></span>
                                SAMSUNG
                                <small>(578)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-2">
                            <label for="brand-2">
                                <span></span>
                                LG
                                <small>(125)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-3">
                            <label for="brand-3">
                                <span></span>
                                SONY
                                <small>(755)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-4">
                            <label for="brand-4">
                                <span></span>
                                SAMSUNG
                                <small>(578)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-5">
                            <label for="brand-5">
                                <span></span>
                                LG
                                <small>(125)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-6">
                            <label for="brand-6">
                                <span></span>
                                SONY
                                <small>(755)</small>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <div class="product-widget">
                        <div class="product-img">
                            <img src ="assets/img/product01.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src ="assets/img/product02.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src ="assets/img/product03.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
<!--                <div class="store-filter clearfix">-->
<!--                    <div class="store-sort">-->
<!--                        <label>-->
<!--                            Sort By:-->
<!--                            <select class="input-select">-->
<!--                                <option value="0">Popular</option>-->
<!--                                <option value="1">Position</option>-->
<!--                            </select>-->
<!--                        </label>-->
<!---->
<!--                        <label>-->
<!--                            Show:-->
<!--                            <select class="input-select">-->
<!--                                <option value="0">20</option>-->
<!--                                <option value="1">50</option>-->
<!--                            </select>-->
<!--                        </label>-->
<!--                    </div>-->
<!--                    <ul class="store-grid">-->
<!--                        <li class="active"><i class="fa fa-th"></i></li>-->
<!--                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    <?php foreach ($products as $product) : ?>

                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src ="<?php echo $product['pic']?>" alt="<?php echo $product['pic']?>">
                                <div class="product-label">
                                    <?php if ($product['discount'] > 0) : ?>
                                    <span class="sale">-<?php echo $product['discount']?>%</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $product['categories_title']?></p>
                                <h3 class="product-name"><a href="#"><?php echo $product['title']?></a></h3>
                                <h4 class="product-price"><?php echo number_format( $product['sellingprice'])?> <del class="product-old-price"><?php if (($product['discount']) > 0) {echo number_format( $product['price']);}?></del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <a href="?c=products&a=show&slug=<?php  echo $product['slug']?>">
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </a>
                                </div>
                            </div>
                            <?php if ($product['quantity'] > 0) : ?>
                                <?php if (isset($user_info)) : ?>
                                    <div class="add-to-cart">
                                        <form action="?c=products&a=AddToCart&slug=<?php echo $product['slug']?>" METHOD="post">
                                            <div class="qty-label">
                                                <input type="hidden" name="count" min="1" max="<?php echo $product['quantity'];?>" value="1" >
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
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- /product -->
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <?php $page = 1 ?>
                        <?php for ($i = 0;$i < $products_number;$i+=$limit) : ?>
                        <li class="active"">
                         <a href="?c=products&a=list&page=<?php echo $page ?>&category=<?php echo $_GET['category']?>">
                                <?php echo $page?>
                            </a>
                        </li>
                        <?php $page++; endfor; ?>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

