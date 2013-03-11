<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.0.0.38499
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Report a problem</title>
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
                    <!--<p>-->	<?php
							echo "This is the Report a problem page.";
							$subject = $_GET['code'];
							
							
							//if the page has been submitted this code runs
							if(isset($_POST['submit'])){
								
								if($_POST['emailBody'] != "")
								{
								 $to = "capital.r@gmail.com";
								 $body = $_POST['emailBody'];
								 $sub = $_POST['title'];
								 
								 if (mail($to, $sub, $body))
								 {
								 	echo("<p>Message successfully sent!</p>");
								 } 
								 else
								 {
								 	echo("<p>Message delivery failed...</p>");
								 }
								}
								else
								{
									echo "<br />Must have text in the email.";	
								}
							}
						?>
<!--		<div class="header"><img src="/TestMap/images/trailmapperlogo.png" width="300" height="94" alt="Trail Mapper Logo" /><a href="index.html">Map</a></div>-->
		<div class ="border" id="border">
        	<form id="form2" name="form2" method="post" action="Report.php">
			  <table class="table" border="0" bordercolor="#f9fafb" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="390">
                        <div class="art-postmetadataheader">
                            <h2 class="art-postheader">Email</h2>
                  		</div>
                        write a short description of the problem here and our administrators will deal with it as soon as possible.
                        </td>
						<td width="376"><textarea name="emailBody" cols="50" rows="5"></textarea><span id="desc" style="color:#F00"></span></td>
					</tr>
                    <tr>
                      <td height="67" valign="top">&nbsp;</td>
                      <td valign="top"><br />
                        <input id="title" name="title" type="hidden" value="<?php echo $subject; ?>"/>
                        <input id="longitude" name="longitude" type="hidden"/>		
                        </td>
                    </tr>
					<tr align="center">
					  <td colspan="3"><input type="submit" name="submit" value="Submit" /></td>
					  </tr>
				</table>
</form>
            
</div>
</p>
  <p>&nbsp;</p>

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
