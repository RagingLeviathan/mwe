	<?php include 'config/objects.php'; 
	if (!isset($_SESSION['managerType']))
	{
		$mt = "";
	}
	else
	{
		$mt = $_SESSION['managerType'];
	}

	if (isset($_POST['searchID'])) 
	{
		$sid = $_POST['searchID'];
	}
	else
	{
		$sid = 0;
	}

	//echo $sid;

	$display_block = "";

						
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
	<?php include 'config/imports.php';?>
		<title>Update Lot Traveller Traceability</title>
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
								Update Lot Traveller Traceability
								<small>See below...</small>
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
								</li>
								<li class="active">
									<i class="fa fa-file"></i> <a href="UpdateLotTravellerTraceability.php">Updating Lot Traveller Traceability </a>
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
							
							//ADD AJAX FOR SEARCHING FOR LOT TRAVELLER
							
		

		
	if (isset($_SESSION['loggedin']) == 1) 
	{						
		
	  if( isset($_SESSION['userType']) == 5 && $mt != "") 
	  {
		  
			if ($mt == "Production")
			{
					if (isset($_POST['submitLTID']))
					{					
						
						
						if ($result = $mwe->selectLot_Traveller($myConnection, $sid))
						{	
						
								$cols = $mwe->select_column_names($myConnection, "lot_traveller");
								
								
								
								echo "<h3>Updating traceability of lot traveller #".$result[0][0]."</h3>";
								echo "<table><tr><td width='5%'>".$cols[0][0]."</td><td  width='5%'>".$result[0][0]."</td><td width='50%'></td></tr>"
								."<tr><td width='5%'>".$cols[1][0]."</td><td  width='5%'>".$result[0][1]."</td><td width='50%'></td></tr>"
								."<tr><td width='5%'>".$cols[2][0]."</td><td  width='10%'>".$result[0][2]."</td><td width='50%'></td></tr>"
								."<tr><td width='5%'>".$cols[3][0]."</td><td  width='5%'>".$result[0][3]."</td><td width='50%'></td></tr>"
								."<tr><td width='5%'>".$cols[4][0]."</td><td  width='5%'>".$result[0][4]."</td><td width='50%'></td></tr>"
								."<tr><td width='5%'>".$cols[5][0]."</td><td  width='5%'>".$result[0][5]."</td><td width='50%'></td></tr>"
								."<tr><td width='5%'>".$cols[6][0]."</td><td  width='5%'>".$result[0][6]."</td><td width='50%'></td></tr>"
								."<tr><td width='5%'>".$cols[7][0]."</td><td  width='5%'>".$result[0][7]."</td><td width='50%'></td></tr>"
								."<tr><td width='5%'>".$cols[8][0]."</td><td  width='5%'>".$result[0][8]."</td><td width='50%'></td></tr></table>";
								
								echo "<h3>The traceability of the lot traveller is currently ".$result[0][5]."</h3>";
								
							//add something to stop updating at 10 stages
							if ($result[0][5] == 8)
							{
								$mwe->update_lot_traveller_to_finished($myConnection, $result[0][0]);
								echo "<h3 style='color:darkgreen'>Lot traveller is ready to be converted to finished goods note!</h3><h4><a href='ConvertLotTravellerToFinishedGoodsNote.php?ltid=".$result[0][0]."'>Click here to convert lot traveller to finished goods note</a></h4>";
							}
							else
							{
								echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>"
								. "<label>Please enter ID number:</label><input type='text' name='searchID'/><input type='submit' value='search for lot traveller' name='submitLTID'/></form>";
											$mwe->UpdateLot_Traveller_Traceability($myConnection, $result[0][0]);
							}
						}
						else
						{
							echo "<h2>Error. No such lot traveller exists. Please enter another number</h2>";
							echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>"
						. "<label>Please enter ID number:</label><input type='text' name='searchID'/><input type='submit' value='search for lot traveller' name='submitLTID'/></form>";
					
						}
						//end of search for lot traveller
						
					}
					else
					{
					echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>"
						. "<label>Please enter ID number:</label><input type='text' name='searchID'/><input type='submit' value='search for lot traveller' name='submitLTID'/></form>";	
					}
					//end of processing form
			}		
			else
			{
				echo "<h2>Error. Your manager type is <b>".$_SESSION['managerType']."</b> Only <b><u>Production Managers</u></b> are allowed to view this page. You will be redirected to index page in five seconds.</h2><meta http-equiv='Refresh' content='5;url=index.php' />";
			}
		}
		else
		{
			echo "<h2>Error. You are logged in but you are not a manager. Therefore, you cannot view this page, so you will be redirected to the index page in 5 seconds.  </h2> <meta http-equiv='Refresh' content='5;url=index.php' />";
		}
	}	
	else
	{
		echo "<h2>Error. You are not logged in. You do not have premission to view this page so you will be redirected to login page in five seconds.</h2> <meta http-equiv='Refresh' content='5;url=loginPage.php' />";
	}
		

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
