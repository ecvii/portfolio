<div class="tab-content wrapper bg-white-e">
        <!-- Blog Starts-->
        <section class="section-padding blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-left">
                    <div class="heading heading-margin">
                            <div class="heading-absolute text-white-c sh-above"><span><?php if($blogs_title[0]!="") echo $blogs_title[0]; ?></span></div>
                            <h1 class="sh-above2 position-relative">
                            <span class="heading-border primary-color-border primary-color">
                                <?php if($blogs_title[0]!="") echo $blogs_title[0]; ?>
                            </span> 
                                <?php 
                                    
                                    for($i=1; $i<count($blogs_title); $i++) {
                                        echo $blogs_title[$i]." ";
                                    }
                                ?>
                            </h1>
                        </div><!-- end heading -->
                    </div><!-- end column -->
                </div><!-- end row -->
                <div class="row">
                <div class="col-sm-12 mx-auto">
                <?php 
                    foreach($blogs_items->result() as $blogs_row) { 

                        if($blogs_row->pic!="")
                            $blog_img = base_url('assets/upload/pics/'.$blogs_row->pic);
                        else
                            $blog_img = base_url('assets/upload/pics/bg.jpg');
                    
                            $category_title = $this->Common_model->single_record('blog_category', 'bc_id = '.$blogs_row->bc_id, '', '');
                ?>
                    <div class="blog-content pb-0">
                        <div class="img-styled mb-4 px-2 px-sm-0 d-flex">
                            <div class="border-styled primary-border">
                                <img src="<?php echo $blog_img; ?>" alt="<?php echo stripslashes($blogs_row->title); ?>" class="img-fluid">
                            </div><!-- end border-styled -->
                        </div><!-- end img-styled -->
                        <div class="blog-text ml-sm-1">
                            <h3 class="text-uppercase text-black-5 mb-sm-4 mb-3"><?php echo stripslashes($blogs_row->title); ?></h3>

                            <div class="date ml-n1">
                                <div class="custom-border sh-above">
                                    <div class="line-border"></div>
                                </div><!-- end custom-border -->

                                <div class="dash line text-black-7 fw-lite">
                                    <ul class="list-inline my-md-3 my-2 ml-2">
                                        <li class="list-inline-item mr-sm-5">
                                            <p><i class="fa fa-calendar mr-sm-2 mr-1"></i> <?php echo date('d M Y', strtotime($blogs_row->create_date)); ?></p>
                                        </li>
                                        <li class="list-inline-item mr-sm-5">
                                            <p><i class="fa fa-pencil mr-sm-2 mr-1"></i> <?php echo $about->name; ?></p>
                                        </li>
                                        <li class="list-inline-item mr-sm-5">
                                            <p><i class="fa fa-folder mr-sm-2 mr-1"></i> <a href="<?php echo base_url('blogs-list/category/'.$category_title->bc_id); ?>"><?php echo stripslashes($category_title->title); ?></a></p>
                                        </li>
                                    </ul>
                                </div><!-- end dash -->

                                <div class="custom-border sh-above">
                                    <div class="line-border"></div>
                                </div><!-- end custom-border -->
                            </div><!-- end date -->

                            <p class="text-black-5 my-sm-4 my-3"><?php echo substr(stripslashes($blogs_row->details),0,400); ?>
                            </p>

                            <a href="<?php echo base_url('blogs-list/'.$blogs_row->bo_id); ?>" class="btn bg-gray bg-primary-colorhb px-5 text-uppercase border-0 br0">Read
                                More</a>
                        </div><!-- end blog-text -->
                    </div><!-- end blog-content -->
                    <?php } ?>
                </div><!-- end column -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- Blog Ends-->
    </div>