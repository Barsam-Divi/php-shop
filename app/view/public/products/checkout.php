<?php if (!empty($carts_info)) : ?>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <form action="?c=products&a=idPay" method="post">
            <!-- row -->

            <div class="row">

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">ادرس ارسال</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="first_name" placeholder="نام" value="<?php echo $user_info->first_name?>" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="last_name" placeholder="نام خانوداگی" value="<?php echo $user_info->last_name?>" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="ایمیل" value="<?php  echo $user_info->email?>" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="ادرس"  value="<?php if (!empty($user_address)) {echo $user_address['address'];}?>" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="province" placeholder="استان" value="<?php if (!empty($user_address)) {echo $user_address['province'];}?>" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="شهر" value="<?php if (!empty($user_address)) {echo $user_address['city'];}?>" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="zip_code" placeholder="کد پستی" value="<?php if (!empty($user_address)) {echo $user_address['zip_code'];}?>" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="mobile" placeholder="شماره تلفن همراه" value="<?php if (!empty($user_address)) {echo $user_address['mobile'];}?>" maxlength="11" required>
                        </div>

                    </div>
                    <!-- /Billing Details -->



                    <!-- Order notes -->
                    <label for="description">توضیحات در باره ارسال محصول مثلا (زنگ خراب است )</label>
                    <div class="order-notes">
                        <textarea class="input" name="description"  placeholder="الطامی نیست"></textarea>
                    </div>
                    <!-- /Order notes -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">سفارش شما</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>محصولات</strong></div>
                            <div><strong>قیمت نهایی محصول</strong></div>
                        </div>
                        <div class="order-products">
                            <?php $total_price = 0 ?>
                            <?php foreach ($carts_info as $item) : ?>
                            <div class="order-col">
                                <div><?php echo  $item['count'].'x'.'  '.$item['products_title']?></div>
                                <div><?php echo number_format($item['count'] * $item['price'])?></div>
                            </div>
                            <?php $total_price +=$item['count'] * $item['price']; endforeach; ?>
                        </div>
                        <div class="order-col">
                            <div>ارسال</div>
                            <div><strong>رایگان</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>قیمت نهایی</strong></div>
                            <div><strong class="order-total"><?php echo number_format($total_price)?></strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1" autocomplete="on">
                            <label for="payment-1">
                                <span></span>
                                زرین پال
                            </label>


                    <div class="input-checkbox">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">
                            <span></span>
                            بنده با خرید از این سایت با
                             <a href="?c=home&a=rule">قوانین و مقررات </a>
                            این سایت را خوانده و ان را قبول دارم
                        </label>
                    </div>
                    <button href="?c=products&a=idpay" class="primary-btn order-submit">ثبت سفارش</button>
                </div>
                <!-- /Order Details -->
            </div>
        <!-- /row -->
        </form>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<?php else: ?>
      <div>

          <span class="align-content-center"><b>محصولی وجود ندارد</b></span>

      </div>
<?php endif; ?>
