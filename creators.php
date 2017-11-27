<!DOCTYPE html>
<html lang="en">
  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">

      <title>Creators</title>

      <!-- Bootstrap core CSS -->
      <link href="static/css/bootstrap.min.css" rel="stylesheet">

      <!-- for datatable -->
      <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <link href="static/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="static/css/jumbotron-narrow.css" rel="stylesheet">

      <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
      <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
      <script src="static/js/ie-emulation-modes-warning.js"></script>

      <!-- for datatables -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Basic Page Needs
================================================== -->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <!-- Mobile Specific Metas
      ================================================== -->
      <meta name="format-detection" content="telephone=no">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Template CSS Files
      ================================================== -->
      <!-- Twitter Bootstrs CSS -->
      <link rel="stylesheet" href="static/css/bootstrap.min.css">
      <!-- Ionicons Fonts Css -->
      <link rel="stylesheet" href="static/css/ionicons.min.css">
      <!-- animate css -->
      <link rel="stylesheet" href="static/css/animate.css">
      <!-- Hero area slider css-->
      <link rel="stylesheet" href="static/css/slider.css">
      <!-- owl craousel css -->
      <link rel="stylesheet" href="static/css/owl.carousel.css">
      <link rel="stylesheet" href="static/css/owl.theme.css">
      <link rel="stylesheet" href="static/css/jquery.fancybox.css">
      <!-- template main css file -->
      <link rel="stylesheet" href="static/css/main.css">
      <!-- responsive css -->
      <link rel="stylesheet" href="static/css/responsive.css">


  </head>

  <body>


        <!--
        ==================================================
        Header Section Start
        ================================================== -->
        <header id="top-bar" class="navbar-fixed-top animated-header" style="position:sticky;top:0;">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->

                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="index.php" >
                            <img src="static/images/Codeworkslogo3.png" style="height:54px;width:240px; position:relative; top:-15px; left:0px;" alt="">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="index.php" >Home</a>
                            </li>
                            <li><a href="heroes.php">Heroes</a></li>
                            <li><a href="creators.php">Creators</a></li>
                            <li><a href="series.php">Series</a></li>
                            <li><a href="search.php">Search</a></li>
                            <li><a href="about.php">About</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>

<!--
        ==================================================
        Table Section Start
        ================================================== -->

         <?php
            $host= "localhost";
		    $username = "femmeheroes";
		    $password = "code_works";
		    $database = "femmeheroes";
		    //create connection to mysql database
		    $connection = mysqli_connect($host, $username, $password, $database);
            //get results from database
            $creator_query = "SELECT creators.creator_id, creators.first_name, creators.middle_name, creators.last_name, creators.suffix
                               FROM creators";
            $result = mysqli_query($connection, $creator_query);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $values[] = array(
                'creator_id' => $row['creator_id'],//This is the key that directs you into each hero's page
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name'],
                'suffix' => $row['suffix']
                );
            }
         ?>

         <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
         <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Suffix</th>
            </tr>
         </thead>
         <?php
             foreach($values as $v) {
                 print "
                 <tr>
                     <td>".$v['first_name']."</td>
                     <td>".$v['middle_name']."</td>
                     <td>".$v['last_name']."</td>
                     <td>".$v['suffix']."</td>
                 </tr>
                 ";
             }
             mysqli_close($connection);
         ?>

         </table>

        <!--==================================================-->
        <!--Footer Section Start-->
        <!--================================================== -->
    <footer id="footer">
        <div class="container">
            <div class="col-md-6">
            <p class="copyright">Copyright: <span>2017</span> . Designed and Developed by Code Works</p>
            </div>
        </div>
    </footer> <!-- /#footer -->
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="static/js/ie10-viewport-bug-workaround.js"></script>

    <!-- for datatable sorting, show entries and search functions -->
    <script>
      $(document).ready(function() {
        $('#table').DataTable({
          "order": [[ 0, "asc" ]],
          "iDisplayLength": 20,
          "columnDefs": [
              { "width": "25%", "targets": 0 },
              { "width": "25%", "targets": 1 },
              { "width": "25%", "targets": 2 },
              { "width": "25%", "targets": 3 },
          ]
        });
      });
    </script>

  </body>
</html>
