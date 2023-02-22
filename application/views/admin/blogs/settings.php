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
                $attributes = array('name' => 'frm_blogs_settings','method' => 'post' );
                $hidden = array('txt_id' => $record->bs_id);
                echo form_open_multipart('admin/blogs/settings', $attributes, $hidden); 
                
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                  
                  <?php if($success_message) { ?>
                  <div class="alert alert-success"><?php echo $success_message;?></div>
                  <?php } ?>

                  <div class="form-group">
                    <label>Select Maximum Blogs Show on Home Page <span class="ml-1 text-red" > *</span></label>
                    <select name="ddl_items_show" class="form-control">
                        <option value="">Select #</option>
                        <option value="3" <?php if($record->items_show==3) echo "selected"; else ""; ?>>3</option>
                        <option value="6" <?php if($record->items_show==6) echo "selected"; else ""; ?>>6</option>
                        <option value="9" <?php if($record->items_show==9) echo "selected"; else ""; ?>>9</option>
                        <option value="12" <?php if($record->items_show==12) echo "selected"; else ""; ?>>12</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Blog Inner Page Image  <span class="ml-1 text-red" > *</span> <span class="text-red"> <?php echo  $image_error; ?></span>
                    <p class="help-block text-gray">Best size for image  1,920px × 1,280px and only jpg, jpeg, png, gif image is allowed.
                    </p>
                    </label>
                    <div class="input-group-append float-right mb-2">
                        <?php 
                            if($record->inner_bg!="")
                              $image = base_url('assets/upload/pics/'.$record->inner_bg);
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