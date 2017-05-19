<?php
   

   if(isset($_POST['create_user'])) {
                  
            $member_email    = escape($_POST['member_email']);
            $member_password     = escape($_POST['member_password']);
            $member_firstname     = escape($_POST['member_firstname']);
            $member_lastname      = escape($_POST['member_lastname']);
            $member_tel          = escape($_POST['member_tel']);
            $member_sex        = $_POST['member_sex'];
            $member_address        = escape($_POST['member_address']);
            $member_created_date     = date('d-m-y');

;


            if($_FILES['member_photo']['name'] != 0 ){
                $member_photo        = $_FILES['member_photo']['name'];
                $member_photo_temp   = $_FILES['member_photo']['tmp_name'];
       
            }else{
              $member_photo ='profile.jpg';
            }


            $member_password = password_hash($member_password, PASSWORD_BCRYPT, array('cost' => 10));    




            $query = "INSERT INTO members (member_firstname, member_lastname, member_username, member_password, member_tel, member_email, member_address, member_photo, member_created_date, member_state, member_token, member_sex ) "; 

            $query .= "VALUES('{$member_firstname}','{$member_lastname}','{$member_email}','{$member_password}','$member_tel', '{$member_email}', '{$member_address}', '{$member_photo}', '{$member_created_date}', '10', '', '{$member_sex}') "; 
                 
            $create_user_query = mysqli_query($connection, $query);  
              
            confirmQuery($create_user_query); 
     
       

            echo " "; 
            echo "<div class='col-md-12 bg-success'> User Created: " . " " . "<a href='users.php'>View Users</a>  </div><br/><br/>";

   }
  
?>


<form action="" method="post" enctype="multipart/form-data">    

<div class="col-lg-6">
  
    <div class="form-group">
      <label for="member_email">Email address</label>
      <input type="email" class="form-control" name="member_email"  id="member_email" aria-describedby="emailHelp" placeholder="Enter email">

      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="member_password">Password</label>
      <input type="password" class="form-control" name="member_password" id="member_password" placeholder="Password">
    </div>

    <div class="form-group">
      <label for="member_firstname">First Name</label>
      <input type="text" class="form-control" name="member_firstname" id="member_firstname" placeholder="First Name">
    </div>
    
    <div class="form-group">
      <label for="member_lastname">Last Name</label>
      <input type="text" class="form-control" name="member_lastname" id="member_lastname" placeholder="Last Name">
    </div>

</div>
<div class="col-lg-6">
   <div class="form-group">
    <label for="member_tel">Tel</label>
    <input type="text" class="form-control" name="member_tel" id="member_tel" placeholder="Telephone Number" maxlength="10">
  </div>

  <div class="form-group">
    <label for="member_sex">Sex</label>
    <select class="form-control" name="member_sex" id="member_sex">
      <option value="1">Male</option>
      <option value="2">Female</option>

    </select>
  </div>


  <div class="form-group">
    <label for="member_address">Address</label>
    <textarea class="form-control" name="member_address" id="member_address" rows="3"></textarea>
  </div>

   <div class="form-group">
    <label for="member_photo">Image Photo</label>
    <input type="file" class="form-control-file" name="member_photo" id="member_photo" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
  </div>

</div>

 

 
<div class="col-lg-12">
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Confirm User
    </label>
  </div>

  <button type="submit" name="create_user" class="btn btn-primary">Create</button>


</div>





</form>