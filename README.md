E-Commerce Platform
Project Overview
This project is a full-featured e-commerce platform built with Laravel. It provides a wide range of functionality, including authentication, authorization, product management, and shopping cart features. The application is designed with both admin and user roles, and offers a clean API for handling various operations. Below is a breakdown of the key features included in the project.

Key Features

Authentication:
Implemented using Laravel Jetstream.
Supports user registration, login, and password reset functionality.
Secured API routes for authentication-related actions.

Authorization:
Role-based access control (RBAC).
Admin middleware ensures only administrators can access certain routes (e.g., product management, user management).

Admin Features:
Localization: Supports multi-language functionality.
Pagination: Admin can view paginated lists of products and users.
Product Management:
Admin can add, edit, delete, and view products.
API endpoints for product creation, updates, and deletion.
Order Management: Admin can manage user orders and view order details.

User Features:
Search: Users can search for products by name or category.
Product Orders:
Users can place orders for products.
Users can view their order history.
Shopping Cart:
Users can add products to the cart.
Cart management (add, remove, update items).
Favorites:
Users can add products to their favorites for quick access.
Wishlist (for guests):
Guests can add products to a wishlist without needing to log in.

API:
Authentication API: For user login, registration, and password management.
Product Management API: For creating, updating, and deleting products.
Cart API: Manage the shopping cart through API calls.
Order API: Place and view orders via API.

Additional Features:
Seeder and Factory: Prepopulate the database with users, products, and other necessary data.
Middleware: Custom middleware for ensuring only admins can perform admin-level tasks.
Localization: Supports multiple languages for a better user experience.
Pagination: Ensures smooth data handling for both admins and users, with paginated product and user lists.

How to Run the Project

Clone the repository:

bash
git clone https://github.com/your-username/project-name.git

Install dependencies:
composer install

install jetstream
composer require laravel/jetstream
php artisan jetstream:install livewire

Install NPM Dependencies
npm install

Build Your Assets
npm run dev

Run database migrations:
php artisan migrate --seed

Screenshot

![login](https://github.com/user-attachments/assets/b5aaa6e9-9bf2-473c-93b5-d3b4fdd79f0c)
![dashboard](https://github.com/user-attachments/assets/238607bf-4183-4a90-a70a-154fa8c1d244)
![admin side](https://github.com/user-attachments/assets/311479e3-64bc-48e7-a91f-1e0f71d80627)
![home](https://github.com/user-attachments/assets/00b540e6-14ff-4a81-8188-b425d2ca9379)
![products](https://github.com/user-attachments/assets/508ea3dd-9b38-4832-95a9-f057b63ae3a9)

Set up environment variables:
Configure your .env file with your database credentials and other necessary settings.

Run the project:
php artisan serve
