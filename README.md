# Multi-Vendor E-Commerce Backend System

## Overview
This is the backend system for a **Multi-Vendor E-Commerce Platform**. It is designed to handle the core functionality of a multi-vendor marketplace, including product management, order management, payment processing, shipment management, and order tracking. Each vendor can manage their products and process their own payments and shipments independently.

## System Setup

### Prerequisites
- **PHP**: 8.4
- **Composer**: 2.8
- **MySQL**: 8.4.3

### Setup Instructions

1. **Clone the GitHub repository**:

    ```bash
    git clone [https://github.com/your-repository-url.git](https://github.com/sahil7194/ecommerce)
    cd ecommerce
    ```

2. **Install dependencies using Composer**:

    ```bash
    composer install
    ```

3. **Create the `.env` file**:

    ```bash
    cp .env.example .env
    ```

4. **Generate the application key**:

    ```bash
    php artisan key:generate
    ```

5. **Run database migrations**:

    ```bash
    php artisan migrate
    ```

6. **Start the Laravel development server**:

    ```bash
    php artisan serve
    ```

    After running this command, the application should be accessible at `http://127.0.0.1:8000`.

