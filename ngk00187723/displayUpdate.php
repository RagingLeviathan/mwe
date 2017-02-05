<?php include 'config/objects.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'config/imports.php';?>
<title>SB Admin - Bootstrap Admin Template</title>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'config/navigation.php'; ?>
		<!--LOGIN WILL NEED ITS OWN PAGE AND USE SESSIONS TO ALTER VIEW ACCORDINGLY-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Display Updated Product
                            <small>Updated product details are shown below...</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
							<li>
                                <i class="fa fa-file"></i> <a href="MaintainProductDetails.php">Maintain Product Details</a>
                            </li>
							<li>
                                <i class="fa fa-file"></i> <a href="updateProduct.php">Update Product</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Display Update
                            </li>
                        </ol>
						<!--BEGIN CUSTOM CONTENT
						///////////////////////////
						//////////////////////////-->
						

						
						<?php
			
			
$pid = $_POST['prodid'];
$q = $_POST["quantity"];
$d = $_POST["description"];
$n = $_POST["name"];
$mi = $_POST["mi"];

/*echo "<br>" . $pid . "<br>" . $q . "<br>". $d . "<br>" . $mi . "<br><br><br>";*/

$mwe->update_standard_product($myConnection, $pid, $_POST['quantity'], $_POST['description'], $_POST['name'], $_POST['mi']);

				$thing = $mwe->select_from_standard_product_table($myConnection, $pid);

$supcomp = "";
$suppliers = $mwe->select_all_from_table($myConnection, "supplier");

foreach ($suppliers as $sup)
{
	if($sup[0] == $thing[1])
	{
		$supcomp = $sup[7];
	}
}

	
	
	echo "<table><tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Product ID:</td><td style='width:auto;padding-left: 5px;'>" .  $thing[0]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Supplier:</td><td style='width:auto;padding-left: 5px;'>" . $supcomp. "</td></tr>"
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Quantity:</td><td style='width:auto;padding-left: 5px;'>" . $thing[2] ."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;'>Description:</td><td style='width:auto;padding-left: 5px;'>" . $thing[3]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;border-bottom:1px solid black;background:whitesmoke;'>Name:</td><td style='width:auto;padding-left: 5px;'>" . $thing[4]."</td></tr>" 
	. "<tr><td style='width:150px;font-weight:bold;background:whitesmoke;'>Manufactring Instruction:</td><td style='width:auto; padding-left: 5px;'>" . $thing[5]."</td></tr>" 
	. "</table></h3>";
		

?>
 
						
						
						<!--END CUSTOM CONTENT
						///////////////////////////
						//////////////////////////-->
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
