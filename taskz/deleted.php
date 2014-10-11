<head>

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

<link rel="stylesheet" href="default.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>

<title>TASKZ | task list for animation projects</title>



<?php

$Lines = file("project.txt");

$cLines = count($Lines);

$dlete = $_POST['task'];



  foreach($Lines as $Key => $Val) { 



   $Data[$Key] = explode("|", $Val);



    if ( trim($Data[$Key][2]) == $dlete ) {



     unset($Lines[$Key]);

     $fp = fopen("project.txt", "w");

     $fw = fwrite($fp, implode('', $Lines));

     fclose($fp);



    }



  }



print "<div id='title'>Task DELETED!</div>";



?>

Tired of waiting?
<a href="index.php">click here</a>

