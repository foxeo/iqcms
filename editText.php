<?php

   session_start();

   function getSlug( $page ) {
   $page = strip_tags( $page );
   preg_match_all( "/([a-z0-9A-Z-_]+)/", $page, $matches );
   $matches = array_map( "ucfirst", $matches[0] );
   $slug = implode( "-", $matches );
   return $slug;
   }

   $fieldname = $_REQUEST['fieldname'];
   
   $encrypt_pass = @file_get_contents("files/password");
   if ($_COOKIE['iqcms']!=$encrypt_pass)
   {
	   echo "You must login before using this function!";
	   exit;
   }
   
   $content = rtrim(stripslashes($_REQUEST['content']));
   // if to only allow specified tags
   if($fieldname=="title")    $content = strip_tags($content);
   else	$content = strip_tags($content,"<audio><source><embed><p><h1><h2><h3><h4><h5><h6><a><img><u><i><em><strong><b><strike><center><pre>");

   $content = trim($content);
   $content = nl2br($content);

   if(!$content) $content = "Please be sure to enter some content before saving.";

   $content = preg_replace ("/%u(....)/e", "conv('\\1')", $content);

   if($fieldname>0 && $fieldname<4) $fname = "attachment$fieldname";
   else $fname = $fieldname;
   $file = @fopen("files/$fname.txt", "w");
   if(!$file)
   {
echo "<h2 class='wrong'>*Error* - unable to open $fieldname</h2><h3>But don't panic!</h3>".
"Just set the correct read/write permissions to the files folder.<br/>
Find the /files/ folder and CHMOD it to 751.<br /><br />
If this still gives you problems, open up the /files/ folder, select all files and CHMOD them to 640.";
	   exit;
   }
   fwrite($file, $content);
   fclose($file);

   echo $content;
   
   // convert udf-8 hexadecimal to decimal
   function conv($hex)
   {
	   $dec = hexdec($hex);
	   return "&#$dec;";
   }
?>