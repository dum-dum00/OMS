<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "usth_diplomedb";
$conn = mysqli_connect($server,$user,$password,$db);
require_once('php/php-excel-reader/excel_reader2.php');
require_once('php/SpreadsheetReader.php');
require_once('php/diversity.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USTH SIS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Home</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        

        <?php include('php/menu.php'); ?>
    </nav>
	<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
	  
            <div class="row">
			
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#337ab7">Import Bachelor Students </h1>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="panel panel-default">
									<div class="panel-heading">
										<i style="color:#337ab7" class="fa fa-group fa-fw"></i> Choose an excel file to import
										<br>
										<form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
											<div>
												<input type="file" name="file" id="file" accept=".xls,.xlsx"> <p></p>									
												<button type="submit" id="submit" name="import" class="btn btn-primary">Import</button>
							
											</div>
									
										</form>
									</div>
								</div>
							</div>
							<!-- main form end -->
							
							
						</div>
					</div>
					<?php 		
						if (isset($_POST["import"]))
						{
					?>		
					<div class="col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading" >
								<i class="fa fa-bell fa-fw" ></i> Notifications Panel
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
							

							<div class="table-responsive">
							<table class="table">
							
								
								
					<?php				
							$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
							if(in_array($_FILES["file"]["type"],$allowedFileType)){
								$targetPath = 'uploads/'.$_FILES['file']['name'];
								move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);							
								$Reader = new SpreadsheetReader($targetPath);								
								$sheetCount = count($Reader->sheets());	
								$Reader->ChangeSheet(0);
								$i = 0;
								foreach ($Reader as $Row)
								{
									if ($i == 0){
										echo '<thead>';
										echo '<tr class="info">';
										echo '<td></td>';
										for ($k = 1; $k <= 15; $k++) {
											echo '<td>'.$Row[$k].'</td>';
										}
										echo '</tr>';
										echo '</thead>';
										echo '<tbody>';
									}
									else{	
										if ($i % 2 == 0){
											echo '<tr class="success">';
										}else{
											echo '<tr class="warming">';
										}
										echo '<td><form method="post" action="printb.php?id='.$Row[0].'" target="_blank"><input type="submit"></td>';
										for ($k = 1; $k <= 15; $k++) {
											
											
											echo '<td>'.$Row[$k].'</td>';
												
												
																						
											
										}
										$student_id = mysqli_real_escape_string($conn,$Row[1]);
										$v_spec = mysqli_real_escape_string($conn,$Row[2]);
										$e_spec = mysqli_real_escape_string($conn,$Row[3]);
										$v_grade = mysqli_real_escape_string($conn,$Row[4]);
										$e_grade = mysqli_real_escape_string($conn,$Row[5]);
										$v_fullname = mysqli_real_escape_string($conn,$Row[6]);
										$e_fullname = mysqli_real_escape_string($conn,$Row[7]);
										$v_bdate = mysqli_real_escape_string($conn,$Row[16]);
										
										
										
										
										$e_bdate = mysqli_real_escape_string($conn,$Row[9]);
										$v_bplace = mysqli_real_escape_string($conn,$Row[10]);
										$e_bplace = mysqli_real_escape_string($conn,$Row[11]);
										$diplome_id = mysqli_real_escape_string($conn,$Row[14]);
										$document_id = mysqli_real_escape_string($conn,$Row[15]);
										$query = "insert into tab_bachelor(student_id,v_spec,e_spec,v_grade,e_grade,v_fullname,e_fullname,v_bdate,e_bdate,v_bplace,e_bplace,diplome_id,document_id) values('".$student_id."','".$v_spec."','".$e_spec."','".$v_grade."','".$e_grade."','".$v_fullname."','".$e_fullname."','".$v_bdate."','".$e_bdate."','".$v_bplace."','".$e_bplace."','".$diplome_id."','".$document_id."')";
										$result = mysqli_query($conn, $query);
										echo '</tr>';		
									}
									$i = $i + 1;
								}
							}
						
						?>
								</tbody>
							</table>
							
				
						<?php
						}
						
						?>			
						</div>
						
					</div>
							<!-- notification panel end -->
				</div>
			</div>
		</div>
	</div>
	
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>
