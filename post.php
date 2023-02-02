<?php
include('dbcon.php');
include('session.php');
$content = $_POST['text'];
$id=$_post['$id'];
$conn->query("insert into post (content,date_posted,member_id,photo_id) values('$content',NOW(),'$session_id','$id')");
header('location: postpage.php');
?>