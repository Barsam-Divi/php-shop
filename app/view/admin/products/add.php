<!-- Select2 -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ایجاد محصول</h1>
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
            <form action="?c=products&a=create" method="post" enctype="multipart/form-data">
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
                                    <input class="form-control filter" type="text" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>دسته بندی ها</label>
                                    <select class="form-control select2" style="width: 100%;" name="category_id">
                                        <option value="" selected disabled>لطفا یک دسته انتخاب کنید</option>
                                        <?php
                                        foreach ($categories as $category)
                                        {
                                            if (!empty($category['parent_id']))
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
                                    <input  type="file" name="pic">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-group ">

                                    <div class="row">
                                        <label for="3">قیمت به تومن :  </label>
                                        <input class="form-control col-md-3" type="text" name="price" id="3">

                                    </div>

                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-group">

                                    <div class="row">
                                        <label for="2">تخفیف :  </label>
                                        <input class="form-control col-md-3" type="text" name="discount" id="2" placeholder="الظامی نیست">

                                    </div>

                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-group ">

                                    <div class="row">
                                        <label for="1">موجودی :  </label>

                                        <input class="form-control col-md-3" type="text" name="quantity" id="1">

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
                        <input type="submit" value="ایجاد" class="btn btn-primary ">
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
