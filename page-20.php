<?php
/*
 * Template name: Структура
*/
?>
<!-- Страница: Структура (page-structure.php) -->
<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<h2><?php the_title(); ?></h2>

			<section class="structure">
				<?php
					global $post;

					$query = new WP_Query( [
						'posts_per_page' => -1, // Количество постов выводить (-1 = все посты).
						'post_type' => 'structure'
					] );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post(); ?>

							<a class="structure__link" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a>

						<?php }
					} else { ?>
						<p class="wrapper__empty-post">Сотрудников не&nbsp;найдено</p>
					<?php };

					wp_reset_postdata(); // Сбрасываем $post
				?>
			</section>
		</div>
	</main>

<?php get_footer(); ?>