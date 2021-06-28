<link rel="stylesheet" type="text/css" href="style.css" />
<?php session_start();   ?>
 <div id="wrapper">
<h2>forum series- part 1</h2>
<?php
if(!isset($_SESSION['uid'])){
   
   echo"<form action='login_parse.php' method='post'>
   Username:<input type='text' name='username'/>&nbsp;
   password:<input type='password' name='password'/>&nbsp;
   <input type='submit' name='submit' value='Login in'/> ";

}else{
echo"<p><font color='brown'>You are logged is as ".$_SESSION['username']." &bull;<a href='logout.php'>Logout</a></font></p> ";
}
?>
<hr/>
<div id="content">
<?php
include_once('connect.php');
$sql="select * from categories order by category_title asc";
$res=mysql_query($sql) or die (mysql_error());
$categories="";
if(mysql_num_rows($res)>0){
while($row=mysql_fetch_assoc($res)){
   $id=$row['id'];
   $title=$row['category_title'];
   $description=$row['category_description'];
   $categories.="<a href='view_category.php?cid=".$id."' class='cat_links'>".$title."- <font size ='-1'>".$description."</font></a>";
  }
echo $categories;
}else{
echo"<p>there is no categories available yet.</p>";
}


?>
</div>
<br>stay connected<br>
<iframe src="//www.facebook.com/plugins/follow?href=https%3A%2F%2Fwww.facebook.com%2Franjit.karki.140&amp;layout=standard&amp;show_faces=true&amp;colorscheme=light&amp;width=450&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
<a href="register.php">Register</a>