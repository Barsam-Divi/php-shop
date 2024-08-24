


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>دسته بندی ها</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
              <li class="breadcrumb-item active"><a href="index.php?c=categories&a=add">دسته بندی جدید</a> </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">


              </div>


            <!-- /.card -->



            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-13">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body p-3">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th> نام محصول</th>
                      <th>دسته محصول</th>
                      <th>توضیحات محصول</th>
                      <th>قیمت اصلی</th>
                      <th>تخفیف</th>
                      <th>قیمت فروش</th>
                      <th>موجودی</th>
                      <th>عکس</th>
                      <th>مدیریت</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $id = 1;
                  ?>
                  <?php foreach ($products as $product) : ?>

                    <tr>
                      <td><?php echo $id?></td>
                      <td>

                        <?php echo $product['title']?>

                      </td>
                      <td>
                        <?php foreach ($categories as $category)  : ?>
                        <?php
                        if ($product['category_id'] == $category['id'])
                        {
                          echo "<span class='badge bg-danger'>".$category['title']."</span>";

                        }
                         ?>
                        <?php  endforeach;?>

                      </td>
                      <td>
                        <div class="form-group">
                          <?php

                          echo   "<textarea  class='form-control' style='height: 100px ' readonly>".$product['description']."</textarea>"

                          ?>
                        </div>

                      </td>
                      <td>

                        <?php echo $product['price']?>

                      </td>
                      <td>


                        <?php echo '%'.$product['discount']?>

                      </td>
                      <td>

                      <?php echo $product['sellingprice']?>


                      </td>
                      <td>

                        <?php echo $product['quantity']?>


                      </td>
                      <td>

                        <picture>

                          <img src="<?php echo "../".$product['pic'] ?>" alt="" height="100" width="100">

                        </picture>

                      </td>
                      <td>
                        <a href="?c=products&a=read&id=<?php echo $product['id']?>"
                           class="btn btn-sm btn-warning">ویرایش</a>
                        <a href="?c=products&a=delete&id=<?php echo $product['id']?>"
                           class="btn btn-sm btn-danger">حذف</a>
                      </td>

                    </tr>

                  <?php $id++; endforeach?>


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->





              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
