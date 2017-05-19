<?php
   

   if(isset($_POST['create_warns'])) {
                  
            $warn_subject_type    = escape($_POST['warn_subject_type']);
            $warn_detail    = escape($_POST['warn_detail']);
            $warn_latitude    = escape($_POST['warn_latitude']);
            $warn_longtitude    = escape($_POST['warn_longtitude']);
            $members_member_id     = escape($_POST['members_member_id']);
           
            $warn_create_date     = date('d-m-y');
            $warn_time_submit     =  date("H:i:s");




            if($_FILES['warn_photo']['name'] != 0 ){
              
              $warn_photo        = $_FILES['warn_photo']['name'];
              $warn_photo_temp   = $_FILES['warn_photo']['tmp_name'];
       
            }else{
              $warn_photo ='profile.jpg';
            }



            $query = "INSERT INTO `warnings` (`warn_id`, `warn_subject_type`, `warn_detail`, `warn_latitude`, `warn_longtitude`, `warn_photo`, `warn_vedio`, `warn_create_date`, `warn_time_submit`, `warn_time_incedent`, `members_member_id`,  `warn_state`, `warn_status`) VALUES (NULL,'$warn_subject_type','$warn_detail','$warn_latitude','$warn_longtitude','$warn_photo', '1', '$warn_create_date ', '$warn_time_submit','$warn_time_submit','$members_member_id','1','10')";
                 
            $create_warns = mysqli_query($connection, $query);  
              
            confirmQuery($create_warns); 
     
       
            echo "<div class='col-md-12 bg-success'> User Created: " . " " . "<a href='warnings.php'>View Warnings</a>  </div><br/><br/>";

   }
  
?>

<form action="" method="post" enctype="multipart/form-data">    

<div class="col-lg-6">
    

    <div class="form-group">
      <label for="members_member_id">ผู้แจ้ง</label>

      <input type="text" class="form-control" name="members_member_id" value="99" id="members_member_id" placeholder="Members" >
    </div>
    

     <div class="form-group">
            <label for="warn_subject_type">ประเภทอุบัติเหตุ</label>
            <select class="form-control"  name="warn_subject_type" id="">

    <?php

        $query = "SELECT * FROM types";
        $select_categories = mysqli_query($connection,$query);

        confirmQuery($select_categories);

        while($row = mysqli_fetch_assoc($select_categories )) {
            $type_id = $row['type_id'];
            $type_name = $row['type_name'];

            echo "<option value='$type_id'>{$type_name}</option>";
        }

    ?>
            </select>
            
    </div>

    <div class="form-group">
      <label for="warn_detail">รายละเอียด</label>
      <textarea class="form-control" name="warn_detail" id="warn_detail" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="warn_latitude">ละติจูด</label>
      <input type="text" class="form-control" name="warn_latitude" id="warn_latitude" placeholder="Latitude">
    </div>

        <div class="form-group">
      <label for="warn_longtitude">ลองติจูด</label>
      <input type="text" class="form-control" name="warn_longtitude" id="warn_longtitude" placeholder="Longtitude">
    </div>




</div>
<div class="col-lg-6">


   <div class="form-group">
    <label for="warn_photo">Image Photo</label>
    <input type="file" class="form-control-file" name="warn_photo" id="warn_photo" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">รูภาพจุดเกิดเหตุ</small>
  </div>

</div>

 

 
<div class="col-lg-12">
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Confirm User
    </label>
  </div>

  <button type="submit" name="create_warns" class="btn btn-primary">Create</button>


</div>





</form>