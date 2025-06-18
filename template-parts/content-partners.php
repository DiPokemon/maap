<?php
	global $post;

	$query = new WP_Query( [
		'posts_per_page' => -1, // Количество постов выводить (-1 = все посты).
		'post_type' => 'partners'
	] );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post(); ?>

			<a class="<?php if ($args['param-slider']) echo 'swiper-slide '; ?>partners__item" href="<?php echo get_the_excerpt(); ?>" target="_blank" title="<?php the_title(); ?>">
				<?php the_title(); ?>
				<img class="el-decor partners__logo" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
			</a>

		<?php }
	} else { ?>
		<p class="<?php if ($args['param-slider']) echo 'swiper-slide '; ?>wrapper__empty-post">Партнёров не&nbsp;найдено</p>
	<?php };

	wp_reset_postdata(); // Сбрасываем $post
?>