# Quotes App - Entorno de Desarrollo

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requisitos previos

Para ejecutar esta aplicación necesitarás:

- PHP 8.1 o superior
- Composer instalado
- Node.js versión 20 o superior
- Git (para clonar el repositorio)

## Configuración del entorno

### 1. Clonar el repositorio

```bash
git clone https://github.com/yourusername/quotes.git
cd quotes
```

### 2. Configurar variables de entorno

Copia el archivo de ejemplo de variables de entorno:

```bash
cp .env.example .env
```

Asegúrate de configurar correctamente las siguientes variables:

```
CACHE_DRIVER=file
```

### 3. Instalar dependencias

```bash
# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node.js
npm install
```

### 4. Generar clave de aplicación

```bash
php artisan key:generate
```

## Iniciar servidor de desarrollo

### Opción 1: Servidor de desarrollo de Laravel (recomendado)

```bash
php artisan serve
```

Esto iniciará un servidor en `http://localhost:8000`

### Opción 2: Configuración con Nginx

Si prefieres usar Nginx, aquí tienes una configuración básica:

```nginx
server {
    listen 80;
    server_name quotes.local;
    root /ruta/a/tu/proyecto/public;

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

## Compilar assets

Para desarrollo:

```bash
npm run dev
```

Para producción:

```bash
npm run build
```

## Optimizar la aplicación

```bash
php artisan optimize
```

## ¡Listo!

¡Ya puedes disfrutar de Camilo App Quotes! Abre tu navegador y ve a `http://localhost:8000`.

## Licencia

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
