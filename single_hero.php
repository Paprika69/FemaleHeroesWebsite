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

      <title>Hero</title>

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
                            <img src="static/images/logo.png" style="height:54px;width:240px; position:relative; top:-15px; left:0px;ß" alt="">
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
        Hero Detail Section Start
        ================================================== -->

        <!--Hi, Mitch. Please add your codes below to make the info page detailed and beautiful:-->
        <?php
            //Get http request parameters
            $hero_id = $_GET['hero_id'];
	    $creator_id = $_GET['creator_id'];
            $hero_creator_id = $_GET['hero_creator_id'];

            $host= "localhost";
		    $username = "femmeheroes";
		    $password = "";
		    $database = "femmeheroes";

		    //create connection to mysql database
		    $connection = mysqli_connect($host, $username, $password, $database);

            //get results from database
            $hero_query = "SELECT heroes.hero_id, heroes.name, heroes.real_name, heroes.image, heroes.height, heroes.weight, heroes.powers_abilities, heroes.battle_rating, heroes.description, creators.creator_id, creators.first_name, creators.middle_name, creators.last_name, creators.suffix, creators.image
                               FROM heroes, creators, hero_creator_jnct
                               WHERE heroes.hero_id = $hero_id, creators.creator_id = $creator_id, hero_creator_jnct.hero_creator_id = $hero_creator_id
                              AND heroes.hero_id = hero_creator_jnct.hero_id
                              AND hero_creator_jnct.creator_id = creators.creator_id;"

            $result = mysqli_query($connection, $hero_query);
            $row = mysqli_fetch_array($result);

            print "<div><img src='static/images/$row[image]'></div></ b>";
            print "<h3>Name:</h3></ b> $row[name]";
            print "<h3>Real Name:</h3></ b> $row[real_name]";
            print "<h3>Height:</h3></ b> $row[height] <h3>Weight:</h3></ b> $row[weight]";
            print "<h3>Battle Rating:</h3></ b> $row[battle_rating] out of 7";
            print "<h3>Powers & Abilities:</h3></ b> <p>$row[powers_abilities]";
            print "<h3>Description:</h3></ b> $row[description]";
        ?>





        <!--==================================================-->
        <!--Footer Section Start-->
        <!--================================================== -->
    <footer id="footer">
        <div class="container">
            <div class="col-md-6">
            <p class="copyright">Copyright: <span>2017</span> . Design and Developed by Code Works</p>
            </div>
        </div>
    </footer> <!-- /#footer -->
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="static/js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>
