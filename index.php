<?php 
$con = new mysqli('localhost', 'root', '', 'brhan');
                 if(!$con){
                   echo nl2br("not connected to database");
                 
               } 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Atm Analysis</title>
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
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="view.php"><em class="fa fa-bar-chart">&nbsp;</em> View</a></li>
			<li><a href="import.php"><em class="fa fa-clone">&nbsp;</em> Import</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Site Traffic Overview
						</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					General Error Amount
					<ul class="pull-right panel-settings panel-button-tab-right">
					</ul>
				</div>
				<div class="panel-body">
					<div class="canvas-wrapper">
						<canvas class="chart" id="radar-chart" height="300" width="600" ></canvas>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-lg-12">
				
				<h2>7 Terminals With Top Error Number</h2>
			</div>
		</div><!--/.row-->
		<?php 
		$query = "select * from percentage order by percentage desc limit 7 ";
		$result = $con->query($query);
		if(!empty($result)){
			foreach ($result as $row){
				$Terminal_Id = $row['Terminal_Id'];
				$query1 = "select Terminal_Name from terminal where Terminal_Id = \"$Terminal_Id\"";
				$result1 = $con->query($query1);
				if(!empty($result1)){
					foreach ($result1 as $row1){
					   
					   ?>
						   <div class="col-md-12">
							   <div class="panel panel-default">
								   <div class="panel-body">
								   <?php
									  echo "<h1>". $row1['Terminal_Name'] ."</h1>";
								   ?>
					</div>
					</div>
					</div>
						
						<?php
					  
					}
				}
			   
			}
		}?>



		




		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<div class="footer col-sm-12">

                <p> © 2021 BIRHAN BANK | Softify </p>
                <p>Version 1.0</p>
    
	</div>
	<?php
	
	$NC = "SELECT COUNT(*) AS NC FROM declined_transaction WHERE Error_Code = '45'";
    $result = $con->query($NC);
    if (! empty($result)) {
    foreach ($result as $row) {
     $NC = $row['NC'];
  }
}   
$CH = "SELECT COUNT(*) AS CH FROM declined_transaction WHERE Error_Code = '48'";
$result = $con->query($CH);
if (! empty($result)) {
foreach ($result as $row) {
 $CH = $row['CH'];
}
}   

$ISI = "SELECT COUNT(*) AS ISI FROM declined_transaction WHERE Error_Code = '91'  AND Pan LIKE '957005%'";
$result = $con->query($ISI);
if (! empty($result)) {
foreach ($result as $row) {
 $ISI = $row['ISI'];
}
}  
$SM = "SELECT COUNT(*) AS SM FROM declined_transaction WHERE Error_Code = '96'";
$result = $con->query($SM);
if (! empty($result)) {
foreach ($result as $row) {
 $SM = $row['SM'];
}
}  
$OC = "SELECT COUNT(*) AS OC FROM declined_transaction WHERE Error_Code = '49'";
$result = $con->query($OC);
if (! empty($result)) {
foreach ($result as $row) {
 $OC = $row['OC'];
}
}  
$FD = "SELECT COUNT(*) AS FD FROM declined_transaction WHERE Error_Code = '88'";
$result = $con->query($FD);
if (! empty($result)) {
foreach ($result as $row) {
 $FD = $row['FD'];
}
}  
$SD = "SELECT COUNT(*) AS SD FROM declined_transaction WHERE Error_Code = '0'";
$result = $con->query($SD);
if (! empty($result)) {
foreach ($result as $row) {
 $SD = $row['SD'];
}
}


$getMonthQuery = " SELECT EXTRACT(MONTH FROM Date) AS mo FROM Declined_transaction order by Reference_No desc limit 1;";
$getMonth = $con->query($getMonthQuery);
if(!empty($getMonth)){
	foreach ($getMonth as $row){
		$Month = $row['mo'];
	}
}
$one = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 01 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$one = $row['day'];
	}
}

$two = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 02 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$two = $row['day'];
	}
}
$three = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 03 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$three = $row['day'];
	}
}
$four = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 04 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$four = $row['day'];
	}
}
$five = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 05 AND Month(Date) = '$Month'AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$five = $row['day'];
	}
}
$six = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 06 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$six = $row['day'];
	}
}
$seven = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 07 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$seven = $row['day'];
	}
}
$eight = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 08 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$eight = $row['day'];
	}
}
$nine = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 09 AND Month(Date) = '$Month'AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$nine = $row['day'];
	}
}
$ten = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 10 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$ten = $row['day'];
	}
}
$eleven = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 11 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$eleven = $row['day'];
	}
}
$twelve = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 12 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twelve = $row['day'];
	}
}
$thirteen = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 13 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$thirteen = $row['day'];
	}
}
$fourteen = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 14 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$fourteen = $row['day'];
	}
}
$fifteen = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 15 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$fifteen = $row['day'];
	}
}
$sixteen = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 16 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$sixteen = $row['day'];
	}
}
$seventeen = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 17 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$seventeen = $row['day'];
	}
}
$eighteen = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 18 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$eighteen = $row['day'];
	}
}
$ninteen = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 19 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$nineteen = $row['day'];
	}
}
$twenty = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 20 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twenty = $row['day'];
	}
}
$twentyone = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 21 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentyone = $row['day'];
	}
}
$twentytwo = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 22 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentytwo = $row['day'];
	}
}
$twentythree = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 23 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentythree = $row['day'];
	}
}
$twentyfour = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 24 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentyfour = $row['day'];
	}
}
$twentyfive = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 25 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentyfive = $row['day'];
	}
}
$twentysix = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 26 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentysix = $row['day'];
	}
}
$twentyseven = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 27 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentyseven = $row['day'];
	}
}
$twentyeight = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 28 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentyeight = $row['day'];
	}
}
$twentynine = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 29 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$twentynine = $row['day'];
	}
}
$thirty = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 30 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$thirty = $row['day'];
	}
}
$thirtyone = 0;
$query = "SELECT count(date) AS day FROM declined_transaction where DAY(Date) = 31 AND Month(Date) = '$Month' AND (Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%'))";
$getDay = $con->query($query);
if(!empty($getDay)){
	foreach ($getDay as $row){
		$thirtyone = $row['day'];
	}
}
	
	?>
	
	
	<script src="js/bootstrap.min.js"></script>


	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script>

		
	var ctx = document.getElementById("radar-chart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
						labels: ["No Cash", "Cash Handler", "Issuer Or Switch Inoperative", "System Malfunction ", "Out of Cash", "Fallback Decline","Suspected"],
                        datasets: [{
							fill:true,
							borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1,
                            data: [<?php echo $NC?>, <?php echo $CH?>, <?php echo $ISI?>, <?php echo $SM?>, <?php echo $OC?>, <?php echo $FD?>, <?php echo $SD?>],
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'up',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
					
 
 
                }
                });

			
	var ctx = document.getElementById("line-chart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
						labels: ["1", "2", "3", "4 ", "5", "6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
                        datasets: [{
							backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
							fill:false,
							borderColor: 'rgb(75, 192, 192)',
                            tension: 0.4,
                            data: [<?php echo $one?>, <?php echo $two?>, <?php echo $three?>, <?php echo $four?>, <?php echo $five?>, <?php echo $six?>, <?php echo $seven?>, <?php echo $eight?>,<?php echo $nine?>,<?php echo $ten?>, <?php echo $eleven?>, <?php echo $twelve?>, <?php echo $thirteen?>, <?php echo $fourteen?>, <?php echo $fifteen?>, <?php echo $sixteen?>, <?php echo $seventeen?>,<?php echo $eighteen?>, <?php echo $nineteen?>, <?php echo $twenty?>, <?php echo $twentyone?>, <?php echo $twentytwo?>, <?php echo $twentythree?>, <?php echo $twentyfour?>, <?php echo $twentyfive?>,<?php echo $twentysix?>, <?php echo $twentyseven?>, <?php echo $twentyeight?>, <?php echo $twentynine?>, <?php echo $thirty?>, <?php echo $thirtyone?>]
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'up',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
					
 
 
                }
                });
	
	</script>
		
</body>
</html>