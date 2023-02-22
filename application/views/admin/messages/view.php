 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashbaord') ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card card-dark">
              <div class="card-header">
                <div><h3 class="card-title"><?php echo $sub_page_title; ?></h3></div>
               
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  
                  <table class="table table-bordered table-hover">
                    <tr>
                      <th>Name</th>
                      <td><?php echo stripslashes($record->name); ?></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td><?php echo stripslashes($record->email); ?></th>
                    </tr>
                    <tr>
                      <th>Message</th>
                      <td><?php echo stripslashes($record->message); ?></td>   
                    </tr>
                    <tr>
                      <th>Message Date</th>
                      <td><?php echo stripslashes($record->create_date); ?></td>                  
                    </tr>
                 
                </table>

                </div>
                <!-- /.card-body -->

               
            </div>

           
          </div>
          <!-- /.col-md-6 -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->