<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Cortex | Portfolio | Resume | vCard | Builder</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
   <!-- daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css">
   <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.css">
   <!-- Custom style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <!-- Left navbar links -->   

    
     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" title="Messages">
          <i class="far fa-envelope"></i> <strong>Messages</strong>
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
            <?php 
                foreach($latest_messages->result() as $row_messages) { 
            ?>
        <a href="<?php echo base_url('admin/messages/view/'.$row_messages->co_id); ?>" class="dropdown-item">
            <!-- Message Start -->
          
            <div class="media">
              
           
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo stripslashes($row_messages->name); ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo stripslashes(substr($row_messages->message,0,30)); ?>...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo date("M d Y", strtotime($row_messages->create_date))  ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>         
          <div class="dropdown-divider"></div>
          <?php } ?>
          <a href="<?php echo base_url('admin/messages/list/') ?>" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>

     
       <!-- User Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" title="User">
          <i class="fas fa-user-circle"></i>
         <strong><?php echo stripslashes($user_record->name); ?></strong>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo base_url('admin/profile/edit_user'); ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title"> <i class="fas fa-users-cog mr-3"></i> Edit Admin Profile </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>         
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('admin/profile/change_password'); ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title"> <i class="fas fa-key mr-3"></i> Change Password </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>         
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('admin/profile/logout'); ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title"> <i class="fas fa-sign-out-alt mr-3"></i>  Logout </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="<?php echo base_url('index.html') ?>" title="Visit Front Site" target="_blank"><i class="fas fa-globe"></i> <strong>Website</strong></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->