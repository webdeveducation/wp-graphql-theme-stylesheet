<?php
/**
 * Plugin Name: WP GraphQL Theme Stylesheet
 * Description: Adds the current theme's global stylesheet to be returned as a string from WPGraphQL
 * Author: WebDevEducation
 * Author URI: https://webdeveducation.com
 * Plugin URI: https://webdeveducation.com
 * Version: 0.1.0
 */

add_action( 'graphql_register_types', 'extend_wpgraphql_schema' );

function extend_wpgraphql_schema() {
  register_graphql_field( 'RootQuery', 'themeStylesheet', [
    'type' => 'String',
    'description' => 'Return the current theme\'s global stylesheet as a string',
    'resolve' => function() {
       return wp_get_global_stylesheet();
    }
  ] );
};
?>