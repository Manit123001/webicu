
        <div class="contain"> 
            <a href="acidents.php?source=add_acident" class="btn btn-success">Add Acident </a>
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
  
  // $query = "SELECT * FROM acidents order by ac_id desc";

  $query = "SELECT acidents.*, members.member_firstname, members.member_lastname FROM acidents LEFT JOIN members ON acidents.members_member_id = members.member_id ORDER BY ac_id DESC";


  $select_users = mysqli_query($connection,$query);  
  
  $number =1;   


  while($row = mysqli_fetch_assoc($select_users)) {

      $ac_id             = $row['ac_id'];
      $ac_subject_type      = $row['ac_subject_type'];
      $ac_detail       = $row['ac_detail'];
      $ac_latitude       = $row['ac_latitude'];
      $ac_longtitude        = $row['ac_longtitude'];

      $ac_status              = $row['ac_status'];
      $ac_photo           = $row['ac_photo'];

      $ac_create_date    = $row['ac_create_date'];
      $ac_state           = $row['ac_state'];
      $members_member_id      = $row['members_member_id'];
      $types_type_id           = $row['types_type_id'];
  

        $member_firstname           = $row['member_firstname'];
        $member_lastname           = $row['member_lastname'];
  
      
    echo "<tr>";

      echo "<td>$number</td>";

      echo "<td>$ac_subject_type </td>";
      echo "<td>$ac_detail</td>";

      // echo "<td>$member_firstname  $member_lastname</td>";
      echo "<td><a href='users.php?source=edit_user&edit_user=$members_member_id'>$member_firstname  $member_lastname</a></td>";

      
      echo "<td>$ac_latitude</td>";
      echo "<td>$ac_longtitude</td>";


      echo '<td><img src="'.$ac_photo.'" style="width:100px; height: 100px; margin: 0px 0 10px 0;"></td>';

      echo "<td>".($ac_status == 10 ? '<p class="bg-success">Activity</p>' : '<p class="bg-danger">Inactivity</p>')."</td>";



      echo "<td> 
<a href='acidents.php?source=edit_acident&edit_acident={$ac_id}' class='btn btn-info' title='Edit Data'>   <i class='fa fa-pencil' aria-hidden='true'></i></a> 

<a href='acidents.php?delete={$ac_id}' class='btn btn-danger' title='Delete Data'>   <i class='fa fa-trash' aria-hidden='true'></i></a> </td>";



    echo "</tr>";

      $number+=1;
  }

?>
              </tbody>
          </table>
        </div>

<?php














if(isset($_GET['delete'])){

    $the_acident = escape($_GET['delete']);

    $query = "DELETE FROM acidents WHERE ac_id = {$the_acident} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: acidents.php");

    }

?>

