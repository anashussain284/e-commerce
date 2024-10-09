<?php

namespace App;

abstract class User {
    private string $id;
    private string $name;
    private string $email;
    private string $role;
    private bool $authStatus = false;

    /**
     * Abstract method to log in a user.
     */
    abstract public function login() : void;

    /**
     * Abstract method to log out a user.
     */
    abstract public function logout() : void;

    /**
     * Get the role of the user (admin or customer).
     */
    abstract public function getRole() : string;
}