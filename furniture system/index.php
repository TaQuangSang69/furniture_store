<?php
include("connection.php");
error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Furniture Store Management</title>
		

	<style>
		.content {
			margin-top: 80px;
		}
	</style>

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Furniture List</a></li>
					<li><a href="add.php">Add Furniture</a></li>
					<li><a href="edit.php">Manage</a></li>
					<li><a href="sell.php">Buy</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Furniture List</h2>
			<hr />
			<form class="form-inline pull-right" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onChange="form.submit()">
						<option value="0">List Category</option>
						<?php 
						$filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="bed" <?php if($filter == 'bed'){ echo 'selected'; } ?>>Bed</option>
						<option value="cabinet" <?php if($filter == 'cabinet'){ echo 'selected'; } ?>>Cabinet</option>
						<option value="chair" <?php if($filter == 'chair'){ echo 'selected'; } ?>>Chair</option>
                        <option value="light" <?php if($filter == 'light'){ echo 'selected'; } ?>>Light</option>
						<option value="table" <?php if($filter == 'table'){ echo 'selected'; } ?>>Table</option>
					</select>
				</div>
			</form>
			<br />
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No.</th>
					<th>ID</th>
					<th>Name</th>
                    <th>Buy_Date</th>
                    <th>Category</th>
					<th>Buy_Price</th>
					<th>Sell_Price</th>
					<th>Stock</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($con, "SELECT * FROM inventory WHERE category='$filter' ORDER BY id ASC");
				}else{
					$sql = mysqli_query($con, "SELECT * FROM inventory ORDER BY id ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data not found.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['buy_date'].'</td>
							<td>'.$row['category'].'</td>
                            <td>'.$row['buy_price'].'</td>
							<td>'.$row['sell_price'].'</td>
							<td>'.$row['stock'].'</td>
							<td>';
							if($row['category'] == 'bed'){
								echo '<span class="label label-success">bed</span>';
							}
                            else if ($row['category'] == 'cabinet' ){
								echo '<span class="label label-info">cabinet</span>';
							}
                            else if ($row['category'] == 'chair' ){
								echo '<span class="label label-warning">chair</span>';
							}
							else if ($row['category'] == 'light' ){
								echo '<span class="label label-danger">light</span>';
							}
							else if ($row['category'] == 'table' ){
								echo '<span class="label label-primary">table</span>';
							};
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
</body>
</html>
