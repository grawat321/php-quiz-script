
<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><img src="" class="img-responsive" alt="Logo" style="max-height: 100%;"> <span></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">

         <img src="" alt="User" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>User</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">
                  <li><a href="<?php echo site_url();?>/Home"><i class="fa fa-tachometer"></i> &nbsp; Dashboard </a></li>

		<li><a><i class="fa fa-cubes"></i> &nbsp; Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" <?php if($this->uri->segment(1)=='Category'){?>style="display: block;"<?php } ?>>
                      <li><a href="<?php echo site_url();?>/Category/add">Add Category</a></li>
                      <li><a href="<?php echo site_url();?>/Category/view">View Category</a></li>
                    </ul>
                  </li>

		  <li><a><i class="fa fa-tasks"></i> &nbsp; Sets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" <?php if($this->uri->segment(1)=='Sets'){?>style="display: block;"<?php } ?>>
                      <li><a href="<?php echo site_url();?>/Sets/add">Add Set</a></li>
                      <li><a href="<?php echo site_url();?>/Sets/view">View Sets</a></li>
                    </ul>
                  </li>

		  <li><a><i class="fa fa-question"></i> &nbsp; Questions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" <?php if($this->uri->segment(1)=='Questions'){?>style="display: block;"<?php } ?>>
                      <li><a href="<?php echo site_url();?>/Questions/add">Add Question</a></li>
                      <li><a href="<?php echo site_url();?>/Questions/view">View Questions</a></li>
                    </ul>
                  </li>

                  <li><a href="<?php echo site_url();?>/Results/view"><i class="fa fa-newspaper-o"></i> &nbsp; Results </a></li>

                  <li><a href="<?php echo site_url();?>/Settings/change_password"><i class="fa fa-wrench"></i> &nbsp; Settings </a></li>

		  <li><a href="<?php echo site_url();?>/User/logout"><i class="fa fa-sign-out"></i> &nbsp; Logout </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

           
          </div>
        </div>

	 <!-- top navigation -->
	<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="" alt="User">User
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#"> Profile</a></li>
                    <li><a href="#"> Settings</a></li>
                    <li><a href="#" target="_blank">Help</a></li>
                    <li><a href="<?php echo site_url();?>/User/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

