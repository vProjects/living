<?php
/*
include('v-includes/Hashids.php');


$hashids = new Hashids\Hashids('sale',5);

for($i=5;$i<100;$i++){
	echo $i.'<br>';
 $hash = $hashids->encrypt($i);
	echo $hash;
echo '<br>';

$numbers = $hashids->decrypt($hash);

print_r($numbers);
echo '<br>';
}
*/


include('v-includes/lib/class.uniqueKey.php');

$uniqueKey = new uniqueKey();

//$uniqueKey->uniqueKeyGenerator();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

<title>Monuments | Registration</title>
</head>

<body>
	<div class="container">
		<header>
			
		</header>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-xs-12">
				<h4>Total No. of Keys Generated Till date:
					<?php $lastCount = $uniqueKey->getLastCount(); 
						echo $lastCount[0]['COUNT(*)'];	
					?>
				</h4>			
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<form role="form">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Download old keyes in excel format</label>
				    <input type="submit" class="btn btn-primary" value="Download Key">
				  </div>
				</form>
			</div>	
			
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<h4>Please click the below button to generate more 100 keys</h4>
				<form role="form">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Generate Key</label>
				    <input type="submit" class="btn btn-default" value="Generate Key">
				  </div>
				</form>
			</div>
			
		</div>
		<!-- table of uniques keys -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="table-responsive">
				      <table class="table">
				        <thead>
				          <tr>
				            <th>ID</th>
				            <th>Unique Keys</th>
				            <th>Corresponding URLS</th>
				            <th>Unique Key No</th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr>
				            <td>1</td>
				            <td>QSREf</td>
				            <td>http://www.livingmonument.org/registration.php?id=QSREf</td>
				            <td>1</td>
				          </tr>
				          <tr>
				            <td>1</td>
				            <td>QSREf</td>
				            <td>http://www.livingmonument.org/registration.php?id=QSREf</td>
				            <td>1</td>
				          </tr>
				          <tr>
				            <td>1</td>
				            <td>QSREf</td>
				            <td>http://www.livingmonument.org/registration.php?id=QSREf</td>
				            <td>1</td>
				          </tr>
				        </tbody>
				      </table>
				</div>	
			</div>			
		</div>
		<!-- responsive table ends here -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<form role="form">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Download the keyes in excel format</label>
				    <input type="submit" class="btn btn-primary" value="Download Key">
				  </div>
				</form>
			</div>	
		</div>
		
		
	</div>
	
	
</body>
</html>