<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<section class="main">
				<?php
					global $post;

					$query = new WP_Query( [
						'posts_per_page' => 1, // Количество постов выводить (-1 = все посты).
						'post_type' => 'calendar'
					] );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post(); 
							if ( has_post_thumbnail() ) { ?>

								<a class="main__preview" href="<?php echo get_the_permalink(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
									<div class="main__preview-content">
										<h4><?php the_title(); ?></h4>
										<?php the_excerpt(); ?>
									</div>
								</a>

						<?php }
						}
					};

					wp_reset_postdata(); // Сбрасываем $post
				?>

				<div class="main__wrap">
					<?php the_content(); ?>

					<div class="main__part main__part--news news" style="margin-top: 30px;">
						<h2>Новости</h2>

						<div class="news__list">
						<?php
							global $post;
							$counterNews = 0; // Количество выведеных новостей.

							$query = new WP_Query( [
								'posts_per_page' => 5, // Количество постов выводить (-1 = все посты).
								'post_type' => 'post'
							] );

							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post(); 
									$counterNews++; ?>

									<article class="news__list-item">
										<time class="news__date"><?php the_time( 'j F Y' ); ?></time>
										<a class="news__title" href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
										<svg class="el-decor news__icon" aria-hidden="true"><use xlink:href="#news" x="0" y="0"></use></svg>
									</article>

								<?php }
							} else { ?>
								<p class="wrapper__empty-post">Новостей не&nbsp;найдено</p>
							<?php };

							wp_reset_postdata(); // Сбрасываем $post
						?>
						</div>

						<?php if ( $counterNews >= 5 ) : ?><a class="btn news__more" href="http://maap/?page_id=38">Все новости</a><?php endif; ?>
					</div>
				</div>
			</section>

			<section class="partners partners--main">
				<h2 class="partners__title">Наши партнеры</h2>

				<div class="partners__list">
					<div class="swiper-wrapper">
						<?php echo get_template_part( '/template-parts/content', 'partners', [ 'param-slider' => true ] ); ?>
					</div>
				</div>

				<div class="partners__control">
					<button class="btn-arrow partners__arrow partners__arrow--prev" type="button">
						Предыдущий слайд
						<svg class="el-decor btn-arrow__icon partners__arrow-icon" aria-hidden="true"><use xlink:href="#arrow-circle" x="0" y="0"></use></svg>
					</button>

					<button class="btn-arrow partners__arrow partners__arrow--next" type="button">
						Следующий слайд
						<svg class="el-decor btn-arrow__icon partners__arrow-icon" aria-hidden="true"><use xlink:href="#arrow-circle" x="0" y="0"></use></svg>
					</button>
				</div>
			</section>
		</div>
	</main>

<?php get_footer(); ?>