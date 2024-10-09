<?php

namespace App;

class Cart {
    private string $userId;
    private array $items = [];

    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Adds a product to the cart.
     */
    public function addItem(Product $product) : void
    {
        $this->items[] = $product;
    }

    /**
     * Removes a product from the cart.
     */
    public function removeItem(string $productId) : void
    {
        foreach ($this->items as $key => $product) {
            if ($product->getId() === $productId) {
                unset($this->items[$key]);
            }
        }
    }

    /**
     * Calculates the total cost of items in the cart, including any shipping costs.
     */
    public function calculateTotal() : float
    {
        $totalCost = 0;
        
        foreach ($this->items as $key => $product) {
            $totalCost += $product->calculateShippingCost() + $product->getPrice();
        }

        return $totalCost;
    }

    /**
     * List all products
     */
    public function listAllCartProducts() : array
    {
        $result = [];

        foreach ($this->items as $key => $product) {
            $oneProduct['id'] = $product->getId();
            $oneProduct['name'] = $product->getName();
            $oneProduct['price'] = $product->getPrice();
            $oneProduct['quantity'] = $product->getWeight();
            
            $result[] = $oneProduct;
        }
        // print_r($result); die();

        return $result;
    }

}