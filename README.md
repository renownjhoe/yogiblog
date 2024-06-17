Blog Project with Laravel: Features and Setup
This document outlines the features, setup instructions, and usage details for a blog application built with Laravel.

Requirements
PHP 8.1 or higher
Composer
Node.js and npm
Features
User Authentication:

User registration and login functionality using Laravel's built-in scaffolding.
User roles and permissions management with Spatie Laravel-Permission package.
Blog Posts:

CRUD operations (Create, Read, Update, Delete) for blog posts.
Validation for title (required, unique) and body (required).
Comments:

CRUD operations for comments on posts.
Validation for comment body (required).
Post Listing:

Display all blog posts on the homepage with title, author, and snippet.
Post Details:

Display full content of a post along with its comments.
Admin Panel:

Manage posts and comments through a dedicated admin interface.
API Endpoints:

Create, update, and view posts using API endpoints.
Additional Features:

(Optional) Search functionality for posts by title or body content.
(Optional) Enhanced admin panel features for post and comment management.
Installation
Clone the Repository:

Bash
git clone https://github.com/your-repository-url.git
cd your-repository-name
Use code with caution.
content_copy
Install Dependencies:

Bash
composer install
npm install
Use code with caution.
content_copy
Set Up Environment Variables:

Copy .env.example to .env and configure database credentials and other settings.
Generate an application key:
Bash
php artisan key:generate
Use code with caution.
content_copy
Configure Database:

Update the database connection details in the .env file with your database information.
Run Migrations and Seeders:

Bash
php artisan migrate --seed
Use code with caution.
content_copy
Build Assets (using Vite):

Bash
npm run build
Use code with caution.
content_copy
Start Development Server:

Bash
php artisan serve
Use code with caution.
content_copy
Usage
User Authentication:

Register a new user or login with an existing account.
Blog Management:

As an authenticated user with the appropriate role (e.g., Admin, Editor), create, edit, and delete blog posts.
Commenting:

Comment on posts as an authenticated user.
API Endpoints:

Create, update, and view posts using the provided API endpoints (refer to documentation within the code for specific details and permissions required).
Admin Panel:

Access the admin panel (if applicable) for extended management features of posts and comments. This panel is typically only accessible to users with the "Admin" role.
Unit Testing:

Unit tests for key functionalities are available. Execute them using:

Bash
php artisan test
Use code with caution.
content_copy
Bonus Features (Optional):

Additional API endpoints for listing posts and commenting functionality.
Search functionality for posts by title or body content.
Enhanced admin panel features for managing posts and comments.
