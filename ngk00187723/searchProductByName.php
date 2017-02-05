<?php include 'config/objects.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'config/imports.php';?>
<title>View Product</title>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'config/navigation.php'; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Viewing Product
                            <small>Product details are below</small>
                        </h1>
                        <ol class="breadcrumb">
						<li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php"> Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="MaintainProductDetails.php">Maintain Product Details</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Viewing search results for <?php echo $_POST['productName'];?>
                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->

						<div class="contents">
						
						
						
					<?php


echo "<h2>You searched for : <em>".$_POST['productName']."</em></h2>";

	if ($thing = $mwe->select_from_standard_product_table_by_name($myConnection, strtolower($_POST['productName'])))
	{
	echo "<h3><table>"
	."<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Product ID:</td><td style='width:auto;padding-left: 5px;'>" .  $thing[0]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Supplier ID:</td><td style='width:auto;padding-left: 5px;'>" . $thing[1]. "</td></tr>"
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Quantity:</td><td style='width:auto;padding-left: 5px;'>" . $thing[2] ."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Description:</td><td style='width:auto;padding-left: 5px;'>" . $thing[3]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;background:whitesmoke;'>Name:</td><td style='width:auto;padding-left: 5px;'>" . $thing[4]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;background:whitesmoke;'>Manufactring Instruction:</td><td style='width:auto; padding-left: 5px;'>" . $thing[5]."</td></tr>" 
	. "</table></h3>";
	}
?>					
						
						<center>
						
						</div>
						
						
						
						<!--END MY CONTENT////////
						///////////////////////////
						///////////////////////////
						/////////////////////////-->
						
						
						
						
						
						
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
