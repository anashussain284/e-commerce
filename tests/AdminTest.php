<?php

use App\Admin;
use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase {

    private Admin $user;

    public function setUp() : void 
    {
        $this->user = new Admin("AU01", "Anas Hussain M", "anas@gmail.com");
        // $this->user->login();
    }

    public function testGetLoginStatus() : void
    {
        $this->assertEquals(false, $this->user->getLoginStatus());
    }

    public function testGetId() : void 
    {
        $this->assertEquals("AU01", $this->user->getId());
    }

    public function testGetName() : void 
    {
        $this->assertEquals("Anas Hussain M", $this->user->getName());
    }

    public function testGetEmail() : void
    {
        $this->assertEquals("anas@gmail.com", $this->user->getEmail());
    }

    public function testLogin() : void
    {
        $this->user->login();
        $this->assertEquals(true, $this->user->getLoginStatus());
    }

    public function testLogout() : void 
    {
        $this->user->logout();
        $this->assertEquals(false,$this->user->getLoginStatus());
    }

    public function testGetRole() : void
    {
        $this->assertEquals("Admin", $this->user->getRole());
    }

}