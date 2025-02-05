# Laravel OAuth2 Client

This Laravel application demonstrates OAuth2 client implementation for authentication against a custom OAuth2 server. It serves as a reference implementation using [Laravel OAuth2 Server](https://github.com/devnodesin/laravel-oauth2-server) as the authorization server.

While Laravel Socialite handles OAuth2 authentication with third-party providers (like Google, Facebook), this project shows how to:

- Implement custom OAuth2 client authentication
- Connect to a self-hosted OAuth2 server
- Extend Laravel's authentication system
- Handle OAuth2 authorization flow

```bash
git clone https://github.com/devnodesin/laravel-oauth2-client client
cd client
```

## Install Dependencies

Install PHP dependencies and npm for frontend assets.

```bash
composer install
npm install
npm run build
```

## Copy the example .env file

```bash
cp .env.example .env
```

Configure your application by setting these variables in .env:

```env
APP_URL=http://client.test

## OAuth2 Client Credentials (OAuth2 Redirect URL: http://client.test/auth)
OAUTH2_CLIENT_ID=your_client_id
OAUTH2_CLIENT_SECRET=your_client_secret

## OAuth2 Server Endpoints
OAUTH2_AUTHORIZE_URL=http://users.test/oauth/authorize
OAUTH2_TOKEN_URL=http://users.test/oauth/token
OAUTH2_USER_URL=http://users.test/api/user
```

- Ensure client.test matches your local development URL
- Replace users.test with your OAuth2 server domain
- Get credentials from your OAuth2 server administrator
- Callback URL must match the one registered in OAuth2 server

By default, this app uses SQLite as the database. You can customize it to use MySQL by updating the `.env` file as shown below:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run the following command to generate the application key:

```bash
php artisan key:generate
```

### Set Up the Database

Run migrations to create the database tables: If the project includes seeders, run:

```bash
php artisan migrate
```

## Issues and Fixes

### 400 Bad Request

```
Client error: `POST http://users.test/oauth/token` resulted in a `400 Bad Request` response: {"error":"invalid_request","error_description":"The request is missing a required parameter, includes an invalid paramet (truncated...) 
```

This issue is due to an ***wrong client id/secret*** or  ***improper configuration of the OAuth2 server (`users.test`)***. You need to regenerate the server. Run the following command on the OAuth2 server (`users.test`):

```bash
php artisan key:generate
php artisan passport:keys --force
php artisan migrate:refresh
php artisan db:seed
```

After this steps, you need to regenerate the client_id & client_secret and run below commands in client.test

```bash
php artisan cache:clear ; php artisan config:cache ; php artisan config:cache
```
