<!-- About Start  -->
    <section class="section-padding about <?php if($count_module==0) echo 'bg-white'; else echo 'blogs bg-white-e' ?>" id="<?php echo $about_module->module_file; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-auto flex-centering mb-5 mb-lg-0">
                    <div class="img-styled">
                        <div class="border-styled primary-border">
                        <?php 
                            if($about->pic!="") 
                                $about_pic = base_url('assets/upload/pics/'.$about->pic);
                            else
                                $about_pic = base_url('assets/admin/img/image.png');
                         ?>
                            <img src="<?php echo $about_pic; ?>" alt="<?php echo $about->name; ?>" class="img-fluid">
                        </div><!-- end border-styled -->
                    </div><!-- end img-styled -->
                </div><!-- end column -->
                <div class="col-lg-8 flex-centering">
                    <div class="about-text">
                        <div class="heading heading-margin">
                            <div class="heading-absolute text-white-c sh-above"><span><?php if($about_title[0]!="") echo $about_title[0]; ?></span></div>
                            <h1 class="sh-above2 position-relative"><span
                                    class="heading-border primary-color">
                                    <?php if($about_title[0]!="") echo $about_title[0]; ?></span> 
                                        <?php 
                                            for($i=1; $i<count($about_title); $i++) {
                                                echo $about_title[$i]." ";
                                            }
                                        ?>
                                    </h1>
                        </div><!-- end heading -->
                        <h4 class="text-black-5 fw-semi-bold about-margin"><?php echo stripslashes($about->title); ?> </h4>
                        <p class="text-black-5 about-margin"><?php echo stripslashes($about->details); ?>
                        
                        </p>
                        <div class="pt-3">
                            <table class="table-responsive">
                                <?php if($about->name!="") { ?>
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td><?php echo $about->name; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if($about->age!="") { ?>
                                <tr>
                                    <td><strong>Age:</strong></td>
                                    <td><?php echo $about->age; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if($about->residence!="") { ?>
                                <tr>
                                    <td><strong>Residence:</strong></td>
                                    <td><?php echo $about->residence; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if($about->position_type!="") { ?>
                                <tr>
                                    <td><strong>Position:</strong></td>
                                    <td><?php echo $about->position_type; ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="about-btns pt-5">
                            <?php if($about_cv->file_name!="") { ?>
                            <a href="<?php echo base_url('assets/upload/cv/'.$about_cv->file_name); ?>"
                            class="btn on-bg-color bg-primary-color bg-primary-colorh fw-semi-bold br0" target="_blank">Download PDS</a>
                            <?php } ?>
                            <?php if($about->freelance_avail==1) { ?>
                            <a href="#contact"
                            class="btn on-bg-color bg-primary-color bg-primary-colorh fw-semi-bold br0 ml-2">Hire
                            me</a>
                            <?php } ?>
                        </div><!-- end about-btns -->
                    </div><!-- end about-text -->
                </div><!-- end column -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- About End  -->