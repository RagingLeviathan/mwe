<?php include 'config/objects.php';
if (isset($_POST['FindLT'])) {

//customer order id
$coid = $_POST['lottid'];

}
else
{
	$coid = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'config/imports.php';?>
    <title>Generating Finished Goods Note</title>
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
                            Generating Finished Goods Note
                            <small>Selected Lot Traveller details feature below...</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
							<li class="active">
                                <i class="fa fa-file"></i> <a href="UpdateLotTravellerTraceability.php">Updating Lot Traveller Traceability</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Generating Finished Goods Note 
                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->
						
						
					<?php



if (isset($_GET['ltid']))
{
	$res = $mwe->select_column_names($myConnection, "lot_traveller");
	echo "<h2>Selected Lot Traveller to convert to finished goods note.</h3>";
	echo "<table><tr style='background:whitesmoke;font-weight:bold;'>
	<td width='5%'>".$res[1][0]."</td>
	<td width='5%'>".$res[2][0]."</td>
	<td width='5%'>".$res[3][0]."</td>
	<td width='5%'>".$res[4][0]."</td>
	<td width='5%'>".$res[5][0]."</td>
	<td width='5%'>".$res[6][0]."</td>
	<td width='5%'>".$res[7][0]."</td>
	<td width='5%'>".$res[8][0]."</td></tr>";
	
	$result = $mwe->selectLot_Traveller($myConnection, $_GET['ltid']);
	
	/*
	echo "<pre>";
 print_r($result);
 echo "</pre>";
 */

echo "<table><tr>";
	foreach($result as $row)
	{
	
		echo "<td width='5%'>". $row[1] . "</td>"
		."<td width='5%'>". $row[2] . "</td>"
		."<td width='5%'>". $row[3] . "</td>"
		."<td width='5%'>". $row[4] . "</td>"
		."<td width='5%'>". $row[5] . "</td>"
		."<td width='5%'>". $row[6] . "</td>"
		."<td width='5%'>". $row[7] . "</td>"
		."<td width='5%'>".$row[8]."</td>";
	}

	echo "</tr></table>";
echo "<h3><a href='parseFGN.php?ltid=".$result[0][0]."'>If this is correct, please click here.</a></h3>";
}
else
{
	echo "<h2>Error. No lot traveller ID found. Redirecting to lot traveller page. <meta http-equiv='Refresh' content='5;url=UpdateLotTravellerTraceability.php' />";
}
		
?>					
						
					
						
					
						
						
						
						
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
