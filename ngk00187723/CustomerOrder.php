<?php include 'config/objects.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'config/imports.php';?>
    <title>Customer Order</title>
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
                            Customer Order
                            <small>Soemthing</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> 
                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->
						
						<style type="text/css">
						
						.contents input {
							width: 100px;
							margin: 5px;
						}
						</style>
						
						<div class="contents">
						
						<!--use the php self to refresh page.
						use ajax to search for lot traveller-->
						<?php
						
						
						
				
					/*	
	if (isset($sid)){					
			
			$result = $mwe->selectLot_Traveller($mysqli, $sid);
	//add something to stop updating at 10 stages
				$result = $mwe->UpdateLot_Traveller_Traceability($mysqli, $sid);
						
						
		$mysqli->close();
		}
	*/
	
	//TO DO LINK TO AViewOfDetailsOfQuotations.php page
	//customer accepts or rejects quotation (will be AcceptCustomerOrder.php page)
	//manager sees accepted quotations and presses a generat work order
	
	//customer accepts or rejects quotation
	//limit to where quotation id = customer id of logged in customer 
	
	if (!$result = $mwe->select_all_from_quotations_response($myConnection))
	{
		echo "<b><br>Uh oh. no response.</b>";
	}
	else
	{
		echo "<b><br>it works!</b>";
	}

						?>
						<html>
						
						<br><br>
						
						<!--
						NOTE: when functional, if a lot traveller matching the given PMRP is found, the user <a href="foundLotTraveller.php">will see this information appear on screen here.</a>
						-->
						
						<!--
						NOTE: when functional, if a lot traveller matching the given PMRP is found, the user <a href="foundLotTraveller.php">will see this information appear on screen here.</a>
						-->
						
						
						
						
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
