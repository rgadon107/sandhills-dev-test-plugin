<?php
/**
 *  The single-product template file.
 *
 * @package    spiralWebDB\Sandhills\Template
 * @since      1.0.0
 * @author     Robert A. Gadon
 * @link       http://spiralwebdb.com
 * @license    GNU General Public License 2.0+
 */

namespace spiralWebDB\Sandhills\Template;

get_header();

?>

	<main id="site-content" role="main">

		<?php

		if ( have_posts() ) {

			while ( have_posts() ) { ?>
				<article class="entry single-product-<?php the_ID(); ?>">
				<?php the_post(); ?>
					<header class="entry-header has-text-align-center header-footer-group">
						<div class="entry-header-inner section-inner medium">
							<h2 class="entry-title"><?php the_title(); ?></h2><!-- .entry-header-inner -->
								<div class="entry-content"><?php the_content();
							} ?></div>
						</div>
					</header>
				</article>
		<?php } ?>
	</main><!-- #site-content -->

	<?php get_footer();
