
<?php session_start(); ?>
<?php

if(!isset($_SESSION['uid'])||($_GET['cid']=="")){
  header('location:index.php');
  exit();
  
  }
$cid=$_GET['cid'];
$tid=$_GET['tid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>post-reply</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="wrapper">

<p><h3>Posting reply</h3></p>
<style type="text/css">


h3{
background-color:#CCCCCC;
text-align:center;

border:1px green solid;
}

</style>
</body>
<?php

echo"<center><p><font color='brown'>You are logged in as ".$_SESSION['username']."</font> |<a href='logout.php'>Logout</a>|<a href='index.php'>Home</a></p></center>";

?>
<hr />
<br/><br/> 
<center>
<div id="content">
<form action="post_reply_parse.php" method="post">

<textarea name="reply_content" rows="5" cols="75"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid;?>" />

<input type="hidden" name="tid" value="<?php echo $tid;?>" />
<input type="submit" name="reply_submit" id="vasplus_p_blog_add_to_cart_button" value="Post Your Reply Here" />
</form>
</div></center>
</html>
