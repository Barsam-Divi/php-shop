<!-- Select2 -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تغیرات</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
                        <li class="breadcrumb-item active"><a href="?c=products&a=list">لیست محصولات</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->

                <form action="?c=products&a=update&id=<?php echo $_GET['id']?>&pn=<?php echo $products['pic'] ?>" method="post" enctype="multipart/form-data">
                <div class="card card-default">
                    <div class="card-header">


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>نام محصول</label>
                                        <input class="form-control filter" type="text" name="title" value="<?php echo $products['title']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>دسته بندی ها</label>
                                        <select class="form-control select2" style="width: 100%;" name="category_id">
                                            <?php
                                            foreach ($categories as $category)
                                            {
                                                if ($category['id'] == $products['category_id'])
                                                {
                                                    echo "<option value='" . $category['id'] . "'SELECTED>" . $category['title'] . "</option>";

                                                }
                                                if ($category['id'] !== $products['category_id']&&!empty($category['parent_id']))
                                                {

                                                    echo "<option value='" . $category['id'] . "'>" . $category['title'] . "</option>";
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>توضیحات محصول</label>
                                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="description">
                                        <?php echo $products['description'] ?>
                                        </textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>عکس محصول</label>
                                        <br>
                                        <input  type="file" name="pic"" >
                                        <picture>

                                            <img src="<?php echo "../".$products['pic'] ?>" alt="" height="100" width="100">

                                        </picture>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <div class="form-group ">

                                        <div class="row">
                                            <label for="3">قیمت به تومن :  </label>
                                            <input class="form-control col-md-3" type="text" name="price" id="3" value="<?php echo $products['price']?>">

                                        </div>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="form-group">

                                        <div class="row">
                                            <label for="2">تخفیف :  </label>
                                            <input class="form-control col-md-3" type="text" name="discount" id="2" placeholder="الظامی نیست" value="<?php echo $products['discount']?>">

                                        </div>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="form-group ">

                                        <div class="row">
                                            <label for="1">موجودی :  </label>

                                            <input class="form-control col-md-3" type="text" name="quantity" id="1" value="<?php echo $products['quantity']?>">

                                        </div>

                                    </div>

                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12 col-sm-6">

                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">

                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value=" ایجاد تغیرات" class="btn btn-primary ">
                        </div>

            </form>

            <!-- /.row -->
        </div>
        <!-- /.card-body -->

</div>
<!-- /.card -->





</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<!-- Select2 -->
<script>$(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })</script>
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
        //Add text editor
        $('#compose-textarea').summernote()
    })
</script>

