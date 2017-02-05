<?php include 'config/objects.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'config/imports.php'?>
<title>Add Product</title>
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
                            Adding New Product
                            <small>Please fill out the following fields</small>
                        </h1>
                        <ol class="breadcrumb">
							 <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="MaintainProductDetails.php">Maintain Product Details</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Creating Product
                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->
				
						
						<div class="contents">
						<center>
				
					
					
					 <?php
					 $sid = "";
if (isset($_POST['CreateProduct']))
{	$sid = $_POST['supplierID'];
	$q = $_POST['quantity'];
	$d = $_POST['description'];
	$n = $_POST['name'];
	$mi = $_POST['manufacturingInstruction'];
	



		//	echo "<br>$sid and $q and $d and $n and $mi<br>";
			
		
			$mwe->insert_into_standard_product_table($myConnection, $sid, $q, $d, $n, $mi);
			
}
else
{
	$suppliers = $mwe->select_all_from_table($myConnection, "supplier");
	echo "<form method='Post'>
<p>Quantity: <input type='number' name='quantity'></p>
<p>Description: <input type='text' name='description'></p>
<p>Name: <input type='text' name='name'></p>
<p>Manufacturing Instruction: <input type='text' name='manufacturingInstruction'></p>
<p>Supplier ID:<select name='supplierID'>";
					$supplier = "something";
					foreach ($suppliers as $row)
					{
						unset($sid);
						$sid = $row[0];  //$id is set by select
						$scompany = $row[7];
						echo '<option value="'.$sid.'">'.$scompany.'</option>';
					}
							
					echo "</select></p>";







/*echo "<input type='number' name='supplierID'></p>*/
 echo "<p><input type='submit' name='CreateProduct' value='Add Information'></p>
</form>";
}
					 ?>
				

						</center>
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
