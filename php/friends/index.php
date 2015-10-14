<?php
session_start();
	$name = 'Raymond Bejarano';
	$message = "Welcome $name";
	
	$person = array( 'Name' => $name, 'Age' => 21);
	
	$people = $_SESSION['people'];
	if(!$people){
		$_SESSION['people'] = $people = array(
			array( 'Name' => 'Joe', 'Goal' => 2000, Calories => 1800 ),
			array( 'Name' => 'Jane','Goal' => 1800, Calories => 1500 ),
		);
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Friends List</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h1>Friends List</h1>
			<h2><?=$message?></h2>
			<div class="panel panel-success">
				<div class="panel-heading">Your Friends</div>
					<div class="panel-body">
						<dl class="dl-horizontal">
							<dt>Name</dt>
							<dd><?=$person['Name']?></dd>
							<dt>Age</dt>
							<dd><?=$person['Age']?></dd>
						</dl>
					</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-xs-10">
					<a href="edit.php" class="btn btn-success">
						<i class="glyphicon glyphicon-plus"></i>
						New Friend
					</a>
					<a href="#" class="btn btn-danger">
						<i class="glyphicon glyphicon-trash"></i>
						Delete All
						<span class="badge"><?=count($people)?></span>
					</a>
					<br />
					<table class="table table-condensed table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Options</th>
								<th>Name</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($people as $i => $friend): ?>
								<tr>
									<th scope="row">
										<div class="btn-group" role="group" aria-label="...">
											<a href="view.php?id=<?=$i?>" title="View" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
											<a href="edit.php?id=<?=$i?>" title="Edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
											<a href="delete.php?id=<?=$i?>" title="Delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
										</div>
									</th>
									<td><?=$friend['Name']?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>  	
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>
</html>