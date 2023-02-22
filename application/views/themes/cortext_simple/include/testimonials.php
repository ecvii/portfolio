<!-- Testimonials Starts  -->
    <?php 
        if($testimonials_settings->inner_bg!="")
            $testimonials_bg = base_url('assets/upload/pics/'.$testimonials_settings->inner_bg);
        else
            $testimonials_bg = base_url('assets/upload/pics/bg.jpg');
    ?>
<section class="section-padding testimonials bg-overlay-dark" style="background-image: url('<?php echo $testimonials_bg; ?>');" id="<?php echo $testimonials_module->module_file; ?>">
        <div class="container sh-above text-white-persist text-center position-relative">
            <div class="row">
                <div class="col-12 px-xl-2 px-sm-0">
                    <div class="owl-carousel owl-theme" id="owl-tst">
                        <!-- end item -->
                        <?php 
                            foreach($testimonials_items->result() as $testimonials_row) { 
                            
                            if($testimonials_row->pic!="")
                                $testi_image = base_url('assets/upload/pics/'.$testimonials_row->pic);
                            else
                                $testi_image = base_url('assets/upload/pics/bg.jpg');
                        ?>
                        <div class="item">
                            <div class="tst-content">
                                <i class="fa fa-quote-right fa-5x primary-color"></i>
                                <p class="col-xl-8 col-lg-10 col-md-12 px-0 mx-auto mt-4">
                                    <?php echo stripslashes($testimonials_row->details); ?>
                                
                                </p>

                                <div class="row my-5">
                                    <div class="col-auto mx-auto">
                                        <div class="img-styled">
                                            <div class="border-styled primary-border">
                                                <img src="<?php echo $testi_image; ?>" alt="<?php echo stripslashes($testimonials_row->name); ?>"
                                                    class="img-fluid">
                                            </div><!-- end border-styled -->
                                        </div><!-- end img-styled -->
                                    </div><!-- end column -->
                                </div><!-- end row -->
                                <h2 class="mt-4 fw-semi-bold"><?php echo stripslashes($testimonials_row->name); ?></h2>
                                <p><?php echo stripslashes($testimonials_row->designation); ?>, <?php echo stripslashes($testimonials_row->company); ?></p>
                            </div><!-- end tst-content -->
                        </div><!-- end item -->
                        <?php } ?>
                    </div><!-- end owl-carousel -->
                </div><!-- end column -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- Testimonials Ends  -->