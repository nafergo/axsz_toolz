<!DOCTYPE html>
<html><head>
<title>Storyz</title>
<meta charset="UTF-8">
<meta name="description" content="Web platform for short movie production tracking">
<meta name="keywords" content="production, management, task, shot, animation, film, movie">
<meta name="author" content="nelson gonçalves" >

<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

 <link rel="icon" href="favicon.ico" type="image/ico" sizes="64x64"> 
      
</head>

<body><a id="top-of-page"></a>

   <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Shotz</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php"><i class="fa fa-tasks"></i> Home</a></li>
            <li><a href="finished.php"><i class="fa fa-check-square-o"></i> Finished</a></li>
            <li><a href="stats.php"><i class="fa fa-bar-chart"></i> Stats</a></li>            
            <li><a href="admin.php"><i class="fa fa-cogs"></i> Admin</a></li>
            <li><a href="trash.php"><i class="fa fa-trash-o"></i> Trash</a></li>
           
 
 <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img-circle" style="margin-top: -15px;margin-bottom: -15px;" src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($_SESSION['ls_email']))); ?>?size=32" alt=""> <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="edit_profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
 <li class="divider"></li> 
<li><a href="<?php $_SERVER['PHP_SELF']; ?>?ls_logout" rel=""><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>
</li>


          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    


<div class="container">    
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	      <div class="page-header">
				<a class="btn btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Add story node
				</a>
      	</div>				  

			<div class="collapse" id="collapseExample">
  				<div class="well">
    				form!!!
  				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="center-block col-lg-12 col-md-12 col-sm-12 col-xs-12">
	      <div class="page-header">
				Narrative Sequence
      	</div>				  				    


<?php
$lines = file('nodes.txt');
$array = array();
$sort = $_GET['sort'];
if(!isset($sort)){
    $sort = 'node';
}
foreach($lines as $line){
    $explode = explode("|",$line);
    $array['node'][] = $explode[0];
}

asort($array[$sort]);

foreach($array[$sort] as $key=>$ray){

    echo ' <tr>';

    echo "<div class=\"well col-lg-8 col-md-10 col-sm-12 col-xs-12\">".$array['node'][$key]."</div>\n";


}

?> 



		</div>
	</div>
</div>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 
 

        
     

</body></html>
