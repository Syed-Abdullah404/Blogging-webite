<?php
include('admin/db.php');
error_reporting(0);


?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

	<title>Hello, world!</title>
	<style>
		:root {
			--gutter: 20px;

		}

		.hs {
			display: grid;
			grid-gap: calc(var(--gutter) / 2);
			grid-template-columns: 0px;
			grid-template-rows: minmax(150px, 2fr);
			grid-auto-flow: column;
			grid-auto-columns: calc(50% - var(--gutter) * 8);

			overflow-x: scroll;
			scroll-snap-type: x proximity;
			padding-bottom: calc(.85 * var(--gutter));
			margin-bottom: calc(-.35 * var(--gutter));
		}

		.hs:before,
		.hs:after {
			content: '';
			width: 20px;
			height: 30px;
		}


		/* Demo styles */




		.unorderlist {
			list-style: none;
			/* padding: 3; */
		}


		h1,
		h2,
		h3 {
			margin: 0;
		}

		.app {
			width: 560px;
			/* height: 367px; */
			/* background: #DBD0BC; */
			color: black;
		}

		.hs>.lie,
		.item {
			scroll-snap-align: center;
			padding: calc(var(--gutter) / 0.1 * 0.2);
			/* display: flex; */
			flex-direction: column;
			/* justify-content: center;
            align-items: center; */
			background: #EFEFEF;
			border-radius: 12px;
			width: 120px;
			height: 170px;
			margin-top: 0%;
			margin-bottom: 0%;
		}



		.no-scrollbar {
			scrollbar-width: none;
			margin-bottom: 0;
			padding-bottom: 0;
		}

		.no-scrollbar::-webkit-scrollbar {
			display: none;
		}
	</style>

</head>

<body class="bgimg">

	<div>
		<ul>
			<?php
			$query = $con->query('SELECT * FROM `companyprofile`');
			while ($row = $query->fetch_assoc()) {
				$num  = $row['phone'];
				$facebook = $row['facebook']; ?>


				<li><a href="<?php echo $facebook ?>"><i class="fa fa-facebook" aria-hidden="true" style="color: white;"></i></a></li>
				<li><a href="<?php echo $row['instagram']; ?>"><i class="fa fab fa-twitter-square" aria-hidden="true" style="color: white;"></i></a></li>
				<li><a href="<?php echo $row['whatapp']; ?>"><i class="fa fab fa-instagram" aria-hidden="true" style="color: white;"></i></a></li>
				<li><a href="<?php echo $row['linkedin']; ?>"><i class="fa fab fa-linkedin" aria-hidden="true" style="color: white;"></i></a></li>

				<li><a href=""><?php echo $num ?></a></li>
			<?php
			}
			?>
		</ul>
		<nav>

			<div class="nav-left ">
				<!-- <img src="images/ucpLogo.png" class="logo" width="30px" height="120px" style="margin-left: 120px;"> -->
			</div>
			<div class="nav-right ">
				<div class="search-box " style="margin-top: 12px; margin-bottom:12px">
					<img src="images/search.png">
					<input type="text" placeholder="Search">
				</div>
				<div class="nav-user-icon online" onclick="settingsMenuToggle();">
					<img src="images/settinglogo.png">

				</div>

			</div>

			<div class="settings-menu">
				<div id="dark-btn">
					<span></span>
				</div>
				<div class="settings-menu-inner">
					<div class="user-profile">
						<img src="images/profile-pic.png">
						<div>
							<p>John Nicholson</p>
							<a href="#">See Your Profile</a>
						</div>
					</div>
					<hr>
					<div class="user-profile">
						<img src="images/feedback.png">
						<div>
							<p>Give Feedback</p>
							<a href="#">Help us to improve the new design</a>
						</div>
					</div>
					<hr>
					<div class="user-profile">
						<img src="images/feedback.png">
						<div>
							<p>Login as Blogger</p>
							<a href="blogger/signin.php">Login</a>
						</div>
					</div>

				</div>
			</div>
		</nav>

	</div>

	<div class="container ">
		<div class="left-sidebar  side" style="border-radius: 6px;">
			<div class="imp-links dark-theme " style="margin-left: 0px;border: 0px;">
				<div style="margin-left:56px ;">
				<?php
$query = $con->query("SELECT * FROM `companyprofile`");
while ($row = $query->fetch_assoc()) { 
	?>
					<img src="./admin/img/logo/<?php echo $row['logo']?>" class="logo" width="270px" height="160px" style="margin-bottom: 41px; margin-top: 14px;">
					<?php
}
?>
					<a href="admin_notice.php">
						<img src="images/news.png">
						Admin notices
					</a>
					<!-- <a href="#">
						<img src="images/friends.png">
						Friends
					</a> -->
					<a href="./ourTeam.php">
						<img src="images/group.png">
						Our Team
					</a>
					<a href="./contactus.php">
						<img src="images/email.png">
						Contact Us

					</a>
					<a href="#">
						<img src="images/user.png">
						<span data-bs-toggle="modal" data-bs-target="#addModal">For Bloggers</span>
					</a>



					<a href="notes.php">
						<img src="images/notes.png">
						Notes

					</a>
				</div>
			</div>



		</div>
		<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Enroll yourself as a Bloggers</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="Post" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">department</label>
								<select name="subject" id="cars" class="form-control">
									<?php
									$query = $con->query('SELECT * FROM `departments`');
									while ($row = $query->fetch_assoc()) {
									?>
										<option><?php echo $row['department']; ?></option>
									<?php
									}
									?>
								</select>
								<label for="formFile" class="form-label">Image</label>
								<input class="form-control" type="file" name="image" id="formFile">
								<label for="text" class="form-label">Your Name</label>
								<input class="form-control" type="text" name="name" id="formFile">
								<label for="text" class="form-label">Complete rollno</label>
								<input class="form-control" type="text" name="roll" id="formFile" placeholder="Complete Rollno">
								<label for="email" class="form-label">Email</label>
								<input class="form-control" type="email" name="email" id="formFile" placeholder="Your valid Email">
								<label for="text" class="form-label">Username</label>
								<input class="form-control" type="text" name="username" id="formFile" placeholder="Username">
								<label for="password" class="form-label">Password</label>
								<input class="form-control" type="password" name="password" id="myInput" placeholder="Enter your password ">
								<input type="checkbox" onclick="myFunction()" class="mt-4">Show Password
								<script>
									function myFunction() {
										var x = document.getElementById("myInput");
										if (x.type === "password") {
											x.type = "text";
										} else {
											x.type = "password";
										}
									}
								</script>

							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" name="submit" class="btn btn-primary">Enroll</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>





		<div class="main-content ">



			<?php
			$queryblogger = $con->query("SELECT * from `postbyblogger` ORDER BY id DESC");
			while ($blogger = $queryblogger->fetch_assoc()) {
				$name = $blogger['name'];
				$id = $blogger['id'];
				$email = $blogger['email'];

			?>


				<div class="post-container">

					<div class="post-row">

						<div class="user-profile">

							<!-- <img src="./admin/img/blogger/<?php echo $imageblogger; ?>" height="45px"> -->



							<div>


								<span><b><strong><?php echo $name; ?></strong></b></span><br>

								<span><?php echo $blogger['time']; ?></span>
							</div>
						</div>
						<a href="#">
							<i class="fa fa-ellipsis-v"></i>
						</a>
					</div>
					<h4 style="color: red; margin-left:12px;margin-top:12px;"><?php echo $blogger['subject']; ?></h4>

					<p class="post-text"><?php echo $blogger['department']; ?><span></span>
						<br><br><?php echo $blogger['post']; ?><br>
						<a href="#">#UCP-blog</a>
					</p>
					<?php
					$image = $blogger['image'];
					if ($image) {
					?>
						<img src="./admin/img/bloggerpost/<?php echo  $image; ?>" class="post-img">
					<?php
					} else {
					}

					?>
					<div class="post-row">
						<div class="post-row">


						</div>

					</div>
				</div>
			<?php
			}

			?>





		</div>
		<div class="right-sidebar">



			<div class="sidebar-title">
				<h4>Department</h4>

			</div>
			<?php
			$query = $con->query('select * from departments');
			while ($row = $query->fetch_assoc()) {
			?>
				<div class="online-list">

					<div class="online">
						<img src="./admin/img/department/<?php echo $row['image'];?>" width="12px" height="50px">
					</div>

					<span style="color: #1876F2;"><?php echo $row['department']; ?></span>


				</div>
			<?php
			}
			?>

		</div>
	</div>
	<div class="footer">
		<p>Copyright 2022 - UCP BLOG</p>
	</div>

	<script src="js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

	$department = $_POST["subject"];
	$filename = $_FILES["image"]["name"];
	$name = $_POST["name"];
	$roll = $_POST["roll"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$status = 'pending';

	move_uploaded_file($_FILES["image"]["tmp_name"], "admin/img/blogger/" . $filename);
	$sql = "INSERT INTO blogger(`department`,`image`,`name`,`rollno`,`email`,`username`,`password`,`status`) VALUES('$department','$filename','$name','$roll','$email','$username','$password','$status')";

	mysqli_query($con, $sql);

	echo "<script>window.location='index.php?message=approval'</script>";
}
?>
<?php
$message = $_GET['message'];
if ($message) {
	echo "<script>alert('please wait for approval')</script>";
}
?>