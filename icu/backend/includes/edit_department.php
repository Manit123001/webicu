
<?php  // Get request user id and database data extraction


if(isset($_GET['edit_department'])){

    // this is id frome get data
    $the_department_id =  escape($_GET['edit_department']);
    

    $query = "SELECT * FROM departments WHERE department_id = $the_department_id ";
    $select_users_query = mysqli_query($connection,$query);  

      while($row = mysqli_fetch_assoc($select_users_query)) {

        $department_id             = $row['department_id'];
        $department_name      = $row['department_name'];
        $department_description       = $row['department_description'];
        $department_username       = $row['department_username'];
        $department_password       = $row['department_password'];

        $department_tel       = $row['department_tel'];
        $department_email             = $row['department_email'];
        $department_address           = $row['department_address'];

        $department_latitude           = $row['department_latitude'];
        $department_longtitude           = $row['department_longtitude'];


        $department_created_date    = $row['department_created_date'];
        $department_status           = $row['department_status'];
          
      }
      





   if(isset($_POST['update_department'])) {
       
            
        $department_name    = escape($_POST['department_name']);
        $department_description     = escape($_POST['department_description']);

        $department_username     = escape($_POST['department_username']);
        $department_password     = escape($_POST['department_password']);

        $department_tel      = escape($_POST['department_tel']);
        $department_email          = escape($_POST['department_email']);
        $department_address        = escape($_POST['department_address']);



        $department_latitude        = escape($_POST['department_latitude']);
        $department_longtitude        = escape($_POST['department_longtitude']);

        $department_status        = escape($_POST['department_status']);



              $query_password = "SELECT department_password FROM departments WHERE department_id =  $the_department_id";
              $query_department = mysqli_query($connection, $query_password);

              confirmQuery($query_department);

              $row = mysqli_fetch_array($query_department);
              $db_department_password = $row['department_password'];


            if($department_password != null){
                $hashed_password = password_hash($department_password, PASSWORD_BCRYPT, array('cost' => 12));

            } else{
                $hashed_password = $db_department_password;
            }


              $query = "UPDATE departments SET ";
              $query .="department_name  = '{$department_name}', ";
              $query .="department_description = '{$department_description}', ";
              $query .="department_username = '{$department_username}', ";
              $query .="department_password = '{$hashed_password}', ";
              $query .="department_tel = '{$department_tel}', ";
              $query .="department_address = '{$department_address}', ";
              $query .="department_email = '{$department_email}', ";
              $query .="department_status = '{$department_status }', ";
              $query .="department_latitude = '{$department_latitude }', ";
              $query .="department_longtitude = '{$department_longtitude}' ";
              $query .= "WHERE department_id = {$the_department_id} ";


                $edit_department_query = mysqli_query($connection,$query);

                confirmQuery($edit_department_query);


            echo "<div class='col-md-12 bg-success '> User Updated  <a href='departments.php'> View All Departments?</a></div><br/><br/>";

   } // Post reques to update user end



} else {  // If the user id is not present in the URL we redirect to the home page

  header("Location: index.php");

}

?>



<form action="" method="post" enctype="multipart/form-data">    

<div class="col-lg-6">
  
    <div class="form-group">
      <label for="department_name">Name</label>
      <input type="text" class="form-control" name="department_name"  id="department_name" value="<?php echo $department_name; ?>" placeholder="Name">

    </div>

  <div class="form-group">
    <label for="department_description">Description</label>
    <textarea class="form-control" name="department_description" id="department_description" rows="3"><?php echo $department_description; ?></textarea>
  </div>
    

    <div class="form-group">
      <label for="department_username">Username</label>
      <input type="text" class="form-control" name="department_username"  id="department_username" value="<?php echo $department_username; ?>" placeholder="Username">

    </div>

    <div class="form-group">
      <label for="department_password">Password</label>
      <input type="password" class="form-control" name="department_password"  id="department_password"   placeholder="Password">
    </div>

  
</div>



<div class="col-lg-6">

  <div class="form-group">
      <label for="department_tel">Telephone Number   </label>
      <input type="text" class="form-control" name="department_tel" id="department_tel" value="<?php echo $department_tel; ?>"  placeholder="Telephone Number" maxlength="10">
    </div>

    <div class="form-group">
      <label for="department_email">Email</label>
      <input type="text" class="form-control" name="department_email" id="department_email" value="<?php echo $department_email; ?>"  placeholder="Email">
    </div>

    <div class="form-group">
      <label for="department_latitude">Latitude</label>
      <input type="text" class="form-control" name="department_latitude" id="department_latitude" value="<?php echo $department_latitude; ?>"  placeholder="Latitude">
    </div>

    <div class="form-group">
      <label for="department_longtitude">Longtitude</label>
      <input type="text" class="form-control" name="department_longtitude" id="department_longtitude" value="<?php echo $department_longtitude; ?>"  placeholder="Longtitude" >
    </div>




  <div class="form-group">
    <label for="department_address">Address</label>
    <textarea class="form-control" name="department_address" id="department_address" rows="3"><?php echo $department_address; ?></textarea>
  </div>
    
  <div class="form-group">
    <label for="department_status">Status</label>
    <select class="form-control" name="department_status" id="department_status">
        <?php
            if($department_status == 10){
                echo '<option value="10">Active</option>';
            }else{
                echo '<option value="0">Inactive</option>';
            }


            if($department_status == 10){
              echo '<option value="0">Inactive</option>';
            }else{
              echo '<option value="10">Active</option>';

            }

        ?> 

    </select>
  </div>




</div>

 

 
<div class="col-lg-12">

  <button type="submit" name="update_department" class="btn btn-primary">Create</button>


</div>





</form>