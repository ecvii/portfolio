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
                $attributes = array('name' => 'frm_portfolio_edit','method' => 'post' );
                $hidden = array('txt_id' => $record->po_id);
                echo form_open_multipart('admin/portfolio/edit', $attributes, $hidden); 
                
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                 
                  <div class="form-group">
                    <label>Category <span class="ml-1 text-red" > *</span></label>
                    <select name="ddl_category" class="form-control">
                        <option value="">Select Category</option>
                        <?php 
                        foreach($records_cat->result() as $row) { ?>
                          <option value="<?php echo $row->pc_id ?>" <?php if($record->pc_id == $row->pc_id) echo "selected"; else echo ""; ?>><?php echo stripslashes($row->title); ?></option>
                        <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Title <span class="ml-1 text-red" > *</span></label>
                    <input type="text" name="txt_title" class="form-control" placeholder="Title" value="<?php echo $record->title; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Link (URL)</label>
                    <input type="text" name="txt_link" class="form-control" placeholder="Link" value="<?php echo $record->link; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Details</label>
                    <textarea type="text" name="txt_details" class="form-control" placeholder="Details"><?php echo $record->details; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image  <span class="ml-1 text-red" > *</span> <span class="text-red"> <?php echo  $image_error; ?></span>
                    <p class="help-block text-gray">Best size for slider image  1,280px in width × 400px, 850px, or 1700px in height and only jpg, jpeg, png, gif image is allowed.
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

                  <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="txt_sort_order" class="form-control" placeholder="Sort Order" value="<?php echo $record->sort_order; ?>">
                  </div>

                  <div class="form-group">
                    <label>Status <span class="ml-1 text-red" > *</span></label>
                    <select name="ddl_status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" <?php if($record->status==1) echo "selected"; else ""; ?>>Active</option>
                        <option value="0" <?php if($record->status==0) echo "selected"; else ""; ?>>In Active</option>
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