# Async Orchid OR Generator Async Orchid OR Generator 🌸

A Laravel application for generating official receipts (ORs) efficiently. This is a passion project by The Async Studio. 🚀

## Features ✨

* User-friendly interface for OR data input ⌨️
* PDF generation of official receipts 📄
* Secure user authentication 🔒

## Requirements 🛠️

* PHP ^8.2 (or your specific version)
* Composer
* Node.js & NPM (for frontend asset compilation if using Vite/Mix)
* A database server (e.g., MySQL, PostgreSQL)
* [Any other specific requirements, e.g., specific PHP extensions]

## Local Installation & Setup ⚙️

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/chro11os/async-orchid.git](https://github.com/chro11os/async-orchid.git)
    cd async-orchid
    ```

2.  **Install PHP Dependencies:**
    ```bash
    composer install
    ```

3.  **Install NPM Dependencies (if applicable):**
    ```bash
    npm install
    npm run dev # or npm run build for production assets
    ```

4.  **Create Environment File:**
    Copy the `.env.example` file to a new file named `.env`.
    ```bash
    cp .env.example .env
    ```

5.  **Generate Application Key:** 🔑
    ```bash
    php artisan key:generate
    ```

6.  **Configure Environment Variables (`.env` file):**
    Open the `.env` file and update the following variables, especially the database connection details:
    ```dotenv
    APP_NAME="Async Orchid OR Generator"
    APP_ENV=local
    APP_DEBUG=true
    APP_URL=http://localhost:8000 # Or your preferred local URL

    DB_CONNECTION=mysql # or pgsql, etc.
    DB_HOST=127.0.0.1
    DB_PORT=3306 # or 5432 for pgsql
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

    # Add any other necessary environment variables (e.g., mail settings, external API keys)
    ```

7.  **Run Database Migrations (and seeders if you have them):** 💾
    Make sure your database server is running and you've created the database specified in your `.env` file.
    ```bash
    php artisan migrate
    # Optional: php artisan db:seed
    ```

8.  **Storage Link (if you use public storage):** 🔗
    ```bash
    php artisan storage:link
    ```

## Running the Application Locally ධ🏃💨

To serve the application on your local development server (usually `http://localhost:8000`):

```bash
php artisan serve
