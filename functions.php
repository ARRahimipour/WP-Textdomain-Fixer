add_action('init', function() {
    if ( function_exists('wp_get_theme') && wp_get_theme()->get('TextDomain') ) {
        $text_domain = wp_get_theme()->get('TextDomain');
        $languages_path = get_template_directory() . '/languages';
    } else {
        $text_domain = dirname(plugin_basename(__FILE__));
        $languages_path = plugin_dir_path(__FILE__) . 'languages';
    }
    if ( version_compare( $GLOBALS['wp_version'], '6.7', '<' ) ) {
        load_plugin_textdomain( $text_domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    } else {
        $locale = determine_locale();
        $mo_file = $languages_path . "/$text_domain-$locale.mo";

        if ( is_readable( $mo_file ) ) {
            load_textdomain( $text_domain, $mo_file );
        }
    }
});
