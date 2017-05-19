<?php include "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/blog-home.css" rel="stylesheet">
    <link href="assets/css/style_me.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ICU </a>
            </div>
           
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="http://icareuserver.comscisau.com/org/mainshow0.php">Map</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <div class="row">

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
  
        ?>
 <div class="col-sm-12">
              <section class="blog-post">
                <div class="panel panel-default">


                  <img src="<?php echo $ac_photo?>" class="img-responsive center-cropped">


                  <div class="panel-body">
                    <div class="blog-post-meta">
                      <span class="label label-light label-info">Trends</span>
                      <p class="blog-post-date pull-right"><?php echo $ac_create_date?></p>
                    </div>
                    <div class="blog-post-content">
                      <a href="#">
                        <h2 class="blog-post-title"><?php echo $ac_subject_type?></h2>
                      </a>



                      <p><?php echo $ac_detail?></p>



                      <a class="btn btn-info" href="post-image.html">Read more</a>


                      
                      <a class="blog-post-share pull-right" href="#">
                        
                        <i class=" ion-android-share-alt" style="font-size: 30px;"></i>
                      </a>

                    </div>
                  </div>
                </div>
              </section>
            </div>
        <?php
  }

?>


           


            <div class="col-sm-12">
              <section class="blog-post">
                <div class="panel panel-default">


                  <img src="backend/assets/images/cat.jpg" class="img-responsive center-cropped">


                  <div class="panel-body">
                    <div class="blog-post-meta">
                      <span class="label label-light label-info">Trends</span>
                      <p class="blog-post-date pull-right">February 16, 2016</p>
                    </div>
                    <div class="blog-post-content">
                      <a href="post-image.html">
                        <h2 class="blog-post-title">Like a little drop of ink</h2>
                      </a>
                      <p>Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem.</p>
                      <a class="btn btn-info" href="post-image.html">Read more</a>
                      <a class="blog-post-share pull-right" href="#">
                        <i class=" ion-android-share-alt" style="font-size: 30px;"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </section>


            </div>



          </div>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
