<?php
//allow sessions to be passed so we can see if the user is logged in
//session_start();
ob_start();

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.0.0.38499
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Create Marker</title>
        <style type="text/css">
			.ui-autocomplete {
				background-color: white;
				width: 300px;
				border: 1px solid #cfcfcf;
				list-style-type: none;
				padding-left: 0px;
			}
        </style>
    <meta name="description" content="Description" />
    <meta name="keywords" content="Keywords" />


    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
    <script type="text/javascript" src="js/geocode.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <!--<script type="text/javascript" src="js/ValidateInsert.js"></script>-->

</head>
<body>
<div id="art-main">
    <div id="art-header-bg">
        <div class="art-header-center">
            <div class="art-header-png"></div>
            <div class="art-header-jpeg"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <div class="art-sheet">
        <div class="art-sheet-tl"></div>
        <div class="art-sheet-tr"></div>
        <div class="art-sheet-bl"></div>
        <div class="art-sheet-br"></div>
        <div class="art-sheet-tc"></div>
        <div class="art-sheet-bc"></div>
        <div class="art-sheet-cl"></div>
        <div class="art-sheet-cr"></div>
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
            <div class="art-header">
                <div class="art-header-clip">
                <div class="art-header-center">
                    <div class="art-header-png"></div>
                    <div class="art-header-jpeg"></div>
                </div>
                </div>
            <div class="art-headerobject"></div>
                <div class="art-logo">
                                 <h1 class="art-logo-name">&nbsp;</h1>
                                                 <h2 class="art-logo-text">&nbsp;</h2>
              </div>
            </div>
            <div class="cleared reset-box"></div><div class="art-nav">
	<div class="art-nav-l"></div>
	<div class="art-nav-r"></div>
<div class="art-nav-outer">
	<ul class="art-hmenu">
		<li>
			<a href="index.html" class="active"><span class="l"></span><span class="r"></span><span class="t">Map</span></a>
		</li>	
		<!--<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Menu Item</span></a>
			<ul>
				<li>
                    <a href="#">Menu Subitem 1</a>
			<ul>
				<li>
                    <a href="#">Menu Subitem 1.1</a>

                </li>
				<li>
                    <a href="#">Menu Subitem 1.2</a>

                </li>
				<li>
                    <a href="#">Menu Subitem 1.3</a>

                </li>
			</ul>

                </li>
				<li>
                    <a href="#">Menu Subitem 2</a>

                </li>
				<li>
                    <a href="#">Menu Subitem 3</a>

                </li>
			</ul>
		</li>	-->
		<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">About</span></a>
		</li>	
	</ul>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-content">
<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner art-article">
  <div class="art-postcontent">
                    <p>
                    	1. Fill in the Title and activities of the marker you would like to add. <br /> 2. Enter the address and drag the marker on the map to the exact location.<br />3. Fill out description and submit the page. Now you will see your marker on the map!
                    	<?php
							//if the page has been submitted this code runs
							if(isset($_POST['submit']))
							{
								
								if($_POST['title'] == "" || $_POST['description']=="" || $_POST['latitude']=="" || $_POST['activities'] =="")
								{
										echo '<h3 align:"center">You must fill in all the fields.</h3>';
										$header = $_POST['title'];
										$desc = $_POST['description'];
										$activites = $_POST['activities'];
								}
								else
								{
								include("DBconnect.php");
								//connect to Data Base
								$connect = Connect();
								//grab the various bits of information to be inserted to the DB and set to variable
								$title = mysqli_real_escape_string( Connect(), $_POST['title']);
								$description = mysqli_real_escape_string(Connect(), $_POST['description']);
								$activities = mysqli_real_escape_string(Connect(), $_POST['activities']);
								$lat = protect($_POST['latitude']);
								$long = protect($_POST['longitude']);
								//runs the insert statement to put info into data base
								$select = mysqli_query($connect, "INSERT INTO `item` (`description`, `lat`, `long`, `picture`, `title`) VALUES ('".$description."', '".$lat."', '".$long."', '".$activities."', '".$title."')");
								//closes connection with the database
								mysqli_close($connect);
								header('Location: index.html');
								}//end else
							}
						?>
                        </p>
<!--		<div class="header"><img src="/TestMap/images/trailmapperlogo.png" width="300" height="94" alt="Trail Mapper Logo" /><a href="index.html">Map</a></div>-->
		<div class ="border" id="border">
        	<form id="form1" name="form1" method="post" action="createMarker.php">
			  <table class="table" border="0" bordercolor="#f9fafb" align="center" cellpadding="0" cellspacing="0">
			    <tr>
				    <td>
                        <div class="art-postmetadataheader">
                            <h2 class="art-postheader">Title</h2>
                  		</div>
                    </td>
				    <td>
						<input type="text" name="title" size="28" value="<?php echo $header; ?>"/><span id="tit" style="color:#F00"></span>
					</td>
				    <td width="404" rowspan="4" align="center">
						<div id="map_canvas" style="width:400px; height:400px"><br/>
						</div>
					</td>
			    </tr>
                <tr>
				    <td>
                        <div class="art-postmetadataheader">
                            <h2 class="art-postheader">Activities</h2>
                  		</div>
                    </td>
				    <td><input type="text" name="activities" size="28" value="<?php echo $activites; ?>"/><span id="tit" style="color:#F00"></span></td>
			    </tr>
                <tr>
                    <td height="85" valign="top">
                        <div class="art-postmetadataheader">
                            <h2 class="art-postheader">Address</h2>
                  		</div>                      
						Enter the closest known address.
				    </td>
                    <td valign="top"><input  type="text" id="address" size="28"/><br />
                        <input id="latitude" name="latitude" type="hidden"/>
                        <input id="longitude" name="longitude" type="hidden"/>		
                    </td>
                </tr>
				<tr>
					<td width="189">
                        <div class="art-postmetadataheader">
                            <h2 class="art-postheader">Description</h2>
                  		</div>
					</td>
					<td width="173">
						<textarea name="description" cols="25" rows="13"><?php echo $desc; ?></textarea><span id="desc" style="color:#F00"></span>
					</td>
				</tr>


				<tr align="center">
					<td colspan="3">
						<input type="submit" name="submit" value="Submit" />
					</td>
				</tr>
		</table>
</form>
		</div>
  </div>
</div>
    </div>
</div>
<div class="art-post"></div>

                      <div class="cleared"></div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="art-footer">
                <div class="art-footer-t"></div>
                <div class="art-footer-l"></div>
                <div class="art-footer-b"></div>
                <div class="art-footer-r"></div>
                <div class="art-footer-body">
                            <div class="art-footer-text">
                                <p>Copyright © 2011. All Rights Reserved.</p>
                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="art-page-footer"><a href="http://www.talosinnovation.com">Talos Innovations</a> This site created by Rob Moore.</p>
</div>

</body>
</html>
