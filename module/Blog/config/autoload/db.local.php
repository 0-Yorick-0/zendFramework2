<?php
// Filename: /config/autoload/db.local.php
return array(
        'db' => array(
            'driver'         => 'Pdo',
            'username'       => 'root',  //edit this
            'password'       => 'root',  //edit this
            'dsn'            => 'mysql:dbname=blog;host=localhost',
            'driver_options' => array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
);