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
                      <b> <a href="types.php"><i class="fa fa-heart"></i> ปรเภทเหตุ</a></b>

                      <div class="clearfix">  </div>
                  </div>
                  <div class="panel-body">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

            <div class="col-xs-6">
            


    <?php 

      if(isset($_POST['submit'])){

            $type_name = $_POST['type_name'];

            if($type_name == "" || empty($type_name)) {
            
                 echo "This Field should not be empty";
        
            } else {

              $stmt = mysqli_prepare($connection, "INSERT INTO types(type_name) VALUES (?) ");

              mysqli_stmt_bind_param($stmt, 's', $type_name);
              
              mysqli_stmt_execute($stmt);


              if(!$stmt) {
                  die('QUERY FAILED'. mysqli_error($connection));
              }
              
              mysqli_stmt_close($stmt);

            }
            
      }
    ?>
    


            <form action="" method="post">
                  <div class="form-group">
                        <label for="cat-title">Add Category</label>
                      
                        <input type="text" class="form-control" name="type_name">
                  </div>
                  
                   <div class="form-group">
                      <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                  </div>

            </form>
    


    <?php // UPDATE AND INCLUDE QUERY
      if(isset($_GET['edit'])) {

          $type_id = $_GET['edit'];

          include "includes/update_categories.php";
      }   
    ?>



            </div><!--Add col-6 Form-->

           
            <div class="col-xs-6">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Title</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    
        <?php 

    $query = "SELECT * FROM types";
    $select_types = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_types)) {
      $type_id = $row['type_id'];
      $type_name = $row['type_name'];

      echo "<tr>";
          
      echo "<td>{$type_id}</td>";
      echo "<td>{$type_name}</td>";
      echo "<td><a href='types.php?delete={$type_id}' class='btn btn-danger' title='Delete Data'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
      echo "<td><a href='types.php?edit={$type_id}' class='btn btn-info' title='Edit Data'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";



      echo "</tr>";

    }
    
        ?>
                   
                    </tbody>
                </table>
            </div>        
            <!-- col-6 -->
        </div>
    </div>
    <!-- /.row -->

    

                  </div>

                </div>
              </div>

        </div>
  

      </div>
      <!-- /.row -->
    </section>
    

  </div>
  <!-- /.content-wrapper -->
  
  <?php 
    if(isset($_GET['delete'])){
        $the_type_id = $_GET['delete'];
        $query = "DELETE FROM types WHERE type_id = {$the_type_id} ";
        $delete_query = mysqli_query($connection,$query);
        header("Location: types.php");


    }
  ?>


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

