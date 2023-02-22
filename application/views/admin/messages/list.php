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
                  
                  <?php if($success_message) { ?>
                  <div class="alert alert-success"><?php echo $success_message;?></div>
                  <?php } ?>

                
                
                  <table id="records-minimal" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Id. #</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        foreach($records->result() as $row_messages) { 
                    ?>

                    <tr>
                      <td><?php echo $row_messages->co_id; ?></td>
                      <td><?php echo stripslashes($row_messages->name); ?></td>
                      <td><?php echo stripslashes($row_messages->email); ?></td>
                      <td><?php echo stripslashes(substr($row_messages->message,0,30)); ?>...</td>
                      <td><?php echo stripslashes($row_messages->create_date); ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/messages/view/'.$row_messages->co_id); ?>" class="btn" title="View"><i class="fas fa-eye"></i> </a>

                        <a class="btn delete" title="Delete" data-id="<?php echo base_url('admin/messages/delete/'.$row_messages->co_id); ?>"><i class="fas fa-trash"></i> </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
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