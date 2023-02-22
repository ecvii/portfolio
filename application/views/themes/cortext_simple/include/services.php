<!-- Services Start  -->
    <section class="section-padding services <?php if($count_module==0) echo 'bg-white'; else echo 'blogs bg-white-e' ?>" id="<?php echo $services_module->module_file; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading heading-margin">
                        <div class="heading-absolute text-white-c sh-above"><span><?php if($services_title[0]!="") echo $services_title[0]; ?></span></div>
                        <h1 class="sh-above2 position-relative"><span class="heading-border primary-color">
                        
                        <?php if($services_title[0]!="") echo $services_title[0]; ?></span> 
                            <?php 
                                
                                for($i=1; $i<count($services_title); $i++) {
                                    echo $services_title[$i]." ";
                                }
                            ?>
                        </h1>
                    </div><!-- end heading -->
                    <p class="text-black-5 para-margin">
                        <?php echo $services_module->sub_title; ?>
                    </p>
                </div><!-- end column -->
            </div><!-- end row -->
            <div class="row">
            <?php foreach($services_items->result() as $services_row) { ?>
                <div class="col-xl-4 col-md-6 my-3">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div class="box primary-border-e primary-border-eh">
                                <div class="box-bg bg-primary-colorh bg-white-e box-left-right on-bg-color on-bg-colorh">

                                    <h1><i class="<?php echo stripslashes($services_row->icon); ?>"></i></h1>
                                    <h4 class="my-3 fw-semi-bold"><?php echo stripslashes($services_row->title); ?></h4>
                                    <p class="col-xl-12 col-md-8 col-sm-10 mx-auto px-0">
                                        <?php 
                                           
                                            echo stripslashes(substr($services_row->details,0,248));
                                            
                                            if(strlen($services_row->details)>248) {
                                        ?>

                                        <button class="" type="button" data-toggle="collapse" data-target="#readmore<?php echo $services_row->se_id ?>" aria-expanded="false" aria-controls="readmore<?php echo $services_row->se_id ?>">
                                           read more ..
                                        </button>
                                        
                                        <span class="collapse" id="readmore<?php echo $services_row->se_id ?>">
                                                <?php echo stripslashes(substr($services_row->details,248,strlen($services_row->details))); ?>
                                        </span>
                                        <?php 
                                            }
                                        ?>
                                    </p>

                                </div><!-- end box-bg -->
                            </div><!-- end box -->
                        </div><!-- end column -->
                        <!-- end box -->
                    </div><!-- end column -->
                </div><!-- end row -->
            <?php } ?>
                </div><!-- end column -->
                <!-- end column -->
                <!-- end column -->
                    </div><!-- end row -->
                </div><!-- end column -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- Services End  -->