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
	
	
	<link rel="stylesheet" href="css/storyboardz.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>

	<title>STORYBOARDZ</title>
	


<script type="text/javascript">
<!--
function Redirect()
{
    window.location="index.php";
}

document.write("You will be redirected to main page in 1 sec.");
setTimeout('Redirect()', 1000);
//-->
</script>
</head>
<body>



<?php

$Lines = file("storyboardz.txt");

$cLines = count($Lines);

$dlete = $_POST['shot'];



  foreach($Lines as $Key => $Val) { 



   $Data[$Key] = explode("|", $Val);



    if ( trim($Data[$Key][1]) == $dlete ) {



     unset($Lines[$Key]);

     $fp = fopen("storyboardz.txt", "w");

     $fw = fwrite($fp, implode('', $Lines));

     fclose($fp);



    }



  }



print "<div id='title'>Shot DELETED!</div>";



?>

Tired of waiting?
<a href="index.php">click here</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
