
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>عنوان محصول</th>
            <th> عکس محصول</th>
            <th>تعداد</th>
            <th>قیمت محصول (تومن)</th>
            <th>قیمت نهایی محصول (تومن)</th>
            <th>شماره فاکتور</th>
            <th>شماره کارت پرداخت شده</th>
            <th>  قیمت نهایی فاکتور(تومان)</th>
            <th>مدیریت</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php $total_price = 0 ?>
        <?php foreach ($carts_info as $item) : ?>
        <tr>
            <th><?php echo $i?></th>
            <td><a href="?c=products&a=show&slug=<?php echo $item['products_slug']?>"><?php echo $item['products_title']?></a></td>
            <td><img src=" <?php echo $item['products_pic']?>" alt=" <?php echo $item['products_pic']?>" width="100"></td>
            <td><?php echo $item['count']?></td>
            <td><?php echo number_format($item['price'])?></td>
            <td><?php echo number_format($item['price'] * $item['count'])?></td>
            <td><a href="?c=products&a=RemoveCard&id=<?php echo $item['id']?>"><i class=" fa fa-trash"></i></a></td>
        </tr>
        <?php $i++; $total_price += ($item['price'] * $item['count']) ; endforeach;?>
        </tbody>
    </table>
    <?php if (!empty($carts_info)) : ?>
    <div>
        <b> قیمت نهایی:<?php echo number_format($total_price)?></b> <br> <br>
        <a href="?c=products&a=checkout" class="btn btn-primary" style="border-radius:  ">تسویه حساب</a>
    </div>
    <?php endif; ?>
</div>
