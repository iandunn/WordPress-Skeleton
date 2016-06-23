# WordPress Skeleton

***NOTE: This is no longer being maintained. I'm using [Regolith](https://github.com/iandunn/regolith) now.***

Customized fork of Mark Jaquith's WordPress Skeleton package. See [the upstream documentation](https://github.com/markjaquith/WordPress-Skeleton) for base details.


## Customizations

* Environment-specific config values (database credentials, table prefix, salts, etc) stored in a single, unversioned */environment-config.php* instead of using separate files for development/staging/production. This keeps the shared configuration values versioned in *wp-config.php*, but lets each installation change the values that are specific to it. It also makes sure that [the production database credentials are never versioned](http://wordpress.stackexchange.com/q/52682/3898).
* WordPress core stored in */wordpress/* instead of */wp/*.
* *.htaccess* rewrite rules for */wordpress/wp-admin/* and */wordpress/wp-includes/* so they can be accessed from */wp-admin/* and */wp-includes/*.
* *.htaccess* rewrite rules for all root-level *.php* files to live in */wordpress/*, but still be accessed from */*
* */content/uploads* symlink replaced with actual directory
* Instead of manually symlinking themes from */content/themes/* to */wordpress/wp-content/themes/*, */mu-plugins/wordpress-skeleton-functionality.php* registers */wordpress/wp-content/themes/* as an additional theme directory. Kudos to Rarst for [the idea](https://github.com/Rarst/WordPress-Skeleton/commit/c8770e5828310970d2b1a5099695a932d471e954).
* [WordPress-Functionality-Plugin-Skeleton](https://github.com/iandunn/WordPress-Functionality-Plugin-Skeleton) added as a Git submodule
* *.gitignore* pruned for unnecessary entries


## Installation

This assumes *httpdocs* directory is empty.

* cd /var/www/vhosts/example.com/httpdocs
* git clone --recursive git://github.com/iandunn/WordPress-Skeleton.git .
* git remote rm origin
* git mv environment-config-sample.php environment-config.php
	* then update its values
* git rm --cached environment-config.php
* [Rename WordPress Functionality Plugin submodule](http://stackoverflow.com/questions/4526910/rename-a-git-submodule), update .gitignore, then follow the installation instructions for it
	* git checkout master before renaming/editing wordpress-functionality-plugin-skeleton.php 
* To work with [wp-cli](http://wp-cli.org/), just add *alias wp='wp --path=wordpress'* to your *~/.bashrc* or */etc/profile.d/custom.sh* file
* For nginx, just set the default server root to the /wordpress directory, and then add an extra location rule to use the / directory as the root for `/content/` URLs.

```Nginx
server {
    listen       80;
    listen       443 ssl;
    server_name  example.org;
	root         /srv/www/example.org/wordpress;

    location /content/ {
		root /srv/www/example.org/;
		try_files $uri $uri/ /wordpress/index.php?$args;
    }
}
```


## TODO

* Refactor .htaccess to mimick approach from nginx rules if possible
* Look into possible redirect bugs
	* https://github.com/markjaquith/WordPress-Skeleton/issues/1#issuecomment-11070686
* Add redirect to production for static content files, so don't have to pull them down to dev/staging
	RewriteEngine on
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule wp-content/uploads/(.*) http://example.org/wp-content/uploads/$1 [NC,L]
* If #25219-core not accepted, maybe put in something to display notices. could probably be separate plugin released in repo.
* Consider leaving WP_DEBUG on in production, but logged instead of displayed?
	* http://wordpress.org/support/topic/errors-when-using-wp_debug?replies=17
* Review updates to upstream and other forks too see what should be merged
* Since .htaccess is versioned, add an example of setting up rules based on whether the site is dev/staging/production. e.g, htauth
	* Use dev as the fallback/default in the condition, not production
* Add default plugins
	* Akismet
	* WP Super Cache or W3 Total Cache
	* Login Security Solution
	* WordFence
	* Google Authenticator
	* WP-DB-Backup (or something newer)
	* Google XML Sitemap, or similar?
	* Subscribe To Comments, or similar?
	* Formidable?
	* Use Brian Petty's github mirror of the dotorg repo
* Also setup some kind of configuration management in the mu-plugin to make your own default settings
* Maybe add reset-file-permissions.sh, and update instructions to move it above httpdocs and update paths