<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Profile Card</title>
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="user.css">
</head>

<body>

	<div class="profile"></div>

	<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
		$id = $_SESSION['user_id'];
		$connection = new mysqli("localhost", "root", "", "AG");
		if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
		$query = "SELECT `email`,`first-name`,`last-name`,`rank` FROM `utilisateur` WHERE id=$id";
		$result = $connection->query($query);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$firstname = $row["first-name"];
			$lastname = $row["last-name"];
			$email = $row['email'];
			$rank = $row['rank'];
		}
	} else {
		echo "roh takhdem compte ";
	}
	?>
	<div class="wrapper">
		<div class="left">
			<img src="images/user.png">
			<h2>
				<?= $firstname ?>
			</h2>

		</div>
		<div class="right">
			<div class="info">
				<h2>information personnelle</h2>
				<div class="info_data">
					<div class="data">
						<h4>Nom</h4>
						<p>
							<?= $lastname ?>
						</p>
					</div>
					<div class="data">
						<h4>Prenom</h4>
						<p>
							<?= $firstname ?>
						</p>
					</div>

					<div class="data">
						<h4>Email</h4>
						<p>
							<?= $email ?>
						</p>
					</div>
					<div class="data">
						<h4>Role</h4>
						<p>
							<?= $rank ?>
						</p>
					</div>
				</div>
			</div>
			<?php
			if ($rank == "admin") {
				echo '<a href="admin.html"><button>Page admin</button></a>';
			}
			?>

		</div>
	</div>
	</div>
</body>

</html>