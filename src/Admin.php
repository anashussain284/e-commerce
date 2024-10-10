<?php

namespace App;

class Admin extends User {
    private string $id;
    private string $name;
    private string $email;
    private string $role = "Admin";
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
        // } else {
        //     return "Logged out.";
        // }
    }

    public function setId(string $id) : void
    {
        $this->id = $id;
    }

    public function getId() : string
    {
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