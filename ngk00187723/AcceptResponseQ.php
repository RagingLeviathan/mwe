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
										<i class="fa fa-dashboard"></i>  <a href="quotationResponses.php"> Quotation Reponses</a>
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
	if (isset($_SESSION['loggedin']) == 1) 
	{

		if( isset($_SESSION['userType']) == 2)
		{
				if (isset($qresid))
				{	

					$two = $mwe->double_checker($myConnection, $_SESSION['customerID'],$qresid);
					
					
					
					
					if ($arr = $mwe->select_one_from_quotations($myConnection, $qresid)){
					//$mwe->select_all_from_quotations($myConnection);
					
					echo "<table><tr style='background:whitesmoke;font-weight:bold;'><td width='4%'>Line</td><td width='5%'>Line Description</td><td width='5%'>Product ID</td><td width='5%'>Raw Materials ID</td><td width='5%'>Unit Price</td><td width='5%'>Line Total</td><td width='5%'>VAT</td><td width='5%'>Total</td></tr>";

					foreach($arr as $row)
					{
						echo  "<td width='4%'>" . $row['Line'] . "</td>"
							. "<td width='5%'>" . $row['LineDesc'] . "</td>"
							. "<td width='5%'>" . $row['ProductID'] . "</td>"
							. "<td width='5%'>" . $row['RawMaterialsID'] . "</td>"
							. "<td width='5%'>" . $row['UnitPrice'] . "</td>"
							. "<td width='5%'>" . $row['LineTotal'] . "</td>"
							. "<td width='5%'>" . $row['VAT'] . "</td>"
							. "<td width='5%'>" . $row['Total'] . "</td></tr>";
					}
					

					echo "</table>";
					
					if ($two[0][3] == "Pending")
					{
						echo "<h3>Current status of this quote is: " . "<span style='color:orange;font-weight:bold'>".$two[0][3]."</span>". "</h3>";
					}
					if ($two[0][3] == "Rejected")
					{
						echo "<h3>Current status of this quote is: " . "<span style='color:red;font-weight:bold'>".$two[0][3]."</span>". "</h3>";
					}
					if ($two[0][3] == "Accepted")
					{
						echo "<h3>Current status of this quote is: " . "<span style='color:darkgreen;font-weight:bold'>".$two[0][3]."</span>". "</h3>";
					}
					
					

					
					if ($two[0][3] == "Pending")
					{	
						echo "<h3>If you would like to accept this quote, please click the accept button below.  Alternatively, if you would like to reject it, please press the reject button</h3>";
						//echo "qresid is : "  . $qresid;
						
						echo "<ul style='display:inline-block;'><li><form method='POST' action='parseAcceptUpdate.php'><input type='hidden' name='qresid' value='".$qresid."'/><input type='submit' name='aq' value='Accept Quote'/></form></li>"
						. "<li><form method='POST' action='parseRejectUpdate.php'><input type='hidden' name='qresid' value='".$qresid."'/><input type='submit' name='aq' value='Reject Quote'/></form></li></ul>";
					}
						
						//TODO ADD REJECT QUOTES  FOR CUSTOMER AND SUPPLIER MANAGER?
						
					}
					else
					{
						echo "<h2>Error. No quote found. Redirecting to Quotation Response page.  </h2> <meta http-equiv='Refresh' content='5;url=quotationResponses.php' />";
					}
				}
				else
				{
					echo "<h2>Error. No quote selected. Redirecting to Quotation Response page.  </h2> <meta http-equiv='Refresh' content='5;url=quotationResponses.php' />";
				}
		}
		else
		{
				echo "<h2>Error. You are logged in but you are not a customer. Therefore, you cannot view this page, so you will be redirected to the index page in 5 seconds.  </h2> <meta http-equiv='Refresh' content='5;url=index.php' />";
		}
	}
	else
	{
		echo "<h2>Error. You are not logged in. You do not have premission to view this page so you will be redirected to login page in five seconds.</h2> <meta http-equiv='Refresh' content='5;url=loginPage.php' />";
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
