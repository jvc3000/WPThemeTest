<?php get_header(); ?>
<div class="row">
	<div class="col-xs-12 col-sm-8">
		<div class="row text-center no-margin">
		<?php
		/* override admin blogs per page setting for this loop */
		$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array('posts_per_page' => 3, 'paged' => $currentPage);
		query_posts($args);

		/* Blog page loop */
		if(have_posts()): $i = 0;
			$column = 0;
			$urlImg = '';
			while(have_posts()): the_post(); ?>
				<?php
					if ($i == 0): $column = 12;
					elseif ($i > 0 && $i <= 2): $column = 6; $class = ' second-row-padding';
					elseif($i>2): $column = 4; $class = ' third-row-padding';
					endif;
				?>
				<div class="col-xs-<?php echo $column; ?> blog-item">
					<?php if( has_post_thumbnail() ):
						$urlImg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
					endif; ?>
					<!--suppress CssMissingSemicolon -->
					<div class="blog-element" style="background-image: url(<?php echo $urlImg; ?>)">
						<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1> ' ); ?>
						<small><?php the_category(' '); ?></small>
					</div>
				</div>
			<?php $i++; endwhile; ?>
			<div class="col-xs-6 text-left">
				<?php previous_posts_link('« Newer Posts'); ?>
			</div>
			<div class="col-xs-6 text-right">
				<?php next_posts_link('Older Posts »'); ?>
			</div>
		<?php endif;
		wp_reset_query();
		?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>