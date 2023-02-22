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
                
                $attributes = array('name' => 'frm_social_settings_edit','method' => 'post' );
                $hidden = array('txt_id' => $social_record->sl_id);
                echo form_open_multipart('admin/settings/social_edit', $attributes, $hidden); 
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                 
                  <div class="form-group">
                    <label>Font Awesome Icon</label>
                    <input type="text" name="txt_social_icon" class="form-control" value="<?php echo $social_record->icon; ?>" placeholder="Font Awesome Icon">
                  </div>

                  <div class="form-group">
                    <label>URL</label>
                    <input type="text" name="txt_social_url" class="form-control" value="<?php echo $social_record->url; ?>" placeholder="URL">
                  </div>

                  <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="txt_sort_order" class="form-control" value="<?php echo $social_record->sort_order; ?>" placeholder="Sort Order">
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select name="ddl_status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" <?php if($social_record->status==1) echo "selected"; else echo ""; ?>>Active</option>
                        <option value="0" <?php if($social_record->status==0) echo "selected"; else echo ""; ?>>In Active</option>
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