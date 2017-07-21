<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
	echo "<title>$title</title>\n\n".
	"<meta name='description' content='$description' />\n".
	"<meta name='keywords' content='$keywords' />\n".
	"<meta name='generator' content='IQ CMS 0.4.1' />\n";
	editTags();
?>

<link rel="stylesheet" type="text/css" href="template/blue/style.css" media="screen"/>
<!--[if IE 6]>
	<link rel="stylesheet" href="template/blue/ie6.css" media="screen, projection">
<![endif]-->
</head>
 
<body>

<div class="container">

<h1 class="left"><a href="./"><?php echo "$title";?></a></h1>

<div class="slogan"><?php echo "$slogan";?></div>

<?php
   echo "<ul id='nav'>";
   displayMenu("<li><a ","</a></li>");
   echo "</ul>";
?> 

<div class="insider">
<?php displayMainContent();?>
</div>

<div class="footer"><div class="left">
<?php
   displayMenu("<a","</a> | ");
?>
</div>

<?php echo "$lstatus | $copyright | $mess";?>
</div>

<?php if($_COOKIE[$cookie]) extraSettings();?>
</div>

</body>
</html>