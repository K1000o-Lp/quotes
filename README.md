# Quotes App - Development Environment

<p align="center">
<a href="https://laravel.com"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prerequisites

To run this application you will need:

- PHP 8.1 or higher
- Composer installed
- Node.js version 20 or higher
- Git (to clone the repository)

## Environment Setup

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/quotes.git
cd quotes
```

### 2. Configure environment variables

Copy the example environment variables file:

```bash
cp .env.example .env
```

Make sure to properly configure the following variables:

```
CACHE_DRIVER=file
```

### 3. Install dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 4. Generate application key

```bash
php artisan key:generate
```

## Starting the development server

### Option 1: Laravel development server (recommended)

```bash
php artisan serve
```

This will start a server at `http://localhost:8000`

### Option 2: Nginx configuration

If you prefer using Nginx, here's a basic configuration:

```nginx
server {
    listen 80;
    server_name quotes.local;
    root /path/to/your/project/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## Compiling assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

## Optimizing the application

```bash
php artisan optimize
```

## Ready!

Now you can enjoy Camilo App Quotes! Open your browser and go to `http://localhost:8000`.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
