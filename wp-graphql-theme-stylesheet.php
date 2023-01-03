<?php
/**
 * Plugin Name: WP GraphQL Theme Stylesheet
 * Description: Adds the current theme's global stylesheet to be returned as a string from WPGraphQL
 * Author: WebDevEducation
 * Author URI: https://webdeveducation.com
 * Plugin URI: https://github.com/webdeveducation/wp-graphql-theme-stylesheet
 * Version: 0.1.1
 */

 if (!defined('ABSPATH')) {
	die('Silence is golden.');
}

if (!class_exists('WPGraphQLThemeStylesheet')) {
	final class WPGraphQLThemeStylesheet {
		private static $instance;
		public static function instance() {
			if (!isset(self::$instance)) {
				self::$instance = new WPGraphQLThemeStylesheet();
			}

			return self::$instance;
		}

		public function init() {
      add_action( 'graphql_register_types', function(){
        register_graphql_field( 'RootQuery', 'themeStylesheet', [
          'type' => 'String',
          'description' => 'Return the current theme\'s global stylesheet as a string',
          'resolve' => function() {
            return wp_get_global_stylesheet();
          }
        ]);
      });
		}
	}
}

WPGraphQLThemeStylesheet::instance()->init();

?>