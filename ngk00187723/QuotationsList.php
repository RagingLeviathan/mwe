<?php include 'config/objects.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'config/imports.php';?>
    <title>Quotations List</title>
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
                            Quotations
                            <small>A list of quotations is shown below...</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Quotations
                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->
						
						
						
						<!--use the php self to refresh page.
						use ajax to search for lot traveller-->
						<?php
						
						
						
				
	
	$result = $mwe->select_all_from_quotations_response($myConnection);
	
	//BELOW WILL CHANGE DEPENDING ON IF CUSTOMER OR SALES MANAGER IS LOGGED IN
   

	echo "<table><tr style='background:whitesmoke;font-weight:bold;'><td width='6%'>Quote Res #</td><td width='5%'><b>Status</b></td><td width='5%'>Manage</td></tr>";
	
	
	foreach($result as $row)
	{
		echo "<tr><td width='6%'><a href='AViewOfDetailsOfQuotations.php?quoteResID=".$row[0]."'>" 
		. $row[0] . " (view quotation)</a></td>";
		
		if ($row[3] == 'Accepted'){
		echo "<td width='5%' style='background:LightGreen;'><b>" . $row[3] . "</b></td>";}
		if ($row[3] == 'Rejected'){
		echo "<td width='5%' style='background:Tomato;'><b>" . $row[3] . "</b></td>";}
		if ($row[3] == 'Pending'){
		echo "<td width='5%' style='background:snow;'><b>" . $row[3] . "</b></td>";}
		
		
		echo "<td width='6%'><a href='AcceptCustomerOrder.php?quoteResID=".$row[0]."'>" 
		. "Manage Customer Order</a></td></tr>";
	}

	echo "</table>";
	
	echo "<h3>";
						?>
						
						
						
						<!--
						NOTE: when functional, if a lot traveller matching the given PMRP is found, the user <a href="foundLotTraveller.php">will see this information appear on screen here.</a>
						-->
						
						<!--
						NOTE: when functional, if a lot traveller matching the given PMRP is found, the user <a href="foundLotTraveller.php">will see this information appear on screen here.</a>
						-->
						
						
					
						
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
