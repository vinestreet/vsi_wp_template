<?php
/* Define Constants
	-----------------------------------------------------------------------------*/

	// custom constant (opposite of TEMPLATEPATH)
	define('_TEMPLATEURL', WP_CONTENT_URL . '/' . stristr(TEMPLATEPATH, 'themes'));
	
/* Load Scripts
	-----------------------------------------------------------------------------*/
		
	//load WPAlchemy_MetaBox class
	include_once '_/inc/MetaBox.php';
	
	
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				
			}
		}
		core_mods();
	}
	
	add_action('init', 'vsi_init_method');
	
	function vsi_init_method() {
	
		if ( is_admin()) {
	
			// Load custom metabox style
			wp_enqueue_style('custom_metabox_css', get_bloginfo('template_directory') . '/_/css/metabox.css');
			
			// Load custom editor style
			add_editor_style('/_/css/editor-style.css');

		}else {
			
			// Load jQuery
			wp_deregister_script('jquery');
			wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"), false, '1.6.1',  false);
			wp_enqueue_script('jquery');
			
			//Load frontend Javascript
			wp_register_script('scripts', get_bloginfo('template_directory') . '/_/js/scripts.js', array('jquery'), '1.0', true );
			wp_enqueue_script('scripts');
		
		}
	}
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
/* Add post format theme support. (WP 3.1)
	-----------------------------------------------------------------------------*/
	//add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video'));
		
/* Register Widget Areas
	----------------------------------------------------------------------------- */
	 
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Sidebar Widgets',
			'id'	 => 'sidebar-widgets',
			'description'	 => 'These are widgets for the sidebar.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<h2>',
			'after_title'	 => '</h2>'
		));
	}
	
/* Register Menus
	----------------------------------------------------------------------------- */	 
	
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
				'primary' => 'Primary Navigation'
				//add additional menus here
			)
		);
	}

/* Define uploaded image sizes
	-----------------------------------------------------------------------------*/
	
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	}
	
	if ( function_exists( 'add_image_size' ) ) { 
		// add_image_size( 'wide', 555, 95, true ); 
	}

/* Register custom post types
	----------------------------------------------------------------------------- */
	
/*
	
	// Add videos
	
	add_action('init', 'create_videos_post_type');
	function create_videos_post_type() {
		$labels = array(
			'name' => _x('Videos', 'post type general name'),
			'singular_name' => _x('video', 'post type singular name'),
			'add_new' => _x('Add New', 'video'),
			'add_new_item' => __('Add New Video'),
			'edit_item' => __('Edit Video'),
			'new_item' => __('New Video'),
			'view_item' => __('View Video'),
			'search_items' => __('Search Videos'),
			'not_found' =>	 __('No videos found'),
			'not_found_in_trash' => __('No videos found in Trash'), 
			'parent_item_colon' => '',
			'menu_name' => 'Videos'
		);
		
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite' => false,
			'capability_type' => 'post',
			'has_archive' => true, 
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title','editor','author','thumbnail','excerpt','comments')
	); 
	register_post_type('video',$args);
	}
	
*/	
	

	
/* Register custom taxonomies
	-----------------------------------------------------------------------------*/

/*
	//Add Custom Taxonomy: video-categories
	
	add_action( 'init', 'create_video_taxonomies', 0 );
	function create_video_taxonomies() {
		$labels = array(
			'name' => _x( 'Video Categories', 'taxonomy general name' ),
			'singular_name' => _x( 'Video Category', 'taxonomy singular name' ),
			'search_items' =>	 __( 'Search Categories' ),
			'all_items' => __( 'All Categories' ),
			'parent_item' => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item' => __( 'Edit Category' ), 
			'update_item' => __( 'Update Category' ),
			'add_new_item' => __( 'Add New Category' ),
			'new_item_name' => __( 'New Genre Category' ),
			'menu_name' => __( 'Video Categories' ),
		);
	
		register_taxonomy('video-categories',array('video'), array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => false,
		));
	}

*/

/* Register contextual help menus
	-----------------------------------------------------------------------------*/

/*

	add_action( 'contextual_help', 'add_help_text', 10, 3 );
	
	function add_help_text($contextual_help, $screen_id, $screen) { 
	//$contextual_help .= var_dump($screen); // use this to help determine $screen->id
		
		if ('video' == $screen->id || 'edit-video' == $screen->id) {
			$contextual_help =
			'<p>' . __('Things to remember when adding or editing a video:') . '</p>' .
			'<ul>' .
			'<li>' . __('Specify the correct genre such as Mystery, or Historic.') . '</li>' .
			'<li>' . __('Specify the correct writer of the video.	 Remember that the Author module refers to you, the author of this video review.') . '</li>' .
			'</ul>' .
			'<p>' . __('If you want to schedule the video review to be published in the future:') . '</p>' .
			'<ul>' .
			'<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
			'<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
			'</ul>' .
			'<p>' . __('To insert a recipe into a post or page, use the following shortcode:') . '</p>' .
			'<code>' . __('[recipe-show template="recipe-embed" recipe="california-power-salad"]') . '</code>' .
			'<em>' . __('(where "california-power-salad" is the URL slug of the recipe)') . '</em>';
		} elseif ( 'post' == $screen->id) {
		 $contextual_help = 
			'<h2>' . __('Post Help') . '</h2>' .
			'<p>' . __('To insert a recipe into a post or page, use the following shortcode:') . '</p>' .
			'<code>' . __('[recipe-show template="recipe-embed" recipe="california-power-salad"]') . '</code>' .
			'<em>' . __('(where "california-power-salad" is the URL slug of the recipe)') . '</em>';
		} 
		return $contextual_help;
	}
	
*/

/* Register custom admin metaoxes (using the WPAlchemy_MetaBox class)
	-----------------------------------------------------------------------------*/

/*
	
	$front_page_metabox = new WPAlchemy_MetaBox(array(
		'id' => '_front_page_metabox', // underscore prefix hides fields from the custom fields area
		'title' => 'Home Page',
		'types' => array('page'), // added only for pages
		'include_post_id' => 4, // added only post id=4
		'template' => TEMPLATEPATH . '/inc/front_page_metabox.php',
	));
	
*/

/* Fixes
	-----------------------------------------------------------------------------*/
	
	// Clean up the <head>
	function removeHeadLinks() {
	 	remove_action('wp_head', 'rsd_link');
	 	remove_action('wp_head', 'wlwmanifest_link');
	 }
	 add_action('init', 'removeHeadLinks');
	 remove_action('wp_head', 'wp_generator');
	 
	// Fix embeded flash z-index
	add_filter('the_content', 'add_opaque_to_all_flash');
	
	function add_opaque_to_all_flash($string) {
		  $string = str_ireplace('<embed type="application/x-shockwave-flash"', '<param name="wmode" value="opaque"><embed type="application/x-shockwave-flash" wmode="opaque"', $string);
		  return $string;
	}

?>