<?php include 'config/objects.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'config/imports.php'?>
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
                            Login Page
                            <small>Please enter your details below</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> User log in
                            </li>
                        </ol>
						<!--BEGIN CUSTOM CONTENT
						///////////////////////////
						//////////////////////////-->
						

						<?php include 'config/login.php'?>
						
						
						
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
