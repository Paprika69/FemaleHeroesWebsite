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

    <title>Search</title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="static/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="static/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="static/css/main.css" rel="stylesheet">
    <link href="static/css/animate.css" rel="stylesheet">
    <link href="static/css/ionicons.min.css" rel="stylesheet">
    <link href ="static/css/owl.carousel.css" rel="stylesheet">
    <link href="static/css/owl.theme.css" rel="stylesheet">
    <link href="static/css/jquery.fancybox.css" rel="stylesheet">

    <!-- for datatable -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- for datatables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="static/js/ie-emulation-modes-warning.js"></script>
    <!-- modernizr js -->
    <script src="static/js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- owl carouserl js -->
    <script src="static/js/owl.carousel.min.js"></script>
    <!-- bootstrap js -->

    <script src="static/js/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="static/js/wow.min.js"></script>
    <!-- slider js -->
    <script src="static/js/slider.js"></script>
    <script src="static/js/jquery.fancybox.js"></script>
    <!-- template main js -->
    <script src="static/js/main.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



  </head>

  <body>

        <header id="top-bar" class="navbar-fixed-top animated-header" style="position:sticky;top:0;">
            <div class="container" width="100%">
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
                            <img src="static/images/Codeworkslogo3.png" style="height:54px;width:183px; position:relative; top:-15px; left:0px;" alt="">
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
                Advanced Search Section Starts Here
            ================================================== -->
<div class="container">
<form action="search.php" method="POST">

<?php
          $host= "localhost";
          $username = "femmeheroes";
          $password = "code_works";
          $database = "femmeheroes";
          //create connection to mysql database
          $connection = mysqli_connect($host, $username, $password, $database);
            //get results from database
            $heroes_query = "SELECT heroes.hero_id, heroes.name FROM heroes";
            $heroesresult = mysqli_query($connection, $heroes_query);

echo "<select name='heroes'>";

 while ($row = mysqli_fetch_array($heroesresult, MYSQLI_ASSOC)) {
                  unset($id, $name);
                  $id = $row['hero_id'];
                  $name = $row['name']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
                 
            }
           
echo "</select>";

//dropdown series

$series_query = "SELECT series.series_id, series.series_title FROM series";
            $seriesresult = mysqli_query($connection, $series_query);

echo "<select name='series'>";

 while ($seriesrow = mysqli_fetch_array($seriesresult, MYSQLI_ASSOC)) {
                  unset($seriesid, $seriestitle);
                  $seriesid = $seriesrow['series_id'];
                  $seriestitle = $seriesrow['series_title']; 
                  echo '<option value="'.$seriesid.'">'.$seriestitle.'</option>';
                 
            }
           
echo "</select>";

//dropdown creator

$creators_query = "SELECT creators.creator_id, concat(creators.last_name, ', ', creators.first_name) as creator FROM creators;";
            $creatorsresult = mysqli_query($connection, $creators_query);

echo "<select name='creators'>";

 while ($creatorsrow = mysqli_fetch_array($creatorsresult, MYSQLI_ASSOC)) {
                  unset($creatorsid, $creatorsname);
                  $creatorsid = $creatorsrow['creator_id'];
                  $creatorsname = $creatorsrow['creator']; 
                  echo '<option value="'.$creatorsid.'">'.$creatorsname.'</option>';
                 
            }
           
echo "</select>";

         ?>

<input type="submit" name="submit">


<?php

if (isset($_POST)) {

$qry = "SELECT heroes.hero_id, heroes.name, series.series_title as series, concat(creators.first_name, ', ', creators.last_name) AS creator FROM heroes 
INNER JOIN hero_creator_jnct  ON heroes.hero_id = hero_creator_jnct.hero_id
INNER JOIN creators ON hero_creator_jnct .creator_id = creators.creator_id
INNER JOIN series_hero_jnct ON heroes.hero_id = series_hero_jnct.hero_id
INNER JOIN series ON series_hero_jnct.series_id = series.series_id";


$hid=$_POST['heroes'];
$sid=$_POST['series'];
$cid=$_POST['creators'];

$condition = '';

if($hid  != ''){
  $condition = " heroes.hero_id = " . $hid;
}


if($sid  != ''){
  if ($condition != ''){
    $condition = $condition . " AND series.series_id = " . $sid;
  }
  else {
    $condition = " series.series_id = " . $sid;
  }
}

  if($cid  != ''){
  if ($condition != ''){
    $condition = $condition . " AND creators.creator_id = " . $cid;
  }
  else {
    $condition = " creators.creator_id = " . $cid;
  }
  }

if ($condition != ''){
  $qry = $qry . " WHERE " . $condition;
}


         echo '<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
         <thead>
            <tr>
                <th>Name</th>
                <th>Series</th>
                <th>Creator</th>
            </tr>
         </thead>';


            $result = mysqli_query($connection, $qry);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $values[] = array(
                'hero_id' => $row['hero_id'],//This is the key that directs you into each hero's page
                'name' => $row['name'],
                'series' => $row['series'],
                'creator' => $row['creator']
                );
            }

             foreach($values as $v) {
                 print "
                 <tr>
                     <td><a href='heroes.php?hero_id=$v[hero_id]'>".$v['name']."</a></td>
                     <td>".$v['series']."</td>
                     <td>".$v['creator']."</td>
                 </tr>
                 ";
             }
             mysqli_close($connection);


         echo "</table>";


}


?>



</form>

</div>


      <!--
            ==================================================
                Footer Part
            ================================================== -->

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