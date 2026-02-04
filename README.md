# Pet_parade
## Pet Parade is a full-stack web-based e-commerce platform developed to manage and sell pet-related products online. The system provides a smooth shopping experience for customers while offering a powerful admin dashboard to manage products, categories, orders, and users efficiently. 

## Technologies used
- Laravel
- MYSQL
- CSS
- Google credencials
 
## Prerequisites
- PHP (8.1+ recommended)
- Composer
- Node.js (LTS)
- npm
- XAMPP / MySQL

## Setup Instructions
### 1. Clone or Download the Project
```bash
git clone <your-repository-url>
```
### 2. Go to the project directory
```bash
cd <Project-Name>
```
### 3. Install PHP Dependencies
```bash
composer install
```
### 4. Copy .env.example and rename it to .env
```bash
copy .env.example .env
```
Generate the application key
```bash
php artisan key:generate
```
### 5. Update your .env file
```bash
DB_DATABASE= <your-databse-name>
DB_USERNAME= <your-databse-username>
DB_PASSWORD= <your-databse-password>
```
### 6. Run migrations
```bash
php artisan migrate:fresh
```
### 7. Install Frontend Dependencies
```bash
npm install
```
### 8. Run the Project
```bash
npm run dev
```
start Laravel (new terminal)
```bash
php artisan serve
```
Open in browser
```bash
 http://127.0.0.1:8000
```

## Common Errors & Fixes
### 1. Vite manifest not found
```bash
 public/build/manifest.json
```
Fix : 
```bash
npm install
npm run dev
```
### 2. 500 Server Error
To Fix: Enable debug
```bash
 APP_DEBUG=true
```
Check logs if it shows:
```bash
 storage/logs/laravel.log
```
The application should now be running successfully
- ### Inaddition, wants to check functions and log in as an admin
Seed only categories and subcategories (no example products)
```bash
 php artisan db:seed
```
