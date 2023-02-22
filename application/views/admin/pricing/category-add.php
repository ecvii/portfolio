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
                $attributes = array('name' => 'frm_pricing_cat_add','method' => 'post' );
                echo form_open_multipart('admin/pricing/category/add', $attributes); 
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                 
                  <div class="form-group">
                    <label>Title <span class="ml-1 text-red" > *</span></label>
                    <input type="text" name="txt_title" class="form-control" placeholder="Title" value="<?php echo $this->input->post('txt_title') ?>">
                  </div>

                  <div class="form-group">
                    <label>Price <span class="ml-1 text-red" > *</span></label>
                    <input type="text" name="txt_price" class="form-control" placeholder="Price" value="<?php echo $this->input->post('txt_price') ?>">
                  </div>

                  <div class="form-group">
                    <label>Status <span class="ml-1 text-red" > *</span></label>
                    <select name="ddl_payment_type" class="form-control">
                        <option value="">Select Payment Type</option>
                        <option value="Per Year">Per Year</option>
                        <option value="Per Month">Per Month</option>
                        <option value="Per Week">Per Week</option>
                        <option value="Once">Once</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Order Link </label>
                    <input type="text" name="txt_order_link" class="form-control" placeholder="Order Link" value="<?php echo $this->input->post('txt_order_link') ?>">
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