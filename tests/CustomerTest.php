<?php 

use PHPUnit\Framework\TestCase;

use App\Customer;

class CustomerTest extends TestCase {
    private Customer $user;

    public function setUp() : void 
    {
        $this->user = new Customer("CU02", "Anas Hussain M", "anas@gmail.com");
    }

    public function testGetLoginStatus() : void 
    {
        $this->assertEquals(false, $this->user->getLoginStatus());
    }

    public function testGetId() : void
    {
        $this->assertEquals("CU02", $this->user->getId());
    }
    
    public function testGetName() : void
    {
        $this->assertEquals("Anas Hussain M", $this->user->getName());
    }
    
    public function testGetEmail() : void
    {
        $this->assertEquals("anas@gmail.com", $this->user->getEmail());
    }
    
    public function testGetRole() : void
    {
        $this->assertEquals("Customer", $this->user->getRole());
    }

    


    
}