 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Statics</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-cyan"><i class="far fa-envelope-open"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Messages</span>
              <span class="info-box-number"><?php echo $this->Common_model->count_records('contact_messages', ''); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fab fa-servicestack"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Services</span>
              <span class="info-box-number"><?php echo $this->Common_model->count_records('services', ''); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="far fa-smile-beam"></i></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Team Members</span>
              <span class="info-box-number"><?php echo $this->Common_model->count_records('team', ''); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fas fa-blog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Blogs </span>
              <span class="info-box-number"><?php echo $this->Common_model->count_records('blogs', ''); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="fas fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Portfolios</span>
              <span class="info-box-number"><?php echo $this->Common_model->count_records('portfolio', ''); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-fuchsia"><i class="far fa-comment-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Testimonials</span>
              <span class="info-box-number"><?php echo $this->Common_model->count_records('testimonials', ''); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-indigo"><i class="fas fa-dice-six"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Skills</span>
              <span class="info-box-number"><?php echo $this->Common_model->count_records('skills', ''); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-dark"><i class="fas fa-dice-d20"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Fun Facts </span>
              <span class="info-box-number"><?php echo $this->Common_model->count_records('profile_facts', ''); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>


      <div class="row ">
      <div class="box col-md-12 col-sm-12 col-xs-12">
            <div class="box-header mt-4 mb-4">
              <h3 class="box-title">Latest Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body bg-gradient-white ">
              <table class="table table-condensed">
                <tbody>                  
                  <th>Id. #</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>View</th>   
                <?php 
                    foreach($latest_messages->result() as $row_messages) { 
                ?>
                <tr>
                  <td><?php echo $row_messages->co_id; ?></td>
                  <td><?php echo stripslashes($row_messages->name); ?></td>
                  <td><?php echo stripslashes($row_messages->email); ?></td>
                  <td><?php echo stripslashes(substr($row_messages->message,0,30)); ?>...</td>
                  <td><?php echo stripslashes($row_messages->create_date); ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/messages/view/'.$row_messages->co_id); ?>" class="btn" title="View"><i class="fas fa-eye"></i> </a>

                   
                  </td>
                </tr>
                <?php } ?>
               
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->