

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
                      <th>نام</th>
                      <th>دسته اصلی</th>
                      <th>مدیریت</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $id = 1;
                  foreach ($categories as $category)  :  ?>

                    <tr>
                      <td><?php echo $id?></td>
                      <td>

                        <?php echo $category['title']?>

                      </td>
                      <td>

                        <span class="badge bg-danger"><?php echo $category['parent_title']?></span>


                      </td>
                      <td>

                        <a href="?c=categories&a=read&id=<?php echo $category['id']?>"
                           class="btn btn-sm btn-warning">ویرایش</a>
                        <a href="?c=categories&a=delete&id=<?php echo $category['id']?>"
                           class="btn btn-sm btn-danger">حذف</a>

                      </td>

                    </tr>

                  <?php $id++; endforeach ?>
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
