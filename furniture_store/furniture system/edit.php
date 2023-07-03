<?php
include("connection.php");
extract($_POST);

if(isset($reg)){
	//choose a furniture to edit
	$que=mysqli_query($con,"select * from inventory where id='$id'");
	if(mysqli_num_rows($que)){
		//if furniture exits, then edit
		$query="update inventory set buy_date='$buy_date', buy_price='$buy_price', sell_price='$sell_price', stock='$stock' where id='$id'";
		if(mysqli_query($con, $query)){
			$m= "Data edited successfully";
		}
		else{
			$m= "some error";
		}
	}
	else{
		$m= "<p style='color:red'>This furniture does not exist</p>";
		
	}
}
?>

<style>body {
    padding-top:50px;
}
fieldset {
    border: thin solid #ccc; 
    border-radius: 4px;
    padding: 20px;
    padding-left: 40px;
    background: #fbfbfb;
}
legend {
   color: #678;
}
.form-control {
    width: 95%;
}
label small {
    color: #678 !important;
}
span.req {
    color:maroon;
    font-size: 112%;
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
					<li><a href="index.php">Furniture List</a></li>
					<li><a href="add.php">Add Furniture</a></li>
					<li><a href="edit.php">Manage</a></li>
					<li><a href="sell.php">Buy</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class='col-sm-3'></div>
			<form action="" method="post" id="fileForm" role="form">
			<fieldset><legend class="text-center"><span style="color:#000"> Manage Furniture </span><legend>
			<div class="form-group">   
				<label for="name">Furniture ID<span></span></label>
				<input type="text" name="id" placeholder="Furniture ID" class="form-control" required />
			</div>
			<div class="form-group">   
                <label for="name">Buy Date<span> </span></label>
                <input type="date" name="buy_date" placeholder="Buy Date" class="form-control" required />
            </div>
			<div class="form-group">   
                <label for="name">Buy Price<span></span></label>
                <input type="text" name="buy_price" placeholder="Buy Price" class="form-control" required />
            </div>
			<div class="form-group">   
				<label for="name">Sell Price<span ></span></label>
				<input type="text" name="sell_price" placeholder="Sell Price" class="form-control" required />
			</div>
			<div class="form-group">   
				<label for="name">Stock<span></span></label>
				<input type="text" name="stock" placeholder="Stock" class="form-control" required />
			</div>
			</form>
			<div class="form-group">
                <input class="btn btn-success" name="reg" type="submit" value="Submit">
			</div>
			</fieldset>
			</form>
			<div class='col-sm-6'></div>
		</div>
	</div>
	<?php 
if(isset($m))
{
    ?>
    <h3 style="background-color:#000; color:#fff; padding:10px; margin:5px; border-radius:5px;"><?php echo $m; ?></h3>
    </tr>
<?php
}
?>
</body>
</html>