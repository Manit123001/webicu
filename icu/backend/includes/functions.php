<?php

function redirect($location){


    return header("Location:" . $location);


}




function escape($string) {

	global $connection;

	return mysqli_real_escape_string($connection, trim($string));
}



function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
          
          die("QUERY FAILED ." . mysqli_error($connection));

      }
}

function deleteMember(){
    global $connection;

    if(isset($_GET['delete'])){
        $member_id = $_GET['delete'];
        $query = "DELETE FROM members WHERE member_id = {$member_id} ";
        $delete_query = mysqli_query($connection,$query);
        header("Location: users.php");


    }
        
}





?>