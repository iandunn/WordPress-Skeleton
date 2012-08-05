# WordPress Skeleton

Customized fork of Mark Jaquith's WordPress Skeleton package. See [the upstream documentation](https://github.com/markjaquith/WordPress-Skeleton) for base details.

## Customizations

* Database credentials, table prefix and salts stored in single, unversioned */database.php* instead of using different local configs for development/staging/production. This keeps the shared configuration values versioned in *wp-config.php*, but makes sure that [the production database credentials are never versioned](http://wordpress.stackexchange.com/q/52682/3898).
* WordPress core stored in */wordpress/* instead of */wp/*.
* *.htaccess* rewrite rules for */wordpress/wp-admin/* and */wordpress/wp-includes/* so they can be accessed from */wp-admin/* and */wp-includes/*.
* *.htaccess* rewrite rules for all root-level *.php* files to live in */wordpress/*, but still be accessed from */*
* */content/uploads* symlink replaced with actual directory
* TwentyTen symlink removed from */content/themes/*
* Akismet added as git submodule in */content/plugins/akismet/*
* *.gitignore* pruned for unnecessary entries
* */content/mu-plugins/* directory removed


## Installation

This assumes httpdocs directory is empty.

* cd /var/www/vhosts/example.com/httpdocs
* git clone git://github.com/iandunn/WordPress-Skeleton.git .
* Create *database.php* and update values (see sample below)
* checkout wordpress
* checkout akismet (do those in one step?)


## Sample database.php

```php
<?php

define( 'DB_NAME',		'' );
define( 'DB_USER',		'' );
define( 'DB_PASSWORD',	'' );
define( 'DB_HOST',		'localhost' );
define( 'DB_CHARSET',	'utf8');
define( 'DB_COLLATE',	'');

$table_prefix = 'xyz_';

// @link https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',			'' );
define( 'SECURE_AUTH_KEY',	'' );
define( 'LOGGED_IN_KEY',	'' );
define( 'NONCE_KEY',		'' );
define( 'AUTH_SALT',		'' );
define( 'SECURE_AUTH_SALT',	'' );
define( 'LOGGED_IN_SALT',	'' );
define( 'NONCE_SALT',		'' );

?>
```
