<?php
   

   if(isset($_POST['create_department'])) {
                  
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

        $department_created_date     = date('d-m-y');
        
        $types_type_id        = 1;
        $department_token      = 99999999;



            // $department_password = password_hash($department_password, PASSWORD_BCRYPT, array('cost' => 10));    




            $query = "INSERT INTO departments (department_name, department_description, department_username, department_password, department_tel, department_email, department_address, department_latitude, department_longtitude, department_status, department_created_date, types_type_id , department_token ) "; 

            $query .= "VALUES('{$department_tel}','{$department_name}','{$department_username}','{$department_password}','$department_tel', '{$department_email}', '{$department_address}', '{$department_latitude}', '{$department_address}', '{$department_status}', '{$department_created_date}', '{$types_type_id}', '{$department_token}') "; 
                 
            $create_department_query = mysqli_query($connection, $query);  
              
            confirmQuery($create_department_query); 
     
       

            echo "<div class='col-md-12 bg-success'> User Created: " . " " . "<a href='departments.php'>View Departments</a>  </div><br/><br/>";

   }
  
?>



<form action="" method="post" enctype="multipart/form-data">    

<div class="col-lg-6">
  
    <div class="form-group">
      <label for="department_name">Name</label>
      <input type="text" class="form-control" name="department_name"  id="department_name"  placeholder="Name">

    </div>

  <div class="form-group">
    <label for="department_description">Description</label>
    <textarea class="form-control" name="department_description" id="department_description" rows="3"></textarea>
  </div>
    

    <div class="form-group">
      <label for="department_username">Username</label>
      <input type="text" class="form-control" name="department_username"  id="department_username"  placeholder="Username">

    </div>

    <div class="form-group">
      <label for="department_password">Password</label>
      <input type="password" class="form-control" name="department_password"  id="department_password"   placeholder="Password">
    </div>

  
</div>



<div class="col-lg-6">

  <div class="form-group">
      <label for="department_tel">Telephone Number   </label>
      <input type="text" class="form-control" name="department_tel" id="department_tel"   placeholder="Telephone Number" maxlength="10">
    </div>

    <div class="form-group">
      <label for="department_email">Email</label>
      <input type="text" class="form-control" name="department_email" id="department_email"   placeholder="Email">
    </div>

    <div class="form-group">
      <label for="department_latitude">Latitude</label>
      <input type="text" class="form-control" name="department_latitude" id="department_latitude"   placeholder="Latitude">
    </div>

    <div class="form-group">
      <label for="department_longtitude">Longtitude</label>
      <input type="text" class="form-control" name="department_longtitude" id="department_longtitude"   placeholder="Longtitude" >
    </div>




  <div class="form-group">
    <label for="department_address">Address</label>
    <textarea class="form-control" name="department_address" id="department_address" rows="3"></textarea>
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

  <button type="submit" name="create_department" class="btn btn-primary">Create</button>


</div>





</form>