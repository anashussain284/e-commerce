<?php

namespace App;

class Admin extends User {
    private int $id;
    private string $name;
    private string $email;
    private string $role = "Admin";
    private bool $authStatus = false;

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId() : int {
        return $this->id;
    }

    /**
     * Method to log in an admin.
     */
    public function login() : void 
    {
        $this->authStatus = true;
        echo "Admin {$this->name} successfully login.";
    }

    /**
     * Method to log out an admin.
     */
    public function logout() : void 
    {
        $this->authStatus = false;
        echo "Admin {$this->name} successfully logout.";
    }

    /**
     * Get the role of the user (admin or customer).
     */
    public function getRole() : string 
    {
        return $this->role;
    }
}