<!doctype html>
<html lang="zxx">

<head>
<title><?php echo $meta_title; ?></title>
    <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="KiswaSolutions">
    <meta name="description" content="<?php echo $meta_description; ?> ">
    <meta name="keywords" content="<?php echo $meta_keywords; ?> ">

    <!-- fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/upload/pics/' .$settings_general->fav_image); ?>">
    <!-- Framework Stylesheets Start-->

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/bootstrap.min4.3.1.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/magnific-popup.css">

    <!-- Framework Stylesheets End-->

    <!-- Slider Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/swiper-custom.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/owl.theme.css">


    <!-- Font Awsome Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/vendors/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Custom Stylesheet Start-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/style.css">
    <?php if($selected_theme->theme_style_selected=='vcard-left') { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/style-left.css">
    <?php } else if($selected_theme->theme_style_selected=='vcard-right') { ?>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/style-right.css">
     <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/colors/yellow.css">

    <!-- Custom Stylesheet End-->


    <!-- Animation Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/animate.css">


</head>

<body data-spy="scroll" data-target="#navbarSupportedContent" data-offset="0">

<!--====== Sidebar-left starts =====-->
<div class="bg-overlay-page"></div>
<a href="#" class="<?php if($selected_theme->theme_style_selected=='vcard-left') echo 'sidebar-left-btn'; else echo 'sidebar-right-btn'; ?>  btn bg-primary-color d-md-none"><i class="fa fa-bars"></i></a>

    <div class="<?php if($selected_theme->theme_style_selected=='vcard-left')  echo 'sidebar-left'; else echo 'sidebar-right'; ?> bg-primary-color text-black bg-blackhe">
        <div class="title text-center">
            <i class="fa fa-times-circle sidebar-close-btn d-md-none"></i>
            <h2 class="fw-bold logo-c">
                <?php 
                    if($settings_general->logo_text!="") 
                        echo substr($settings_general->logo_text,0,1); 
                ?>.           
            </h2>
        </div><!-- end title -->
        <ul class="nav nav-tabs border-bottom-0 flex-column" id="myTab" role="tablist">
            
            <li class="nav-item" data-toggle="tooltip" data-placement="<?php if($selected_theme->theme_style_selected=='vcard-left') echo 'right'; else echo 'left'; ?> " title="Home">
<a class="nav-link fs-14"  href="<?php if($page_type=='blogs-list') echo base_url('index.html'); else echo '#home'; ?>" <?php if($page_type!='blogs-list') { ?> id="home-tab"  role="tab" data-toggle="tab"  aria-controls="home" aria-selected="true" <?php } ?>><i class="fa fa-home"></i>
                </a>
            </li>

            <?php foreach($menu_items->result() as $menu_row) { ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="<?php if($selected_theme->theme_style_selected=='vcard-left') echo 'right'; else echo 'left'; ?>" title="<?php echo stripslashes($menu_row->menu_title); ?>">
            <a class="nav-link fs-14"  href="<?php if($page_type=='blogs-list') echo base_url('index.html'); else { ?>#<?php echo $menu_row->module_file; } ?>" <?php if($page_type!='blogs-list') { ?>  role="tab"  id="<?php echo $menu_row->module_file; ?>-tab" data-toggle="tab"  aria-controls="<?php echo $menu_row->module_file; ?>" aria-selected="true" <?php } ?>><i class="<?php echo $menu_row->menu_icon; ?>"></i>
                </a>
            </li>
            <?php } ?>
            
           
           
           
        </ul>
    </div>
    <!--====== Sidebal-left ends =====-->