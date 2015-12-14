      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

         <?php if($_SERVER['REQUEST_URI'] == '/res/admin.php'){      ?>
	         <li class="active">
              <a href="admin.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
             </li>
         <?php }else{ ?>
             <li>
              <a href="admin.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
  	      <?php } ?>

         <?php if($_SERVER['REQUEST_URI'] == '/res/adduser.php'){      ?>
	           <li class="active">
              <a href="adduser.php">
                <i class="fa fa-user"></i> <span>Add User</span> </a>
            </li>
            <?php }else{ ?>
              <li>
              <a href="adduser.php">
                <i class="fa fa-user"></i> <span>Add User</span> </a>
            </li>
          <?php } ?>

          <?php if($_SERVER['REQUEST_URI'] == '/res/tablemaster.php'){      ?>
            <li class="active">
              <a href="tablemaster.php" class"active">
                <i class="fa fa-table"></i> <span>Tables Master</span> </a>
            </li>
            <?php }else{ ?>
              <li >
                <a href="tablemaster.php" class"active">
                  <i class="fa fa-table"></i> <span>Tables Master</span> </a>
              </li>
              <?php } ?>


            <?php if($_SERVER['REQUEST_URI'] == '/res/floormaster.php'){      ?>
            <li class="active">
              <a href="floormaster.php" >
                <i class="fa fa-square"></i> <span>Floor Master</span>  </a>
            </li>
             <?php }else{ ?>
                  <li>
              <a href="floormaster.php">
                <i class="fa fa-square"></i> <span>Floor Master</span>  </a>
            </li>
            <?php } ?>

            <?php if($_SERVER['REQUEST_URI'] == '/res/floordesign.php'){      ?>
             <li class="active">
              <a href="floordesign.php" class="active">
                <i class="fa fa-square-o"></i> <span>Floor Design</span> </a>
              </li>
              <?php }else{ ?>
                <li>
                 <a href="floordesign.php" class="active">
                   <i class="fa fa-square-o"></i> <span>Floor Design</span> </a>
                 </li>
               <?php } ?>

      </section>
        <!-- /.sidebar -->
      </aside>
