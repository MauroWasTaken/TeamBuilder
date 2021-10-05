homepage implemantation  
the home page requires connection to the db (script file can be found on "db/teambuilder.sql") and a database Config
file that resembles the following:

```php
<?php
define("DSN", "mysql:host=youradress;dbname=yourtable");  
define("USERNAME", yourusername);  
define("PASSWORD", yourpassword);  
define("SQLPATH", dirname(__DIR__) . "/db/teambuilder.sql");  
define("AUTOLOGINID", 1);  
```

save this file on the config folder then add it to your autoloader.
