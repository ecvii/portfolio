<div class="tab-pane fade " id="<?php echo $about_module->module_file; ?>" role="tabpanel" aria-labelledby="about-tab">
            <div class="animated bounceInUp">
                <!-- About Start  -->
                <section class="section-padding about" id="<?php echo $about_module->module_file; ?>">
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
                
                <?php if($fact_module->status==1) { ?>
                <!-- Banner Starts  -->
                <?php 
                    if($settings_general->fun_facts_bg!="")
                        $fact_bg = base_url('assets/upload/pics/'.$settings_general->fun_facts_bg);
                    else
                        $fact_bg = base_url('assets/upload/pics/bg.jpg');
                ?>
                <section class="section-padding banner bg-overlay-dark" style="background-image: url('<?php echo $fact_bg; ?>');" id="<?php echo $fact_module->module_file; ?>">
                    <div class="container">
                        <div class="row sh-above2 position-relative text-center">
                            <?php foreach($fact_items->result() as $fact_row) { ?>
                            <div class="col-lg-3 col-sm-6 p-4 p-xl-0">
                                <div class="icon">
                                    <i class="<?php echo $fact_row->icon; ?> fa-3x primary-color"></i>
                                    <h1 class="primary-color my-lg-3 my-2"><?php echo $fact_row->value; ?></h1>
                                    <h4 class="text-white-persist-e"><?php echo stripslashes($fact_row->title); ?></h4>
                                </div><!-- end icon -->
                            </div><!-- end column -->
                            <?php } ?>
                        </div><!-- end row -->
                    </div><!-- end container -->
                </section>
                <!-- Banner Ends  -->
                <?php } ?>
                <?php if($skill_module->status==1) { ?>
                <!-- Skills Start  -->
                <section class="section-padding skills position-relative overflow-hidden" id="<?php echo $skills_module->module_file; ?>">
                    <div class="custom-skills-border sh-above">
                        <div class="line-skills-border line-border1"></div>
                        <div class="line-skills-border line-border2"></div>
                        <div class="line-skills-border line-border3"></div>
                        <div class="line-skills-border line-border4"></div>
                    </div><!-- end custom-skills-border -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mx-auto text-center">
                                <div class="heading heading-margin">
                                    <div class="heading-absolute text-white-c sh-above"><span><?php if($skills_title[0]!="") echo $skills_title[0]; ?></span></div>
                                    <h1 class="sh-above2 position-relative"><span class="heading-border primary-color ">
                                        <?php if($skills_title[0]!="") echo $skills_title[0]; ?></span> 
                                            <?php 
                                                
                                                for($i=1; $i<count($skills_title); $i++) {
                                                    echo $skills_title[$i]." ";
                                                }
                                            ?></h1>
                                </div><!-- end heading -->
                                <p class="text-black-5 para-margin"><?php echo $skills_module->sub_title; ?>
                                </p>
                            </div><!-- end column -->
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-lg-8 col-10 mx-sm-auto mr-auto fw-medium">
                            <?php foreach($skills_items->result() as $skills_row) { ?>
                                <div class="pbar-wrapper">
                                    <div class="progress mt-md-4 mt-sm-3 mt-2 bg-white-c">
                                        <div class="progress-bar bg-primary-color on-bg-color pl-5 pbar1" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo stripslashes($skills_row->level); ?>%"><?php echo stripslashes($skills_row->title); ?></div>
                                    </div><!-- end progress -->
                                    <span class="text-black"><?php echo stripslashes($skills_row->level); ?>%</span>
                                </div><!-- end pbar-wrapper -->
                                
                            <?php } ?> 
                                
                            </div><!-- end column -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </section>
                <!-- Skills End  -->
                <?php } ?>
            </div>
        </div><!-- end tab-pane -->