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
                $attributes = array('name' => 'frm_profile_about','method' => 'post' );
                echo form_open_multipart('admin/profile/about', $attributes); 
                
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                  <?php if($success_message) { ?>
                  <div class="alert alert-success"><?php echo $success_message;?></div>
                  <?php } ?>
                  <div class="form-group">
                    <label>About Title</label>
                    <input type="text" name="txt_about_title" class="form-control" placeholder="About Title" value="<?php echo $record->title; ?>">
                  </div>

                  <div class="form-group">
                    <label>Name</label> <span class="ml-1 text-red" > *</span>
                    <input type="text" name="txt_name" class="form-control" placeholder="Name" value="<?php echo $record->name; ?>">
                  </div>
                 
                  <div class="form-group">
                    <label>Age</label>
                    <input type="text" name="txt_age" class="form-control" placeholder="Text 3" value="<?php echo $record->age; ?>">
                  </div>

                  <div class="form-group">
                    <label>Residence</label>
                    <input type="text" name="txt_residence" class="form-control" placeholder="Residence" value="<?php echo $record->residence; ?>">
                  </div>

                  <div class="form-group">
                    <label>Position Type</label>
                    <input type="text" name="txt_position" class="form-control" placeholder="Text 3" value="<?php echo $record->position_type; ?>">
                  </div>

                  <div class="form-group">
                    <label>Freelancer Availability <span class="ml-1 text-red" > *</span></label>
                    <select name="ddl_freelance" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" <?php if($record->freelance_avail==1) echo "selected"; else ""; ?>>Yes</option>
                        <option value="0" <?php if($record->freelance_avail==0) echo "selected"; else ""; ?>>No</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Details</label>
                    <textarea type="text" name="txt_details" class="form-contro textarea" placeholder="Details"><?php echo $record->details; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image  <span class="ml-1 text-red" > *</span> <span class="text-red"> <?php echo  $image_error; ?></span>
                    <p class="help-block text-gray">Best size for image  640px × 960px and only jpg, jpeg, png, gif image is allowed.
                    </p>
                    </label>
                    <div class="input-group-append float-right mb-2">
                        <?php 
                            if($record->pic!="")
                              $image = base_url('assets/upload/pics/'.$record->pic);
                            else
                              $image = base_url('assets/admin/img/image.png');
                          ?>
                          <img src = "<?php echo $image; ?>" class="img-fluid img-size-64">  
                    </div>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="fle_pic" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image </label>
                        
                      </div>
                     
                     
                    </div>
                   
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