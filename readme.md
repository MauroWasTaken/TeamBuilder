homepage implemantation  
the home page requires connection to the db (script file can be found on "db/teambuilder.sql") and a database Config
file that resembles the following:

in order to use the autologin, you need to change the value of the "AUTOLOGINID" constant with the id of the db member
that you want to login as.

```php
<?php
define("DSN", "mysql:host=youradress;dbname=yourtable");  
define("USERNAME", yourusername);  
define("PASSWORD", yourpassword);  
define("SQLPATH", dirname(__DIR__) . "/db/teambuilder.sql");  
define("AUTOLOGINID", 1);  
```

save this file on the config folder then add it to your autoloader.
