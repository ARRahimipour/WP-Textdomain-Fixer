add_action('init', function() {
    // Determine if the script is running in a theme or a plugin
    if ( function_exists('wp_get_theme') && wp_get_theme()->get('TextDomain') ) {
        $text_domain = wp_get_theme()->get('TextDomain');
        $languages_path = get_stylesheet_directory() . '/languages'; // Child theme safe path
    } else {
        $text_domain = dirname(plugin_basename(__FILE__));
        $languages_path = plugin_dir_path(__FILE__) . 'languages';
    }

    // Ensure a text domain is defined
    if ( empty( $text_domain ) ) {
        error_log( 'Text domain is not defined. Please check your theme or plugin settings.' );
        return;
    }

    // Load translations based on WordPress version
    if ( version_compare( $GLOBALS['wp_version'], '6.7', '<' ) ) {
        // For WordPress versions earlier than 6.7
        load_plugin_textdomain( $text_domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    } else {
        // For WordPress 6.7 or later
        $locale = determine_locale();
        $mo_file = $languages_path . "/$text_domain-$locale.mo";

        // Check if the .mo file exists and is readable
        if ( is_readable( $mo_file ) ) {
            load_textdomain( $text_domain, $mo_file );
        } else {
            error_log( "Translation file not found or unreadable: $mo_file" );
        }
    }
});
