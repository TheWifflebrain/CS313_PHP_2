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

print_r($products);
?>
