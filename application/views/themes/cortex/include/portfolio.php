 <!-- Portfolio Starts  -->
    <section class="section-padding portfolio position-relative overflow-hidden <?php if($count_module==0) echo 'bg-white'; else echo 'blogs bg-white-e' ?>" id="<?php echo $portfolio_module->module_file; ?>">
        <div class="custom-skills-border">
            <div class="line-skills-border line-border1"></div>
            <div class="line-skills-border line-border2"></div>
            <div class="line-skills-border line-border3"></div>
            <div class="line-skills-border line-border4"></div>
        </div><!-- end custom-skills-border -->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading heading-margin">
                        <div class="heading-absolute text-white-c sh-above"><span><?php if($portfolio_title[0]!="") echo $portfolio_title[0]; ?></span></span></div>
                        <h1 class="sh-above2 position-relative"><span class="heading-border primary-color ">
                        <?php if($portfolio_title[0]!="") echo $portfolio_title[0]; ?></span> 
                                <?php 
                                    
                                    for($i=1; $i<count($portfolio_title); $i++) {
                                        echo $portfolio_title[$i]." ";
                                    }
                                ?>
                        </h1>
                        </h1>
                    </div><!-- end heading -->
                    <p class="text-black-5 para-margin"><?php echo $portfolio_module->module_file; ?>
                    </p>
                </div><!-- end column -->
            </div><!-- end row -->

            <div id="photo-gallery" class="photo-gallery">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="filter-buttons" class="text-center primary-colorh heading-margin">

                               
                                <button class="py-0 btn filter-button hover right-border text-black-5 active"
                                    data-filter="all">
                                    <span></span>All
                                </button>
                               
                                <?php foreach($portfolio_category->result() as $category_row) { ?>
                                <button class="py-0 btn filter-button hover right-border text-black-5"
                                    data-filter="<?php echo $category_row->pc_id; ?>">
                                    <span></span><?php echo stripslashes($category_row->title); ?>
                                </button>
                                <?php } ?>
                            </div><!-- end filter-buttons -->

                            <div class="row" id="casual">
                                <div class="col">
                                    <div class="card-columns">
                                    
                                    <?php 
                                        foreach($portfolio_items->result() as $portfolio_row) { 
                                        $category_title = $this->Common_model->single_record('portfolio_category', 'pc_id = '.$portfolio_row->pc_id, '', '');
                                    ?>
                                        <div class="card border-0 filter all <?php echo $portfolio_row->pc_id;  ?>">
                                            <img src="<?php echo base_url('assets/upload/pics/'.$portfolio_row->pic); ?>" alt="gallery-image" class="img-fluid">
                                            <div class="card-meta flex-centering text-center">
                                                <div class="meta-texts sh-above text-white-persist fw-light">
                                                    <h3 class="fw-semi-bold primary-color"><?php echo stripslashes($portfolio_row->title); ?></h3>
                                                    <h6 class="mt-2 mb-3"><?php echo $category_title->title; ?></h6>
                                                    <a href="<?php echo base_url('assets/upload/pics/'.$portfolio_row->pic); ?>" title="<?php echo $portfolio_row->title; ?>"
                                                        class="with-caption image-link"><span><i
                                                                class="fa fa-plus"></i></span></a>
                                                </div><!-- end meta-texts -->
                                            </div><!-- end card-meta -->
                                        </div><!-- end card -->
                                    <?php } ?>
                                        
                                    </div><!-- end card-columns -->
                                </div><!-- end column -->
                            </div><!-- end row -->
                        </div><!-- end column -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end photo-gallery -->
        </div><!-- end container -->
    </section>
    <!-- Portfolio Ends  -->