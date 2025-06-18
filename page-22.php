<?php
/*
 * Template name: Партнеры
*/
?>
<!-- Страница: Партнёры (page-partners.php) -->
<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<h2><?php the_title(); ?></h2>

			<section class="partners">
				<div class="partners__content">
					<?php echo get_template_part( '/template-parts/content', 'partners', [ 'param-slider' => false ] ); ?>
				</div>
			</section>
		</div>
	</main>

<?php get_footer(); ?>