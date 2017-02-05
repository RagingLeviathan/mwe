<?php include 'config/objects.php';
//ONLY SUPPLIER MANAGER CAN SEE THIS PAGE
if (!isset($_SESSION['managerType']))
	{
		$mt = "";
	}
	else
	{
		$mt = $_SESSION['managerType'];
	}
	?>
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
                            Rejecting Customer Order
                           </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
							<li>
                                <i class="fa fa-file"></i> <a href="QuotationsList.php">Quotations</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Customer Order Rejection
                            </li>
                        </ol>
						<!--BEGIN CUSTOM CONTENT
						///////////////////////////
						//////////////////////////-->
						
	
					<?php
if (isset($_SESSION['loggedin']) == 1) 
{
	if( isset($_SESSION['userType']) == 5 && $mt != "")
	{
		if ($mt == "Supplier")
		{
			if (isset($_GET['quoteResID']))
			{
				//$mwe->UpdateLot_Traveller_Traceability($mysqli, $_POST['productid']);
				$qresarr = $mwe->select_from_quotations_response($myConnection, $_GET['quoteResID']);

				
				$cid = $mwe->select_from_customer_order_table($myConnection, $qresarr[0][0]);

							echo "<br><br>";
				$mwe->select_from_customer_table($myConnection, $cid['CustomerID']);

				
				echo "<form method='POST' action='MakeWorkOrderFromCustomerOrder.php'><input type='hidden' name='custid' value='".$cid['CustomerID']."' style='width: 250px;'/><input type='hidden' name='custordid' value='".$cid['Cust_Order_ID']."' style='width: 250px;'/><input type='submit' name='acceptco' value='Accept Customer Order' style='width: 250px;'/></form>";
				echo "<form method='POST' action='""'><input type='hidden' name='custid' value='".$cid['CustomerID']."' style='width: 250px;'/><input type='hidden' name='custordid' value='".$cid['Cust_Order_ID']."' style='width: 250px;'/><input type='submit' name='acceptco' value='Accept Customer Order' style='width: 250px;'/></form>";
				
				


			}
			else
			{
				echo "<h3>Error. Value not set. Redirecting to quotations page.</h3> <meta http-equiv='Refresh' content='5;url=QuotationsList.php' />";				
			}
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
