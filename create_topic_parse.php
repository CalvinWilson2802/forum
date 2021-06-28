<?php
include_once'connect.php';
session_start();
if($_SESSION['uid']==""){
header('Location:index.php');
exit();   
   }

if(isset($_POST['topic_submit'])){
if(($_POST['topic_title']=="")|| ($_POST['topic_content']=="")){
echo"You did not fill in both fields.please fill the both fields";

exit();
  
  }else{
  $cid=$_POST['cid'];
  $title=$_POST['topic_title'];
  $content=$_POST['topic_content'];
  $creator=$_SESSION['uid'];
  $sql="insert into topics (category_id,topic_title,topic_creator,topic_date,topic_reply_date)values('".$cid."','".$title."','".$creator."',now(),now())";
  $res=mysql_query($sql);
  
  $new_topic_id=mysql_insert_id();
  $sql2="insert into posts (category_id,topic_id,post_creator,post_content,post_date)values('".$cid."','".$new_topic_id."''".$creator."','".$content."',now())";
  $res2=mysql_query($sql2);
  $sql3="update categories set last_post_date=now(), last_user_posted='".$creator."' where id='".$cid."' LIMIT 1";
  
  $res3=mysql_query($sql3);
  if(($res)&&($res2)&&($res3)){
     
	 header("Location:view_topic.php?cid=".$cid."&tid=".$new_topic_id ."");
	 }else{
	 echo"There was a problem in creating your topic.Please try again";
  }
  }
  }
?>