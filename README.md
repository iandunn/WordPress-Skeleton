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
* [WordPress-Functionality-Plugin-Skeleton](https://github.com/iandunn/WordPress-Functionality-Plugin-Skeleton) added as a Git submodule
* *.gitignore* pruned for unnecessary entries


## Installation

This assumes *httpdocs* directory is empty.

* cd /var/www/vhosts/example.com/httpdocs
* git clone git://github.com/iandunn/WordPress-Skeleton.git .
* git submodule init
* git submodule update
* git remote rm origin
* git mv README.md environment-config.php
	* then delete all the contents, except for the sample environment-config, and update its values
* git rm --cached environment-config.php
* [Rename WordPress Functionality Plugin submodule](http://stackoverflow.com/questions/4526910/rename-a-git-submodule), update .gitignore, then follow the installation instructions for it
	* git checkout master before renaming/editing wordpress-functionality-plugin-skeleton.php 
* To work with [wp-cli](http://wp-cli.org/), just add *alias wp='wp --path=wordpress'* to your *~/.bashrc* or */etc/profile.d/custom.sh* file


## Sample environment-config.php

```php
<?php

//define( 'WP_SITEURL',		'http://development.example.org' );		// Use these if dev/staging environments have their own hostnames
//define( 'WP_HOME',		'http://development.example.org' );

define( 'DB_NAME',			'' );
define( 'DB_USER',			'' );
define( 'DB_PASSWORD',		'' );
define( 'DB_HOST',			'localhost' );
define( 'DB_CHARSET',		'utf8' );
define( 'DB_COLLATE',		'' );

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

ini_set( 'log_errors',			'On' );
ini_set( 'display_errors',		'On' );
ini_set( 'error_reporting',		E_ALL );
define( 'WP_DEBUG',				true );
define( 'WP_DEBUG_LOG',			true );
define( 'WP_DEBUG_DISPLAY',		true );
define( 'SAVEQUERIES',			true );
define( 'JETPACK_DEV_DEBUG',	true );
define( 'WP_CACHE',             false );

?>
```


## TODO

* Look into possible redirect bugs
	* https://github.com/markjaquith/WordPress-Skeleton/issues/1#issuecomment-11070686
* Add redirect to production for static content files, so don't have to pull them down to dev/staging
	RewriteEngine on
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule wp-content/uploads/(.*) http://example.org/wp-content/uploads/$1 [NC,L]
* When 3.5 comes out, test this in WPMS. 
	* Probably need to add blogs.dir stuff to gitignore
	* Maybe add config for network setup to wp-config, but commented out?
	* Also update playground/wpms
* Consider leaving WP_DEBUG on in production, but logged instead of displayed?
	* http://wordpress.org/support/topic/errors-when-using-wp_debug?replies=17
* Review updates to upstream and other forks too see what should be merged
* Remove 3rd party Akismet submodule as a security precaution
	* Remove from features
* Since .htaccess is versioned, add an example of setting up rules based on whether the site is dev/staging/production. e.g, htauth
	* Use dev as the fallback/default in the condition, not production
* Add more default plugins
	* Akismet
	* WP Super Cache or W3 Total Cache
	* bwp-minify
	* Login Security Solution
	* Better WP Security
	* WP-DB-Backup (or something newer)
	* Google XML Sitemap, or similar?
	* Subscribe To Comments, or similar?
	* Formidable?
	* Add svn export commands to instructions if can't find official Git repos for them
* Maybe add reset-file-permissions.sh, and update instructions to move it above httpdocs and update paths
* Akismet needs a ! entry in .gitignore?