# myApp by Gnut

Create file env.php

```php

if($_SERVER['HTTP_HOST'] === 'localhost')
{
    define('REPERT', "/openclassrooms/myApp");
    define('DB_NAME', 'myapp');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PWD', '');
}
else
{
    define('REPERT', "");
    define('DB_NAME', 'databaseName');
    define('DB_HOST', 'host');
    define('DB_USER', 'user');
    define('DB_PWD', 'password');
}
```


