Standard Wordpress template for Vine Street Interactive

Installation
-----------

Clone this repo into your working directory:

	git clone git@github.com:vinestreet/necco.git .

### Wordpress Submodule

This repo has the wordpress core [Wordpress Core](https://github.com/markjaquith/WordPress) setup as a submodule.

Before you install, you'll need to switch to the current stable wordpress branch. 
Find the latest branch before `master` on the [Wordpress Core](https://github.com/markjaquith/WordPress). As of this writing, the latest branch is `3.2-branch`. open `.gitmodules` and enter the the appropriate branch

Initialize the wordpress core submodule:

	git submodule update --init
	
### Install Wordpress normally
	

### wp-config	

Move `wp-config.php` from `core` to the http root.

We need to move the wp-content directory to the root url. Add the following to `wp-config` just before the the call to `wp-settings`

	/* Move wp-content - must be set before call to 'wp-settings'*/
	define( 'WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] );
	define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST']);
	
### index.php

Move `index.php` from `core` to the http root.

Open `index.php` and change the last line to:

	require('core/wp-blog-header.php');

Theme
-----------
Based on the HTML5 Reset Wordpress Theme

## Summary:

The HTML5 Reset Wordpress theme is a blank theme based on the [HTML5 Reset templates](https://github.com/murtaugh/HTML5-Reset). It's a great empty slate upon which to build your own HTML5-based Wordpress themes.

### hNews

In addition to all the standard Wordpress elements and classes, we have added the code required so that the single post template conforms with the [hNews microformat](http://microformats.org/wiki/hnews).

### HTML5 Reset brings to the table:

1. A style sheet designed to strip initial files from browsers, meaning you start off with a blank slate.
2. Easy to customize -- remove whatever you don't need, keep what you do.
3. Analytics and jQuery snippets in place
4. Meta tags ready for population
5. Empty mobile and print style sheets, including blocks for device orientation
6. Modernizr.js [http://www.modernizr.com/](http://www.modernizr.com/) enables HTML5 compatibility with IE (and a dozen other great features)
7. IE-specific classes for simple CSS-targeting
8. iPhone/iPad/iTouch icon snippets 
9. Lots of other keen stuff...