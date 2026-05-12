# Chirpee

Laravel based chirping site

## 🚀 Local Setup Guide

Follow these steps to run the application locally after cloning the repository:

### 📋 Prerequisites

Ensure you have the following installed:

- **PHP** ≥ 8.1
- **Composer** ≥ 2.0
- **Node.js** ≥ 18 (includes npm)
- **MySQL/MariaDB** or **SQLite**
- **Git**

### 🔧 Installation Steps

1. **Navigate to the project directory**

    ```bash
    cd chirpee/

    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Create environment file**

    ```bash
    cp .env.example .env
    ```

4. **Configure .env file**

    ```bash
    APP_NAME=Chirpee
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=https://chirpee.dev
    ```

5. **Generate app key**

    ```bash
    php artisan key:generate
    ```

6. **Run database migrations**

    ```bash
    php artisan migrate
    ```

7. **Install frontend dependencies**

    ```bash
    npm install
    ```

8. **Build or serve frontend assets**

    ```bash
    npm run dev
    ```

9. **Clear caches & start the app**
    ```bash
    php artisan optimize:clear
    php artisan serve
    ```

Visit: http://localhost:8000

⚠️ Using Laragon? Just restart Apache/Nginx in the Laragon tray and visit http://chirpee.test. You don't need php artisan serve.
