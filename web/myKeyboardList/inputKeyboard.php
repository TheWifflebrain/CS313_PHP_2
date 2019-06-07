<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-lg-12 centered-form">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Add Keyboard</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST" action="addKeyboard.php">
			    		
              <div class="form-group">
			    				<input type="text" name="keyboardName" id="keyboardName" class="form-control input-sm" placeholder="Keyboard Name" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="desc" id="desc" class="form-control input-sm" placeholder="Description" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="switch" id="switch" class="form-control input-sm" placeholder="Switch" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="size" id="size" class="form-control input-sm" placeholder="Size" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="type" id="type" class="form-control input-sm" placeholder="Type" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="forsale" id="forsale" class="form-control input-sm" placeholder="For Sale" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="photo" id="photo" class="form-control input-sm" placeholder="Photo URL" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="username1" id="username1" class="form-control input-sm" placeholder="username" required>
			    		</div>
              <input type="hidden" name="username_id" value="<?php echo $curr_username?>">
			    			
			    			<input type="submit" name="Add" value="Add" class="btn btn-info btn-block">
			    		
			    		</form>
			    		</div>
	    			</div>
    		</div>
    	</div>
    </div>
</body>
</html>