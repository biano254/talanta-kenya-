<?php
include('dbcon.php');
$member_id = $_POST['member_id'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$birthdate = $_POST['birthdate'];
$mobile = $_POST['mobile'];


$conn->query("update members set username = '$username',firstname = '$firstname',lastname='$lastname',gender='$gender',address='$address',
birthdate='$birthdate',mobile='$mobile' where member_id = '$member_id'
");

?>
<script>
	window.location = 'edit_profile.php<?php echo '?id='.$member_id; ?>';
</script>