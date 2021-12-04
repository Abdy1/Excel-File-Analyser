
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
			<li ><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="view.php"><em class="fa fa-bar-chart">&nbsp;</em> View</a></li>
			<li><a href="import.php"><em class="fa fa-clone">&nbsp;</em> Import</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
	<div class="circle1"></div>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">View</li>
			</ol>
		</div><!--/.row-->
		<div class="panel-heading"></div>
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="col-md-6">
					<form method="post"> 
							<div class="form-group">
								<label>Terminal</label>
								<select name="terminal" id="terminal" value="terminal" class="form-control" require>
									<option value="">Select Terminal</option>
									<option value="440069001">ADAMA ARADA BRANCH ATM01</option>
									<option value="440008001">ADAMA BRANCH ATM01</option>
									<option value="440055002">ADDIS ABABA UNIVERSITY ATM01</option>
									<option value="440043001">ADEY ABEBA BRANCH ATM01</option>
									<option value="440091001">AIRPORT BRANCH ATM01</option>
									<option value="440019001">ALEMGENA BRANCH ATM01</option>
									<option value="440247001">ARAT KILLO BRANCH ATM01</option>
									<option value="440025001">ARBAMINCH BRANCH ATM01</option>
									<option value="440086001">ASSELA BRANCH ATM01</option>
									<option value="440050001">ASSOSA BRANCH ATM01</option>
									<option value="440188001">ATLAS BRANCH ATM01</option>
									<option value="440199001">AYER TENA ADEBABAY BRANCH ATM01</option>
									<option value="440184001">Ayat Zone 3 ATM01</option>
									<option value="440060001">BALDERAS BRANCH ATM01</option>
									<option value="440150001">BESHALE BRANCH ATM01</option>
									<option value="440037001">BEST WESTERN PLUS ADDIS ABABA HOTEL ATM01</option>
									<option value="440039001">BETHEL SHEWA SHOPPING CENTER ATM01</option>
									<option value="440018001">BISHOFTU BRANCH ATM01</option>
									<option value="440072002">BISHOFTU PYRAMID PARADISE HOTEL ATM01</option>
									<option value="440194001">BISRATE GEBRIEL BRANCH ATM01</option>
									<option value="440193001">BOLE ARABSA BRANCH ATM01</option>
									<option value="400001002">BOLE BRANCH ATM01</option>
									<option value="440063001">BOLE MICHAEL BRANCH ATM01</option>
									<option value="440179001">CENTURY MALL ATM02</option>
									<option value="440171000">CHIRO BRANCH ATM</option>
									<option value="440151001">CMC MICHAEL ATM01</option>
									<option value="440075001">DAGMAWI MINILIK HOSPITAL ATM01</option>
									<option value="440074001">DEBRE BERHAN BRANCH ATM01</option>
									<option value="440179002">DERARTU BUILDING ATM01</option>
									<option value="440112001">DESSIE TOSSA BRANCH ATM01</option>
									<option value="440034001">DIRE DAWA BRANCH ATM01</option>
									<option value="440030001">Debre markos Branch</option>
									<option value="440028002">EMPEROR TEWODROS BRANCH ATM01</option>
									<option value="440060001">ETHIOPIA HOTEL ATM01</option>
									<option value="440060001">FLAMINGO BRANCH ATM01</option>
									<option value="440053001">GAMBELA BRANCH ATM01</option>
									<option value="440062001">GERJI CONDOMINIUM BRANCH ATM01</option>
									<option value="440258001">GERJI UNITY ATM01</option>
									<option value="440227001">GORO BRANCH ATM01</option>
									<option value="440083001">GUNDISH MEDA MARKET ATM01</option>
									<option value="440012001">Gonder Branch ATM</option>
									<option value="440204001">HAILE GARMENT BRANCH ATM01</option>
									<option value="440141001">HARAR BRANCH ATM01</option>
									<option value="440006001">HAWASSA BRANCH ATM01</option>
									<option value="440060001">HAYAHULET GEBRIEL BRANCH ATM01</option>
									<option value="440114001">BALDERAS BRANCH ATM01</option>
									<option value="440037002">HELZER BUILDING ATM01</option>
									<option value="440010001">HOSSANA BRANCH ATM01</option>
									<option value="440091002">IMPRESS HOTEL ATM01</option>
									<option value="440033002">JEMMO BRANCH ATM01</option>
									<option value="440244001">JEMMO MICHAEL BRANCH ATM01</option>
									<option value="440071001">JIJIGA BRANCH ATM01</option>
									<option value="440101001">JIMMA ABAJIFAR BRANCH ATM01</option>
									<option value="440020001">JIMMA BRANCH ATM01</option>
									<option value="440004001">KAFDEM PLAZA ATM01</option>
									<option value="440196001">KAZANCHIS BRANCH ATM01</option>
									<option value="440022002">KERA BALANCE BUILDING ATM01</option>
									<option value="440022001">KERA BRANCH ATM01</option>
									<option value="440211001">KOLFE ATENA TERA BRANCH ATM01</option>
									<option value="440042001">KOTEBE BRANCH ATM01</option>
									<option value="440072001">KURIFTU RESORT ATM01</option>
									<option value="440036001">LAFTO BRANCH ATM01</option>
									<option value="440084001">LEBU BRANCH ATM01</option>
									<option value="440256001">LEGETAFO BRANCH ATM01</option>
									<option value="440122001">LEM HOTEL BRANCH ATM01</option>
									<option value="440130001">LOGIA SEMERA ATM01</option>
									<option value="440011001">MEGENAGNA BRANCH ATM01</option>
									<option value="440065001">MEHAL WOLO SEFER BRANCH ATM01</option>
									<option value="440137001">MEKANISSA BRANCH ATM01</option>
									<option value="440137002">MEKANISSA BRANCH ATM02</option>
									<option value="440016001">MESHUALEKIA BRANCH ATM01</option>
									<option value="440046001">MESKEL FLOWER BRANCH ATM01</option>
									<option value="440029001">MIZAN TEFERI BRANCH ATM01</option>
									<option value="440055001">NATIONAL MUSEUM ATM01</option>
									<option value="440038001">NEKEMTE BRANCH ATM01</option>
									<option value="440052001">PAULOSE HOSPITAL ATM01</option>
									<option value="440057002">POST OFFICE ATM01</option>
									<option value="440033001">SABA BUILDING ATM01</option>
									<option value="440116002">SARBET BRANCH ATM01</option>
									<option value="440116001">SARBET-JFK BUILDING ATM01</option>
									<option value="440250001">SEBATEGNA BRANCH ATM01</option>
									<option value="440100001">SELAM CHILDRENS VILLAGE BRANCH ATM01</option>
									<option value="440094001">SHALA BRANCH ATM01</option>
									<option value="440017001">SHASHEMENE BRANCH ATM01</option>
									<option value="440077001">SHINTS INDUSTRY ATM01</option>
									<option value="440058001">SIDIST KILO BRANCH ATM01</option>
									<option value="440056001">SOLIANA COMMERCIAL CENTER ATM01</option>
									<option value="440089001">SUMMIT CONDOMINIUM BRANCH ATM01</option>
									<option value="440228001">SUMMIT SAFARI BRANCH ATM01</option>
									<option value="440128001">TANA BRANCH ATM01</option>
									<option value="440104001">TIKUR ANBESSA HOSPITAL ATM01</option>
									<option value="440155001">TULU DIMTU BRANCH ATM01</option>
									<option value="440127001">URAEL BRANCH ATM01</option>
									<option value="440009001">WABI SHEBELE HOTEL ATM01</option>
									<option value="440024001">WOLAITA BRANCH ATM01</option>
									<option value="440026001">WOLOSEFER BRANCH ATM01</option>
									<option value="440091003">WOMSADKO BUILDING ATM01</option>
									<option value="440105001">WORLD VISION BRANCH ATM01</option>
									<option value="440124001">WUHALIMAT BRANCH ATM01</option>
									<option value="440028001">YEHA BUILDING ATM02</option>
									<option value="440152001">YEKA ABADO BRANCH ATM01</option>
									<option value="440058002">YEKATIT 12 HOSPITAL ATM01</option>
									<option value="440196002">Zewditu Hospital ATM02</option>
								</select>
							</div>
							<div class="form-group">
								<label>Error Type</label>
								<select name="error" id="error" class="form-control">
									<option value="">Select Error Code(Optional)</option>
									<option value="45">45</option>
									<option value="48">48</option>
									<option value="91">91</option>
									<option value="96">96</option>
									<option value="49">49</option>
									<option value="88">88</option>
									<option value="0">0</option>
								</select>
							</div>
							<div class="form-group">
								<label for="start">From:</label>
								<input type="date" id="start"  name="start">
								<label for="start">To:</label>
								<input type="date" id="end"  name="end">
							</div>
					
					
							<button type="submit" class="btn btn-primary" name="submit"> Select</button>
							
					</form>
					
				</div>
			</div>
		</div><!--/.row-->

		<?php
		function Retrive_Error_Description($Error_Code){
			global $con;
			$query = "SELECT Error_Description FROM error WHERE  Error_Code='$Error_Code'";
			$result = $con->query($query);
			if (! empty($result)) {
			  foreach ($result as $row) {
				 $Error_Name = $row['Error_Description'];
			  }
			} 
			if(!$result)echo "can't retrive terminal table to count".$con->error; 
			return $Error_Name;
		}
		if(isset($_REQUEST['terminal'])){
        $Terminal_Name = $_REQUEST['terminal'];
        $query = "SELECT Terminal_Name FROM terminal WHERE  Terminal_Id='$Terminal_Name'";
        $result = $con->query($query);
        if (! empty($result)) {
          foreach ($result as $row) {
             $Terminal_Name = $row['Terminal_Name'];
          }
        } 
        if(!$result)echo "can't retrive terminal table to count".$con->error; 
        }

		if(isset($_REQUEST['terminal']) && $_REQUEST['terminal'] !==''){
			?>
			
			<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php if(isset($Terminal_Name)) echo $Terminal_Name; ?></h1>
				
			</div>
		</div><!--/.row-->
			
			<?php
		}
		if(isset($_REQUEST['error']) && $_REQUEST['error'] !==''){
			?>
			
			<div class="row">
			<div class="col-lg-12">
			<h2><?php if(isset($Error_Name)) echo $Error_Name; ?></h2>
			</div>
		</div><!--/.row-->
			
			<?php
		}
		?>
				<?php
		
		if(isset($_REQUEST['start']) && $_REQUEST['start'] !=='' && isset($_REQUEST['end']) && $_REQUEST['end'] !=='' ){
			?>
			
			<div class="row">
			<div class="col-lg-12">
			<h3><?php echo "Starting From  ".$_REQUEST['start']. "  "."To  ".$_REQUEST['end'] ?></h3>
			</div>
		</div><!--/.row-->
			
			<?php
		}


	  function count_error_amount($Error_Code,$Terminal_Id)
{   global $con;
	$EC = "Error_Code = '$Error_Code'";
	
	if($Error_Code == 91){
		
		$EC = "Error_Code = '91' AND Pan LIKE '957005%' ";
	}
    $query = "SELECT COUNT(*) AS value_ FROM declined_transaction WHERE Terminal_Id='$Terminal_Id' AND $EC ";
    $result = $con->query($query);
    if (! empty($result)) {
        foreach ($result as $row) {
           
           $value = $row['value_'];
        }
    } 
    if(!$result) echo "can't retrive terminal table".$con->error;
    return $value;
}

function count_error_amountd($Error_Code,$Terminal_Id,$start,$end)
{   global $con;
	$EC = "Error_Code = '$Error_Code'";
	
	if($Error_Code == 91){
		
		$EC = "Error_Code = '91' AND Pan LIKE '957005%' ";
	}
    $query = "SELECT COUNT(*) AS value_ FROM declined_transaction WHERE Terminal_Id='$Terminal_Id' AND Date >= '$start' AND Date <= '$end' AND $EC ";
    $result = $con->query($query);
    if (! empty($result)) {
        foreach ($result as $row) {
           $value = $row['value_'];
        }
    } 
    if(!$result)echo "can't retrive terminal table with date".$con->error; 
    return $value;
}
function count_error_amountde($Error_Code,$Terminal_Id,$start,$end)
{   global $con;
	$EC = "Error_Code = '$Error_Code'";
	
	if($Error_Code == 91){
		
		$EC = "Error_Code = '91' AND Pan LIKE '957005%' ";
	}
    $query = "SELECT COUNT(*) AS value_ FROM declined_transaction WHERE Terminal_Id='$Terminal_Id' AND Date >= '$start' AND Date <= '$end' AND $EC";
    $result = $con->query($query);
    if (! empty($result)) {
        foreach ($result as $row) {
           $value = $row['value_'];
        }
    } 
    if(!$result)echo "can't retrive terminal table with date".$con->error; 
    return $value;
}

 
$query = "SELECT COUNT(*) AS value_ FROM declined_transaction WHERE Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%')";
$result = $con->query($query);
if (! empty($result)) {
  foreach ($result as $row) {
     $Total_Errors = $row['value_'];
  }
} 
if(!$result)echo "can't retrive terminal table to count".$con->error; 
$Terminal_Id="";
$start="";
$end="";
if( isset($_REQUEST["submit"]) && isset($_REQUEST["start"]) && isset($_REQUEST["end"]) && isset($_REQUEST["error"])  ) {
$Terminal_Id=(int)$_REQUEST['terminal'];
$start=$_REQUEST['start'];
$end=$_REQUEST['end'];
$Error_Code = $_REQUEST['error'];
}
if(isset($_REQUEST['error'])){
$query = "SELECT COUNT(*) AS value_ FROM declined_transaction WHERE Terminal_Id='$Terminal_Id' AND Date >= '$start' AND Date <= '$end' and Error_Code = '45'or Error_Code = '48'or Error_Code = '49'or Error_Code = '88' or Error_Code = '96'or Error_Code = '0' or (Error_Code=\"91\"  AND Pan LIKE '957005%') ";
$result = $con->query($query);
if (! empty($result)) {
  foreach ($result as $row) {
     $Total_Error_In_Range = $row['value_'];
  }
} 
if(!$result)echo "can't retrive terminal table to count".$con->error; 
}

if(isset($_REQUEST["terminal"]) && $_REQUEST["terminal"] !== '' && isset($_REQUEST['start']) && $_REQUEST["start"] !== '' && isset($_REQUEST['end']) && $_REQUEST["end"] !== '' && isset($_REQUEST["error"]) && $_REQUEST["error"] !== '' ){
    ?>
    
    <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>". count_error_amountde($Error_Code,$Terminal_Id,$start,$end)."   ".Retrive_Error_Description($Error_Code). "<h1>";

  
  ?> 
           </div>
          </div>
         </div> 
    
    <?php
   
 

  }else  if(isset($_REQUEST["terminal"]) && $_REQUEST["terminal"] !== '' && isset($_REQUEST["start"]) && $_REQUEST["start"] !== '' && isset($_REQUEST["end"]) && $_REQUEST["end"] !== '' ){
    $total_terminal_errors = count_error_amountd(48,$Terminal_Id,$start,$end)+count_error_amountd(91,$Terminal_Id,$start,$end)+count_error_amountd(88,$Terminal_Id,$start,$end)+count_error_amountd(45,$Terminal_Id,$start,$end)+count_error_amountd(96,$Terminal_Id,$start,$end)+count_error_amountd(49,$Terminal_Id,$start,$end)+count_error_amountd(0,$Terminal_Id,$start,$end);
    ?>
                  
					<div class="col-md-12 no-padding">
			<div class="row progress-labels">
				<div class="col-sm-6">Percentage</div>
				<div class="col-sm-6" style="text-align: right;"><?php echo round($total_terminal_errors/$Total_Error_In_Range*100,2)."%"?></div>
			</div>

			<div class="progress">
				<div data-percentage="0%" style="width: <?php echo $total_terminal_errors/$Total_Error_In_Range*100; echo "%";?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
					
					

    <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amountd(48,$Terminal_Id,$start,$end)."   ".Retrive_Error_Description(48)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" . count_error_amountd(91,$Terminal_Id,$start,$end)."   ".Retrive_Error_Description(91)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amountd(88,$Terminal_Id,$start,$end)."   ".Retrive_Error_Description(88)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amountd(45,$Terminal_Id,$start,$end)."   ".Retrive_Error_Description(45)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>  " .count_error_amountd(96,$Terminal_Id,$start,$end)."   ".Retrive_Error_Description(96)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amountd(0,$Terminal_Id,$start,$end)."   ".Retrive_Error_Description(0)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
<?php } else  if(isset($_REQUEST["terminal"]) && $_REQUEST["terminal"] !== '' && isset($_REQUEST["error"]) && $_REQUEST["error"] !== '' ){
       ?>
	   <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<?php
			if(isset($Error_Code) && isset($Terminal_Id)) echo "<h1>" .count_error_amount($Error_Code,$Terminal_Id)."  ".Retrive_Error_Description($Error_Code)."<h1>";
			?> </div>
			</div>
</div>
<?php }else if(isset($_REQUEST["terminal"]) && $_REQUEST["terminal"] !== ''){
	 $total_terminal_errors = count_error_amount(48,$Terminal_Id)+count_error_amount(91,$Terminal_Id)+count_error_amount(88,$Terminal_Id)+count_error_amount(45,$Terminal_Id)+count_error_amount(96,$Terminal_Id)+count_error_amount(49,$Terminal_Id)+count_error_amount(0,$Terminal_Id);
	 if($total_terminal_errors != 0){
	 ?>
    
	<div class="col-md-12 no-padding">
			<div class="row progress-labels">
				<div class="col-sm-6">Percentage</div>
				<div class="col-sm-6" style="text-align: right;"><?php echo round($total_terminal_errors/$Total_Errors*100,2)."%"?></div>
			</div>

			<div class="progress">
				<div data-percentage="0%" style="width: <?php echo $total_terminal_errors/$Total_Errors*100; echo "%";?>;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Total Error Overview
				</div>
			<div class="panel-body">
				<div class="canvas-wrapper">
					<canvas class="chart" id="radar-chart" height="200" width="600" ></canvas>
				</div>
			</div>
		</div>
	</div>
					
					

    <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amount(48,$Terminal_Id)."   ".Retrive_Error_Description(48)." check here <h1>   ";
  ?> 
           </div>
          </div>
         </div> 	
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amount(91,$Terminal_Id)."   ".Retrive_Error_Description(91)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amount(88,$Terminal_Id)."   ".Retrive_Error_Description(88)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amount(45,$Terminal_Id)."   ".Retrive_Error_Description(45)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 	
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amount(96,$Terminal_Id)."   ".Retrive_Error_Description(96)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amount(49,$Terminal_Id)."   ".Retrive_Error_Description(49)."<h1>   ";
  ?> 
           </div>
          </div>
         </div> 
		 <div class="col-md-12">
    <div class="panel panel-default">
	<div class="panel-body">
   <?php
  echo "<h1>" .count_error_amount(0,$Terminal_Id)."   ".Retrive_Error_Description(0)."<h1>   ";
	 }else{?>
		<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-body">
	   <?php
	  echo "<h1> No Error <h1>   ";
	  ?> 
			   </div>
			  </div>
			 </div> <?php
	 }

  $NC = "SELECT COUNT(*) AS NC FROM declined_transaction WHERE Error_Code = '45' AND Terminal_Id='$Terminal_Id'";
  $result = $con->query($NC);
  if (! empty($result)) {
  foreach ($result as $row) {
   $NC = $row['NC'];
   
}
}   
$CH = "SELECT COUNT(*) AS CH FROM declined_transaction WHERE Error_Code = '48' AND Terminal_Id='$Terminal_Id'";
$result = $con->query($CH);
if (! empty($result)) {
foreach ($result as $row) {
$CH = $row['CH'];
}
}   

$ISI = "SELECT COUNT(*) AS ISI FROM declined_transaction WHERE  Error_Code=\"91\"  AND Pan LIKE '957005%' AND Terminal_Id='$Terminal_Id'";
$result = $con->query($ISI);
if (! empty($result)) {
foreach ($result as $row) {
$ISI = $row['ISI'];
}
}  
$SM = "SELECT COUNT(*) AS SM FROM declined_transaction WHERE Error_Code = '96' AND Terminal_Id='$Terminal_Id'";
$result = $con->query($SM);
if (! empty($result)) {
foreach ($result as $row) {
$SM = $row['SM'];
}
}  
$OC = "SELECT COUNT(*) AS OC FROM declined_transaction WHERE Error_Code = '49' AND Terminal_Id='$Terminal_Id'";
$result = $con->query($OC);
if (! empty($result)) {
foreach ($result as $row) {
$OC = $row['OC'];
}
}  
$FD = "SELECT COUNT(*) AS FD FROM declined_transaction WHERE Error_Code = '88' AND Terminal_Id='$Terminal_Id'";
$result = $con->query($FD);
if (! empty($result)) {
foreach ($result as $row) {
$FD = $row['FD'];
}
}  
$SD = "SELECT COUNT(*) AS SD FROM declined_transaction WHERE Error_Code = '0' AND Terminal_Id='$Terminal_Id'";
$result = $con->query($SD);
if (! empty($result)) {
foreach ($result as $row) {
$SD = $row['SD'];
}
}  
  ?> 
           </div>
          </div>
         </div> 					

	
<?php }?>
	
	
		
	</div>	<!--/.main-->
	<div class="footer col-sm-12">

                <p> © 2021 BIRHAN BANK | Softify </p>
                <p>Version 1.0</p>
    
	</div>
	
	<script src="js/bootstrap.min.js"></script>


	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script>


var ctx = document.getElementById("radar-chart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
						labels: ["No Cash", "Cash Handler", "Issuer Or Switch Inoperative", "System Malfunction ", "Out of Cash", "Fallback Decline","Suspected"],
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
                            data: [<?php echo $NC?>, <?php echo $CH?>, <?php echo $ISI?>, <?php echo $SM?>, <?php echo $OC?>, <?php echo $FD?>, <?php echo $SD?>],
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
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
