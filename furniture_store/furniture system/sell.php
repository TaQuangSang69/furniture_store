<?php
include("connection.php");
extract($_POST);

// send back the total price of the bill and update the stock
if(isset($reg)){
    // choose a furniture to buy
    $que=mysqli_query($con,"select * from inventory where id='$id'");
    // calculate the total price and update the stock  
    if(mysqli_num_rows($que)){
        $row = mysqli_fetch_array($que);
        //if stock is not enough, then show error
        if ($stock > $row['stock']){
            $m= "<p style='color:red'>Stock is not enough</p>";
        }
        // if stock is enough, then update the stock and show the total price
        else{
            $name = $row['name'];
            $total_price = $row['sell_price'] * $stock;
            $stock = $row['stock'] - $stock;
            $query="update inventory set stock='$stock' where id='$id'";
            if(mysqli_query($con, $query)){
                $m= "Total price of the $name: " . $total_price;
            }
            else{
                $m= "some error";
            }
        }
    }
    else{
        $m= "<p style='color:red'>This furniture not exists</p>";  
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
                </button>

                
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li><a href="index.php">Furniture List</a></li>
                <li><a href="add.php">Add Furniture</a></li>
                <li><a href="edit.php">Edit Furniture</a></li>
                <li><a href="sell.php">Buy</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</br>
<div class="container">
    <div class="col-md-6">
        <form action="" method="post" id="fileForm" role="form">
        <fieldset><legend class="text-center">Buy</legend>
        <div class="form-group">
            <label for="id">Furniture ID<span class="req">*</span></label>
            <input type="text" name="id" class="form-control" placeholder="ID" required/>
        </div>
        <div class="form-group">
            <label for="stock">Quantity<span class="req">*</span></label>
            <input type="text" name="stock" class="form-control" placeholder="Stock" required/>
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" name="reg" value="Buy" />
        </div>
        </fieldset>
        </form>
    </div>
</div>
<?php 
// show the total price
if(isset($m)){
?>
    <h3 style="background-color:#000; color:#fff; padding:10px; margin:5px; border-radius:5px;"><?php echo $m; ?></h3>
    </tr>
<?php
}
?>
</body>
</html>

    