<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<h1><?php the_title(); ?></h1>

			<time class="news__item-date"><?php the_time( 'j F Y' ); ?></time>

			<?php
				if ( has_post_thumbnail() ) the_post_thumbnail( 'post-thumbnail', array( 'class' => 'wrapper__bg-image news__image' ) );				
			?>

			<div class="post_content">
				<?php the_content(); ?>
			</div>
		</div>
	</main>

<?php get_footer(); ?>