<article id="post-<?php the_ID(); ?>" <?php post_class('vce-page'); ?>>

	<div class="entry-content page-content">
		<?php the_content(); ?>
	</div>

	<?php if ( vce_is_paginated_post() ) : ?>
			<?php get_template_part( 'sections/paginated-nav' ); ?>
	<?php endif; ?>

	<?php if ( vce_get_option( 'page_show_share' ) ) : ?>
	  	<?php get_template_part('sections/share-bar'); ?>
	<?php endif; ?>

</article>