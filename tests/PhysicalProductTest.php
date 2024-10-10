<?php

use PHPUnit\Framework\TestCase;

use App\PhysicalProduct;

class PhysicalProductTest extends TestCase {
    private PhysicalProduct $product;

    public function setUp() : void 
    {
        $this->product = new PhysicalProduct("PP02", "Travel bag", 1099.0, 1.0);
    }

    public function testGetId() : void 
    {
        $this->assertEquals("PP02", $this->product->getId());
    }

    public function testGetName() : void
    {
        $this->assertEquals("Travel bag", $this->product->getName());
    }

    public function testGetPrice() : void 
    {
        $this->assertEquals(1099.0, $this->product->getPrice());
    }

    public function testGetCategory() : void
    {
        $this->assertEquals("Physical product", $this->product->getCategory());
    }

    public function testGetShippingCost() : void 
    {
        $this->assertEquals(0.5, $this->product->getShippingCost());
    }

    public function testGetWeight() : void
    {
        $this->assertEquals(1.0, $this->product->getWeight());
    }

    public function testCalculateShippingCost() : void 
    {
        $this->assertEquals(0.5, $this->product->calculateShippingCost());
    }
}