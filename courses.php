<?php

	if(isset($_GET['action']) && $_GET['action']=="add") {

		$id=intval($_GET['id']);

		//course already exist
		if(isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['quantity']++;
		} else {
			$sql_s="SELECT * FROM courses 
					WHERE id_product={$id}";
			$query_s=mysqli_query($conn,$sql_s);
			
			//id exist
			if(mysqli_num_rows($query_s)!=0) {
				$row_s=mysqli_fetch_array($query_s);

				$_SESSION['cart'][$row_s['id_product']]=array(
						"quantity" => 1,
						"professor" => $row_s['professor']
					);
			} else {
				$message = "This product id it's invalid!";
			}
		}
	}

?>

<h1>Course List</h1>
<?php

	if(isset($message)) {
		echo "<h2>$message</h2>";
	}

?>
	<table>
		<tr>
			<th>Course Name</th>
			<th>Professor</th>
			<th>Description</th>
			<th>Action</th>
		</tr>

		<?php
			$sql="SELECT * FROM courses ORDER BY name ASC";
			$query=mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($query)) {
		?>

			<tr>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['professor'] ?></td>
				<td><?php echo $row['description'] ?></td>
				<td><a href="index.php?page=courses&action=add&id=<?php echo $row['id_product']?>">Add to cart</a></td>
			</tr>

		<?php

			}

		?>
		
	</table>