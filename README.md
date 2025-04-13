
# Laravel E-commerce API

This is a backend test project built using **Laravel** for a basic e-commerce system with:

- Product & Category management
- Image uploads
- Order placement
- Role-based authentication (Admin & Customer)
- Proper error handling & API structure

---

## Requirements

- PHP 8.1+
- Composer
- MySQL
- Laravel 10+
- Postman (for testing)

---

## Setup Instructions

1. **Clone the repo**
```bash
git clone https://github.com/your-username/laravel-ecommerce-api.git
cd laravel-ecommerce-api
```

2. **Install dependencies**
```bash
composer install
```

3. **Copy `.env` and generate key**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Set up DB in `.env`**
```env
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations and seed**
```bash
php artisan migrate --seed
```

6. **Create storage link (for image access)**
```bash
php artisan storage:link
```

7. **Serve the project**
```bash
php artisan serve
```

> App runs at `http://127.0.0.1:8000`

---

## Authentication

- **Sanctum** is used for token-based API auth
- Roles: `admin` can manage products/categories, `customer` can only view & order

### Endpoints:
- `POST /api/register`  
- `POST /api/login`  
- `POST /api/logout`

---

## Products API

- `GET /api/products` → List (with pagination)
- `GET /api/products/{id}` → Single product
- `POST /api/products` → Create (admin only, with image upload)
- `PUT /api/products/{id}` → Update
- `DELETE /api/products/{id}` → Soft delete

Image upload supported via `multipart/form-data`  
Key: `images[]` (multiple allowed)

---

## Orders API

- `POST /api/orders` → Place an order
- `GET /api/orders` → View order history
- `GET /api/orders/{id}` → View single order

Authenticated users only.  
Inventory automatically decreases on order.

---

## Postman Collection

A ready-to-use Postman collection is included.

**Steps:**
1. Import this file: `Laravel E-commerce Final Collection.postman_collection`
2. Set variables:
   - `{{base_url}}` → `http://127.0.0.1:8000`
   - `{{token}}` → From login response
3. Use `Accept: application/json` in header.

---

## Validation & Security

- Validation using Laravel's Validator
- API Rate Limiting (60 req/min)
- Email format check using `email:rfc,dns`
- Mass assignment protection
- Role middleware
- Global error handler (JSON only)

---

## Folder Structure (Simplified)

```
app/
  Http/
    Controllers/Api/
    Middleware/
  Models/
routes/
  api.php
storage/app/public/products  ← uploaded images
```
---

## Notes

- Only admins can create/update/delete products
- Customers can only view + place orders
- Categories are seeded automatically
- Images are stored in `storage/app/public/products`

---

## Contact

If anything’s unclear, feel free to ping me. Thanks for checking out the project! 😊
