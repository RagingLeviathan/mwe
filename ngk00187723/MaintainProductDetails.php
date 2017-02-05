<?php include 'config/objects.php'; 
/**********	NOTICE ********/
/////MAINTAIN PRODUCT DETAILS//
////AND RELATED PAGES DO NOT HAVE
///SESSION RESTRICTIONS//////
//////////////////////////////

////THIS IS BECAUSE I WAS NOT SURE
////WHICH USER WOULD HAVE PREMISSION
///TO EDIT PRODUCTS////////////////





if (isset($_POST['CreateProduct']))
{
	$sid = $_POST['searchID'];
}
else if (isset($_POST['ReadProduct']))
{
	$sid = $_POST['searchID'];
}
else if (isset($_POST['UpdateProduct']))
{
	$sid = $_POST['searchID'];
}
else if (isset($_POST['DeleteProduct']))
{
	$sid = $_POST['searchID'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Maintain Product Details</title>
<?php include 'config/imports.php'?>
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
                            Maintain Product Details
                            <small>Please select an option</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Maintain Products                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->
						
						
						
						<center>
					
						
						<?php
						
						$supcomp = "";
$suppliers = $mwe->select_all_from_table($myConnection, "supplier");

						
							$res = $mwe->select_column_names($myConnection, "standard_product");

							echo "<h3><a href='createProduct.php'>Click here to add a new standard product</a></h3>";
							
							echo "<table><tr style='background:whitesmoke;font-weight:bold;'>
	<td width='2%'>Product ID</td>
	<td width='2%'>Supplier Name</td>
	<td width='2%'>".$res[2][0]."</td>
	<td width='5%'>".$res[3][0]."</td>
	<td width='5%'>".$res[4][0]."</td>
	<td width='5%'>Manufacturing Instruction</td>
	<td width='1%'>Maintain</td>
	<td width='3%'>Product</td>"
	."<td width='3%'> </td></tr>";
	
	$result = $mwe->select_all_from_table($myConnection, "standard_product");
	/*
	echo "<pre>";
 print_r($result);
 echo "</pre>";
 */
	foreach($result as $row)
	{
		foreach ($suppliers as $sup)
		{
			if($sup[0] == $row[1])
			{
				$supcomp = $sup[7];
			}
		}
		echo "<tr><td width='2%'><a href='readProduct.php?productID=".$row[0]."'>".$row[0]." (read)</a></td>" 
		."<td width='2%'>". $supcomp . "</td>"
		."<td width='2%'>". $row[2] . "</td>"
		."<td width='5%'>". $row[3] . "</td>"
		."<td width='5%'>". $row[4] . "</td>"
		."<td width='5%'>". $row[5] . "</td>"
		."<td width='1%'>"
		."<form method='post' action='updateProduct.php'>
						<input type='hidden' name='searchID' value='".$row[0]."'/>
						<input type='submit' value='Update'/>
						</form></td>"
		."<td width='1%'><form method='post' action='deleteProduct.php'>
						<input type='hidden' name='searchID' value='".$row[0]."'/>
						<input type='submit' value='Delete'/>
						</form>"
		
		
		
		
		
		."</td></tr>";
		
			
							
							
							
						
	}

	echo "</table>";
	
echo "<form method='post' action='searchProductByName.php'>
						<h3>Enter product name to search for: 		</h3> <input type='text' name='productName'/>
						<input type='submit' value='read for product' name='readSubmit'/>
						</form>"
							
							
							
							
							
							
							
							
					
						
						?>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
							
						
						
						
						
						<!--END MY CONTENT////////
						///////////////////////////
						///////////////////////////
						/////////////////////////-->
	
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
