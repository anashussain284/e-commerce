Here’s a more detailed breakdown of the project to help you implement various OOP concepts:

### 1. **User System (Abstract Class & Inheritance)**
   - **User Class** (Abstract)
     - **Properties**: `id`, `name`, `email`, `role`
     - **Methods**:
       - `login()`: Authenticates the user.
       - `logout()`: Logs the user out.
       - `getRole()`: Returns the role of the user (`admin` or `customer`).

   - **Customer Class** (Inherits from User)
     - **Additional Methods**:
       - `viewProducts()`: View available products.
       - `placeOrder()`: Place an order for items in the cart.

   - **Admin Class** (Inherits from User)
     - **Additional Methods**:
       - `addProduct(Product $product)`: Adds a new product to the inventory.
       - `editProduct(Product $product)`: Updates details of a product.
       - `deleteProduct(int $productId)`: Removes a product from the inventory.

### 2. **Product System (Interface & Polymorphism)**
   - **Product Interface**
     - **Properties**: `id`, `name`, `price`, `category`
     - **Methods**:
       - `calculateShippingCost()`: Calculates shipping for physical products.
       - `getDetails()`: Displays product details.
   
   - **PhysicalProduct Class** (Implements Product)
     - **Properties**: `weight`, `shippingCost`
     - **Method**:
       - `calculateShippingCost()`: Uses weight to calculate the shipping cost.

   - **DigitalProduct Class** (Implements Product)
     - **Method**:
       - `calculateShippingCost()`: Returns 0 for digital products (no shipping required).

### 3. **Cart System**
   - **Cart Class**
     - **Properties**: `userId`, `items[]`
     - **Methods**:
       - `addItem(Product $product)`: Adds a product to the cart.
       - `removeItem(int $productId)`: Removes a product from the cart.
       - `calculateTotal()`: Calculates the total cost of items in the cart, including any shipping costs.

### 4. **Order System**
   - **Order Class**
     - **Properties**: `orderId`, `userId`, `cart`, `status`
     - **Methods**:
       - `placeOrder()`: Places an order for the cart.
       - `cancelOrder()`: Cancels an order.
       - `updateStatus(string $status)`: Updates the order status (e.g., `pending`, `shipped`, `completed`).

### 5. **Payment System (Abstract Class & Polymorphism)**
   - **Payment Class** (Abstract)
     - **Methods**:
       - `processPayment()`: Processes payment.

   - **CreditCardPayment Class** (Extends Payment)
     - **Properties**: `cardNumber`, `expirationDate`, `cvv`
     - **Method**:
       - `processPayment()`: Implements payment via credit card.

   - **PayPalPayment Class** (Extends Payment)
     - **Properties**: `paypalEmail`
     - **Method**:
       - `processPayment()`: Implements payment via PayPal.

### 6. **Order Status Tracking**
   - Each order will have a status (pending, shipped, completed, etc.), which can be updated as the order progresses through various stages.

### 7. **Admin Functionality**
   - Admin users can:
     - Add, edit, and remove products.
     - Manage users (if extended).
     - View and update orders.

### 8. **Additional Requirements**
   - **Search Functionality**: Customers should be able to search for products by name, category, or price range.
   - **Inventory Management**: Ensure that product stock (for physical products) decreases when orders are placed.
   - **Discount System**: Add support for discount codes that can reduce the total cost of an order.
   - **Order Confirmation & Emails**: After placing an order, an order confirmation email should be sent to the user.
   - **Product Reviews & Ratings**: Allow customers to leave reviews and ratings for products.

### 9. **Database Structure** (Optional for Full-Scale Implementation)
   You can use the following structure:
   - `Users` table (id, name, email, password, role)
   - `Products` table (id, name, price, category, type [physical/digital], stock for physical products)
   - `Orders` table (id, userId, totalPrice, status)
   - `Cart` table (id, userId, productId, quantity)
   - `Payments` table (id, orderId, type, amount)

By implementing these additional features and details, you’ll use a wide range of OOP concepts like inheritance, abstraction, encapsulation, polymorphism, and interfaces. This will provide you with more hands-on experience with OOP principles and help you build a real-world project.



FILES in SRC folder
----------------------

User.php (abstract & inheritance) ✅
Customer.php ✅
Admin.php ✅

Product.php (interface & polymorphism) ✅
PhysicalProduct (implements product) ✅
DigitalProduct (implements product) ✅

Cart.php ✅

Order.php ✅

Payment (abstract & polymorphism) ✅
CredicCardPayment (extends payment) ✅
PaypalPayment (extends payment) ✅

index.php ✅


--------------------------------


Creating a full e-commerce system from scratch with detailed comments following PSR (PHP Standard Recommendations) is a large task, but I can guide you with an essential structure of the project. This system will leverage OOP principles like inheritance, polymorphism, encapsulation, and abstraction. I'll provide a simplified, modular version of the code that you can extend.

### 1. `composer.json` File

```json
{
    "name": "anashussain284/e-commerce",
    "description": "An E-commerce platform built with PHP OOP concepts.",
    "type": "project",
    "license": "MIT",
    "authors": [
        {
            "name": "Anas Hussain M",
            "email": "anashussain@gmail.com"
        }
    ],
    "require": {
        "php": "^8.2"
    },
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```

This file allows you to autoload classes using PSR-4 standards. Ensure you run `composer dump-autoload` after creating this file.

### 2. Directory Structure
```
.
├── composer.json
├── src
│   ├── User.php
│   ├── Admin.php
│   ├── Customer.php
│   ├── Product.php
│   ├── PhysicalProduct.php
│   ├── DigitalProduct.php
│   ├── Cart.php
│   ├── Order.php
│   ├── Payment.php
│   ├── CreditCardPayment.php
│   ├── PayPalPayment.php
│   ├── index.php
└── vendor
```

### 3. `User.php` (Abstract Class)

```php
<?php

namespace App;

/**
 * Abstract User class to define common properties and methods for users.
 */
abstract class User
{
    protected string $id;
    protected string $name;
    protected string $email;
    protected string $role;
    protected bool $authStatus = false;

    /**
     * Abstract method to log in a user.
     */
    abstract public function login(): void;

    /**
     * Abstract method to log out a user.
     */
    abstract public function logout(): void;

    /**
     * Get the role of the user (admin or customer).
     */
    abstract public function getRole(): string;
}
```

### 4. `Customer.php` (Inherits `User`)

```php
<?php

namespace App;

/**
 * Customer class inheriting from the abstract User class.
 */
class Customer extends User
{
    public function __construct(string $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->role = 'customer';
    }

    /**
     * Authenticate customer login.
     */
    public function login(): void
    {
        $this->authStatus = true;
        echo "Customer {$this->name} logged in successfully.\n";
    }

    /**
     * Log the customer out.
     */
    public function logout(): void
    {
        $this->authStatus = false;
        echo "Customer {$this->name} logged out.\n";
    }

    /**
     * Get the customer's role.
     */
    public function getRole(): string
    {
        return $this->role;
    }
}
```

### 5. `Admin.php` (Inherits `User`)

```php
<?php

namespace App;

/**
 * Admin class inheriting from the abstract User class.
 */
class Admin extends User
{
    public function __construct(string $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->role = 'admin';
    }

    /**
     * Authenticate admin login.
     */
    public function login(): void
    {
        $this->authStatus = true;
        echo "Admin {$this->name} logged in successfully.\n";
    }

    /**
     * Log the admin out.
     */
    public function logout(): void
    {
        $this->authStatus = false;
        echo "Admin {$this->name} logged out.\n";
    }

    /**
     * Get the admin's role.
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Admin can add, remove, or update products.
     */
    public function manageProduct(Product $product, string $action): void
    {
        echo "Admin {$this->name} has {$action} the product: {$product->getName()}.\n";
    }
}
```

### 6. `Product.php` (Interface)

```php
<?php

namespace App;

/**
 * Product interface that defines the blueprint for all products.
 */
interface Product
{
    public function getId(): string;
    public function getName(): string;
    public function getPrice(): float;
    public function calculateShippingCost(): float;
}
```

### 7. `PhysicalProduct.php` (Implements `Product` Interface)

```php
<?php

namespace App;

/**
 * Class representing a physical product with shipping cost.
 */
class PhysicalProduct implements Product
{
    private string $id;
    private string $name;
    private float $price;
    private float $weight;

    public function __construct(string $id, string $name, float $price, float $weight)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Calculate shipping cost based on weight.
     */
    public function calculateShippingCost(): float
    {
        return $this->weight * 0.5; // Example shipping cost logic.
    }
}
```

### 8. `DigitalProduct.php` (Implements `Product` Interface)

```php
<?php

namespace App;

/**
 * Class representing a digital product with no shipping cost.
 */
class DigitalProduct implements Product
{
    private string $id;
    private string $name;
    private float $price;

    public function __construct(string $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Digital products have no shipping cost.
     */
    public function calculateShippingCost(): float
    {
        return 0;
    }
}
```

### 9. `Cart.php`

```php
<?php

namespace App;

/**
 * Class representing a shopping cart.
 */
class Cart
{
    private string $userId;
    private array $items = [];

    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    public function addItem(Product $product): void
    {
        $this->items[] = $product;
    }

    public function removeItem(string $productId): void
    {
        $this->items = array_filter($this->items, fn($item) => $item->getId() !== $productId);
    }

    public function calculateTotal(): float
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}
```

### 10. `Order.php`

```php
<?php

namespace App;

/**
 * Class representing an order.
 */
class Order
{
    private string $orderId;
    private Cart $cart;
    private string $status;

    public function __construct(string $orderId, Cart $cart)
    {
        $this->orderId = $orderId;
        $this->cart = $cart;
        $this->status = 'pending';
    }

    public function placeOrder(): void
    {
        $this->status = 'placed';
        echo "Order {$this->orderId} has been placed.\n";
    }

    public function cancelOrder(): void
    {
        $this->status = 'canceled';
        echo "Order {$this->orderId} has been canceled.\n";
    }
}
```

### 11. `Payment.php` (Abstract Class)

```php
<?php

namespace App;

/**
 * Abstract class for handling different types of payments.
 */
abstract class Payment
{
    abstract public function processPayment(float $amount): void;
}
```

### 12. `CreditCardPayment.php`

```php
<?php

namespace App;

/**
 * Class for processing credit card payments.
 */
class CreditCardPayment extends Payment
{
    public function processPayment(float $amount): void
    {
        echo "Processing credit card payment of {$amount}.\n";
    }
}
```

### 13. `PayPalPayment.php`

```php
<?php

namespace App;

/**
 * Class for processing PayPal payments.
 */
class PayPalPayment extends Payment
{
   

 public function processPayment(float $amount): void
    {
        echo "Processing PayPal payment of {$amount}.\n";
    }
}
```

### 14. `index.php`

```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Admin;
use App\Customer;
use App\PhysicalProduct;
use App\DigitalProduct;
use App\Cart;
use App\Order;
use App\CreditCardPayment;
use App\PayPalPayment;

// Creating a new customer
$customer = new Customer('1', 'John Doe', 'john@example.com');
$customer->login();

// Adding products to the cart
$product1 = new PhysicalProduct('101', 'Laptop', 1000, 5);
$product2 = new DigitalProduct('102', 'E-book', 20);

$cart = new Cart($customer->getId());
$cart->addItem($product1);
$cart->addItem($product2);

// Placing an order
$order = new Order('501', $cart);
$order->placeOrder();

// Processing payments
$paymentMethod = new CreditCardPayment();
$paymentMethod->processPayment($cart->calculateTotal());

// Admin managing product
$admin = new Admin('99', 'Jane Smith', 'jane@example.com');
$admin->login();
$admin->manageProduct($product1, 'updated');

$customer->logout();
```

### Comments and Annotations:

- **PSR-1 and PSR-2 standards:** The code adheres to naming conventions (e.g., camelCase for methods and properties), and proper use of spaces, tabs, and braces.
- **PSR-4 autoloading:** The project uses Composer for PSR-4 autoloading, making class imports easier and cleaner.
- **Type hints and return types:** Methods are typed with scalar types (`string`, `float`, etc.) and return types for clarity and consistency.
- **Single Responsibility Principle (SRP):** Each class focuses on a single responsibility, such as `Payment` processing or managing `Order`s.
- **Inheritance and Interfaces:** `User` is an abstract class, extended by `Customer` and `Admin`, while `Product` is an interface implemented by `PhysicalProduct` and `DigitalProduct`.

You can expand this project further by adding features like order tracking, user authentication, shipping details, etc.

------------------------------

## To continue

### 1. Complete `CartTest.php` file
- testAddItem() function 
- test how to test return type is an object in phpunit test
