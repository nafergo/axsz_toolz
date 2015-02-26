<head>
<link rel="stylesheet" href="css/default.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>

<title>Festivalz > festival submitted</title>
</head>
<body>
    <div id="bar">
	    <div id="nav">
		<a href="index.php"><img src='img/list.png' alt='Festivals' title='Festivals'></a>
		<a href="admin.php"><img src='img/admin.png' alt='Admin' title='Admin'></a>
	    </div>    
    </div>    


<?php



$festivalname = $_POST['festival'];

$festivalcountry = $_POST['country'];

$festivalurl = $_POST['url'];

$festivaldate = $_POST['date'];

$festivalsubmissions = $_POST['submissions'];

$festivalprice = $_POST['price'];

$festivalgenre = $_POST['genre'];

$festivalnotes = $_POST['notes'];



//the data

$festivaldata = "$festivalname | $festivalcountry | $festivalurl | $festivaldate | $festivalsubmissions | $festivalprice | $festivalgenre | $festivalnotes\n";



//open the file and choose the mode

$fh = fopen("festivals.txt", "a");

fwrite($fh, $festivaldata);



//close the file

fclose($fh);



print "<div id='title'>New festival submitted!</div>";

?>
</body>
