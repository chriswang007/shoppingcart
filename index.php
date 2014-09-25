<?php
	session_start();
	require("includes/connection.php");
	if(isset($_GET['page'])) {
		$pages=array("courses", "cart");

		if(in_array($_GET['page'], $pages)) {
			$_page=$_GET['page'];
		} else {
			$_page="courses";
		}
	} else {
		$_page="courses";
	}

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/reset.css" />
		<link rel="stylesheet" href="css/style.css" />

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery/min.js"></script>
		<title>Shopping Cart</title>

		<script type="text/javascript">
			$(function() {

			});
		</script>
	</head>

	<body>
		<div id="container">
			<div id="main">
				<?php require($_page.".php"); ?>
			</div><!--end of main-->

			<div id="sidebar">
				<h1>Cart</h1>
				<?php

					if(isset($_SESSION['cart'])) {
						$sql="SELECT * FROM courses WHERE id_product IN (";

						foreach ($_SESSION['cart'] as $id => $value) {
							$sql.=$id.",";
						}

						$sql=substr($sql,0,-1).") ORDER BY name ASC";
						$query=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($query)) {

						?>
							<p><?php echo $row['name'] ?></p>
						<?php

						}
					?>
						<hr />	
						<a href="index.php?page=cart">Go to cart</a>
					<?php

					} else {
						echo "<p>Your Cart is empty. Please add some courses.</p>";
					}

				?>
			</div>
		</div><!--end of container-->
	</body>
</html>