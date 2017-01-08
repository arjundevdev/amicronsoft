<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


/**
 * Register Post Type and Taxonomies
 *
 * @since 1.0
 */
function tt_project_module_cpt() {

	$with_front = $project_cpt_slug = $project_cpt_cat_slug = $project_cpt_single = $single_args = '';

	if( function_exists( 'tt_temptt_get_option' ) ) {
		$with_front = tt_temptt_get_option( 'cpt_with_front', '0' );
		$project_cpt_slug = tt_temptt_get_option( 'project_cpt_slug', 'project-item' );
		$project_cpt_cat_slug = tt_temptt_get_option( 'project_cpt_cat_slug', 'project-cats' );
		$project_cpt_single = tt_temptt_get_option( 'project_cpt_single', true );
	}
	// With Front
	if ( ! empty ( $with_front )  ) $with_front = true; else $with_front = false;

	// Single page
	if ( ! empty ( $project_cpt_single )  ) { // single item true
		$single_args =  array('show_ui' => true) ;
	} else {
		$single_args =  array(
						'exclude_from_search' => true,
						'show_in_admin_bar'   => false,
						'show_in_nav_menus'   => false,
						'publicly_queryable'  => false,
						'query_var'           => false,
		) ;
	}


	/**
	 * Register Post Type
	 */

	// Arguments
	$cpt_args = array(
		'labels' => array(
			'name' => esc_attr__( 'Project', 'allureshop' ),
			'singular_name' => esc_attr__( 'Project', 'allureshop' ),
			'add_new' => esc_attr__( 'Add Project', 'allureshop' ),
			'add_new_item' => esc_attr__( 'Add Project', 'allureshop' ),
			'edit' => esc_attr__( 'Edit', 'allureshop' ),
			'edit_item' => esc_attr__( 'Edit Project', 'allureshop' ),
			'new_item' => esc_attr__( 'New Project', 'allureshop' ),
			'view' => esc_attr__( 'View Project', 'allureshop' ),
			'view_item' => esc_attr__( 'View Project', 'allureshop' ),
			'search_items' => esc_attr__( 'Search Project', 'allureshop' ),
			'not_found' => esc_attr__( 'No Project found', 'allureshop' ),
			'not_found_in_trash' => esc_attr__( 'No Project found in Trash', 'allureshop' ),
			'parent' => esc_attr__( 'Parent Project', 'allureshop' ),
		),
		'public' => true,
		'rewrite' => array( 'slug' => $project_cpt_slug, 'with_front' => $with_front ),
		'supports' => array( 'title', 'custom-fields', 'excerpt', 'editor', 'author', 'thumbnail', 'comments'  ),
	);

	// Single pages to be shown or not.
	$cpt_args = array_merge( $cpt_args, $single_args );

	// Apply filters
	$cpt_args = apply_filters( 'tt_project_cpt_args', $cpt_args );

	// Register Post Type
	register_post_type( 'tt_project', $cpt_args );

	/**
	 * Register Taxonomy ( Category )
	 */

	// Arguments
	$tax_args = array(
		'labels' => array(
			'name' => esc_attr__( 'Project Categories', 'allureshop' ),
			'singular_name' => esc_attr__( 'Category', 'allureshop' ),
			'search_items'  => esc_attr__( 'Search Categories', 'allureshop' ),
			'all_items' => esc_attr__( 'All Categories', 'allureshop' ),
			'parent_item' => esc_attr__( 'Parent Category', 'allureshop' ),
			'parent_item_colon' => esc_attr__( 'Parent Category:', 'allureshop' ),
			'edit_item' => esc_attr__( 'Edit Category', 'allureshop' ),
			'update_item' => esc_attr__( 'Update Category', 'allureshop' ),
			'add_new_item' => esc_attr__( 'Add New Category', 'allureshop' ),
			'new_item_name' => esc_attr__( 'New Category Name', 'allureshop' ),
			'menu_name' => esc_attr__( 'Categories', 'allureshop' ),
		),
		'hierarchical' => true,
		'public' => true,
		'rewrite' => array(
			'slug' => $project_cpt_cat_slug,
			'with_front' => $with_front
		),
	);

	// Apply filters
	$tax_args = apply_filters( 'tt_project_cats_args', $tax_args );

	// Register Taxonomy
	register_taxonomy( 'tt_project_cats', 'tt_project', $tax_args );

} add_action( 'init', 'tt_project_module_cpt' );