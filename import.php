<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Atm Analysis</title>
	<link rel="icon" href="favicon.ico" type="image/icon type">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header ">
				<a class="navbar-brand" id="brand" href="index.php"><img class="image" src="img/logo.png"></a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		<div class="divider"></div>

		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="view.php"><em class="fa fa-bar-chart">&nbsp;</em> View</a></li>
			<li  class="active"><a href="import.php"><em class="fa fa-clone">&nbsp;</em> Import</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Import</li>
			</ol>
		</div><!--/.row-->
		
	
		
        	<div class="panel-heading"></div>
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="col-md-6">
					<form method="post" action="import.php" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
					<div class="form-group">
									<label>File input</label>
									<input type="file" name="file" id="file" accept=".xls,.xlsx">
									<p class="help-block">Select Excel File You Want to Import</p>
								</div>
								<div class="form-group" id="set">
									<label>Column Where Terminal Name Is</label>
									<input class="form-control" name="term" require>
								</div>
								<div class="form-group" id="set">
									<label>Column Where Pan Number is</label>
									<input class="form-control" name="pan" require>
								</div>
								<div class="form-group" id="set">
									<label>Column Where Date is Is</label>
									<input class="form-control" name="dat" require>
								</div>
								<div class="form-group" id="set">
									<label>Column Where Reference No Is</label>
									<input class="form-control" name="ref" require>
								</div>
								<div class="form-group" id="set">
									<label>Column Where Error Code Is</label>
									<input class="form-control" name="er" require>
								</div>
							    <label>When you count column start from zero</label>
								<br><br>
				
					
							<button type="submit" class="btn btn-primary" name="import">Select</button>
							
					</form>
					
				</div>
			</div>
		
		</div><!--/.row-->

	
<?php
  
  require_once ('./vendor/autoload.php');
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

  $con = new mysqli('localhost', 'root', '', 'brhan');
  if(!$con){
    echo "connection failed";
  
} 


if (isset($_POST["import"])) {
	$deleteprevious = "DELETE FROM declined_transaction";
	$commitdelete = $con->query($deleteprevious);

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = $_FILES['file']['tmp_name'];

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
		$term ="";
		$dat = "";
		$ref ="";
		$er ="";
		$pan = "";
		if(isset($_REQUEST['term'])&&isset($_REQUEST['dat'])&&  isset($_REQUEST['ref'])&&  isset($_REQUEST['er']) && isset($_REQUEST['pan'])){
			$term = (int)$_REQUEST['term'];
			$dat = (int)$_REQUEST['dat'];
			$ref = (int)$_REQUEST['ref'];
			$er = (int)$_REQUEST['er'];
			$pan = $_REQUEST['pan'];
		}

        for ($i = 8; $i <= $sheetCount-1; $i ++) {
            if ( $spreadSheetAry[$i][$ref]!='' ){
            
             //  echo nl2br("$i.Condition passed and code executed\n");
              
                
            $Reference_No="";
            if (isset($spreadSheetAry[$i][$ref])) {
                $Reference_No =  $spreadSheetAry[$i][$ref];
              //  echo $Reference_No ."\n\n\nis reference number\n \n";
            }
			$Pan_No="";
			if(isset($spreadSheetAry[$i][$pan])){
				$Pan_No = $spreadSheetAry[$i][$pan];
			}

            $Terminal_Name="";
            if (isset($spreadSheetAry[$i][$term])) {
                $Terminal_Name =  $spreadSheetAry[$i][$term];
                $query = "SELECT Terminal_Id FROM terminal WHERE Terminal_Name = '$Terminal_Name'";
                $result = $con->query($query);
                $Terminal_Id="";
                if (! empty($result)) {
                    foreach ($result as $row) {
                       $Terminal_Id = $row['Terminal_Id'];
                     //  echo $Terminal_Id."Terminal Id\n";
                    }
                }
                if(!$result) echo "can't retrive terminal table".$con->error;
            
            }
                    

            $Error_Code ="";
            if (isset($spreadSheetAry[$i][$er])) {
                $Error_Code = $spreadSheetAry[$i][$er];
            }

            $Date = "";
            if (isset($spreadSheetAry[$i][$dat])) {
                $Date =  $spreadSheetAry[$i][$dat];
            }
 
               if($Terminal_Id==null) echo $Terminal_Name."hellooooooooooooo";
               //echo $Terminal_Name;
              // echo "add".$i."th row\n\n\n\n\n".$Reference_No."is reference number \n\n\n\n\n".$Terminal_Id."Terminal_Id\n\n\n\n".$Error_Code."Error code \n\n\n\n".$Date."and off course date";
                $query = "insert into declined_transaction (Reference_No,Terminal_Id,Error_Code,Date,Pan) values('$Reference_No','$Terminal_Id','$Error_Code',STR_TO_DATE('$Date', '%M %d,%Y'),'$Pan_No')";
                $result = $con->query($query);
             


                if ( empty($result))  echo "problem \n".$con->error;
                
            
            
        }}if($result) {
		
		}
		
        echo "imported";
        $delete = "DELETE FROM percentage";
        $commit = $con->query($delete);
        $query = "SELECT Terminal_Id FROM terminal";
        $result = $con->query($query);
        if (! empty($result)) {
          foreach ($result as $row) {
           $Terminal_Id = $row['Terminal_Id'];
           $query1 = "SELECT ((count(*)/(select count(*) from declined_transaction where Error_Code=\"45\" or Error_Code=\"48\"  or Error_Code=\"96\" or Error_Code=\"49\" or Error_Code=\"88\" or Error_Code=\"0\"))*100) as value from declined_transaction where Terminal_Id= $Terminal_Id and (Error_Code=\"45\" or Error_Code=\"48\" or Error_Code=\"96\" or Error_Code=\"49\" or Error_Code=\"88\" or Error_Code=\"0\" or (Error_Code=\"91\"  AND Pan LIKE '957005%') )";
           $result1 = $con->query($query1);
           if(!empty($result1)){
           foreach($result1 as $row1){
               $percentage = $row1['value'];
               $query2 = "INSERT INTO percentage (Terminal_Id,percentage) values ('$Terminal_Id','$percentage')";
               $result2 = $con->query($query2);
           }if(!$result2) echo "query3";
           }if(!$result1) echo "query2";
          }
        } if(!$result) echo $con->error."query1";
        if(!$result)echo "can't retrive terminal table to count".$con->error; 



    } else {
        echo "unsuported format";
    }

}


?>

		
		
		</div><!--/.row-->
	</div>	<!--/.main-->
	<div class="footer col-sm-12">

<p> © 2021 BIRHAN BANK | Softify </p>
<p>Version 1.0</p>

</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

		
</body>
</html>