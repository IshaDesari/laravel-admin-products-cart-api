# CMT_Task_Admin_Products_Cart_API

A Laravel 10/11 application that provides a **Product Management Admin Panel (Web)** and **Customer Cart & Checkout APIs** secured using **Laravel Sanctum**.

This project demonstrates best practices such as **Form Request validation**, **authorization separation**, and clean backend architecture.

---

## 🚀 Features

### 🧑‍💼 Admin Panel (Web)

- Session-based admin authentication
- Product CRUD (Create, Read, Update, Delete)
- Search products by **name** or **SKU**
- Toggle product **active / inactive**
- Server-side validation using Form Requests
- Display validation errors and success messages

### 📱 Customer APIs (Sanctum Authentication)

- Register
- Login
- Logout
- Add products to cart (merges duplicate products)
- Update cart item quantity
- Remove items from cart
- View cart with total price
- Checkout with stock validation

---

## 🗂 Tech Stack

| Technology | Version |
|------------|---------|
| Laravel | 10 / 11 |
| PHP | 8+ |
| Database | MySQL / PostgreSQL |
| Authentication | Laravel Sanctum |

---

## 🧱 Database Structure

**Main Tables:**

- `products`
- `users`
- `admins`
- `carts` *(one cart per user)*
- `cart_items`

The database schema includes proper **foreign keys**, **indexes**, and **data integrity constraints**.

---

## 📥 Getting Started

### 🔁 Clone the Repository


git clone https://github.com/IshaDesari/CMT_Task_Admin_Products_Cart_API.git
cd CMT_Task_Admin_Products_Cart_API


### ⚙️ Install Dependencies

composer install
npm install

### 📄 Environment Setup
cp .env.example .env
php artisan key:generate

### 🗄️ Run Migrations & Seeders
php artisan migrate
php artisan db:seed

### 🚀 Run the Application
php artisan serve

Admin Panel: http://127.0.0.1:8000
API Base URL: http://127.0.0.1:8000/api

### 🔐 Default Admin Credentials

Admin Login:

Email: admin@example.com
Password: password

### 🧪 Testing

Run tests using:
php artisan test

```bash
