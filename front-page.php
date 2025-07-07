<?php
/*
* Template name: Главная
*/
?>

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

				<div class="buttons">
					<a href="/join" class="main_button-item">Вступить</a>
					<!-- <a href="tel:+111111" class="main_button-item">Участвовать в мероприятии</a>
					<a href="#" class="main_button-item">Подписаться на новости</a> -->
				</div>

				<div class="main__wrap">
					<?php //the_content(); ?>

					<div class="main__part main__part--news news" style="margin-top: 30px;">
						<h2>Новости</h2>

						<div class="news__list">
						<?php
							global $post;
							$counterNews = 0; // Количество выведеных новостей.

							$query = new WP_Query( [
								'posts_per_page' => 4, // Количество постов выводить (-1 = все посты).
								'post_type' => 'post'
							] );

							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post(); 
									$counterNews++; ?>

									<article class="news__list-item">
										<?php if (has_post_thumbnail()) : ?>											
												<?php the_post_thumbnail('large');?>											
										<?php endif; ?>

										<div class="news__list-item-info">
											<div class="news__list-item-meta">
												<svg class="el-decor news__icon" aria-hidden="true"><use xlink:href="#news" x="0" y="0"></use></svg>
												<time class="news__date"><?php the_time( 'j F Y' ); ?></time>
											</div>
											<a href="<?php echo get_the_permalink(); ?>" class="mews__read_more">Подробнее</a>											
										</div>

										<a class="news__title" href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>

										<div class="news__content">
											<?php the_excerpt(); ?>
										</div>
									</article>

								<?php }
							} else { ?>
								<p class="wrapper__empty-post">Новостей не&nbsp;найдено</p>
							<?php };

							wp_reset_postdata(); // Сбрасываем $post
						?>
						</div>

						<?php if ( $counterNews >= 5 ) : ?><a class="btn news__more" href="/news/">Все новости</a><?php endif; ?>
					</div>

					<div class="main__part main__part--calendar">
						<h2>Мероприятия</h2>
						<div class="calendar__list">
							<?php
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array(
									'posts_per_page'	=> 5,
									'order'						=> 'DESC',
									'post_type'				=> 'calendar',
									'paged'						=> $paged
								);

								$MY_QUERY = new WP_Query( $args );

								if ( $MY_QUERY->have_posts() ) {
									while ( $MY_QUERY->have_posts() ) {
										$MY_QUERY->the_post(); 
										$link = get_the_excerpt(); ?>

										<article class="calendar__item">
											<!-- <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'post-thumbnail', array( 'class' => 'wrapper__bg-image calendar__bg' ) ); ?> -->

											<a href="<?php echo get_the_permalink(); ?>"><h3 class="calendar__title"><?php the_title(); ?></h3></a>

											<!-- <?php the_excerpt(); ?> -->

											<!-- <a class="btn calendar__link" href="<?php echo get_the_permalink(); ?>">
												Подробнее о&nbsp;мероприятие
											</a> -->
										</article>

									<?php };
								} else { ?>
									<p class="wrapper__empty-post">Мероприятий не&nbsp;найдено</p>
								<?php };

								wp_reset_postdata(); // Сбрасываем $post
							?>
						</div>
						<img class="victory_day" src="<?= get_template_directory_uri() ?>/assets/imgs/banner_80let.png" alt="День победы. 80 лет.">
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