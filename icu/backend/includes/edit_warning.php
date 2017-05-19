

<?php  // Get request user id and database data extraction


if(isset($_GET['edit_warning'])){

    // this is id frome get data
    $the_warn_id =  escape($_GET['edit_warning']);
    

    $query = "SELECT * FROM warnings WHERE warn_id = $the_warn_id ";
    $select_acident_query = mysqli_query($connection,$query);  

      while($row = mysqli_fetch_assoc($select_acident_query)) {

        $warn_id             = $row['warn_id'];
        $warn_subject_type      = $row['warn_subject_type'];
        $warn_detail       = $row['warn_detail'];
        $warn_latitude       = $row['warn_latitude'];
        $warn_longtitude       = $row['warn_longtitude'];
        $warn_photo       = $row['warn_photo'];
        $members_member_id       = $row['members_member_id'];
        $warn_status       = $row['warn_status'];


      }
      


       if(isset($_POST['create_warns'])) {
                  
            $warn_subject_type    = escape($_POST['warn_subject_type']);
            $warn_detail    = escape($_POST['warn_detail']);
            $warn_latitude    = escape($_POST['warn_latitude']);
            $warn_longtitude    = escape($_POST['warn_longtitude']);
            $members_member_id     = escape($_POST['members_member_id']);
            $warn_status     = escape($_POST['warn_status']);
           
            $warn_create_date     = date('d-m-y');
            $warn_time_submit     =  date("H:i:s");




            if($_FILES['warn_photo']['name'] != 0 ){
              
              $warn_photo        = $_FILES['warn_photo']['name'];
              $warn_photo_temp   = $_FILES['warn_photo']['tmp_name'];
       
            }else{
              $warn_photo ='profile.jpg';
            }



            $query = "INSERT INTO `warnings` (`warn_id`, `warn_subject_type`, `warn_detail`, `warn_latitude`, `warn_longtitude`, `warn_photo`, `warn_vedio`, `warn_create_date`, `warn_time_submit`, `warn_time_incedent`, `members_member_id`,  `warn_state`, `warn_status`) VALUES (NULL,'$warn_subject_type','$warn_detail','$warn_latitude','$warn_longtitude','$warn_photo', '1', '$warn_create_date ', '$warn_time_submit','$warn_time_submit','$members_member_id','1','$warn_status')";
                 
            $create_warns = mysqli_query($connection, $query);  
              
            confirmQuery($create_warns); 
     
       
            echo "<div class='col-md-12 bg-success'> User Created: " . " " . "<a href='warnings.php'>View Warnings</a>  </div><br/><br/>";

   }
  
} else {  // If the user id is not present in the URL we redirect to the home page

  header("Location: index.php");

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
      <input type="text" class="form-control" name="warn_subject_type" id="warn_subject_type" value="<?php echo $warn_subject_type;?>" placeholder="type ">
    </div>

    <div class="form-group">
      <label for="warn_detail">รายละเอียด</label>
      <textarea class="form-control" name="warn_detail" id="warn_detail" rows="3"><?php echo $warn_detail;?></textarea>

    </div>

    <div class="form-group">
      <label for="warn_latitude">ละติจูด</label>
      <input type="text" class="form-control" name="warn_latitude" id="warn_latitude" value="<?php echo $warn_latitude;?>" placeholder="Latitude">
    </div>

    <div class="form-group">
      <label for="warn_longtitude">ลองติจูด</label>
      <input type="text" class="form-control" name="warn_longtitude" id="warn_longtitude" value="<?php echo $warn_longtitude;?>" placeholder="Longtitude">
    </div>




</div>
<div class="col-lg-6">

  <div class="form-group">
    <label for="member_sex">Status</label>
    <select class="form-control" name="warn_status" id="warn_status">
        <?php
            if($warn_status == 10){
                echo '<option value="10">Active</option>';
            }else{
                echo '<option value="0">Inactive</option>';
            }


            if($warn_status == 10){
              echo '<option value="0">Inactive</option>';
            }else{
              echo '<option value="10">Active</option>';

            }

        ?> 

    </select>
  </div>



   <div class="form-group">
    <label for="warn_photo">Image Photo</label>

        <br>
       <img src="<?= $warn_photo ?>" style="width:100px; height: 100px; margin: 0px 0 10px 0;">

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