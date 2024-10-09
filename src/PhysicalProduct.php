<?php

namespace App;

class PhysicalProduct implements Product {
    private string $id;
    private string $name;
    private float $price;
    private float $weight;
    private float $shippingCost = 0.5;
    private string $category = "Physical product";

    public function __construct(string $id, string $name, float $price, float $weight)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
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

    public function getCategory() : string
    {
        return $this->category;
    }

    public function getShippingCost() : float
    {
        return $this->shippingCost;
    }

    public function getWeight() : float
    {
        return  $this->weight;
    }

    public function calculateShippingCost() : float
    {
        return $this->weight * $this->shippingCost;
    }

    // public function getDetails(); /** display product details */
}