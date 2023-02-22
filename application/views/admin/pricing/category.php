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
                <div class="float-right"><a href="<?php echo base_url('admin/pricing/category/add'); ?>" class="btn btn-block btn-info btn-sm">Add New</a></div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                  <?php if($success_message) { ?>
                  <div class="alert alert-success"><?php echo $success_message;?></div>
                  <?php } ?>

                
                
                  <table id="records-minimal" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Id. #</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Payment Type</th>
                      <th>Sort Order</th>
                      <th>Active</th>
                      <th>Action</th>                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        foreach($records->result() as $row) { 
                    ?>

                    <tr>
                      <td><?php echo $row->pc_id; ?></td>
                      <td><?php echo stripslashes($row->title); ?></td>
                      <td><?php echo stripslashes($row->price); ?></td>
                      <td><?php echo stripslashes($row->payment_type); ?></td>
                      <td><?php echo stripslashes($row->sort_order); ?></td>
                      <td><?php if($row->status==1) echo "Yes"; else echo "No"; ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/pricing/category/edit/'.$row->pc_id); ?>" class="btn" title="Edit"><i class="fas fa-edit"></i> </a>

                        <a class="btn delete" title="Delete" data-id="<?php echo base_url('admin/pricing/category/delete/'.$row->pc_id); ?>"><i class="fas fa-trash"></i> </a>
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