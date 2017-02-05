<?php include 'config/objects.php';
///////////NOTE///////////////////////
///////SOME LAG WILL BE EXPERIENCED AS
//////YOU LOAD THE PAGE. THIS IS BECAUSE
/////AN EMAIL IS SENT TO THE CUSTOMER TO
////INFORM THEM THAT THEIR ORDER IS BEING
///PUT INTO PRODUCTION//////////////////
//////////////////////////////////////
/////////////////////////////////////


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
    <title>Make Work Order From Customer Order</title>
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
                            Making Work Order From Customer Order
                            <small>Details feature below</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
							<li>
                                <i class="fa fa-file"></i> <a href="QuotationsList.php">Quotations</a>
                            </li>
                            <li>
                                <i class="fa fa-file"></i> <a href="AcceptCustomerOrder.php">Managing Customer Order</a>
                            </li>
							 <li class="active">
                                <i class="fa fa-file"></i> Generating Work Order
                            </li>
                        </ol>
						
						<!--///////////////////
						////////////////////////
						/////////////////////////
						/////////////////
						begin my content-->
						
						
						
				<?php
if (isset($_SESSION['loggedin']) == 1) 
{	

	if( isset($_SESSION['userType']) == 5 && $mt != "")
	{
		
		if ($mt == "Supplier")
		{
			if(isset($_POST['acceptco']))
			{
							
				$arr = $mwe->select_from_customer_table($myConnection,$_POST['custid']);
						
						
				
								
								//print_r($result);
								
								$mwe->insert_into_work_order_table($myConnection,$_POST['custordid']);
								
								
								
										$message = "<h2>Hooray, your order is being put together!</h2>\nExpect to recieve it shortly!\nAnd keep this receipt for your records!\n<h3>Regards, MWE</h3>";


									// In case any of our lines are larger than 70 characters, we should use wordwrap()
									$message = wordwrap($message, 70);

									// Send
									mail($arr, 'Thanks for ordering!', $message);
								
									
								
									$result = $mwe->select_quoteid_from_quotations_response($myConnection,$_POST['custid']);
									
									
									
									
									echo "<h3>Here is the  work order:</h3>";
									$thing=$mwe->select_from_work_order_table ($myConnection, $_POST['custordid']);	
									 echo "<br>Product ID: " . $thing[0]. 
								  "<br>Supplier ID: " . $thing[1]. 
								  "<br>Quantity:" . $thing[2]. 
								  "<br>Description: " . $thing[3].
								  "<br>Name: " . $thing[4].
								  "<br>Manufactring Instruction: " . $thing[5];
													
								//echo "Work order has been created!";
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
						<!--use the php self to refresh page.
						use ajax to search for lot traveller-->
						
						<!--
						<form method="post" action="doSomething.php">
						<label>Enter quotation reference number: </label> <input type="text"/>
						<input type="submit" value="search for customer order" name="searchCustomerOrder"/>
						</form>
						<br><br>
						NOTE: when functional, if a customer order matching the given quotation number is found, the application will extract the data from the MWE P/N, Quantity and Date Required fields from the Customer Order and inserts them into a new Work Order, which will then be displayed to the user and will look as follows: <br>
						<br>
						<h3>Work Order</h3>
						<label>MWE P/N:</label>  [aPinNumber]<br>
						<label>Quantity:</label> [aQuantityNumber]<br>
						<label>Date Required: </label> [aDate]<br>
						<em>Work order generated successfully!</em>
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
