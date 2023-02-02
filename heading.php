    <div class="row">
      <div class="col-md-2">
		<hr>
		<center><img class="pp" src="<?php echo $image; ?>" height="140" width="160"></center>
		<hr>
		<a class="btn btn-success" href="change_pic.php">Change Profile Picture</a>
      </div>
		<div class="col-md-5">
			<hr>
			<p>Personal Info</p>
				<?php
			$query = $conn->query("select * from members where member_id = '$session_id'");
			$row = $query->fetch();
			$id = $row['member_id'];
			?>
			<hr>
			<p>Name:<?php echo $row['firstname']." ".$row['lastname']; ?></p>
			<hr>
			<p>Address:<?php echo $row['address']; ?></p>
			<hr>
		</div>
      <div class="col-md-5">
			
      </div>
    </div> 