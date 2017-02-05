<?php include 'config/objects.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'config/imports.php';?>
    <title>Update Product</title>
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
                            Update Product Details
                            <small>Please enter new details below</small>
                        </h1>
                        <ol class="breadcrumb">
						<li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="MaintainProductDetails.php">Maintain Product Details</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> 
								Update Product
                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->
					
						
						<div class="contents">
						
						<?php
						
						
						//ADD SUPPLIER ID
					$mwe->checker($myConnection, $_POST['searchID']);


						

/*
	$result = $mwe->checker($mysqli, $_POST['searchID']);
	
	
	if (!$result) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
*/
												

	
	//echo "<br><br>" . $_POST['searchID'];
	




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
