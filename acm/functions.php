<?php
/**
 * ACM functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage ACM
 * @since ACM 1.0
 */



/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function acm_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'acm_javascript_detection', 0);

if (!function_exists('acm_fonts_url')): /**
 * Register Google fonts for ACM Clone.
 *
 * @since ACM Clone 1.0
 *
 * @return string Google fonts URL for the theme.
 */
	function acm_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
		 */
		if ('off' !== _x('on', 'Noto Sans font: on or off', 'acm')) {
			$fonts[] = 'Noto Sans:400italic,700italic,400,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
		 */
		if ('off' !== _x('on', 'Noto Serif font: on or off', 'acm')) {
			$fonts[] = 'Noto Serif:400italic,700italic,400,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
		 */
		if ('off' !== _x('on', 'Inconsolata font: on or off', 'acm')) {
			$fonts[] = 'Inconsolata:400,700';
		}

		/*
		 * Translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'acm');

		if ('cyrillic' == $subset) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ('greek' == $subset) {
			$subsets .= ',greek,greek-ext';
		} elseif ('devanagari' == $subset) {
			$subsets .= ',devanagari';
		} elseif ('vietnamese' == $subset) {
			$subsets .= ',vietnamese';
		}

		if ($fonts) {
			$fonts_url = add_query_arg(array(
				'family' => urlencode(implode('|', $fonts)),
				'subset' => urlencode($subsets)
			), 'https://fonts.googleapis.com/css');
		}

		return $fonts_url;
	}
endif;

/**
 * Enqueue scripts and styles.
 *
 * @since ACM Clone 1.0
 */
function acm_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style('acm-fonts', acm_fonts_url(), array(), null);

	// Add Genericons, used in the main stylesheet.
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style('acm-style', get_stylesheet_uri());

	// Load FontAwesome font
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('acm-ie', get_template_directory_uri() . '/css/ie.css', array(
		'acm-style'
	), '20141010');
	wp_style_add_data('acm-ie', 'conditional', 'lt IE 9');

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style('acm-ie7', get_template_directory_uri() . '/css/ie7.css', array(
		'acm-style'
	), '20141010');
	wp_style_add_data('acm-ie7', 'conditional', 'lt IE 8');

	// wp_enqueue_script('acm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (is_singular() && wp_attachment_is_image()) {
		wp_enqueue_script('acm-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array(
			'jquery'
		), '20141010');
	}

	wp_enqueue_script('jquery-2.1.3', get_template_directory_uri() . '/js/jquery-2.1.3.js');
	wp_enqueue_script('classList-script', get_template_directory_uri() . '/js/classList.js');
	wp_enqueue_script('webfontloader-script', get_template_directory_uri() . '/js/webfontloader.js');
	wp_enqueue_script('analytics-script', get_template_directory_uri() . '/js/analytics.js');
	wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/modernizr.js');
	wp_enqueue_script('navigation', get_template_directory_uri() . '/js/navigation.js');
    wp_enqueue_script('links', get_template_directory_uri() . '/js/links.js');
	// wp_enqueue_script('foundation', get_template_directory_uri() . '/js/fiundation.js');
	wp_enqueue_script('acm-script', get_template_directory_uri() . '/js/acm.js','','',1);
	// wp_enqueue_script('acm-functions-script', get_template_directory_uri() . '/js/functions.js');

	wp_localize_script('acm-script', 'screenReaderText', array(
		'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'acm') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'acm') . '</span>'
	));
}
add_action('wp_enqueue_scripts', 'acm_scripts');

	//Making jQuery Google API
// function modify_jquery() {
// 	if (!is_admin()) {
// 		// comment out the next two lines to load the local copy of jQuery
// 		add_action('wp_enqueue_scripts', function() {
// 			wp_deregister_script('jquery');
// 			wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-2.1.3.js', false, '2.1.3');
// 			wp_enqueue_script('jquery');
// 		} );
// 	}
// }
// add_action('init', 'modify_jquery');

/* */
/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

/*Home thumbnails*/

if (function_exists('add_image_size'))
	add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
	add_image_size('home-excerpt-thumbnail', 327, 208, true);
}

/*Custom breadcrumb*/

function the_breadcrumb() {
		echo '<ul id="crumbs" class="breadcrumbs">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}



/*--------------
Custom Fields
---------------*/
function custom_meta_box_markup($post) {
	wp_nonce_field(basename(__FILE__), "meta-box-nonce");
?>
	<div>
		<label for="meta-banner-top-title">Top Title</label>
		<input name="meta-banner-top-title" type="text" value="<?php
	echo get_post_meta($post->ID, "meta-banner-top-title", true);
?>">
			<br>
		<label for="meta-banner-title">Title</label>
		<input name="meta-banner-title" type="text" value="<?php
	echo get_post_meta($post->ID, "meta-banner-title", true);
?>">
			<br>
		<label for="meta-banner-description">Description</label>
		<textarea name="meta-banner-description"><?php
	echo get_post_meta($post->ID, "meta-banner-description", true);
?></textarea>

		</div>
	<?php


	/* image field */
	// See if there's an existing image. (We're associating images with posts by saving the image's 'attachment id' as a post meta value)
	// Incidentally, this is also how you'd find any uploaded files for display on the frontend.
	$existing_image_id = get_post_meta($post->ID, '_banner_attached_image', true);
	if (is_numeric($existing_image_id)) {
		echo '<div>';
		$arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large');
		$existing_image_url = $arr_existing_image[0];
		echo '<img src="' . $existing_image_url . '" />';
		echo '</div>';

	}

	// If there is an existing image, show it
	if ($existing_image_id) {
		echo '<div>Attached Image ID: ' . $existing_image_id . '</div>';

	}

	echo 'Upload an image: <input type="file" name="banner_image" id="banner_image" /> <span> Suggested size: 1920 x 485px</span>';

	// See if there's a status message to display (we're using this to show errors during the upload process, though we should probably be using the WP_error class)
	$status_message = get_post_meta($post->ID, '_banner_attached_image_upload_feedback', true);

	// Show an error message if there is one
	if ($status_message) {
		echo '<div class="upload_status_message">';
		echo $status_message;
		echo '</div>';

	}

	// Put in a hidden flag. This helps differentiate between manual saves and auto-saves (in auto-saves, the file wouldn't be passed).
	echo '<input type="hidden" name="banner_manual_save_flag" value="true" />';

}

function add_banner_meta_box() {
	add_meta_box("banner-meta-box", "Banner Fields", "custom_meta_box_markup", "page", "normal", "high", null);
}

function save_banner_meta_box($post_id, $post, $update) {
	if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
		return $post_id;

	if (!current_user_can("edit_post", $post_id))
		return $post_id;

	if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
		return $post_id;

	$slug = "page";
	if ($slug != $post->post_type)
		return $post_id;

	$meta_banner_top_title   = "";
	$meta_banner_title       = "";
	$meta_banner_description = "";

	if (isset($_POST["meta-banner-top-title"])) {
		$meta_banner_top_title = $_POST["meta-banner-top-title"];
	}
	update_post_meta($post_id, "meta-banner-top-title", $meta_banner_top_title);

	if (isset($_POST["meta-banner-title"])) {
		$meta_banner_title = $_POST["meta-banner-title"];
	}
	update_post_meta($post_id, "meta-banner-title", $meta_banner_title);

	if (isset($_POST["meta-banner-description"])) {
		$meta_banner_description = $_POST["meta-banner-description"];
	}
	update_post_meta($post_id, "meta-banner-description", $meta_banner_description);
}

function remove_custom_field_meta_box() {
	remove_meta_box("postcustom", "post", "normal");
}

add_action("do_meta_boxes", "remove_custom_field_meta_box");
add_action("save_post", "save_banner_meta_box", 10, 3);
add_action("add_meta_boxes", "add_banner_meta_box");


/*================================================================
=            Create custom Image field for Pages only            =
================================================================*/

function banner_add_edit_form_multipart_encoding() {
	echo ' enctype="multipart/form-data"';
}

add_action('post_edit_form_tag', 'banner_add_edit_form_multipart_encoding');

function banner_update_post($post_id, $post) {
	// Get the post type. Since this function will run for ALL post saves (no matter what post type), we need to know this.
	// It's also important to note that the save_post action can runs multiple times on every post save, so you need to check and make sure the
	// post type in the passed object isn't "revision"

	$post_type = $post->post_type;

	// Make sure our flag is in there, otherwise it's an autosave and we should bail.
	if ($post_id && isset($_POST['banner_manual_save_flag'])) {
		// Logic to handle specific post types
		switch ($post_type) {

			// If this is a post. You can change this case to reflect your custom post slug
			case 'page':

				// HANDLE THE FILE UPLOAD

				// If the upload field has a file in it
				if (isset($_FILES['banner_image']) && ($_FILES['banner_image']['size'] > 0)) {
					// Get the type of the uploaded file. This is returned as "type/extension"
					$arr_file_type      = wp_check_filetype(basename($_FILES['banner_image']['name']));
					$uploaded_file_type = $arr_file_type['type'];

					// Set an array containing a list of acceptable formats
					$allowed_file_types = array(
						'image/jpg',
						'image/jpeg',
						'image/gif',
						'image/png'
					);

					// If the uploaded file is the right format
					if (in_array($uploaded_file_type, $allowed_file_types)) {
						// Options array for the wp_handle_upload function. 'test_upload' => false
						$upload_overrides = array(
							'test_form' => false
						);

						// Handle the upload using WP's wp_handle_upload function. Takes the posted file and an options array
						$uploaded_file = wp_handle_upload($_FILES['banner_image'], $upload_overrides);

						// If the wp_handle_upload call returned a local path for the image
						if (isset($uploaded_file['file'])) {
							// The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
							$file_name_and_location = $uploaded_file['file'];

							// Generate a title for the image that'll be used in the media library
							$file_title_for_media_library = 'your title here';

							// Set up options array to add this file as an attachment
							$attachment = array(
								'post_mime_type' => $uploaded_file_type,
								'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library),
								'post_content' => '',
								'post_status' => 'inherit'
							);

							// Run the wp_insert_attachment function. This adds the file to the media library and generates the thumbnails. If you wanted to attch this image to a post, you could pass the post id as a third param and it'd magically happen.
							$attach_id = wp_insert_attachment($attachment, $file_name_and_location);
							require_once(ABSPATH . "wp-admin" . '/includes/image.php');
							$attach_data = wp_generate_attachment_metadata($attach_id, $file_name_and_location);
							wp_update_attachment_metadata($attach_id, $attach_data);

							// Before we update the post meta, trash any previously uploaded image for this post.
							// You might not want this behavior, depending on how you're using the uploaded images.
							$existing_uploaded_image = (int) get_post_meta($post_id, '_banner_attached_image', true);
							if (is_numeric($existing_uploaded_image)) {
								wp_delete_attachment($existing_uploaded_image);
							}
							// Now, update the post meta to associate the new image with the post
							update_post_meta($post_id, '_banner_attached_image', $attach_id);
							// Set the feedback flag to false, since the upload was successful
							$upload_feedback = false;
						} else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.
							$upload_feedback = 'There was a problem with your upload.';
							update_post_meta($post_id, '_banner_attached_image', $attach_id);
						}
					} else { // wrong file type
						$upload_feedback = 'Please upload only image files (jpg, gif or png).';
						update_post_meta($post_id, '_banner_attached_image', $attach_id);
					}
				} else { // No file was passed
					$upload_feedback = false;
				}
				// Update the post meta with any feedback
				update_post_meta($post_id, '_banner_attached_image_upload_feedback', $upload_feedback);

				break;

			default:

		} // End switch

		return;

	} // End if manual save flag

	return;

}
add_action('save_post', 'banner_update_post', 1, 2);

/* ==========================================================================
CUSTOMIZER: Adding banner image field
========================================================================== */

function acm_customize_register($wp_customize) {

	$wp_customize->add_section('banner_settings_section', array(
		'title' => __('Banner Image', 'acm'),
		'priority' => 30
	));

	$wp_customize->add_setting('banner_bgimage');

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner_bgimage', array(
		'label' => __('Banner Background Image', 'acm'),
		'section' => 'banner_settings_section',
		'settings' => 'banner_bgimage'
	)));

	$wp_customize->add_setting('banner_title', array('default' => ''));
	$wp_customize->add_setting('banner_top_title', array('default' => ''));
	$wp_customize->add_setting('banner_description', array('default' => ''));

	$wp_customize->add_control('banner_title', array(
		'label' => __('Title', 'acm'),
		'section' => 'banner_settings_section',
		'settings' => 'banner_title',
		'type' => 'text'
	));

	$wp_customize->add_control('banner_top_title', array(
		'label' => __('Top Title', 'acm'),
		'section' => 'banner_settings_section',
		'settings' => 'banner_top_title',
		'type' => 'text'
	));

	$wp_customize->add_control('banner_description', array(
		'label' => __('Description', 'acm'),
		'section' => 'banner_settings_section',
		'settings' => 'banner_description',
		'type' => 'textarea'
	));

	/*===========================================
	=     CUSTOMIZER: Footer Social Links       =
	===========================================

	$wp_customize->add_section('footer_social_links_section', array(
		'title' => __('Footer Social Links', 'acm'),
		'priority' => 31
	));

	$wp_customize->add_setting('twitter_url', array('default' => ''));
	$wp_customize->add_setting('facebook_url', array('default' => ''));
	$wp_customize->add_setting('linkedin_url', array('default' => ''));
	$wp_customize->add_setting('youtube_url', array('default' => ''));
	$wp_customize->add_setting('googleplus_url', array('default' => ''));
	$wp_customize->add_setting('instagram_url', array('default' => ''));
	$wp_customize->add_setting('flickr_url', array('default' => ''));
	$wp_customize->add_setting('email_url', array('default' => ''));


	$wp_customize->add_control('facebook_url', array(
		'label' => __('Facebook', 'acm'),
		'section' => 'footer_social_links_section',
		'settings' => 'facebook_url',
		'type' => 'text'
	));

	$wp_customize->add_control('twitter_url', array(
		'label' => __('Twitter', 'acm'),
		'section' => 'footer_social_links_section',
		'settings' => 'twitter_url',
		'type' => 'text'
	));

	$wp_customize->add_control('linkedin_url', array(
		'label' => __('LinkedIn', 'acm'),
		'section' => 'footer_social_links_section',
		'settings' => 'linkedin_url',
		'type' => 'text'
	));

	$wp_customize->add_control('youtube_url', array(
		'label' => __('Youtube', 'acm'),
		'section' => 'footer_social_links_section',
		'settings' => 'youtube_url',
		'type' => 'text'
	));

	$wp_customize->add_control('googleplus_url', array(
		'label' => __('Google Plus', 'acm'),
		'section' => 'footer_social_links_section',
		'settings' => 'googleplus_url',
		'type' => 'text'
	));

	$wp_customize->add_control('instagram_url', array(
		'label' => __('Instagram', 'acm'),
		'section' => 'footer_social_links_section',
		'settings' => 'instagram_url',
		'type' => 'text'
	));

	$wp_customize->add_control('flickr_url', array(
		'label' => __('Flickr', 'acm'),
		'section' => 'footer_social_links_section',
		'settings' => 'flickr_url',
		'type' => 'text'
	));

	$wp_customize->add_control('email_url', array(
		'label' => __('Email', 'acm'),
		'section' => 'footer_social_links_section',
		'settings' => 'email_url',
		'type' => 'text'
	));


	=====  End of CUSTOMIZER: Footer Social Links  ======*/



	/**/
	/* ==========================================================================
	   ADD LOGO
	   ========================================================================== */
	$wp_customize->add_setting('logo_image');
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_image', array(
		'label' => __('Logo Image', 'acm'),
		'section' => 'title_tagline',
		'settings' => 'logo_image'
	)));

	/**/
	/* ==========================================================================
	   FOOTER LOGO
	   ========================================================================== */
	$wp_customize->add_setting('footer_logo');
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
		'label' => __('Footer Logo', 'acm'),
		'section' => 'title_tagline',
		'settings' => 'footer_logo'
	)));

}
add_action('customize_register', 'acm_customize_register');

// ==========================================================================
// Enqueque CUSTOM.js for social links form
// ==========================================================================
function social_links_customizer()
{
	wp_enqueue_script("social-links-customizer", get_template_directory_uri() . "/social-links-customizer.js", array("jquery"));
}

// ==========================================================================
// Enqueque CUSTOM.js for social links form
// ==========================================================================

add_action("customize_preview_init", "social_links_customizer");


/* ==========================================================================
REGISTER MENUS
========================================================================== */

// This theme uses wp_nav_menu() in two locations.
register_nav_menus(array(
	'primary' => __('Primary Menu', 'acm'),
	'secondary' => __('Secondary Menu', 'acm'),
	'topsmall' => __('Top Small', 'acm')
));


/* ==========================================================================
ADD CUSTOM MENU ITEM (SEARCH FORM) to MAIN MENU
========================================================================== */

add_filter('wp_nav_menu_items', 'add_seach_form', 10, 2);

function add_seach_form($items, $args) {
	if ($args->theme_location == 'secondary') {
		$items .= '
						<li class="hide-for-small">
							<form class="acm-search-form" id="form_1" action="'.get_site_url().'" method="get">
								<input type="text" name="s" class="acm-searchbox-input" required="required" autocomplete="off" id="input_1"/>
								<label for="search-site_1" class="toggle">
									<i class="fa fa-search left"></i>
									<input type="submit" class="acm-searchbox-submit left" value="Search" name="search-site_1" id="search-site_1" />
								</label>
								<script>window.liveSearchUrl = "/live-search";</script>
							</form>
						</li>';
	}
	return $items;
}

// REGISTERING WIDGETS AREAS
//
/**
 * Register our sidebars and widgetized areas.
 *
 */
function acm_widgets_init() {

	register_sidebar( array(
		'name'          => 'Content sidebar',
		'id'            => 'content_right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Content footer',
		'id'            => 'content_footer',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'acm_widgets_init' );
