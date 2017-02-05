<?php include 'config/objects.php'; 
 $ltid = $_GET['ltid']; ?>
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
                            Generated Goods Note
                            <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
							<li>
                                <i class="fa fa-dashboard"></i>  <a href="ConvertLotTravellerToFinishedGoodsNote.php">Lot travellers</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> <?php echo "Lot traveller #$ltid"; ?>
                            </li>
                        </ol>
						<!--BEGIN CUSTOM CONTENT
						///////////////////////////
						//////////////////////////-->
					<?php	

	if (isset($_GET['ltid']))
	{
		/*
		$mwe->update_quotation_response_accept($myConnection, $_POST['qresid'], "Accepted");
		*/
		echo "<h3>Success! The lot traveller has been turned into a finished goods note...</h3>";
		
		$mwe->insert_into_fgn($myConnection, $ltid);
		
		
		
		
		
		
		
		
		$res = $mwe->select_column_names($myConnection, "lot_traveller");
		
		
		
		
		
		
		
		$lots = $mwe->selectLot_Traveller($myConnection, $ltid);
		
		echo "<table><tr style='background:whitesmoke;font-weight:bold;'>
	<td width='2%'>".$res[0][0]."</td>
	<td width='2%'>".$res[1][0]."</td>
	<td width='5%'>".$res[2][0]."</td>
	<td width='5%'>".$res[3][0]."</td>
	<td width='5%'>".$res[4][0]."</td>
	<td width='5%'>".$res[5][0]."</td>
	<td width='5%'>".$res[6][0]."</td>
	<td width='1%'>CustProdID</td>
	<td width='7%'>".$res[8][0]."</td></tr>";
	

	
	
	

 

	foreach($lots as $lot)
	{
		echo "<tr>
	<td width='2%'>".$lot[0]."</td>
	<td width='2%'>".$lot[1]."</td>
	<td width='5%'>".$lot[2]."</td>
	<td width='5%'>".$lot[3]."</td>
	<td width='5%'>".$lot[4]."</td>
	<td width='5%'>".$lot[5]."</td>
	<td width='5%'>".$lot[6]."</td>
	<td width='1%'>".$lot[7]."</td>";
		if ($lot[8] == "Yes")
		{
		 echo "<td width='7%' style='background:lightgreen'>".$lot[8]."</td>";
		}
		if ($lot[8] == "No")
		{
		 echo "<td width='3%' style='background:tomato'>".$lot[8]."</td>";
		}

	echo "</tr>";
		
	}
	echo "</table>";
	
	}
	else
	{
		echo "<h2>Error.  ltid not set. redirecting...</h2> <meta http-equiv='Refresh' content='1;url=ConvertLotTravellerToFinishedGoodsNote.php' />";
	}
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
