<?php

// namespace

use App\DigitalProduct;
use PHPUnit\Framework\TestCase;

class DigitalProductTest extends TestCase {
    private DigitalProduct $product;

    public function setUp() : void 
    {
        $this->product = new DigitalProduct("DP02", "Oppo Mobile", 1499.0);
    }

    public function testGetId() : void
    {
        $this->assertEquals("DP02", $this->product->getId());        
    }

    public function testGetName() : void
    {
        $this->assertEquals("Oppo Mobile", $this->product->getName());
    }

    public function testGetPrice() : void 
    {
        $this->assertEquals(1499.0, $this->product->getPrice());
    }

    public function testGetWeight() : void 
    {
        $this->assertEquals(1, $this->product->getWeight());
    }

    public function testGetCategory() : void
    {
        $this->assertEquals("Digital product", $this->product->getCategory());
    }

    public function testCalclateShippingCost() : void 
    {
        $this->assertEquals(0, $this->product->calculateShippingCost());
    }
}