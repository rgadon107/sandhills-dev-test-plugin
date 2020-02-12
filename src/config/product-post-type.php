<?php
/**
 * Product custom post type configuration.
 *
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @package    spiralWebDB\Sandhills
 * @link       http://spiralwebdb.com
 * @license    GNU-2.0+
 */

namespace spiralWebDB\Sandhills;

return [

	/**==============================================================
	 *
	 * The name of the Custom Post Type.
	 *
	 * ===============================================================*/
	'post_type' => 'product',

	/**==============================================================
	 *
	 * Label configuration for the Custom Post Type.
	 *
	 * ===============================================================*/
	'labels'    => [
		'name'                  => _x( 'Products', 'post type general name', 'sandhills-dev' ),
		'singular_name'         => _x( 'Product', 'post type singular name', 'sandhills-dev' ),
		'menu_name'             => _x( 'Products', 'admin menu', 'sandhills-dev' ),
		'add_new_item'          => __( 'Add New Product', 'sandhills-dev' ),
		'edit_item'             => __( 'Edit Product', 'sandhills-dev' ),
		'not_found'             => __( 'No products found.', 'sandhills-dev' ),
		'not_found_in_trash'    => __( 'No products found in Trash.', 'sandhills-dev' ),
		'featured_image'        => __( 'Product image', 'sandhills-dev' ),
		'set_featured_image'    => __( 'Set product image.', 'sandhills-dev' ),
		'remove_featured_image' => __( 'Remove product image.', 'sandhills-dev' ),
		'item_updated'          => __( 'Product updated.', 'sandhills-dev' ),
	],

	/**==============================================================
	 *
	 * Supported features for the Custom Post Type.
	 *
	 * ===============================================================*/
	'features'  => [
		'base_post_type' => 'post',
		'exclude'        => [
			'excerpt',
			'comments',
			'trackbacks',
			'custom-fields',
			'author',
			'post-formats',
		],
		// Uncomment code below to activate feature.
//		'additional'     => [
//			'page-attributes',
//		],
	],

	/**==============================================================
	 *
	 * The arguments for registering the Custom Post Type.
	 *
	 * ===============================================================*/
	'args'      => [
		'description'         => __( 'A custom post type for an imaginary product.', 'sandhills-dev' ),
		// Labels are configured above.
		'labels'              => '',
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'menu_icon'           => 'dashicons-cart',
		// Supported features are automatically generated using the configuration above.
		'supports'            => '',
		'has_archive'         => true,
	],
];

