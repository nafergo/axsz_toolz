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

function Redirect()
{
    window.location="admin.php";
}

document.write("You will be riiiiiiiiiiiedirected to main page in 1 sec.");
setTimeout('Redirect()', 1000);

</script>


</head>

<body>


<?php

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 250000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("uploads/userfiles/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploads/userfiles/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "uploads/userfiles/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }



$projectscene = $_POST['scene'];

$projectshot = $_POST['shot'];

$projectfile = $_POST['file'];

$projectimage = $_POST['image'];

$projectnotes = $_POST['notes'];



//the data

$projectdata = "$projectscene|$projectshot|$projectfile|$projectimage|$projectnotes\n";



//open the file and choose the mode

$fh = fopen("storyboardz.txt", "a");

fwrite($fh, $projectdata);



//close the file

fclose($fh);



print "<div id='title'>Shot ADDED!</div>";

?>

Tired of waiting?
<a href="index.php">click here</a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
