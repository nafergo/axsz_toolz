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
	
	
	<link rel="stylesheet" href="css/storyboardz.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>

	<title>STORYBOARDZ</title>
	
</head>
<body>

	<?php include("header.php"); ?> 
	

<div class="container-fluid">
	<div class="row">
	<div class="col-md-1"></div>	
	<div class="col-md-10">	
	
	<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
		<li class="active"><a href="#add" data-toggle="tab">Add / Delete</a></li>
		<li><a href="#editdb" data-toggle="tab">Edit db</a></li>
	</ul>


	<div id="my-tab-content" class="tab-content">

		<div class="tab-pane active" id="add">
			<div class="col-md-6">				

	      <form class="form-horizontal" role="form" name="form1" method="post" action="submitted.php" target="_blank" enctype="multipart/form-data">
   	     <h3 class="form-adding-heading">Add shot to storyboard</h3>
  					<div class="form-group">
    					<label for="inputscene" class="col-sm-3 control-label">Scene ID</label>
    					<div class="col-sm-9">
      					<input type="text" name="scene" class="form-control" id="inputscene" placeholder="Scene ID">
      					<span class="help-block">Alphanumeric identifier for the scene (e.g. sc2).</span>
    					</div>
  					</div>

  					<div class="form-group">
    					<label for="inputshot" class="col-sm-3 control-label">Shot ID</label>
    					<div class="col-sm-9">
      					<input type="text" name="shot" class="form-control" id="inputshot" placeholder="Shot ID">
      					<span class="help-block">This Shot ID should be UNIQUE (e.g. sc2_sh5 - for Shot nº5 of Scene nº 2).</span>
    					</div>
  					</div>

  					<div class="form-group">
    					<label for="inputimagefilename" class="col-sm-3 control-label">Image file name</label>
    					<div class="col-sm-9">
      					<input type="text" name="image" value="none.png" class="form-control" id="inputimagefilename">
      					<span class="help-block">Name of the image file (you can use a previously uploaded image). If you don't have one, leave it like this.</span>
    					</div>
  					</div>

  					<div class="form-group">
    					<label for="file" class="col-sm-3 control-label">Upload image</label>
    					<div class="col-sm-9">
      					<input type="file" name="file" id="file" class="form-control">
      					<span class="help-block">Supported formats: gif, jpeg, jpg and png. Max-size: 250KB. For better results, use 1280x720.</span>
    					</div>
  					</div>

  					<div class="form-group">
    					<label for="inputnotes" class="col-sm-3 control-label">Notes</label>
    					<div class="col-sm-9">
							<textarea wrap="virtual" name="notes" class="form-control" rows="6">PLEASE USE &lt;BR /&gt; TAG to break line! DON'T USE ENTER/RETURN KEY. You can use HTML tags (e.g. &lt;h1&gt;,&lt;b&gt;,&lt;i&gt;) to format this text.</textarea>					
    					</div>
  					</div>
  					<div class="col-xs-4 pull-right">
  					 <input class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Submit">					
        			</div>
      	</form>

			
			</div>
			<div class="col-md-1">			</div>
			<div class="col-md-5">
			
				<h3 class="pull-right">Delete shot from storyboard</h3>
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
}

natsort($array[$sort]);
echo "<table class='table table-striped table-condensed'>";
echo "<thead><tr>";
echo "<td width='33%'>Scene ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=scene'> <span title='sort ascending' class='glyphicon glyphicon-sort-by-alphabet'></span></a></td>";
echo "<td width='33%'>Shot ID<a class='sort' href='".$_SERVER['PHP_SELF']."?sort=shot'> <span title='sort ascending' class='glyphicon glyphicon-sort-by-alphabet'></span></a></td>";
echo "<td class='text-center' width='33%'>Delete</td>";

echo "</tr></thead><tbody>";
foreach($array[$sort] as $key=>$ray){
    echo "<tr>";
    echo "<td><small>".$array['scene'][$key]."</small></td>";
    echo "<td><small>".$array['shot'][$key]."</small></td>";
    echo "<td class='text-center'><form class='right' name='form2' method='post' action='deleted.php'><input type='hidden' name='shot' value='".$array['shot'][$key]."'><button type='submit' title='delete shot' name='Submit' class='btn btn-default btn-sm'><span title='delete shot' class='glyphicon glyphicon-trash'></span></button></form></td>";    
    echo "</tr>";
}
echo "</tbody></table>";


?> 

			
			
			
			
			
						
			</div>	
		</div>



		<div class="tab-pane" id="editdb">
		<br>
		<div class="alert alert-warning alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  			<span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Warning!</strong>
  			<p>To avoid problems, you should be aware that:
  			<ul>
  			<li>each shot is a line</li>
  			<li>each field is separated by the symbol |</li>
  			<li>fields order is: scene, shot, file (this should be empty), image, notes</li>
  			</ul> Keep that in mind when editing and you should be ok.</p>
  			</div>
    
	
			
			<?php
$myfile = "storyboardz.txt";
if (isset($_POST['ta'])) {
    $newData = nl2br($_POST['ta']);
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
		<form action="admin.php" method="post">
		<textarea class="form-control" name="ta" id="textareaediting" rows="20"><?php echo str_replace("<br />","",$myData); ?></textarea>
<br />
  		<div class="col-xs-3 pull-right">
		<input class="btn btn-lg btn-primary btn-block" name="myBtn" type="submit" />
		</div>
		</form>
			
			
		</div>

	</div>

	
			
			</div>

	<div class="col-md-1"></div>

		</div>

	</div>
<br /><br />	
	<?php include("footer.php"); ?> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
