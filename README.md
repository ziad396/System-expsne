
Expense Management System

A simple Expense Management System built with Laravel. The system helps users manage their daily expenses through an intuitive dashboard with authentication, expense tracking, searching, filtering, and statistics.

Features

- User Authentication (Login & Logout)
- Dashboard
- Add Expense
- View Expenses
- Update Expense
- Delete Expense
- Dashboard Statistics
  - Total Expenses
  - Total Amount

Technologies Used

- Laravel
- PHP
- MySQL
- Blade
- Bootstrap
- HTML
- CSS
- JavaScript

Project Structure

app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/

.env.example
artisan
composer.json
README.md

Installation

1. Clone Repository

git clone https://github.com/ziad396/System-Expense.git

2. Move to Project Directory

cd System-Expense

3. Install Dependencies

composer install
6. Configure Database

Open the ".env" file and update your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arab_apps
DB_USERNAME=root
DB_PASSWORD=

7. Run Migrations

php artisan migrate

If the project includes seeders:

php artisan db:seed

Or:

php artisan migrate --seed

8. Start the Development Server

php artisan serve

Then open:

http://127.0.0.1:8000

Default Login Credentials

If database seeders are included:

Email: admin@gmail.com
Password: admin123

Database

The database structure is managed using Laravel Migrations.

Author

Ziad Ali Ibrahim Tayel

Backend Developer (PHP / Laravel)
