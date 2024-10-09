<?php
namespace App;

interface Product {   

    public function getId() : string;
    public function getName() : string;
    public function getPrice() : float;
    public function getCategory() : string;
    public function calculateShippingCost() : float;
    // public function getDetails(); /** display product details */
}