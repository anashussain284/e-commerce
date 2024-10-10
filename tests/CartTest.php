<?php

use PHPUnit\Framework\TestCase;
use App\Cart;
use App\Customer;
use App\PhysicalProduct;

class CartTest extends TestCase {

    private Cart $cart;
    private Customer $user;
    private PhysicalProduct $product;

    public function setUp() : void
    {
        $this->user = new Customer("CU02", "Anas Hussain M", "anas@gmail.com");
        $this->product = new PhysicalProduct("PP02", "Travel bag", 1099.0, 1.0);
        $this->cart = new Cart("CU02");

        // print_r($this->cart);
    }

    public function testAddItem() : void 
    {
        $result = $this->cart->addItem($this->product);
        print_r($result); die();
        // $this->assertEquals()
    }

}