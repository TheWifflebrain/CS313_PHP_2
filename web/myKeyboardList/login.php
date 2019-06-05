<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-lg-12 centered-form">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Login!</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST" action="addLogin.php">
			    	
                		<div class="form-group">
			    				<input type="text" name="username" id="username" for="username" class="form-control input-sm" placeholder="Username">
			    			</div>

			    			<div class="form-group">
			    				<input type="password" name="pwd" id="pwd" for="pwd" class="form-control input-sm" placeholder="Password">
							</div>
			    			
			    			<input type="submit" name="login" value="login" class="btn btn-info btn-block">
			    		
			    		</form>
			    		</div>
	    			</div>
    		</div>
    	</div>
    </div>
</body>
</html>