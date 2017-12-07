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

      <title>Heroes</title>

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
                            <img src="static/images/Codeworkslogo3.png" style="height:54px;width:160px; position:relative; top:-15px; left:0px;" alt="">
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

<div class="container">
<h1>Superheroes</h1>
         <?php
            $host= "localhost";
        $username = "femmeheroes";
        $password = "code_works";
        $database = "femmeheroes";
        //create connection to mysql database
        $connection = mysqli_connect($host, $username, $password, $database);
            
//create form
print "<form action='heroes.php' method='GET'>";
//hero search dropdown menu
print "<select name='hero_id'><option value='Choose'> Select a Superhero</option>";
$listresult = mysqli_query($connection, "SELECT hero_id, name, real_name, height, weight, powers_abilities, battle_rating, description FROM heroes ORDER BY name");
  while ($row = mysqli_fetch_array($listresult)) {
    print "<option value='$row[hero_id]'>$row[name]</option>";
  }
print "</select>";
print " <input type='submit' value='Select'>";
print "</form>";

// Display hero info when selected
if(isset($_GET['hero_id'])) {
  $hero = $_GET['hero_id'];
  $cleanhero = preg_replace ("/[^ 0-9a-zA-Z]+/", "", $hero); //sanitize
  $heroquery = "SELECT hero_id, name, real_name,
          height, weight, powers_abilities, image, battle_rating, description
          FROM heroes
          WHERE hero_id = $cleanhero";
  $heroresults = mysqli_query($connection, $heroquery);
  $heroresultsrow = mysqli_fetch_array($heroresults);

//Display heroes table contents
            print "<h2>$heroresultsrow[name]</h2>";
            print "<img src='static/images/$heroresultsrow[image]' style='float: left; padding:20px' width='30%'>";
            print "<table id='table' style='float: left' cellspacing='0' width='70%'>
            <tr>
                <th><h3>Real Name</h3></th>
                <th><h3>Height</h3></th>
                <th><h3>Weight</h3></th>
                <th><h3>Battle Rating</h3></th>
            </tr>
         	<tr><td>$heroresultsrow[real_name]</td>
            			<td>$heroresultsrow[height]</td>
            			<td>$heroresultsrow[weight]</td>
            			<td>$heroresultsrow[battle_rating] out of 7</td></tr></table><br />";
            print "<br /><br /><h3 style='padding-top: 20px'>Powers & Abilities:</h3></ b> <p>$heroresultsrow[powers_abilities]";
            print "<h3>Description:</h3></ b> $heroresultsrow[description]";


//Join hero and creator tables
  $herocreatorquery = "SELECT creators.creator_id AS creatorid, creators.first_name AS creatorfirstname, creators.middle_name AS creatormiddlename, creators.last_name AS creatorlastname, creators.suffix AS creatorsuffix, creators.image AS creatorimage
          FROM heroes, creators, hero_creator_jnct
          WHERE heroes.hero_id = hero_creator_jnct.hero_id AND heroes.hero_id = $cleanhero AND creators.creator_id = hero_creator_jnct.creator_id
          GROUP BY creatorfirstname";
  $herocreatorresults = mysqli_query($connection, $herocreatorquery);


  print "<h2>Creator</h2>";

//this is what allows each hero to show multiple creators on one page

    while ($row = mysqli_fetch_array($herocreatorresults, MYSQLI_ASSOC)) {
                $values[] = array(
                'creator_id' => $row['creatorid'],
                'creator_first_name' => $row['creatorfirstname'],
                'creator_middle_name' => $row['creatormiddlename'],
                'creator_last_name' => $row['creatorlastname'],
                'creator_suffix' => $row['creatorsuffix'],

                //This is the key that directs you into each hero's page
                );
    }
    foreach($values as $v) {
                 print "
                    <p><a href='creators.php?creator_id=$v[creator_id]'>{$v['creator_first_name']} {$v['creator_middle_name']} {$v['creator_last_name']}</a></p>
                 ";
    }


  //Join hero and series tables

  $heroseriesquery = "SELECT series.series_id AS seriesid, series_title AS seriestitle, series.start_date AS seriesstartdate, series.end_date AS seriesenddate
          FROM heroes, series, series_hero_jnct
          WHERE heroes.hero_id = series_hero_jnct.hero_id AND heroes.hero_id = $cleanhero AND series.series_id = series_hero_jnct.series_id
          ORDER BY seriestitle";
  $heroseriesresults = mysqli_query($connection, $heroseriesquery);


  print "<h2>Starring in these Series</h2>";

  while ($row = mysqli_fetch_array($heroseriesresults, MYSQLI_ASSOC)) {
                $results[] = array(
                'series_id' => $row['seriesid'],
                'series_title' => $row['seriestitle']
                //This is the key that directs you into each hero's page
                );
    }
    foreach($results as $r) {
                 print "
                    <p><a href='series.php?series_id=$r[series_id]'>".$r['series_title']."</a></p>
                 ";
    }
}


else {  // If hero not selected
  print "<br><p>Please choose a Superhero from the dropdown menu. </p><br/>";
  print "<div class=\"container\"><img src='static/images/hero.jpg' style=\"width:65%\"></div></ b>";
}

              mysqli_close($connection);
?>

    
           
</div>

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
  </body>
</html>
