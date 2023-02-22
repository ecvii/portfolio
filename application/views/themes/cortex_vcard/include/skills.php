 <!-- Skills Start  -->
    <section class="section-padding skills position-relative overflow-hidden <?php if($count_module==0) echo 'bg-white'; else echo 'blogs bg-white-e' ?>" id="<?php echo $skills_module->module_file; ?>">
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