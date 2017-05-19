
        <div class="contain"> 
            <a href="departments.php?source=add_department" class="btn btn-success">Add User </a>
            <div class="clearfix"><br> </div>
        </div>    


          <table id="example1" class="table table-bordered table-striped">

              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Username</th>
                <th>Tel</th>
                <th>Email</th>
                <th>status</th>
                <th></th>

              </tr>
              </thead>


              <tbody>
<?php 
  
  $query = "SELECT * FROM departments order by department_id desc";
  $select_departments = mysqli_query($connection,$query);  
  
  $number =1;    
  while($row = mysqli_fetch_assoc($select_departments)) {



      $department_id             = $row['department_id'];
      $department_name      = $row['department_name'];
      $department_description       = $row['department_description'];
      $department_username       = $row['department_username'];
      $department_tel        = $row['department_tel'];

      $department_email              = $row['department_email'];
      $department_address           = $row['department_address'];

      $department_status           = $row['department_status'];
  
      
      echo "<tr>";

      echo "<td>$number </td>";
      echo "<td>$department_name </td>";
      echo "<td>$department_description</td>";
      echo "<td>$department_username</td>";
          
      echo "<td>$department_tel</td>";
      echo "<td>$department_email</td>";



      echo "<td>".($department_status == 10 ? '<p class="bg-success">Activity</p>':'<p class="bg-danger">Inactivity</p>')."</td>";


      
      echo "<td> 
<a href='departments.php?source=edit_department&edit_department={$department_id}' class='btn btn-info' title='Edit Data'>   <i class='fa fa-pencil' aria-hidden='true'></i></a> 

<a href='departments.php?delete={$department_id}' class='btn btn-danger' title='Delete Data'>   <i class='fa fa-trash' aria-hidden='true'></i></a> </td>";



      echo "</tr>";

      $number+=1;
  }
?>


              </tbody>

          </table>

<?php





if(isset($_GET['delete'])){

    $the_department_id = escape($_GET['delete']);

    $query = "DELETE FROM departments WHERE department_id = {$the_department_id} ";
    $delete_user_query = mysqli_query($connection, $query);
    header("Location: departments.php");

    }

?>
