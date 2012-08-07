# WordPress Skeleton

Customized fork of Mark Jaquith's WordPress Skeleton package. See [the upstream documentation](https://github.com/markjaquith/WordPress-Skeleton) for base details.

## Customizations

* Environment-specific config values (database credentials, table prefix, salts, etc) stored in a single, unversioned */environment-config.php* instead of using separate files for development/staging/production. This keeps the shared configuration values versioned in *wp-config.php*, but lets each installation change the values that are specific to it. It also makes sure that [the production database credentials are never versioned](http://wordpress.stackexchange.com/q/52682/3898).
* WordPress core stored in */wordpress/* instead of */wp/*.
* *.htaccess* rewrite rules for */wordpress/wp-admin/* and */wordpress/wp-includes/* so they can be accessed from */wp-admin/* and */wp-includes/*.
* *.htaccess* rewrite rules for all root-level *.php* files to live in */wordpress/*, but still be accessed from */*
* */content/uploads* symlink replaced with actual directory
* Instead of manually symlinking themes from */content/themes/* to */wordpress/wp-content/themes/*, */mu-plugins/wordpress-skeleton-functionality.php* registers */wordpress/wp-content/themes/* as an additional theme directory. Kudos to Rarst for [the idea](https://github.com/Rarst/WordPress-Skeleton/commit/c8770e5828310970d2b1a5099695a932d471e954).
* Akismet added as Git submodule in */content/plugins/akismet/*
* *.gitignore* pruned for unnecessary entries


## Installation

This assumes *httpdocs* directory is empty.

* cd /var/www/vhosts/example.com/httpdocs
* git clone git://github.com/iandunn/WordPress-Skeleton.git .
* mv README.md environment-config.php
  * then delete all the contents, except for the sample environment-config, and update the values
* git submodule init
* git submodule update
* git remote rm origin


## Sample environment-config.php

```php
<?php

define( 'DB_NAME',	'' );
define( 'DB_USER',	'' );
define( 'DB_PASSWORD',	'' );
define( 'DB_HOST',	'localhost' );
define( 'DB_CHARSET',	'utf8');
define( 'DB_COLLATE',	'');

$table_prefix = 'xyz_';

// @link https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',		'' );
define( 'SECURE_AUTH_KEY',	'' );
define( 'LOGGED_IN_KEY',	'' );
define( 'NONCE_KEY',		'' );
define( 'AUTH_SALT',		'' );
define( 'SECURE_AUTH_SALT',	'' );
define( 'LOGGED_IN_SALT',	'' );
define( 'NONCE_SALT',		'' );

define( 'WP_DEBUG', true );

?>
```
