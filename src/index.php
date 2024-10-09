<?php

namespace App;

require __DIR__ . "/../vendor/autoload.php";

use App\Customer;

$anasCustomer = new Customer(1, "Anas", "anas@gmail.com");
$anasCustomer->setName("Anas");

echo "Customer name: " . $anasCustomer->getName() . "<br>";
echo "Customer id: " . $anasCustomer->getId() . "<br>";
echo "Cusomer email: " . $anasCustomer->getEmail() . "<br>";
echo "Customer role: " . $anasCustomer->getRole() . "<br>";
echo "{$anasCustomer->getName()} auth status: {$anasCustomer->getAuthStatus()} <br>";
$anasCustomer->login();
echo "{$anasCustomer->getName()} auth status: {$anasCustomer->getAuthStatus()} <br>";
echo "<br>";

// $shahidAdmin = new Admin(2, "Shahid", "shahid@gmail.com");
// echo "Admin name: " . $shahidAdmin->getName() . "<br>";
// echo "Admin id: " . $shahidAdmin->getId() . "<br>";
// echo "Admin email: " . $shahidAdmin->getEmail() . "<br>";
// echo "Admin role: " . $shahidAdmin->getRole() . "<br>";
// echo "{$shahidAdmin->getName()} auth status: {$shahidAdmin->getAuthStatus()} <br>";
// $shahidAdmin->login();
// echo "{$shahidAdmin->getName()} auth status: {$shahidAdmin->getAuthStatus()} <br>";
// echo "<br>";

$shahidAdmin = new Admin(2, "Shahid", "shahid@gmail.com");
echo "Admin name: " . $shahidAdmin->name . "<br>";
// echo "Admin id: " . $shahidAdmin->getId() . "<br>";
// echo "Admin email: " . $shahidAdmin->getEmail() . "<br>";
// echo "Admin role: " . $shahidAdmin->getRole() . "<br>";
// echo "{$shahidAdmin->getName()} auth status: {$shahidAdmin->getAuthStatus()} <br>";
// $shahidAdmin->login();
// echo "{$shahidAdmin->getName()} auth status: {$shahidAdmin->getAuthStatus()} <br>";
// echo "<br>";