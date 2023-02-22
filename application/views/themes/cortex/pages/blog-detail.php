<?php 
    if($blogs_detail->pic!="")
    $blog_img = base_url('assets/upload/pics/'.$blogs_detail->pic);
else
    $blog_img = base_url('assets/upload/pics/bg.jpg');

    $category_title = $this->Common_model->single_record('blog_category', 'bc_id = '.$blogs_detail->bc_id, '', '');
?>
<section class="section-padding blog-details bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-content p-0">
                        <div class="img-styled mb-4 px-2 px-sm-0 d-flex">
                            <div class="border-styled primary-border">
                                <img src="<?php echo $blog_img; ?>" alt="<?php echo stripslashes($blogs_detail->title); ?>" class="img-fluid">
                            </div><!-- end border-styled -->
                        </div><!-- end img-styled -->
                        <div class="blog-text ml-sm-1">
                            <h3 class="text-uppercase text-black-5 mb-4"><?php echo stripslashes($blogs_detail->title); ?></h3>

                            <div class="date ml-n1">
                                <div class="custom-border sh-above">
                                    <div class="line-border"></div>
                                </div><!-- end custom-border -->

                                <div class="dash line text-black-7 fw-lite">
                                    <ul class="list-inline my-3 ml-2">
                                        <li class="list-inline-item mr-sm-5">
                                            <p><i class="fa fa-calendar mr-sm-2 mr-1"></i>  <?php echo date('d M Y', strtotime($blogs_detail->create_date)); ?></p>
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

                           <p class="text-black-5 my-4"> <?php echo stripslashes($blogs_detail->details); ?></p>


                        </div><!-- end blog-text -->
                    </div><!-- end blog-content -->
                </div><!-- end column -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


     <!-- Blogger Details Starts-->
     <?php 
        if($about->pic!="") 
            $about_pic = base_url('assets/upload/pics/'.$about->pic);
        else
            $about_pic = base_url('assets/admin/img/image.png');
     ?>
     <section class="blogger bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-8">
                    <img src="<?php echo $about_pic; ?>" alt="<?php echo stripslashes($about->name); ?>" class="img-fluid">
                </div><!-- end column -->
                <div class="col-lg pt-4 pt-lg-0">
                    <div class="blogger-text">
                        <h1 class="fw-semi-bold text-black-5"><?php echo stripslashes($about->name); ?></h1>
                        <h5 class="text-black-5"><?php echo $about->position_type; ?></h5>
                        <p class="text-black-5 mt-3"><?php echo stripslashes($about->details); ?></p>
                        <ul class="list-inline mt-4 mb-0 blogger-icons primary-colorh text-white-persist">

                        <?php 
                            foreach ($settings_social->result() as $social_row) {
                        ?>
                            <li class="list-inline-item"><a href="<?php echo $social_row->url; ?>" class="hover"><i class="<?php echo $social_row->icon; ?> bg-black-9 bg-primary-colorhb"></i></a>
                            </li>
                    <?php } ?>

                        </ul>
                    </div><!-- end blogger-text -->
                </div><!-- end column -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- Blogger Details Ends-->

     <!-- Comments Starts-->
     <section class="comments section-padding pb-0 bg-white">
        <div class="container">
            <h1 class="text-black-5 fw-semi-bold text-uppercase mt-n2">Comments</h1>
            <div class="custom-border sh-above my-sm-5 my-4">
                <div class="line-border"></div>
            </div><!-- end custom-border -->
           
            <?php 
                foreach ($blogs_comments->result() as $comment_row) {
            ?>
            <div class="row">
              
                <div class="col-lg pt-4 pt-lg-0">
                    <div class="comment-text">
                        <h2 class="fw-semi-bold text-black-5"><?php echo $comment_row->name; ?></h2>
                        <h6 class="text-black-5 mt-lg-1"><?php echo date('d M Y h:m:i', strtotime($comment_row->create_date)); ?></h6>
                        <p class="text-black-5 mt-3"><?php echo $comment_row->message; ?></p>

                       
                    </div><!-- end comment-text -->
                </div><!-- end column -->
            </div><!-- end row -->
            <div class="custom-border sh-above my-sm-5 my-4">
                <div class="line-border"></div>
            </div><!-- end custom-border -->
            <?php } ?>
        </div><!-- end container -->
    </section>
    <!-- Comments Ends-->

    <!-- Comment-Form Starts-->
    <section class="section-padding comment-form bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <h1 class="text-black-5 mb-sm-5 mb-3 fw-semi-bold">Leave your Comment</h1>
                    <form name="frm_comments" id="frm_comments" class="needs-validation">
                    <input type="hidden" id="txt_base_url" name="txt_base_url" value="<?php echo base_url(); ?>">
                    <input type="hidden" id="txt_blog_id" name="txt_blog_id" value="<?php echo $blogs_detail->bo_id; ?>">
                    <div id="show_msg"></div> 
                      <div class="form-row">
                            <div class="col-md-6">
                                <input type="text" name="txt_name" id="txt_name" class="form-control  primary-border-e primary-border-eh bg-white-e"
                                    placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="txt_email" id="txt_email" class="form-control  primary-border-e primary-border-eh bg-white-e"
                                    placeholder="Email" required>
                            </div>
                        </div>
                       
                        <textarea class="form-control primary-border-e primary-border-eh bg-white-e" rows="7" name="txt_message" id="txt_message" placeholder="Your comment here" required></textarea>

                        <button class="btn bg-primary-color bg-primary-colorh br0 py-2 btn-block" type="submit">Submit
                            Comment</button>
                    </form>
                    
                </div><!-- end column -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- Comment-Form Ends-->