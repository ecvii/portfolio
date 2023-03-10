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
                $attributes = array('name' => 'frm_team_add','method' => 'post' );
                echo form_open_multipart('admin/team/add', $attributes); 
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                 
                  <div class="form-group">
                    <label>Name <span class="ml-1 text-red" > *</span></label>
                    <input type="text" name="txt_name" class="form-control" placeholder="Name" value="<?php echo $this->input->post('txt_name') ?>">
                  </div>

                  <div class="form-group">
                    <label>Designation <span class="ml-1 text-red" > *</span></label>
                    <input type="text" name="txt_designation" class="form-control" placeholder="Designation" value="<?php echo $this->input->post('txt_designation') ?>">
                  </div>

                  <div class="form-group">
                    <label>Facebook Profile</label>
                    <input type="text" name="txt_facebook" class="form-control" placeholder="Facebook Profile" value="<?php echo $this->input->post('txt_facebook') ?>">
                  </div>

                  <div class="form-group">
                    <label>Twitter Profile</label>
                    <input type="text" name="txt_twitter" class="form-control" placeholder="Twitter Profile" value="<?php echo $this->input->post('txt_twitter') ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Instagram Profile</label>
                    <input type="text" name="txt_instagram" class="form-control" placeholder="Instagram Profile" value="<?php echo $this->input->post('txt_instagram') ?>">
                  </div>

                  <div class="form-group">
                    <label>Linkedin Profile</label>
                    <input type="text" name="txt_linkedin" class="form-control" placeholder="Linkedin Profile" value="<?php echo $this->input->post('txt_linkedin') ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image  <span class="ml-1 text-red" > *</span> <span class="text-red"> <?php echo  $image_error; ?></span>
                    <p class="help-block text-gray">Best size for slider image  640px ?? 480px and only jpg, jpeg, png, gif image is allowed.
                    </p>
                   </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="fle_pic" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image </label>
                      </div>
                     
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="txt_sort_order" class="form-control" placeholder="Sort Order" value="<?php echo $this->input->post('txt_sort_order') ?>">
                  </div>

                  <div class="form-group">
                    <label>Status <span class="ml-1 text-red" > *</span></label>
                    <select name="ddl_status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
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