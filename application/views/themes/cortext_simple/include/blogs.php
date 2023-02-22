 <!-- Blogs Starts  --> 
    <section class="section-padding blogs <?php if($count_module==0) echo 'bg-white'; else echo 'blogs bg-white-e' ?>" id="<?php echo $blogs_module->module_file; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
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
                    <p class="text-black-5 para-margin"><?php echo $blogs_module->module_file; ?>
                    </p>
                </div><!-- end column -->
            </div><!-- end row -->
            <div class="row">

            <?php 
                foreach($blogs_items->result() as $blogs_row) { 

                    if($blogs_row->pic!="")
                        $blog_img = base_url('assets/upload/pics/'.$blogs_row->pic);
                    else
                        $blog_img = base_url('assets/upload/pics/bg.jpg');
                    
                    $comments = $this->Common_model->count_records('blog_comments', 'bo_id = '.$blogs_row->bo_id);                    
            ?>
                <div class="col-4 ">
                    <div class="blog-block">
                        <img src="<?php echo $blog_img; ?>" alt="<?php echo stripslashes($blogs_row->title); ?>" class="img-fluid">
                        <div class="blog-text mt-3 primary-border-e primary-border-eh">

                            <ul class="list-inline date text-black-5">
                                <li class="list-inline-item right-border pl-0">
                                    <p>By: <?php echo $about->name; ?></p>
                                </li>
                                <li class="list-inline-item right-border">
                                    <p><?php echo date('d M Y', strtotime($blogs_row->create_date)); ?></p>
                                </li>
                                <li class="list-inline-item right-border border-unset">
                                    <p><?php echo $comments; ?> Comments</p>
                                </li>
                            </ul>
                            <h6 class="my-3"><?php echo stripslashes($blogs_row->title); ?></h6>
                            <p class="text-black-5"><?php echo substr(stripslashes($blogs_row->title),0,100); ?></p>
                            <a href="<?php echo base_url('blogs-list/'.$blogs_row->bo_id); ?>" class="btn bg-primary-color on-bg-color bg-primary-borderh br0 mt-4 px-3">Read
                                More</a>
                        </div><!-- end blog-text -->
                    </div><!-- end blog-block -->
                </div><!-- end column -->
            <?php } ?>
            </div><!-- end row -->

            <div class="row">
               <div class="col-12 mt-lg-5 text-center ">
               <a href="<?php echo base_url('blogs-list/'); ?>" class="btn bg-primary-color on-bg-color bg-primary-borderh btn-flat br0 mt-4 px-3">View All</a>
               </div>
            </div>
        </div><!-- end container -->
    </section>
    <!-- Blogs Ends  -->