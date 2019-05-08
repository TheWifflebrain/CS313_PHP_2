<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Stuff</title>
</head>

<body>

<?php
// define variables and set to empty values
$name;
$email;
//$major;
$comment;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $comment = test_input($_POST["comment"]);
  //$major = test_input($_POST["major"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>HTML Form</h1>
<br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: 
    <input type="text" name="name" id="name">
    <br>
    Email: 
    <input type="text" name="email" id="email">
    <br>
    <br>
    Whats your major:
    <br>

    <!--
    <input type="radio" name="major" value="CS"> Computer Science
    <br>

    <input type="radio" name="major" value="WDD"> Web Design and Development
    <br>

    <input type="radio" name="major" value="CIT"> Computer information Technology
    <br>

    <input type="radio" name="major" value="CE"> Computer Engineering
    <br>
    -->
    <?php
        $majors = array("CS", "CE", "CIT", "WDD");
        foreach ($majors as $listMajor){
         echo "<input type='radio' name='major' value='$listMajor'> <?php $listMajor ?><br>";
        }
    ?>

    <br>
    Comments: 
    <br>
    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    <br>
    <!--
    <input type="checkbox" name="c[]" value="USA"> USA 
    <br>
    <input type="checkbox" name="c[]" value="AFRICA"> AFRICA
    <br>
    <input type="checkbox" name="c[]" value="GERMANY"> GERMANY
    -->
    <?php
        $continents = array("NA" , "SA", "EU");
        foreach ($continents as $continent){
        echo "<input type='checkbox' name='c[]' value='$continent'>$continent<br>";
        }
    ?>
    <br>
    <input type="submit" name="submit" value="Submit">
    <br>
</form>


<h1> PHP Form </h1>
<br>

<?php
echo "<h2>Your Input:</h2>";
echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>";
echo "Comments: " . $comment . "<br>";
//echo "Major: " . $major . "<br>";

if(isset($_POST['major'])){
    echo "You have selected :".$_POST['major']; 
}

echo "Boxes Checked: <br>";
if(isset($_POST['submit'])){
    if(!empty($_POST['c'])){
        foreach($_POST['c'] as $selected){
            echo $selected."</br>";
        }
    }
}
?>

</body>


</html>