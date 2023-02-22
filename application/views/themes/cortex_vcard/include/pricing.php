<div class="tab-pane fade" id="<?php echo $pricing_module->module_file; ?>" role="tabpanel" aria-labelledby="pricing-tab">
            <!-- pricing Starts  -->
            <section class="section-padding pricing animated bounceInUp" id="<?php echo $pricing_module->module_file; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                        <div class="heading heading-margin">
                            <div class="heading-absolute text-white-c sh-above"><span><?php if($pricing_title[0]!="") echo $pricing_title[0]; ?></span></div>
                            <h1 class="sh-above2 position-relative">
                                <span class="heading-border primary-color-border primary-color">                                
                                <?php if($pricing_title[0]!="") echo $pricing_title[0]; ?>
                                </span> 
                                <?php 
                                    
                                    for($i=1; $i<count($pricing_title); $i++) {
                                        echo $pricing_title[$i]." ";
                                    }
                                ?>
                            </h1>
                        </div><!-- end heading -->
                        <p class="text-black-5 para-margin"><?php echo $pricing_module->sub_title; ?></p>
                        </div><!-- end column -->
                    </div><!-- end row -->
                    <div class="row">
               
            <?php 
                foreach($pricing_category->result() as $cat_row) { 
                    
                    $pricing_items = $this->Common_model->multiple_record('pricing_features', 'pc_id ='.$cat_row->pc_id .' and status = 1', 'sort_order asc', '');
            ?>
                <div class="col-lg col-md-6 col-sm-8 col-12 mx-auto mx-md-0 mt-4 mt-lg-0">
                    <div class="pricing-box text-center primary-border-e primary-border-eh">
                        <div class="price bg-dark">
                            <div class="plan text-white-e">
                                <h4><?php echo stripslashes($cat_row->title); ?></h4>
                            </div><!-- end plan -->
                            <h1 class="display-4 fw-semi-bold my-1 primary-color"><?php echo stripslashes($cat_row->price); ?></h1>
                            <h6 class="fw-regular text-white-e"><?php echo stripslashes($cat_row->payment_type); ?></h6>
                        </div><!-- end price -->
                        <ul class="list-unstyled pricing-list my-4">
                        <?php  foreach($pricing_items->result() as $price_row) {  ?>
                            <li>
                                <p><?php echo stripslashes($price_row->title); ?></p>
                            </li>
                        <?php } ?>   
                        </ul>

                        <?php if($cat_row->order_link!="") { ?>
                        <a href="<?php echo stripslashes($cat_row->order_link); ?>" class="btn bg-primary-color on-bg-color bg-primary-borderh br0 mb-4 px-5">Buy
                            Now</a>
                        <?php } ?>
                    </div><!-- end pricing-box -->
                </div><!-- end column -->
            <?php } ?>

            </div><!-- end row -->
                </div><!-- end container -->
            </section>
            <!-- pricing Ends  -->
        </div><!-- end tab-pane -->