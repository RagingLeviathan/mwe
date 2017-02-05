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
                            Quotation Responses
                            <small>Responses to your quotation requests</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Quotation Responses
                            </li>
                        </ol>
						<!--BEGIN CUSTOM CONTENT
						///////////////////////////
						//////////////////////////-->
						
<?php					
if (isset($_SESSION['loggedin']) == 1) 
{					
		
   if(isset($_SESSION['userType']) == 3)	
   {					

	
						
						$arr = $mwe->select_from_quotations_response_for_customer($myConnection, $_SESSION['customerID']);
						
					
					
						echo "<table><tr style='background:whitesmoke;font-weight:bold;'><td width='5%'>Quote ID #</td><td width='5%'><b>Lines</b></td><td width='5%'>Status</td></tr>";
			foreach($arr as $row)
			{
				echo "<tr><td width='5%'><a href='AcceptResponseQ.php?quoteResID=".$row[0]."'>" 
				. $row[1] . " (view quotation)</a></td>" //$row[0] = quote response id
				."<td width='5%'>" . $row[4] . "</td>";
				if ($row[3] == 'Accepted'){
				echo "<td width='5%' style='background:LightGreen;'><b>" . $row[3] . "</b></td>";}
				if ($row[3] == 'Rejected'){
				echo "<td width='5%' style='background:Tomato;'><b>" . $row[3] . "</b></td>";}
				if ($row[3] == 'Pending'){
				echo "<td width='5%' style='background:snow;'><b>" . $row[3] . "</b></td>";}
				echo "</tr>";
			}

			echo "</table>";
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
