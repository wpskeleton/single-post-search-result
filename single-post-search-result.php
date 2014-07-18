<?php
/**
 * Plugin Name: Single Post Search Result
 * Plugin URI: http://wpskeleton.com/
 * Description: This Plugin will redirect any search results that only have a single post to the single post that was returned in the search.
 * Author: WPSkeleton
 * Version: 1.0
 * Author URI: http://wpskeleton.com/
 *
 * @author WPSkeleton
 * @since 1.0
 */

/**
 * This function will redirect any search results that only have a single post
 * to the single post page that was returned in the search.
 *
 * @since 1.0
 */
function wpskeleton_single_post_search_result() {

    if ( is_search() ) {

        global $wp_query;

        if ( $wp_query->post_count == 1 ) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
        }

    }

}

/**
 * This fires the template_redirect action for the wpskeleton_single_post_search_result() function. 
 *
 * @since 1.0
 */
add_action( 'template_redirect', 'wpskeleton_single_post_search_result' );