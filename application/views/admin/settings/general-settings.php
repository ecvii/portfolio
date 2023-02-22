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
                $attributes = array('name' => 'frm_gerneral_settings','method' => 'post' );
                echo form_open_multipart('admin/settings/general_settings', $attributes); 
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                  <?php if($success_message) { ?>
                  <div class="alert alert-success"><?php echo $success_message;?></div>
                  <?php } ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Website Title</label>
                    <input type="text" name="txt_ws_title" class="form-control" placeholder="Enter Website Title" value="<?php echo $general_record->site_title; ?>">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputFile">Logo Image <span class="text-red"> <?php echo  $image_error_1; ?></span>
                  
                    <p class="help-block text-gray">Best size for logo image  300px in width and only jpg, jpeg, png, gif image is allowed.
                    </p>

                   </label>

                    <div class="input-group-append float-right mb-2">
                      
                          <?php 
                            if($general_record->logo_image!="")
                              $logo_image = base_url('assets/upload/pics/'.$general_record->logo_image);
                            else
                              $logo_image = base_url('assets/admin/img/image.png');
                          ?>
                          <img src = "<?php echo $logo_image; ?>" class="img-fluid img-size-64">  
                      
                      </div>

                    <div class="input-group">
                      <div class="custom-file">
                       
                        <input type="file" name="fle_logo_img" class="custom-file-input">
                        
                        <label class="custom-file-label" for="exampleInputFile">Choose Logo
                          
                        </label>
                      </div>
                      
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Fav Icon <span class="text-red"> <?php echo  $image_error_2; ?></span>
                    <p class="help-block text-gray">Best size for favicon   32px * 32px and only jpg, jpeg, png, gif image is allowed.
                    </p>
                    </label>

                    <div class="input-group-append float-right mb-2">
                       
                        <?php 
                            if($general_record->fav_image!="")
                              $fav_image = base_url('assets/upload/pics/'.$general_record->fav_image);
                            else
                              $fav_image = base_url('assets/admin/img/image.png');
                          ?>
                          <img src = "<?php echo $fav_image; ?>" class="img-fluid img-size-64">  
                      
                      </div>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="fle_fav_icon" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose Icon 
                        
                        
                        </label>
                      </div>
                     
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Logo Text</label>
                    <input type="text" name="txt_lg_title" class="form-control" placeholder="Enter Logo Title" value="<?php echo $general_record->logo_text; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Fun Facts Background Image <span class="text-red"> <?php echo  $image_error_3; ?></span>
                    <p class="help-block text-gray">Best size for Fun Facts Background Image  1280px * 980px and only jpg, jpeg, png, gif image is allowed.
                        </p>
                    </label>

                    <div class="input-group-append float-right mb-2">
                       
                        <?php 
                            if($general_record->fun_facts_bg!="")
                              $fun_facts_bg = base_url('assets/upload/pics/'.$general_record->fun_facts_bg);
                            else
                              $fun_facts_bg = base_url('assets/admin/img/image.png');
                          ?>
                          <img src = "<?php echo $fun_facts_bg; ?>" class="img-fluid img-size-64">  
                      
                      </div>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="fle_facts_image" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image 

                      
                        </label>
                      </div>
                     
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Footer Text</label>
                    <input type="text" name="txt_ft_title" class="form-control" placeholder="Enter Footer Text" value="<?php echo $general_record->footer_top_text; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Footer Copy Right Text</label>
                    <input type="text" name="txt_cpr_title" class="form-control" placeholder="Footer Copy Right Text" value="<?php echo $general_record->footer_bottom_text; ?>">
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