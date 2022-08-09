<?php
include("./admin/db.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive Team Section Using HTML5 , CSS3 , Bootstrap 4</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="ourteam.css">
</head>

<body style="background-color:#3495eb;">

	<section class="section-team">
		<div class="container">
			<!-- Start Header Section -->
			<div class="row justify-content-center text-center">
				<div class="col-md-8 col-lg-6">
					<div class="header-section">
						<h1 class="small-title">Our Bloggers</h1>
						<h2 class="title">Let's meet with our team members</h2>
					</div>
				</div>
			</div>
			<!-- / End Header Section -->
		
			<div class="row">
				<!-- Start Single Person -->
				<?php
			$query = $con->query("select * from blogger where status = 'approve'");
			while ($bo = $query->fetch_assoc()) {
			
			?>
				<div class="col-sm-6 col-lg-4 col-xl-3">
					<div class="single-person">
						<div class="person-image">
							<img src="./admin/img/blogger/<?php echo$bo['image']; ?>" alt="" height="170px">
							<span class="icon">

							</span>
						</div>
						<div class="person-info">
							<center>
								<h3 class="full-name"><?php echo $bo['name']; ?></h3>
								<span class="speciality"><?php echo $bo['email']; ?></span><br>
								<span class="speciality"><?php echo $bo['rollno']; ?></span><br>
								<span class="speciality"><?php echo $bo['department']; ?></span><br>
							</center>
						</div>
					</div>
				</div>
				<!-- / End Single Person -->
				<!-- Start Single Person -->
				<?php
			}
			?>

				<!-- / End Single Person -->
			</div>
			
		</div>

	</section>

</body>

</html>