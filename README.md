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

### 1. Installation

There are two options to install this application:

#### Option 1: Clone the repository

```bash
git clone https://github.com/K1000o-Lp/quotes.git
cd quotes
```

#### Option 2: Via Composer

```bash
composer require camilo/quotes
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

## Publish package assets

Execute next commands:

```bash
# The flag --force is optional, use it when you want overwrite the assets because the package is updated  
php artisan vendor:publish --tag=quotes.assets --force
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
