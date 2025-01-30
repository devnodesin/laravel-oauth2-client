
## Install Laravel

```bash
composer global require laravel/installer
laravel new client
cd client
```

OR

```bash
mkdir client
composer create-project laravel/laravel .
```

### Build npm

```bash
npm install
npm run build
```

### Laravel's local development server (optional)

```bash
composer run dev
```

Once you have started the development server, your application will be accessible in your web browser at <http://localhost:8000>.

## Laravel Confirugration

Lets configure the laravel App, with below details

```bash
APP_NAME=OAuth2 Client
APP_URL=<http://client.test>
```

After making these changes, remember to:

Clear the configuration cache:

```bash
php artisan config:clear
```

Rebuild the configuration cache:

```bash
php artisan config:cache
```

These settings will be used throughout your Laravel 11 application for generating URLs and displaying the application name.

## Install Bootstrap

For simplicity we will use bootstrap, let us Install Bootstrap via npm:

```bash
npm install bootstrap @popperjs/core
```

Update resources/css/app.css:

```css
@import 'bootstrap/dist/css/bootstrap.min.css';
```

Update resources/js/app.js:

```js
import './bootstrap';
import 'bootstrap';
```

**Update templates:**

***File: /resources/views/layouts/app.blade.php***

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>
</body>
</html>
```

***File: /resources/views/home.blade.php***

```html
@extends('layouts.app')

@section('content')
    <main class="container py-4">
        <h1>Welcome to {{ config('app.name') }}</h1>
    </main>
@endsection
```

**Update the route**

***File: routes/web.php***

change `return view('welcome')` -> `return view('home')`

```php
Route::get('/', function () {
    return view('home');
});
```

**Finally build and install bootstrap:**

```bash
npm run build
```

## Install Laravel Socialite

```bash
composer require laravel/socialite
```


Configure Socialite in client.test:

In your client.test app, configure Socialite to use your users.test OAuth2 server.

Update config/services.php:

```php
'users' => [
    'client_id' => env('USERS_CLIENT_ID'),
    'client_secret' => env('USERS_CLIENT_SECRET'),
    'redirect' => env('USERS_REDIRECT_URI'),
    'authorize_url' => 'http://users.test/oauth/authorize',
    'token_url' => 'http://users.test/oauth/token',
    'user_url' => 'http://users.test/api/user',
],
```

## Clear Cache 

```bash
# Clear all Laravel caches
php artisan cache:clear ; php artisan config:clear ; php artisan route:clear

php artisan view:clear

# Verify .env values
php artisan tinker
echo config('services.users.client_id');

# Optional: Rebuild config cache
php artisan config:cache

# Restart Laravel development server if running
php artisan serve
```

## Debugging  

Run the (Laravel Tinker) php artisan tinker

```bash
$ php artisan tinker
Psy Shell v0.12.7 (PHP 8.2.27 — cli) by Justin Hileman
>
> dd(config('services.users'));
array:6 [
  "client_id" => "9e1d5e0c-35d6-43f7-8a7c-d2157f6de505"
  "client_secret" => "MDhKvvySJMjZWdlwhtEm5ryMQv33fWlHDsmqFMjo"
  "redirect" => "http://client.test/auth"
  "authorize_url" => "http://users.test/oauth/authorize"
  "token_url" => "http://users.test/oauth/token"
  "user_url" => "http://users.test/api/user"
]
```