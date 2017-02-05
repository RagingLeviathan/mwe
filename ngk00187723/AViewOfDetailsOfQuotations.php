<?php include 'config/objects.php';
    $qresid = $_GET['quoteResID']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'config/imports.php';?>
<title>View Quotations</title>
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
                            Viewing Details For Quotation #<?php echo "$qresid";?>
                            <small>...</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
							<li>
                                <i class="fa fa-dashboard"></i>  <a href="QuotationsList.php">Quotations</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> 
								Viewing Quotation #<?php echo "$qresid"; ?>
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


if (isset($qresid)){	
	$arr = $mwe->select_one_from_quotations($myConnection, $qresid);
	//$mwe->select_all_from_quotations($myConnection);
	
	echo "<table><tr style='background:whitesmoke;font-weight:bold;'><td width='4%'>Quote #</td><td width='6%'>Quote Res #</td><td width='4%'>Line</td><td width='5%'>Line Description</td><td width='5%'>Product ID</td><td width='5%'>Raw Materials ID</td><td width='5%'>Unit Price</td><td width='5%'>Status</td>" //PENDING HERE REFLECTS STATUS OF INDIVIDUAL RAW MATERIALS
	
	
	."<td width='5%'>VAT</td><td width='5%'>Total</td><td width='5%'>Status</td></tr>";

	foreach($arr as $row)
	{
		echo "<tr><td width='4%'>" . $row['QuoteID'] . "</td>"
			. "<td width='6%'>" . $row['QuoteResID'] . "</td>"
			. "<td width='4%'>" . $row['Line'] . "</td>"
			. "<td width='5%'>" . $row['LineDesc'] . "</td>"
			. "<td width='5%'>" . $row['ProductID'] . "</td>"
			. "<td width='5%'>" . $row['RawMaterialsID'] . "</td>"
			. "<td width='5%'>" . $row['UnitPrice'] . "</td>"
			. "<td width='5%'>" . $row['LineTotal'] . "</td>"
			. "<td width='5%'>" . $row['VAT'] . "</td>"
			. "<td width='5%'>" . $row['Total'] . "</td>"
			. "<td width='5%'><b>" . $row['Status'] . "</b></td></tr>";
	}
	

	echo "</table>";
	
	echo "<h2>";
	
}	
						?>
						<html>
						
					
						
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
