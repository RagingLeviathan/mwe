<?php include 'config/objects.php'; 
 $qresid = $_POST['qresid']; ?>
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
                            Accepted Quotation
                            <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
							<li>
                                <i class="fa fa-dashboard"></i>  <a href="quotationResponses.php"> Quotation Reponses</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> <?php echo "<a href='quotationResponseQ.phpquoteResID=".$qresid."'>
								Viewing Quotation #".$qresid."</a>"; ?>
                            </li>
                        </ol>
						<!--BEGIN CUSTOM CONTENT
						///////////////////////////
						//////////////////////////-->
					<?php	

	if (isset($_POST['aq']))
	{
		
		$mwe->update_quotation_response_accept($myConnection, $_POST['qresid'], "Accepted");
		
		echo "<h3>Success! The Quotation Response has been accepted! Viewing updated details...</h3>";
		
		echo "<meta http-equiv='Refresh' content='1;url=AcceptResponseQ.php?quoteResID=".$_POST['qresid']."' />";
	
	}
	else
	{
		echo "<h2>Error. qresid not set. redirecting...</h2> <meta http-equiv='Refresh' content='1;url=AcceptResponseQ.php?quoteResID='quotationResponses.php' />";
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
