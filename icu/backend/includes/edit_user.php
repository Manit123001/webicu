
<?php  // Get request user id and database data extraction


if(isset($_GET['edit_user'])){

    // this is id frome get data
    $the_user_id =  escape($_GET['edit_user']);
    

    $query = "SELECT * FROM members WHERE member_id = $the_user_id ";
    $select_users_query = mysqli_query($connection,$query);  

      while($row = mysqli_fetch_assoc($select_users_query)) {

        $member_id             = $row['member_id'];
        $member_firstname      = $row['member_firstname'];
        $member_lastname       = $row['member_lastname'];
        $member_username       = $row['member_username'];
        $member_password       = $row['member_password'];
        $member_address       = $row['member_address'];

        $member_tel             = $row['member_tel'];
        $member_email           = $row['member_email'];

        $member_photo           = $row['member_photo'];

        $member_created_date    = $row['member_created_date'];
        $member_state           = $row['member_state'];
          
      }
      





   if(isset($_POST['update_user'])) {
       
            
        $member_firstname    = escape($_POST['member_firstname']);
        $member_lastname     = escape($_POST['member_lastname']);

        $member_email        = escape($_POST['member_email']);
        $member_password     = escape($_POST['member_password']);
        $member_address      = escape($_POST['member_address']);

        $member_tel          = escape($_POST['member_tel']);
        $member_sex          = escape($_POST['member_sex']);
        $member_state        = escape($_POST['member_state']);

        $member_photo        =  $_FILES['member_photo']['name'];
        $member_photo_temp   =  $_FILES['member_photo']['tmp_name'];
 


        move_uploaded_file($member_photo_temp, "assets/images/$member_photo"); 
        
        if(empty($member_photo)) {
        
            $query = "SELECT * FROM members WHERE member_id = $the_user_id ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

               $member_photo = $row['member_photo'];
            }
        }
      

              $query_password = "SELECT member_password FROM members WHERE member_id =  $the_user_id";
              $get_user_query = mysqli_query($connection, $query_password);
              confirmQuery($get_user_query);
              $row = mysqli_fetch_array($get_user_query);
              $db_user_password = $row['member_password'];


            if($member_password != null){
                $hashed_password = password_hash($member_password, PASSWORD_BCRYPT, array('cost' => 12));

            } else{
                $hashed_password = $db_user_password;
            }

              $query = "UPDATE members SET ";
              $query .="member_firstname  = '{$member_firstname}', ";
              $query .="member_lastname = '{$member_lastname}', ";
              $query .="member_username = '{$member_username}', ";
              $query .="member_password = '{$hashed_password}', ";
              $query .="member_address = '{$member_address}', ";
              $query .="member_email = '{$member_email}', ";
              $query .="member_tel = '{$member_tel}', ";
              $query .="member_state = '{$member_state }', ";
              $query .="member_photo = '{$member_photo }', ";
              $query .="member_sex = '{$member_sex}' ";
              $query .= "WHERE member_id = {$the_user_id} ";


                $edit_user_query = mysqli_query($connection,$query);

                confirmQuery($edit_user_query);


            echo "<div class='col-md-12 bg-success '> User Updated  <a href='users.php'> View All Users?</a></div><br/><br/>";

   } // Post reques to update user end



} else {  // If the user id is not present in the URL we redirect to the home page

  header("Location: index.php");

}

?>



<form action="" method="post" enctype="multipart/form-data">    

<div class="col-lg-6">
  
    <div class="form-group">
      <label for="member_email">Username</label>
      <input type="email" class="form-control" name="member_email"  id="member_email" value="<?php echo $member_email; ?>" aria-describedby="emailHelp" placeholder="Enter email">

      <small id="emailHelp" class="form-text text-muted">Your email and username is same.</small>
    </div>

    <div class="form-group">
      <label for="member_password">Password</label>
      <input type="password" class="form-control" name="member_password"  id="member_password"   placeholder="Password">
    </div>

    <div class="form-group">
      <label for="member_firstname">First Name</label>
      <input type="text" class="form-control" name="member_firstname" id="member_firstname" value="<?php echo $member_firstname; ?>"  placeholder="First Name">
    </div>
    
    <div class="form-group">
      <label for="member_lastname">Last Name</label>
      <input type="text" class="form-control" name="member_lastname" id="member_lastname" value="<?php echo $member_lastname; ?>"  placeholder="Last Name">
    </div>


</div>


<div class="col-lg-6">
   <div class="form-group">
    <label for="member_tel">Tel</label>
    <input type="text" class="form-control" name="member_tel" id="member_tel" value="<?php echo $member_tel; ?>"  placeholder="Telephone Number" maxlength="10">
  </div>

  <div class="form-group">
    <label for="member_sex">Sex</label>
    <select class="form-control" name="member_sex" id="member_sex">
        <?php
            if($member_sex == 1){
                echo '<option value="1">Male</option>';
            }else{
                echo '<option value="2">Female</option>';
            }


            if($member_sex == 1){
              echo '<option value="2">Female</option>';
            }else{
              echo '<option value="1">Male</option>';

            }

        ?> 

    </select>
  </div>


  <div class="form-group">
    <label for="member_address">Address</label>
    <textarea class="form-control" name="member_address" id="member_address" rows="3"><?php echo $member_address; ?></textarea>
  </div>
    
  <div class="form-group">
    <label for="member_sex">Status</label>
    <select class="form-control" name="member_state" id="member_state">
        <?php
            if($member_state == 10){
                echo '<option value="10">Active</option>';
            }else{
                echo '<option value="0">Inactive</option>';
            }


            if($member_state == 10){
              echo '<option value="0">Inactive</option>';
            }else{
              echo '<option value="10">Active</option>';

            }

        ?> 

    </select>
  </div>


   <div class="form-group">
    <label for="member_photo">Image Photo</label>
    <br>
    <img src="assets/images/<?php echo $member_photo; ?>" style="width:100px; height: 100px; margin: 0px 0 10px 0;">



    <input type="file" class="form-control-file" name="member_photo" id="member_photo" aria-describedby="fileHelp">

    <small id="fileHelp" class="form-text text-muted">This is Image Profile</small>
  </div>

</div>

 

 
<div class="col-lg-12">

  <button type="submit" name="update_user" class="btn btn-primary">Create</button>


</div>





</form>