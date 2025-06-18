<?php
/*
 * Template name: Мероприятия
*/
?>
<!-- Страница: Календарь мероприятий (page-calendar.php) -->
<?php get_header(); ?>

	<main class="wrapper wrapper--main">
		<div class="wrapper__content">
			<h2><?php the_title(); ?></h2>

			<section class="calendar">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
						'posts_per_page'	=> 10,
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
								<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'post-thumbnail', array( 'class' => 'wrapper__bg-image calendar__bg' ) ); ?>

								<h3 class="calendar__title"><?php the_title(); ?></h3>

								<?php the_excerpt(); ?>

								<a class="btn calendar__link" href="<?php echo get_the_permalink(); ?>">
									Подробнее о&nbsp;мероприятие
								</a>
							</article>

						<?php };
					} else { ?>
						<p class="wrapper__empty-post">Мероприятий не&nbsp;найдено</p>
					<?php };

					wp_reset_postdata(); // Сбрасываем $post

					$GLOBALS['wp_query']->max_num_pages = $MY_QUERY->max_num_pages;

					the_posts_pagination( array(
						'show_all'						=> false, // показаны все страницы участвующие в пагинации
						'end_size'						=> 1, // количество страниц на концах
						'mid_size'						=> 1, // количество страниц вокруг текущей
						'prev_next'						=> true, // выводить ли боковые ссылки "предыдущая/следующая страница".
						'prev_text'						=> __('
																				<span class="btn-arrow page-pagination__arrow page-pagination__arrow--left">
																					Предыдущая страница
																					<svg class="el-decor btn-arrow__icon page-pagination__icon" aria-hidden="true"><use xlink:href="#arrow-circle" x="0" y="0"></use></svg>
																				</span>
																			'),
						'next_text'						=> __('
																			<span class="btn-arrow page-pagination__arrow page-pagination__arrow--right">
																				Следющая страница
																				<svg class="el-decor btn-arrow__icon page-pagination__icon" aria-hidden="true"><use xlink:href="#arrow-circle" x="0" y="0"></use></svg>
																			</span>
																		'),
						'add_args'						=> false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
						'add_fragment'				=> '', // Текст который добавиться ко всем ссылкам.
						'screen_reader_text'	=> __('Навигация по мероприятиям'),
						'class'								=> 'page-pagination', // CSS класс, добавлено в 5.5.0.
					) );
				?>
			</section>
		</div>
	</main>

<?php get_footer(); ?>