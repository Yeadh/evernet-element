<?php

if ( ! function_exists('evernet_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function evernet_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'evernet' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'evernet' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'evernet' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'evernet' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'evernet' ),
                'add_new_item'       => __( 'Add New Portfolio', 'evernet' ),
                'new_item'           => __( 'New Portfolio', 'evernet' ),
                'edit_item'          => __( 'Edit Portfolio', 'evernet' ),
                'view_item'          => __( 'View Portfolio', 'evernet' ),
                'all_items'          => __( 'All Portfolio', 'evernet' ),
                'search_items'       => __( 'Search Portfolio', 'evernet' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'evernet' ),
                'not_found'          => __( 'No Portfolio found.', 'evernet' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'evernet' )
            ),

            'description'        => __( 'Description.', 'evernet' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'evernet' ),
                    'add_new_item'      => __( 'Add New Category', 'evernet' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'evernet_custom_post_type' );

}