<?php include 'config/objects.php'; ?>
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
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
						<!--BEGIN CUSTOM CONTENT
						///////////////////////////
						//////////////////////////-->
						<?php
						if(!isset($_SESSION['userType']))
						{
							echo "error. you shouldn't be here";
						}
						elseif($_SESSION['userType'] == 1)
						{
							echo "admin system overview";
						}
						elseif($_SESSION['userType'] == 2)
						{
							echo "hello distributor";
						}
						elseif($_SESSION['userType'] == 3)
						{
							echo "Yooo customer";
							echo "<a href='quotationResponses.php'>View Your Quotation Responses</a>";
						}
						elseif ($_SESSION['userType'] == 4)
						{
							echo "HI SUPPLIERRRR";
						}
						elseif ($_SESSION['userType'] == 5)
						{
							echo "HI Manager";
							echo "<br>Your manager type is : " . $_SESSION['managerType'];
							if ($_SESSION['managerType'] == "Supplier")
							{
								echo "<a href='QuotationsList.php'>View quotations</a>";
							}
							
							if ($_SESSION['managerType'] == "Production")
							{
								//someone else in the group would've linked to this
								echo "<a href='UpdateLotTravellerTraceability.php'>Update traceability of lot traveller</a>";
							}
						}
						elseif ($_SESSION['userType'] == 6)
						{
							echo "Howzit, staff?";
						}
						else
						{
							echo "whoops...";
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
