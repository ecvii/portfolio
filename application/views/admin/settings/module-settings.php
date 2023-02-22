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
                $attributes = array('name' => 'frm_module_settings','method' => 'post' );
                echo form_open_multipart('admin/settings/module_settings', $attributes); 
              ?>
                <div class="card-body">
                  <?php if(validation_errors()) { ?>
                  <div class="alert alert-danger"><?php echo validation_errors();?></div>
                  <?php } ?>
                  <?php if($success_message) { ?>
                  <div class="alert alert-success"><?php echo $success_message;?></div>
                  <?php } ?>

                  <table class="table table-responsive">
											<tr>
                        <th>Status</th>
												<th>Module Name</th>
												<th>Menu Title</th>
												<th>Module Title</th>
                        <th>Module Sub-Title</th>
                        <th>Menu Show</th>
                        <th>Sort Order</th>
											</tr>
											<?php 
											  foreach($module_records->result() as $module_row): 
											?>
												<tr>
													<td>	<input type="hidden" name="m_ids[]"
														value=<?php echo $module_row->mo_id;?>>
                          
                            <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-success">
                            
                            <?php if($module_row->status == 1) {?>

														<input type="checkbox" class="custom-control-input"
															name="ms_status[]" id="<?php echo $module_row->module_name;?>"
															value="<?php echo $module_row->mo_id;?>" checked>
														<?php } else {?>

														<input type="checkbox" name="ms_status[]"
															id="<?php echo $module_row->module_name;?>"
															class="custom-control-input"
															value="<?php echo $module_row->mo_id;?>">
                            <?php }?>
                            <label class="custom-control-label"
                              for="<?php echo $module_row->module_name;?>"></label>
                            </div>
                          </td>

                          
                              
													<td><input type="text" class="pl-3 " name="txt_module_name[]"
														value="<?php echo $module_row->module_name;?>"
														id="<?php echo $module_row->mo_id;?>" 
                            placeholder="Module Name" disabled></td>
                            
													<td><input type="text" class="pl-3" name="txt_menu_title[]"
														value="<?php echo $module_row->menu_title;?>"
														id="<?php echo $module_row->mo_id;?>" 
                            placeholder="Menu Title"></td>
                            
													<td><input type="text" class="pl-3" name="txt_module_title[]"
														value="<?php echo $module_row->title;?>"
														id="<?php echo $module_row->mo_id;?>"
                            placeholder="Module Title"></td>
                            
													<td><input type="text" class="pl-3" name="txt_subtitle[]"
														placeholder="Sub-Title" id="<?php echo $module_row->mo_id;?>"
													
                            value="<?php echo $module_row->sub_title;?>"></td>
                          
                            <td>
                                <select name="ddlMenu[]"> 
                                  <option value="0" <?php if($module_row->menu_status==0) echo "selected"; else echo ""; ?>>No</option>
                                  <option value="1" <?php if($module_row->menu_status==1) echo "selected"; else echo ""; ?>>Yes</option>
                                </select>
                            </td>

                            <td><input type="text" class="pl-3" name="txt_sort_order[]"
														placeholder="Sort Order" id="<?php echo $module_row->mo_id;?>"
													
                            value="<?php echo $module_row->sort_order;?>"></td>
                            
                            
												</tr>
											<?php endforeach;?>
											<tr>
												<td colspan="5">	<button type="submit" class="btn btn-dark" name="btn_save">Save
											Setting</button></td>
											</tr>
										</table>                 
                </div>
                <!-- /.card-body -->

              
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