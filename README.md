# Laravel Admin Products & Cart API

A Laravel 10/11 application that provides an **Admin Product Management Panel (Web)** and **Customer Cart & Checkout APIs** secured using **Laravel Sanctum**.

This project is built as part of a technical assignment and follows Laravel best practices including validation via Form Requests, clean authorization separation, and feature testing.

---

## Tech Stack

- Laravel 10 / 11
- PHP 8+
- MySQL / PostgreSQL
- Laravel Sanctum (API Authentication)

---

## Features

### Admin Panel (Web)
- Admin authentication (session-based)
- Admin-only route protection using guards & middleware
- Product CRUD (Create, Read, Update, Delete)
- Product search by **name / SKU** (database-driven)
- Toggle product active / inactive status
- Server-side validation using **Form Requests**
- Validation errors and success messages shown in UI

### Customer APIs (Sanctum)
- Register
- Login
- Logout

### Cart Module
- Add products to cart (duplicate products merge quantity)
- Update cart item quantity
- Remove cart items
- View cart items with total price
- Checkout with stock validation

---

## Database Structure

### Tables
- `products`
- `users`
- `admins`
- `carts` (user_id is unique)
- `cart_items`

Proper foreign keys, unique constraints, and data integrity rules are applied.

---

### Clone the Repository

```bash
git clone https://github.com/<your-username>/laravel-admin-products-cart-api.git
cd laravel-admin-products-cart-api
