<!-- Select2 -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="assets/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="assets/plugins/dropzone/min/dropzone.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ویرایش دسته بندی</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
                        <li class="breadcrumb-item active"><a href="index.php?c=categories&a=list">لیست دسته بندی ها </a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default" >
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <form action="?c=categories&a=update&id=<?php echo $_GET['id']?>" method="post">
                    <div class="col-md-10">
                        <label>نام دسته بندی</label>
                        <input name="title" type="text" class="form-control my-colorpicker1" required value="<?php echo $cat['title']?>">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>دسته اصلی</label>
                                    <select name="parent_id" class="form-control select2"  style="width: 100%;" >
                                        <option value="" disabled selected>میتوانید یک دسته بندی انتخاب کنید.....</option>
                                        <?php
                                        foreach ($categories as $category) {
                                            $select =($category['id']== $cat['parent_id'] ? 'selected' : '');
                                            if ($category['parent_id']==NULL) {
                                                echo "<option ".$select."  value='" . $category['id'] . "'>" . $category['title'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <input  type="submit" value="ثبت تغییرات" class="btn btn-primary" ></button>
                    </div>
                </form>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

</script>

