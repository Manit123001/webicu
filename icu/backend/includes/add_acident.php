<?php
   

   if(isset($_POST['create_acident'])) {
                  
            $ac_subject_type    = escape($_POST['ac_subject_type']);
            $ac_detail    = escape($_POST['ac_detail']);
            $ac_latitude    = escape($_POST['ac_latitude']);
            $ac_longtitude    = escape($_POST['ac_longtitude']);
            $members_member_id     = escape($_POST['members_member_id']);
           
            $ac_create_date     = date('d-m-y');
            $ac_time_submit     =  date("H:i:s");




            if($_FILES['ac_photo']['name'] != 0 ){
              
              $ac_photo        = $_FILES['ac_photo']['name'];
              $ac_photo_temp   = $_FILES['ac_photo']['tmp_name'];
       
            }else{
              $ac_photo ='profile.jpg';
            }



            $query = "INSERT INTO `acidents` (`ac_id`, `ac_subject_type`, `ac_detail`, `ac_latitude`, `ac_longtitude`, `ac_photo`, `ac_vedio`, `ac_create_date`, `ac_time_submit`, `ac_time_incident`, `members_member_id`, `types_type_id`, `ac_state`, `ac_status`) VALUES (NULL,'$ac_subject_type','$ac_detail','$ac_latitude','$ac_longtitude','$ac_photo', '1', '$ac_create_date ', '$ac_time_submit','$ac_time_submit','$members_member_id','$ac_subject_type ','1','10')";
                 
            $create_acident_query = mysqli_query($connection, $query);  
              
            confirmQuery($create_acident_query); 
     
       
            echo "<div class='col-md-12 bg-success'> User Created: " . " " . "<a href='users.php'>View Users</a>  </div><br/><br/>";

   }
  
?>

<form action="" method="post" enctype="multipart/form-data">    

<div class="col-lg-6">
    

    <div class="form-group">
      <label for="members_member_id">ผู้แจ้ง</label>

      <input type="text" class="form-control" name="members_member_id" value="99" id="members_member_id" placeholder="Members" >
    </div>
    

     <div class="form-group">
            <label for="ac_subject_type">ประเภทอุบัติเหตุ</label>
            <select class="form-control"  name="ac_subject_type" id="">

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
      <label for="ac_detail">รายละเอียด</label>
      <textarea class="form-control" name="ac_detail" id="ac_detail" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="ac_latitude">ละติจูด</label>
      <input type="text" class="form-control" name="ac_latitude" id="ac_latitude" placeholder="Latitude">
    </div>

        <div class="form-group">
      <label for="ac_longtitude">ลองติจูด</label>
      <input type="text" class="form-control" name="ac_longtitude" id="ac_longtitude" placeholder="Longtitude">
    </div>




</div>
<div class="col-lg-6">

   <div class="form-group">
        <label for="category">หน่วยงานที่แจ้ง</label>

        <select multiple="" class="form-control" name="  ">
          

    <?php

    $query = "SELECT department_id, department_name  FROM departments ORDER by department_name ASC";
    $select_departments = mysqli_query($connection,$query);

    confirmQuery($select_departments);

    while($row = mysqli_fetch_assoc($select_departments )) {
        $department_id = $row['department_id'];
        $department_name = $row['department_name'];

        echo "<option value='$department_id'>{$department_name}</option>";
    }

    ?>
                  
        </select>  
    </div>


   <div class="form-group">
    <label for="ac_photo">Image Photo</label>
    <input type="file" class="form-control-file" name="ac_photo" id="ac_photo" aria-describedby="fileHelp">
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

  <button type="submit" name="create_acident" class="btn btn-primary">Create</button>


</div>





</form>