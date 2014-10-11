
<link rel="stylesheet" href="css/default.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>

<title>TASKZ | task list for animation projects</title>
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
});
</script>
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
<script>
  function storeUserScribble(id) {
    var scribble = document.getElementById("scribble").innerHTML;
    localStorage.setItem("userScribble",scribble);
  }

  function getUserScribble() {
    if ( localStorage.getItem("userScribble")) {
      var scribble = localStorage.getItem("userScribble");
    }
    else {
      var scribble = "You can write here but<br>this text only exists<br> in your browser!";
    }
    document.getElementById("scribble").innerHTML = scribble;
  }

  function clearLocal() {
    clear: localStorage.clear();
    return false;
  }
</script> 

<script>
$(document).ready(function(){
  $("td.listtaskstatus:contains(done)").css("background-color","green");
  $("td.listtaskstatus:contains(paused)").css("background-color","red");
  $("td.listtaskstatus:contains(waiting)").css("background-color","orange");
  $("td.listtaskstatus:contains(in progress)").css("background-color","yellow");

});
</script>

</head>
<body>

<div id="tabs">
<ul>
<li><a href="#tabs-1"><img src='img/list.png' alt='Tasks' title='Tasks'></a></li>
<li><a href="#tabs-2"><img src='img/add.png' alt='Add' title='Add'></a></li>
<li><a href="#tabs-3"><img src='img/delete.png' alt='Delete' title='Delete'></a></li>
<li><a href="#tabs-4"><img src='img/edit.png' alt='Edit' title='Edit'></a></li>
<li><a href="#tabs-5"><img src='img/help.png' alt='Help' title='Help'></a></li>
</ul>

<div id="tabs-1">
<p>
	<div class='subtitle'>List ordered by TASK ID</div>
	<div class='title'>TASKZ</div>

<?php
$lines = file('project.txt');
$array = array();
$sort = $_GET['sort'];
if(!isset($sort)){
    $sort = 'task';
}
foreach($lines as $line){
    $explode = explode("|",$line);
    $array['scene'][] = $explode[0];
    $array['shot'][] = $explode[1];
    $array['task'][] = $explode[2];
    $array['tasktype'][] = $explode[3];
    $array['assigned'][] = $explode[4];
    $array['taskstatus'][] = $explode[5];
    $array['deadline'][] = $explode[6];
    $array['url'][] = $explode[7];
    $array['file'][] = $explode[8];
    $array['image'][] = $explode[9];
    $array['notes'][] = $explode[10];
}


natsort($array[$sort]);
echo "<table class='display' cellspacing='2' cellpadding='5'>\n";
echo "  <tr class='labels'>\n";
echo "\t<td>Scene ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=scene'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Shot ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=shot'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td>Task ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=task'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Task type<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=tasktype'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td>Assigned to<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=assigned'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Task status<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=taskstatus'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td>Deadline<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=deadline'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>URL</td>\n\t
<td>Image</td>\n\t
<td class='labelstwo'>Notes</td>\n\t
<td>Personal notes</td>\n";

echo " </tr>\n";
foreach($array[$sort] as $key=>$ray){
    echo ' <tr>';
    echo "\t<td class='listscene'>".$array['scene'][$key]."</td>\n";
    echo "\t<td class='listshot'>".$array['shot'][$key]."</td>\n";
    echo "\t<td class='listtask'>".$array['task'][$key]."</td>\n";
    echo "\t<td class='listtasktype'>".$array['tasktype'][$key]."</td>\n";
    echo "\t<td class='listassigned'>".$array['assigned'][$key]."</td>\n";
    echo "\t<td class='listtaskstatus'>".$array['taskstatus'][$key]."</td>\n";
    echo "\t<td class='listdeadline'>".$array['deadline'][$key]."</td>\n";
    echo "\t<td class='listurl'><a href='".$array['url'][$key]."' target='_blank'><img src='img/url.png'></a></td>\n";
    echo "\t<td class='listimage'><a href='upload/".$array['image'][$key]."' target='_blank'><img src='upload/".$array['image'][$key]."'></a></td>\n";
    echo "\t<td class='listnotes'>".$array['notes'][$key]."</td>\n";
    echo "\t<td class='listcomments'>
<pre id='scribble' contenteditable='true' onkeyup='storeUserScribble(this.id);'>You can write here!</pre>
<a class='c-link' href='' onclick='javascript:clearLocal();'>Clear local storage</a>

<script>
  getUserScribble();
</script>


</td>\n";
    echo " </tr>\n";
}
echo '</table>';


?> 

</p>
</div>

<div id="tabs-2">
<p>
	<div class="subtitle">Task submission form</div>
	<div class="title">TASKZ</div>

<table width="100%">
<tr>
<td valign="top">
<td id="submit" valign="top">
<div id="noticeform">Please don't leave any blanks. If needed, fill with ...</div>

<form name="form1" method="post" action="submitted.php" target="_blank" enctype="multipart/form-data">
<table cellpadding="5" id="formtable">
	<tr id="formscene">
		<td>Scene ID</td><td><input type="text" name="scene"></td>
	</tr>
	<tr id="formshot">
		<td>Shot ID</td><td><input type="text" name="shot"></td>
	</tr>
	<tr id="formtask">
		<td>Task ID</td><td><input type="text" name="task"></td>
	</tr>
	<tr id="formtasktype">
		<td>Task type</td><td><select name="tasktype">
		<option value="2D image">2D image</option>
		<option value="animation">animation</option>
		<option value="color correction">color correction</option>
		<option value="compositing">compositing</option>
		<option value="final render">final render</option>
		<option value="keying">keying</option>
		<option value="layout">layout</option>
		<option value="lighting">lighting</option>
		<option value="matchmoving">matchmoving</option>
		<option value="matte painting">matte painting</option>
		<option value="modeling">modeling</option>
		<option value="render passes">render passes</option>
		<option value="rigging">rigging</option>
		<option value="rotopaint">rotopaint</option>
		<option value="shading">shading</option>
		<option value="simulation">simulation</option>
		<option value="texturing">texturing</option>
		<option value="tracking">tracking</option>
		<option value="vfx">vfx</option>
		<option value="other">other</option>
		</select></td>

	</tr>

	<tr id="formassigned">
		<td>Assigned to</td><td><input type="number" name="assigned"> </td>
	</tr>

	<tr id="formtaskstatus">
		<td>Task status</td><td><select name="taskstatus">
		<option value="paused">paused</option>
		<option value="waiting">waiting</option>
		<option value="in progress">in progress</option>
		<option value="done">done</option>
		</select></td>

	</tr>

	<tr id="formdeadline">
		<td>Deadline<br></td><td><input type="text" name="deadline" id="datepicker" /></td>
	</tr>

	<tr id="formurl">
		<td>URL</td><td><input type="url" name="url" value="http://"></td>
	</tr>

	<tr id="formimage">
		<td>Image file name</td><td><input type="text" name="image" value="none.png"></td>
	</tr>

	<tr id="formfile">
		<td>Upload image<br>
		format: gif, jpeg, jpg or png<br>
		max-size: 200KB</td><td><input type="file" name="file" id="file"></td>
	</tr>

	<tr id="formnotes">
		<td>Notes</td><td><input type="text" name="notes"></td>
	</tr>

</table>

<input type="submit" name="Submit" value="Submit"> </form>
</td>
</td>
<td valign="top">

<?php


natsort($array[$sort]);
echo "<table class='display' cellspacing='2' cellpadding='5'>\n";
echo "  <tr class='labels'>\n";
echo "\t<td>Scene ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=scene'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Shot ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=shot'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td>Task ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=task'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Task type<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=tasktype'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td>Assigned to<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=assigned'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Task status<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=taskstatus'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n";

echo " </tr>\n";
foreach($array[$sort] as $key=>$ray){
    echo ' <tr>';
    echo "\t<td class='listscene'>".$array['scene'][$key]."</td>\n";
    echo "\t<td class='listshot'>".$array['shot'][$key]."</td>\n";
    echo "\t<td class='listtask'>".$array['task'][$key]."</td>\n";
    echo "\t<td class='listtasktype'>".$array['tasktype'][$key]."</td>\n";
    echo "\t<td class='listassigned'>".$array['assigned'][$key]."</td>\n";
    echo "\t<td class='listtaskstatus'>".$array['taskstatus'][$key]."</td>\n";
    echo " </tr>\n";
}
echo '</table>';


?> 

</td>
</tr>
</table>

</p>
</div>

<div id="tabs-3">
<p>

	<div class="subtitle">Delete task</div>
	<div class="title">TASKZ</div>


<table width="100%">
<tr>
<td valign="top">
<td id="delete" valign="top">
<div class="noticedelete">Please write the TASK ID you want to delete!</div>
<div class="noticedelete">Careful, there's no undo for this!</div>
<form name="form2" method="post" action="deleted.php"><br><input type="text" name="task"><br> <input type="submit" name="Submit" value="Delete"></form>

</td>
</td>
<td  valign="top">
<?php


natsort($array[$sort]);
echo "<table class='display' cellspacing='2' cellpadding='5'>\n";
echo "  <tr class='labels'>\n";
echo "\t<td>Scene ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=scene'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Shot ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=shot'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td><b>Task ID</b><a class='sort' href='".$_SERVER['PHP_SELF']."?sort=task'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Task type<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=tasktype'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td>Assigned to<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=assigned'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n\t
<td class='labelstwo'>Task status<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=taskstatus'><img src='img/sort.png' alt='Sort' title='Sort'></a></td>\n";

echo " </tr>\n";
foreach($array[$sort] as $key=>$ray){
    echo ' <tr>';
    echo "\t<td class='listscene'>".$array['scene'][$key]."</td>\n";
    echo "\t<td class='listshot'>".$array['shot'][$key]."</td>\n";
    echo "\t<td class='listtask'><b>".$array['task'][$key]."</b></td>\n";
    echo "\t<td class='listtasktype'>".$array['tasktype'][$key]."</td>\n";
    echo "\t<td class='listassigned'>".$array['assigned'][$key]."</td>\n";
    echo "\t<td class='listtaskstatus'>".$array['taskstatus'][$key]."</td>\n";
    echo " </tr>\n";
}
echo '</table>';


?> 
</td>
</tr>
</table>

</p>
</div>

<div id="tabs-4">
<p>

	<div class="subtitle">Edit database</div>
	<div class="title">TASKZ</div>


<div id='noticeedit'>Edit your database but BE CAREFUL!</div>

<?php
$myfile = "project.txt";
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
<form action="index.php" method="post">
<textarea name="ta" id="textareaediting" rows="20">
<?php echo str_replace("<br />","",$myData); ?>
</textarea>
<br /><br />
<input name="myBtn" type="submit" />
</form>

</p>
</div>


<div id="tabs-5">
<p>

	<div class="subtitle">Help and Info</div>
	<div class="title">TASKZ</div>


<div class='helpsubtitle'>PASSWORDS AND SECURITY</div>
<p>TASKZ comes with no security features. However, it's quite simple to implement protection through <a href="http://www.htaccesstools.com/articles/htpasswd/" target="_blank">htpasswd</a>.</p>
<br />
<br />
<br />
<div class='helpsubtitle'>THE MAIN LIST</div>
<p>It's the first tab and, by default, the list is sorted by the task id.</p>
<br />
<br />
<br />
<div class='helpsubtitle'>SUBMIT TASK</div>
<p>To create new tasks, use the form available at the second tab.</p>
<p>To avoid problems, <b>keep the Task ID unique</b> and <b>don't leave any blanks</b>. If needed, fill with ...</p>
<p>Task status color code:
	<ul id="helplist">
		<li >done = <span style="background-color:green">green</span></li>
		<li>paused = <span style="background-color:red">red</span></li>
		<li>waiting = <span style="background-color:orange">orange</span></li>
		<li>in progress = <span style="background-color:yellow">yellow</span></li>
	</ul>

</p>
<p>For the URL field, if you don't need/have one, just leave the http://</p>
<p>For the Image file name, if you don't need/have one, just leave the none.png</p>
<p>You don't need to upload a new image for each task. Because all images are uploaded to the same folder (upload). If the image you want to display is already (it was previously uploaded), just write it's name on the Image file name field.</p>
<br />
<br />
<br />
<div class='helpsubtitle'>DELETE TASKS</div>
<p>You can use the third tab to delete tasks. Identify the task you want to delete by it's task id.</p>
<br />
<br />
<br />
<div class='helpsubtitle'>EDIT DATABASE</div>
<p>TASKZ uses a flat file as database. By default, it's named project.txt.</p>
<p>The fourth tab displays the flat file and you can edit it directly.</p>
<p>To avoid problems, you should be aware that each task is a line and each field is separated by the symbol |. Keep that in mind when editing and you should be ok.</p>
<p>To save your changes, use the Submit Query button. You may need to refresh the fontpage, where the full list is displayed, before seeing the changes.</p>
<br />
<br />
<br />
<div class='helpsubtitle'>LICENSE</div>
It's GNU GPL 3. Feel free to use it, modify it and redistribute it.
<pre>
# ***** BEGIN GPL LICENSE BLOCK *****
#
#   This program is free software: you can redistribute it and/or modify
#   it under the terms of the GNU General Public License as published by
#   the Free Software Foundation, either version 3 of the License, or
#   (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program.  If not, see <a href="http://www.gnu.org/licenses/" target="_blank">http://www.gnu.org/licenses/</a>.
#
# ***** END GPL LICENCE BLOCK *****
</pre>
<br />
<br />
<br />

<div class='helpsubtitle'>AUTHOR</div>
<p>TASKZ was developed by <a href="http://www.animaxionstudioz.com" target="_blank">animaXion studioz</a> and <a href="http://openlab.esev.ipv.pt/" target="_blank">OpenLab ESEV</a> to support their animation projects.</p>
<p>Icons are from the <a href="http://tango.freedesktop.org/">Tango Desktop Project</a>.</p>
<br />
<br />
<br />

<div class='helpsubtitle'>VERSION</div>
<p>This is version 0.1</p>
<br />
<br />
<br />

<div class='helpsubtitle'>BUGS, FEATURES, CONTACTS</div>
<p>Please use the <a href="http://forge.animaxionstudioz.com/" target="_blank">Forge@animaXion studioz</a>.</p>

</p>
</div>



</div>
<div id="footer">2013 | Taskz 0.1 was developed by <a href="http://www.animaxionstudioz.com" target="_blank">animaXion studioz</a> and <a href="http://openlab.esev.ipv.pt/" target="_blank">OpenLab ESEV</a></div>
</body>
</html>
