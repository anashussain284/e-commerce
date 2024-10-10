<?php 

namespace App;

// require __DIR__ . "/../vendor/autoload.php";

use App\User;

class Customer extends User {
    private string $id;
    private string $name;
    private string $email;
    private string $role = "Customer";
    private bool $authStatus = false;

    public function __construct(string $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getLoginStatus() : string 
    {
        return $this->authStatus;
        // if ($this->authStatus) {
        //     return "Logged in.";
        // }
        // return "Logged out.";
    }

    public function setId(string $id) : void 
    {
        $this->id = $id;
    }

    public function getId() : string {
        return $this->id;
    }

    public function setName(string $name) : void 
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setEmail(string $email) : void 
    {
        $this->email = $email;
    }

    public function getEmail() : string 
    {
        return $this->email;
    }

    public function setRole(string $role) : void 
    {
        $this->role = $role;
    }

    /**
     * Method to log in a user.
     */
    public function login() : void
    {
        $this->authStatus = true;
        echo "Customer {$this->getName()} logged in successfully.<br>";
    }

    /**
     * Method to log out a user.
     */
    public function logout() : void 
    {
        $this->authStatus = false;
        echo "Customer {$this->getName()} logged out.<br>";
    }

    /**
     * Get the role of the user (admin or customer).
     */
    public function getRole() : string 
    {
        return $this->role;
    }

    /**
     * 
     */
    // public function viewProducts() : array {

    // }   
}