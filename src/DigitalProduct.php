<?php

namespace App;

use App\Product;

class DigitalProduct implements Product {
    private string $id;
    private string $name;
    private float $price;
    private int $weight = 1;
    private string $category = "Digital product";

    public function __construct(string $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getPrice() : float
    {
        return $this->price;
    }

    public function getWeight() : int
    {
        return $this->weight;
    }

    public function getCategory() : string
    {
        return $this->category;
    }

    public function calculateShippingCost() : float
    {
        return 0;
    }
    
}