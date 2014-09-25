<h1>View cart</h1>
<a href="index.php?page=courses">Go back to courses page</a>
<form method="post" action="index.php?page=cart">

	<table>
		<tr>
			<th>Name</th>
			<th>Professor</th>
			<th>Description</th>
		</tr>

		<?php
			$sql="SELECT * FROM courses WHERE id_product IN (";

						foreach ($_SESSION['cart'] as $id => $value) {
							$sql.=$id.",";
						}

						$sql=substr($sql,0,-1).") ORDER BY name ASC";
						$query=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($query)) {

						?>
							<tr>
								<td><?php echo $row['name'] 	?></td>
								<td><?php echo $row['professor'] 	?></td>
								<td><?php echo $row['description'] 	?></td>
							</tr>
						<?php

						}

		?>
						<tr>
							<td>s</td>
						</tr>
	</table>
	<br />
	<button type="submit" name="submit">Update Cart</button>
</form>