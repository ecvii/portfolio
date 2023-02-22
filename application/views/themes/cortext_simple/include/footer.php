
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
                    <h3 class="mb-2"><?php echo $settings_general->footer_top_text; ?></h3>
                    <p class="text-capitalize lsp1"><?php echo $settings_general->footer_bottom_text; ?></p>
                    <p class="text-capitalize lsp1">Developed by <a href="http://www.kiswa.net" target="_blank">Kiswa Solutions</a></p>
                </div><!-- end column -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer>
    <!-- Footer Ends  -->


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

   

    <!-- Custom Particle Backgrounds start -->

    <?php  if($slider_settings->status==1) { ?>    
        <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/particles.js"></script>
        <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/<?php echo $slider_settings->parallax_effects; ?>.js"></script>
    <?php } ?>

    <!-- Custom Particle Backgrounds End -->

    <script src="<?php echo base_url('assets/themes/'.$selected_theme->folder_name); ?>/js/custom-javascript.js"></script>
    <script src="<?php echo base_url('assets/themes/js/jquery.validate.js'); ?>"></script>
    <script src="<?php echo base_url('assets/themes/js/custom-validation.js'); ?>"></script>

    <?php if ($this->uri->segment(1)=='index.html' || $this->uri->segment(1)=='') { ?>
    <script src="<?php echo base_url('assets/themes/js/custom-scroll.js'); ?>"></script>
    <?php } ?>
    <!-- Page Scripts Ends -->


    
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

   
</body>

</html>