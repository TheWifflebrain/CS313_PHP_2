<?php
session_start();

class Product {
    public function __construct($pic, $name, $price, $count) {
        $this->pic = $pic;
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
    }
}
$products = array();
$cartItems = array();
$keyboards = array("Massdrop Alt", "Kono Kira", "GMK Mizu",
                    "Plank", "DSA Keycaps");
$prices = array(180, 180, 250, 170, 90);
$pics = array("altpic.jpg", "Kirapic.jpg", "GMKMizuPic.jpg",
                    "orthoPic.png", "keycapPic.jpg");
$count = array(0,0,0,0,3);
$total = 0;

for($i = 0; $i <5; $i++){
    $oneKeeb = new Product($pics[$i], $keyboards[$i], $prices[$i], $count[$i]);
    array_push($products, $oneKeeb);
}
$_SESSION["boughtKeyboards"] = $products;

if(isset($_POST['submit'])){
    $_SESSION['inCart0'] = htmlentities($_POST['inCart0']);
    $_SESSION['inCart1'] = htmlentities($_POST['inCart1']);
    $_SESSION['inCart2'] = htmlentities($_POST['inCart2']);
    header('Location: viewCart.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="shopStyle.css">
    <title>Mechanical Keyboards</title>
</head>

<body>
    <p class="text-center display-1 jumbotron">Mech Market</p>


<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <img class="mx-auto d-block" src="<?php echo $pics[0]; ?>" alt="keeb0">
        <h3 class="text-xl-center display-4"><?php echo $keyboards[0]; ?></h3>
        <h3 class="text-center">$ <?php echo number_format($prices[0], 2); ?></h3>
            <div class="row justify-content-center">
                <input type="text" name="inCart0" placeholder="How many do you want?">
            </div>
        <br>
        <br>

        <img class="mx-auto d-block" src="<?php echo $pics[1]; ?>" alt="keeb1">
        <h3 class="text-xl-center display-4"><?php echo $keyboards[1]; ?></h3>
        <h3 class="text-center">$ <?php echo number_format($prices[1], 2); ?></h3>
            <div class="row justify-content-center">
                <input type="text" name="inCart1" placeholder="How many do you want?">
            </div>
        <br>
        <br>

        <img class="mx-auto d-block" src="<?php echo $pics[2]; ?>" alt="keeb1">
        <h3 class="text-xl-center display-4"><?php echo $keyboards[2]; ?></h3>
        <h3 class="text-center">$ <?php echo number_format($prices[2], 2); ?></h3>
            <div class="row justify-content-center">
                <input type="text" name="inCart2" placeholder="How many do you want?">
            </div>
        <br>
        <br>


<div class="row justify-content-center">
    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Proceed to View Cart">
</div>
</form>
 
</body>
</html>