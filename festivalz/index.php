<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/default.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<title>Festivalz | Festivals Agenda</title>

</head>
<body>
    <div id="bar">
	    <div id="nav">
		<a href="index.php"><img src='img/list.png' alt='Festivals' title='Festivals'></a>
		<a href="admin.php"><img src='img/admin.png' alt='Admin' title='Admin'></a>
	    </div>    
    </div>    


    <div id="wrapper">

<h1>Festivalz</h1>

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


asort($array[$sort]);

echo "<table class='bordered' cellspacing='2' cellpadding='5'>\n";

echo " <thead><tr>\n";

echo "\t<th>Festival<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=festival'><img src='img/sort.png' alt='Sort' title='Sort'></a></th>\n\t

<th>Location<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=country'><img src='img/sort.png' alt='Sort' title='Sort'></a></th>\n\t

<th>Homepage</th>\n\t

<th>Date<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=date'><img src='img/sort.png' alt='Sort' title='Sort'></a></th>\n\t

<th>Deadline<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=submission'><img src='img/sort.png' alt='Sort' title='Sort'></a></th>\n\t

<th>Fee<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=price'><img src='img/sort.png' alt='Sort' title='Sort'></a></th>\n\t

<th>Genre<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=genre'><img src='img/sort.png' alt='Sort' title='Sort'></a></th>\n\t

<th>Notes</th>\n";

echo " </tr></thead>\n";

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
<div id="sourceslist">
<ul>
	<li>Sources</li>
	<li><a href="http://www.animation-festivals.com/" target="_blank">animation-festivals.com</a></li>
	<li><a href="http://en.wikipedia.org/wiki/List_of_international_animation_festivals" target="_blank">Wikipedia List of international animation festivals</a></li>
	<li><a href="http://www.sharonkatz.net/features/fest_workshop/festival_list.html" target="_blank">Sharon Katz animation festivals list</a></li>
	<li><a href="http://www.blog.filmfestivallife.com/2012/01/31/animation-list/" target="_blank">Animation Festival List @ FilmFestivalLifeLine</a></li>
	<li><a href="http://www.awn.com/village/festivals.php3" target="_blank">AWN Festival and Event Directory</a></li>
</ul>
</div>
</div>
</body>
