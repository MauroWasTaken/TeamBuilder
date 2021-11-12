# homepage implemantation

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

## Member status implementation

In order to add the member status functionality, I've made some slight changes to the teambuilder.sql .

All you need to do is run it on your MariaDB database.

The current statuses are :

```
1: Active
2: Inactive
3: Banned
```

If in the future we need to add more statuses, we would just need to insert another line to the memberstatus table