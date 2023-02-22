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
                $attributes = array('name' => 'frm_education_add','method' => 'post' );
                echo form_open_multipart('admin/education/add', $attributes); 
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                 
                  <div class="form-group">
                    <label>Field <span class="ml-1 text-red" > *</span></label>
                    <input type="text" name="txt_field" class="form-control" placeholder="Field" value="<?php echo $this->input->post('txt_field') ?>">
                  </div>

                  <div class="form-group">
                    <label>School <span class="ml-1 text-red" > *</span></label>
                    <input type="text" name="txt_school" class="form-control" placeholder="School" value="<?php echo $this->input->post('txt_school') ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Details</label>
                    <textarea type="text" name="txt_details" class="form-control textarea" placeholder="Details"><?php echo $this->input->post('txt_details') ?></textarea>
                  </div>

                  <div class="form-group">
                    <label>From Date</label>
                    <div class="input-group date" data-provide="datepicker">
                      <div class="input-group-prepend">
                       <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                    <input type="text" name="txt_date_from" class="form-control" placeholder="From Date" value="<?php echo $this->input->post('txt_date_from') ?>">
                    </div> 
                  </div>
                 
                  <div class="form-group" id="date_to">
                    <label>To Date</label>
                    <div class="input-group date" data-provide="datepicker">
                      <div class="input-group-prepend">
                       <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                    <input type="text" name="txt_date_to" class="form-control" placeholder="To Date" value="<?php echo $this->input->post('txt_date_to') ?>">
                    </div> 
                  </div>
                  
                  <div class="form-group">
                    <label>or Currently Studing</label>
                    <input type="checkbox" name="chk_current_date" id="chk_current_date" class="form-control col-1" value="1">
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