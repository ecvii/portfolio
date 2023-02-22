
               <!-- Footer Starts  -->
               <footer class="py-5 bg-black">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center text-white">
                                <ul class="list-unstyled list-inline social primary-colorh">
                                <?php 
                                    foreach ($settings_social->result() as $social_row) {
                                ?>
                                    <li class="list-inline-item mb-0"><a href="<?php echo $social_row->url; ?>" class="hover"><i class="<?php echo $social_row->icon; ?>"></i></a>
                                    </li>
                                <?php } ?>
                                </ul>
                                <p class="text-capitalize lsp1"><?php echo $settings_general->footer_top_text; ?></p>
                                <p class="text-capitalize lsp1"><?php echo $settings_general->footer_bottom_text; ?></p>
                            </div><!-- end column -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </footer>
                <!-- Footer Ends  -->
            </div>
        </div><!-- end tab-pane -->
    </div>
    <!--====== Tab-content Ends =====-->

    <!-- Optional JavaScript, Not optional it's need too -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/bootstrap.min4.3.1.js"></script>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/swiper.min.js"></script>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/custom-gallery.js"></script>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/custom-javascript.js"></script>
    
    <?php if($selected_theme->theme_style_selected=='vcard-left') { ?>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/custom-javascript-left.js"></script>
    <?php } else if($selected_theme->theme_style_selected=='vcard-right') { ?>
    
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/custom-javascript-right.js"></script>
    <?php } ?>
    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/particles.js"></script>

    <!-- Custom Particle Backgrounds start -->

    <?php  if($slider_settings->status==1) { ?>    
        <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/particles.js"></script>
        <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/<?php echo $slider_settings->parallax_effects; ?>.js"></script>
    <?php } ?>


      <?php if($settings_script->tawk_status==1) { ?>
 <!--Start of Tawk.to Script-->
    <script type="text/javascript">

    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/<?php echo $settings_script->tawk_id ?>/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();

    </script>
  <!--End of Tawk.to Script-->
  <?php } ?>




    <?php if($settings_script->ga_status==1) { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $settings_script->google_analytics ?>"></script>

    <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '<?php echo $settings_script->google_analytics ?>');
  </script>   
  
    <?php } ?>

    <!-- Page Scripts Ends -->


    <script>
        $(document).ready(function () {
            // Add smooth scrolling to all links
            $("a").on('click', function (event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });

        });
    </script>

</body>

</html>