Laravel Online Food Order Management System
MAEOS KEOPS
BeytepeYemek.com

This application is made by Emin Orçun SANCAR and Musa ALÝÞAR as a term project of BBM473.

Framework: Laravel Framework 5.7.20
Language : PHP 7.2.10
Ide: JetBrains PhpStorm 2018.3.2 x64
Sql: Mysql

Installation

-Open PhpStorm Import Project from file system.

-Open Phpstorm terminal,
-Then enter this command:

   $composer update 

-After this:

   $composer install

-Composer installed succesfully.Then configure db settings 

-Enter .env file and configure like this: 

     DB_CONNECTION=mysql
     DB_HOST=yourlocalhost
     DB_PORT=3306
     DB_DATABASE=yourdb
     DB_USERNAME=youruser
     DB_PASSWORD=yourpassword

-Enter config/database.php then configure like this:

    'host' => env('DB_HOST', 'yourlocalhost'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'yourdb'),
    'username' => env('DB_USERNAME', 'youruser'),
    'password' => env('DB_PASSWORD', 'yourpassword'),


-Migrate Database by typing this:

     $php artisan migrate

-If you like refresh Database tables by typing this:

     $php artisan migrate:fresh

-Then run project by typing this:

	$php artisan serve

-Features
   4 user types:Admin,RestaurantAdmin,Manager,User(Customer) 
    Guest:Sign Up (Register)
    All user types:Add/Delete/Update order
    All users:Login & logout
    All users except customer:Add/Delete/Update product
    All users:Export Order (pdf, excel, csv, sql)
    All users:Change password
    All users:Search Order by sort any attributes
    All users:Add/Delete/Update Comment
    All admin:See & do everything
    All customers:Show scoreboard 
    All customers:Show myfavourites
    All customers:Add/Delete/Update recent movements
    All restaurant admin:Add/Delete/Update restaurant
    All manager:restaurant payment
    Easy interface
    Web based application
    
Uses

    Online Food Order.
    
Contact

    eorcunsancar@gmail.com
    musa.alisar@gmail.com    
	
MAEOS KEOPS 	
BeytepeYemek.com
    





