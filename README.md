# WordPress Skeleton

Customized fork of Mark Jaquith's WordPress Skeleton package. See [the upstream documentation](https://github.com/markjaquith/WordPress-Skeleton) for base details.

## Customizations

@todo make sure all of these are done

* WordPress core stored in */wordpress/* instead of */wp/*.
* *.htaccess* rewrite rules for */wordpress/wp-admin/* and */wordpress/wp-includes/* so they can be accessed from */wp-admin/* and */wp-includes/*.
* Database credentials, table prefix and salts stored in single, unversioned */database.php* [instead of using different local configs for development/staging/production](http://wordpress.stackexchange.com/q/52682/3898).
* */content/uploads* symlink replaced with actual directory
* Akismet symlink added to */content/plugins/*
* TwentyTen symlink removed from */content/themes/*
* *.gitignore* pruned for unnecessary entries
* */content/mu-plugins/* directory removed