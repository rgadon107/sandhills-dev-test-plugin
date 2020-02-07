<?php
/**
 *  The custom post type configuration.
 *
 * @package    spiralWebDB\Sandhills
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
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
		'custom_type'       => 'product',
		'singular_label'    => 'Product',
		'plural_label'      => 'Products',
		'in_sentance_label' => 'Products',
		'text_domain'       => 'custom_product',
		'specific_labels'   => [],
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
			'thumbnail',
			'author',
			'post-formats',
		],
		'additional'     => [
			'page-attributes',
		],
	],

	/**==============================================================
	 *
	 * The arguments for registering the Custom Post Type.
	 *
	 * ===============================================================*/
	'args'      => [
		'description'         => 'A custom post type for an imaginary product.', // For informational purposes only.
		'label'               => 'Products',
		'labels'              => '', // automatically generate the labels.
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'menu_icon'           => 'dashicons-cart',
		'supports'            => '', // automatically generate the support features.
		'has_archive'         => true,
	],
];

