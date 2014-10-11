<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/default.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>

<script>
$(function() {
$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
});
</script>

<title>Festivalz > admin</title>
</head>
<body>
<body>
    <div id="bar">
	    <div id="nav">
		<a href="index.php"><img src='img/list.png' alt='Festivals' title='Festivals'></a>
		<a href="admin.php"><img src='img/admin.png' alt='Admin' title='Admin'></a>
	    </div>    
    </div>    


    <div id="wrapper">


<table width="100%">
<tr>
<td id="submit">
<div id="title">Festival submission</div>
<div id="notice">Please don't leave any blanks. If needed, fill with ...</div>

<form name="form1" method="post" action="submitted.php">
<table id="formtable" cellpadding="5">
	<tr id="formfestival">
		<td>Festival</td><td><input type="text" name="festival"></td>
	</tr>
	<tr id="formlocation">
		<td>Country (City)</td><td><input type="text" name="country"></td>
	</tr>
	<tr id="formhomepage">
		<td>URL</td><td><input type="url" name="url" value="http://"></td>
	</tr>
	<tr id="formdate">
		<td>Date<br></td><td><input type="text" name="date" class="datepicker" />
</td>
	</tr>
	<tr id="formsubmission">
		<td>Deadline for submissions</td><td><input type="text" name="submissions" class="datepicker"></td>
	</tr>
	<tr id="formprice">
		<td>Price</td><td><input type="number" name="price"></td>
	</tr>
	<tr id="formgenre">
		<td>Genre</td><td><select name="genre">
  <option value="animation only">animation only</option>
  <option value="animation category">animation category</option>
  <option value="free for all">free for all</option>
</select></td>
	</tr>
	<tr id="formnotes">
		<td>Notes</td><td><input type="text" name="notes"></td>
	</tr>

</table>

<input type="submit" name="Submit" value="Submit"> </form>

</td>
<td id="delete">
<div id="titledelete">Festival delete</div>
<div id="notice">Please write the exact name of the festival you want to delete!<br>
Careful, there's no undo for this!</div>
<form name="form2" method="post" action="deleted.php"><br><input type="text" name="festival"><br> <input type="submit" name="Submit" value="Delete"></form>
</td>
</tr>
</table>




<?php
$myfile = "festivals.txt";
if (isset($_POST['ta'])) {
    $newData = nl2br(htmlspecialchars($_POST['ta']));
    $handle = fopen($myfile, "w");
    fwrite($handle, $newData);
    fclose($handle);
}
// ------------------------------------------------
if (file_exists($myfile)) {

    $myData = file_get_contents($myfile);
}
?>

<br />
<br />
<br />
<form action="admin.php" method="post">
<textarea name="ta" id="textareaediting" rows="20">
<?php echo str_replace("<br />","",$myData); ?>
</textarea>
<br /><br />
<input name="myBtn" type="submit" />
</form>



<?php
$lines = file('festivals.txt');
$array = array();
$sort = $_GET['sort'];
if(!isset($sort)){
    $sort = 'festival';
}
foreach($lines as $line){
    $explode = explode("|",$line);
    $array['festival'][] = $explode[0];
    $array['country'][] = $explode[1];
    $array['url'][] = $explode[2];
    $array['date'][] = $explode[3];
    $array['submission'][] = $explode[4];
    $array['price'][] = $explode[5];
    $array['genre'][] = $explode[6];
    $array['notes'][] = $explode[7];
}



echo "<div id='title'>Festivals database</div>\n";



asort($array[$sort]);
echo "<table cellspacing='2' cellpadding='5'>\n";
echo "  <tr class='labels'>\n";
echo "\t<td>Festival <a href='".$_SERVER['PHP_SELF']."?sort=festival'><img src='img/sort.png'></a></td>\n\t
<td class='labelstwo'>Location <a href='".$_SERVER['PHP_SELF']."?sort=country'><img src='img/sort.png'></a></td>\n\t
<td>Homepage <a href='".$_SERVER['PHP_SELF']."?sort=url'><img src='img/sort.png'></a></td>\n\t
<td class='labelstwo'>Date <a href='".$_SERVER['PHP_SELF']."?sort=date'><img src='img/sort.png'></a></td>\n\t
<td>Deadline <a href='".$_SERVER['PHP_SELF']."?sort=submission'><img src='img/sort.png'></a></td>\n\t
<td class='labelstwo'>Price <a href='".$_SERVER['PHP_SELF']."?sort=price'><img src='img/sort.png'></a></td>\n\t
<td>Genre <a href='".$_SERVER['PHP_SELF']."?sort=genre'><img src='img/sort.png'></a></td>\n\t
<td class='labelstwo'>Notes <a href='".$_SERVER['PHP_SELF']."?sort=notes'><img src='img/sort.png'></a></td>\n";

echo " </tr>\n";
foreach($array[$sort] as $key=>$ray){
    echo ' <tr>';
    echo "\t<td id='listfestival'>".$array['festival'][$key]."</td>\n";
    echo "\t<td id='listlocation'>".$array['country'][$key]."</td>\n";
    echo "\t<td id='listhomepage'><a href='".$array['url'][$key]."'>".$array['url'][$key]."</a></td>\n";
    echo "\t<td id='listdate'>".$array['date'][$key]."</td>\n";
    echo "\t<td id='listsubmission'>".$array['submission'][$key]."</td>\n";
    echo "\t<td id='listprice'>".$array['price'][$key]."</td>\n";
    echo "\t<td id='listgenre'>".$array['genre'][$key]."</td>\n";
    echo "\t<td id='listnotes'>".$array['notes'][$key]."</td>\n";
    echo " </tr>\n";
}
echo '</table>';
?> 

</div>
</body>
