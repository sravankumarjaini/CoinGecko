# Coingecko API Data Fetching Artisan Command

This project demonstrates a Laravel/Lumen artisan command that fetches data from the Coingecko API and stores it in a database.

## Prerequisites

Before running the command, make sure you have the following prerequisites installed:

- PHP
- Composer
- Laravel or Lumen (based on your preference)
- MySQL or another supported database

## Getting Started

Follow the steps below to set up and run the project:

1. **Clone the repository**

   ```
   git clone <repository-url>
   ```

2. **Navigate to the project directory**

   ```
   cd coingecko-api
   ```

3. **Install dependencies**

   ```
   composer install
   ```

4. **Configure the environment**

   - Rename the `.env.example` file to `.env`.
   - Open the `.env` file and configure your database connection settings.

5. **Run the migrations**

   ```
   php artisan migrate
   ```

6. **Run the Coingecko API data fetching command**

   ```
   php artisan coins:fetch
   ```

   This command will make a request to the Coingecko API and retrieve the data. It will then store the data in the `coins` table of your configured database. If the data already exists in the table, it will be updated.

7. **Review the fetched data**

   You can now review the fetched data in your configured database. Check the `coins` table for the retrieved data.


