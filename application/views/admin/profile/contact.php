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
                <h3 class="card-title"><?php echo $sub_page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php 
                $attributes = array('name' => 'frm_profile_contact','method' => 'post' );
                echo form_open_multipart('admin/profile/contact', $attributes); 
                
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                  <?php if($success_message) { ?>
                  <div class="alert alert-success"><?php echo $success_message;?></div>
                  <?php } ?>
                  <div class="form-group">
                    <label>Address</label> <span class="ml-1 text-red" > *</span>
                    <input type="text" name="txt_address" class="form-control" placeholder="Address" value="<?php echo $record->address; ?>">
                  </div>

                  <div class="form-group">
                    <label>Phone 1</label> <span class="ml-1 text-red" > *</span>
                    <input type="text" name="txt_phone_1" class="form-control" placeholder="Phone 1" value="<?php echo $record->phone_1; ?>">
                  </div>
                 
                  <div class="form-group">
                    <label>Phone 2</label>
                    <input type="text" name="txt_phone_2" class="form-control" placeholder="Phone 2" value="<?php echo $record->phone_2; ?>">
                  </div>

                  <div class="form-group">
                    <label>Email 1</label> <span class="ml-1 text-red" > *</span>
                    <input type="text" name="txt_email_1" class="form-control" placeholder="Residence" value="<?php echo $record->email_1; ?>">
                  </div>

                  <div class="form-group">
                    <label>Email 2</label>
                    <input type="text" name="txt_email_2" class="form-control" placeholder="Email 2" value="<?php echo $record->email_2; ?>">
                  </div>

                  <div class="form-group">
                    <label>Website</label> 
                    <input type="text" name="txt_website" class="form-control" placeholder="Website" value="<?php echo $record->website; ?>">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Submit</button>
                </div>
                <?php echo form_close(); ?>
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