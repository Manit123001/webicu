
        <div class="contain"> 
            <a href="warnings.php?source=add_warning" class="btn btn-success">Add Warnings </a>
            <div class="clearfix"><br> </div>
        </div>    
        <div class="table-responsive">
          
          <table id="example1" class="table table-bordered table-striped">

              <thead>
              <tr>
                <th>#</th>
                <th>เหตุที่แจ้ง</th>
                <th>รายละเอียด</th>
                <th>ผู้เจ้ง</th>
                <th>ละติจูด</th>
                <th>ลองติจูด</th>
                <th>ภาพเกิดเหตุ</th>
                <th>Status</th>
                <th></th>

              </tr>
              </thead>


              <tbody>
<?php 
  
  // $query = "SELECT * FROM warnings order by warn_id desc";

  $query = "SELECT warnings.*, members.member_firstname, members.member_lastname FROM warnings LEFT JOIN members ON warnings.members_member_id = members.member_id ORDER BY warn_id DESC";


  $select_users = mysqli_query($connection,$query);  
  
  $number =1;   


  while($row = mysqli_fetch_assoc($select_users)) {

      $warn_id             = $row['warn_id'];
      $warn_subject_type      = $row['warn_subject_type'];
      $warn_detail       = $row['warn_detail'];
      $warn_latitude       = $row['warn_latitude'];
      $warn_longtitude        = $row['warn_longtitude'];

      $warn_status              = $row['warn_status'];
      $warn_photo           = $row['warn_photo'];

      $warn_create_date    = $row['warn_create_date'];
      $warn_state           = $row['warn_state'];
      $members_member_id      = $row['members_member_id'];
  

        $member_firstname           = $row['member_firstname'];
        $member_lastname           = $row['member_lastname'];
  
      
    echo "<tr>";

      echo "<td>$number</td>";

      echo "<td>$warn_subject_type </td>";
      echo "<td>$warn_detail</td>";

      // echo "<td>$member_firstname  $member_lastname</td>";
      echo "<td><a href='users.php?source=edit_user&edit_user=$members_member_id'>$member_firstname  $member_lastname</a></td>";

      
      echo "<td>$warn_latitude</td>";
      echo "<td>$warn_longtitude</td>";


      echo '<td><img src="'.$warn_photo.'" style="width:100px; height: 100px; margin: 0px 0 10px 0;"></td>';

      echo "<td>".($warn_status == 10 ? '<p class="bg-success">Activity</p>' : '<p class="bg-danger">Inactivity</p>')."</td>";



      echo "<td> 
<a href='warnings.php?source=edit_warning&edit_warning={$warn_id}' class='btn btn-info' title='Edit Data'>   <i class='fa fa-pencil' aria-hidden='true'></i></a> 

<a href='warnings.php?delete={$warn_id}' class='btn btn-danger' title='Delete Data'>   <i class='fa fa-trash' aria-hidden='true'></i></a> </td>";



    echo "</tr>";

      $number+=1;
  }

?>
              </tbody>
          </table>
        </div>

<?php














if(isset($_GET['delete'])){

    $the_warning = escape($_GET['delete']);

    $query = "DELETE FROM warnings WHERE warn_id = {$the_warning} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: warnings.php");

    }

?>

