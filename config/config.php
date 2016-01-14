<?php

Config::set( 'site_name', 'Port4U' );

Config::set( 'languages', array('en', 'fr') );

Config::set( 'routes', array(
    'default' => '',
    'admin'   => 'admin_',
) );

Config::set( 'default_route', 'default' );
Config::set( 'default_language', 'en' );
Config::set( 'default_controller', 'pages' );
Config::set( 'default_action', 'index' );

Config::set( 'db.host', 'localhost' );
Config::set( 'db.user', 'root' );
Config::set( 'db.password', '' );
Config::set( 'db.db_name', 'my_db' );

Config::set( 'salt', 'fgjhghgy765vok7nnbgh8' );