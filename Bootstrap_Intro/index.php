<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Test Page</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="container">
	    <h1>MH4U Crafting Database</h1>
	    <form class="form-inline">
	    	<div class="form-group">
	    		<label for="itemName">Item</label>
	    		<input type="text" class="form-control" id="itemName" placeholder="Item name">
	    	</div>
	    	<button type="submit" class="btn btn-info">Search</button>
	    </form>
	    <div class="row">
	    	<div class="col-sm-4">
	    		<h3>Stats</h3>
	    		<table class="table table-bordered">
	    			<tbody>
	    				<tr>
	    					<td>Type</td>
	    					<td>Greatsword</td>
	    				</tr>
	    				<tr>
	    					<td>Rarity</td>
	    					<td>10</td>
	    				</tr>
	    				<tr>
	    					<td>Power</td>
	    					<td>1488</td>
	    				</tr>
	    				<tr>
	    					<td>Armor</td>
	    					<td>0</td>
	    				</tr>
	    				<tr>
	    					<td>Slots</td>
	    					<td>1</td>
	    				</tr>
	    				<tr>
	    					<td>Element</td>
	    					<td>430 Fire</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    	<div class="col-sm-4">
	    		<h3>Upgrade</h3>
	    		<h4>Upgrades From</h4>
	    		<div class="checkbox" id="upFrom">
					<label>
						<input type="checkbox" value="">
						Flame Fatalis Blade
					</label>
				</div>
				<h4>Materials Needed</h4>
				<div class="checkbox" id="mat1">
					<label>
						<input type="checkbox" value="">
						6 Fatalis Corticies
					</label>
				</div>
				<div class="checkbox" id="mat2">
					<label>
						<input type="checkbox" value="">
						3 Fatalis Hardhorns
					</label>
				</div>
				<div class="checkbox" id="mat3">
					<label>
						<input type="checkbox" value="">
						1 Deviljho Crook
					</label>
				</div>
				<div class="checkbox" id="mat4()">
					<label>
						<input type="checkbox" value="">
						1 Large Elder Dragon Gem
					</label>
				</div>
				<button id="cantMake" type="button" class="btn btn-danger">You can't make this.</button>
				<button id="canMake" style="display: none" type="button" class="btn btn-danger">You can make this!</button>
	    	</div>
	    	<div class="col-sm-4 text-center">
	    		<h3>Upgrade Path</h3>
	    		<ul class="list-unstyled">
	    			<li>
	    				<a class="btn btn-info" href="#" role="button">Fatalis Blade</a>
	    			</li>
	    			<li>
	    				<i class="glyphicon glyphicon-arrow-down"></i>
	    			</li>
	    			<li>
	    				<a class="btn btn-info" href="#" role="button">Flame Fatalis Blade</a>
	    			</li>
	    			<li>
	    				<i class="glyphicon glyphicon-arrow-down"></i>
	    			</li>
	    			<li>
	    				<a class="btn btn-info" href="#" role="button" disabled="disabled">Black Fatalis Blade</a>
	    			</li>
	    		</ul>
	    		<h3>Upgrades Into</h3>
	    		<ul class="list-unstyled">
	    			<li>
	    				<a class="btn btn-info" href="#" role="button">Old Fatalis Blade</a>
	    			</li>
	    			<li>
	    				<i class="glyphicon glyphicon-arrow-down"></i>
	    			</li>
	    			<li>
	    				<a class="btn btn-info" href="#" role="button">Fatalis Legacy</a>
	    			</li>
	    		</ul>
	    	</div>
	    </div>
	</div>
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	var havePrev = false;
    	var have1 = false;
    	var have2 = false;
    	var have3 = false;
    	var have4 = false;
    	
    	$(document).ready(function(){
    		var testCraft = function(){
    			if(havePrev && have1 && have2 && have3 && have4){
    				$("#cantMake").hide();
    				$("#canMake").show();
    			}else{
    				$("#cantMake").show();
    				$("#canMake").hide();
    			}
    		};
    		
    		$("#upFrom").click(function(){
    			havePrev = !havePrev;
    			testCraft();
    		});
    		
    		$("#mat1").click(function(){
    			have1 = !have1;
    			testCraft();
    		});
    		
    		$("#mat2").click(function(){
    			have2 = !have2;
    			testCraft();
    		});
    		
    		$("#mat3").click(function(){
    			testCraft();
    			have3 = !have3;
    		});
    		
    		$("#mat4").click(function(){
    			have4 = !have4;
    			testCraft();
    		
    		});
    		
    	});
    	
    </script>
  </body>
</html>