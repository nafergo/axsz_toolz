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
	
    <!-- ekko Lightbox-->
    <link href="css/ekko-lightbox.min.css" rel="stylesheet">	
	
	<link rel="stylesheet" href="css/storyboardz.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans ' rel='stylesheet' type='text/css'>

	<title>STORYBOARDZ</title>
	
</head>

<body>
<a name="passwords"></a>
	<?php include("header.php"); ?> 
	
<div class="container-fluid">
	<div class="row">
<div class="col-md-1"></div>
<div class="col-md-3">
		<div class="menufixed">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">FAQ</h3>
				</div>
				<div class="panel-body">
					<ol>
						<li><a href="#passwords">What about passwords and security?</a></li>
						<li><a href="#main">Storyboard main page</a></li>
						<li><a href="#submit">How to submit a new shot</a></li>
						<li><a href="#delete">How to delete shot</a></li>
						<li><a href="#edit">How to edit a shot</a></li>
						<li><a href="#editoffline">Can I edit offline?</a></li>
						<li><a href="#files">Can I change the supported file formats or max-size for uploads?</a></li>
						<li><a href="#morefiles">What about the files button (file manager)?</a></li>
						<li><a href="#slideshow">The animatic doesn't play...</a></li>
						<li><a href="#license">License</a></li>
						<li><a href="#credits">Credits</a></li>
						<li><a href="#version">Which version is this?</a></li>
						<li><a href="#bugs">What about bugs, suggestions and contacts?</a></li>
					</ol>
				</div>
			</div>
			</div>
</div>	
<div class="col-md-1"></div>

		<div class="col-md-6">

<hr>
<h3>Passwords and security</h3>
<p>STORYBOARDZ comes with no security features. However, it's quite simple to implement some security features using <a href="http://www.htaccesstools.com/articles/htpasswd/" target="_blank">htpasswd</a> or PHP scripts like <a href="http://www.zubrag.com/scripts/password-protect.php" target="_blank">Web Page Password Protect</a> .</p>
<br />
<br />
<br />
<br />
<a name="main"></a><hr><h3>Storyboard main page</h3>
<p>By default, the storyboard is sorted by the shot id.</p>
<br />
<br />
<br />
<br />
<a name="submit"></a><hr><h3>Submit new shot</h3>
<p>To create new shots, use the form available at the admin page.</p>
<p>You can use HTML tags (h1, h2, b, i, br, etc.) to format your notes text.</p>
<p>To avoid problems, <b>keep the Shot ID unique</b> and <b>don't leave any blanks</b>. If needed, fill with ...</p>
<p>For the Image file name, if you don't need/have one, just leave the none.png</p>
<p>You don't need to upload a new image for each task. Because all images are uploaded to the same folder (/upload). If the image you want was previously uploaded, just write it's name on the Image file name field.</p>
<br />
<br />
<br />
<br />
<a name="delete"></a><hr><h3>Delete shot</h3>
<p>Just press the delete button in the admin page.</p>
<br />
<br />
<br />
<br />
<a name="edit"></a><hr><h3>Edit shot</h3>
<p>STORYBOARDZ uses a flat file as database. By default, it's named storyboardz.txt.</p>
<p>In the admin page you can edit it directly.</p>
<p>To avoid problems, you should be aware that each shot is a line and each field is separated by the symbol |. Keep that in mind when editing and you should be ok.</p>
<p>To save your changes, use the Submit Query button. You may need to refresh the frontpage before seeing the changes.</p>
<br />
<br />
<br />
<br />
<a name="editoffline"></a><hr><h3>Edit offline</h3>
<p>You can download the storyboardz.txt, edit it and reupload it.</p>
<br />
<br />
<br />
<br />
<a name="files"></a><hr><h3>Change supported file formats and max-size for uploads</h3>
<p>Edit the submitted.php file.</p>
<br />
<br />
<br />
<br />
<a name="morefiles"></a><hr><h3>What about the files button (file manager)?</h3>
<p>It's a simplified/stripped version of a file manager (check credits) to access the uploaded files.</p>
<br />
<br />
<br />
<br />
<a name="slideshow"></a><hr><h3>The animatic doesn't play...</h3>
<p>The animatic is paused if the mouse is over the images.</p>
<br />
<br />
<br />
<br />
<a name="license"></a><hr><h3>License</h3>
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
<br />
<a name="credits"></a><h3><hr>Credits</h3>
<p>STORYBOARDZ was developed by <a href="http://www.animaxionstudioz.com" target="_blank">animaXion studioz</a> and <a href="http://openlab.esev.ipv.pt/" target="_blank">OpenLab ESEV</a> to support their animation projects.</p>
<p>STORYBOARDZ uses the <a href="http://getbootstrap.com/" target="_blank">bootstrap</a> framework, <a href="https://github.com/ashleydw/lightbox" target="_blank">Bootstrap 3 lightbox</a> and <a href="https://github.com/simogeo/Filemanager" target="_blank">Filemanager</a>.</p>
<br />
<br />
<br />
<br />
<a name="version"></a><hr><h3>Version</h3>
<p>Check the footer.</p>
<br />
<br />
<br />
<br />
<a name="bugs"></a><hr><h3>Bugs, suggestions and contacts</h3>
<p>Please use the <a href="http://forge.animaxionstudioz.com/" target="_blank">Forge@animaXion studioz</a>.</p>
<br />
<br />
<br />
<br />
			</div>


			
		
			
			
			
			<div class="col-md-1"></div>
			
			


	</div>
</div>
	
	<?php include("footer.php"); ?> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ekko-lightbox.min.js"></script>
</body>
</html>
