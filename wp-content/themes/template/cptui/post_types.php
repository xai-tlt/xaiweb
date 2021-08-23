<?php

function cptui_register_my_cpts()
{

  
    /**
     * Post Type: Projects.
     */

    $labels = [
        "name" => __("Projects", "custom-post-type-ui"),
        "singular_name" => __("Project", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("Projects", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "projects", "with_front" => true],
        "query_var" => true,
        'taxonomies'          => array( 'category' )
       // "supports" => array('editor','title')
    ];

    register_post_type("projects", $args);

}

add_action('init', 'cptui_register_my_cpts');
