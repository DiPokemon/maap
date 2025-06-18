<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<h2><?php the_title(); ?></h2>

			<?php
				if ( has_post_thumbnail() ) the_post_thumbnail( 'post-thumbnail', array( 'class' => 'wrapper__bg-image' ) );

				the_content();
			?>
		</div>
	</main>

<?php get_footer(); ?>