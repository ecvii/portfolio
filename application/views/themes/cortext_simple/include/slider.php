    <?php  
        if($slider_settings->status==1) { 
        
        if($slider_settings->pic!="")
            $slider_path = base_url('assets/upload/pics/'.$slider_settings->pic);
        else
            $slider_path = base_url('assets/admin/img/slider-blank.jpg');
    ?>
    <!-- Parallax Background Starts-->
<div class="parallax-bg"> 
    <div class="meta vh-100 bg-overlay"
        style="background: url(<?php echo $slider_path; ?>);background-size: cover;background-position: center;background-repeat: no-repeat;">
        <div id="particles-js"></div>
        <div class="container flex-centering text-center vh-100 ">
            <div class="row sh-above">
                <div class="col-12">
                    <div class="first-page-text text-white-persist">
                        <div class="first-page-text-headings">
                        <?php  if($slider_settings->text_1!="") { ?>
                            <h1 class="fw-medium animated fadeInDownBig"><?php echo $slider_settings->text_1; ?></h1>
                        <?php } ?>
                        <?php  if($slider_settings->text_2!="") { ?>
                            <h1 class="display-4 fw-semi-bold animated fadeInDownBig delay-1s"><?php echo $slider_settings->text_2; ?>
                            </h1>
                        <?php } ?>
                            <div class="custom-border sh-above">
                                <div class="line-border"></div>
                            </div>

                            <p class="dash line text-white-persist-e fw-regular animated fadeInDownBig delay-2s"><?php echo $slider_settings->text_3; ?></p>

                            <div class="custom-border sh-above">
                                <div class="line-border"></div>
                            </div>

                            <?php  if($slider_settings->social_status==1) { ?>
                            <ul class="list-unstyled list-inline social text-white-persist primary-colorh">
                                
                            <?php 
                                foreach ($settings_social->result() as $social_row) {
                            ?>
                            <li class="list-inline-item">
                                <a href="<?php echo $social_row->url; ?>" class="hover" target="_blank">
                                    <i class="<?php echo $social_row->icon; ?>"></i>
                                </a>
                            </li>
                            <?php } ?>
                              
                            </ul>
                            <?php } ?>
                        </div><!-- end first-page-text-headings -->
                    </div><!-- end first-page-text -->
                </div><!-- end column -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end meta -->
</div><!-- end parallax-bg -->
<!-- Parallax Background Ends-->
   <?php } else { ?>
    <!-- Swiper Slider Starts-->
    <div class="swiper-container slider1" id="home">
        <div class="swiper-wrapper">
        <?php 
            foreach ($slider_items->result() as $slider_row) {
               if($slider_row->pic!="")
                    $slider_path = base_url('assets/upload/pics/'.$slider_row->pic);
                else
                    $slider_path = base_url('assets/admin/img/slider-blank.jpg');
        ?>
            <div class="swiper-slide flex-centering text-center bg-overlay"
                style="background-image: url(<?php echo $slider_path; ?>); background-position: center; background-size: cover; background-repeat: no-repeat; width: 100vw; height: 100%;">
                <div class="meta sh-above">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="first-page-text text-white-persist" style="z-index:1px;">
                                    <div class="first-page-text-headings">
                                        <?php  if($slider_row->text_1!="") { ?>
                                        <h1 class="fw-medium animated fadeInDownBig"><?php echo $slider_row->text_1; ?></h1>
                                        <?php } ?>

                                        <?php  if($slider_row->text_2!="") { ?>
                                        <h1 class="display-4 fw-semi-bold animated fadeInDownBig delay-1s"><?php echo $slider_row->text_2; ?>
                                        </h1>
                                        <?php } ?>

                                        <?php  if($slider_row->text_2!="") { ?>

                                        <div class="custom-border sh-above">
                                            <div class="line-border"></div>
                                        </div>

                                        <p class="dash line text-white-persist-e fw-regular animated fadeInDownBig delay-2s"><?php echo $slider_row->text_3; ?></p>

                                        <div class="custom-border sh-above">
                                            <div class="line-border"></div>
                                        </div>
                                        <?php } ?>
                                        <?php  if($slider_row->social_status==1) { ?>
                                        <ul class="list-unstyled list-inline social text-white-persist primary-colorh">
                                           
                                        <?php 
                                            foreach ($settings_social->result() as $social_row) {
                                        ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo $social_row->url; ?>" class="hover" target="_blank">
                                                <i class="<?php echo $social_row->icon; ?>"></i>
                                            </a>
                                        </li>
                                        <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </div><!-- end first-page-text-headings -->
                                </div><!-- end first-page-text -->
                            </div><!-- end column -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end meta -->
            </div><!-- end swiper-slide -->

<?php } ?>
            
           
        </div><!-- end swiper-wrapper -->

        <!-- Add Arrows -->
        <div class="swiper-button-next sh-above d-none d-md-block">
            <i class="fa fa-angle-right d-none d-sm-block font-weight-bold text-white"></i>
        </div><!-- end swiper-button-next -->
        <div class="swiper-button-prev sh-above d-none d-md-block">
            <i class="fa fa-angle-left d-none d-sm-block font-weight-bold text-white"></i>
        </div><!-- end swiper-button-prev -->
    </div><!-- end swiper-container -->
    <!-- Swiper Slider Ends-->
    <?php } ?>