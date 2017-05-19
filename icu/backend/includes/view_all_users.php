
        <div class="contain"> 
            <a href="users.php?source=add_user" class="btn btn-success">Add User </a>
            <div class="clearfix"><br> </div>
        </div>    


          <table id="example1" class="table table-bordered table-striped">

              <thead>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Photo</th>
                <th>Status</th>
                <th></th>

              </tr>
              </thead>


              <tbody>
<?php 
  
  $query = "SELECT * FROM members order by member_id desc";
  $select_users = mysqli_query($connection,$query);  
  
  $number =1;    
  while($row = mysqli_fetch_assoc($select_users)) {



      $member_id             = $row['member_id'];
      $member_firstname      = $row['member_firstname'];
      $member_lastname       = $row['member_lastname'];
      $member_username       = $row['member_username'];
      $member_password        = $row['member_password'];

      $member_tel              = $row['member_tel'];
      $member_email           = $row['member_email'];
      $member_photo           = $row['member_photo'];

      $member_created_date    = $row['member_created_date'];
      $member_state           = $row['member_state'];
  
      
      echo "<tr>";

      echo "<td>$number </td>";
      echo "<td>$member_firstname </td>";
      echo "<td>$member_lastname</td>";
      echo "<td>$member_email</td>";
          
      echo "<td>$member_tel</td>";
      // echo "<td>$member_email</td>";
      // echo "<td>$member_photo</td>";
      echo '<td><img src="assets/images/'.$member_photo.'" style="width:100px; height: 100px; margin: 0px 0 10px 0;"></td>';

      echo "<td>".($member_state == 10 ? '<p class="bg-success">Activity</p>' : '<p class="bg-danger">Inactivity</p>')."</td>";


      // echo "<td><a href='users.php?change_to_admin={$member_id}'>Admin</a></td>";
      // echo "<td><a href='users.php?change_to_sub={$member_id}'>Subscriber</a></td>";
      
      echo "<td> 
<a href='users.php?source=edit_user&edit_user={$member_id}' class='btn btn-info' title='Edit Data'>   <i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> 

<a href='users.php?delete={$member_id}' class='btn btn-danger' title='Delete Data'>   <i class='fa fa-trash' aria-hidden='true'></i></a> </td>";

      echo "</tr>";

      $number+=1;
  }
?>


              </tbody>

          </table>

<?php





if(isset($_GET['delete'])){

    $the_user_id = escape($_GET['delete']);

    $query = "DELETE FROM members WHERE member_id = {$the_user_id} ";
    $delete_user_query = mysqli_query($connection, $query);
    header("Location: users.php");

    }

?>

<!-- 
<a href="#" data-href="delete.php?id=23" data-toggle="modal" data-target="#confirm-delete">Delete record #23</a>



<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ยืนยันการลบข้อมูล
            </div>
            <div class="modal-body">
                ต้องการลบข้อมูลไหม
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

</script>
 -->
