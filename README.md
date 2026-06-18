# Sports Warehouse – Online Store

A full-stack e-commerce web application built with Laravel 12 for Sports Warehouse, an Illawarra-based sporting goods retailer. This project was developed as part of the ICT50220 Diploma of IT (Front & Back End Web Development) at TAFE NSW.

The application allows customers to browse and purchase sports equipment and apparel online, and allows staff to manage the product catalogue through an admin panel.

---

## Features

### Customer-Facing

- Browse all products and filter by category
- Search products by name
- View individual product detail pages
- Add and remove items from a session-based shopping cart
- Checkout with shipping and payment details
- Order confirmation page with order summary
- Contact form
- About page

### Admin Panel (Requires Login)

- Create, edit, and delete product categories
- Create, edit, and delete products (name, description, price, sale price, image, featured flag)
- User registration, login, and profile management via Laravel Breeze

---

## Tech Stack

- **Framework:** Laravel 12
- **Authentication:** Laravel Breeze
- **Database:** SQLite (default) — compatible with MySQL 8.0+
- **Frontend:** Blade templates, Tailwind CSS, Vite
- **PHP:** 8.2+
- **Server:** Apache 2.4+ with PHP 8.1+

---

## Setup Instructions

### 1. Clone the repository

```bash
git clone <your-repo-url>
cd sports-warehouse
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Set up the database

```bash
php artisan migrate:fresh
```

### 5. Build frontend assets

```bash
npm run build
```

### 6. Start the development server

```bash
php artisan serve
```

Visit https://navy03.ho.web.tafensw.edu.au/ in your browser.

---

## Admin Access

To access the admin panel at `/admin/products` and `/admin/categories`, you must first register an account at `/register` and log in.

---

## Project Structure

```
app/
├── Http/Controllers/
│   ├── CartController.php        # Session-based cart logic
│   ├── CategoryController.php    # Admin CRUD for categories
│   ├── CheckoutController.php    # Order placement and confirmation
│   ├── HomeController.php        # Homepage with featured products
│   └── ProductController.php     # Product browsing, search, admin CRUD
├── Models/
│   ├── Category.php
│   ├── Order.php
│   ├── OrderItem.php
│   └── Product.php
database/
└── migrations/                   # Tables: users, categories, products, orders, order_items
resources/views/
├── admin/                        # Admin product and category management views
├── cart/                         # Shopping cart view
├── checkout/                     # Checkout form and order confirmation
├── product/                      # Product listing, category, search, detail views
└── layouts/                      # Storefront and auth layouts
```

---

## Database Schema

| Table         | Description                            |
| ------------- | -------------------------------------- |
| `users`       | Registered staff/admin accounts        |
| `categories`  | Product categories                     |
| `products`    | Products with price, sale price, image |
| `orders`      | Customer orders with shipping/payment  |
| `order_items` | Individual line items per order        |

---

## Notes

- Pricing includes a flat $5.00 shipping fee applied at checkout
- GST (10%) is displayed on the checkout page as included in the total
- Payment details are stored directly in the database as per assessment requirements
- Product images are served from the `public/images/` directory
