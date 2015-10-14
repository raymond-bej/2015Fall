<?php
session_start();
	$people = $_SESSION['people'];
	if($_POST){
		if(isset($_GET['id'])){
			$people[$_GET['id']] = $_POST;
		}else{
			$people[] = $_POST;
		}
		
		$_SESSION['people'] = $people;
		header('Location: ./');
	}
	
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
		<title>Edit Friend</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" type="text/css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	</head>
	<body>
		<div class="container">

			<div class="page-header">
				<h1>Friends <small>Who do you know?</small></h1>
			</div> 
			<form id="entry" class="form-horizontal" action="" method="post" >
				<div class='alert' style="display: none" id="myAlert">
					<button type="button" class="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3></h3>
				</div>
				<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtName" name="Name" placeholder="Friend's Name" value="<?=$friend['Name']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="txtCalories">Calories</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="txt" name="Friend's Goal" placeholder="Friend's goal"  value="<?=$friend['Goal']?>">
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="txtDate">What's their progress?</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Progress" name="Progress" placeholder="Progress" value="<?=$friend['Calories']?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success" id="submit">Record</button>
						<a href="./" class="btn btn-danger">Cancel</a>
					</div>
				</div>
			</form>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script type="text/javascript">
			(function($){
				$(function(){
					
					$("#entry").on('submit', function(e){
						
						if(!$("#txtName").val()){
							$("input").css({ backgroundColor: "#FFAAAA"});
			                $("#submit").prop("disabled", false).html("Try Again");
			                $("#myAlert").removeClass("alert-success").addClass("alert-danger").show()
			                	.find("h3").html("You must enter a name");
			                toastr.error("You must enter a name");
			                return false;
			            }else if(!$("#txt").val()){
			            	$("input").css({ backgroundColor: "#FFAAAA"});
			                $("#submit").prop("disabled", false).html("Try Again");
			                $("#myAlert").removeClass("alert-success").addClass("alert-danger").show()
			                	.find("h3").html("You must enter a goal");
			                toastr.error("You must enter a value");
			                return false;
						}else if(!$("#Progress").val()){
			                $("input").css({ backgroundColor: "#FFAAAA"});
			                $("#submit").prop("disabled", false).html("Try Again");
			                $("#myAlert").removeClass("alert-success").addClass("alert-danger").show()
			                	.find("h3").html("You must enter their progress");
			                toastr.error("You must enter a date");
			                return false;
				        }else{
				        	// Display success
				            $("#myAlert").removeClass("alert-danger").addClass("alert-success").show()
				               	.find("h3").html("Edit complete");
				            toastr.success("Edit complete.")
				        }
					});
					$(".close").on('click', function(e) {
						$(this).closest(".alert").slideUp()
					});
					$("input[type='number']").spinner();
					$("input.date").datepicker();
				});
			})(jQuery);
		</script>
	</body>
</html>