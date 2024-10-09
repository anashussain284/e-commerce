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