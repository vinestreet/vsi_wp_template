Standard Wordpress template for Vine Street Interactive

Installation
-----------

Clone this repo into your working directory:

	git clone git@github.com:vinestreet/necco.git .

#### Wordpress Submodule

This repo has the [Wordpress Core](https://github.com/markjaquith/WordPress) setup as a git submodule.

Before activating the submodule, you'll need to specify which wordpress branch to pull from. To do this, find the latest branch before `master` on the [Wordpress Core](https://github.com/markjaquith/WordPress). As of this writing, the latest branch is `3.2-branch`. Open `.gitmodules` and enter the the appropriate branch name.

Initialize the wordpress core submodule:

	git submodule update --init

Having wordpress as a submodule makes upgrades very easy. Just `cd` into `/core` and checkout a new branch:
	
	git checkout "new branch"
	
#### Install Wordpress from `/core`
	

#### wp-config	

Move `core/wp-config.php` up one directory level to the http root directory.

We now need to redirect the wordpress content directories (`themes`, `plugins`, and `uploads`) to the http root directory. Add the following to `wp-config.php` just before the the call to `wp-settings`

	/* Move wp-content - must be set before call to 'wp-settings'*/
	define( 'WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] );
	define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST']);

Theme
-----------
Based on the HTML5 Reset Wordpress Theme

### Summary:

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