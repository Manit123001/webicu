<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>CU</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ICareU </b>Service</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

         

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://scontent.cdninstagram.com/t51.2885-19/10809504_311817815689433_665980944_a.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Manit Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="http://comscisau.com/images/home/slide/ssss.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         <!--  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://scontent.cdninstagram.com/t51.2885-19/10809504_311817815689433_665980944_a.jpg" class="img-circle" alt="User Image">
        </div>


        <div class="pull-left info">
          <p>Manit Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>


      </div>


      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>


      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">


        <li class="header">MAIN NAVIGATION</li>


        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> User</span>

            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="users.php"><i class="fa fa-circle-o"></i>View All Users</a></li>
            <li><a href="users.php?source=add_user"><i class="fa fa-circle-o"></i> Add User</a></li>


          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> Departments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="departments.php"><i class="fa fa-circle-o"></i>Departments</a></li>
            <li><a href="departments.php?source=add_department"><i class="fa fa-circle-o"></i> Add Departments</a></li>


          </ul>
        </li>


        <li>
          <a href="types.php">
            <i class="fa fa-th"></i> <span>Categories</span>

          </a>
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> เหตุฉุกเฉิน </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="acidents.php"><i class="fa fa-circle-o"></i>View All Acidents</a></li>
            <li><a href="acidents.php?source=add_acident"><i class="fa fa-circle-o"></i> Add Acident</a></li>


          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> เหตุทั่วไป </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="warnings.php"><i class="fa fa-circle-o"></i>View All Warnings</a></li>
            <li><a href="warnings.php?source=add_warning"><i class="fa fa-circle-o"></i> Add Warning</a></li>


          </ul>
        </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>