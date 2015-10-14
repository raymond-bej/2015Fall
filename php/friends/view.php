<?php
session_start();
	$people = $_SESSION['people'];

	if(isset($_GET['id'])){
		$friend = $people[$_GET['id']];
	}else{
		$friend = array();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>View Friend</title>

	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
	    <div class="container">
            <h1>View Friend <small><?=$friend['Name']?></small></h1>
	    	<div class="row">
	        	<div class="col-md-8 col-xs-10">
	            	<table class="table table-condensed table-striped table-bordered table-hover">
              			<thead>
                			<tr>
                  				<th>Name</th>
                  				<th>Goal</th>
                  				<th>Progress</th>
                			</tr>
              			</thead>
              			<tbody>
                			<tr>
                  				<td><?=$friend['Name']?></td>
                  				<td><?=$friend['Goal'])?></td>
                  				<td><?=$friend['Calories']?></td>
                			</tr>
              			</tbody>
            		</table>
            		<br />
            		<a href="./" class="btn btn-info">Return</a>
        		</div>
      		</div>
      		<div>
      			
      		</div>
    	</div>

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	</body>
</html>