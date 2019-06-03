<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>
<div class="container">
  <h2>Sign Up</h2>
  <form method="POST" action="addUser.php">
    <div class="form-group">
      <label for="fName">First Name:</label>
      <input type="text" class="form-control" id="fName" placeholder="Enter First Name" name="fName">
    </div>

    <div class="form-group">
      <label for="lName">Last Name:</label>
      <input type="text" class="form-control" id="lName" placeholder="Enter Last Name" name="lName">
    </div>

    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>

    <div class="form-group">
      <label for="rpt-pwd">Repeat Password:</label>
      <input type="password" class="form-control" id="rpt-pwd" placeholder="Enter password" name="rpt-pwd">
    </div>

    <button type="submit" name="signUp" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>