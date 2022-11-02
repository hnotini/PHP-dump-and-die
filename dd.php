/**
 * Var dump and die
 */
function dd() {
    // If WP_ENV is defined (e.g Bedrock setup), do only for development.
    if (defined('WP_ENV') && WP_ENV !== 'development') return;

    echo implode( '', array_map( function ( $arg ) {
		ob_start();
		echo '<pre>';
		var_dump( $arg );
		echo '</pre>';
		return ob_get_clean();
	}, func_get_args() ) );

    // Handle if function is used in a wordpress context.
    if (function_exists('wp_die')) {
        // WP error page default is a bit narrow for smal windows. 
        echo '<style type=text/css>body#error-page { max-width:75% }</style>';
        wp_die();
    }

    die();
}
