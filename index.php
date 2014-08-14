<?php

/**
  @package CPT_Relations
  @version 1.0
  Plugin Name: Custom Post Type Relations
  Plugin URI: http://wordpress.org/plugins/custom-post-type-relations/
  Description: Custom Post Type (CPT) Relations plugin can be used to create relations within different post types in your WordPress. 
  Author: Alex Jose
  Version: 1.0
  Author URI: http://alexjose.in/
 */
define('CPTR_DEBUG', false);
define('CPTR_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CPTR_PLUGIN_URL', plugin_dir_url(__FILE__));

$cpt_relations = get_option('cpt_relations');


include 'inc/cptr-admin-pages.php';
include 'inc/cptr-metaboxes.php';
include 'inc/cptr-ajax-actions.php';
include 'inc/cptr-theme-functions.php';

add_action('admin_enqueue_scripts', 'cptr_enqueue_scripts');

//add_action('parse_request', 'testfn');

function cptr_enqueue_scripts($hook) {

    global $cpt_relations;
    global $post;

    if (($hook == 'post-new.php' || $hook == 'post.php') && (!empty($cpt_relations))) {
        wp_enqueue_script('autoSuggest', CPTR_PLUGIN_URL . 'assets/js/jquery.tokeninput.js');
        wp_enqueue_script('autoSuggest-config', CPTR_PLUGIN_URL . 'assets/js/jquery.tokeninput.config.js');

        wp_enqueue_style('autoSuggest-main', CPTR_PLUGIN_URL . 'assets/css/token-input.css');
        wp_enqueue_style('autoSuggest-fb-theme', CPTR_PLUGIN_URL . 'assets/css/token-input-facebook.css');
    }
}
