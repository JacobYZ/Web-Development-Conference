# KIT502: Laravel Installation Guide for Groupwork

This guide will walk you through the process of installing Laravel in your `groupwork` folder on the `ictteach` server.

***Please replace `your_username` and `kit502-group-##` with the actual values.***

## Steps

1. Open a terminal and connect to your individual folder on the `ictteach` server via SSH.

2. Navigate to the `public_html` folder in your individual folder:
    ```bash
    cd ~/public_html/
    ```
3. Run the following command to create a new Laravel project in the `public_html` folder:
    ```bash
    laravel-install
    ```
    If you encounter an error message like `/var/www/html/your_username/myApp already exists. Delete or move it if you want a fresh copy.`, rename the existing folder and run the command again. For example:
    ```bash
    mv myApp renamed_myApp
    ```
    Then run the command again:
    ```bash
    laravel-install
    ```
4. You can visit the Laravel project in your browser by visiting the following URL: `https://ictteach-www.its.utas.edu.au/your_username/myApp/public/index.php`
5. In the new Laravel project, create a new SQLite database in the `database` folder and change the permission of the database file:

    ```bash
    cd myApp
    touch database/database_name.db
    chmod 777 database/database_name.db
    ```

6. In the `myApp/config/database.php` file, change the default database connection to SQLite on line 18:

    ```php
    'default' => env('DB_CONNECTION', 'sqlite'),
    ```

7. In the same `myApp/config/database.php` file, change the database path to the SQLite database on line 41:

    ```php
    'database' => env('DB_DATABASE') ? database_path(env('DB_DATABASE')) : null,
    ```

8. In the `myApp/.env` file, change the database connection to SQLite:

    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=database_name.db
    ```

9. Run the following command to create the tables in the SQLite database:

    ```bash
    php artisan migrate
    ```

10. Navigate to the following URL to register a new user in the Laravel project: `https://ictteach-www.its.utas.edu.au/your_username/myApp/public/index.php/register`

11. Verify that you can register a new user and login successfully.

12. Move the newly created Laravel project to your `groupwork` folder:

    ```bash
    cd ..
    mv myApp /groupwork/kit502-group-##/
    ```

13. Check the Laravel project in the browser by visiting the following URL: `https://ictteach-www.its.utas.edu.au/groupwork/kit502-group-##/myApp/public/index.php`

14. In your `/var/www/html/your_username/phpliteadmin/phpliteadmin.config.php`, change the following line to add the new SQLite database:

    ```php
    $directory = '/groupwork/kit502-group-##/myApp/database/';
    ```

15. You can visit the SQLite database in the browser by visiting the following URL: `https://ictteach-www.its.utas.edu.au/your_username/phpliteadmin/index.php`
