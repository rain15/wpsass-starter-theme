<?php 
/* WordPress Security Measures */

// If someone uses following link, http://<website-name>/?author=1, redirect to home page. Do not show admin userid that shows by default 
function hpwp_template_redirect()
{
    if (is_author())
    {
         wp_redirect( home_url() ); exit;
    }
}
add_action('template_redirect', 'hpwp_template_redirect');

//Add generic Error Message for Login Page
function hpwp_login_error_message($error){
        $error = "<strong>ERROR:</strong> Invalid username or password.";

        return $error;
}
add_filter('login_errors','hpwp_login_error_message');

//Remove WP Generator META tag from core code
// remove WordPress generator meta tag completely
function wphp_remove_generator_tag() {
    return '';
}
add_filter( 'the_generator', 'wphp_remove_generator_tag' );


/******************* END OF  WordPress Security Measures */

/**
	 * Enqueue scripts
	 *
	 * @param string $handle Script name
	 * @param string $src Script url
	 * @param array $deps (optional) Array of script names on which this script depends
	 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
	 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
	 */
	function wphp_theme_styles() {
   
		// wp_enqueue_style( 'combined_css', get_template_directory_uri() . '/css/combined.min.css' );
		// wp_enqueue_style( 'font_awesome_css', get_template_directory_uri() . '/css/font-awesome.min.css' );

		// wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );


		// ME: Added Foundation CSS file
		wp_enqueue_style( 'foundation-styles', get_template_directory_uri() . '/css/app.css');


		// ME: Added Foundation JS and Foundation's what-input JS file and the jquery dependency. WordPress already comes with jquery
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/js/foundation.js', array(), '20151215', true );
		wp_enqueue_script( 'what-input', get_template_directory_uri() . '/js/what-input.min.js', array(), '20151215', true );
		wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array(), '20151215', true );

	}

	add_action( 'wp_enqueue_scripts', 'wphp_theme_styles' );

	


?>


