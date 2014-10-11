<html>
<head>

	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="A web tool for storyboards">
	<meta name="keywords" content="storyboard, animation, movie, shot">
	<meta name="author" content="nafergo" >

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<script src="js/holder.js"></script>
	
	<link rel="stylesheet" href="css/storyboardz.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>
	
	

	<title>STORYBOARDZ</title>
	
</head>
<body>
	<?php include("header.php"); ?> 

<div class="container-fluid">
	<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
  <!-- Indicators -->


  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="uploads/userfiles/slideshow.jpg" width="1280" height="720" alt="...">
      <div class="carousel-caption">
        fff
      </div>
    </div>
    


<?php
$lines = file('storyboardz.txt');
$array = array();
$sort = $_GET['sort'];
if(!isset($sort)){
    $sort = 'shot';
}

foreach($lines as $line){
    $explode = explode("|",$line);
    $array['scene'][] = $explode[0];
    $array['shot'][] = $explode[1];
    $array['file'][] = $explode[2];
    $array['image'][] = $explode[3];
    $array['notes'][] = $explode[4];
}

natsort($array[$sort]);
foreach($array[$sort] as $key=>$ray){


echo "<div class='item'>";
echo "<img src='uploads/userfiles/".$array['image'][$key]."' width='1280' height='720' alt='...'>";
echo "<div class='carousel-caption'>";
echo "".$array['shot'][$key]."</div>";
echo "</div>";
    }

?> 

	


        
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>


</div>
<div class="col-md-2"></div>
</div></div>





	<?php include("footer.php"); ?> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
