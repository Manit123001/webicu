<?php include "includes/header.php" ?>

<div class="wrapper">

  <?php include "includes/navigation.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>


      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>

    </section>




    <!-- Main content -->
    <section class="content">

      <!-- Small boxes (Stat box) -->
      <div class="row">
  		    <div class="col-lg-3 col-xs-6">
            
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>

                <?php 

                $query = "SELECT * FROM members";
                $select_all_members = mysqli_query($connection,$query);
                $members_count = mysqli_num_rows($select_all_members);

                echo  $members_count;

                ?>

                </h3>

                <p>All Users</p>

              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          


          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>

                <?php 

                $query = "SELECT * FROM departments";
                $select_all_departments = mysqli_query($connection,$query);
                $departments_count = mysqli_num_rows($select_all_departments);

                echo  $departments_count;

                ?>

                </h3>
                <p>All Departments</p>
              </div>
              <div class="icon">
                <i class="ion ion-help-buoy"></i>
              </div>
              <a href="departments.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          

          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>
                <?php 

                $query = "SELECT * FROM acidents";
                $select_all_acidents = mysqli_query($connection,$query);
                $acidents_count = mysqli_num_rows($select_all_acidents);

                echo $acidents_count;

                ?>
                </h3>

                <p>All Acidents</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-location"></i>
              </div>
              <a href="acidents.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>  
          </div>
          

          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>
                <?php 

                $query = "SELECT * FROM warnings";
                $select_all_warnings = mysqli_query($connection,$query);
                $warnings_count = mysqli_num_rows($select_all_warnings);

                echo $warnings_count;

                ?>
                </h3>

                <p>Warnings</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-warning"></i>
              </div>
              <a href="warnings.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
       </div>


       	<div class="row">

          
    <?php 

$query = "SELECT * FROM warnings";
$select_all_published_posts = mysqli_query($connection,$query);
$post_published_count = mysqli_num_rows($select_all_published_posts);
                                     

                                      
$query = "SELECT * FROM warnings";
$select_all_draft_posts = mysqli_query($connection,$query);
$post_draft_count = mysqli_num_rows($select_all_draft_posts);


$query = "SELECT * FROM warnings";
$unapproved_comments_query = mysqli_query($connection,$query);
$unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);


$query = "SELECT * FROM warnings";
$select_all_subscribers = mysqli_query($connection,$query);
$subscriber_count = mysqli_num_rows($select_all_subscribers);



    ?>
<!-- google chart-->
<!--https://developers.google.com/chart/interactive/docs/gallery/columnchart-->
<div class="row">
                    
<script type="text/javascript">
                        
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
        
      function drawChart() {
          
            var data = google.visualization.arrayToDataTable([
              ['Data', 'Count'],

                <?php                   
    $element_text = ['All Posts','Active Posts','Draft Posts', 'Comments','Pending Comments', 'Users','Subscribers', 'Categories'];       
    $element_count = [$post_count,$post_published_count, $post_draft_count, $comment_count,$unapproved_comment_count, $user_count,$subscriber_count,$category_count];

                    for($i =0;$i < 8; $i++) {
                        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                    }                                           
                ?>

            ]);

            var options = {
                chart: {
                title: '',
                subtitle: '',
                }
            };

          
          
            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, options);
      }
</script>
           

</div>





  </div>
  <!-- /.content-wrapper -->



  

<?php include "includes/footer.php" ?>


<?php 
  $query = "SELECT * FROM members ";
  $select_all_users = mysqli_query($connection,$query);
  $member_count = mysqli_num_rows($select_all_users);
                                       
 ?>