<!doctype html>
<html lang="zxx">

<head>
    <title> <?php echo $meta_title; ?>
        
    </title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/colors/<?php echo $selected_theme->selected_color; ?>.css">

    <!-- Custom Stylesheet End-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/css/custom.css'); ?>">

    <!-- Animation Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/css/animate.css">



</head>

<body data-spy="scroll" data-target="#navbarSupportedContent" data-offset="0">

<!-- Navbar Starts-->
<header>
        <nav class="navbar navbar-expand-xl fixed-top text-white-persist text-center px-4">
            <div class="container-fluid">
                <a class="navbar-brand p-0 fs-navbar-brand fw-bold" href="<?php echo base_url('index.html'); ?>">
                <?php 
                    if($settings_general->logo_image!="") {
                ?>
                    <img src="<?php echo base_url('assets/upload/pics/'.$settings_general->logo_image); ?>">
                <?php 
                    } else
                         echo stripslashes($settings_general->logo_text); 
                ?>
                </a>
                <button class="navbar-toggler text-white" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""><i class="fa fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-xl-auto ml-auto fs-nav-link primary-colorh" id="navbarNavDropdown">


                        <li class="nav-item">
                            <a class="nav-link px-3 hover active" href="<?php echo base_url('index.html'); ?>">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>

                        <?php foreach($menu_items->result() as $menu_row) { ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url('index.html#').$menu_row->module_file; ?>" class="nav-link px-3 hover" ><?php echo stripslashes($menu_row->menu_title); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div><!-- end navbar-collapse -->

            </div><!-- end container -->
        </nav>
    </header>
    
    <!-- Navbar End-->