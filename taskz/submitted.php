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

<title>TASKZ | task list for animation projects</title></head>



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
&& ($_FILES["file"]["size"] < 200000)
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

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }



$projectscene = $_POST['scene'];

$projectshot = $_POST['shot'];

$projecttask = $_POST['task'];

$projecttasktype = $_POST['tasktype'];

$projectassigned = $_POST['assigned'];

$projecttaskstatus = $_POST['taskstatus'];

$projectdeadline = $_POST['deadline'];

$projecturl = $_POST['url'];

$projectfile = $_POST['file'];

$projectimage = $_POST['image'];

$projectnotes = $_POST['notes'];



//the data

$projectdata = "$projectscene|$projectshot|$projecttask|$projecttasktype|$projectassigned|$projecttaskstatus|$projectdeadline|$projecturl|$projectfile|$projectimage|$projectnotes\n";



//open the file and choose the mode

$fh = fopen("project.txt", "a");

fwrite($fh, $projectdata);



//close the file

fclose($fh);



print "<div id='title'>Task ADDED!</div>";

?>

Tired of waiting?
<a href="index.php">click here</a>

