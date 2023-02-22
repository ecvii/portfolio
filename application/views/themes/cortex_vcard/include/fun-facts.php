<!-- Banner Starts  -->
    <?php 
        if($settings_general->fun_facts_bg!="")
            $fact_bg = base_url('assets/upload/pics/'.$settings_general->fun_facts_bg);
        else
            $fact_bg = base_url('assets/upload/pics/bg.jpg');
    ?>
    <section class="section-padding banner bg-overlay-dark" style="background-image: url('<?php echo $fact_bg; ?>');" id="<?php echo $fact_module->module_file; ?>">
        <div class="container">
            <div class="row sh-above2 position-relative text-center">
                <?php foreach($fact_items->result() as $fact_row) { ?>
                <div class="col-lg-3 col-sm-6 p-4 p-xl-0">
                    <div class="icon">
                        <i class="<?php echo $fact_row->icon; ?> fa-3x primary-color"></i>
                        <h1 class="primary-color my-lg-3 my-2"><?php echo $fact_row->value; ?></h1>
                        <h4 class="text-white-persist-e"><?php echo stripslashes($fact_row->title); ?></h4>
                    </div><!-- end icon -->
                </div><!-- end column -->
                <?php } ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- Banner Ends  -->