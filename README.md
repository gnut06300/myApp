# myBlog by Gnut


![alt text](https://iwebprod.fr/public/pictures/iwebprod_small.png)

Installation :

.Step 1: Upload the files to the root folder of your web server (usually "www /") by downloading or via the git clone command https://github.com/gnut06300/myApp

.step 2: Run in the root folder `composer install` to install all the dependencies and activate autoloading

.Step 3: Create a database on your SGDB (MySQL) and import the database file myBlog.sql

Step 4: Create an env.php file in the root folder of your web server, modify the following parameters according to your access to your database and url of your site:
Create file env.php

```php

if($_SERVER['HTTP_HOST'] === 'localhost')
{
    define('URL_HOST',"http://myapp.test");
    define('DB_NAME', 'myBlog');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PWD', '');
}
else
{
    define('URL_HOST',"https://mondomaine.com");
    define('DB_NAME', 'databaseName');
    define('DB_HOST', 'host');
    define('DB_USER', 'user');
    define('DB_PWD', 'password');
}
```
.Step 5: Create an "admin" user via the "Register" page with a valid email address, a validation email will be sent to you, click on the link to validate your registration.

.Step 6: Obtain an Admin Account :
- In your database and in the "users" table, modify the "admin" column of the user you have just created and insert the value 1.

- Save the change.

- You now have an admin account which will allow you to manage all of the blog's functionalities via the dashboard part! To access it, once logged in, you have access to the dashboard menu in the main menu. A link to the administration area is also present in the footer.

.Step 7: Setting up the contact form: 
- Open the file app\Controllers\ContactController.php on line 31, modify the email parameters and the message subject of the mail() function : 
if (@mail("gnut@gnut.eu", 'Demande de contact sur le blog de Gnut', ....));






