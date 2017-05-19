    <form action="" method="post">
      <div class="form-group">
         <label for="cat-title">Edit Category</label>
         
         
         <?php

        if(isset($_GET['edit'])){

            $type_id = escape($_GET['edit']);
    
            $query = "SELECT * FROM types WHERE type_id = $type_id ";
            $select_categories_id = mysqli_query($connection,$query);  

            while($row = mysqli_fetch_assoc($select_categories_id)) {
                $type_id = $row['type_id'];
                $type_name = $row['type_name'];

            ?>

     <input value="<?php echo $type_name; ?>" type="text" class="form-control" name="type_name">
            
        
            <?php 
            }
        
        }   ?>
       


     <?php   

        /////////// UPDATE QUERY

        if(isset($_POST['update_category'])) {

            $the_type_name = escape($_POST['type_name']);

            $stmt = mysqli_prepare($connection, "UPDATE types SET type_name = ? WHERE type_id = ? ");

             mysqli_stmt_bind_param($stmt, 'si', $the_type_name, $type_id);

             mysqli_stmt_execute($stmt);


                if(!$stmt){

                      die("QUERY FAILED" . mysqli_error($connection));

                }

                mysqli_stmt_close($stmt);


                redirect("types.php");

         }

    ?>
      </div>
      
      
        <div class="form-group">
              <input class="btn btn-primary" type="submit" name="update_category" value="Update TYPE">
        </div>

    </form>
