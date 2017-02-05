<?php include 'config/objects.php';
$pid = $_GET['productID'];?>

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
                            Viewing Product #<?php echo $pid; ?>
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
                                <i class="fa fa-file"></i>      Viewing Product #<?php echo $pid; ?>
                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->

						<div class="contents">
						
						
						
					<?php




$thing = $mwe->select_from_standard_product_table($myConnection, $_GET['productID']);

$supcomp = "";
$suppliers = $mwe->select_all_from_table($myConnection, "supplier");

foreach ($suppliers as $sup)
{
	if($sup[0] == $thing[1])
	{
		$supcomp = $sup[7];
	}
}

	
	
	echo "<h3><table>"
	."<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Product ID:</td><td style='width:auto;padding-left: 5px;'>" .  $thing[0]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Supplier:</td><td style='width:auto;padding-left: 5px;'>" . $supcomp. "</td></tr>"
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Quantity:</td><td style='width:auto;padding-left: 5px;'>" . $thing[2] ."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Description:</td><td style='width:auto;padding-left: 5px;'>" . $thing[3]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;background:whitesmoke;'>Name:</td><td style='width:auto;padding-left: 5px;'>" . $thing[4]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;background:whitesmoke;'>Manufactring Instruction:</td><td style='width:auto; padding-left: 5px;'>" . $thing[5]."</td></tr>" 
	. "</table></h3>";

		
?>					
						
			
						
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
