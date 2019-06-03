<?php
v    $nameERR = $emailERR = $addressERR = $cityERR = $stateERR = $zipERR = "";
$name = $email = $address = $city = $state = $zip = "";

if(isset($_POST['submit'])){

    $_SESSION['name'] = htmlentities($_POST['name']);
    $_SESSION['email'] = htmlentities($_POST['email']);
    $_SESSION['address'] = htmlentities($_POST['address']);
    $_SESSION['city'] = htmlentities($_POST['city']);
    $_SESSION['state'] = htmlentities($_POST['state']);
    $_SESSION['zip'] = htmlentities($_POST['zip']);
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];
    $city =  $_SESSION['city'];
    $state = $_SESSION['state'];
    $zip =$_SESSION['zip'];

    if(empty($name)){
        $nameERR = "*Name is required.";
    }

    if(empty($email)){
        $emailERR = "*Email is required.";
    }

    if(empty($address)){
        $addressERR = "*Address is required.";
    }

    if(empty($city)){
        $cityERR = "*City is required.";
    }

    if(empty($state)){
        $stateERR = "*State is required.";
    }

    if(empty($zip)){
        $zipERR = "*Zip code is required.";
    }

    if(!empty($name) && !empty($email) && !empty($city) && !empty($state) && !empty($zip) && !empty($address)){
        header('Location: confirm.php');
    }
}
?>

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