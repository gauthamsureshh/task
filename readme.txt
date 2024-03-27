TAXEON
1.Database Setup:

 Create a new MySQL database
 Update the database configuration in the .env file located in the root directory of the project.

In this case use database name as 'taxeon'.

2.Dependencies:

This project requires PHP and Laravel
Install Composer from getcomposer.org.

Install Toastr using: composer require yoeunes/toastr

3.Running the Application

Navigate to the project directory 

4.Run the Development Server

php artisan serve

5.Database Migration:

Run the following command to migrate the database tables:php artisan migrate

The Following migrations are necessary:
php artisan make:migration create_tasks_table  
php artisan make:migration create_customers_table 
php artisan make:migration create_invoices_table 



