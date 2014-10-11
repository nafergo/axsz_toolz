<head>
<link rel="stylesheet" href="css/default.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>

<title>Festivalz > festival deleted</title>
</head>
<body>
    <div id="bar">
	    <div id="nav">
		<a href="index.php"><img src='img/list.png' alt='Festivals' title='Festivals'></a>
		<a href="admin.php"><img src='img/admin.png' alt='Admin' title='Admin'></a>
	    </div>    
    </div>    



<?php

$Lines = file("festivals.txt");

$cLines = count($Lines);

$dlete = $_POST['festival'];



  foreach($Lines as $Key => $Val) { 



   $Data[$Key] = explode("|", $Val);



    if ( trim($Data[$Key][0]) == $dlete ) {



     unset($Lines[$Key]);

     $fp = fopen("festivals.txt", "w");

     $fw = fwrite($fp, implode('', $Lines));

     fclose($fp);



    }



  }



print "<div id='title'>Festival DELETED!</div>";



?>

</body>


