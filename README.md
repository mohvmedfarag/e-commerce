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

Set up environment variables:
Configure your .env file with your database credentials and other necessary settings.

Run the project:
php artisan serve
