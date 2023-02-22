<div class="tab-pane fade bg-white" id="<?php echo $contact_module->module_file; ?>" role="tabpanel" aria-labelledby="contact-tab">
            <div class="animated bounceInUp">
                <!-- Contact Starts  -->
                <section class="section-padding contact" id="<?php echo $contact_module->module_file; ?>">
                    <div class="container">
                    <div class="row">
                <div class="col-lg-6 col-11 mx-auto">
                    <div class="contact-info mb-4 mb-md-0">
                        <h3 class="heading-margin pb-1 text-center text-sm-left"><?php echo $contact_module->sub_title; ?></h3>
                        <div class="row my-3 ml-0">
                            <div class="col-sm-auto center-responsive">
                                <div class="img-styled ml-0">
                                    <div class="border-styled primary-border">
                                        <div class="bg-white-c style">
                                            <div class="icon flex-centering">
                                                <i class="fa fa-phone fa-2x"></i>
                                            </div><!-- end icon -->
                                        </div><!-- end bg-white-e -->
                                    </div><!-- end border-styled -->
                                </div><!-- end img-styled -->
                            </div><!-- end column -->
                            <div class="col flex-centeringv text-black-7 center-responsive">
                                <div class="text mb-2 ml-sm-3">
                                    <h5><?php echo stripslashes($profile_contact->phone_1); ?>, <?php echo stripslashes($profile_contact->phone_2); ?></h5>
                                </div><!-- end text -->
                            </div><!-- end column -->
                        </div><!-- end row -->
                        <div class="row my-3 ml-0">
                            <div class="col-sm-auto center-responsive">
                                <div class="img-styled ml-0">
                                    <div class="border-styled primary-border">
                                        <div class="bg-white-c style">
                                            <div class="icon flex-centering">
                                                <i class="fa fa-envelope fa-2x"></i>
                                            </div><!-- end icon -->
                                        </div><!-- end bg-white-e -->
                                    </div><!-- end border-styled -->
                                </div><!-- end img-styled -->
                            </div><!-- end column -->
                            <div class="col flex-centeringv text-black-7 center-responsive">
                                <div class="text mb-2 ml-sm-3">
                                    <h5><?php echo stripslashes($profile_contact->email_1); ?>, <?php echo stripslashes($profile_contact->email_2); ?></h5>
                                </div><!-- end text -->
                            </div><!-- end column -->
                        </div><!-- end row -->
                        <div class="row my-3 ml-0">
                            <div class="col-sm-auto center-responsive">
                                <div class="img-styled ml-0">
                                    <div class="border-styled primary-border">
                                        <div class="bg-white-c style">
                                            <div class="icon flex-centering">
                                                <i class="fa fa-home fa-2x"></i>
                                            </div><!-- end icon -->
                                        </div><!-- end bg-white-e -->
                                    </div><!-- end border-styled -->
                                </div><!-- end img-styled -->
                            </div><!-- end column -->
                            <div class="col flex-centeringv text-black-7 center-responsive">
                                <div class="text mb-2 ml-sm-3">
                                    <h5><?php echo stripslashes($profile_contact->address); ?></h5>
                                </div><!-- end text -->
                            </div><!-- end column -->
                        </div><!-- end row -->
                        <div class="row mt-3 ml-0">
                            <div class="col-sm-auto center-responsive">
                                <div class="img-styled ml-0">
                                    <div class="border-styled primary-border">
                                        <div class="bg-white-c style">
                                            <div class="icon flex-centering">
                                                <i class="fa fa-globe fa-2x"></i>
                                            </div><!-- end icon -->
                                        </div><!-- end bg-white-e -->
                                    </div><!-- end border-styled -->
                                </div><!-- end img-styled -->
                            </div><!-- end column -->
                            <div class="col flex-centeringv text-black-7 center-responsive">
                                <div class="text mb-2 ml-sm-3">
                                    <h5><?php echo stripslashes($profile_contact->website); ?></h5>
                                </div><!-- end text -->
                            </div><!-- end column -->
                        </div><!-- end row -->
                    </div><!-- end contact-info -->
                </div><!-- end column -->

                <div class="col-lg-6 col-11 mx-auto mt-5 mt-lg-0 text-center text-sm-left">
                    <div class="row ">
                        <div class="col">
                            <div class="heading heading-margin">
                                <div class="heading-absolute text-white-c sh-above"><span><?php if($contact_title[0]!="") echo $contact_title[0]; ?></span></div>
                                <h1 class="sh-above2 position-relative">
                                    <span class="heading-border primary-color"> 
                                    <?php if($contact_title[0]!="") echo $contact_title[0]; ?>
                                </span> 
                                <?php 
                                    
                                    for($i=1; $i<count($contact_title); $i++) {
                                        echo $contact_title[$i]." ";
                                    }
                                ?>
                            </h1>
                            </div><!-- end heading -->
                            <h3 class="text-black-5 text-capitalize about-margin freelance">
                            <?php if($about->freelance_avail==1) { ?>
                                I am available for Freelance
                            <?php } ?>
                            </h3>
                            <div id="show_msg"></div>    
                        </div><!-- end column -->
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col">
                            <form name="frm_contact" id="frm_contact" class="needs-validation">
                                <input type="hidden" id="txt_base_url" value="<?php echo base_url(); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control mt-0 primary-border-e primary-border-eh bg-white-e"   id="txt_name" name="txt_name" placeholder="Full Name" required>
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <input type="email" class="form-control primary-border-e primary-border-eh bg-white-e"  id="txt_email" name="txt_email" placeholder="Email" required>
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <textarea class="form-control primary-border-e primary-border-eh bg-white-e" id="txt_message" name="txt_message" rows="8" placeholder="Message" required></textarea>
                                </div><!-- end form-group -->
                                <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-block bg-primary-color bg-primary-colorh on-bg-color">Send
                                    Message</button>
                            </form>
                        </div><!-- end column -->
                    </div><!-- end row -->
                </div><!-- end column -->
            </div><!-- end row -->
                    </div><!-- end container -->
                </section>
                <!-- Contact Ends  -->