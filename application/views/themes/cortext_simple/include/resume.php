<!-- resume Start  -->
    <section class="section-padding resume <?php if($count_module==0) echo 'bg-white'; else echo 'blogs bg-white-e' ?>" id="<?php echo $resume_module->module_file; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading heading-margin">
                        <div class="heading-absolute text-white-c sh-above"><span><?php if($resume_title[0]!="") echo $resume_title[0]; ?></span></div>
                        <h1 class="sh-above2 position-relative"><span class="heading-border primary-color "> 
                            <?php if($resume_title[0]!="") echo $resume_title[0]; ?></span> 
                                <?php 
                                    
                                    for($i=1; $i<count($resume_title); $i++) {
                                        echo $resume_title[$i]." ";
                                    }
                                ?>
                        </h1>
                    </div><!-- end heading -->
                    <p class="text-black-5 para-margin"><?php echo $resume_module->sub_title; ?>
                    </p>
                </div><!-- end column -->
            </div><!-- end row -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs border-0 heading-margin" id="myTab" role="tablist">
                <li class="nav-item w-50 primary-colorh">
                    <a class="nav-link bg-white text-black hover lsp1 shadow active" id="experience-tab"
                        data-toggle="tab" data-target="#experience" role="tab" aria-controls="experience"
                        aria-selected="true">Experience</a>
                </li>
                <li class="nav-item w-50 primary-colorh">
                    <a class="nav-link bg-white text-black hover lsp1 shadow " id="education-tab" data-toggle="tab"
                        data-target="#education" role="tab" aria-controls="education"
                        aria-selected="false">Education</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="container">
                <div class="tab-content">
                    <div class="tab-pane active" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                        
                     <?php foreach($experience_items->result() as $experience_row) { ?>
                        <div class="resume-details text-black-3">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 circle px-0 px-md-2">
                                    <div class="col-md-8 px-0 duration">
                                        <p>
                                            <?php echo date('M Y', strtotime($experience_row->from_date)) ?>  to 
                                            <?php 
                                                if($experience_row->current_date==0)
                                                 echo date('M Y', strtotime($experience_row->to_date));
                                                else 
                                                 echo "Present";
                                            ?>
                                        </p>
                                    </div><!-- end column -->
                                </div><!-- end column -->
                                <div class="col-lg-10 col-md-9 ml-auto resume-box bg-white shadow">
                                    <h4><?php echo stripslashes($experience_row->designation); ?></h4>
                                    <h6 class="mt-md-2 mt-1 mb-md-3 mb-2 primary-color"><?php echo stripslashes($experience_row->company); ?></h6>
                                    <p class="text-black-5"><?php echo stripslashes($experience_row->details); ?></p>
                                </div><!-- end column -->
                            </div><!-- end row -->
                        </div><!-- end resume-details -->
                     <?php }?>

                    </div><!-- end tab-pane -->
                    <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">

                    <?php foreach($education_items->result() as $education_row) { ?>
                        <div class="resume-details text-black-3">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 circle px-0 px-md-2">
                                    <div class="col-md-8 px-0 duration">
                                        <p>
                                          <?php echo date('M Y', strtotime($education_row->from_date)) ?>  to 
                                            <?php 
                                                if($education_row->current_date==0)
                                                 echo date('M Y', strtotime($education_row->to_date));
                                                else 
                                                 echo "Present";
                                            ?>
                                        </p>
                                    </div><!-- end column -->
                                </div><!-- end column -->
                                <div class="col-lg-10 col-md-9 ml-auto resume-box bg-white shadow">
                                    <h4><?php echo stripslashes($education_row->field); ?></h4>
                                    <h6 class="mt-md-2 mt-1 mb-md-3 mb-2 primary-color"><?php echo stripslashes($education_row->school); ?></h6>
                                    <p class="text-black-5"><?php echo stripslashes($education_row->details); ?></p>
                                </div><!-- end column -->
                            </div><!-- end row -->
                        </div><!-- end resume-details -->
                        
                    <?php }?>
                    </div><!-- end tab-pane -->
                </div><!-- end tab-content -->
            </div><!-- end container -->
        </div><!-- end container -->
    </section>
    <!-- resume End  -->