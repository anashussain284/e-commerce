<?php

namespace App;

require __DIR__ . "/../vendor/autoload.php";

$anasCustomer = new Customer("CU01", "Anas", "anas@gmail.com");

echo "CUSTOMER <br>";
echo "Customer name: " . $anasCustomer->getName() . "<br>";
echo "Customer id: " . $anasCustomer->getId() . "<br>";
echo "Cusomer email: " . $anasCustomer->getEmail() . "<br>";
echo "Customer role: " . $anasCustomer->getRole() . "<br>";
echo "{$anasCustomer->getName()} auth status: {$anasCustomer->getLoginStatus()} <br>";
$anasCustomer->login();
echo "{$anasCustomer->getName()} auth status: {$anasCustomer->getLoginStatus()} <br>";
echo "<br>====================<br>";

echo "ADMIN <br>";
$shahidAdmin = new Admin("AU01", "Shahid", "shahid@gmail.com");
echo "Admin name: " . $shahidAdmin->getName() . "<br>";
echo "Admin id: " . $shahidAdmin->getId() . "<br>";
echo "Admin email: " . $shahidAdmin->getEmail() . "<br>";
echo "Admin role: " . $shahidAdmin->getRole() . "<br>";
echo "{$shahidAdmin->getName()} auth status: {$shahidAdmin->getLoginStatus()} <br>";
$shahidAdmin->login();
echo "{$shahidAdmin->getName()} auth status: {$shahidAdmin->getLoginStatus()} <br>";
echo "<br>====================<br>";

echo "DIGITAL PRODUCT <br>";
$eBook = new DigitalProduct("DP01", "My eBook", 1000.0);
echo "Product id: " . $eBook->getId() . "<br>";
echo "Product name: " . $eBook->getName() . "<br>";
echo "Product price: " . $eBook->getPrice() . "<br>";
echo "Product category: " . $eBook->getCategory() . "<br>";
echo "Product shipping cost: " . $eBook->calculateShippingCost() . "<br>";
echo "<br>====================<br>";

echo "PHYSICAL PRODUCT <br>";
$book = new PhysicalProduct("PP01", "Alchemist", 250, 2);
echo "Product category: {$book->getCategory()} <br>";
echo "Product id: {$book->getId()} <br>";
echo "Product name: {$book->getName()} <br>";
echo "Product price: {$book->getPrice()} <br>";
echo "Product weight: {$book->getWeight()} <br>";
echo "Product shipping cost: {$book->calculateShippingCost()} <br>";
echo "<br>====================<br>";

echo "<br>Cart<br>";
$anasCart = new Cart($anasCustomer->getId());
// print_r($anasCart);
$anasCart->addItem($eBook);
$anasCart->addItem($book);
// print_r($anasCart);
// $anasCart->removeItem("DP01");
// print_r($anasCart);
echo "<br>Anas Cart total price: {$anasCart->calculateTotal()}. <br>";
$allItems = $anasCart->listAllCartProducts();