<?php include "includes/header.php" ?>





<div class="wrapper">


  <?php include "includes/navigation.php" ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>


      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>

    </section>



<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
             <div class="panel-group">

                <div class="panel panel-info">
                  <div class="panel-heading">
                      <b ></b>
                      <b ><a href="acidents.php"><i class="ion ion-ios-location"></i>  เหตุที่แจ้ง</a></b>
                      <div class="clearfix">  </div>
                  </div>
                  <div class="panel-body">



                <?php

                  if(isset($_GET['source'])){
                    $source = $_GET['source'];

                  } else {
                    $source = '';

                  }

                  switch($source) {
                      
                      case 'add_acident';
                          include "includes/add_acident.php";
                      break; 
                      
                      case 'edit_acident';
                          include "includes/edit_acident.php";
                      break;

                      default:
                          include "includes/view_all_acident.php";
                      break;

                  }
                ?>



                  </div>
                </div>

              </div>
  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    

  </div>
  <!-- /.content-wrapper -->
  



<<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
<!-- page script -->



<script>
  $(function () {
    $("#example1").DataTable();
   
  });
</script>


</body>
</html>

