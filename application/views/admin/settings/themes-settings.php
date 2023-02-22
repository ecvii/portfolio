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
               
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                 
                  <?php if($success_message) { ?>
                  <div class="alert alert-success"><?php echo $success_message;?></div>
                  <?php } ?>
                               
                  <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Sr. #</th>
                      <th>Thumb</th>
                      <th>Title</th>
                      <th>Colors</th>
                      <th>Theme Style</th>
                      <th>Activate</th>
                                          
                    </tr>
                  </thead>
                  <tbody>
                 
                    <?php 
                        $count = 1;
                        foreach($theme_records->result() as $theme_row) {  
                            $theme_colors = explode(',', $theme_row->colors);
                            $color_codes = explode(',', $theme_row->color_codes);
                            $theme_styles = explode(',', $theme_row->theme_style);
                    ?>
                     <?php 
                      $attributes = array('name' => 'frm_theme_settings','method' => 'post' );
                      echo form_open_multipart('admin/settings/theme_settings', $attributes); 
                    ?>
                    <tr>
                      <td>
                          <?php echo $count; ?>
                          <input type="hidden" name="txt_th_id" value="<?php echo $theme_row->th_id; ?>">
                          <input type="hidden" name="<?php echo $count; ?>" value="<?php echo $count; ?>">
                      </td>
                      <td><img src="<?php echo base_url('assets/themes/thumbs/'.$theme_row->thumb); ?>" class="img-fluid img-size-125 "></td>
                      <td><?php echo stripslashes($theme_row->title); ?></td>
                      <td>
                      <div data-toggle="buttons">
                          <?php 
                            $count=0;
                            foreach($theme_colors as $colors) { 
                             
                          ?>
                            <label class="btn btn-info" style="background-color:<?php echo $color_codes[$count]; ?>">
                              <input type="radio" name="rd_color"  <?php if($theme_row->selected_color==$colors) echo "checked"; else echo ""; ?> value="<?php echo $colors; ?>" required="true"> &nbsp;
                            </label>
                              
                          <?php  $count++;} ?>
                      </div>
                      </td>
                      <td>
                          <select name="ddl_theme_style" class="form-control">
                             <?php  foreach($theme_styles as $style) {  ?>
                                <option value="<?php echo $style; ?>" <?php if($theme_row->theme_style_selected==$style) echo "selected"; else echo ""; ?>><?php echo $style; ?></option>
                             <?php } ?>
                          </select>
                      </td>
                      <td>
                        <button type="submit" class="btn <?php if($theme_row->status==0) echo "btn-dark"; else echo "btn-info"; ?>" title="Activate"><i class="fas fa-angle-double-right"></i> 
                       
                        <?php if($theme_row->status==1) echo "Activated"; else echo "Activate"; ?>
                        
                      
                      </button>

                       
                      </td>
                    </tr>
                    <?php echo form_close(); ?>
                    <?php $count++; } ?>
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