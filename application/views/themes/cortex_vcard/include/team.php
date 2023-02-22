<div class="tab-pane fade" id="<?php echo $team_module->module_file; ?>" role="tabpanel" aria-labelledby="team-tab">
            <!-- team Starts  -->
            <section class="section-padding team animated bounceInUp" id="<?php echo $team_module->module_file; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                        <div class="heading heading-margin">
                                <div class="heading-absolute text-white-c sh-above"><span><?php if($team_title[0]!="") echo $team_title[0]; ?></span></div>
                                <h1 class="sh-above2 position-relative"><span class="heading-border primary-color-border primary-color">
                                <?php if($team_title[0]!="") echo $team_title[0]; ?></span> 
                                    <?php 
                                        
                                        for($i=1; $i<count($team_title); $i++) {
                                            echo $team_title[$i]." ";
                                        }
                                    ?>
                                </h1>
                            </div><!-- end heading -->
                            <p class="text-black-5 para-margin"><?php echo $team_module->sub_title; ?></p>
                        </div><!-- end column -->
                    </div><!-- end row -->
                    <div class="owl-carousel owl-theme" id="owl-team">
                
            <?php 
                foreach($team_items->result() as $team_row) { 
            
            ?>                
                <div class="item">
                    <div class="team-box primary-border  primary-border-e primary-border-eh">
                        <img src="<?php echo base_url('assets/upload/pics/'.$team_row->pic); ?>" alt="<?php echo stripslashes($team_row->name); ?>" class="img-fluid">
                        <div class="team-text text-black-3">
                            <h4 class="text-uppercase"><?php echo stripslashes($team_row->name); ?></h4>
                            <p class="mt-1 fw-semi-bold"><?php echo stripslashes($team_row->designation); ?></p>
                            <ul class="list-unstyled list-inline team-social text-black primary-colorh">

                                <?php 
                                    if($team_row->facebook!="") {
                                ?>
                                <li class="list-inline-item"><a href="<?php echo $team_row->facebook; ?>" target="_blank"><i class="hover fa fa-facebook"></i></a></li>
                                <?php } ?>
                                <?php 
                                    if($team_row->twitter!="") {
                                ?>
                                <li class="list-inline-item"><a href="<?php echo $team_row->facebook; ?>" target="_blank"><i class="hover fa fa-twitter"></i></a></li>
                                <?php } ?>
                                <?php 
                                    if($team_row->linkedin!="") {
                                ?>
                                <li class="list-inline-item"><a href="<?php echo $team_row->facebook; ?>" target="_blank"><i class="hover fa fa-linkedin"></i></a></li>
                                <?php } ?>
                                <?php 
                                    if($team_row->instagram!="") {
                                ?>
                                <li class="list-inline-item"><a href="<?php echo $team_row->facebook; ?>" target="_blank"><i class="hover fa fa-instagram"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div><!-- end team-text -->
                    </div><!-- end team-box -->
                </div><!-- end item -->
                
            <?php } ?>
               
            </div><!-- end owl-carousel -->
                </div><!-- end container -->
            </section>
            <!-- team Ends  -->
        </div><!-- end tab-pane -->