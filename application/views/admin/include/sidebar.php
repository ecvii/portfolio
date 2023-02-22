  <aside class="main-sidebar sidebar-dark-primary elevation-2 ">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/dashboard'); ?>" class="brand-link navbar-gray">
    <img src="<?php echo base_url(); ?>assets/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
           <span class="brand-text font-weight-bold">CORTEX.</span>     
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            if($user_record->pic!="")
              $user_pic_path = base_url('assets/upload/pics/'.$user_record->pic);
            else
              $user_pic_path = base_url('assets/admin/img/image.png');
          ?>
          <img src="<?php echo $user_pic_path; ?>" class="img-circle elevation-2" alt="<?php echo stripslashes($user_record->name); ?>">
        </div>
        <div class="info">
          <a href="<?php echo base_url('admin/profile/edit_user'); ?>" class="d-block"> <?php echo stripslashes($user_record->name); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-legacy nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link">
              <i class="nav-icon fab fa-dashcube"></i>
              <p>
              Dashboard
               
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview <?php if($module_main == 'settings') echo 'menu-open'; else echo ''; ?>"">
            <a href="#" class="nav-link <?php if($module_main == 'settings') echo 'active'; else echo ''; ?> ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings/general_settings'); ?>" class="nav-link <?php if($module_sub == 'general_settings') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings/module_settings'); ?>" class="nav-link <?php if($module_sub == 'module_settings') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Modules</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings/seo_settings'); ?>" class="nav-link <?php if($module_sub == 'seo_settings') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>SEO </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings/script_settings'); ?>" class="nav-link <?php if($module_sub == 'script_settings') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Embed Scripts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings/social_settings'); ?>" class="nav-link <?php if($module_sub == 'social_settings') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Social Links</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/settings/theme_settings'); ?>" class="nav-link <?php if($module_sub == 'theme_settings') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Themes</p>
                </a>
              </li>
            </ul>
          </li>
        
        <!--  Profile -->
        <li class="nav-item has-treeview <?php if($module_main == 'profile') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'profile') echo 'active'; else echo ''; ?> ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/profile/about'); ?>" class="nav-link <?php if($module_sub == 'about') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>About Me</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/profile/contact'); ?>" class="nav-link <?php if($module_sub == 'contact') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Contact Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/profile/facts'); ?>" class="nav-link <?php if($module_sub == 'facts') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Fun Facts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/profile/cv'); ?>" class="nav-link <?php if($module_sub == 'cv') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Upload CV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/profile/edit_user'); ?>" class="nav-link <?php if($module_sub == 'edit_user') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Edit Admin User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/profile/change_password'); ?>" class="nav-link <?php if($module_sub == 'change_password') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
          </ul>
        </li>

          <!--  Slider -->
          <li class="nav-item has-treeview <?php if($module_main == 'sliders') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'sliders') echo 'active'; else echo ''; ?> ">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Sliders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            <li class="nav-item">
                <a href="<?php echo base_url('admin/sliders/settings'); ?>" class="nav-link <?php if($module_sub == 'settings') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Parallax Settings</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/sliders/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/sliders/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
          </ul>
        </li>
         <!--  Experence -->
         <li class="nav-item has-treeview <?php if($module_main == 'experience') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'experience') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fas fa-user-md"></i> 
              <p>
                Experience
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/experience/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/experience/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
          </ul>
        </li>

          <!--  Education -->
          <li class="nav-item has-treeview <?php if($module_main == 'education') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'education') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Education
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/education/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/education/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
          </ul>
        </li>

         <!--  Education -->
         <li class="nav-item has-treeview <?php if($module_main == 'skills') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'skills') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fas fa-code-branch"></i>
              <p>
                Skills
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/skills/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/skills/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
          </ul>
        </li>

          <!--  Services -->
          <li class="nav-item has-treeview <?php if($module_main == 'services') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'services') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fab fa-servicestack"></i>
              <p>
                Services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                  <a href="<?php echo base_url('admin/services/settings'); ?>" class="nav-link <?php if($module_sub == 'settings') echo 'active'; else echo ''; ?>">
                    <i class="fas fa-arrow-right nav-icon"></i>
                    <p>Settings</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/services/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/services/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
          </ul>
        </li>

         <!--  Portfolio -->
         <li class="nav-item has-treeview <?php if($module_main == 'portfolio') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'portfolio') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Portfolio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                  <a href="<?php echo base_url('admin/portfolio/settings'); ?>" class="nav-link <?php if($module_sub == 'settings') echo 'active'; else echo ''; ?>">
                    <i class="fas fa-arrow-right nav-icon"></i>
                    <p>Settings</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/portfolio/category'); ?>" class="nav-link <?php if($module_sub == 'category') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/portfolio/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/portfolio/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
          </ul>
        </li>

         <!--  Blogs -->
         <li class="nav-item has-treeview <?php if($module_main == 'blogs') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'blogs') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fab fa-blogger-b"></i>
              <p>
              Blogs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="<?php echo base_url('admin/blogs/settings'); ?>" class="nav-link <?php if($module_sub == 'settings') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Settings</p>
                </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('admin/blogs/category'); ?>" class="nav-link <?php if($module_sub == 'category') echo 'active'; else echo ''; ?>">
                <i class="fas fa-arrow-right nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/blogs/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                <i class="fas fa-arrow-right nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/blogs/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                <i class="fas fa-arrow-right nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>

          <!--  Team -->
          <li class="nav-item has-treeview <?php if($module_main == 'team') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'team') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fas fa-users"></i>
              <p>
              Team
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">   
              
            <li class="nav-item">
                  <a href="<?php echo base_url('admin/team/settings'); ?>" class="nav-link <?php if($module_sub == 'settings') echo 'active'; else echo ''; ?>">
                    <i class="fas fa-arrow-right nav-icon"></i>
                    <p>Settings</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/team/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/team/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
          </ul>
        </li>

          <!--  Testimonials -->
          <li class="nav-item has-treeview <?php if($module_main == 'testimonials') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'testimonials') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fas fa-comments"></i>
              <p>
              Testimonials
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">      
              
            <li class="nav-item">
                  <a href="<?php echo base_url('admin/testimonials/settings'); ?>" class="nav-link <?php if($module_sub == 'settings') echo 'active'; else echo ''; ?>">
                    <i class="fas fa-arrow-right nav-icon"></i>
                    <p>Settings</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/testimonials/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/testimonials/add'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
          </ul>
        </li>

         <!--  Pricing Tables -->
         <li class="nav-item has-treeview <?php if($module_main == 'pricing') echo 'menu-open'; else echo ''; ?>">
            <a href="#" class="nav-link <?php if($module_main == 'pricing') echo 'active'; else echo ''; ?> ">
            <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
              Pricing Tables
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">    

              <li class="nav-item">
                  <a href="<?php echo base_url('admin/pricing/settings'); ?>" class="nav-link <?php if($module_sub == 'settings') echo 'active'; else echo ''; ?>">
                    <i class="fas fa-arrow-right nav-icon"></i>
                    <p>Settings</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('admin/pricing/category'); ?>" class="nav-link <?php if($module_sub == 'category') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Pricing Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/pricing/list'); ?>" class="nav-link <?php if($module_sub == 'list') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/pricing/list'); ?>" class="nav-link <?php if($module_sub == 'add') echo 'active'; else echo ''; ?>">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
          </ul>
        </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>